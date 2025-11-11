<?php

/**
 * Front Controller for the Online Shop application.
 * This file handles all incoming requests, performs URL routing, and dispatches
 * them to the appropriate controller and action.
 */

session_start();

error_log('DEBUG: REQUEST_URI = ' . $_SERVER['REQUEST_URI']);

require_once __DIR__ . '/app/config/config.php';
require_once __DIR__ . '/app/controllers/Controller.php';

// Load language settings for the application
Controller::loadLanguage();

// Get the base path of the application and the requested URI
$base_path = dirname($_SERVER['SCRIPT_NAME']);
$request_uri = $_SERVER['REQUEST_URI'];

// Remove the base path from the request URI to get the clean path
if (strpos($request_uri, $base_path) === 0) {
    $request_uri = substr($request_uri, strlen($base_path));
}

// Separate URI path from query string (if any)
$uri_parts = explode('?', $request_uri, 2);
$path = trim($uri_parts[0], '/');

error_log('DEBUG: Trimmed path = ' . $path);

// Split the path into segments to determine controller, action, and parameters
$segments = explode('/', $path);
error_log('DEBUG: Segments = ' . print_r($segments, true));

// Initialize default controller, action, and parameters
$controller_name = 'HomeController'; // Default controller
$action_name = 'index'; // Default action
$params = []; // Initialize parameters array

if (!empty($segments[0])) {
    $segment_0 = strtolower($segments[0]);
    // Route for authentication (login, register)
    if ($segment_0 === 'auth') {
        $controller_name = 'AuthController';
        if (!empty($segments[1])) {
            $action_name = $segments[1];
        }
    } 
    // Route for user profile
    elseif ($segment_0 === 'profile') {
        $controller_name = 'UserController';
        $action_name = 'profile';
    } 
    // Route for admin panel
    elseif ($segment_0 === 'admin') {
        $controller_name = 'AdminController';
        if (!empty($segments[1])) {
            // Admin product management
            if ($segments[1] === 'products') {
                $action_name = 'products';
            } elseif ($segments[1] === 'createProduct') {
                $action_name = 'createProduct';
            } elseif ($segments[1] === 'editProduct' && isset($segments[2])) {
                $action_name = 'editProduct';
            } elseif ($segments[1] === 'deleteProduct' && isset($segments[2])) {
                $action_name = 'deleteProduct';
            } 
            // Admin category management
            elseif ($segments[1] === 'categories') {
                $action_name = 'categories';
            } elseif ($segments[1] === 'createCategory') {
                $action_name = 'createCategory';
            } elseif ($segments[1] === 'editCategory' && isset($segments[2])) {
                $action_name = 'editCategory';
            } elseif ($segments[1] === 'deleteCategory' && isset($segments[2])) {
                $action_name = 'deleteCategory';
            } 
            // Admin user management
            elseif ($segments[1] === 'users') {
                $action_name = 'users';
            } elseif ($segments[1] === 'editUserRole' && isset($segments[2])) {
                $action_name = 'editUserRole';
            } 
            // Admin order management
            elseif ($segments[1] === 'orders') {
                $action_name = 'orders';
            } elseif ($segments[1] === 'editOrderStatus' && isset($segments[2])) {
                $action_name = 'editOrderStatus';
            } else {
                $action_name = $segments[1];
            }
            $params = array_slice($segments, 2);
        }
    } 
    // Route for shopping cart
    elseif ($segment_0 === 'cart') {
        $controller_name = 'CartController';
        if (!empty($segments[1])) {
            $action_name = $segments[1];
            $params = array_slice($segments, 2);
        }
    } 
    // Route for checkout process
    elseif ($segment_0 === 'checkout') {
        $controller_name = 'CheckoutController';
        if (!empty($segments[1])) {
            $action_name = $segments[1];
            $params = array_slice($segments, 2);
        }
    } 
    // Route for order management
    elseif ($segment_0 === 'order') {
        $controller_name = 'OrderController';
        if (!empty($segments[1])) {
            $action_name = $segments[1];
            $params = array_slice($segments, 2);
        }
    } 
    // Route for user logout
    elseif ($segment_0 === 'logout') {
        $controller_name = 'AuthController';
        $action_name = 'logout';
    } 
    // Route for product display
    elseif ($segment_0 === 'product' || $segment_0 === 'products') {
        $controller_name = 'ProductController';
        if (!empty($segments[1])) {
            if ($segments[1] === 'search') { // Handle search action
                $action_name = 'search';
                // Parameters for search are handled via $_GET, so no need to slice segments for params
            } elseif (is_numeric($segments[1])) { // Assuming product ID is numeric
                $action_name = 'show'; // Or 'detail'
                $params = [$segments[1]];
            } else {
                $action_name = $segments[1];
                $params = array_slice($segments, 2);
            }
        } else {
            $action_name = 'index';
        }
    } 
    // Route for about page
    elseif ($segment_0 === 'about') {
        $controller_name = 'HomeController';
        $action_name = 'about';
    } 
    // Route for contact page
    elseif ($segment_0 === 'contact') {
        $controller_name = 'HomeController';
        $action_name = 'contact';
    } 
    // Default routing for other controllers (e.g., /mycontroller/myaction)
    else {
        $controller_name = ucfirst($segment_0) . 'Controller';
        if (!empty($segments[1])) {
            $action_name = $segments[1];
            $params = array_slice($segments, 2);
        }
    }
}

// Construct the full path to the controller file
$controller_file = __DIR__ . '/app/controllers/' . $controller_name . '.php';

// Check if the controller file exists
if (file_exists($controller_file)) {
    require_once $controller_file; // Include the controller file
    $controller = new $controller_name(); // Create an instance of the controller

    // Check if the action method exists in the controller
    if (method_exists($controller, $action_name)) {
        // Call the action method with the collected parameters, merging $_GET as an additional parameter
        call_user_func_array([$controller, $action_name], array_merge($params, [$_GET]));
    } else {
        // Handle 404 - Action not found in the controller
        echo "404 Not Found: Action " . $action_name . " not found in " . $controller_name;
    }
} else {
    // Handle 404 - Controller file not found
    echo "404 Not Found: Controller " . $controller_name . " not found.";
}

?>
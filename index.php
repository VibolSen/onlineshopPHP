<?php

session_start();

error_log('DEBUG: REQUEST_URI = ' . $_SERVER['REQUEST_URI']);

require_once __DIR__ . '/app/config/config.php';
require_once __DIR__ . '/app/controllers/Controller.php';

// Basic routing
$base_path = dirname($_SERVER['SCRIPT_NAME']);
$request_uri = $_SERVER['REQUEST_URI'];

// Remove the base path from the request URI
if (strpos($request_uri, $base_path) === 0) {
    $request_uri = substr($request_uri, strlen($base_path));
}

// Separate URI path from query string
$uri_parts = explode('?', $request_uri, 2);
$path = trim($uri_parts[0], '/');

error_log('DEBUG: Trimmed path = ' . $path);

$segments = explode('/', $path);
error_log('DEBUG: Segments = ' . print_r($segments, true));

$controller_name = 'HomeController'; // Default
$action_name = 'index'; // Default action
$params = []; // Initialize parameters array

if (!empty($segments[0])) {
    $segment_0 = strtolower($segments[0]);
    if ($segment_0 === 'auth') {
        $controller_name = 'AuthController';
        if (!empty($segments[1])) {
            $action_name = $segments[1];
        }
    } elseif ($segment_0 === 'profile') {
        $controller_name = 'UserController';
        $action_name = 'profile';
    } elseif ($segment_0 === 'admin') {
        $controller_name = 'AdminController';
        if (!empty($segments[1])) {
            if ($segments[1] === 'products') {
                $action_name = 'products';
            } elseif ($segments[1] === 'createProduct') {
                $action_name = 'createProduct';
            } elseif ($segments[1] === 'editProduct' && isset($segments[2])) {
                $action_name = 'editProduct';
            } elseif ($segments[1] === 'deleteProduct' && isset($segments[2])) {
                $action_name = 'deleteProduct';
            } elseif ($segments[1] === 'categories') {
                $action_name = 'categories';
            } elseif ($segments[1] === 'createCategory') {
                $action_name = 'createCategory';
            } elseif ($segments[1] === 'editCategory' && isset($segments[2])) {
                $action_name = 'editCategory';
            } elseif ($segments[1] === 'deleteCategory' && isset($segments[2])) {
                $action_name = 'deleteCategory';
            } elseif ($segments[1] === 'users') {
                $action_name = 'users';
            } elseif ($segments[1] === 'editUserRole' && isset($segments[2])) {
                $action_name = 'editUserRole';
            } elseif ($segments[1] === 'orders') {
                $action_name = 'orders';
            } elseif ($segments[1] === 'editOrderStatus' && isset($segments[2])) {
                $action_name = 'editOrderStatus';
            } else {
                $action_name = $segments[1];
            }
            $params = array_slice($segments, 2);
        }
    } elseif ($segment_0 === 'cart') {
        $controller_name = 'CartController';
        if (!empty($segments[1])) {
            $action_name = $segments[1];
            $params = array_slice($segments, 2);
        }
    } elseif ($segment_0 === 'checkout') {
        $controller_name = 'CheckoutController';
        if (!empty($segments[1])) {
            $action_name = $segments[1];
            $params = array_slice($segments, 2);
        }
    } elseif ($segment_0 === 'order') {
        $controller_name = 'OrderController';
        if (!empty($segments[1])) {
            $action_name = $segments[1];
            $params = array_slice($segments, 2);
        }
    } elseif ($segment_0 === 'logout') {
        $controller_name = 'AuthController';
        $action_name = 'logout';
    } elseif ($segment_0 === 'product' || $segment_0 === 'products') {
        $controller_name = 'ProductController';
        if (!empty($segments[1])) {
            if (is_numeric($segments[1])) { // Assuming product ID is numeric
                $action_name = 'show'; // Or 'detail'
                $params = [$segments[1]];
            } else {
                $action_name = $segments[1];
                $params = array_slice($segments, 2);
            }
        } else {
            $action_name = 'index';
        }
    } elseif ($segment_0 === 'about') {
        $controller_name = 'HomeController';
        $action_name = 'about';
    } elseif ($segment_0 === 'contact') {
        $controller_name = 'HomeController';
        $action_name = 'contact';
    } else {
        $controller_name = ucfirst($segment_0) . 'Controller';
        if (!empty($segments[1])) {
            $action_name = $segments[1];
            $params = array_slice($segments, 2);
        }
    }
}

$controller_file = __DIR__ . '/app/controllers/' . $controller_name . '.php';

if (file_exists($controller_file)) {
    require_once $controller_file;
    $controller = new $controller_name();

    if (method_exists($controller, $action_name)) {
        // Pass $_GET as an additional parameter if needed by the action
        call_user_func_array([$controller, $action_name], array_merge($params, [$_GET]));
    } else {
        // Handle 404 - Action not found
        echo "404 Not Found: Action " . $action_name . " not found in " . $controller_name;
    }
} else {
    // Handle 404 - Controller not found
    echo "404 Not Found: Controller " . $controller_name . " not found.";
}

?>
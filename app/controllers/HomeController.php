<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Category.php';

/**
 * HomeController
 * Handles requests related to the main public-facing pages of the application,
 * such as the home page, about page, and contact page.
 */
class HomeController extends Controller {
    private $productModel;
    private $categoryModel;

    /**
     * Constructor for HomeController.
     * Initializes the Product and Category models.
     */
    public function __construct() {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
    }

    /**
     * Displays the home page with a list of all products and categories.
     */
    public function index() {
        // Fetch all products
        $products = $this->productModel->getAllProducts();
        $categories = $this->categoryModel->getAllCategories();

        // Pass products and title to the view
        $this->view('home', [
            'title' => 'Welcome to Online Shop',
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Displays the "About Us" page.
     */
    public function about() {
        $categories = $this->categoryModel->getAllCategories();
        $this->view('pages/about', ['title' => 'About Us', 'categories' => $categories]);
    }

    /**
     * Displays the "Contact Us" page.
     */
    public function contact() {
        $categories = $this->categoryModel->getAllCategories();
        $this->view('pages/contact', ['title' => 'Contact Us', 'categories' => $categories]);
    }
}

?>

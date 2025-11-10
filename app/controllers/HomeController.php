<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Category.php';

class HomeController extends Controller {
    private $productModel;
    private $categoryModel;

    public function __construct() {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
    }

    public function index() {
        // ✅ Fetch all products
        $products = $this->productModel->getAllProducts();
        $categories = $this->categoryModel->getAllCategories();

        // ✅ Pass products and title to the view
        $this->view('home', [
            'title' => 'Welcome to Online Shop',
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function about() {
        $categories = $this->categoryModel->getAllCategories();
        $this->view('pages/about', ['title' => 'About Us', 'categories' => $categories]);
    }

    public function contact() {
        $categories = $this->categoryModel->getAllCategories();
        $this->view('pages/contact', ['title' => 'Contact Us', 'categories' => $categories]);
    }
}

?>

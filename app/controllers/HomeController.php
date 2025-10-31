<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Product.php';

class HomeController extends Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        // ✅ Fetch all products
        $products = $this->productModel->getAllProducts();

        // ✅ Pass products and title to the view
        $this->view('home', [
            'title' => 'Welcome to Online Shop',
            'products' => $products
        ]);
    }
}

?>

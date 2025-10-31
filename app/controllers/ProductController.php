<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Product.php';

class ProductController extends Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        $this->view('products/index', ['products' => $products, 'title' => 'All Products']);
    }

    public function category($categoryId) {
        $products = $this->productModel->getProductsByCategory($categoryId);
        // You might want to fetch category name here as well
        $this->view('products/index', ['products' => $products, 'title' => 'Products by Category']);
    }

    public function show($productId) {
        $product = $this->productModel->getProductById($productId);
        if ($product) {
            $this->view('products/show', ['product' => $product, 'title' => $product['name']]);
        } else {
            // Handle 404 - Product not found
            echo "404 Product Not Found";
        }
    }
}

?>
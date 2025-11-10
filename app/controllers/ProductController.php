<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Category.php';

class ProductController extends Controller {
    private $productModel;
    private $categoryModel;

    public function __construct() {
        $this->productModel = new Product();
        $this->categoryModel = new Category();
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        $categories = $this->categoryModel->getAllCategories();
        $this->view('products/index', ['products' => $products, 'title' => 'All Products', 'categories' => $categories]);
    }

    public function category($categoryId) {
        $products = $this->productModel->getProductsByCategory($categoryId);
        $categories = $this->categoryModel->getAllCategories();
        $category = $this->categoryModel->getCategoryById($categoryId);
        $this->view('products/index', ['products' => $products, 'title' => 'Products in ' . $category['name'], 'categories' => $categories]);
    }

    public function show($productId) {
        $product = $this->productModel->getProductById($productId);
        $categories = $this->categoryModel->getAllCategories();
        if ($product) {
            $this->view('products/show', ['product' => $product, 'title' => $product['name'], 'categories' => $categories]);
        } else {
            // Handle 404 - Product not found
            echo "404 Product Not Found";
        }
    }
}

?>
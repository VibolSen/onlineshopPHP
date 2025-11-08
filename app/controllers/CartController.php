<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Cart.php';
require_once __DIR__ . '/../models/Product.php'; // To get product details for cart view

class CartController extends Controller {
    private $cartModel;
    private $productModel;

    public function __construct() {
        $this->cartModel = new Cart();
        $this->productModel = new Product();
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? null;
            $quantity = $_POST['quantity'] ?? 1;

            if ($productId) {
                $product = $this->productModel->getProductById($productId);
                if ($product) {
                    $this->cartModel->addProduct($productId, $quantity);
                    // Redirect back to the product page or cart page
                    header('Location: /onlineshop/cart');
                    exit();
                } else {
                    // Handle product not found
                    echo "Product not found.";
                }
            } else {
                // Handle no product ID provided
                echo "Product ID not provided.";
            }
        }
    }

    public function index() {
        $cartItems = $this->cartModel->getCartItems();
        $productsInCart = [];
        $totalPrice = 0;

        foreach ($cartItems as $productId => $quantity) {
            $product = $this->productModel->getProductById($productId);
            if ($product) {
                $product['quantity'] = $quantity;
                $product['subtotal'] = $product['price'] * $quantity;
                $totalPrice += $product['subtotal'];
                $productsInCart[] = $product;
            }
        }

        $this->view('cart/index', [
            'cartItems' => $productsInCart,
            'totalPrice' => $totalPrice,
            'title' => 'Your Cart'
        ]);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? null;
            $quantity = $_POST['quantity'] ?? null;

            if ($productId && $quantity !== null) {
                $this->cartModel->updateQuantity($productId, $quantity);
            }
        }
        header('Location: /onlineshop/cart');
        exit();
    }

    public function remove() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? null;
            if ($productId) {
                $this->cartModel->removeProduct($productId);
            }
        }
        header('Location: /onlineshop/cart');
        exit();
    }

    public function clear() {
        $this->cartModel->clearCart();
        header('Location: /onlineshop/cart');
        exit();
    }
}

<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/Cart.php';
require_once __DIR__ . '/../models/Product.php';

class CheckoutController extends Controller {
    private $orderModel;
    private $cartModel;
    private $productModel;

    public function __construct() {
        $this->orderModel = new Order();
        $this->cartModel = new Cart();
        $this->productModel = new Product();
    }

    public function index() {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('auth/login');
        }

        $cartItems = $this->cartModel->getCartItems();
        if (empty($cartItems)) {
            header('Location: /onlineshop/cart');
            exit();
        }

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

        $this->view('checkout/index', [
            'cartItems' => $productsInCart,
            'totalPrice' => $totalPrice,
            'title' => 'Checkout'
        ]);
    }

    public function placeOrder() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user_id'])) {
                $this->redirect('auth/login');
            }

            $userId = $_SESSION['user_id'];
            $cartItems = $this->cartModel->getCartItems();

            if (empty($cartItems)) {
                header('Location: /onlineshop/cart');
                exit();
            }

            $totalAmount = 0;
            $orderItems = [];

            // Stock validation and preparation for order items
            foreach ($cartItems as $productId => $quantity) {
                $product = $this->productModel->getProductById($productId);
                if (!$product || $product['stock'] < $quantity) {
                    // Redirect back to cart with an error message (you might want to use a session flash message)
                    $_SESSION['error_message'] = 'Not enough stock for ' . ($product['name'] ?? 'a product') . '.';
                    header('Location: /onlineshop/cart');
                    exit();
                }
                $orderItems[] = [
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price' => $product['price']
                ];
                $totalAmount += ($product['price'] * $quantity);
            }

            if (!empty($orderItems)) {
                $orderId = $this->orderModel->createOrder($userId, $totalAmount, $orderItems);
                if ($orderId) {
                    // Decrease product stock
                    foreach ($orderItems as $item) {
                        $this->productModel->updateProductStock($item['product_id'], -$item['quantity']);
                    }

                    $this->cartModel->clearCart();
                    header('Location: /onlineshop/order/confirmation/' . $orderId);
                    exit();
                } else {
                    // Handle order creation failure
                    echo "Failed to create order.";
                }
            } else {
                echo "No items in cart to place order.";
            }
        }
    }
}

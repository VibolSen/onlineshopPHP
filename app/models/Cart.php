<?php

class Cart {
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addProduct($productId, $quantity = 1) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
        return true;
    }

    public function getCartItems() {
        return $_SESSION['cart'];
    }

    public function getTotalItems() {
        return array_sum($_SESSION['cart']);
    }

    public function removeProduct($productId) {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
            return true;
        }
        return false;
    }

    public function updateQuantity($productId, $quantity) {
        if (isset($_SESSION['cart'][$productId]) && $quantity > 0) {
            $_SESSION['cart'][$productId] = $quantity;
            return true;
        } elseif ($quantity <= 0) {
            return $this->removeProduct($productId);
        }
        return false;
    }

    public function clearCart() {
        $_SESSION['cart'] = [];
        return true;
    }
}

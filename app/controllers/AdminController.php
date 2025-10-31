<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Order.php';

class AdminController extends Controller {
    private $userModel;
    private $productModel;
    private $categoryModel;
    private $orderModel;

    public function __construct() {
        parent::__construct();
        $this->userModel = new User();
        $this->productModel = new Product();
        $this->categoryModel = new Category();
        $this->orderModel = new Order();

        // Check if user is logged in and has admin role
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            $this->redirect('login'); // Redirect to login if not authorized
        }
    }

    protected function view($viewName, $data = []) {
        extract($data);
        $contentView = $viewName . '.php';
        require_once __DIR__ . '/../views/admin/layout/admin_layout.php';
    }

    public function index() {
        $totalUsers = $this->userModel->countAllUsers();
        $totalProducts = count($this->productModel->getAllProducts());
        $totalOrders = $this->orderModel->countAllOrders();

        $this->view('index', [
            'title' => 'Admin Dashboard',
            'totalUsers' => $totalUsers,
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
        ]);
    }

    public function products() {
        $products = $this->productModel->getAllProducts();
        $this->view('products/index', ['title' => 'Manage Products', 'products' => $products]);
    }

    public function createProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $categoryId = $_POST['category_id'];
            $image = null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image_dir = __DIR__ . '/../../assets/images/';
                $image_name = uniqid() . '_' . basename($_FILES['image']['name']);
                $image_path = $image_dir . $image_name;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                    $image = $image_name;
                }
            }

            if ($this->productModel->createProduct($name, $description, $price, $stock, $categoryId, $image)) {
                $this->redirect('admin/products');
            } else {
                $categories = $this->categoryModel->getAllCategories();
                $this->view('products/create', ['title' => 'Create Product', 'categories' => $categories, 'error' => 'Failed to create product.']);
            }
        } else {
            $categories = $this->categoryModel->getAllCategories();
            $this->view('products/create', ['title' => 'Create Product', 'categories' => $categories]);
        }
    }

    public function editProduct($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $categoryId = $_POST['category_id'];
            $image = $_POST['current_image'] ?? null;

            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image_dir = __DIR__ . '/../../assets/images/';
                $image_name = uniqid() . '_' . basename($_FILES['image']['name']);
                $image_path = $image_dir . $image_name;
                if (move_uploaded_file($_FILES['image']['tmp_name'], $image_path)) {
                    $image = $image_name;
                }
            }

            if ($this->productModel->updateProduct($id, $name, $description, $price, $stock, $categoryId, $image)) {
                $this->redirect('admin/products');
            } else {
                $product = $this->productModel->getProductById($id);
                $categories = $this->categoryModel->getAllCategories();
                $this->view('products/edit', ['title' => 'Edit Product', 'product' => $product, 'categories' => $categories, 'error' => 'Failed to update product.']);
            }
        } else {
            $product = $this->productModel->getProductById($id);
            if (!$product) {
                $this->redirect('admin/products');
            }
            $categories = $this->categoryModel->getAllCategories();
            $this->view('products/edit', ['title' => 'Edit Product', 'product' => $product, 'categories' => $categories]);
        }
    }

    public function deleteProduct($id) {
        if ($this->productModel->deleteProduct($id)) {
            $this->redirect('admin/products');
        } else {
            // Handle error, maybe redirect with an error message
            $this->redirect('admin/products');
        }
    }

    public function categories() {
        $categories = $this->categoryModel->getAllCategories();
        $this->view('categories/index', ['title' => 'Manage Categories', 'categories' => $categories]);
    }

    public function createCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            if ($this->categoryModel->createCategory($name)) {
                $this->redirect('admin/categories');
            } else {
                $this->view('categories/create', ['title' => 'Create Category', 'error' => 'Failed to create category.']);
            }
        } else {
            $this->view('categories/create', ['title' => 'Create Category']);
        }
    }

    public function editCategory($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            if ($this->categoryModel->updateCategory($id, $name)) {
                $this->redirect('admin/categories');
            } else {
                $category = $this->categoryModel->getCategoryById($id);
                $this->view('categories/edit', ['title' => 'Edit Category', 'category' => $category, 'error' => 'Failed to update category.']);
            }
        } else {
            $category = $this->categoryModel->getCategoryById($id);
            if (!$category) {
                $this->redirect('admin/categories');
            }
            $this->view('categories/edit', ['title' => 'Edit Category', 'category' => $category]);
        }
    }

    public function deleteCategory($id) {
        if ($this->categoryModel->deleteCategory($id)) {
            $this->redirect('admin/categories');
        } else {
            // Handle error, maybe redirect with an error message
            $this->redirect('admin/categories');
        }
    }

    public function users() {
        $users = $this->userModel->getAllUsers();
        $this->view('users/index', ['title' => 'Manage Users', 'users' => $users]);
    }

    public function editUserRole($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $role = $_POST['role'];
            if ($this->userModel->updateUserRole($id, $role)) {
                $this->redirect('admin/users');
            } else {
                $user = $this->userModel->findById($id);
                $this->view('users/edit', ['title' => 'Edit User Role', 'user' => $user, 'error' => 'Failed to update user role.']);
            }
        } else {
            $user = $this->userModel->findById($id);
            if (!$user) {
                $this->redirect('admin/users');
            }
            $this->view('users/edit', ['title' => 'Edit User Role', 'user' => $user]);
        }
    }

    public function orders() {
        $orders = $this->orderModel->getAllOrders();
        $this->view('orders/index', ['title' => 'Manage Orders', 'orders' => $orders]);
    }

    public function editOrderStatus($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $_POST['status'];
            if ($this->orderModel->updateOrderStatus($id, $status)) {
                $this->redirect('admin/orders');
            } else {
                $order = $this->orderModel->getOrderById($id);
                $this->view('orders/edit', ['title' => 'Edit Order Status', 'order' => $order, 'error' => 'Failed to update order status.']);
            }
        }
        else {
            $order = $this->orderModel->getOrderById($id);
            if (!$order) {
                $this->redirect('admin/orders');
            }
            $this->view('orders/edit', ['title' => 'Edit Order Status', 'order' => $order]);
        }
    }
}

?>
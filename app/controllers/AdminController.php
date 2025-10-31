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
        $users = $this->userModel->getAllUsers();
        $products = $this->productModel->getAllProducts();
        $orders = $this->orderModel->getAllOrders();

        $this->view('index', [
            'title' => 'Admin Dashboard',
            'totalUsers' => $totalUsers,
            'totalProducts' => $totalProducts,
            'totalOrders' => $totalOrders,
            'users' => $users,
            'products' => $products,
            'orders' => $orders,
        ]);
    }

    public function products() {
        $search = $_GET['search'] ?? '';
        $category = $_GET['category'] ?? '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10; // Products per page
        $offset = ($page - 1) * $limit;
        $sort = $_GET['sort'] ?? 'id';
        $order = $_GET['order'] ?? 'asc';

        $products = $this->productModel->getProductsFiltered($search, $category, $limit, $offset, $sort, $order);
        $totalProducts = $this->productModel->countProductsFiltered($search, $category);
        $totalPages = ceil($totalProducts / $limit);

        $categories = $this->categoryModel->getAllCategories();
        $this->view('products/index', [
            'title' => 'Manage Products', 
            'products' => $products, 
            'categories' => $categories,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
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
        $search = $_GET['search'] ?? '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10; // Categories per page
        $offset = ($page - 1) * $limit;
        $sort = $_GET['sort'] ?? 'id';
        $order = $_GET['order'] ?? 'asc';

        $categories = $this->categoryModel->getCategoriesFiltered($search, $limit, $offset, $sort, $order);
        $totalCategories = $this->categoryModel->countCategoriesFiltered($search);
        $totalPages = ceil($totalCategories / $limit);

        $this->view('categories/index', [
            'title' => 'Manage Categories', 
            'categories' => $categories,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
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
        $search = $_GET['search'] ?? '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10; // Users per page
        $offset = ($page - 1) * $limit;
        $sort = $_GET['sort'] ?? 'id';
        $order = $_GET['order'] ?? 'asc';

        $users = $this->userModel->getUsersFiltered($search, $limit, $offset, $sort, $order);
        $totalUsers = $this->userModel->countUsersFiltered($search);
        $totalPages = ceil($totalUsers / $limit);

        $this->view('users/index', [
            'title' => 'Manage Users', 
            'users' => $users,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
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

    public function deleteUser($id) {
        if ($this->userModel->delete($id)) {
            $this->redirect('admin/users');
        } else {
            // Handle error, maybe redirect with an error message
            $this->redirect('admin/users');
        }
    }

    public function orders() {
        $status = $_GET['status'] ?? '';
        $search = $_GET['search'] ?? '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10; // Orders per page
        $offset = ($page - 1) * $limit;
        $sort = $_GET['sort'] ?? 'id';
        $order = $_GET['order'] ?? 'desc';

        $orders = $this->orderModel->getOrdersFiltered($status, $search, $limit, $offset, $sort, $order);
        $totalOrders = $this->orderModel->countOrdersFiltered($status, $search);
        $totalPages = ceil($totalOrders / $limit);

        foreach ($orders as &$order) {
            $order['details'] = $this->orderModel->getOrderDetails($order['id']);
        }
        $this->view('orders/index', [
            'title' => 'Manage Orders', 
            'orders' => $orders,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ]);
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
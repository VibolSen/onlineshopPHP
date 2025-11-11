<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../controllers/Controller.php'; // Ensure Controller is loaded for _t()

// Helper function to generate language switch URL
function getLanguageSwitchUrl($lang_code) {
    $query = $_GET;
    $query['lang'] = $lang_code;
    $path = explode('?', $_SERVER['REQUEST_URI'])[0];
    return $path . '?' . http_build_query($query);
}
?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang'] ?? DEFAULT_LANGUAGE; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title ?? Controller::_t('app_name')); ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanuman:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        <?php
        $current_lang = $_SESSION['lang'] ?? DEFAULT_LANGUAGE;
        if ($current_lang === 'km') {
            echo "body, .nav-link, .dropdown-item, .btn, h1, h2, h3, h4, h5, p, a, span, div { font-family: 'Hanuman', 'Poppins', sans-serif; }";
        } else {
            echo "body { font-family: 'Poppins', sans-serif; }";
        }
        ?>

        /* Fancy Navbar */
        body {
            padding-top: 70px; /* offset for fixed navbar */
        }

        .navbar {
            background: linear-gradient(135deg, #2b1055, #7597de);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.25);
            backdrop-filter: blur(8px);
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 1px;
            font-size: 1.5rem;
            text-transform: uppercase;
            transition: color 0.3s ease;
        }

        .navbar-brand:hover {
            color: #ffd369 !important;
        }

        .nav-link {
            font-weight: 500;
            color: #f1f1f1 !important;
            transition: all 0.3s ease;
            margin: 0 6px;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #ffd369;
            transition: 0.3s;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link:hover {
            color: #ffd369 !important;
        }

        /* Mobile Menu */
        .navbar-toggler {
            border: none;
            outline: none;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        /* Modal Forms */
        .form-container {
            width: 100%;
            max-width: 350px;
            margin: 0 auto;
            padding: 25px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: 600;
            color: #2b1055;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(-15px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <a class="navbar-brand text-white" href="<?php echo BASE_URL; ?>">
                <i class="bi bi-bag-heart-fill mr-1"></i> <?php echo Controller::_t('app_name'); ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>products"><?php echo Controller::_t('products'); ?></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo Controller::_t('categories'); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <a class="dropdown-item" href="<?php echo BASE_URL; ?>products"><?php echo Controller::_t('all_categories'); ?></a>
                            <?php if (isset($categories)): ?>
                                <?php foreach ($categories as $category): ?>
                                    <a class="dropdown-item" href="<?php echo BASE_URL; ?>products/category/<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>about"><?php echo Controller::_t('about_us'); ?></a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>contact"><?php echo Controller::_t('contact_us'); ?></a>
                    </li>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>cart"><i class="bi bi-cart-fill"></i> <?php echo Controller::_t('cart'); ?></a></li>

                        <?php if ($_SESSION['role'] === 'admin'): ?>
                            <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>admin"><i class="bi bi-speedometer2"></i> <?php echo Controller::_t('admin_panel'); ?></a></li>
                        <?php endif; ?>

                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>profile"><i class="bi bi-person-circle"></i> <?php echo Controller::_t('profile'); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>logout"><i class="bi bi-box-arrow-right"></i> <?php echo Controller::_t('logout'); ?></a></li>

                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"><?php echo Controller::_t('login'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal"><?php echo Controller::_t('register'); ?></a>
                        </li>
                    <?php endif; ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-globe"></i> <?php echo Controller::_t('language'); ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                            <?php foreach (AVAILABLE_LANGUAGES as $lang_code): ?>
                                <a class="dropdown-item <?php echo (($_SESSION['lang'] ?? DEFAULT_LANGUAGE) === $lang_code) ? 'active' : ''; ?>" href="<?php echo getLanguageSwitchUrl($lang_code); ?>">
                                    <?php echo Controller::_t($lang_code === 'en' ? 'english' : 'khmer'); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <?php require __DIR__ . '/../auth/login_modal.php'; ?>
    <?php require __DIR__ . '/../auth/register_modal.php'; ?>

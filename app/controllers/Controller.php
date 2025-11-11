<?php

class Controller {
    public static $translations = [];

    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Load language when controller is instantiated
        self::loadLanguage();
    }

    public static function loadLanguage() {
        $lang = DEFAULT_LANGUAGE; // Default language

        // Prioritize GET parameter for language switching
        if (isset($_GET['lang']) && in_array($_GET['lang'], AVAILABLE_LANGUAGES)) {
            $lang = $_GET['lang'];
            $_SESSION['lang'] = $lang; // Persist in session
        }
        // Fallback to session language
        else if (isset($_SESSION['lang']) && in_array($_SESSION['lang'], AVAILABLE_LANGUAGES)) {
            $lang = $_SESSION['lang'];
        } 

        $langFile = __DIR__ . '/../lang/' . $lang . '.php';
        if (file_exists($langFile)) {
            self::$translations = require $langFile;
        } else {
            // Fallback to default language if selected language file is missing
            self::$translations = require __DIR__ . '/../lang/' . DEFAULT_LANGUAGE . '.php';
        }
    }

    public static function _t($key) {
        return self::$translations[$key] ?? $key;
    }

    protected function view($viewName, $data = []) {
        extract($data);
        require_once VIEW_PATH . $viewName . '.php';
    }

    protected function redirect($path) {
        header("Location: " . BASE_URL . $path); 
        exit();
    }
}

?>
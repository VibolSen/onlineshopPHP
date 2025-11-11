<?php
class Controller {
    public static $translations = [];

    /**
     * Constructor for the Controller.
     * Ensures a session is started if not already active and loads the appropriate language settings.
     */
    public function __construct() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Load language when controller is instantiated
        self::loadLanguage();
    }

    /**
     * Loads the appropriate language file based on GET parameter, session, or default.
     * The loaded translations are stored in the static $translations property.
     */
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

    /**
     * Translates a given key using the loaded translations.
     * If the key is not found, the key itself is returned.
     *
     * @param string $key The translation key.
     * @return string The translated string or the key if not found.
     */
    public static function _t($key) {
        return self::$translations[$key] ?? $key;
    }

    /**
     * Renders a specified view file, making the provided data available to the view.
     *
     * @param string $viewName The name of the view file (e.g., 'home', 'products/index').
     * @param array $data An associative array of data to be extracted and used in the view.
     */
    protected function view($viewName, $data = []) {
        extract($data);
        require_once VIEW_PATH . $viewName . '.php';
    }

    /**
     * Redirects the user to a specified URL path.
     *
     * @param string $path The path to redirect to (e.g., 'home', 'admin/products').
     */
    protected function redirect($path) {
        header("Location: " . BASE_URL . $path); 
        exit();
    }
}

?>
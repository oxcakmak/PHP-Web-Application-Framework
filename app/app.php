<?php
/**
 * Main application file
 * 
 * This file loads configurations, sets up autoloading,
 * and prepares the application container.
 */

// Load main configuration
require_once __DIR__ . '/config.php';

// Create application container
if (!isset($app)) {
    $app = new stdClass();
}

// Load autoloader
require_once __DIR__ . '/autoload.php';

// Initialize autoloading functions
initialize_autoloader($app);

// Configure error handling
if (isset($config['app']['debug']) && $config['app']['debug']) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Start session if needed
if (!isset($config['app']['session']) || $config['app']['session'] === true) {
    session_start();
}

// Add configuration to $app
$app->config = $config;

// Set global $app variable for easier access
global $app;

// Database connection
$app->db = new PDODb(
    $config['database']['host'], 
    $config['database']['username'], 
    $config['database']['password'], 
    $config['database']['name'], 
    $config['database']['port']
);

// Cache
$app->cache = new CatcHe($config['cache']['path']);

// Template
$app->tpl = new Template(__DIR__ . '/../views', 'html');
$app->template = '';

// Url
$app->url = new url;
$app->segments = $app->url->getSegments();
$app->location = '';

if (!empty($app->segments)) {
    $locations = [];
    foreach ($app->segments as $segment) {
        if (!empty($segment)) {
            $locations[] = $segment;
        }
    }
    $app->location = implode('/', $locations);
}

// Return $app so it can be used immediately when included
return $app;
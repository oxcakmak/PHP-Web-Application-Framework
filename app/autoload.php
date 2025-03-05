<?php
/**
 * PSR Autoloading Functions
 */

/**
 * SPL autoload function for automatically loading classes
 */
function autoload_classes($className) {
    // Convert namespace separators to directory separators
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    
    // Check if class exists in app/classes directory
    $classPath = __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($classPath)) {
        require_once $classPath;
        return;
    }
}

/**
 * Load all files from Collection directory and add them to $app object
 * 
 * @param object $app Application container object
 */
function load_collections(&$app) {
    $collectionPath = __DIR__ . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'Collection';
    if (!is_dir($collectionPath)) {
        return;
    }
    
    $files = scandir($collectionPath);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
            $filePath = $collectionPath . DIRECTORY_SEPARATOR . $file;
            require_once $filePath;
            
            // Extract class name from file name (without .php extension)
            $className = pathinfo($file, PATHINFO_FILENAME);
            
            // If class exists, instantiate it and add to $app
            if (class_exists($className)) {
                $app->{lcfirst($className)} = new $className();
            }
        }
    }
}

// Register SPL autoload function
spl_autoload_register('autoload_classes');

/**
 * Initialize all autoloading processes
 * 
 * @param object $app Application container object
 */
function initialize_autoloader(&$app) {
    // Load Collection classes
    load_collections($app);
}
?>
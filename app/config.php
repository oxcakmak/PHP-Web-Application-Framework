<?php
/**
 * Main Configuration File
 * 
 * This file contains all application configuration settings
 */

// Create config array with nested structure
$config = [];

// Application settings
$config['app']['name'] = 'My Application';
$config['app']['version'] = '1.0.0';
$config['app']['debug'] = true;
$config['app']['timezone'] = 'UTC';
$config['app']['locale'] = 'en';
$config['app']['session'] = true;
$config['app']['url'] = 'http://localhost/';
$config['app']['api_url'] = 'http://localhost/api/';

// Database settings
$config['database']['driver'] = 'mysql';
$config['database']['host'] = 'localhost';
$config['database']['name'] = 'kostiya';
$config['database']['username'] = 'root';
$config['database']['password'] = '';
$config['database']['charset'] = 'utf8mb4';
$config['database']['collation'] = 'utf8mb4_unicode_ci';
$config['database']['port'] = 3306;
$config['database']['prefix'] = '';

// Cache settings
$config['cache']['driver'] = 'file';
$config['cache']['path'] = __DIR__ . '/../storage/cache';
$config['cache']['ttl'] = 3600; // 1 hour in seconds

// Logging settings
$config['log']['enabled'] = true;
$config['log']['level'] = 'debug'; // debug, info, warning, error
$config['log']['path'] = __DIR__ . '/../storage/logs';

// Mail settings
$config['mail']['driver'] = 'smtp';
$config['mail']['host'] = 'smtp.mailtrap.io';
$config['mail']['port'] = 2525;
$config['mail']['username'] = null;
$config['mail']['password'] = null;
$config['mail']['encryption'] = null;
$config['mail']['from']['address'] = 'hello@example.com';
$config['mail']['from']['name'] = 'Example';

// Security settings
$config['security']['csrf_token'] = true;
$config['security']['encryption_key'] = 'your-secure-encryption-key';
$config['security']['password_hash_cost'] = 10;

// Custom application paths
$config['paths']['classes'] = __DIR__ . '/classes';
$config['paths']['models'] = __DIR__ . '/models';
$config['paths']['controllers'] = __DIR__ . '/controllers';
$config['paths']['views'] = __DIR__ . '/../resources/views';
$config['paths']['storage'] = __DIR__ . '/../storage';

// Set timezone
date_default_timezone_set($config['app']['timezone']);

// Return $config array if this file is included directly
return $config;
?>
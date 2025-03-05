<?php
require_once __DIR__ . '/app/app.php';

if(strpos($app->location, 'api') === 0){
    $api_parts = explode('/', $app->location);
    if(count($api_parts) >= 2) {
        $api_file = __DIR__ . '/api/' . $api_parts[1] . '/' . $api_parts[2] . '.php';
        if(file_exists($api_file)) {
            require_once $api_file;
            exit;
        }
    }
} else {
    switch($app->location){
        case 'home':
            $app->template = 'home';
            break;
        default:
            $app->template = 'index';
            break;
    }
    
    echo $app->tpl->load($app->template);
    exit;
}
?>
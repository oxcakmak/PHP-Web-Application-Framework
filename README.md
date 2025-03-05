# PHP Web Application Framework

A lightweight PHP web application framework with routing, template engine, database management, and API support.

## Directory Structure

```
📦 root
 ┣ 📂 api
 ┃ ┣ 📂 auth
 ┃ ┗ 📂 user
 ┣ 📂 app
 ┃ ┣ 📂 classes
 ┃ ┃ ┣ 📂 Collection
 ┃ ┃ ┗ 📂 PdoDb
 ┃ ┣ 📜 app.php
 ┃ ┣ 📜 autoload.php
 ┃ ┗ 📜 config.php
 ┣ 📂 locales
 ┃ ┣ 📂 en
 ┃ ┗ 📂 tr
 ┣ 📂 storage
 ┃ ┣ 📂 cache
 ┃ ┣ 📂 logs
 ┃ ┗ 📂 media
 ┣ 📂 views
 ┃ ┣ 📜 home.html
 ┃ ┗ 📜 index.html
 ┗ 📜 index.php
```

## Features

- **Routing System**: Supports both web and API routes
- **Database Management**: PDO-based database abstraction layer
- **Template Engine**: Simple HTML template system
- **Multilingual Support**: Localization with en/tr language support
- **Collection System**: Utility classes for common operations
- **Cache Management**: File-based caching system
- **Storage Management**: Organized media and log storage

## Core Components

### PDODb Class
Database management class with features:
- Connection pooling
- Query builder
- Prepared statements
- Transaction support

### Template Engine
Simple template engine supporting:
- HTML templates
- Variable substitution
- Basic template inheritance

### API Routing
Supports RESTful API endpoints with:
- Authentication routes
- User management
- JSON responses

## Configuration

The application configuration is stored in `app/config.php`. Key configuration areas include:

- Database settings
- Cache settings
- Application debug mode
- Session management
- Template paths

## Usage Examples

### Database Operations
```php
// Query example
$users = $app->db->query("SELECT * FROM users");

// Using query builder
$app->db->where('id', 1)->get('users');
```

### Template Rendering
```php
// Load and display template
echo $app->tpl->load('home');
```

### API Routing
```php
// API endpoint handling
if(strpos($app->location, 'api') === 0) {
    $api_parts = explode('/', $app->location);
    // Handle API request
}
```

## Directory Permissions

Required permissions for key directories:
- `storage/cache`: Write permission
- `storage/logs`: Write permission
- `storage/media`: Write permission

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache/Nginx web server
- PDO PHP Extension
- mod_rewrite enabled

## Installation

1. Clone the repository
2. Configure your web server to point to the project root
3. Copy and configure `app/config.php`
4. Set appropriate permissions for storage directories
5. Access the application through your web browser

## License

This project is licensed under the MIT License - see the LICENSE file for details.

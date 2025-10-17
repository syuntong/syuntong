# Quick Setup Guide

This document provides a quick reference for setting up the project.

## Initial Setup

### 1. Install Dependencies

```bash
cd api
composer install
cd ..
```

Or use the install script:
```bash
cd api
./install.sh
cd ..
```

### 2. Configure Environment

```bash
cp .env.example .env
```

Edit `.env` and update:
- Database credentials (DB_HOST, DB_NAME, DB_USER, DB_PASSWORD)
- JWT secret key (JWT_SECRET) - use a strong random string
- External API keys as needed

### 3. Set Up Database

Create a MySQL/MariaDB database matching your DB_NAME in .env:

```sql
CREATE DATABASE app_database CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 4. Run the Application

#### Backend API:
```bash
cd api/public
php -S localhost:8000
```

API available at: http://localhost:8000

#### Frontend:
```bash
php -S localhost:8080
```

Frontend available at: http://localhost:8080

Or simply open `index.html` in a browser.

## Development

### Directory Structure

```
project/
├── api/                    # Backend API
│   ├── public/            # Entry point (index.php)
│   ├── src/               # Source code
│   │   ├── Config/       # Configuration classes
│   │   ├── Controller/   # Controllers
│   │   ├── Database/     # Database connection
│   │   └── Util/         # Utilities (JWT, Response)
│   ├── tests/            # PHPUnit tests
│   ├── bootstrap.php     # Application bootstrap
│   ├── composer.json     # Dependencies
│   └── phpunit.xml       # Test configuration
├── css/                   # Frontend styles
├── js/                    # Frontend JavaScript
├── index.html            # Frontend entry point
├── .env.example          # Environment template
└── README.md             # Full documentation
```

### Testing

Run tests:
```bash
cd api
composer test
```

### Adding PHP Packages

```bash
cd api
composer require vendor/package-name
```

### Key Classes

- `App\Config\Config` - Environment configuration
- `App\Database\Database` - Database connection
- `App\Util\JWT` - JWT token handling
- `App\Util\Response` - API response helpers
- `App\Controller\BaseController` - Base controller with common methods

## Security Checklist

- [ ] Change JWT_SECRET to a strong random value
- [ ] Set APP_DEBUG=false in production
- [ ] Configure proper database credentials
- [ ] Set appropriate file permissions
- [ ] Enable HTTPS in production
- [ ] Never commit .env file to version control

## Troubleshooting

### Composer not found
Run the install script in `api/install.sh` or install Composer manually from https://getcomposer.org

### Database connection errors
- Verify database exists
- Check credentials in .env
- Ensure MySQL/MariaDB is running
- Verify host and port settings

### JWT errors
- Ensure JWT_SECRET is set in .env
- Verify firebase/php-jwt is installed via Composer

## Next Steps

1. Set up database migrations
2. Create authentication endpoints
3. Build API routes and controllers
4. Develop frontend UI
5. Add proper error handling
6. Implement logging
7. Write comprehensive tests

For detailed information, see README.md and CONTRIBUTING.md.

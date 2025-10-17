# Application

A modern web application with PHP backend API and frontend interface.

## Project Structure

```
.
├── api/                    # Backend API
│   ├── public/            # Public entry point
│   │   └── index.php      # API entry script
│   ├── src/               # Application source code
│   │   └── Controller/    # Controllers
│   ├── composer.json      # PHP dependencies
│   └── vendor/            # Composer dependencies (auto-generated)
├── js/                    # Frontend JavaScript
│   └── app.js             # Main application script
├── index.html             # Frontend entry point
├── .env.example           # Environment configuration example
└── README.md              # This file
```

## Requirements

- PHP >= 7.4
- Composer
- MySQL or MariaDB
- Web server (Apache/Nginx) or PHP built-in server

## Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd <project-directory>
   ```

2. **Install backend dependencies**
   ```bash
   cd api
   composer install
   cd ..
   ```

3. **Configure environment**
   ```bash
   cp .env.example .env
   ```
   
   Edit `.env` and update the configuration values:
   - Database credentials
   - JWT secret key
   - External API keys
   - Other application settings

4. **Set up the database**
   - Create a database with the name specified in `.env`
   - Run any migration scripts (to be added)

## Running the Application

### Development Mode

#### Backend API
```bash
cd api/public
php -S localhost:8000
```

The API will be available at `http://localhost:8000`

#### Frontend
You can serve the frontend using any static file server or simply open `index.html` in your browser.

Using PHP built-in server:
```bash
php -S localhost:8080
```

The frontend will be available at `http://localhost:8080`

## Configuration

All configuration is managed through environment variables defined in the `.env` file.

### Database Configuration
- `DB_HOST`: Database host
- `DB_PORT`: Database port
- `DB_NAME`: Database name
- `DB_USER`: Database user
- `DB_PASSWORD`: Database password

### JWT Configuration
- `JWT_SECRET`: Secret key for JWT token generation (change in production!)
- `JWT_ALGORITHM`: Algorithm for JWT encoding (default: HS256)
- `JWT_EXPIRATION`: Token expiration time in seconds

### External API Keys
Add your external API keys in the appropriate environment variables.

## Development

### Backend Structure

The backend follows PSR-4 autoloading standards with the `App` namespace mapped to `api/src/`.

Example:
- `App\Controller\BaseController` → `api/src/Controller/BaseController.php`

### Adding Dependencies

To add new PHP packages:
```bash
cd api
composer require vendor/package-name
```

## API Endpoints

Documentation for API endpoints will be added as they are developed.

## Testing

```bash
cd api
composer test
```

## Security

- Always use strong, unique values for `JWT_SECRET` in production
- Never commit `.env` files to version control
- Keep dependencies up to date
- Follow security best practices for API development

## License

[Add your license information here]

## Contributors

[Add contributor information here]

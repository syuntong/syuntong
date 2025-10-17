# Contributing to the Project

Thank you for considering contributing to this project! This document provides guidelines and instructions for contributing.

## Getting Started

1. Fork the repository
2. Clone your fork locally
3. Install dependencies (see README.md)
4. Create a new branch for your feature or bugfix

## Development Workflow

### Backend Development

1. Navigate to the `/api` directory
2. Install Composer dependencies if not already done:
   ```bash
   cd api
   composer install
   ```
3. Make your changes in the appropriate directories:
   - Controllers: `api/src/Controller/`
   - Utilities: `api/src/Util/`
   - Database: `api/src/Database/`
   - Configuration: `api/src/Config/`

### Frontend Development

1. Work on HTML, CSS, and JavaScript files in the root directory
2. HTML: `index.html`
3. CSS: `css/style.css`
4. JavaScript: `js/app.js`

## Code Style

### PHP

- Follow PSR-12 coding standards
- Use strict types: `declare(strict_types=1);`
- Use type hints for function parameters and return types
- Document complex logic with comments
- Keep classes focused and single-purpose

### JavaScript

- Use modern ES6+ syntax
- Keep functions small and focused
- Use meaningful variable and function names
- Add comments for complex logic

### CSS

- Use meaningful class names
- Organize styles logically
- Keep selectors simple and maintainable

## Testing

### Backend Tests

Run PHPUnit tests:
```bash
cd api
composer test
```

Run tests with coverage:
```bash
composer test:coverage
```

### Writing Tests

- Place test files in `api/tests/`
- Test file names should end with `Test.php`
- Extend `PHPUnit\Framework\TestCase`
- Test one thing per test method
- Use descriptive test method names

## Committing Changes

1. Write clear, descriptive commit messages
2. Keep commits focused on a single change
3. Reference issues in commit messages when applicable

### Commit Message Format

```
<type>: <subject>

<body>

<footer>
```

Types:
- `feat`: A new feature
- `fix`: A bug fix
- `docs`: Documentation changes
- `style`: Code style changes (formatting, etc.)
- `refactor`: Code refactoring
- `test`: Adding or updating tests
- `chore`: Maintenance tasks

## Pull Requests

1. Ensure your code follows the project's code style
2. Write or update tests for your changes
3. Update documentation if needed
4. Create a pull request with a clear description
5. Reference any related issues

## Questions?

If you have questions, please open an issue or reach out to the maintainers.

# Laravel Bladeless CMS

A modern content management system built with Laravel 12, featuring a blade-less architecture for flexible content management.

## Features

- Built on Laravel 12 framework
- SQLite database (default)
- Vite-based asset bundling with Tailwind CSS
- Queue system for background jobs
- Session management
- Blade-less architecture for flexible rendering

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite (or configured alternative database)

## Installation

### Quick Setup

Run the automated setup command:

```bash
composer run setup
```

This will:
1. Install PHP dependencies via Composer
2. Create `.env` file from `.env.example`
3. Generate application key
4. Run database migrations
5. Install Node dependencies
6. Build frontend assets

### Manual Setup

If you prefer to set up manually:

```bash
# Install PHP dependencies
composer install

# Create environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Create SQLite database
touch database/database.sqlite

# Run migrations
php artisan migrate

# Install Node dependencies
npm install

# Build assets
npm run build
```

## Development

### Start Development Server

Use the provided development command that runs multiple services concurrently:

```bash
composer run dev
```

This starts:
- PHP development server (port 8000)
- Queue listener
- Pail logs viewer
- Vite development server (port 5173)

Alternatively, run services individually:

```bash
# PHP server
php artisan serve

# Queue listener
php artisan queue:listen

# View logs
php artisan pail

# Frontend dev server
npm run dev
```

### Build Assets

```bash
npm run build
```

## Testing

Run tests with:

```bash
composer run test
```

This clears config cache and runs PHPUnit tests.

## Environment Configuration

Copy `.env.example` to `.env` and configure:

```bash
cp .env.example .env
```

Key settings:
- `APP_NAME` - Application name
- `APP_ENV` - Environment (local/production)
- `APP_DEBUG` - Debug mode
- `DB_CONNECTION` - Database type (default: sqlite)
- `QUEUE_CONNECTION` - Queue driver (default: database)

## Project Structure

```
├── app/
│   ├── Http/
│   │   └── Controllers/
│   ├── Models/
│   └── Providers/
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── resources/
│   ├── css/
│   └── js/
├── routes/
│   └── web.php
├── tests/
├── public/
├── bootstrap/
└── config/
```

## Available Commands

### Application

- `php artisan serve` - Start development server
- `php artisan migrate` - Run database migrations
- `php artisan tinker` - Interactive shell
- `php artisan queue:listen` - Listen for queue jobs
- `php artisan pail` - Stream logs in real-time

### Development Tools

- `composer run dev` - Run all services concurrently
- `composer run setup` - Initial project setup
- `composer run test` - Run tests
- `npm run dev` - Start Vite dev server
- `npm run build` - Build assets for production

### Code Quality

- `./vendor/bin/pint` - Format code (Laravel Pint)
- `./vendor/bin/phpunit` - Run tests

## Database

By default, the application uses SQLite. The database file is stored at `database/database.sqlite`.

To switch to a different database (MySQL, PostgreSQL, etc.), update the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cms_app
DB_USERNAME=root
DB_PASSWORD=
```

Then run migrations:

```bash
php artisan migrate
```

## Storage

Application storage is configured with:
- Session: Database driver
- Cache: Database driver
- Queue: Database driver
- Filesystem: Local driver

Configure these in `.env` for production deployments.

## Deployment

### Pre-deployment Checklist

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Generate application key (if not already done)
4. Run migrations on production database
5. Build frontend assets: `npm run build`
6. Set proper file permissions for storage and bootstrap directories
7. Configure web server to point to `public/` directory

### Production Configuration

Important `.env` settings for production:

```env
APP_ENV=production
APP_DEBUG=false
ASSET_URL=/
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

Ensure your web server (Apache/Nginx) is configured to serve from the `public/` directory.

## Support & Contributing

For issues or contributions, please refer to the project's contribution guidelines.

## License

This project is licensed under the MIT License - see the LICENSE file for details.

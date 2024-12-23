# Laravel Project Setup Guide

This guide will walk you through the process of cloning and setting up a Laravel project from start to finish.

## Prerequisites

Before you begin, make sure you have the following installed on your system:

-   PHP >= 8.1
-   Composer
-   Git
-   Node.js & NPM (for frontend assets)

## Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/username/project-name.git
cd project-name
```

### 2. Install Dependencies

Install PHP dependencies:

```bash
composer install
```

Install NPM packages (if the project uses frontend assets):

```bash
npm install
```

### 3. Environment Setup

Copy the example environment file:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 4. Configure Environment Variables

Open `.env` file and update the following:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 5. Database Setup

Create your database, then run migrations:

```bash
php artisan migrate
```

(Optional) Seed the database:

```bash
php artisan db:seed
```

### 6. Storage and Permissions

Set storage permissions:

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

Create storage link:

```bash
php artisan storage:link
```

### 7. Compile Assets (if using frontend assets)

For development:

```bash
npm run dev
```

For production:

```bash
npm run build
```

### 8. Start Development Server

```bash
php artisan serve
```

The application will be available at `http://127.0.0.1:8000`

## Common Issues

### Storage Permission Issues

If you encounter storage permission issues:

```bash
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
```

### Composer Memory Limit

If Composer runs out of memory:

```bash
COMPOSER_MEMORY_LIMIT=-1 composer install
```

### Artisan Command Not Found

If artisan commands aren't working:

```bash
composer dump-autoload
```

## Additional Commands

Clear application cache:

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## Contributing

Please read our [Contributing Guide](CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

## License

This project is licensed under the [MIT License](LICENSE.md).

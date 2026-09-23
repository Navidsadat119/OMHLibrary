# OMH Library — کتابخانه عمرمختار هاشمی

A deployable Laravel starter for the OMH Library project.

## Included in this build
- Classic OMH/Aqeedeh-inspired library UI
- Home page and long library introduction
- Three distinct public sections:
  - علوم
  - فنون درسی
  - کتاب‌های مکتب
- Books, authors, volumes, categories, tags
- Commentary/annotation relationships
- Featured books carousel
- Search across books/authors/sciences
- Book submission workflow
- Admin-ready database structure
- Persian/Arabic/Pashto/English UI foundation
- Dark/light theme
- Secure download endpoint
- Seed data for immediate preview

## Stack
- PHP 8.2+
- Laravel 11+
- MySQL 8+ / MariaDB 10.6+
- Blade
- Vanilla JS/CSS
- Vite

## Local setup
```bash
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
npm install
npm run build
php artisan storage:link
php artisan serve
```

## Deployment
Set the web root/document root to `public/`, configure the database in `.env`, run:
```bash
composer install --no-dev --optimize-autoloader
php artisan migrate --seed --force
npm install
npm run build
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

This repository is deliberately structured so PDF reader, OCR/search engine, PWA, queues, analytics and advanced admin modules can be added without replacing the core data model.

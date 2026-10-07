# راهنمای استقرار OMH Library روی Web Server

## نیازمندی‌ها
- Apache 2.4 یا Nginx
- PHP 8.3+
- PHP extensions: `pdo`, `pdo_pgsql`, `mbstring`, `fileinfo`, `openssl`, `json`
- دسترسی HTTPS
- یک پروژه Supabase

## Apache
DocumentRoot را روی پوشه `public/` تنظیم کنید. فایل `.htaccess` داخل public مسیرهای PHP را به `index.php` هدایت می‌کند.

نمونه:

```apache
<VirtualHost *:443>
    ServerName library.example.com
    DocumentRoot /var/www/omh-library/public

    <Directory /var/www/omh-library/public>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

## Nginx + PHP-FPM
Document root باید `/public` باشد و درخواست‌های غیرواقعی به `index.php` بروند. اجرای PHP را فقط از طریق PHP-FPM انجام دهید.

## Supabase
1. در Supabase یک Project بسازید.
2. از SQL Editor فایل `supabase/schema.sql` را اجرا کنید.
3. اطلاعات اتصال PostgreSQL را از Connect > Session Pooler بگیرید.
4. روی سرور `.env` بسازید و اطلاعات Supabase را وارد کنید.
5. یک‌بار اجرا کنید:

```bash
php database/migrate.php
php database/seed.php
```

بعد از آن migration و seed نباید در startup سایت یا هر request اجرا شوند.

## فایل‌های آپلودی
دسترسی نوشتن به `uploads/` و `storage/` را فقط به کاربر Web Server بدهید. فایل `.env` نباید داخل DocumentRoot عمومی قرار گیرد.

## امنیت
- `APP_DEBUG=false`
- `APP_KEY` طولانی و تصادفی
- HTTPS اجباری
- رمز مدیر فقط به‌صورت hash در دیتابیس
- Supabase service-role key در JavaScript یا HTML قرار نگیرد

# OMH Library + Supabase

Supabase is used only as the PostgreSQL database for OMH Library. The PHP application is deployed separately on a normal Apache/Nginx web server.

## 1. Create the Supabase project
Create a project in Supabase and open **SQL Editor**.

## 2. Create the schema
Run `schema.sql` in SQL Editor.

## 3. Optional initial catalog
The application seed is PHP-based because it uses the application's database layer. After uploading the website and configuring `.env`, run:

```bash
php database/migrate.php
php database/seed.php
```

## 4. Connection
Use the Supabase **Session Pooler** for a normal PHP web server when possible. Copy its host, port, database, username and password into `.env`.

Never put the Supabase service-role key in browser JavaScript. The PHP server should connect to PostgreSQL using the database credentials.

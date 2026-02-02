## BlogApp

A simple blog application built with **Laravel 10**, featuring **authentication**, **blog CRUD**, **image upload**, and **search + pagination**.

### Features

- **Auth**: register, login, logout (session-based)
- **Blog posts**: create, read, update, delete
- **Image uploads**: uploads saved to `public/images`
- **Search**: filter by `title` / `description` using `?search=...`
- **Pagination**: 5 posts per page

### Tech stack

- **Backend**: Laravel 10 (PHP ^8.1)
- **Frontend**: Blade templates + Vite
- **Database**: MySQL (default in `.env.example`)

## Local setup

### Requirements

- **PHP**: 8.1+
- **Composer**
- **Node.js** + **npm**
- **MySQL**

### Install

1) Install PHP dependencies:

```bash
composer install
```

2) Create your environment file:

- **Windows (PowerShell)**:

```powershell
Copy-Item .env.example .env
```

- **macOS/Linux**:

```bash
cp .env.example .env
```

3) Generate an application key:

```bash
php artisan key:generate
```

4) Configure database settings in `.env`:

- `DB_DATABASE=blogapp`
- `DB_USERNAME=...`
- `DB_PASSWORD=...`

5) Run migrations:

```bash
php artisan migrate
```

6) Install frontend dependencies:

```bash
npm install
```

### Run (development)

In one terminal:

```bash
php artisan serve
```

In another terminal:

```bash
npm run dev
```

Open the app at `http://127.0.0.1:8000`.

### Build (production assets)

```bash
npm run build
```

## Routes (web)

These are defined in `routes/web.php`:

- **Home (list + search + pagination)**: `GET /`
- **Show blog**: `GET /blog/{id}`
- **Create blog (auth)**: `GET /blog/create`
- **Store blog (auth)**: `POST /blog/store`
- **Edit blog (auth)**: `GET /blog/edit/{id}`
- **Update blog (auth)**: `PUT /blog/update/{id}`
- **Delete blog (auth)**: `DELETE /blog/delete/{id}`
- **Profile (auth)**: `GET /profile`
- **Login page**: `GET /auth/login`
- **Login submit**: `POST /auth/login`
- **Register page**: `GET /auth/register`
- **Register submit**: `POST /auth/register`
- **Logout (auth)**: `POST /logout`

## Uploads (`public/images`)

Blog images are stored in `public/images` (see `app/Http/Controllers/blogController.php`).

- Make sure the `public/images` directory exists and is writable.
- In this repo, `public/images/` currently contains local images and may not be committed/present on other machines.

## Tests

```bash
php artisan test
```

## Notes / TODO

- **Security**: `app/Http/Controllers/userController.php` currently creates users via `User::create(...)`. Ensure passwords are **hashed** (e.g. `Hash::make`) before using this in production.

## Author

Abdul Ahad

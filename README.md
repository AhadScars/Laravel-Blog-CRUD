# BlogApp

> **Write posts. Share your voice. Built with Laravel.**

A clean, full-featured blog where users sign up, publish posts with images and tags, and let readers discover authors. Perfect for a portfolio piece or a starter for your own content site.

---

## What's inside

**For readers** — Browse all posts on the home page, search by title or tags, open any post, and click the author’s name to see their public profile (bio, picture, how many posts they’ve written).

**For writers** — Register with a profile image and short bio, then create, edit, and delete your own posts. Your profile page shows your stats; the Manage page lists all your blogs in one place. Edit and delete are only available to the post owner.

**Under the hood** — Session-based auth, image uploads to `public/images`, search across title/description/tags, and pagination (5 posts per page).

---

## Future features

Planned or possible next steps:

- **Comments** — Threaded or flat comments on posts with optional moderation.
- **Reactions / likes** — Simple likes or emoji reactions per post.
- **Password reset & email verification** — Forgot password flow and verify email on signup.
- **Rich text editor** — WYSIWYG or Markdown for post body instead of plain text.
- **Draft & publish** — Save drafts and publish later, with optional scheduled publishing.
- **Categories** — Categories or topics in addition to tags for better discovery.
- **Profile editing** — Update name, bio, and profile image from the profile or manage page.
- **REST or API** — Optional API (e.g. Laravel Sanctum) for a future mobile or SPA client.
- **Dark mode** — Theme toggle (e.g. CSS variables + a small JS/localStorage toggle).
- **SEO & meta** — Per-post meta title/description and optional Open Graph tags.
- **Analytics** — Simple view counts or basic dashboard for authors.

---

## Stack

- **Laravel 10** (PHP 8.1+) · **Blade** + **Vite** · **MySQL**

Auth and route protection use Laravel’s built-in `auth` and `guest` middleware.

---

## Highlights

- **Author-centric** — Every post links to the author’s public profile; readers can explore who wrote what.
- **Ownership** — Only the post owner sees Edit/Delete; profile and manage pages are scoped to the logged-in user.
- **Search** — One search box queries title, description, and tags with pagination.
- **Simple storage** — Images live in `public/images` with no extra filesystem config; easy to backup or move.
- **Blade + Vite** — Classic server-rendered views with a modern asset pipeline.

---

## Get it running

**You’ll need:** PHP 8.1+, Composer, Node.js/npm, MySQL (or another Laravel DB).

**1. Clone and install**

```bash
git clone https://github.com/your-username/blogapp.git
cd blogapp
composer install
```

**2. Environment**

```bash
# Windows (PowerShell)
Copy-Item .env.example .env

# macOS / Linux
cp .env.example .env
```

Then:

```bash
php artisan key:generate
```

**3. Database**

Create a database (e.g. `blogapp`), then in `.env`:

```env
DB_DATABASE=blogapp
DB_USERNAME=root
DB_PASSWORD=your_password
```

Run migrations:

```bash
php artisan migrate
```

**4. Frontend**

```bash
npm install
npm run dev
```

**5. Serve**

In a second terminal:

```bash
php artisan serve
```

Open **http://127.0.0.1:8000**. For a production-style build, use `npm run build` once, then `php artisan serve`.

---

## Key env vars

| Variable   | Purpose |
|-----------|---------|
| `APP_NAME` / `APP_URL` | App name and base URL |
| `APP_DEBUG`            | `true` in dev, `false` in production |
| `DB_*`                 | Database connection |
| `SESSION_DRIVER`       | Default `file` for sessions |

---

## Routes at a glance

- **`/`** — Blog list (search + pagination)
- **`/blog/{id}`** — Single post (author name links to their profile)
- **`/blog/create`** · **`/blog/store`** · **`/blog/edit/{id}`** · **`/blog/update/{id}`** · **`/blog/delete/{id}`** — CRUD (auth)
- **`/profile`** — Your profile (auth)
- **`/user_profile/{id}`** — Public author profile
- **`/auth/manage`** — Your blogs list (auth)
- **`/auth/login`** · **`/auth/register`** · **`/logout`** — Auth flow

---

## Project layout

```
blogapp/
├── app/Http/Controllers/
│   ├── blogController.php   → index, create, store, show, edit, update, destroy
│   └── userController.php   → login, register, store, profile, manage, user_profile, logout
├── app/Models/
│   ├── User.php             → hasMany(Blog)
│   └── blog.php             → belongsTo(User)
├── database/migrations/     → users, blogs, user_id on blogs
├── resources/views/
│   ├── auth/                → login, register, profile, manage
│   ├── blog/                → create, edit, show, user_profile
│   ├── layout/              → header, footer
│   └── index.blade.php      → home
├── routes/web.php
└── public/images/           → uploaded profile & blog images
```

---

## Uploads

All images go to **`public/images/`**.

- **Profile:** jpg/jpeg/png, max 2MB, required on register.
- **Blog:** jpeg/png/jpg/gif/svg on create/update.
- Filenames use a timestamp to avoid clashes. Ensure `public/images` exists and is writable.

---

## Database (overview)

- **users** — `id`, `name`, `email`, `password`, `description`, `profile_image`, timestamps.
- **blogs** — `id`, `user_id`, `title`, `description`, `image`, `tags`, timestamps.  
Relations: `User` hasMany `Blog`; `Blog` belongsTo `User`.

---

## Deployment

For production: set `APP_ENV=production`, `APP_DEBUG=false`, and a strong `APP_KEY`. Point your web server (e.g. Nginx/Apache) at the `public` directory. Run `php artisan migrate --force` and `npm run build`; consider queue/cache drivers and log rotation. Optional: use Laravel Forge, Envoyer, or a platform like Laravel Vapor.

---

## Contributing

Ideas and pull requests are welcome. Open an issue to discuss bigger changes or feature ideas.

---

## License & security

**License:** [MIT](https://opensource.org/licenses/MIT).

Security issues in Laravel can be reported to [Taylor Otwell](mailto:taylor@laravel.com).

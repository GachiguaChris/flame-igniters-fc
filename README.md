# Flame Igniters FC — Website

A professional, responsive football club website for **Flame Igniters FC**, operating under **Life Renewal Center Kamirithu Church**, Kenya.

Built with Laravel 10, Filament 3, Tailwind CSS, and MySQL.

---

## Features

- Public website: Home, About, Team, Fixtures & Results, News, Gallery, Achievements, Contact
- Filament admin panel at `/admin` for full content management
- Role-based access (admin / editor)
- Site settings managed from the admin panel (contact info, social links, etc.)
- Contact form with inbox in admin
- Photo gallery with albums and lightbox
- SEO-friendly URLs and meta tags
- Mobile-first responsive design

---

## Requirements

- PHP 8.1+
- MySQL 5.7+ / MariaDB 10.3+
- Composer
- Node.js & npm (for Vite/Tailwind in production)
- XAMPP / Laragon / any local PHP server

---

## Installation

```bash
# 1. Clone or copy the project
cd /path/to/your/htdocs

# 2. Install PHP dependencies
composer install

# 3. Copy environment file
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Configure your database in .env
DB_DATABASE=flame_igniters_fc
DB_USERNAME=root
DB_PASSWORD=

# 6. Run migrations and seed demo data
php artisan migrate:fresh --seed

# 7. Create storage symlink
php artisan storage:link

# 8. (Optional) Install and build frontend assets
npm install && npm run build
```

---

## Admin Access

Navigate to `http://localhost/flame-igniters-fc/public/admin`

| Role   | Email                          | Password   |
|--------|-------------------------------|------------|
| Admin  | admin@flameignitersfc.com     | password   |
| Editor | editor@flameignitersfc.com    | password   |

> **Change these credentials immediately in production.**

---

## Admin Panel Sections

| Section          | Description                              |
|-----------------|------------------------------------------|
| Dashboard        | Stats overview (players, fixtures, news, messages) |
| Players          | Add/edit/remove squad members            |
| Coaches          | Manage coaching staff                    |
| Fixtures         | Schedule matches and record results      |
| News Articles    | Publish match reports and announcements  |
| Gallery Albums   | Upload and organise photo albums         |
| Achievements     | Record trophies, awards, milestones      |
| Contact Messages | View messages from the contact form      |
| Site Settings    | Update contact info, social links, etc.  |

---

## Placeholder / Demo Data

All seeded data (player names, match results, articles, achievements) is **fictional demo data** clearly marked as such. Replace it with real information via the admin panel before going live.

---

## Deployment

1. Upload files to your server
2. Set `APP_ENV=production` and `APP_DEBUG=false` in `.env`
3. Set `APP_URL` to your domain
4. Run `composer install --optimize-autoloader --no-dev`
5. Run `php artisan config:cache && php artisan route:cache && php artisan view:cache`
6. Run `php artisan migrate --force`
7. Run `php artisan storage:link`
8. Ensure `storage/` and `bootstrap/cache/` are writable

---

## Customisation

- **Colours**: Edit the `tailwind.config` block in `resources/views/layouts/public.blade.php`
- **Logo**: Replace the 🔥 emoji in the nav with an `<img>` tag pointing to your logo
- **Contact info / social links**: Update via Admin → Site Settings
- **Placeholder images**: Add real images to `public/images/` named `placeholder-player.png`, `placeholder-news.jpg`, `placeholder-gallery.jpg`

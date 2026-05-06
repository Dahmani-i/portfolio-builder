# Portfolio Builder — Module 1

**Developer:** Dahmani
**Stack:** Laravel 12, PHP 8.2, MySQL, Blade, Sanctum

---

## What this module does
Handles user registration, login, and public profile display.
Each user gets a public portfolio page at `/portfolio/{username}`.

---

## How to install

1. Clone the repo and go into the folder
2. Run `composer install`
3. Copy `.env.example` to `.env` and fill in your database info
4. Run `php artisan key:generate`
5. Create a database called `portfolio_db` in phpMyAdmin
6. Run `php artisan migrate`
7. Run `php artisan db:seed`
8. Run `php artisan storage:link`
9. Run `php artisan serve`
10. Open `http://127.0.0.1:8000`

---

## Test accounts

| Name | Email | Password |
|---|---|---|
| Alice Martin | alice@example.com | password123 |
| Bob Smith | bob@example.com | password123 |
| Sara Hassan | sara@example.com | password123 |

---

## Routes

| Method | URL | Access |
|---|---|---|
| GET | `/` | Public |
| GET/POST | `/register` | Public |
| GET/POST | `/login` | Public |
| POST | `/logout` | Auth |
| GET | `/portfolio/{username}` | Public |
| GET | `/profile/edit` | Auth |
| PUT | `/profile` | Auth |

---

## Notes

- M2 and M3 route go inside the `auth` middleware group in `web.php`
- Portfolio page sections for projects, skills and certifications are ready in `portfolio/show.blade.php`
- Uncomment the `hasMany` relationships in `User.php` when your models are ready
# Fibrnoori

Fibrnoori is a Laravel platform for presenting fiber-optic internet plans and equipment and collecting online connection requests. The documented customer journey includes mobile-number verification, plan selection, optional modem selection, customer/address details, submission, and request-status tracking. SMS delivery and any provider integration require valid environment configuration.

## Dedicated dashboard
Fibrnoori has its own dedicated dashboard for managing the platform's service-request workflow. SMS verification, request processing, and other integrations should be validated in the target environment before launch.

## Technology
- PHP `^8.2`, Laravel `^12.0`
- Blade, JavaScript, Vite
- Laravel Eloquent, migrations and seeders
- Verta for Persian/Jalali date handling

## Requirements
PHP 8.2+, Composer, Node.js/npm, and a supported database (for example MySQL/MariaDB).

## Local installation
```bash
git clone https://github.com/MREZA-MJDi/fibrnoori.git
cd fibrnoori
composer install
```

Copy `.env.example` to `.env` (`copy .env.example .env` in Windows CMD; `cp .env.example .env` on macOS/Linux), create a database, and configure the `DB_*` settings. Review the environment file for any SMS or verification-provider settings and fill them with development credentials where applicable.

```bash
php artisan key:generate
php artisan migrate
npm install
npm run build
php artisan storage:link
php artisan serve
```

Browse to `http://127.0.0.1:8000`. During development, run `npm run dev` in another terminal for Vite hot reload.

## Tests
```bash
php artisan test
```

## Operations and security
Do not publish SMS API tokens or production configuration. Test verification and request-status transitions in a non-production environment. Do not run `migrate:fresh` or reset seeders against production data.

## Links
- Repository: https://github.com/MREZA-MJDi/fibrnoori
- Laravel documentation: https://laravel.com/docs/12.x

# INSTALLATION GUIDE

## Product

- MELS Platform
- Enterprise Monitoring & Evaluation System
- Version 1.0.0

## System Requirements

- PHP 8.3 with required Laravel extensions
- MySQL 8+ (or compatible)
- Apache with `mod_rewrite`
- Composer 2.x
- Node.js 20+ (build-time)
- npm 10+ (build-time)

## Installation Steps

1. Upload project files to server.
2. Set web root to the `public` directory.
3. Create `.env` from `.env.example`.
4. Configure:
   - `APP_NAME`
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_URL`
   - `DB_CONNECTION=mysql`
   - `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
   - `SESSION_DRIVER=database`
   - `SESSION_SECURE_COOKIE=true`
   - `TELESCOPE_ENABLED=false`
5. Install PHP dependencies:
   - `composer install --no-dev --prefer-dist --optimize-autoloader`
6. Generate app key:
   - `php artisan key:generate --ansi`
7. Run migrations:
   - `php artisan migrate --force`
8. Build assets (build environment):
   - `npm install`
   - `npm run build`
9. Optimize:
   - `php artisan optimize`
10. Verify app access from browser.

## File Permissions

Ensure web server can write to:

- `storage/`
- `bootstrap/cache/`

## Post-Install Verification

- Login page loads
- Authentication works
- Dashboard loads
- CRUD paths respond as expected
- No critical errors in logs

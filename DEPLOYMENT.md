# DEPLOYMENT GUIDE

## Scope

Production deployment for MELS Platform v1.0.0 on DreamHost Shared Hosting (Apache + PHP 8.3 + MySQL).

## Pre-Deployment

1. Confirm hosting PHP version is 8.3.
2. Create production MySQL database and user.
3. Point domain/subdomain document root to `public/`.
4. Prepare environment file with production values.

## Build and Package

1. Install PHP dependencies:
   - `composer install --no-dev --prefer-dist --optimize-autoloader`
2. Build frontend assets:
   - `npm install`
   - `npm run build`
3. Package release artifact including:
   - application source
   - `vendor/`
   - `public/build/`
   - excluding local caches/logs/secrets

## Deployment Steps

1. Upload artifact to target server.
2. Extract to release directory.
3. Ensure `.env` exists with production values.
4. Run:
   - `php artisan migrate --force`
   - `php artisan optimize`
5. Verify `storage/` and `bootstrap/cache/` write permissions.
6. Smoke test application routes and login flow.

## Rollback Strategy

1. Keep previous release package.
2. Keep pre-deployment database backup.
3. Repoint to previous release directory if failure occurs.
4. Restore DB backup only if schema/data rollback is required.

## Operational Notes

- Keep `APP_DEBUG=false` in production.
- Keep `TELESCOPE_ENABLED=false` in production.
- Use HTTPS and enforce secure session cookies.
- Monitor `storage/logs/`.

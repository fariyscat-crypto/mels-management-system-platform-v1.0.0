# Deployment Checklist

## Pre-Deployment

- [ ] Confirm release version/tag (SemVer)
- [ ] Confirm database backup completed
- [ ] Confirm rollback package available
- [ ] Confirm `.env` production values prepared
- [ ] Confirm document root points to `public/`
- [ ] Confirm storage/cache write permissions

## Build

- [ ] `composer install --no-dev --prefer-dist --optimize-autoloader`
- [ ] `npm install`
- [ ] `npm run build`
- [ ] Verify `public/build/` generated

## Deploy

- [ ] Upload and extract release artifact
- [ ] Place/update `.env`
- [ ] `php artisan migrate --force`
- [ ] `php artisan optimize`

## Validation

- [ ] Login page accessible
- [ ] Authentication flow functional
- [ ] Dashboard loads
- [ ] Core CRUD paths working
- [ ] No critical errors in logs

## Post-Deployment

- [ ] Monitor logs and response times
- [ ] Confirm scheduled jobs/queues (if enabled)
- [ ] Record release completion and timestamp

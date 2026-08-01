# Production Readiness Checklist

## Application Security

- [ ] `APP_ENV=production`
- [ ] `APP_DEBUG=false`
- [ ] `SESSION_SECURE_COOKIE=true`
- [ ] HTTPS enforced at hosting/web layer
- [ ] Sensitive values not committed to repository

## Infrastructure

- [ ] PHP 8.3 active
- [ ] MySQL connectivity verified
- [ ] Apache rewrite enabled
- [ ] Domain document root set to `public/`

## Data and Persistence

- [ ] Migrations applied successfully
- [ ] Backup and restore tested
- [ ] Session storage strategy verified

## Performance

- [ ] Dependencies installed with `--no-dev`
- [ ] Frontend assets built and present
- [ ] `php artisan optimize` executed
- [ ] Logs configured with production-level verbosity

## Operations

- [ ] Monitoring and alerting baseline defined
- [ ] Incident response contact path established
- [ ] Release notes and changelog published

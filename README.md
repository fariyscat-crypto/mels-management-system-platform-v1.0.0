# MELS Platform

Enterprise Monitoring & Evaluation System

## Official Product Identity

- **Product Name:** MELS Platform
- **Product Type:** Enterprise Monitoring & Evaluation System
- **Version:** 1.0.0
- **Release Type:** Production Release
- **System Concept & Functional Design:** Maxie Consult
- **Software Development & Engineering:** Attobyte Technologies

## Technology Stack

- PHP 8.3
- Laravel 10
- MySQL
- Apache Web Server
- Vue 3 + Inertia.js + Tailwind CSS

## Target Hosting Platform

- DreamHost Shared Hosting

## Production Documentation

- [INSTALL.md](INSTALL.md)
- [DEPLOYMENT.md](DEPLOYMENT.md)
- [CHANGELOG.md](CHANGELOG.md)
- [RELEASE_NOTES.md](RELEASE_NOTES.md)
- [CONTRIBUTING.md](CONTRIBUTING.md)
- [SECURITY.md](SECURITY.md)
- [CODE_OF_CONDUCT.md](CODE_OF_CONDUCT.md)
- [ADMINISTRATOR_GUIDE.md](ADMINISTRATOR_GUIDE.md)
- [DEVELOPER_GUIDE.md](DEVELOPER_GUIDE.md)
- [DEPLOYMENT_CHECKLIST.md](DEPLOYMENT_CHECKLIST.md)
- [PRODUCTION_CHECKLIST.md](PRODUCTION_CHECKLIST.md)

## Quick Start (Production-Oriented)

1. Copy `.env.example` to `.env`.
2. Set production values for app URL, database, mail, and security settings.
3. Install dependencies:
   - `composer install --no-dev --prefer-dist --optimize-autoloader`
4. Generate key:
   - `php artisan key:generate --ansi`
5. Run database migrations:
   - `php artisan migrate --force`
6. Build frontend assets in build environment:
   - `npm install`
   - `npm run build`
7. Cache application metadata:
   - `php artisan optimize`

## SemVer

This product follows Semantic Versioning. Current baseline: **1.0.0**.

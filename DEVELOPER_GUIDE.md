# Developer Guide

## Stack

- Laravel 10
- PHP 8.3
- MySQL
- Vue 3 + Inertia.js + Tailwind

## Development Workflow

1. Branch from stable baseline.
2. Implement focused, minimal-risk changes.
3. Run tests and verify behavior.
4. Update documentation for operational impact.

## Commands

- Install dependencies:
  - `composer install`
  - `npm install`
- Run tests:
  - `php artisan test`
- Build assets:
  - `npm run build`
- Optimize locally:
  - `php artisan optimize`

## Quality Expectations

- Preserve business logic unless explicitly approved to change.
- Prefer service/policy/form-request patterns already in the codebase.
- Avoid broad exception swallowing and hidden fallbacks.
- Keep changes traceable and review-friendly.

## Release Expectations

- Confirm compatibility with PHP 8.3 and MySQL.
- Confirm Apache/DreamHost deployment assumptions.
- Ensure docs/checklists are updated for release-impacting changes.

# Contributing Guide

Thank you for contributing to MELS Platform.

## Scope

This is an enterprise product. Contributions must preserve existing business behavior unless a change is explicitly approved.

## Rules

1. Do not change business logic without approval.
2. Keep controllers/models/routes behavior stable unless fixing a confirmed defect.
3. Follow existing coding patterns and naming conventions.
4. Add or update tests for behavior-impacting changes.
5. Keep commits focused and reviewable.

## Local Setup

1. Copy `.env.example` to `.env`.
2. Install dependencies:
   - `composer install`
   - `npm install`
3. Generate key:
   - `php artisan key:generate`
4. Run migrations:
   - `php artisan migrate`
5. Run tests:
   - `php artisan test`

## Pull Request Expectations

- Clear summary of change and rationale
- Risk/impact notes
- Test evidence
- Backward-compatibility confirmation
- Documentation updates where relevant

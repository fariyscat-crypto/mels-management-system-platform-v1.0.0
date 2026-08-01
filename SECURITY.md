# Security Policy

## Supported Version

- 1.0.x (active production line)

## Reporting a Vulnerability

Please report security issues privately to the product maintainers.  
Include:

- Affected version
- Reproduction steps
- Impact assessment
- Suggested remediation (optional)

Do not open public issues for unpatched vulnerabilities.

## Security Baseline

- Production must run with `APP_ENV=production` and `APP_DEBUG=false`.
- HTTPS is required in production.
- Session cookies must be secure and HTTP-only.
- Secrets must be stored in environment configuration, never in source control.
- Access to logs and storage directories must be restricted.

## Response Process

1. Acknowledge report.
2. Validate and triage severity.
3. Prepare fix and regression checks.
4. Release patched version and advisory.

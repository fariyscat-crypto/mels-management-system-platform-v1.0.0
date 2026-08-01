# Administrator Guide

## Purpose

This guide covers production administration of MELS Platform v1.0.0.

## Core Responsibilities

- Manage environment configuration
- Manage user access and role governance
- Operate deployments and backups
- Monitor system health and logs

## Environment Governance

- Keep `.env` values secure and access-limited.
- Ensure `APP_DEBUG=false` in production.
- Keep `TELESCOPE_ENABLED=false` in production.
- Rotate sensitive credentials periodically.

## User and Access Management

- Enforce least privilege for roles and permissions.
- Review administrative users regularly.
- Remove dormant high-privilege accounts.

## Operations

- Run database backups on schedule.
- Keep rollback-ready release archives.
- Validate migrations before and after deployment.
- Monitor error and application logs routinely.

## Incident Handling

1. Capture incident details and timestamps.
2. Isolate impact (users, modules, data).
3. Apply rollback or hotfix according to change policy.
4. Document post-incident corrective actions.

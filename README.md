# Laravel Service Desk API

A client-safe Laravel 13 API showcase for managing support tickets. It demonstrates resource-oriented API design, request validation, Eloquent models, migrations, filtering, pagination, and clear status/priority rules.

## What it demonstrates

- Laravel 13 / PHP 8.3 application structure
- Ticket REST endpoints with validated create and update operations
- Eloquent persistence and a database migration
- Status filtering and pagination
- Predictable HTTP status codes and JSON responses

## Quick start

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan serve
```

Use `POST /api/tickets` to create a ticket and `GET /api/tickets?status=open` to list open tickets.

## Scope note

This repository is an original, client-safe technical sample. It contains no client source code, credentials, or proprietary architecture.

# Property Management System

A Laravel-based real estate management platform that brings property listings and key real-estate operations together in one application. The system supports property discovery and management, user accounts, reservations, financial operations, communication, and administrative workflows.


## Overview

The platform is designed to support the lifecycle of real-estate listings and the related interactions between users and the people managing the properties. In addition to property listing operations, it provides supporting modules for reservations, payments, invoices, wallet operations, ownership documents, notifications, messaging, and mediator services.

## Key Features

### Accounts and Access Control
- User registration, login, OTP verification, and password recovery.
- Authenticated API access using Laravel Sanctum.
- Role-based access control using Spatie Laravel Permission.

### Property Management
- Create, view, update, delete, and filter property listings.
- Retrieve a user's own properties and browse available listings.
- Manage property images and related documents.
- Property favorites and ratings.
- Property status and approval workflows.

### Real-Estate Operations
- Reservation management.
- Payment and invoice management.
- Wallet balance, deposit, and withdrawal operations.
- Ownership document management.

### Communication and Supporting Services
- Notifications, including unread notification counts and read status.
- User messaging.
- Mediator profiles and appointment management.
- Maintenance workshop management.
- Bank information management.

### Administration
- Administrative operations for property workflows.
- User and property counts.
- Management endpoints for supporting services.

## Technology Stack

| Technology | Purpose |
|---|---|
| PHP `^8.1` | Backend language |
| Laravel `^10.0` | Application framework |
| MySQL | Relational database (configure the database used by your environment) |
| Laravel Sanctum `^3.3` | API authentication |
| Spatie Laravel Permission | Role and permission management |
| Guzzle HTTP `^7.2` | HTTP client |
| Vite `^4.0` | Frontend asset tooling |
| Axios `^1.1` | HTTP requests from frontend assets |

The versions above are taken from the dependency manifests committed in this repository. Database configuration is supplied through the application's environment file.

## Repository Structure

```text
.
├── app/                 # Application code, controllers, models, middleware
├── bootstrap/           # Laravel application bootstrap
├── config/              # Application configuration
├── database/            # Migrations, factories, and seeders
├── docs/
│   └── API.md           # API endpoint reference
├── public/              # Public entry point and compiled assets
├── resources/           # Frontend resources and views
├── routes/              # Web and API route definitions
├── storage/             # Runtime-generated files and logs
├── tests/               # Automated tests
├── composer.json        # PHP dependencies and scripts
├── package.json         # Frontend tooling
└── artisan              # Laravel command-line entry point
```

## Getting Started

### Requirements

- PHP 8.1 or a version compatible with the dependencies in `composer.json`.
- Composer.
- Node.js and npm (for frontend asset installation/building).
- A database configured for the application.
- Required PHP extensions for Laravel and the installed Composer packages.

### 1. Clone the repository

```bash
git clone https://github.com/Jihad-sh7/property-Management-system.git
cd property-Management-system
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Configure environment variables

Copy the example environment file:

**macOS / Linux**
```bash
cp .env.example .env
```

**Windows PowerShell**
```powershell
Copy-Item .env.example .env
```

Update `.env` with your local database connection and the other environment-specific settings required by the application.

Generate the Laravel application key:

```bash
php artisan key:generate
```

### 4. Prepare the database

Create the database configured in `.env`, then run the migrations:

```bash
php artisan migrate
```

If the project requires initial roles, permissions, or other seed data, run the relevant seeder(s) after reviewing their contents:

```bash
php artisan db:seed
```

### 5. Install and build frontend assets

```bash
npm install
npm run build
```

For frontend development with Vite:

```bash
npm run dev
```

### 6. Run the application

```bash
php artisan serve
```

The local application is typically available at:

```text
http://127.0.0.1:8000
```

Laravel API routes are commonly served under the `/api` prefix. Use the actual base URL and route configuration of your environment when making requests.

## API Documentation and Testing

- Detailed endpoint reference: [`docs/API.md`](docs/API.md)
- Postman collections included in the repository:
  - [`UniProject.postman_collection.json`](UniProject.postman_collection.json)
  - [`collection_project.postman_collection.json`](collection_project.postman_collection.json)

Import a collection into Postman, configure the base URL and any required authentication token, then execute requests against your local or authorized deployment.

Protected endpoints use the authentication and middleware declared in the route definitions. For Sanctum-protected requests, the typical header format is:

```http
Authorization: Bearer YOUR_ACCESS_TOKEN
Accept: application/json
```

Refer to the API documentation and the relevant controller implementation for request payloads, validation rules, and response formats.

## License

This project is distributed under the MIT License. See the [`LICENSE`](LICENSE) file for details.

## Author

**Jihad Alshabaani**

GitHub: [@Jihad-sh7](https://github.com/Jihad-sh7)

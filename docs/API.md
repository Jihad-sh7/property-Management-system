# API Documentation

This document summarizes the API routes declared in `routes/api.php`. It is an endpoint index; for exact request fields, validation rules, business logic, and response schemas, consult the corresponding controller and request/resource classes.

## Base URL

In a standard Laravel configuration, API routes are prefixed with `/api`.

Local example:

```text
http://127.0.0.1:8000/api
```

Replace the host and prefix if your deployment uses a different configuration.

## Authentication

The route definitions use Laravel Sanctum middleware for protected endpoints. For token-authenticated requests, use:

```http
Authorization: Bearer YOUR_ACCESS_TOKEN
Accept: application/json
```

Registration, OTP verification, login, and password recovery routes are declared as public routes. The exact token response and payload fields are defined by the relevant controller methods.

## Endpoint Reference

The tables below list the method, path, controller action, and middleware visible in the route definitions.

### 1. Authentication

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| POST | `/register` | `AuthController@register` | Public |
| POST | `/verifyotp` | `AuthController@verifyOtp` | Public |
| POST | `/login` | `AuthController@login` | Public |
| POST | `/forgetpassword` | `AuthController@forgetPassword` | Public |
| POST | `/resetpassword` | `AuthController@resetPassword` | Public |
| GET | `/user` | `AuthController@index` | `auth:sanctum` |
| GET | `/logout` | `AuthController@logout` | `auth:sanctum` |
| POST | `/delete-account` | `AuthController@deleteAccount` | `auth:sanctum` |

### 2. Properties

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| POST | `/property/create` | `PropertyController@createProperty` | `auth:sanctum` |
| GET | `/property/me` | `PropertyController@userproperty` | `auth:sanctum` |
| POST | `/property/update/{id}` | `PropertyController@updateProperty` | `auth:sanctum` |
| DELETE | `/property/delete/{id}` | `PropertyController@deleteProperty` | `auth:sanctum` |
| POST | `/property/filter` | `PropertyController@filterProperty` | `auth:sanctum` |
| GET | `/property/getall` | `PropertyController@index` | Public |
| GET | `/property/show/{id}` | `PropertyController@show` | Public |
| POST | `/property/status` | `PropertyController@changeStatus` | `auth:sanctum` |
| POST | `/property/approve/{id}` | `PropertyController@approve` | `auth:sanctum` |
| GET | `/property/count` | `PropertyController@count` | `auth:sanctum` |

### 3. Property Images

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| POST | `/property/image/add/{property_id}` | `PropertyImageController@addImage` | `auth:sanctum` |
| DELETE | `/property/image/delete/{id}` | `PropertyImageController@deleteImage` | `auth:sanctum` |
| GET | `/property/image/geturl/{id}` | `PropertyImageController@getImageUrl` | `auth:sanctum` |

### 4. Property Documents

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| POST | `/property/document/add/{property_id}` | `DocumentController@addDocument` | `auth:sanctum` |
| DELETE | `/property/document/delete/{id}` | `DocumentController@deleteDocument` | `auth:sanctum` |
| GET | `/property/document/geturl/{id}` | `DocumentController@getDocument` | `auth:sanctum` |

### 5. Favorites and Ratings

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| GET | `/favorites/get` | `FavoriteController@index` | `auth:sanctum` |
| POST | `/favorites/store` | `FavoriteController@store` | `auth:sanctum` |
| DELETE | `/favorites/delete/{property_id}` | `FavoriteController@destroy` | `auth:sanctum` |
| GET | `/property/ratings/{property_id}` | `RatingController@index` | `auth:sanctum` |
| POST | `/ratings/store` | `RatingController@store` | `auth:sanctum` |
| DELETE | `/ratings/delete/{rating_id}` | `RatingController@destroy` | `auth:sanctum` |

### 6. Reservations

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| GET | `/reservations` | `ReservationController@index` | `auth:sanctum` |
| POST | `/reservations/create` | `ReservationController@store` | `auth:sanctum` |
| GET | `/reservations/{id}` | `ReservationController@show` | `auth:sanctum` |
| PUT | `/reservations/update/{id}` | `ReservationController@update` | `auth:sanctum` |
| DELETE | `/reservations/delete/{id}` | `ReservationController@destroy` | `auth:sanctum` |

### 7. Payments and Invoices

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| GET | `/payments` | `PaymentController@index` | `auth:sanctum` |
| POST | `/payments/create` | `PaymentController@store` | `auth:sanctum` |
| GET | `/payments/{id}` | `PaymentController@show` | `auth:sanctum` |
| PUT | `/payments/update/{id}` | `PaymentController@update` | `auth:sanctum` |
| DELETE | `/payments/delete/{id}` | `PaymentController@destroy` | `auth:sanctum` |
| GET | `/invoices` | `InvoiceController@index` | `auth:sanctum` |
| POST | `/invoices/create` | `InvoiceController@store` | `auth:sanctum` |
| GET | `/invoices/{id}` | `InvoiceController@show` | `auth:sanctum` |
| PUT | `/invoices/update/{id}` | `InvoiceController@update` | `auth:sanctum` |
| DELETE | `/invoices/delete/{id}` | `InvoiceController@destroy` | `auth:sanctum` |

### 8. Wallet

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| GET | `/wallet` | `WalletController@index` | `auth:sanctum` |
| POST | `/wallet/deposit` | `WalletController@deposit` | `auth:sanctum` |
| POST | `/wallet/withdraw` | `WalletController@withdraw` | `auth:sanctum` |

### 9. Ownership Documents

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| GET | `/documents` | `OwnershipDocumentController@index` | `auth:sanctum` |
| POST | `/documents/create` | `OwnershipDocumentController@store` | `auth:sanctum` |
| GET | `/documents/{id}` | `OwnershipDocumentController@show` | `auth:sanctum` |
| PUT | `/documents/update/{id}` | `OwnershipDocumentController@update` | `auth:sanctum` |
| DELETE | `/documents/delete/{id}` | `OwnershipDocumentController@destroy` | `auth:sanctum` |

### 10. Notifications and Messages

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| GET | `/notifications` | `NotificationController@index` | `auth:sanctum` |
| GET | `/notifications/unread-count` | `NotificationController@unreadCount` | `auth:sanctum` |
| PATCH | `/notifications/{id}/read` | `NotificationController@markAsRead` | `auth:sanctum` |
| PATCH | `/notifications/read-all` | `NotificationController@markAllAsRead` | `auth:sanctum` |
| DELETE | `/notifications/{id}` | `NotificationController@destroy` | `auth:sanctum` |
| POST | `/admin/notifications` | `NotificationController@store` | `auth:sanctum`, `role:admin|super_admin` |
| GET | `/messages` | `MessageController@index` | `auth:sanctum` |
| POST | `/messages/create` | `MessageController@store` | `auth:sanctum` |
| GET | `/messages/{id}` | `MessageController@show` | `auth:sanctum` |
| PUT | `/messages/update/{id}` | `MessageController@update` | `auth:sanctum` |
| DELETE | `/messages/delete/{id}` | `MessageController@destroy` | `auth:sanctum` |

### 11. Mediators and Appointments

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| GET | `/mediators` | `MediatorController@index` | `auth:sanctum` |
| POST | `/mediators/create` | `MediatorController@store` | `auth:sanctum` |
| GET | `/mediators/{id}` | `MediatorController@show` | `auth:sanctum` |
| PUT | `/mediators/update/{id}` | `MediatorController@update` | `auth:sanctum` |
| DELETE | `/mediators/delete/{id}` | `MediatorController@destroy` | `auth:sanctum` |
| GET | `/appointments` | `MediatorAppointmentController@index` | `auth:sanctum` |
| POST | `/appointments/create` | `MediatorAppointmentController@store` | `auth:sanctum` |
| GET | `/appointments/{id}` | `MediatorAppointmentController@show` | `auth:sanctum` |
| PUT | `/appointments/update/{id}` | `MediatorAppointmentController@update` | `auth:sanctum` |
| DELETE | `/appointments/delete/{id}` | `MediatorAppointmentController@destroy` | `auth:sanctum` |

### 12. Maintenance Workshops and Banks

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| GET | `/workshops/get` | `MaintenanceWorkShopsController@index` | `auth:sanctum` |
| POST | `/workshops/create` | `MaintenanceWorkShopsController@store` | `auth:sanctum`, `role:admin|super_admin` |
| DELETE | `/workshops/delete/{WorkShopsId}` | `MaintenanceWorkShopsController@destroy` | `auth:sanctum`, `role:admin|super_admin` |
| GET | `/banks` | `BankController@index` | `auth:sanctum` |
| GET | `/banks/show/{id}` | `BankController@show` | `auth:sanctum` |
| POST | `/banks/create` | `BankController@store` | `role:admin|super_admin` |
| PUT | `/banks/update/{id}` | `BankController@update` | `role:admin|super_admin` |
| DELETE | `/banks/delete/{id}` | `BankController@destroy` | `role:admin|super_admin` |

### 13. Counts

| Method | Endpoint | Controller action | Middleware |
|---|---|---|---|
| GET | `/user/count` | `AuthController@count` | `auth:sanctum` |
| GET | `/property/count` | `PropertyController@count` | `auth:sanctum` |

## Postman Collections

Two Postman collection files are included in the repository:

- `UniProject.postman_collection.json`
- `collection_project.postman_collection.json`

Import the relevant collection into Postman and configure its base URL, environment variables, and authentication token as required.

## Important Implementation Notes

- This reference is based on route declarations. It does not claim that every endpoint has a particular request schema, response body, or validation rule; check the controller implementation for those details.
- The `/user` route appears more than once in the route file. Review whether the duplicate declaration is intentional.
- The property status/approval routes show `auth:sanctum` in the route definition; verify the actual administrator authorization enforced by the controller or policies before relying on route middleware alone.
- The bank create/update/delete routes show role middleware. Confirm that authentication is also enforced by the application's middleware configuration.
- Preserve the exact route parameter names and HTTP methods when using the endpoints.

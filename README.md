# Frenzy CRM API

API REST para gestión de leads.

---

## Instalación

```bash
composer install
cp .env.example .env
php artisan key:generate



## Configuracion .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=frenzy_crm_api
DB_USERNAME=root
DB_PASSWORD=password

## base de datos
php artisan migrate
php artisan db:seed



## Ejecutar el proyecto
php artisan serve


## Login
POST /api/login
{
  "email": "admin@test.com",
  "password": "12345678"
}
## Auth
Authorization: Bearer {token}

## ENDPOINTS
Endpoints
Leads
GET /api/leads
POST /api/leads
GET /api/leads/{id}
PUT /api/leads/{id}
DELETE /api/leads/{id}
Estado
PATCH /api/leads/{id}/status
Notas
POST /api/leads/{id}/notes
Webhook
POST /api/webhooks/leads
Header:
X-API-KEY: super-secret-key
# Fibrnoori

**Fibrnoori** is a modern web platform for ordering and managing fiber-optic internet services. The platform provides users with a simple online process to explore available plans and modems, submit a fiber-optic connection request, and track the status of their application.

## About

Fibrnoori was developed to simplify the process of requesting fiber-optic internet services through a modern web interface.

Instead of relying on traditional registration processes, users can explore available internet plans, review available equipment, authenticate using their mobile number, provide their required information and address, and submit their connection request online.

The platform is designed around a straightforward user experience while providing a structured foundation for managing service requests.

## Features

* Fiber-optic internet service presentation
* Internet plan and tariff listing
* Modem and equipment listing
* Online fiber-optic connection requests
* Mobile number authentication
* Verification-code based login
* Customer information collection
* Address registration
* Request status tracking
* Customer account area
* Responsive RTL interface
* Structured service-request workflow

## User Flow

The connection request process is designed around a simple multi-step workflow:

```text
Mobile Authentication
        ↓
Select Internet Plan
        ↓
Select Modem (Optional)
        ↓
Enter Customer Information
        ↓
Enter Address
        ↓
Submit Connection Request
        ↓
Track Request Status
```

## Main Sections

### Home

The landing page introduces the fiber-optic service and highlights key benefits such as high speed, connection stability, and online request submission.

### Internet Plans

Users can browse available internet tariffs and choose a suitable service based on their requirements.

### Modems

The platform provides information about available modems and equipment that can be selected during the connection process.

### Connection Request

Users can start an online connection request and provide the information required for service activation.

### Customer Account

Authenticated users can access their account and follow the status of their submitted connection requests.

## Technology Stack

* **Backend:** PHP, Laravel
* **Frontend:** Blade, HTML, CSS, JavaScript
* **Database:** MySQL
* **Build Tool:** Vite
* **Architecture:** MVC
* **Authentication:** Mobile number / verification code
* **ORM:** Laravel Eloquent

## Architecture

The application follows Laravel's MVC architecture and separates the main responsibilities of the application into dedicated layers.

```text
app/
├── Http/
│   ├── Controllers/
│   └── Requests/
├── Models/
└── ...

database/
├── migrations/
└── seeders/

resources/
├── views/
└── ...

routes/
└── web.php
```

This structure makes the application easier to maintain and provides a clear foundation for extending the service-request workflow.

## Installation

Clone the repository:

```bash
git clone https://github.com/MREZA-MJDi/fibrnoori.git
cd fibrnoori
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create the environment file:

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

Configure the database and required environment variables in `.env`.

Run database migrations:

```bash
php artisan migrate
```

If seed data is available:

```bash
php artisan db:seed
```

Create the storage link when required:

```bash
php artisan storage:link
```

Start the Laravel development server:

```bash
php artisan serve
```

Run Vite during development:

```bash
npm run dev
```

## Production Build

Build the frontend assets for production:

```bash
npm run build
```

## Project Goals

The main goal of Fibrnoori is to provide a clear and accessible digital workflow for fiber-optic internet registration.

The project focuses on:

* Simplifying the connection-request process
* Reducing unnecessary registration steps
* Providing clear service and equipment information
* Allowing customers to track their requests
* Building a maintainable Laravel application architecture

## Live Website

**Fibrnoori — Fiber-Optic Internet Platform**

https://fibernet.cam/

## Author

**Mohammad Reza Majidi**

Full-Stack Web Developer

GitHub: https://github.com/MREZA-MJDi

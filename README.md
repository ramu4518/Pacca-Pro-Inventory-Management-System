# Pacca Pro (PHP + MySQL + Python QR Scanner)

**Pacca Pro** is an internal production & inventory management system.
It includes:
- A **web application** for login and business workflows (PHP)
- A **QR scanning module** that updates stock in **real-time** (Python + Flask + SocketIO)
- A **MySQL/MariaDB database schema** for products, stock, orders, packaging, production and QR tracking (`paccapro.sql`)

---

## What’s inside

### 1) PHP Web App
All PHP pages are inside:
- `htdocs/`

Common examples of pages/endpoints (you’ll find many more):
- `login.php` / `logout.php`
- `dashboard.php`
- `stock.php`
- `packaging.php`, `packagingdata.php`
- `production.php`
- order-related pages like `pending_order.php`, `processOrder.php`, `submit_order*.php`
- AJAX endpoints inside `htdocs/AJAX/`

> The web UI uses local CSS/JS assets under `htdocs/assets/`, and images under `htdocs/img/`.

### 2) QR Scanner (Python)
QR scanning + DB updates are in:
- `htdocs/app.py`

It uses:
- Flask
- Flask-SocketIO (real-time browser updates)
- OpenCV (`cv2`) + `pyzbar` to decode QR codes
- MySQL connector to update the `paccapro` database

When a QR is scanned, the app:
- checks tables like `qr`, `pp_in` / `pp_out`
- updates the `stock` quantity for the matched product
- emits SocketIO events to the UI (e.g. triggers for GIF/updates)

### 3) Database Schema
- `paccapro.sql`

This file creates tables and seed data for database **`paccapro`** (example tables include: `products`, `stock`, `packaging`, `production`, `qr`, `sales_order`, `gatepass`, etc.).

---

## Setup (local)

### Requirements
- PHP 8.x + web server (Apache/XAMPP-style setup)
- MySQL/MariaDB
- Python 3 for the QR scanner module

### 1) Create DB
1. Create database: `paccapro`
2. Import `paccapro.sql` (phpMyAdmin → Import)

### 2) Configure PHP DB connection
Edit:
- `htdocs/db_connect.php`

It currently uses (hardcoded):
- host: `localhost`
- user: `root`
- password: *(currently empty in this project)*
- dbName: `paccapro`

### 3) Configure and run Python QR scanner
The Python DB connection is also hardcoded in:
- `htdocs/app.py`

Update credentials if needed, then run:

```bat
python htdocs/app.py
```

---


## Security notes (do this before making repo public)
- Avoid committing real passwords.
- This project uses hardcoded DB credentials in PHP (`htdocs/db_connect.php`) and Python (`htdocs/app.py`).
- Recommended: move credentials to environment variables / `.env` and keep `.env` ignored.

A `.gitignore` is already added at the root to ignore `.env`.

---


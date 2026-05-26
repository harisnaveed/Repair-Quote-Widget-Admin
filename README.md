# Repair Widget

Repair Widget is a modern multi-tenant POS & SaaS platform designed for mobile repair shops, electronics repair centers, and multi-location service businesses.

The platform allows companies to manage their locations independently while maintaining centralized platform-level administration.

---

# 🚀 Features

## Multi-Tenant SaaS Architecture

- Platform-level administration
- Company-based tenant isolation
- Multiple locations per company
- Separate access control for platform users and tenant users

---

# 🏢 Company & Location Management

- Manage companies
- Manage multiple locations
- Location-based data isolation
- Enable/disable products per location
- User access management per location

---

# 📱 Device & Product Management

- Devices management
- Brands management
- Product series management
- Products management
- Product issues management
- Repair pricing management

### Supported Device Categories

- Smartphones
- Tablets
- Laptops
- Gaming Consoles
- Smartwatches

### Supported Brands

- Apple
- Samsung
- Google
- Xiaomi
- OnePlus
- Oppo
- Vivo
- Motorola
- Huawei

---

# 🔧 Repair Workflow

- Device issue tracking
- Repair pricing management
- Issue categorization
- Product-specific repair support
- Location-based pricing support

---

# 👥 Authentication & Authorization

- Multi-guard authentication
- Platform users guard
- Company users guard
- Role & permission management using Spatie Laravel Permission

---

# 🛡️ Access Control

- Role-based permissions
- Location-based access control
- Tenant isolation
- Platform-level super admin management

---

# ⚙️ Tech Stack

## Backend

- Laravel 12
- PHP 8+
- PostgreSQL
- Spatie Laravel Permission

## Frontend

- React
- Material UI

---

# 🧠 Architecture Concepts

This project follows modern Laravel architecture patterns:

- Repository Pattern
- Policies
- Middleware Authorization
- Form Requests
- Factories & Seeders
- Multi-Tenant Access Scoping

---

# 🗄️ Core Entities

- Companies
- Locations
- Users
- Platform Users
- Devices
- Brands
- Product Series
- Products
- Product Issues
- Repair Pricing
- Leads and Lead Details
- Role & Permissions

---

# 🌍 Multi-Tenant Logic

Each company acts as a tenant.

Each tenant can:

- Create multiple locations
- Manage products independently
- Manage pricing independently
- Manage users independently

Platform users can manage:

- All tenants
- All locations
- Global configurations
- Platform-level settings

---

# 🧪 Development Setup

## Clone Repository

```bash
git clone <repository-url>
```

## Install Dependencies

```bash
composer install
npm install
```

## Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

## Configure Database

Update your `.env` file:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=repair_widget
DB_USERNAME=postgres
DB_PASSWORD=
```

---

# 🗃️ Run Migrations & Seeders

```bash
php artisan migrate:fresh --seed
```

---

# ▶️ Start Development Server

```bash
composer run dev
```

---

# 📌 Future Roadmap

- Inventory management
- Repair ticket workflow
- Customer management
- Invoicing system
- Payment integrations
- Subscription billing
- Analytics dashboard
- Notification system
- API support
- Mobile application

---

# 🤝 Contributing

Contributions, ideas, and improvements are welcome.

Please create a pull request or open an issue for discussion.

---

# 📄 License

This project is licensed under the MIT License.

---

# 👨‍💻 Author

Developed by Haris Naveed

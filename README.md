# Legal Services Platform

A comprehensive web platform for connecting customers with lawyers based on specialization and location.

## 🎯 Project Overview

This is a **Laravel-based Legal Services Portal** that allows:
- **Customers**: Register, search lawyers by location & services, view profiles, check schedules, and book appointments
- **Lawyers**: Create profiles, manage availability, view bookings, and manage appointment slots
- **Admin**: Manage lawyer profiles, homepage content, schedules, and platform operations

## 🏗️ Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Blade Templates with Tailwind CSS & Bootstrap
- **Database**: MySQL
- **Authentication**: Laravel Sanctum + Session-based Auth
- **API**: RESTful APIs

## 📋 Features

### Customer Features
- ✅ User Registration & Login
- ✅ Search Lawyers by Location
- ✅ Filter by Legal Services (Criminal, Divorce, Civil, Affidavit, etc.)
- ✅ View Lawyer Profiles with Ratings & Reviews
- ✅ Check Lawyer Availability & Schedules
- ✅ Book Appointments with Lawyers
- ✅ View Booking History
- ✅ Cancel Appointments
- ✅ Rate & Review Lawyers

### Lawyer Features
- ✅ Registration & Login
- ✅ Complete Profile Management
- ✅ Add/Edit Services Offered
- ✅ Manage Availability Schedules
- ✅ View Appointment Requests
- ✅ Accept/Reject Appointments
- ✅ Manage Appointment Slots
- ✅ Track Earnings & Bookings
- ✅ View Customer Reviews

### Admin Features
- ✅ Manage All User Accounts
- ✅ Approve/Reject Lawyer Registrations
- ✅ Manage Lawyer Profiles & Services
- ✅ Manage Homepage Content & Banners
- ✅ View All Appointments
- ✅ Manage Service Categories
- ✅ System Analytics & Reports
- ✅ Manage Platform Settings

## 🚀 Quick Start

### Prerequisites
- PHP 8.2+
- Composer
- MySQL 8.0+
- Node.js & npm

### Installation

1. **Clone Repository**
```bash
git clone https://github.com/Mahrukh2505e/legal-services-platform.git
cd legal-services-platform
```

2. **Install Dependencies**
```bash
composer install
npm install
```

3. **Setup Environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure Database**
Update `.env` with your MySQL credentials:
```
DB_DATABASE=legal_services_db
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run Migrations**
```bash
php artisan migrate
php artisan db:seed
```

6. **Build Assets**
```bash
npm run dev
```

7. **Start Server**
```bash
php artisan serve
```

Access at: `http://localhost:8000`

## 🔐 Default Credentials

### Admin
- Email: `admin@legal.com`
- Password: `password123`

### Sample Lawyer
- Email: `lawyer@legal.com`
- Password: `password123`

### Sample Customer
- Email: `customer@legal.com`
- Password: `password123`

## 📁 Project Structure

```
legal-services-platform/
├── app/
│   ├── Models/
│   ├── Http/Controllers/
│   ├── Policies/
│   └── Mail/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   ├── api.php
│   └── auth.php
├── config/
└── public/
```

## 📊 Database Tables

- `users` - All platform users
- `lawyers` - Lawyer profiles
- `services` - Legal service categories
- `lawyer_services` - Services offered by lawyers
- `schedules` - Lawyer availability
- `appointments` - Appointment bookings
- `reviews` - Customer reviews
- `homepage_content` - Admin-managed content

## 🔄 User Workflows

### Customer Flow
1. Register/Login
2. Search Lawyers
3. View Profile
4. Check Schedule
5. Book Appointment
6. Track & Review

### Lawyer Flow
1. Register (Pending Approval)
2. Complete Profile
3. Add Services
4. Set Availability
5. Manage Appointments

### Admin Flow
1. Login
2. Approve Lawyers
3. Manage Content
4. Monitor System
5. View Reports

## 📝 API Documentation

See [API_DOCS.md](API_DOCS.md) for complete API endpoints

## 🤝 Contributing

1. Fork the repository
2. Create feature branch: `git checkout -b feature/feature-name`
3. Commit: `git commit -m '[FEAT] description'`
4. Push: `git push origin feature/feature-name`
5. Create Pull Request

## 📄 License

MIT License - feel free to use for personal or commercial projects

## 👨‍💻 Author

**Mahrukh2505e**

## 📞 Support

For issues and questions, create an issue in the GitHub repository.

---

**Last Updated**: June 2026
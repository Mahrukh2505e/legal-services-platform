# Legal Services Platform - Complete Setup Guide

## 📋 Project Overview

Legal Services Platform is a complete Laravel-based system for:
- **Customers** to find and book appointments with lawyers
- **Lawyers** to manage their profiles and bookings
- **Admin** to oversee the entire platform

## 🎯 Features Implemented

### Phase 1 (Initial Setup)
- ✅ Project structure created
- ✅ Database configuration
- ✅ Models defined
- ✅ Migrations ready
- ✅ Controllers structure
- ✅ Routes defined
- ✅ Seeders created

### Phase 2 (To Be Implemented)
- Authentication system
- Customer dashboard
- Lawyer search & filtering
- Appointment booking system
- Lawyer profile management
- Admin panel
- Review & rating system

## 🗄️ Database Schema

### Tables Created

1. **users**
   - id, name, email, username, password, user_type, phone, profile_image, is_active, email_verified_at

2. **lawyers**
   - id, user_id, bar_council_id, bio, license_document, address, city, state, zipcode, experience_years, consultation_fee, rating, is_approved

3. **services**
   - id, name, description, icon, is_active

4. **lawyer_services**
   - id, lawyer_id, service_id, experience_level

5. **schedules**
   - id, lawyer_id, day_of_week, start_time, end_time, slot_duration_minutes, max_appointments_per_day, is_active

6. **appointments**
   - id, customer_id, lawyer_id, appointment_date, appointment_time, status, consultation_type, meeting_link, location, notes, amount, payment_status

7. **reviews**
   - id, customer_id, lawyer_id, appointment_id, rating, comment, is_verified

8. **homepage_content**
   - id, title, content, section, image, is_active, sort_order

## 📁 File Structure Created

```
app/
├── Models/
│   ├── User.php
│   ├── Lawyer.php
│   ├── Service.php
│   ├── Appointment.php
│   ├── Schedule.php
│   ├── Review.php
│   └── HomepageContent.php
├── Http/Controllers/
│   ├── Auth/
│   │   ├── LoginController.php
│   │   ├── RegisterController.php
│   │   └── LogoutController.php
│   ├── Customer/
│   │   ├── AppointmentController.php
│   │   ├── LawyerController.php
│   │   ├── DashboardController.php
│   │   └── ReviewController.php
│   ├── Lawyer/
│   │   ├── DashboardController.php
│   │   ├── ProfileController.php
│   │   ├── ScheduleController.php
│   │   └── AppointmentController.php
│   └── Admin/
│       ├── DashboardController.php
│       ├── LawyerManagementController.php
│       ├── UserManagementController.php
│       ├── ServiceController.php
│       └── ContentController.php
├── Http/Middleware/
│   ├── CheckUserType.php
│   └── IsApprovedLawyer.php
└── Policies/
    ├── LawyerPolicy.php
    └── AppointmentPolicy.php

database/
├── migrations/
│   ├── 2024_01_01_000001_create_users_table.php
│   ├── 2024_01_01_000002_create_lawyers_table.php
│   ├── 2024_01_01_000003_create_services_table.php
│   ├── 2024_01_01_000004_create_lawyer_services_table.php
│   ├── 2024_01_01_000005_create_schedules_table.php
│   ├── 2024_01_01_000006_create_appointments_table.php
│   ├── 2024_01_01_000007_create_reviews_table.php
│   └── 2024_01_01_000008_create_homepage_content_table.php
└── seeders/
    ├── DatabaseSeeder.php
    ├── UserSeeder.php
    ├── ServiceSeeder.php
    └── LawyerSeeder.php

resources/views/
├── layouts/
│   ├── app.blade.php
│   ├── auth.blade.php
│   └── admin.blade.php
├── auth/
│   ├── login.blade.php
│   ├── register.blade.php
│   └── forgot-password.blade.php
├── customer/
│   ├── dashboard.blade.php
│   ├── search.blade.php
│   ├── lawyer-profile.blade.php
│   ├── appointments.blade.php
│   └── reviews.blade.php
├── lawyer/
│   ├── dashboard.blade.php
│   ├── profile.blade.php
│   ├── schedules.blade.php
│   └── appointments.blade.php
└── admin/
    ├── dashboard.blade.php
    ├── lawyers.blade.php
    ├── users.blade.php
    └── content.blade.php

routes/
├── web.php (main routes)
├── api.php (API routes)
└── auth.php (auth routes)
```

## 🚀 Installation Steps

### Step 1: Clone Repository
```bash
git clone https://github.com/Mahrukh2505e/legal-services-platform.git
cd legal-services-platform
```

### Step 2: Install Composer Dependencies
```bash
composer install
```

### Step 3: Install NPM Dependencies
```bash
npm install
```

### Step 4: Setup Environment File
```bash
cp .env.example .env
```

### Step 5: Generate Application Key
```bash
php artisan key:generate
```

### Step 6: Configure Database
Edit `.env` file and set:
```
DB_DATABASE=legal_services_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Step 7: Create Database
```bash
mysql -u root -p
CREATE DATABASE legal_services_db;
```

### Step 8: Run Migrations
```bash
php artisan migrate
```

### Step 9: Seed Database
```bash
php artisan db:seed
```

### Step 10: Build Frontend Assets
```bash
npm run dev
```

### Step 11: Start Development Server
```bash
php artisan serve
```

Access application at: `http://localhost:8000`

## 🔐 Default Credentials

After seeding, use these credentials:

### Admin Account
- **Email**: admin@legal.com
- **Password**: password123
- **Username**: admin_user

### Sample Lawyer
- **Email**: lawyer@legal.com
- **Password**: password123
- **Username**: lawyer_user
- **Bar Council ID**: BAR123456

### Sample Customers
- **Email**: customer1@legal.com, customer2@legal.com
- **Password**: password123

## 📝 API Endpoints

See [API_DOCS.md](API_DOCS.md) for complete endpoint documentation.

Basic endpoints:
- `GET /api/services` - Get all services
- `GET /api/lawyers/search` - Search lawyers
- `GET /api/lawyers/{id}` - Get lawyer profile
- `POST /api/appointments` - Book appointment
- `GET /api/appointments` - Get user appointments

## 🔄 User Workflows

### Customer Registration & Search
1. Customer registers with email/password
2. Dashboard shows recommended lawyers
3. Search by location and service type
4. View lawyer profile and availability
5. Book appointment
6. After appointment, rate lawyer

### Lawyer Registration & Management
1. Lawyer registers with credentials
2. Admin approves registration
3. Lawyer completes profile
4. Adds services offered
5. Sets availability schedule
6. Manages appointment requests
7. Tracks earnings

### Admin Management
1. Admin logs in
2. Reviews pending lawyer applications
3. Approves/rejects lawyers
4. Manages user accounts
5. Manages service categories
6. Updates homepage content
7. Views analytics and reports

## 🛠️ Development Commands

```bash
# Create migration
php artisan make:migration create_table_name

# Create model
php artisan make:model ModelName

# Create controller
php artisan make:controller ControllerName

# Create seeder
php artisan make:seeder SeederName

# Run specific migration
php artisan migrate:refresh --seed

# Clear cache
php artisan cache:clear

# Build frontend
npm run build
```

## 📚 Useful Resources

- [Laravel Documentation](https://laravel.com/docs)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [Bootstrap Documentation](https://getbootstrap.com/docs)
- [Tailwind CSS Documentation](https://tailwindcss.com/docs)

## 🐛 Troubleshooting

### Database Connection Error
```bash
# Check .env file
# Verify MySQL is running
# Create database manually if needed
mysql -u root -p
CREATE DATABASE legal_services_db;
```

### Missing Key Error
```bash
php artisan key:generate
```

### Storage Permission Error
```bash
chmod -R 775 storage bootstrap/cache
```

### npm build issues
```bash
rm -rf node_modules
npm install
npm run dev
```

## 🤝 Contributing

Follow these guidelines:
1. Create feature branch: `git checkout -b feature/feature-name`
2. Make changes and commit: `git commit -m '[FEAT] description'`
3. Push to branch: `git push origin feature/feature-name`
4. Create Pull Request

## 📄 License

MIT License - Open source and free to use

## 👨‍💻 Support

For issues and questions:
1. Check existing GitHub issues
2. Create new issue with details
3. Include error messages and steps to reproduce

---

**Happy Coding! 🚀**
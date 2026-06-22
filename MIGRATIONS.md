# Database Migrations

## Overview

This document describes all database tables and their relationships in the Legal Services Platform.

## Tables

### 1. Users Table
Stores information for all users (Customers, Lawyers, Admin)

**Columns:**
- `id` - Primary Key
- `name` - User's full name
- `email` - Email address (unique)
- `username` - Username (unique)
- `password` - Hashed password
- `user_type` - Enum: customer, lawyer, admin
- `phone` - Phone number (nullable)
- `profile_image` - Profile picture URL (nullable)
- `is_active` - Boolean (default: true)
- `email_verified_at` - Email verification timestamp
- `created_at`, `updated_at` - Timestamps

### 2. Lawyers Table
Extended profile information for lawyers

**Columns:**
- `id` - Primary Key
- `user_id` - Foreign Key (users)
- `bar_council_id` - Bar Council ID (unique)
- `bio` - Biography (nullable)
- `license_document` - License document URL (nullable)
- `address` - Street address
- `city` - City name
- `state` - State name
- `zipcode` - Postal code
- `experience_years` - Years of experience
- `consultation_fee` - Hourly/session fee
- `rating` - Average rating (default: 0)
- `is_approved` - Admin approval status (default: false)
- `approval_date` - Date of approval (nullable)
- `created_at`, `updated_at` - Timestamps

### 3. Services Table
Legal service categories

**Columns:**
- `id` - Primary Key
- `name` - Service name (unique)
- `description` - Service description (text)
- `icon` - Icon URL (nullable)
- `is_active` - Boolean (default: true)
- `created_at`, `updated_at` - Timestamps

**Default Services:**
- Criminal Law
- Divorce & Family Law
- Civil Law
- Corporate Law
- Affidavit
- Property Law
- Contract Law

### 4. Lawyer Services Table
Junction table for many-to-many relationship

**Columns:**
- `id` - Primary Key
- `lawyer_id` - Foreign Key (lawyers)
- `service_id` - Foreign Key (services)
- `experience_level` - Enum: beginner, intermediate, expert
- `created_at`, `updated_at` - Timestamps

### 5. Schedules Table
Lawyer availability schedules

**Columns:**
- `id` - Primary Key
- `lawyer_id` - Foreign Key (lawyers)
- `day_of_week` - 0-6 (Sunday-Saturday)
- `start_time` - Time
- `end_time` - Time
- `slot_duration_minutes` - Duration (default: 60)
- `max_appointments_per_day` - Maximum appointments
- `is_active` - Boolean (default: true)
- `created_at`, `updated_at` - Timestamps

### 6. Appointments Table
Appointment bookings

**Columns:**
- `id` - Primary Key
- `customer_id` - Foreign Key (users)
- `lawyer_id` - Foreign Key (lawyers)
- `appointment_date` - Date
- `appointment_time` - Time
- `status` - Enum: pending, confirmed, completed, cancelled
- `consultation_type` - Enum: online, offline
- `meeting_link` - Video conference link (nullable)
- `location` - Meeting location (nullable)
- `notes` - Additional notes (nullable)
- `cancellation_reason` - Reason for cancellation (nullable)
- `amount` - Consultation fee amount
- `payment_status` - Enum: pending, completed
- `created_at`, `updated_at` - Timestamps

### 7. Reviews Table
Customer reviews for lawyers

**Columns:**
- `id` - Primary Key
- `customer_id` - Foreign Key (users)
- `lawyer_id` - Foreign Key (lawyers)
- `appointment_id` - Foreign Key (appointments)
- `rating` - Integer (1-5)
- `comment` - Review text (nullable)
- `is_verified` - Boolean (default: true)
- `created_at`, `updated_at` - Timestamps

### 8. Homepage Content Table
Admin-managed content

**Columns:**
- `id` - Primary Key
- `title` - Content title
- `content` - Content text
- `section` - Enum: banner, testimonial, feature, faq
- `image` - Image URL (nullable)
- `is_active` - Boolean (default: true)
- `sort_order` - Display order
- `created_at`, `updated_at` - Timestamps

## Relationships

```
Users (1) ──→ (1) Lawyers
Lawyers (1) ──→ (M) Lawyer_Services ←─ (1) Services
Lawyers (1) ──→ (M) Schedules
Lawyers (1) ──→ (M) Appointments ←─ (1) Customers (Users)
Appointments (1) ──→ (1) Reviews
```

## Indexes

- Foreign keys: Automatically indexed for faster joins
- `users.email`, `users.username` - For search
- `appointments.appointment_date`, `appointments.status` - For filtering
- `lawyers.city`, `lawyers.state` - For location search
- `reviews.rating` - For sorting

## Running Migrations

```bash
# Run all migrations
php artisan migrate

# Run specific migration
php artisan migrate:refresh

# Rollback
php artisan migrate:rollback

# Reset and seed
php artisan migrate:refresh --seed
```

## Data Integrity

- Cascade delete for lawyer-related records
- Unique constraints on email, username, bar_council_id
- Check constraints for ratings (1-5)
- Foreign key constraints enforced
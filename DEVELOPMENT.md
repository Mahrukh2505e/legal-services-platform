# Development Guidelines

## Code Standards

### PHP/Laravel
- Follow PSR-12 coding standards
- Use camelCase for methods
- Use snake_case for variables
- Use DocBlocks for classes and methods
- Keep functions focused and small

### Blade Templates
- Use 2 spaces for indentation
- Use kebab-case for component names
- Always sanitize output with `{{ }}`
- Use `@csrf` for all forms

### JavaScript
- Use ES6+ syntax
- Use 2 spaces for indentation
- Use const/let instead of var

---

## File Organization

### Controllers Location
```
app/Http/Controllers/
├── Auth/
│   ├── LoginController.php
│   ├── RegisterController.php
│   └── PasswordResetController.php
├── Customer/
│   ├── DashboardController.php
│   ├── LawyerController.php
│   └── AppointmentController.php
├── Lawyer/
│   ├── DashboardController.php
│   ├── ProfileController.php
│   └── AppointmentController.php
└── Admin/
    ├── DashboardController.php
    ├── LawyerController.php
    └── UserController.php
```

### Models Location
```
app/Models/
├── User.php
├── Lawyer.php
├── Service.php
├── Appointment.php
├── Schedule.php
├── Review.php
└── HomepageContent.php
```

---

## Database Conventions

### Table Naming
- Plural form: `users`, `lawyers`, `appointments`
- Snake_case for table names
- Foreign keys: `{singular}_id`

### Column Naming
- snake_case for column names
- Boolean columns: `is_active`, `is_approved`
- Timestamps: `created_at`, `updated_at`

### Indexes
- Foreign keys indexed automatically
- Search fields: `email`, `username`
- Filter fields: `status`, `is_active`

---

## Git Workflow

### Branch Naming
- Feature: `feature/short-description`
- Bug fix: `bugfix/short-description`
- Hotfix: `hotfix/short-description`

### Commit Messages
```
[TYPE] Brief description

Detailed explanation if needed.

Fixes #issue_number
```

**Types:**
- `[FEAT]` - New feature
- `[FIX]` - Bug fix
- `[REFACTOR]` - Code refactoring
- `[DOCS]` - Documentation
- `[TEST]` - Tests

### Pull Request Process
1. Create feature branch from `develop`
2. Make commits with clear messages
3. Push to remote
4. Create PR with description
5. Request review
6. Address comments
7. Merge after approval

---

## Testing

### Unit Tests
```bash
php artisan test tests/Unit
```

### Feature Tests
```bash
php artisan test tests/Feature
```

### Coverage
```bash
php artisan test --coverage
```

---

## Security Guidelines

### Authentication
- Use Laravel's auth system
- Hash passwords properly
- Implement rate limiting
- Use CSRF tokens

### Authorization
- Use policies for authorization
- Check user roles and permissions
- Validate all user input
- Use middleware for route protection

### Data Protection
- Sanitize output
- Use prepared statements
- Hash sensitive data
- Implement proper logging

---

## Performance Optimization

### Database
- Use eager loading (with)
- Add proper indexes
- Use pagination
- Cache queries

### Frontend
- Minify CSS/JS
- Optimize images
- Use CDN
- Implement lazy loading

---

## Useful Commands

```bash
# Create migration
php artisan make:migration create_table_name

# Create model
php artisan make:model ModelName

# Create controller
php artisan make:controller ControllerName

# Create seeder
php artisan make:seeder SeederName

# Run migrations
php artisan migrate

# Reset database
php artisan migrate:refresh --seed

# Clear cache
php artisan cache:clear

# Build frontend
npm run build
```

---

## Documentation

- Document public methods
- Include examples in comments
- Update README for new features
- Document API endpoints
- Keep CHANGELOG updated
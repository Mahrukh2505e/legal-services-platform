# API Documentation - Legal Services Platform

## Base URL
```
http://localhost:8000/api
```

## Authentication
All endpoints except public routes require authentication token via Sanctum or session.

---

## Public Endpoints

### 1. Get All Services
```
GET /services
```

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "Criminal Law",
            "description": "Criminal law services",
            "icon": "icon-url"
        }
    ]
}
```

### 2. Search Lawyers
```
GET /lawyers/search
```

**Query Parameters:**
- `location` (string) - City or location
- `service_id` (integer) - Service ID
- `rating` (float) - Minimum rating
- `page` (integer) - Page number

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "name": "John Doe",
            "city": "New Delhi",
            "service": "Criminal Law",
            "rating": 4.5,
            "consultation_fee": 500
        }
    ]
}
```

### 3. Get Lawyer Profile
```
GET /lawyers/{id}
```

**Response:**
```json
{
    "success": true,
    "data": {
        "id": 1,
        "name": "John Doe",
        "city": "New Delhi",
        "experience_years": 10,
        "consultation_fee": 500,
        "rating": 4.5,
        "services": [{"name": "Criminal Law"}],
        "schedules": [{"day": "Monday", "start_time": "09:00"}]
    }
}
```

---

## Customer Endpoints

### Book Appointment
```
POST /appointments
```

**Headers:**
```
Authorization: Bearer {token}
Content-Type: application/json
```

**Request Body:**
```json
{
    "lawyer_id": 1,
    "appointment_date": "2024-02-20",
    "appointment_time": "10:00",
    "consultation_type": "online"
}
```

**Response:**
```json
{
    "success": true,
    "message": "Appointment booked successfully",
    "data": {
        "id": 1,
        "status": "pending"
    }
}
```

### Get Customer Appointments
```
GET /appointments
```

**Response:**
```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "lawyer_name": "John Doe",
            "date": "2024-02-20",
            "time": "10:00",
            "status": "confirmed"
        }
    ]
}
```

### Cancel Appointment
```
DELETE /appointments/{id}
```

**Response:**
```json
{
    "success": true,
    "message": "Appointment cancelled successfully"
}
```

### Submit Review
```
POST /reviews
```

**Request Body:**
```json
{
    "lawyer_id": 1,
    "appointment_id": 1,
    "rating": 5,
    "comment": "Great service"
}
```

---

## Lawyer Endpoints

### Get Lawyer Dashboard
```
GET /lawyer/dashboard
```

**Response:**
```json
{
    "success": true,
    "data": {
        "total_appointments": 50,
        "pending_appointments": 5,
        "average_rating": 4.5
    }
}
```

### Get Lawyer Appointments
```
GET /lawyer/appointments
```

### Update Appointment Status
```
PUT /appointments/{id}/status
```

**Request Body:**
```json
{
    "status": "confirmed",
    "meeting_link": "https://zoom.us/..."
}
```

### Manage Schedules
```
GET /lawyer/schedules
POST /lawyer/schedules
PUT /lawyer/schedules/{id}
DELETE /lawyer/schedules/{id}
```

---

## Admin Endpoints

### Get Admin Dashboard
```
GET /admin/dashboard
```

### Manage Lawyers
```
GET /admin/lawyers
GET /admin/lawyers/{id}
PUT /admin/lawyers/{id}/approve
PUT /admin/lawyers/{id}/reject
```

### Manage Services
```
GET /admin/services
POST /admin/services
PUT /admin/services/{id}
DELETE /admin/services/{id}
```

---

## Error Responses

### 401 Unauthorized
```json
{
    "success": false,
    "message": "Unauthenticated"
}
```

### 403 Forbidden
```json
{
    "success": false,
    "message": "Unauthorized action"
}
```

### 422 Validation Error
```json
{
    "success": false,
    "message": "Validation failed",
    "errors": {
        "email": ["Email is required"]
    }
}
```

---

## Response Format

All API responses follow this format:
```json
{
    "success": boolean,
    "message": "string",
    "data": {} or [],
    "errors": {}
}
```
# API Documentation

This document provides documentation for the API endpoints of the HRD Management System.

## Attendance

### Clock In

This endpoint is used to record an employee's clock-in time.

*   **URL:** `/api/attendances`
*   **Method:** `POST`
*   **Content-Type:** `multipart/form-data`
*   **Parameters:**
    *   `employee_id` (required, integer): The ID of the employee.
    *   `date` (required, date): The date of the attendance (YYYY-MM-DD).
    *   `check_in` (required, time): The clock-in time (HH:MM:SS).
    *   `status` (required, string): The status of the attendance (e.g., "present").
    *   `face_image` (required, file): The employee's face image for verification.
    *   `latitude` (required, numeric): The latitude of the employee's location.
    *   `longitude` (required, numeric): The longitude of the employee's location.
*   **Success Response:**
    *   **Code:** 201 Created
    *   **Content:**
      ```json
      {
          "id": 1,
          "employee_id": 1,
          "date": "2023-07-24",
          "check_in": "08:00:00",
          "check_out": null,
          "status": "present",
          "face_image_path": "face_images/xxxxxxxxxx.jpg",
          "latitude": -6.20000000,
          "longitude": 106.81666700,
          "created_at": "2023-07-24T00:00:00.000000Z",
          "updated_at": "2023-07-24T00:00:00.000000Z"
      }
      ```
*   **Error Response:**
    *   **Code:** 422 Unprocessable Entity
    *   **Content:**
      ```json
      {
          "message": "The given data was invalid.",
          "errors": {
              "face_image": [
                  "The face image field is required."
              ]
          }
      }
      ```

### Clock Out

This endpoint is used to record an employee's clock-out time.

*   **URL:** `/api/attendances/{id}`
*   **Method:** `PUT` or `PATCH`
*   **Parameters:**
    *   `check_out` (required, time): The clock-out time (HH:MM:SS).
*   **Success Response:**
    *   **Code:** 200 OK
    *   **Content:** (The updated attendance object)
*   **Error Response:**
    *   **Code:** 422 Unprocessable Entity
    *   **Content:** (Validation errors)

## Role Management

### Get All Roles

*   **URL:** `/api/roles`
*   **Method:** `GET`
*   **Success Response:**
    *   **Code:** 200 OK
    *   **Content:** (An array of role objects)

### Create Role

*   **URL:** `/api/roles`
*   **Method:** `POST`
*   **Parameters:**
    *   `name` (required, string): The name of the role.
    *   `description` (optional, string): A description of the role.
*   **Success Response:**
    *   **Code:** 201 Created
    *   **Content:** (The new role object)

### Update Role

*   **URL:** `/api/roles/{id}`
*   **Method:** `PUT` or `PATCH`
*   **Parameters:**
    *   `name` (optional, string): The new name of the role.
    *   `description` (optional, string): The new description of the role.
*   **Success Response:**
    *   **Code:** 200 OK
    *   **Content:** (The updated role object)

### Delete Role

*   **URL:** `/api/roles/{id}`
*   **Method:** `DELETE`
*   **Success Response:**
    *   **Code:** 204 No Content

### Assign Permission to Role

*   **URL:** `/api/roles/{id}/permissions`
*   **Method:** `POST`
*   **Parameters:**
    *   `permission_id` (required, integer): The ID of the permission to assign.
*   **Success Response:**
    *   **Code:** 204 No Content

### Revoke Permission from Role

*   **URL:** `/api/roles/{id}/permissions`
*   **Method:** `DELETE`
*   **Parameters:**
    *   `permission_id` (required, integer): The ID of the permission to revoke.
*   **Success Response:**
    *   **Code:** 204 No Content

## Permission Management

### Get All Permissions

*   **URL:** `/api/permissions`
*   **Method:** `GET`
*   **Success Response:**
    *   **Code:** 200 OK
    *   **Content:** (An array of permission objects)

## Shift Management

### Get All Shifts

*   **URL:** `/api/shifts`
*   **Method:** `GET`
*   **Success Response:**
    *   **Code:** 200 OK
    *   **Content:** (An array of shift objects)

### Create Shift

*   **URL:** `/api/shifts`
*   **Method:** `POST`
*   **Parameters:**
    *   `name` (required, string): The name of the shift.
    *   `start_time` (required, time): The start time of the shift.
    *   `end_time` (required, time): The end time of the shift.
*   **Success Response:**
    *   **Code:** 201 Created
    *   **Content:** (The new shift object)

### Update Shift

*   **URL:** `/api/shifts/{id}`
*   **Method:** `PUT` or `PATCH`
*   **Parameters:**
    *   `name` (optional, string): The new name of the shift.
    *   `start_time` (optional, time): The new start time of the shift.
    *   `end_time` (optional, time): The new end time of the shift.
*   **Success Response:**
    *   **Code:** 200 OK
    *   **Content:** (The updated shift object)

### Delete Shift

*   **URL:** `/api/shifts/{id}`
*   **Method:** `DELETE`
*   **Success Response:**
    *   **Code:** 204 No Content

### Assign Employee to Shift

*   **URL:** `/api/shifts/{id}/employees`
*   **Method:** `POST`
*   **Parameters:**
    *   `employee_id` (required, integer): The ID of the employee to assign.
*   **Success Response:**
    *   **Code:** 204 No Content

### Revoke Employee from Shift

*   **URL:** `/api/shifts/{id}/employees`
*   **Method:** `DELETE`
*   **Parameters:**
    *   `employee_id` (required, integer): The ID of the employee to revoke.
*   **Success Response:**
    *   **Code:** 204 No Content

## Zone Management

### Get All Zones

*   **URL:** `/api/zones`
*   **Method:** `GET`
*   **Success Response:**
    *   **Code:** 200 OK
    *   **Content:** (An array of zone objects)

### Create Zone

*   **URL:** `/api/zones`
*   **Method:** `POST`
*   **Parameters:**
    *   `name` (required, string): The name of the zone.
    *   `latitude` (required, numeric): The latitude of the zone's center.
    *   `longitude` (required, numeric): The longitude of the zone's center.
    *   `radius` (required, numeric): The radius of the zone in meters.
*   **Success Response:**
    *   **Code:** 201 Created
    *   **Content:** (The new zone object)

### Update Zone

*   **URL:** `/api/zones/{id}`
*   **Method:** `PUT` or `PATCH`
*   **Parameters:**
    *   `name` (optional, string): The new name of the zone.
    *   `latitude` (optional, numeric): The new latitude of the zone's center.
    *   `longitude` (optional, numeric): The new longitude of the zone's center.
    *   `radius` (optional, numeric): The new radius of the zone in meters.
*   **Success Response:**
    *   **Code:** 200 OK
    *   **Content:** (The updated zone object)

### Delete Zone

*   **URL:** `/api/zones/{id}`
*   **Method:** `DELETE`
*   **Success Response:**
    *   **Code:** 204 No Content

### Assign Employee to Zone

*   **URL:** `/api/zones/{id}/employees`
*   **Method:** `POST`
*   **Parameters:**
    *   `employee_id` (required, integer): The ID of the employee to assign.
*   **Success Response:**
    *   **Code:** 204 No Content

### Revoke Employee from Zone

*   **URL:** `/api/zones/{id}/employees`
*   **Method:** `DELETE`
*   **Parameters:**
    *   `employee_id` (required, integer): The ID of the employee to revoke.
*   **Success Response:**
    *   **Code:** 204 No Content

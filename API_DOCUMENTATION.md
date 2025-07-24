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

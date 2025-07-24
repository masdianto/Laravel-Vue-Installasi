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

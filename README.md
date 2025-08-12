<!-- <p align="center"><img src="" width="400" alt="Laravel Logo"></a></p> -->

## About TeleMed

TeleMed is a secure, web-based healthcare platform designed to streamline virtual consultations and medical record management for healthcare providers and patients.
It offers role-based access control, real-time communication, and a centralized patient history repository, reducing paperwork while ensuring compliance and accessibility from anywhere.

## Overview

TeleMed digitizes medical records and enhances doctor–patient interactions through real-time messaging and appointment management.
It is designed with data security, scalability, and usability in mind, making it suitable for hospitals, clinics, and private practitioners.

## Features

Role-Based Access Control (RBAC) using Laravel Sanctum and spatie/laravel-permission
CRUD operations for medical records (Diagnosis, Medicines, Allergies, Tests, etc.)
User Management – Admins can create, update, or remove doctors
Authentication & Authorization using Laravel Auth
Audit Trails – timestamps for record creation and updates
Form Validation with detailed error handling
Secure Data Storage with MySQL database

### Roles and Permissions

Super Admin	has full system access, including user and role management <br>
Admin can manage doctors and view all records<br>
Doctor	can create, update, and view their own patients' records<br>

## Medical record structure
Each patient’s medical record may include:
Diagnosis
Medicines Prescribed
Tests & Lab Results
Allergies
Immunizations
Treatment Plan

## Tech Stack

Backend: Laravel 10 <br>
<!-- Frontend: Blade (with Bootstrap)<br> -->
Authentication: Laravel Auth<br>
Authorization:  Laravel Sanctum + spatie/laravel-permission<br>
Database: MySQL<br>

-- Create the database
CREATE DATABASE serenity_sphere;

-- Use the database
USE serenity_sphere;

-- Create users table
CREATE TABLE users (
   user_id INT AUTO_INCREMENT PRIMARY KEY,
   username VARCHAR(100) NOT NULL,
   email VARCHAR(100) NOT NULL UNIQUE,
   password VARCHAR(255) NOT NULL,
   user_type ENUM('admin', 'patient') NOT NULL,
   profile TEXT
);

-- Create doctors table
CREATE TABLE doctors (
   doctor_id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(100) NOT NULL,
   specialty VARCHAR(255) NOT NULL,
   contact_info TEXT
);

-- Create organizations table
CREATE TABLE organizations (
   organization_id INT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(100) NOT NULL,
   description TEXT,
   location VARCHAR(255)
);

-- Create sessions table (for handling user sessions)
CREATE TABLE sessions (
   session_id INT AUTO_INCREMENT PRIMARY KEY,
   user_id INT NOT NULL,
   token VARCHAR(255) NOT NULL,
   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);
CREATE TABLE appointments (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending',
    FOREIGN KEY (patient_id) REFERENCES users(user_id),
    FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id)
);

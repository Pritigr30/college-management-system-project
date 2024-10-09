-- Database: college_management

CREATE DATABASE college_management;
USE college_management;

-- Table for students
CREATE TABLE students (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100),
    department VARCHAR(100)
);

-- Table for staff
CREATE TABLE staff (
    staff_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    position VARCHAR(100),
    email VARCHAR(100)
);

-- Table for departments
CREATE TABLE departments (
    department_id INT PRIMARY KEY AUTO_INCREMENT,
    department_name VARCHAR(100)
);

-- Table for exam timetable
CREATE TABLE exam_timetable (
    exam_id INT PRIMARY KEY AUTO_INCREMENT,
    department_id INT,
    exam_date DATE,
    subject VARCHAR(100),
    time VARCHAR(50),
    FOREIGN KEY (department_id) REFERENCES departments(department_id)
);

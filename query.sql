-- Tạo cơ sở dữ liệu
CREATE DATABASE student_management;
USE student_management;

CREATE TABLE students (
    studentId CHAR(10) PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    dob DATE,
    gender ENUM('Nam', 'Nu'),
    classId CHAR(10),
    email VARCHAR(50),
    avatar VARCHAR(50)
);

CREATE TABLE subject (
    subjectId CHAR(10) PRIMARY KEY,
    subjectName VARCHAR(50) NOT NULL,
    credit INT
);

CREATE TABLE class (
    classId CHAR(10) PRIMARY KEY,
    className VARCHAR(50) NOT NULL,
    course VARCHAR(20)
);

CREATE TABLE score (
    studentId CHAR(10),
    subjectId CHAR(10),
    testScore DECIMAL(4, 2),
    PRIMARY KEY (studentId, subjectId),
    FOREIGN KEY (studentId) REFERENCES students(studentId),
    FOREIGN KEY (subjectId) REFERENCES subject(subjectId)
);

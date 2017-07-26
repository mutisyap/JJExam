<?php
/**
 * Created by PhpStorm.
 * User: pta
 * Date: 2/2/17
 * Time: 12:26 PM
 */


require_once "../gen/connect.php";




//To server

//Let's create the database JEXAM
$sql="CREATE DATABASE JExam";
$connection = connection();

if ($connection->query($sql)=='TRUE'){
    echo "Database created successfully";
}

$conn=connect();
//To database

//Tables
# 1. Departments
$departmentsTable="CREATE TABLE IF NOT EXISTS Departments(
deptID VARCHAR (20) PRIMARY KEY,
deptName VARCHAR (50) UNIQUE ,
examStatus INT (4),
chair VARCHAR (20),
examsOfficer VARCHAR (20),
yearID VARCHAR (10),
adminID VARCHAR (10),
schoolID VARCHAR (10),
assessmentID VARCHAR (10),
passmark VARCHAR (10)
)";
if ($conn->query($departmentsTable)!=TRUE){
    echo "Error creating table departments";
}

# 2. schools table
$schoolsTable="CREATE TABLE IF NOT EXISTS Schools (
schoolID VARCHAR (20) PRIMARY KEY,
schoolName VARCHAR (200) UNIQUE ,
administrator VARCHAR (20), 
admin1 VARCHAR (20),
admin2 VARCHAR (20),
admin3 VARCHAR (20),
passmark INT (5),
director VARCHAR (20)
)";
if ($conn->query($schoolsTable)!=TRUE){
    echo "Error creating table schools";
}

# 3 . academic year table {Status can be committed or uncommitted or fully entered}
    $academicYearTable="CREATE TABLE IF NOT EXISTS academicYears(
    yearID int NOT NULL AUTO_INCREMENT UNIQUE,
    startDate VARCHAR (30),
    endDate VARCHAR (30),
    deptID VARCHAR (20),
    examStatus INT DEFAULT 1
    )";

if ($conn->query($academicYearTable)!=TRUE){
    echo "Error creating table academicYears";
}

# 4.staff
$tableStaff="CREATE TABLE IF NOT EXISTS Staff (
title VARCHAR (20) NOT NULL,
firstName VARCHAR (30) NOT NULL,
middleName VARCHAR (30),
lastName VARCHAR (30) NOT NULL,
email VARCHAR (50) UNIQUE NOT NULL,
role VARCHAR (10) NOT NULL,
username VARCHAR (20) PRIMARY KEY NOT NULL,
password VARCHAR (64),
staffID VARCHAR (20),
confirmed INT(5) NOT NULL,
approved INT (5) NOT NULL
)";
if ($conn->query($tableStaff)!=TRUE){
    echo $conn->error;
}

# 5. Semesters
$semestersTable="CREATE TABLE IF NOT EXISTS semesters(
semesterID VARCHAR (10) PRIMARY KEY,
semesterName VARCHAR (50),
yearID VARCHAR (10)
)";
if ($conn->query($semestersTable)!=TRUE){
    echo "Error creating table semesters";
}

# 6. Reset (staff resetting by admin)
$resetSql="CREATE TABLE IF NOT EXISTS  Reset (
code VARCHAR (50),
staffID VARCHAR (40),
expiryTime INT (30),
used VARCHAR (10),
trials INT (5) DEFAULT 0
)";
if ($conn->query($resetSql)!=TRUE){
    echo "Error creating table Reset";
}

# 7. Classes yearID=>current examStatus=>completed or not

$classesTable="CREATE TABLE IF NOT EXISTS Classes(
classID VARCHAR (10) UNIQUE,
course VARCHAR (100),
year INT (5),
yearID VARCHAR (10),
examStatus INT (5),
intake VARCHAR (20) UNIQUE,
deptID VARCHAR (10),
status INT NOT NULL DEFAULT '0'
)";
if ($conn->query($classesTable)!=TRUE){
    echo "Error creating table classes";
}

#8. intake
$intakeTable="CREATE TABLE IF NOT EXISTS intakes(
intakeID VARCHAR (10),
intakeYear VARCHAR (20),
course VARCHAR (50)
)";
if ($conn->query($intakeTable)!=TRUE){
    echo "Error creating table intakes";
}

# 9. units
$unitsTable="CREATE TABLE IF NOT EXISTS units(
unitID VARCHAR (20) UNIQUE,
unitCode VARCHAR (20),
unitName VARCHAR (200),
classID VARCHAR (10),
semesterID VARCHAR (10),
assessmentName VARCHAR (50),
weight INT (5),
passmark INT (5),
markEntry INT(2) NOT NULL DEFAULT '0',
staffID VARCHAR(20) NOT NULL,
status INT(5) NOT NULL DEFAULT '0'
)";
if ($conn->query($unitsTable)!=TRUE){
    echo "Error creating table units";
}

#10 Assessment Tables

#10.1 Assessment_general
$assessmentGeneralTable="CREATE TABLE IF NOT EXISTS assessmentGeneral(
assessmentID VARCHAR (10) UNIQUE,
assessmentName VARCHAR (50) UNIQUE,
testNumber INT (5),
deptID VARCHAR (20) NOT NULL
)";
if ($conn->query($assessmentGeneralTable)!=TRUE){
    echo "Error creating table assemstent General";
}

#10.2 Names
$assessmentNamesTable="CREATE TABLE IF NOT EXISTS assessmentNames(
assessmentID VARCHAR (10) UNIQUE,
 name1 VARCHAR (20),
 name2 VARCHAR (20),
 name3 VARCHAR (20),
 name4 VARCHAR (20),
 name5 VARCHAR (20),
 name6 VARCHAR (20),
 name7 VARCHAR (20),
 name8 VARCHAR (20),
 name9 VARCHAR (20),
 name10 VARCHAR (20),
 name11 VARCHAR (20),
 name12 VARCHAR (20)
)";
if ($conn->query($assessmentNamesTable)!=TRUE){
    echo "Error creating table assessment Names";
}

#10.3 totals
$assessmentTotalsTable="CREATE TABLE IF NOT EXISTS assessmentTotals(
assessmentID VARCHAR (10),
total1 INT (5),
total2 INT (5),
total3 INT (5),
total4 INT (5),
total5 INT (5),
total6 INT (5),
total7 INT (5),
total8 INT (5),
total9 INT (5),
total10 INT (5),
total11 INT (5),
total12 INT (5)
)";
if ($conn->query($assessmentTotalsTable)!=TRUE){
    echo "Error creating table assessmentTotals";
}

echo "<script>alert('System successfully set Up'); window.location.assign('../admin/')</script>";

#11 Students

$studentsTable="CREATE TABLE IF NOT EXISTS students(
registrationNumber VARCHAR (50) PRIMARY KEY,
studentName VARCHAR (200),
intakeID1 VARCHAR (20),
intakeID2 VARCHAR (20),
intakeID3 VARCHAR (20),
intakeID4 VARCHAR (20),
intakeID5 VARCHAR (20),
status VARCHAR (20),
classID VARCHAR(20)
)";
if ($conn->query($studentsTable)!=TRUE){
    echo "Error creating table students";
}





/*
 * if ($conn->query()!=TRUE){
    echo "Error creating table ";
}*/
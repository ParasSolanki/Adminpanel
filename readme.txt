PROJECT_NAME: ADMIN-PANEL WITH CRUD..

NOTE: All database, table and columns names should be same as mention below..

NOTE: firstname of admin should be admin..

database = "student_portal";
table = "information";

You have to manually create database called 'student_portal'.
SQL:
    "CREATE DATABASE student_portal";

In This database create one Table called 'information'.
SQL:
    "CREATE TABLE information (
        id NOT NULL PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(25),
        lastname VARCHAR(25),
        email VARCHAR(25),
        password VARCHAR(25),
        status ENUM('Active', 'Inactive')
    )";

information table must contain this fields..
    1. id (NOT NULL PRIMARY KEY AUTO INCREMENT).
    2. firstname (VARCHAR(25)).
    3. lastname (VARCHAR(25)).
    4. email (VARCHAR(25)).
    5. password (VARCHAR(30)).
    6. status (ENUM('Active', 'Inactive')).

Note: By Default all users status are Active...


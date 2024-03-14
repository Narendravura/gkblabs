# gkblabs


# Accessing and Running PHP Files with XAMPP

This repository contains PHP files that can be run using XAMPP, a free and open-source cross-platform web server solution stack package developed by Apache Friends. XAMPP enables users to set up a local web server environment suitable for testing and development purposes.

## Prerequisites

Before proceeding, ensure you have the following installed on your system:

1. **XAMPP**: Download and install XAMPP from the official website: [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html)
   
2. **Web Browser**: Any modern web browser such as Google Chrome, Mozilla Firefox, or Microsoft Edge.

## Steps to Access and Run PHP Files

Follow these steps to access and run the PHP files in this repository using XAMPP:

### 1. Clone the Repository

Clone this repository to your local machine using Git or download the ZIP file and extract it to a directory of your choice.

```bash
git clone <repository_url>


# Creating a MySQL Database and Table in phpMyAdmin

This guide will walk you through the process of creating a MySQL database named `gkb` in phpMyAdmin and creating a table named `users` with columns for `id`, `fullname`, `email`, `age`, and `dateOfBirth`.

## Prerequisites

Before proceeding, ensure you have the following:

1. **XAMPP**: Ensure that XAMPP is installed and Apache and MySQL servers are running. You can start them using the XAMPP Control Panel.

2. **Web Browser**: Any modern web browser such as Google Chrome, Mozilla Firefox, or Microsoft Edge.

## Steps to Create Database and Table

Follow these steps to create the database and table in phpMyAdmin:

### 1. Access phpMyAdmin

Open your web browser and navigate to `http://localhost/phpmyadmin`. This will take you to the phpMyAdmin interface.

### 2. Log in to phpMyAdmin

Log in using your MySQL username and password. By default, the username is `root` and there is no password (leave the password field blank).

### 3. Create Database

Click on the "Databases" tab at the top of the page. In the "Create database" field, enter `gkb` as the database name and click on the "Create" button.

### 4. Create Table

1. With the `gkb` database selected in the left sidebar, click on the "SQL" tab at the top.

2. In the SQL query box, paste the following SQL query to create the `users` table:

```sql
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100),
    email VARCHAR(100),
    age INT,
    dateOfBirth DATE
);


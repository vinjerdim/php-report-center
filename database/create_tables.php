<?php

require_once("./db.php");

function create_users_table()
{
    $sql = "
    CREATE TABLE IF NOT EXISTS users (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nik CHAR(16) UNIQUE NOT NULL,
        name VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        phone VARCHAR(20) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );";
    execute_query($sql);
}

function create_officers_table()
{
    $sql = "
    CREATE TABLE IF NOT EXISTS officers (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        level ENUM('admin', 'petugas') NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );";
    execute_query($sql);
}

function create_reports_table()
{
    $sql = "
    CREATE TABLE IF NOT EXISTS reports (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT UNSIGNED NOT NULL,
        text TEXT NOT NULL,
        file_url CHAR(40) UNIQUE NOT NULL,
        file_type VARCHAR(40) NOT NULL,
        status ENUM('new', 'in review', 'approved', 'rejected') NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );";
    execute_query($sql);
}

function create_feedbacks_table()
{
    $sql = "
    CREATE TABLE IF NOT EXISTS feedbacks (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        officer_id INT UNSIGNED NOT NULL,
        report_id INT UNSIGNED NOT NULL,
        text TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        FOREIGN KEY (officer_id) REFERENCES officers(id),
        FOREIGN KEY (report_id) REFERENCES reports(id)
    );";
    execute_query($sql);
}

create_users_table();
create_officers_table();
create_reports_table();
create_feedbacks_table();

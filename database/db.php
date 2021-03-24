<?php

function create_connection()
{
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "report_app";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($conn->connect_error) {
        debug_print_backtrace();
        die("DB connection failed: {$conn->connect_error}");
    }
    return $conn;
}

function execute_query($sql)
{
    $conn = create_connection();
    $result = $conn->query($sql);
    if ($result === FALSE) {
        debug_print_backtrace();
        die("Error when executing query: {$conn->error}");
    }
    $conn->close();
    return $result;
}

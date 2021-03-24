<?php

require_once("./db.php");

function drop_users_table()
{
    $sql = "DROP TABLE IF EXISTS users";
    execute_query($sql);
}

function drop_officers_table()
{
    $sql = "DROP TABLE IF EXISTS officers";
    execute_query($sql);
}

function drop_reports_table()
{
    $sql = "DROP TABLE IF EXISTS reports";
    execute_query($sql);
}

function drop_feedbacks_table()
{
    $sql = "DROP TABLE IF EXISTS feedbacks";
    execute_query($sql);
}

drop_feedbacks_table();
drop_reports_table();
drop_officers_table();
drop_users_table();

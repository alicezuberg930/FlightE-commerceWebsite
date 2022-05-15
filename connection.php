<?php
const HOST = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE = "quanlyvemaybay";

// const HOST = "sql109.epizy.com";
// const USERNAME = "epiz_31687397";
// const PASSWORD = "5XvzmZhUF8DViI";
// const DATABASE = "epiz_31687397_zippo";

function connection()
{
    $connect = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    if (mysqli_error($connect)) {
        die("Connection failed");
    }
    mysqli_set_charset($connect, "utf8");
    return $connect;
}

function Query($sql)
{
    $connect = connection();
    $query = mysqli_query(connection(), $sql);
    $connect->close();
    return $query;
}
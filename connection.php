<?php
const HOST = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE = "quanlyvemaybay";

// const HOST = "sql110.epizy.com";
// const USERNAME = "epiz_30452646";
// const PASSWORD = "daDx970qVCVa74F";
// const DATABASE = "epiz_30452646_quanlyvemaybay";

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
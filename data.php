<?php
require_once "config.php";

function db_connect() {
    $con = mysqli_connect(HOST,USER,PASS,DATABASE);
    confirm_con();
//    var_dump($con);
    return $con;
}


function confirm_con() {
    if (mysqli_connect_errno()) {
        $msg = "数据库链接失败:";
        $msg .= mysqli_connect_error();
        $msg .= " (" . mysqli_connect_errno() . ")";
        exit($msg);
    }
}
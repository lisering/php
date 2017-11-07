<?php
require_once "data.php";
function getstates() {
    $con = db_connect();
    $sql = "SELECT * FROM state ";
    $sql .= "ORDER BY recordTime ASC";
    $states_set = mysqli_query($con, $sql);
    confirm_result_set($states_set);

    //to json
    $data = array();
    $areas = array();
    $states = array();
    while ($state = mysqli_fetch_assoc($states_set)) {
        if (!in_array($state['areaName'], $areas)) {
            array_push($areas, $state['areaName']);
        }
        if ($state['stateImg']) {
            array_push($states, $state);
        }
    }

    $data['areas'] = $areas;
    $data['states'] = $states;

    echo json_encode($data);

    mysqli_free_result($states_set);
    db_disconnect($con);
}


function confirm_result_set($result_set) {
    if (!$result_set) {
        exit("数据查询失败！");
    }
}
function db_disconnect($con) {
    if(isset($con)) {
        mysqli_close($con);
    }
}
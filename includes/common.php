<?php

function clean($idata) {
    if (!empty($idata) && is_string($idata)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '', "\\'", '\\"', '\\Z'), $idata);
    }

    return $idata;
}

function request($rdata) {
    return isset($_REQUEST[$rdata]) ? $_REQUEST[$rdata] : '';
}

function get($gdata) {
    return isset($_GET[$gdata]) ? $_GET[$gdata] : '';
}

function GetArrayValue($str, $lab) {
    if (isset($str[$lab])) {
        return $str[$lab];
    } else {
        return "";
    }
}

function Response($status, $status_message, $data) {
    header("HTTP/1.1 " . $status);

    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;

    $json_response = json_encode($response);
    echo $json_response;
    exit();
}

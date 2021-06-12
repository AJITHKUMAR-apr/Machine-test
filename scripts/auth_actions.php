<?php
require '../includes/config.php';
require '../includes/database.php';
require '../includes/common.php';


$action = clean(request('action'));
if ($action == "login") {
    exit("success");
}

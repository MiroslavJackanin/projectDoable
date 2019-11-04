<?php
    require '../_partials/header.php';

    $data = $database->select('tasks','*');
    echo '<pre>';
    print_r($data);
    echo '<pre>';
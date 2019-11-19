<?php

    function renderTask($title, $text)
    {
        return
        '<div class="card text-white bg-primary mb-3" style = "max-width: 30rem;" >'
        .'<div class="row justify-content-between card-header" style = "width: 100%; max-width:489px; margin:0;" >'
        . $title .'</div>'
        .'<div class="card-body" >'
        .'<h4 class="card-title" >'.'HTML'.'</h4 >'
        .'<p class="card-text" >'. $text .'</p >'
        .'</div >'
        .'</div >';
    }
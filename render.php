<?php

    function renderTask($title, $text, $id)
    {
        return
        '<div class="card text-white bg-primary mb-3" style = "max-width: 30rem;" >'
        .'<div class="row justify-content-between card-header" style = "width: 100%; max-width:489px; margin:0;" >'
        . $title . '<form action="_inc/delete_item.php" method="get" >' 
                    .'<input type="hidden" name="id" value='.$id.'>'
                     .'<input type= "submit" name ="delete-item" value="Delete">' 
                     .'</form>' . '</div>'
        .'<div class="card-body" >'
        .'<h4 class="card-title" >'.'HTML'.'</h4 >'
        .'<p class="card-text" >'. $text .'</p >'
        .'</div >'
        .'</div >';
    }
<?php

    function renderTask($title, $text, $id, $id_user){
        return
        '<div class="card text-white bg-primary mb-3" style = "max-width: 30rem;">'
            .'<div class="row justify-content-between align-items-center card-header" style = "width: 100%; max-width:489px; margin:0;">'
                .$title
                .'<div style="display: flex; flex-direction: row; justify-content: center; align-content: center;">'
                    .'<form action="_inc/delete_item.php" method="get">'
                        .'<input type="hidden" name="id" value='.$id.'>'
                        .'<input class="btn btn-outline-danger" style="margin-left: 5px;" type="submit" name="delete-item" value="Delete">'
                    .'</form>'
                    .'<input class="btn btn-outline-warning" style="margin-left: 5px;" type="submit" name="edit-item" value="Edit">'
                    .'<button class="btn btn-outline-primary" style="margin-left: 5px;" data-toggle="collapse" data-target="#demo">'.'+'.'</button>'
                .'</div>'
            .'</div>'
            .'<div id="demo" class="card-body collapse">'
                .'<p class="card-text" >'. $text .'</p>'
            .'</div>'
        .'</div>';
    }
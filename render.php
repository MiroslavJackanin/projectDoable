<?php

   
    function renderTask($title, $text, $id, $id_user,$date){ 
        
        $datetime=new DateTime($date);

        return
        '<div class="card text-white bg-primary mb-3" style = "max-width: 30rem;">'
            .'<div class="row justify-content-between align-items-center card-header" style = "width: 100%; max-width:489px; margin:0;">'
                .'<div>'.'<h5>'.$title.'</h5>'.'</div>'.'<br>'
                .'<em>'.'<small>'.$datetime->format('d-m-Y').'</small>'.'</em>'
                .'<div style="display: flex; flex-direction: row; justify-content: center; align-content: center;">'
                    .'<form action="_inc/delete_item.php" method="get">'
                        .'<input type="hidden" name="id" value='.$id.'>'
                        .'<input onclick="return checkdelete()" class="btn btn-outline-danger delete-form-btn" style="margin-left: 5px;" type="submit" name="delete-item" value="Delete">'
                    .'</form>' 
                    
                    .'<form action="edit_page.php" id="edit-form-btn" method="get">'
                    .'<input type="hidden" name="edit_id" value='.$id.'>'
                    
                    .'<input  class="btn btn-outline-warning" style="margin-left: 5px;" type="submit" name="edit_item" value="Edit">'
                    .'</form>'
                        /* .'<form id="edit-form" action="_inc/edit-item.php" method="post">'
                                .'<div class="card text-white bg-dark mb-3 form-content" style="max-width: 30rem; min-height: 20rem;">'
                                .'<div class="row justify-content-between" style="max-width: 436px; margin: 0;">'
                                .'<input type="text" class="form-control" name="title" placeholder="header" style="max-width: 10rem;">'
                                    
                                .'</div>'
                                .'<div class="card-body">'
                                    .'<h4 class="card-title">'
                                        .'<input type="text" class="form-control"  placeholder="title of your task" style="max-width: 30rem;">'
                                    .'</h4>'
                                    .'<p class="card-text">'
                                        .'<textarea class="form-control" name="message3" value='.$text.' placeholder="details of your task" rows="3" style="height: 97px;"></textarea>'
                                    .'</p>'
                                .'</div>'
                                .'<div class="confirm-buttons">'
                                    .'<input class="btn btn-danger btn-lg edit-cancel-btn" type="submit" name="cancel" value="Cancel">'
                                    .'<input class="btn btn-primary btn-lg edit-save-btn" type="submit" name="edit-task" value="Save changes">'
                                .'</div>'
                               .'</div>'
                        .'</form>'*/
                   
                    .'<button class="btn btn-outline-primary" style="margin-left: 5px;" data-toggle="collapse" data-target="#demo">'.'+'.'</button>'
                .'</div>'
            .'</div>'
            .'<div id="demo" class="card-body collapse">'
                .'<p class="card-text" >'. $text .'</p>'
            .'</div>'
        .'</div>';
    }
<?php

   
    function renderTask($title, $text, $id, $id_user,$date,$done){ 
        
        $datetime=new DateTime($date);
        if ($done==false) {

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
                    .'<form action="_inc/task_done.php" method="post">'
                    .'<input type="hidden" name="task_id" value='.$id.'>'
                    .'<input  class="btn btn-outline-success" style="margin-left: 5px;" type="submit" name="task_done" value="Done">'
                    .'</form>'            
                    .'<button class="btn btn-outline-primary" style="margin-left: 5px;" data-toggle="collapse" data-target="#demo'.$id.'">'.'+'.'</button>'
                .'</div>'
            .'</div>'
            .'<div id="demo'.$id.'" class="collapse">'
                .'<p class="card-body" >'. $text .'</p>'
            .'</div>'
        .'</div>';
        } else {
            return
            '<div class="card text-white bg-success mb-3" style = "max-width: 30rem;">'
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

                    .'<button class="btn btn-outline-primary" style="margin-left: 5px;" data-toggle="collapse" data-target="#demo'.$id.'">'.'+'.'</button>'
                .'</div>'
            .'</div>'
            .'<div id="demo'.$id.'" class="collapse">'
                .'<p class="card-body" >'. $text .'</p>'
            .'</div>'
        .'</div>';
        }
        }
    
<?php

    function renderTask($title, $text, $id, $id_user,$date,$done){ 
        
        $datetime=new DateTime($date);
        if ($done==false) {

            return
            '<div class="card text-white bg-primary mb-3" style = "max-width: 30rem;">'

                .'<div class="row justify-content-between align-items-center card-header" style = "width: 99%; max-width:489px; margin:0;">'
                    .'<div class="flex-column" style="margin-bottom: 5px">'
                        .'<div>'.'<h5 class="cardTitle">'.$title.'</h5>' .'</div>'
                        .'<em>'.'<small>'.$datetime->format('d-m-Y').'</small>'.'</em>'
                    .'</div>'

                    .'<div class="taskOptions">'

                        .'<form action="_inc/delete_item.php" method="get">'
                            .'<input type="hidden" name="id" value='.$id.'>'
                            .'<button onclick="return checkdelete()" class="btn btn-outline-danger delete-form-btn taskOptions" type="submit" name="delete-item" value="Delete">'.'<span class="fas fa-trash-alt">'.'</span>'.'</button>'
                        .'</form>'

                        .'<form action="edit_page.php" id="edit-form-btn" method="get">'
                            .'<input type="hidden" name="edit_id" value='.$id.'>'
                            .'<button  class="btn btn-outline-warning taskOptions" style="margin-left: 5px;" type="submit" name="edit_item" value="Edit">'.'<span class="fas fa-edit">'.'</span>'.'</button>'
                        .'</form>'

                        .'<form action="_inc/task_done.php" method="post">'
                            .'<input type="hidden" name="task_id" value='.$id.'>'
                            .'<button  class="btn btn-outline-success taskOptions" style="margin-left: 5px;" type="submit" name="task_done" value="Done">'.'<span class="fas fa-check-square">'.'</span>'.'</button>'
                        .'</form>'

                        .'<button class="btn btn-outline-primary taskOptions" style="margin-left: 5px;" data-toggle="collapse" data-target="#demo'.$id.'">'.'<span class="fas fa-caret-square-down">'.'</span>'.'</button>'

                    .'</div>'
                .'</div>'

                .'<div id="demo'.$id.'" class="collapse">'
                    .'<p class="card-body" >'. $text .'</p>'
                .'</div>'
            .'</div>';

        } else {

            return
            '<div class="card text-white bg-success mb-3" style = "max-width: 30rem;">'
                .'<div class="row justify-content-between align-items-center card-header" style = "width: 99%; max-width:489px; margin:0;">'
                    .'<div class="flex-column" style="margin-bottom: 5px">'
                        .'<div>'.'<h5 class="cardTitle">'.$title.'</h5>' .'</div>'
                        .'<em>'.'<small>'.$datetime->format('d-m-Y').'</small>'.'</em>'
                    .'</div>'

                    .'<div class="taskOptions">'

                        .'<form action="_inc/delete_item.php" method="get">'
                            .'<input type="hidden" name="id" value='.$id.'>'
                            .'<button onclick="return checkdelete()" class="btn btn-outline-danger delete-form-btn taskOptions" type="submit" name="delete-item" value="Delete">'.'<span class="fas fa-trash-alt">'.'</span>'.'</button>'
                        .'</form>'

                        .'<form action="edit_page.php" id="edit-form-btn" method="get">'
                            .'<input type="hidden" name="edit_id" value='.$id.'>'
                            .'<button  class="btn btn-outline-warning taskOptions" style="margin-left: 5px;" type="submit" name="edit_item" value="Edit">'.'<span class="fas fa-edit">'.'</span>'.'</button>'
                        .'</form>'

                        .'<button class="btn btn-outline-primary taskOptions" style="margin-left: 5px;" data-toggle="collapse" data-target="#demo'.$id.'">'.'<span class="fas fa-caret-square-down">'.'</span>'.'</button>'

                    .'</div>'
                .'</div>'

                .'<div id="demo'.$id.'" class="collapse">'
                    .'<p class="card-body" >'. $text .'</p>'
                .'</div>'
            .'</div>';
        }
    }
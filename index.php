<?php include "header.php" ?>

<header>
    <div class="jumbotron text-center">
        <h1 class="display-4">
            <span class="text-success">DO</span><span>able</span>
        </h1>
        <p class="lead">Don't leave for tomorrow, what can be done <span class="text-success">NOW!</span></p>
    </div>
</header>

<main>
    <div class="container">
        <div class="row" style="justify-content: space-evenly;">
            <div class="col-sm-5">

                <?php
                    include_once '_inc/config.php';
                    include 'render.php';

                    $result = $database->select('tasks','text');

                    foreach ($result as $text){
                        echo '<div class="card text-white bg-primary mb-3" style = "max-width:30rem;" >'
                                .'<div class="row justify-content-between card-header" style = "width:100%;max-width:489px;margin:0;" >'.'Task1'.'<span class="badge badge-warning">'.'Important'.'</span></div>'
                                .'<div class="card-body" >'
                                    .'<h4 class="card-title" >'.'HTML'.'</h4 >'
                                    .'<p class="card-text" >'. $text .'</p >'
                                .'</div >'
                            .'</div >';
                    }
                ?>
                <!-- non-PHP version of task-cards
                <div class="flex-column">
                    <div class="card text-white bg-primary mb-3" style="max-width: 30rem;">
                        <div class="row justify-content-between card-header" style="width: 100%; max-width:489px; margin:0;">Task 1<span class="badge badge-warning">Important</span></div>
                        <div class="card-body">
                            <h4 class="card-title">HTML</h4>
                            <p class="card-text">Create a basic HTML layout of our page.</p>
                        </div>
                    </div>
                    <div class="card text-white bg-primary mb-3" style="max-width: 30rem;">
                        <div class="row justify-content-between card-header" style="width: 100%; max-width:489px; margin:0;">Task 2<span class="badge badge-success">Completed</span></div>
                        <div class="card-body">
                            <h4 class="card-title">CSS</h4>
                            <p class="card-text">Create a design for our page using CSS, Bootstrap or any other CSS framework.</p>
                        </div>
                    </div>
                </div>
                -->
            </div>

            <form id="add-form" class="col-sm-5" action="_inc/add-item.php" method="post">
                <div class="card text-white bg-dark mb-3" style="max-width: 30rem; min-height: 20rem;">
                    <div class="card-header">
                        <div class="row justify-content-between" style="max-width: 436px; margin: 0;">
                            <input type="text" class="form-control" placeholder="header" style="max-width: 10rem;">
                            <div>
                                <button type="button" class="btn btn-outline-success">Primary</button>
                                <button type="button" class="btn btn-outline-warning">Secondary</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <input type="text" class="form-control" placeholder="title of your task" style="max-width: 30rem;">
                        </h4>
                        <p class="card-text">
                            <textarea class="form-control" name="message3" placeholder="details of your task" rows="3" style="height: 97px;"></textarea>
                        </p>
                    </div>
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Add task">
                </div>
            </form>
        </div>
    </div>
</main>

<footer>

</footer>

<?php include "footer.php" ?>
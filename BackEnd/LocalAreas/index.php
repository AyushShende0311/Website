<?php   
    require_once str_replace($_SERVER['DOCUMENT_ROOT'], " ", realpath('../header.php'));
    require_once str_replace($_SERVER['DOCUMENT_ROOT'], " ", realpath('../Users/Session.php')); 
    require_once str_replace($_SERVER['DOCUMENT_ROOT'], " ", realpath('../Database.php'));
    require_once 'LocalAreas.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../bootstrap-5.1.3-dist\css\bootstrap.min.css" >
</head>
<body>
  
    <?php if(Session::isLoggedIn()): ?>
        <?= nav() ?>
        <script>
            var navLink = document.querySelector("#page-localarea");
            navLink.classList.add("active");
        </script>

        <?php
            session_start();
            $models = LocalAreas::get_with_join();
        ?>

        <?php 
            if(isset($_SESSION['message'])):
        ?>  
            <div class="alert alert-<?= $_SESSION['msg_type'];?>" >
                <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']); 
                ?>
            </div>
        
        <?php endif ?>

        <div class="container-sm p-0">
            <a href="form.php" class="mb-3 btn btn-primary">Add LocalArea</a>
            <div class="ph-5  row justify-content-center">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>id</th>
                            <th>Local Area name</th>
                            <th>taluka_name</th>
                            <th>created_by</th>
                            <th>updated_by</th>
                            <th>created_datetime</th>
                            <th>updated_datetime</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <?php $count = 0 ?> 
                    <?php while($count < count($models)):?>
                        <tr>
                            <td> <?=$count+1?></td>
                            <td><?= $models[$count]->id; ?></td>
                            <td><?= $models[$count]->name; ?></td>
                            <td><?= $models[$count]->taluka_name; ?></td>
                            <td><?= $models[$count]->created_by; ?></td>
                            <td><?= $models[$count]->updated_by; ?></td>
                            <td><?= $models[$count]->created_datetime; ?></td>
                            <td><?= $models[$count]->updated_datetime; ?></td>
                            <td>
                                <a href="update.php?edit=<?=$models[$count]->id;?>" class="btn btn-success">Edit</a>
                                <a href="LocalAreasController.php?delete=<?= $models[$count]->id;?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $count += 1?>
                    <?php endwhile; ?>
                </table>
            </div>
        </div>
    <?php else : ?>
        <?php header("location:../Users/login.php"); ?>
    <?php endif ?>
</body>
<script src="../../../bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
</html>
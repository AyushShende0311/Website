<?php 
        require_once $_SERVER['DOCUMENT_ROOT'].(str_replace($_SERVER['DOCUMENT_ROOT'], " ", realpath('../header.php')));
        require_once $_SERVER['DOCUMENT_ROOT'].(str_replace($_SERVER['DOCUMENT_ROOT'], " ", realpath('../Districts/Districts.php')));
        require_once $_SERVER['DOCUMENT_ROOT'].(str_replace($_SERVER['DOCUMENT_ROOT'], " ", realpath('../Schemes/Schemes.php')));
        require_once $_SERVER['DOCUMENT_ROOT'].(str_replace($_SERVER['DOCUMENT_ROOT'], " ", realpath('../DistrictWiseSchemes/DistrictWiseSchemes.php')));
        require_once 'ImagesController.php'; 
        require_once 'Images.php';
        require_once $_SERVER['DOCUMENT_ROOT'].(str_replace($_SERVER['DOCUMENT_ROOT'], " ", realpath('../Database.php')));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../bootstrap-5.1.3-dist\css\bootstrap.min.css" >
    <title>Document</title>
</head>
<body>
    <?= nav() ?>
    <script>
        var navLink = document.querySelector("#page-images");
        navLink.classList.add("active");
    </script>
    <?php
        $implementedSchemes = DistrictWiseSchemes::get_with_join();
    ?>
   <!-- Form -->
    <div class="container-lg">
        <div class="p-5 row justify-content-center">
            <form action="ImagesController.php" method="POST">
                <div class="mb-3">

                    <!-- District  -->
                    <label  class="form-label">Add to </label>
                    <select id="district" name='district' class="form-control mb-3" >
                        <option disable="true" value="0" disabled selected> -- Select --</option>
                        <?php foreach($implementedSchemes as $implementedScheme): ?>
                          <option value="<?= $implementedScheme->id?>" >
                            <?= 
                            $implementedScheme->district_name.
                            "->".$implementedScheme->taluka_name.
                            "->".$implementedScheme->localarea_name.
                            "->".$implementedScheme->scheme_name 
                            ?> 
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit"  class="btn btn-primary" name="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
    
</body>
<script src="../../../bootstrap-5.1.3-dist\js\bootstrap.min.js"></script>
<script src="DistrictWiseSchemesJs.js"></script>
</html>
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

    <?php 
        require $_SERVER['DOCUMENT_ROOT']."\BackEnd\controller\talukaController.php";
    ?>
   
    <div class="container-lg">

        <div class="p-5 row justify-content-center">
            <form action="../../controller/talukaController.php" method="POST">
                <div class="mb-3">
                    <label  class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Enter Taluka Name" name='name'>
                    <input type="text" class="form-control" placeholder ="Enter District id" name='district_id'>
                </div>
                <div class="mb-3">
                    <button type="submit"  class="btn btn-primary" name="submit">Save</button>
                </div>
            </form>
        </div>

    </div>
    
</body>
</html>
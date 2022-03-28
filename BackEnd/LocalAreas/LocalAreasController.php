
<?php
  require_once 'LocalAreas.php';
  
  require_once $_SERVER['DOCUMENT_ROOT'].(str_replace($_SERVER['DOCUMENT_ROOT'], " ", realpath('../Database.php')));
  session_start();
?>

<?php
   
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $taluka_id = $_POST['taluka'];
        if(LocalAreas::save($name,$taluka_id)){
            $_SESSION['message'] = "Record has been saved";
            $_SESSION['msg_type'] = "success";
        }else{
            $_SESSION['message'] = "Something went wrong!";
            $_SESSION['msg_type'] = "danger";
        }
        header("location:index.php");
    }

    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $taluka_id = $_POST['taluka'];
        $serialized_model = $_POST["model"];
        $model = unserialize($serialized_model);
        $model->name = $name;
        if(LocalAreas::update($model)){
            $_SESSION['message'] = "Record has been updated";
            $_SESSION['msg_type'] = "success";
        }else{
            $_SESSION['message'] = "Something went wrong!";
            $_SESSION['msg_type'] = "danger";
        }
        header("location:index.php");
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        if(LocalAreas::delete($id)){
            $_SESSION['message'] = "Record has been deleted";
            $_SESSION['msg_type'] = "success";
        }
        else {
            $_SESSION['message'] = "Something went wrong can not be deleted!";
            $_SESSION['msg_type'] = "danger";
        }
        header("location:index.php");
    }

?>
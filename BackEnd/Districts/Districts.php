<?php
    require_once str_replace($_SERVER['DOCUMENT_ROOT'], " ", realpath('../Database.php'));
    require_once str_replace($_SERVER['DOCUMENT_ROOT'], " ", realpath('../Users/Session.php'));

    class Districts{
        public static $table_name = "district";
        public $id;
        public $name;
        public $created_datetime;
        public $updated_datetime;
        public $created_by;
        public $updated_by;

        public static function save($name){
            $table = Districts::$table_name;
            $db = new Database();
            $conn = $db->connect();
            $curent_username = Session::getUserName();
            $created_datetime = date("y/m/d H:i:s");
            $updated_datetime = date("y/m/d H:i:s");
            $updated_by = $curent_username;
            $created_by = $curent_username;
            
            $query = "
            insert into $table values(
            default, 
            '$name', 
            '$created_datetime', 
            '$updated_datetime', 
            '$created_by',
            '$updated_by'
            )";

            try{
                $conn->query($query);
                return 1;
            }catch(PDOException $e){
                return 0;
            }
            return 0;
        }

        public static function update($model){
            $table = Districts::$table_name;
            $model->updated_by = Session::getUserName();
            $model->updated_datetime = date("y/m/d H:i:s");
            
            $query = " update $table
            set 
            name='$model->name', 
            updated_by='$model->updated_by', 
            updated_datetime='$model->updated_datetime' 
            where id=$model->id ";
            $db = new Database();
            $conn = $db->connect();
            try{
                $conn->query($query);
                return 1;
            }
            catch(PDOException $e){
                return 0;
            }
        }

        public static function get(){
            $table = Districts::$table_name;
            $db = new Database();
            $conn = $db->connect();
            $result = array();

            $query = "select * from $table";
            try{
                $ans = $conn->query($query);
                while($row = $ans->fetch()){
                    $model = Districts::load($row);
                    array_push($result, $model);
                }
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            return $result;
        }

        public static function get_with_id($id){
            $table = Districts::$table_name;
            $db = new Database();
            $conn = $db->connect();
            
            $query = "select * from $table where id=$id";
            try{
                $ans = $conn->query($query);
                if(count($rows = $ans->fetchAll())){
                    return Districts::load($rows[0]);
                }
                else{
                    return 0;
                }         
            }catch(PDOException $e){
                return 0;
            }
        }

        public static function delete($id){
            $table = Districts::$table_name;
            $db = new Database();
            $conn = $db->connect();

            $query = "delete from $table where id=$id"; 
            try{
                $conn->query($query);
                return 1;
            }
            catch(PDOException $e){
                return 0;
            }
        }

        public static function load($row){
            $object = new Districts();
            $object->id = $row['id'];
            $object->name = $row['name'];
            $object->created_datetime = $row['created_datetime'];
            $object->updated_datetime = $row['updated_datetime'];
            $object->created_by = $row['created_by'];
            $object->updated_by = $row['updated_by'];
            return $object;
        }
    }
?>
<?php
require_once 'dbHelper.php';
$db = new dbHelper();

  $datetime = date('Y-m-d H:i:s'); 

  $date = date('Y-m-d'); 

  $base_server = "http://localhost/project-Folder" ; //absolute Path to project Root folder 

  // db connection
      $dsn = 'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8';
        try {
            $connection = new PDO($dsn, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PDOException $e) {
            $response["status"] = "error";
            $response["message"] = 'Connection failed: ' . $e->getMessage();
            $response["data"] = null;
            exit;
        }




// Function to creat Slug field form a given string 

function CreateUnderscoreSlug($string) {

    $table = array(
            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-'
    );

    // -- Remove duplicated spaces
    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

    // -- Returns the slug field 
    return strtolower(strtr($string, $table));


}




// function to check the entity for Images so as to insert into the right image directory (Required by ImageHandler)

function CheckEntity($entity){
    if ($entity=="whatever") {
        return("whatever-img");
    }
    elseif ($entity=="staff") {
        return("staff-img");
    }
}

//function to handle images

function imageHandler($filename,$tmpfilename,$entity)
{     
    
       $filename_ext = pathinfo($filename, PATHINFO_EXTENSION);

       if($filename_ext=="jpg" or $filename_ext=="png" or $filename_ext =="jpeg"  or $filename_ext =="JPG"  or $filename_ext =="JPEG" or $filename_ext == "gif")
       {
           $newfilename = time().".".$filename_ext;
           move_uploaded_file($tmpfilename,CheckEntity($entity)."/".$newfilename) ;
           
               return $newfilename;
           }
           else
           {
               //echo "Operation not completed";
                 return false;
           }
           
       }



// function to register register Todo

function AddTodo($db,$name,$status,$datetime,$reg_to){ 

  $rows = $db->insert("todos", array( 'name_task' => "$name", 'status' => "$status" , 'reg_at' => "$datetime" , 'reg_to' => "$reg_to"  ), array('name_task', 'status', 'reg_at') ) ;
print_r($rows) ;
exit() ;  
     if ($rows['status'] == "success") {
       return true ;
     }
        else{
       return false;
    }
}



// function to Edit  register Todo

function UpdateTodo($db,$name,$status,$datetime,$reg_to,$id){ 

  $rows = $db->update("todos", array( 'name_task' => "$name", 'status' => "$status" , 'reg_at' => "$datetime" , 'reg_to' => "$reg_to"  ),  array( 'id' => "$id" ), array('name_task', 'status', 'reg_at') ) ;
// print_r($rows) ;
// exit() ;  
     if ($rows['status'] == "success") {
       return true ;
     }
        else{
       return false;
    }
}


// Function Get Todos 

function GetTasks($db){ 
    $row = $db->select("todos", array());
    print_r(json_encode($row));
}



// Function Finish Todo 

function FinishTodo($db,$id){ 

  $rows = $db->update("todos", array( 'status' => "Completed"),  array( 'id' => "$id" ), array() ) ;
// print_r($rows) ;
// exit() ;  
     if ($rows['status'] == "success") {
       return true ;
     }
      else{
       return false;
    }
}


// function to Delete a Task 

function DeleteTodo($db,$id){

  $rows = $db->delete("todos" , array('id' => "$id" ) ) ;

     if ($rows['status'] == "success") {
       return true ;
       }
      else{
         return false;
      }
}











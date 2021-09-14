<?php
  session_start();
  require("../include/lib/lib.php");
  $db = new banco();
  

//------------------------------------ AUTH USER -------------------------------------------------------------------------------------------------------------------------------------

  
if($_GET['user'] != ""){

    try {

        $db->consulta("select password from user where email='$_GET[user]'");

        if($line=mysqli_num_rows($db->res) != 0){
            
            $psswd = $_GET['psswd'];
            
            while ($row = mysqli_fetch_row($db->res)) {
                $hash = $row[0];
            }
            
            if (password_verify($psswd, $hash)) {

                // LOGIN OK
                echo ('1');

                $db->consulta("select name from user where email='$_GET[user]'");

                if($line=mysqli_num_rows($db->res) != 0){
                    while ($row = mysqli_fetch_row($db->res)) {
                        $name = $row[0];
                    }
                }

                @$_SESSION["user"]["email"]= [$name][$_GET['user']];

            } else {
                // WRONG PASSWORD
                echo ('2');
            }

        } else {
            // WRONG USER
            echo ('3');
        }

    }catch(Exception $e) {

        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        
    }
      

}   

?>
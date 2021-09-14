<?php
  session_start();
  require("../include/lib/lib.php");
  $db = new banco();
  

//------------------------------------ AUTH USER -------------------------------------------------------------------------------------------------------------------------------------

  
if($_GET['user'] != ""){

    $db->consulta("select password from user where email='$_GET[user]'");

    if($line=mysqli_num_rows($db->res) != 0){

        
        $psswd = $_GET['psswd'];
        
        while ($row = mysqli_fetch_row($db->res)) {
            $hash = $row[0];
        }
        
        if (password_verify($psswd, $hash)) {
            echo 'A senha é válida';
        } else {
            echo 'A senha é inválida.';
        }

    } else {
        echo 'Usuario não cadastrado';
    }
      

}   

?>
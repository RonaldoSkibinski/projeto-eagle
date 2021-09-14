<?php
  session_start();
  require("../include/lib/lib.php");
  $db = new banco();
  

//------------------------------------ ADD USER -------------------------------------------------------------------------------------------------------------------------------------

  
  if($_GET['add'] == 1){

    $db->consulta("select email from user where email='$_POST[email]'");

    if($line=pg_num_rows($db->res) != 0){

      echo("<script>alert('Este Email já Está Cadastrado.');</script>");

    } else {

      try {
        $db->consulta("insert into user (name, phone, email, address, password) 
        values 
        ('$_POST[name]','$_POST[phone]', '$_POST[email]','$_POST[address]','$_POST[password]')");

        echo("<script>alert('Usuario Cadastrado com Sucesso!');top.location=\"../../index.php\";</script>"); 
      }  catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
      

    }   

  }

?>
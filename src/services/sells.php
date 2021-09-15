<?php
    session_start();
    require("../include/lib/lib.php");
    $db = new banco();
    $id = $_SESSION["id"][0];
    $total = $_SESSION['total'];

    date_default_timezone_set("America/Sao_Paulo");

//------------------------------------ BUY MEDICINES -------------------------------------------------------------------------------------------------------------

if(@$_GET['buy']){

    try {

        $date = date("d/m/Y");
        $db->consulta("insert into sells (userId, dat, mpay, total) values ('$id', '$date', '$_GET[buy]', '$total')");

        $lastSell = 0;
        $db->consulta("SELECT Max(id) as number FROM sells;");

        if($line=mysqli_num_rows($db->res) != 0){
            
            while ($row = mysqli_fetch_row($db->res)) {
                $lastSell = $row[0];
            }

        }

        $db->consulta("select medCod from cart
        WHERE userId = '$id'");

        $medCod = array();

        if($line=mysqli_num_rows($db->res) != 0){
            
            while ($row = mysqli_fetch_row($db->res)) {
                $medCod[] = $row[0];
            }

        }   

        foreach ($medCod as &$value) {
            $db->consulta("insert into sellsmedicines (sellid, medCod) values ('$id', '$value')");
        }      

        unset($value);
        
        $db->consulta("delete from cart
        WHERE userId = '$id'");
        


    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }

}





?>
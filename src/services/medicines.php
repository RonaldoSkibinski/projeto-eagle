<?php
  session_start();
  require("../include/lib/lib.php");
  $db = new banco();

  $id = $_SESSION["id"][0];
  

//------------------------------------ GET MEDICINES -------------------------------------------------------------------------------------------------------------------------------------

if(@$_GET['get'] == "true"){

    try {

        $db->consulta("select cod, name, qtdmg, lab, val, img from medicines");

        if($line=mysqli_num_rows($db->res) != 0){
            
            while ($row = mysqli_fetch_row($db->res)) {

                echo("
                
                <div class='medicine-card'>
                    <table class='med-table'>
                        <tr>
                            <td colspan='2'>
                                <img class='medImg' src='"); echo($row[5]); echo("'> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2' class='tdHead'>"); echo($row[1]); echo(" - "); echo($row[2]); echo("
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2'>
                                "); echo($row[3]); echo("
                            </td>
                        </tr>
                        <tr class='td-bar'>
                            <td>
                                <h3>R$"); echo($row[4]); echo("</h4>
                            </td>
                            <td>
                                <button class='btnMed' onclick='addToCart("); echo($row[0]); echo(")'> Adicionar o Carrinho </button>
                            </td>
                        </tr>
                    </table>
                </div>
                
                ");
            }   

        } else {
            // EMPTY TABLE
            echo ('3');
        }

    }catch(Exception $e) {

        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        
    }
      

} else if(@$_GET['get'] == "non") {

    try {        

        $db->consulta("select cod, name, qtdmg, lab, val, img from medicines
        INNER JOIN cart ON cart.medCod = medicines.cod and cart.userId = '$id'");

        if($line=mysqli_num_rows($db->res) != 0){
            
            while ($row = mysqli_fetch_row($db->res)) {

                echo("
                
                <div class='medicine-card-mini'>
                    <table class='med-table'>
                        <tr>
                            <td>
                                <img class='medImg-mini' src='"); echo($row[5]); echo("'> 
                            </td>
                        </tr>
                        <tr>
                            <td class='tdHead'>"); echo($row[1]); echo(" - "); echo($row[2]); echo("
                            </td>
                        </tr>
                        <tr>
                            <td>
                                "); echo($row[3]); echo("
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>R$"); echo($row[4]); echo("</h3>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button class='btnMed' onclick='remCart("); echo($row[0]); echo(")'> Remover do Carrinho </button>
                            </td>
                        </tr>
                    </table>
                </div>
                
                ");
            }     
            
            echo("<script> 

                        buyBtn document.getElementById('buyBtn');
                        buyBtn.style.disabled = 'false';

                </script>");

        } else {
            // EMPTY TABLE
            echo ('Carrinho Vazio');
        }      


    }catch(Exception $e) {

        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        
    }

} else {
    
    $db->consulta("select SUM(val) AS total from medicines
    INNER JOIN cart ON cart.medCod = medicines.cod and cart.userId = '$id'");

    if($line=mysqli_num_rows($db->res) != 0){
        
        while ($row = mysqli_fetch_row($db->res)) {
            $_SESSION['total'] = $row[0];
            echo("TOTAL R$"); echo($row[0]);
        }
    }
}

//------------------------------------ ADDCART MEDICINES -------------------------------------------------------------------------------------------------------------

if(@$_GET['add']){

    try {

        $id = $_SESSION['id'][0];
        
        $db->consulta("insert into cart (userId, medCod) values ('$id', '$_GET[add]')");


    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }

}

//------------------------------------ REMOVECART MEDICINES -------------------------------------------------------------------------------------------------------------

if(@$_GET['rem']){

    try {

        $id = $_SESSION['id'][0];
        
        $db->consulta("delete from cart where userId = '$id' and medCod = '$_GET[rem]' limit 1");


    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }

}

?>
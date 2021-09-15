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
            $db->consulta("insert into sellsmedicines (sellid, medCod) values ('$lastSell', '$value')");
        }      

        unset($value);
        
        $db->consulta("delete from cart
        WHERE userId = '$id'");
        


    } catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }

}

if(@$_GET['get']){

    try {       

        $sellTotal = array();
        $sellData = array(); 
        $sellId = array();

        $db->consulta(" select id, sells.total, sells.dat from sells where userId = '$id'");

        if($line=mysqli_num_rows($db->res) != 0){
            
            while ($row = mysqli_fetch_row($db->res)) {

                $sellId[] = $row[0];
                $sellTotal[] = $row[1];
                $sellData[] = $row[2];

            }

        } else {
            // EMPTY TABLE
            echo ('Sem compras ainda.');
        } 
        $c = 0;
        foreach ($sellId as &$value) {

            

            $db->consulta("select medicines.name, medicines.lab from medicines
                INNER JOIN sellsmedicines ON sellsmedicines.medCod = medicines.cod 
                AND sellsmedicines.sellid = '$value'");

                if($line=mysqli_num_rows($db->res) != 0){

                    echo("<div class='purch'>
                            <table>
                            <tr>
                                <td class='tdHead'>
                                    Compra ID: "); echo($value); echo(" - "); echo($sellData[$c]); echo("
                                </td>
                            </tr>
                            <tr>
                                <td class='tdHead'>
                                    Total: R$"); echo($sellTotal[$c]);
                                    $c = $c + 1;
                                    echo("
                                </td>
                            </tr>                      
                    ");
            
                    while ($row = mysqli_fetch_row($db->res)) {
        
                        echo("
                        
                        <tr>
                            <td>
                                Remedio: "); echo($row[0]); echo(" 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Lab: "); echo($row[1]); echo(" 
                            </td>
                        </tr>
                        
                        ");
                    }  

                    echo("
                        
                        <tr>
                            <td class='tdHead'>    
                                Vai chegar em 3 dias.
                            </td>
                        </tr> 
                            
                        </table>
                    </div>

                    ");
                }
        }    
        
    } catch(Exception $e) {

    }   

}

?>
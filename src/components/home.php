<!DOCTYPE html>
<html>
    
    <head>
        <title>Farmacia Terezinha</title>

        <link rel="stylesheet" href="../include/css/css.css" />

        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />   
             
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <script src="../include/js/medicines.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body onLoad="getMedicines()">

        <div data-role="page"> 
            <div data-role="header" class="header">
                <h1>Farmacia Terezinha</h1>
            </div>            

            <div data-role="content">

                <div id="medicines"></div>

            </div>          

            <div data-role="footer" class="ui-bar">
                <a href="#" data-icon="arrow-u">Subir</a>
            </div>           

        </div>         
        
        <!-- Modal Structure -->

        <div id="backMsg"></div>

        <div id="congratsMessage">
            <div>
                <h2>Credenciais não Encontradas </h2>
                <p>Por favor, revise as informações de login.</p>
            </div>
            <div >
                <a onclick="disarm()">Ok</a>
            </div>
        </div>


    </body>
</html>
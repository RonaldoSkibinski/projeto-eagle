<!DOCTYPE html>
<html>
    
    <head>
        <title>Farmacia Terezinha</title>

        <link rel="stylesheet" href="src/include/css/css.css" />

        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />   
             
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>

    <body>

        <div data-role="page"> 
            <div data-role="header" class="header">
                <h1>Farmacia Terezinha</h1>
            </div>            

            <div data-role="content">

                <div class="card">
                    <h4> Bem Vindo(a) à Farmacia Terezinha! </h4>
                </div>

                <div id="mDiv">
                    <div data-role="fieldcontain" class="ui-hide-label">
                        <label for="username">Usuario:</label>
                        <input type="text" name="username" id="username" value="" placeholder="Usuario"/>
                    </div>
                    <div data-role="fieldcontain" class="ui-hide-label">
                        <label for="password">Senha:</label>
                        <input type="text" name="password" id="password" value="" placeholder="Senha"/>
                    </div>

                    <div class="buttonsDiv">
                        <a href="#" class="link"><button class="blueBtn" data-inline="true">Logar</button></a>
                        <a href="#" class="link"><button class="btn" data-icon="star" data-iconpos="left" data-inline="true">Criar Conta</button></a>
                    </div>                    
                </div>

            </div>


            <div data-role="footer" class="ui-bar">
                <a href="#" data-icon="arrow-u">Subir</a>
            </div>
        </div> 
        
    </body>
</html>
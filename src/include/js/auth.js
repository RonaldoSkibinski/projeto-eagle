// USER AUTHENTICATES

function auth() {
    this.email = document.getElementById('username').value;
    this.password = document.getElementById('password').value;

    request = new XMLHttpRequest(); 
      
    authUser(this.email, this.password);

    function authUser(email, password) {
        request.open('GET', 'src/services/auth.php?user='+ email +'&psswd=' + password, true);
        request.send();
    }

    request.onreadystatechange = function(){
        if(request.readyState == 4){

            var response = request.responseText;

            backMsg = document.getElementById('backMsg');
            congratsMessage = document.getElementById('congratsMessage');

            if(response == "1") {
                window.location.replace('src/components/home.php');
            }else if(response == "2") {

                backMsg.style.display = "block";
                congratsMessage.style.display = "block";

                alert('Senha incorreta'); 
            }else {

                backMsg.style.display = "block";
                congratsMessage.style.display = "block"; 
            }
        }
    }
}

function disarm() {
    backMsg = document.getElementById('backMsg');
    congratsMessage = document.getElementById('congratsMessage');

    backMsg.style.display = "none";
    congratsMessage.style.display = "none";
}






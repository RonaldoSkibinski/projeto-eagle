
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
        var div = document.getElementById('respincli');
        div.innerHTML = request.responseText;
        }
    }
}






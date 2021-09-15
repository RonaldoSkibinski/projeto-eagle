// BUY MEDICINES

function buy() {

    request = new XMLHttpRequest(); 

    mpay = document.getElementById('mpay').value;

    function getAll() {
        request.open('GET', '../services/sells.php?buy=' + mpay);
        request.send();
    }

    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var medicines = document.getElementById('cart');
            medicines.innerHTML = request.responseText;          
        }
    }

    getAll();     
    getCart();

}


// APPEAR PURCHASES

function purchases() {

    if($( "#pur-card:hidden" )) {
        $( "#popup:visible" ).toggle();
    }
    
    $( "#pur-card" ).toggle();
    $( "#backMsg" ).toggle();    

    if($( "#pur-card:visible" )) {

        getRequest = new XMLHttpRequest(); 

        function getAll() {
            getRequest.open('GET', '../services/sells.php?get=all');
            getRequest.send();
        }

        getRequest.onreadystatechange = function(){
            if(getRequest.readyState == 4){
                var purchases = document.getElementById('purchases');
                purchases.innerHTML = getRequest.responseText;          
            }
        }

        getAll();

    }
}
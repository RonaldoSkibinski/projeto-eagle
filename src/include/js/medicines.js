
function cart() {

    backMsg = document.getElementById('backMsg');
    cartCard = document.getElementById('cart-card');

    if(backMsg.style.display == "block") {
        backMsg.style.display = "none";
        cartCard.style.display = "none";
    }else {
        backMsg.style.display = "block";
        cartCard.style.display = "block";
    }

    getCart();    

}

// GET MEDICINES

function getMedicines() {

    request = new XMLHttpRequest(); 

    function getAll() {
        request.open('GET', '../services/medicines.php?get=true');
        request.send();
    }

    request.onreadystatechange = function(){
        if(request.readyState == 4){
            var medicines = document.getElementById('medicines');
            medicines.innerHTML = request.responseText;          
        }
    }

    getAll();
}

// ADD TO CART

function addToCart(idProd) {

    medRequest = new XMLHttpRequest(); 

    this.idProd = idProd;

    function addMed() {
        medRequest.open('GET', '../services/medicines.php?add=' + this.idProd);
        medRequest.send();
    }

    addMed();
    getMedicines();

}

// GET CART

function getCart() {

    getRequest = new XMLHttpRequest(); 

    function getAll() {
        getRequest.open('GET', '../services/medicines.php?get=non');
        getRequest.send();
    }

    getRequest.onreadystatechange = function(){
        if(getRequest.readyState == 4){
            var cart = document.getElementById('cart');
            cart.innerHTML = getRequest.responseText;          
        }
    }

    getAll();
    getTotCart()
}

// GET TOTAL CART

function getTotCart() {
    

    totRequest = new XMLHttpRequest(); 

    function getTotal() {
        totRequest.open('GET', '../services/medicines.php?get=tot');
        totRequest.send();
    }

    totRequest.onreadystatechange = function(){
        if(totRequest.readyState == 4){
            var total = document.getElementById('total');
            total.innerHTML = totRequest.responseText;          
        }
    }

    getTotal();

}

// REMOVE FROM CART

function remCart(idProd) {

    remRequest = new XMLHttpRequest(); 

    this.idProd = idProd;

    function remMed() {
        remRequest.open('GET', '../services/medicines.php?rem=' + this.idProd);
        remRequest.send();
    }

    remMed();
    getCart();
    getMedicines();
    getTotCart()

}
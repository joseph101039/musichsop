<script>

    
function limit(element){
    var maxlen = 2;
    if(element.value.length > maxlen){
        element.value = element.value.substr(0, maxlen);
    }
}



function updateCart(element,  id)
{
    if(isNaN(element.value) || element.value < 1){
        element.value = 1;
    }

     // send patch reuqest to update cart
     if(window.XMLHttpRequest) {
    // for IE7+, firefox, chrome, safari
    xmlhttp = new XMLHttpRequest();
    }else {
        // for IE5, IE6
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    
    xmlhttp.open("GET", "/cart/"+ id + "/" + element.value , true);  
    xmlhttp.send();
    calcTotalPrice();

}

function calcTotalPrice(){
    var sum = 0;
    $(".priceTag").each(function(){
        var text = $(this).text();                   // Get the string
        var price  = text.substring(2, text.length); // remove "$ " characters
        price = parseFloat(price);

        var quantity = $(this).closest('tr').find('.quantity').val();
        quantity = parseFloat(quantity);
        sum += price * quantity;
    });
    document.getElementById('price-sum').innerHTML = sum;


}

function deleteCart(id){
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // If a item is deleted, fresh the page. Otherwise, alert users.
            if(this.responseText ==='false'){
                alert("Server connection error! Cannot delete item!");
            }
            else{
                document.getElementById("cart-quantity").innerHTML = this.responseText;
                window.location.href=window.location.href;
            }
        }
    }
    xmlhttp.open("GET", "/deleFromCart/"+ id , true);
    xmlhttp.send();
   
}


function checkout()
{
    if(window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // If all items are deleted, fresh the page. Otherwise, alert users.
            if(this.responseText ==='true'){
                /* window.location.href=window.location.href; */
                // get to order info page
                window.location.href="{{route('order.index')}}";
            }
            else if(this.responseText ==='none'){
                alert("Nothing added into cart!");
            }
            else{
                alert("Server connection error! Cannot checkout currently!");
            }
        }
    }


    xmlhttp.open("GET", "/checkout" , true);
    xmlhttp.send();
}
</script>
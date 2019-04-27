<script>
    function updateBrowse()
    {
        if (window.XMLHttpRequest) {
            // for IE7+, firefox, chrome, safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // for IE5, IE6
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("displayAlbum").innerHTML = this.responseText;
            }
        };
        

        var e = document.getElementById("singer");
        var singer = e.options[e.selectedIndex].value;
        e = document.getElementById("newest");
        var newest = e.options[e.selectedIndex].value;
        e = document.getElementById("rank");
        var rank = e.options[e.selectedIndex].value;
  
        queryString = 'singer='+ singer + '&newest=' + newest + '&rank=' + rank;

        xmlhttp.open("GET","/query?"+queryString ,true);
        xmlhttp.send(queryString);
    }


    function addToCart(id)
    {
        if(window.XMLHttpRequest) {
            // for IE7+, firefox, chrome, safari
            xmlhttp = new XMLHttpRequest();
        }else {
            // for IE5, IE6
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET", "modules/addToCart.php?id=" + id, true);
        xmlhttp.send();
    }



</script>
/**
 * Created by amer on 11/16/16.
 */

function loadSubPage(link) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {// Anonimna funkcija
        if (ajax.readyState == 4 && ajax.status == 200)
            document.getElementById("subpage").innerHTML = ajax.responseText;
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("subpage").innerHTML = "Greska: nepoznat URL";
    }

    ajax.open("GET", link, true);
    ajax.send();
}
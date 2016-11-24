/**
 * Created by amer on 11/11/16.
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

var regexNaziv = /^[A-Za-z ]{3,20}$/;

function invalidName(){
    var imeValue = document.getElementById('ime').value;
    var imeObject = document.getElementById('ime');

    if(imeValue=='' || imeValue==null){
        imeObject.setCustomValidity('Potrebno je unijeti ime');
    }
    else if(!regexNaziv.test(imeValue)){
        imeObject.setCustomValidity('Forma unesenog imena nije ispravna');
    }
    else{
        imeObject.setCustomValidity('')
    }
    return true;

}

function invalidSurname(){
    var prezimeValue = document.getElementById('prezime').value;
    var prezimeObject = document.getElementById('prezime');

    if(prezimeValue==''){
        prezimeObject.setCustomValidity('Potrebno je unijeti prezime');
    }
    else if(!regexNaziv.test(prezimeValue)){
        prezimeObject.setCustomValidity('Forma unesenog prezimena nije ispravna');
    }
    else{
        prezimeObject.setCustomValidity('')
    }
    return true;

}

function invalidPhone(){
    var regexTelefon = /^[0-9 ]{3}-[0-9 ]{3}-[0-9]{3,4}$/;

    var telefonValue = document.getElementById('telefon').value;
    var telefonObject = document.getElementById('telefon');

    if(telefonValue==''){
        telefonObject.setCustomValidity('Potrebno je unijeti broj telefona');
    }
    else if(!regexTelefon.test(telefonValue)){
        telefonObject.setCustomValidity('Forma unesenog broja telefona nije ispravna! (npr. 061-111-111 ili 061-111-1111)');
    }
    else{
        telefonObject.setCustomValidity('')
    }
    return true;
}

function invalidLocation(){
    var regexLokacija = /^[A-Za-z0-9, ]{3,20}$/;
    var lokacijaValue = document.getElementById('lokacija').value;
    var lokacijaObject = document.getElementById('lokacija');

    if(lokacijaValue==''){
        lokacijaObject.setCustomValidity('Potrebno je unijeti vašu lokaciju');
    }
    else if(!regexLokacija.test(lokacijaValue)){
        lokacijaObject.setCustomValidity('Forma unesene lokacije nije ispravna');
    }
    else{
        lokacijaObject.setCustomValidity('')
    }
    return true;
}

function invalidUsername(){
    var regexUsername = /^[A-Za-z0-9_]{1,20}$/;
    var userValue = document.getElementById('userName').value;
    var userObject = document.getElementById('userName');

    if(userValue==''){
        userObject.setCustomValidity('Potrebno je unijeti vaše željeno korisničko ime');
    }
    else if(!regexUsername.test(userValue)){
        userObject.setCustomValidity('Forma unesenog korisničkog imena nije ispravna (dozvoljeno je koristiti velika, mala slova, brojeve i karakter _)');
    }
    else{
        userObject.setCustomValidity('')
    }
    return true;
}

function invalidMail(){
    var regexMail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    var mailValue = document.getElementById('eMail').value;
    var mailObject = document.getElementById('eMail');

    if(mailValue==''){
        mailObject.setCustomValidity('Potrebno je unijeti vašu e-mail adresu');
    }
    else if(!regexMail.test(mailValue)){
        mailObject.setCustomValidity('Forma unesene e-mail adrese nije ispravna (primjer@domena.com)');
    }
    else{
        mailObject.setCustomValidity('')
    }
    return true;
}

function invalidPassword(){
    var regexPassword = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
    var passwordValue = document.getElementById('password').value;
    var passwordObject = document.getElementById('password');

    if(passwordValue==''){
        passwordObject.setCustomValidity('Potrebno je unijeti vašu lozinku');
    }
    else if(!regexPassword.test(passwordValue)){
        passwordObject.setCustomValidity('Forma unesene lozinke nije ispravna (loznika mora sadržavati minimalno 6 karaktera/maksimalno 20, dozvoljeni specijalni znakovi: !@#$%^&*()_)');
    }
    else{
        passwordObject.setCustomValidity('')
    }
    return true;
}

function invalidRepeatPassword(){
    var passwordValue = document.getElementById('password').value;
    var passwordObject = document.getElementById('password');

    var passwordRepeatValue = document.getElementById('passwordRepeat').value;
    var passwordRepeatObject = document.getElementById('passwordRepeat');

    if(passwordRepeatValue==''){
        passwordRepeatObject.setCustomValidity('Potrebno je ponovno unijeti vašu lozinku');
    }
    else if(passwordRepeatValue!=passwordValue){
        passwordRepeatObject.setCustomValidity('Ponovno unesena lozinka se ne podudara sa lozinkom unesenom iznad. Unesite ponovno');
    }
    else{
        passwordRepeatObject.setCustomValidity('')
    }
    return true;
}


/**
 * Created by amer on 11/13/16.
 */

var regexNaziv = /^[A-Za-z0-9 ]{3,20}$/;
var regexBroj = /^[0-9 ]$/;

function invalidBookName(){
    var nazivValue = document.getElementById('naziv').value;
    var nazivObject = document.getElementById('naziv');

    if(nazivValue==''){
        nazivObject.setCustomValidity('Potrebno je unijeti naziv udžbenika');
    }
    else if(!regexNaziv.test(nazivValue)){
        nazivObject.setCustomValidity('Forma unesenog naziva udžbenika nije ispravna');
    }
    else{
        nazivObject.setCustomValidity('')
    }
    return true;
}

function invalidSubject(){
    var predmetValue = document.getElementById('predmet').value;
    var predmetObject = document.getElementById('predmet');

    if(predmetValue==''){
        predmetObject.setCustomValidity('Potrebno je unijeti naziv predmet udžbenika');
    }
    else if(!regexNaziv.test(predmetValue)){
        predmetObject.setCustomValidity('Forma unesenog naziva predmeta udžbenika nije ispravna');
    }
    else{
        predmetObject.setCustomValidity('')
    }
    return true;
}

function invalidPublishingYear(){
    var godIzdavanjaValue = document.getElementById('godIzdavanja').value;
    var godIzdavanjaObject = document.getElementById('godIzdavanja');

    if(godIzdavanjaValue==''){
        godIzdavanjaObject.setCustomValidity('Potrebno je unijeti godinu izdavanja. Minimalna godina je 1990');
    }
    if(godIzdavanjaValue<1990){
        godIzdavanjaObject.setCustomValidity('Potrebno je unijeti godinu izdavanja. Minimalna godina je 1990');
    }
    else{
        godIzdavanjaObject.setCustomValidity('')
    }
    return true;
}

function invalidPrice(){
    var cijenaValue = document.getElementById('cijena').value;
    var cijenaObject = document.getElementById('cijena');

    if(cijenaValue=='' || cijenaValue==null){
        cijenaObject.setCustomValidity('Potrebno je unijeti cijenu knjige. Minimalna cijena je 1KM. Ako poklanjate knjigu, cijenu postavite na 0KM');
    }
    else if(cijenaValue<0){
        cijenaObject.setCustomValidity('Potrebno je unijeti cijenu knjige. Minimalna cijena je 1KM. Ako poklanjate knjigu, cijenu postavite na 0KM');
    }
    else if(!regexBroj.test(cijenaValue)){
        cijenaObject.setCustomValidity('Unesite brojčanu vrijednost.');
    }
    else{
        cijenaObject.setCustomValidity('')
    }
    return true;
}

function alertProdaja(){
    alert("Uspješno ste postavili knjigu za prodaju.");
}
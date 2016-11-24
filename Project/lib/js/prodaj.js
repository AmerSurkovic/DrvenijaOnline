
/**
 * Created by amer on 11/13/16.
 */

var regexNaziv = /^[A-Za-z0-9 ]{3,20}$/;

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
/**
 * Created by amer on 11/15/16.
 */

function load(){
    window.location.href='#openModal';
    document.getElementById("fullScreen").src = document.getElementById("previewImage").src;

    document.onkeydown = function(evt){
        evt = evt || window.event;
        var isEscape = false;
        if ("key" in evt) {
            isEscape = (evt.key == "Escape" || evt.key == "Esc");
        } else {
            isEscape = (evt.keyCode == 27);
        }
        if (isEscape) {
            window.location.href='#close';
        }
    };
}

window.onload = function () {

}

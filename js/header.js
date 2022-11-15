const divs = document.getElementsByClassName('divs');
function display(e){
    for(let i=0; i<divs.length; i++){
        divs[i].style.display="none"
    }
    document.getElementById(e).style.display='block'
}

function hide(e){
    e.style.display="none";
}
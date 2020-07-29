var tm_body = document.getElementsByTagName("body")[0];
var tm_form = document.getElementById("form-overlay");


function toggleMenu() {
    var right = window.innerWidth - (document.getElementById('header').offsetLeft + document.getElementById('header').offsetWidth);
    console.log(right);
    if(tm_body.classList.contains("menu--open")){
        tm_body.classList.remove("menu--open");
        document.getElementById('menu').style.right = '-100vw';
    }else{
        tm_body.classList.add("menu--open");
        document.getElementById('menu').style.right = right + 'px';
    }
}


function toggleForm(e) {
    var right = window.innerWidth - (document.getElementById('header').offsetLeft + document.getElementById('header').offsetWidth);
    var title = "Submission Form";
    if(tm_body.classList.contains("form--open")){
        tm_body.classList.remove("form--open");
        tm_form.setAttribute('aria-hidden', 'true');
        tm_form.style.right = '-100vw';
    }else{
        tm_body.classList.add("form--open");
        tm_form.setAttribute('aria-hidden', 'false');
        tm_form.style.right = right + 'px';
        
    }
}


function hideOverlay() {
    if(tm_body.classList.contains("menu--open")){
        tm_body.classList.remove("menu--open");
        document.getElementById('menu').style.right = '-100vw';
    }
    if(tm_body.classList.contains("form--open")){
         tm_body.classList.remove("form--open");
         tm_form.setAttribute('aria-hidden', 'true');
         tm_form.style.right = '-100vw';
    }
}

document.addEventListener('click', function (event) {
        if (!event.target.classList.contains('accordion-title')) return;
        var content = document.getElementById(event.target.hash);
//        if (!content) return;
        console.log(content);
        if (event.target.classList.contains('active')) {
            event.target.classList.remove('active');
        }
        content.classList.toggle('visuallyhidden');
});
var tm_body = document.getElementsByTagName("body")[0];

function toggleMenu() {
    if(tm_body.classList.contains("menu--open")){
        tm_body.classList.remove("menu--open");
    }else{
        tm_body.classList.add("menu--open");
    }
}


function toggleForm(e) {
    var tm_form = document.getElementById("form-overlay");
    var title = "Submission Form";
    if(tm_body.classList.contains("form--open")){
        tm_body.classList.remove("form--open");
        tm_form.setAttribute('aria-hidden', 'true');
    }else{
        tm_body.classList.add("form--open");
        tm_form.setAttribute('aria-hidden', 'false');
    }
}


function hideOverlay() {
    if(tm_body.classList.contains("menu--open")){
         tm_body.classList.remove("menu--open");
    }
    if(tm_body.classList.contains("form--open")){
         tm_body.classList.remove("form--open");
         tm_form.setAttribute('aria-hidden', 'true');
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
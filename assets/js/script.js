function toggleMenu() {
  var tm_body = document.getElementsByTagName("body")[0];
    if(tm_body.classList.contains("menu--open")){
        tm_body.classList.remove("menu--open");
    }else{
        tm_body.classList.add("menu--open");
    }
}


function toggleForm(e) {
    var tm_body = document.getElementsByTagName("body")[0];
    var tm_form = document.getElementById("form-overlay");
    var title = "Submission Form";
    var linkUrl = e.getAttribute('data-link');
    console.log(linkUrl);
    if(tm_body.classList.contains("form--open")){
        tm_body.classList.remove("form--open");
        tm_form.setAttribute('aria-hidden', 'true');
    }else{
        tm_body.classList.add("form--open");
        tm_form.setAttribute('aria-hidden', 'false');
//        history.pushState(null, null, linkUrl);
    }
}

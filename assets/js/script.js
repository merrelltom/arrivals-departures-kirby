function toggleMenu() {
  var tm_body = document.getElementsByTagName("body")[0];
    if(tm_body.classList.contains("menu--open")){
        tm_body.classList.remove("menu--open");
    }else{
        tm_body.classList.add("menu--open");
    }
}
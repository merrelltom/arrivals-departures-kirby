/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
!function() {
var tm_body = document.getElementsByTagName("body")[0];
var tm_form = document.getElementById("form-overlay");
var tm_form_inner = document.getElementById("form-title");
var tm_menu = document.getElementById("menu");
var tm_menu_toggles = document.querySelectorAll('.menuToggle');

// IOS VH Fix
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);

/*
================================================================
ACCESSIBILITY
================================================================
*/

(function () {
    'use strict';

    function keyboardFocus (e) {
        if (e.keyCode !== 9) {
            return;
        }

        switch (e.target.nodeName.toLowerCase()) {
            case 'input':
            case 'select':
            case 'textarea':
                break;
            default:
                document.documentElement.classList.add('keyboard-focus');
                document.removeEventListener('keydown', keyboardFocus, false);
        }
    }

    document.addEventListener('keydown', keyboardFocus, false);
})();

for (var i = 0; i < tm_menu_toggles.length; i++) {
    tm_menu_toggles[i].addEventListener('click', function(){
        var right = window.innerWidth - (document.getElementById('header').offsetLeft + document.getElementById('header').offsetWidth);
        if(tm_body.classList.contains("menu--open")){
            this.setAttribute('aria-expanded', 'false');
            tm_body.classList.remove("menu--open");
            document.getElementById('menu').style.right = '-100vw';
        }else{
            this.setAttribute('aria-expanded', 'true');
            tm_body.classList.add("menu--open");
            document.getElementById('menu').style.right = right + 'px';
        }
    });
}


menu.addEventListener('focusout', function(){
    toggle.setAttribute('aria-expanded', 'false');
    tm_body.classList.remove("menu--open");
});

// window.toggleMenu = function() {
//     var right = window.innerWidth - (document.getElementById('header').offsetLeft + document.getElementById('header').offsetWidth);
//     console.log(right);
//     if(tm_body.classList.contains("menu--open")){
//         this.setAttribute('aria-expanded', 'false');
//         tm_body.classList.remove("menu--open");
//         document.getElementById('menu').style.right = '-100vw';
//     }else{
//         this.setAttribute('aria-expanded', 'true');
//         tm_body.classList.add("menu--open");
//         document.getElementById('menu').style.right = right + 'px';
//     }
// }


window.toggleForm = function(e) {
    var right = window.innerWidth - (document.getElementById('header').offsetLeft + document.getElementById('header').offsetWidth);
    var title = "Submission Form";
    if(tm_body.classList.contains("form--open")){
        tm_body.classList.remove("form--open");
        tm_form.setAttribute('aria-hidden', 'true');
        tm_form.style.right = '-100vw';
        tm_form.blur();
    }else{
        tm_body.classList.add("form--open");
        tm_form.setAttribute('aria-hidden', 'false');
        tm_form.style.right = right + 'px';
        tm_form_inner.focus();
    }
}


window.hideOverlay = function() {
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
}();
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
!function() {
"use strict";
// extracted by mini-css-extract-plugin

}();
/******/ })()
;
//# sourceMappingURL=script.js.map
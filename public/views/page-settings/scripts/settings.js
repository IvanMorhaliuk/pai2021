import CookieUtils from "/public/views/shared/scripts/cookieUtils.js";
window.onload = function (){
    import("/public/views/shared/components/header/scripts/menu.js");
    import("/public/views/shared/components/nav/scripts/ActiveTabProvider.js");
    document.querySelector('.person__name').innerHTML = CookieUtils.getCookie('nickname');
};
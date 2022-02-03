import Bookshelf from "/public/views/shared/components/bookshelf/scripts/bookshelf.js";
import ToggleBookCardPopUp from "/public/views/shared/components/overlay/scripts/toggleBookCardPopUp.js";
import CookieUtils from "/public/views/shared/scripts/cookieUtils.js";
import HTMLUtils from "/public/views/shared/scripts/HTMLUtils.js";
window.onload = async function (){
    import("/public/views/shared/components/header/scripts/menu.js");
    import("/public/views/shared/components/nav/scripts/ActiveTabProvider.js");
    document.querySelector('.person__name').innerHTML = CookieUtils.getCookie('nickname');

    let json;
    let response = await fetch("/getalluserbooks");
    if (response.ok){
        json = await response.json();
    }
    json.forEach(elem => elem['content'] = HTMLUtils.decodeHtml(elem['content']));
    let bookshelf = new Bookshelf(json);
    await bookshelf.render();
    new ToggleBookCardPopUp(document.getElementById("bk-list"),json);
};

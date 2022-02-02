import Bookshelf from "/public/views/shared/components/bookshelf/scripts/bookshelf.js";
import ToggleBookCardPopUp from "/public/views/shared/components/overlay/scripts/toggleBookCardPopUp.js";

window.onload = async function (){
    import("/public/views/shared/components/header/scripts/menu.js");
    import("/public/views/shared/components/nav/scripts/ActiveTabProvider.js");

    function decodeHtml(html) {
        let txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }
    let json;
    let response = await fetch("/getAllBooks");
    if (response.ok){
        json = await response.json();
    }
    json.forEach(elem => elem['content'] = decodeHtml(elem['content']));

    let bookshelf = new Bookshelf(json);
    await bookshelf.render();
    new ToggleBookCardPopUp(document.getElementById("bk-list"),json);
};

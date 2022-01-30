import Bookshelf from "/public/views/shared/components/bookshelf/scripts/bookshelf.js";
import ToggleBookCardPopUp from "/public/views/shared/components/overlay/scripts/toggleBookCardPopUp.js";
window.onload = function (){
    import("/public/views/shared/components/header/scripts/menu.js");
    import("/public/views/shared/components/nav/scripts/ActiveTabProvider.js");

    fetch("/temp_get.php")
        .then((response) => response.json())
        .then( (response) => {
            new Bookshelf(response).render()});

    let bookClassNames = {
        className: "book",
        title: ".bk-book__title",
        description: ".bk-book__desc",
        cover: ".coverImg",
    }
    new ToggleBookCardPopUp(document.getElementById("bk-list"),bookClassNames);

    /*let json;
    let response = await fetch("/temp_get.php");
    if (response.ok){
        json = await response.json();

    }
    console.log(json);*/
};

/*
function IsDivOverFlow(div)
{
    if (div.outerHeight() < div.prop('scrollHeight') || div.outerWidth() < div.prop('scrollWidth')) {
        return true;
    } else {
        return false;
    }
}*/

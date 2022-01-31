import Bookshelf from "/public/views/shared/components/bookshelf/scripts/bookshelf.js";
import ToggleBookCardPopUp from "/public/views/shared/components/overlay/scripts/toggleBookCardPopUp.js";
import EditorUtils from "/public/views/shared/scripts/editorUtils.js";

window.onload = async function (){
    import("/public/views/shared/components/header/scripts/menu.js");
    import("/public/views/shared/components/nav/scripts/ActiveTabProvider.js");

    /*fetch("/booksProvider.php")
        .then((response) => response.json())
        .then( (response) => {
            new Bookshelf(response).render()});*/
    let json;
    let response = await fetch("/booksProvider.php");
    if (response.ok){
        json = await response.json();
    }

    let bookshelf = new Bookshelf(json);
    await bookshelf.render();

    let bookClassNames = {
        className: "book",
        title: ".bk-book__title",
        description: ".bk-book__desc",
        cover: ".coverImg",
    }
    let popUp = new ToggleBookCardPopUp(document.getElementById("bk-list"), bookClassNames);

    popUp.overlay.querySelector(".read").addEventListener("click",function (){
        popUp.overlay.querySelector(".book-entity").style.display = "block";
        popUp.overlay.querySelector(".book-entity__content").innerHTML =
            popUp.clickedElement.querySelector(".bk-book__content").innerHTML;
    });
    popUp.overlay.querySelector(".edit").addEventListener("click",function (){
        popUp.overlay.querySelector(".book-entity").style.display = "block";
        popUp.overlay.querySelector(".book-entity__done").style.display = "block";
        popUp.overlay.querySelector(".book-entity__cover").style.top = "55%";
        popUp.overlay.querySelector(".book-entity__content").innerHTML =
            popUp.clickedElement.querySelector(".bk-book__content").innerHTML;
        EditorUtils.initDoc();
        popUp.overlay.querySelector(".book-entity__edit-panel").style.display = "flex";
        popUp.overlay.querySelector(".book-entity__content").setAttribute("contenteditable","true");
    });

    function closeBookEntity() {
        popUp.overlay.querySelector(".book-entity").style.display = "none";
        popUp.overlay.querySelector(".book-entity__done").style.display = "none";
        popUp.overlay.querySelector(".book-entity__edit-panel").style.display = "none";
        popUp.overlay.querySelector(".book-entity__cover").style.top = "50%";
        popUp.overlay.querySelector(".book-entity__content").setAttribute("contenteditable", "false");
    }

    popUp.overlay.querySelector(".book-entity__done").addEventListener("click", function (){
        popUp.clickedElement.querySelector(".bk-book__content").innerHTML =
            popUp.overlay.querySelector(".book-entity__content").innerHTML;


        const data = { bookContentHtml: popUp.clickedElement.querySelector('.bk-book__content').innerHTML.toString()};
        fetch("/booksCollector.php",{
            method: "POST",
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data),
        });

        closeBookEntity();
    });

    popUp.overlay.querySelector(".book-entity__close").addEventListener("click",function (){
        closeBookEntity();
    });


    /*let json;
    let response = await fetch("/booksProvider.php");
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

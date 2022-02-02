import BookCard from "/public/views/shared/components/diariesList/scripts/BookCard.js";
import ToggleBookCardPopUp from "../../shared/components/overlay/scripts/toggleBookCardPopUp.js";
window.onload = async function (){
    import("/public/views/shared/components/header/scripts/menu.js");
    import("/public/views/shared/components/diariesList/scripts/toggle-view.js");
    import("/public/views/shared/components/nav/scripts/ActiveTabProvider.js");

    function decodeHtml(html) {
        let txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }
    document.querySelector('.books__heading').innerHTML=`<h2>My Diaries</h2>`;
    let json;
    let response = await fetch("/getAllBooks");
    if (response.ok){
        json = await response.json();
    }
    json.forEach(elem => elem['content'] = decodeHtml(elem['content']));
    console.log(json);
    let books = document.getElementById('books');
    books.innerHTML = '';
    let bookCards = json.map(book => new BookCard(book).render());
    bookCards.forEach(card =>  books.innerHTML += card);
    new ToggleBookCardPopUp(document.getElementById("books"),json);
    /*fetch("/getAllBooks")
        .then(response => response.json())
        .then(data => {

        });*/

    /*let bookClassNames = {
        className: "books__item",
        title: ".item-caption",
        description: ".item-desc",
        cover: ".item-cover",
    }
    new ToggleBookCardPopUp(document.getElementById("books"),bookClassNames);*/
}
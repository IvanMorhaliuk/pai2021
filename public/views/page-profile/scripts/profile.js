import BookCard from "/public/views/shared/components/diariesList/scripts/BookCard.js";
import ToggleBookCardPopUp from "/public/views/shared/components/overlay/scripts/toggleBookCardPopUp.js";
import CookieUtils from "/public/views/shared/scripts/cookieUtils.js";
import HTMLUtils from "/public/views/shared/scripts/HTMLUtils.js";

window.onload = async function (){
    import("/public/views/shared/components/header/scripts/menu.js");
    import("/public/views/shared/components/diariesList/scripts/toggle-view.js");
    import("/public/views/shared/components/nav/scripts/ActiveTabProvider.js");

    document.querySelector('.books__heading').innerHTML=`<h2>My Diaries</h2>`;
    let json;
    let response = await fetch("/getalluserbooks");
    if (response.ok){
        json = await response.json();
    }
    json.forEach(elem => elem['content'] = HTMLUtils.decodeHtml(elem['content']));
    console.log(json);
    let books = document.getElementById('books');
    books.innerHTML = '';
    let bookCards = json.map(book => new BookCard(book).render());
    bookCards.forEach(card =>  books.innerHTML += card);
    new ToggleBookCardPopUp(document.getElementById("books"),json);
    document.querySelector('.nickname').innerHTML = CookieUtils.getCookie('nickname');
    document.querySelector('.user-name').innerHTML = CookieUtils.getCookie('name');
    document.querySelector('.user-surname').innerHTML = CookieUtils.getCookie('surname');
    document.querySelector('.user-birthday').innerHTML = CookieUtils.getCookie('birthday');
    document.querySelector('.person__name').innerHTML = CookieUtils.getCookie('nickname');
}
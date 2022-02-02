import BookCard from "/public/views/shared/components/diariesList/scripts/BookCard.js";
import ToggleBookCardPopUp from "../../shared/components/overlay/scripts/toggleBookCardPopUp.js";
window.onload = function (){
    import("/public/views/shared/components/header/scripts/menu.js");
    import("/public/views/shared/components/nav/scripts/ActiveTabProvider.js");
    import("/public/views/shared/components/diariesList/scripts/toggle-view.js");
    //import("/public/views/shared/components/diariesList/scripts/provideDiariesList.js");
    document.querySelector('.books__heading').innerHTML=`
        <div class="search-methods">
            <div class="search-methods__label">Sorted by</div>
            <button class="search-methods__author">Author</button>
            <button class="search-methods__diary">Dairy</button>
        </div>`;
    fetch("/getAllBooks")
        .then(response => response.json())
        .then(loadBooks);

    document.querySelector('.search-bar-wrapper .search-bar').addEventListener('input',function(e){
        e.preventDefault();
        const data = {search:this.value};
        fetch('/searchbook',{
            method: "POST",
            headers:{'Content-Type': 'application/json'},
            body: JSON.stringify(data)
        }).then(function (response){return response.json()})
            .then(loadBooks);

    });
    function decodeHtml(html) {
        let txt = document.createElement("textarea");
        txt.innerHTML = html;
        return txt.value;
    }
    function loadBooks(data){
        data.forEach(elem => elem['content'] = decodeHtml(elem['content']));
        let books = document.getElementById('books');
        books.innerHTML = '';
        let bookCards = data.map(book => new BookCard(book).render());
        bookCards.forEach(card =>  books.innerHTML += card);
        new ToggleBookCardPopUp(document.getElementById("books"),data);
    }

};
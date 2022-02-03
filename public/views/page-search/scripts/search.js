import BookCard from "/public/views/shared/components/diariesList/scripts/BookCard.js";
import ToggleBookCardPopUp from "/public/views/shared/components/overlay/scripts/toggleBookCardPopUp.js";
import CookieUtils from "/public/views/shared/scripts/cookieUtils.js";
import HTMLUtils from "/public/views/shared/scripts/HTMLUtils.js";
window.onload = function (){
    import("/public/views/shared/components/header/scripts/menu.js");
    import("/public/views/shared/components/nav/scripts/ActiveTabProvider.js");
    document.querySelector("#list-view-img").style.display = "none";
    document.querySelector("#grid-view-img").style.display = "none";
    document.querySelector('.person__name').innerHTML = CookieUtils.getCookie('nickname');
    document.querySelector('.books__heading').innerHTML=`
        <div class="search-methods">
            <div class="search-methods__label">Sorted by</div>
            <button class="search-methods__author">Author</button>
            <button class="search-methods__diary">Dairy</button>
        </div>`;
    fetch("/getallbooks")
        .then(response => response.json())
        .then(data => {
            loadBooks(data);
            setListView();
        });

    document.querySelector('.search-bar-wrapper .search-bar').addEventListener('input',function(e){
        e.preventDefault();
        const data = {search:this.value};
        fetch('/searchbook',{
            method: "POST",
            headers:{'Content-Type': 'application/json'},
            body: JSON.stringify(data)
        }).then(function (response){return response.json()})
            .then(data => {loadBooks(data);setListView()});

    });


    function loadBooks(data){
        data.forEach(elem => elem['content'] = HTMLUtils.decodeHtml(elem['content']));
        let books = document.getElementById('books');
        books.innerHTML = '';
        let bookCards = data.map(book => new BookCard(book).render());
        bookCards.forEach(card =>  books.innerHTML += card);
        new ToggleBookCardPopUp(document.getElementById("books"),data);
        document.querySelector('.edit').style.display = 'none';
        document.querySelector('.delete').style.display = 'none';
    }
    function setListView(){
        document.getElementById("books").style.gridTemplateColumns = "repeat(1,100%)";
        document.querySelectorAll("div.books__item")
            .forEach(item=>item.style.gridTemplateColumns = "20% 80%");
        document.querySelectorAll("#books p.item-date,#books p.item-desc")
            .forEach(item=>item.style.display="block");
        document.querySelectorAll("#books .item-caption")
            .forEach(item=>item.style.cssText = "text-align:left;font-weight:bold");
    }
};
export default class ToggleBookCardPopUp {
    #books
    #overlay

    constructor(books, bookClassNames) {
        this.#books = books;
        this.#overlay = document.getElementById("overlay");
        this.#books.addEventListener("click",function (e){
            let target = this._findTarget(e.target,bookClassNames.className);
            let bookTitle = target.querySelector(bookClassNames.title).innerText;
            let bookDesc = target.querySelector(bookClassNames.description).innerText;
            let bookCover = target.querySelector(bookClassNames.cover).src;

            this.#overlay.style.display = "grid";
            this.#overlay.querySelector(".pop-up__book-cover img").src = bookCover;
            this.#overlay.querySelector(".pop-up__book-title p").innerText = bookTitle;
            this.#overlay.querySelector(".pop-up__desc p").innerText = bookDesc;

        }.bind(this));
        this.#overlay.querySelector(".close").addEventListener("click",function (){
            this.#overlay.style.display = "none";
        }.bind(this));
    }

    _findTarget(elem,className){
        if(elem.className !== className) return this._findTarget(elem.parentElement,className);
        return elem;
    }
}


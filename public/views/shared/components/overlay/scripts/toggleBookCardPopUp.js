export default class ToggleBookCardPopUp {
    #books;
    #overlay;
    #clickedElement;
    get books() {
        return this.#books;
    }
    get clickedElement() {
        return this.#clickedElement;
    }



    get overlay() {
        return this.#overlay;
    }

    constructor(books, bookClassNames) {
        this.#books = books;
        this.#overlay = document.getElementById("overlay");

        this.#books.addEventListener("click",function (e){
            let target = this._findTarget(e.target,bookClassNames.className);
            let bookTitle = target.querySelector(bookClassNames.title).innerText;
            let bookDesc = target.querySelector(bookClassNames.description).innerText;
            let bookCover = target.querySelector(bookClassNames.cover).src;
            this.#clickedElement = target;
            this.#overlay.style.display = "grid";
            this.#overlay.querySelector(".pop-up__book-cover img").src = bookCover;
            this.#overlay.querySelector(".pop-up__book-title p").innerText = bookTitle;
            this.#overlay.querySelector(".pop-up__desc p").innerText = bookDesc;


        }.bind(this));
        this.#overlay.querySelector(".pop-up__book-close").addEventListener("click",function (){
            this.#overlay.style.display = "none";
        }.bind(this));
        /*this.#overlay.querySelector(".read").addEventListener("click",function (){
            // this.#overlay.querySelector(".pop-up").style.display = "none";
            this.#overlay.querySelector(".book-entity").style.display = "block";

            let content = this.#overlay.querySelector(".book-entity__content");

        }.bind(this));
        this.#overlay.querySelector(".book-entity__close").addEventListener("click",function (){
            this.#overlay.querySelector(".book-entity").style.display = "none";
        }.bind(this));*/
    }

    _findTarget(elem,className){
        if(elem.className !== className) return this._findTarget(elem.parentElement,className);
        return elem;
    }
    /*loadBook(book){
        document.querySelector(".book-entity__content").innerHTML = book.content;
    }*/
}


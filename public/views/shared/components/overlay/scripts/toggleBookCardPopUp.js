import EditorUtils from "../../../scripts/editorUtils.js";

export default class ToggleBookCardPopUp {
    #books;
    #overlay;
    #clickedElementId;
    #container;

    constructor( container ,json) {
        this.#container = container;
        this.#overlay = document.getElementById("overlay");
        this.#container.addEventListener('click',function (e){
            let target = this._findTarget(e.target,this.#container);
            if(target){
                let id = target.id.substring("bookId-".length)
                this.#clickedElementId = id;
                let book = json.filter(elem=>elem['id'].toString() === id.toString())[0];
                this.#overlay.style.display = "grid";
                this.#overlay.querySelector(".pop-up__book-cover img").src = book['coverSrc'];
                this.#overlay.querySelector(".pop-up__book-title p").innerText = book['title'];
                this.#overlay.querySelector(".pop-up__desc p").innerText = book['description'];
                this.#overlay.querySelector(".read").addEventListener("click",function (){
                    this.#overlay.querySelector(".book-entity").style.display = "block";
                    let book = json.filter(elem=>elem['id'].toString() === this.clickedElementId)[0];
                    this.#overlay.querySelector(".book-entity__content").innerHTML = book['content'];
                }.bind(this));
                this.#overlay.querySelector(".edit").addEventListener("click",function (){
                    this.#overlay.querySelector(".book-entity").style.display = "block";
                    let book = json.filter(elem=>elem['id'].toString() === this.clickedElementId)[0];
                    this.#overlay.querySelector(".book-entity__content").innerHTML = book['content'];
                    this.#overlay.querySelector(".book-entity__done").style.display = "block";
                    this.#overlay.querySelector(".book-entity__cover").style.top = "55%";
                    EditorUtils.initDoc();
                    this.#overlay.querySelector(".book-entity__edit-panel").style.display = "flex";
                    this.#overlay.querySelector(".book-entity__content").setAttribute("contenteditable","true");
                }.bind(this));

                this.#overlay.querySelector(".book-entity__close").addEventListener("click",function (){
                    console.log("clic");
                    closeBookEntity(this.#overlay);
                }.bind(this));
                this.overlay.querySelector(".book-entity__done").addEventListener("click", function (){
                    let content = this.#overlay.querySelector(".book-entity__content").innerHTML;
                    const data = {
                        id: this.#clickedElementId,
                        content: content,
                    };

                    fetch("/updatecontent",{
                        method: "POST",
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(data),
                    });
                    location.reload();
                    closeBookEntity(this.#overlay);
                }.bind(this));
                function closeBookEntity(elem) {
                    elem.querySelector(".book-entity").style.display = "none";
                    elem.querySelector(".book-entity__done").style.display = "none";
                    elem.querySelector(".book-entity__edit-panel").style.display = "none";
                    elem.querySelector(".book-entity__cover").style.top = "50%";
                    elem.querySelector(".book-entity__content").setAttribute("contenteditable", "false");
                }
            }
        }.bind(this));
        this.#overlay.querySelector(".pop-up__book-close").addEventListener("click",function (){
            this.#overlay.style.display = "none";
        }.bind(this));
    }

    get books() {
        return this.#books;
    }

    get clickedElementId() {
        return this.#clickedElementId;
    }

    get overlay() {
        return this.#overlay;
    }

    _findTarget(elem,container){
        if (elem === container) return false;
        if(elem.id.indexOf('bookId') === -1) return this._findTarget(elem.parentElement);
        return elem;
    }
    /*constructor(books, bookClassNames) {
        this.#books = books;
        this.#overlay = document.getElementById("overlay");

        this.#books.addEventListener("click",function (e){
            let target = this._findTarget(e.target,bookClassNames.className);
            let bookTitle = target.querySelector(bookClassNames.title).innerText;
            let bookDesc = target.querySelector(bookClassNames.description).innerText;
            let bookCover = target.querySelector(bookClassNames.cover).src;
            this.#clickedElementId = target;
            this.#overlay.style.display = "grid";
            this.#overlay.querySelector(".pop-up__book-cover img").src = bookCover;
            this.#overlay.querySelector(".pop-up__book-title p").innerText = bookTitle;
            this.#overlay.querySelector(".pop-up__desc p").innerText = bookDesc;


        }.bind(this));
        this.#overlay.querySelector(".pop-up__book-close").addEventListener("click",function (){
            this.#overlay.style.display = "none";
        }.bind(this));
    }*/

    /*_findTarget(elem,className){

        if(elem.className !== className) return this._findTarget(elem.parentElement,className);
        return elem;
    }*/
}


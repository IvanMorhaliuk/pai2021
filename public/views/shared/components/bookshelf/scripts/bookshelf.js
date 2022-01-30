export default class Bookshelf {
    #books;
    #html;


    constructor(books) {
        this.#books = books;
        this._setZIndexes(this.#books);
        this.generateHTML();
    }

    createBookRepresentation(book) {
        return `
        <li class="book" style="z-index: ${book.zIndex}">
            <div class="bk-book book-1">
                <div class="bk-front">
                    <div class="bk-cover-back"></div>
                    <div class="bk-cover"><img class="coverImg" src=${book.coverSrc} alt=""></div>
                </div>
                <div class="bk-back">

                </div>
                <div class="bk-left">
                    <h2>
                        <span class="bk-book__title">${book.title}</span>
                        <span class="bk-book__date">${book.date}</span>
                        <span class="bk-book__desc">${book.description}</span>
                    </h2>
                </div>
                <div class="bk-top"></div>

            </div>
        </li>`;
    }

    generateHTML(){
        this.#html = this.#books.map(item=>this.createBookRepresentation(item))
    }



    get html() {
        return this.#html;
    }

    get books() {
        return this.#books;
    }
    _setZIndexes(collection){
        let length = collection.length;
        let zIndex = 0;
        for (let i = 0;i<length;i++){
            if(i>Math.floor(length/2)) zIndex--;
            else zIndex++;
            collection[i].zIndex = zIndex.toString();
        }
    }
    render(){
        document.querySelector('.bk-list').innerHTML = this.#html;
    }
}


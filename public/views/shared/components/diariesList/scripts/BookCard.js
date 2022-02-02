export default class BookCard{
    #book;
    constructor(book) {
        this.#book = book;
    }

    render(){
        return this.#createHTML();
    }

    #createHTML(){
        return `
        <div class="books__item" id="bookId-${this.#book['id']}">
            <img class="item-cover" src="${this.#book['coverSrc']}" alt="book cover">
                <div class="item-info">
                    <p class="item-caption">${this.#book['title']}</p>
                    <p class="item-desc">${this.#book['description']}</p>
                    <p class="item-date">${this.#book['date']}</p>
                </div>
        </div>`
    }
}
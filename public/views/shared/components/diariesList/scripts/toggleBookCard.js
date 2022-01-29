(function () {
    let books = document.getElementById("books");
    let overlay = document.getElementById("overlay");

    function findTarget(elem){
        if(elem.className !== "books__item") return findTarget(elem.parentElement);
        return elem;
    }

    books.addEventListener("click",function (e){
        //console.log(e.target.parentElement.className);
        let target = findTarget(e.target);
        let bookTitle = target.querySelector(".item-caption").innerText;
        let bookDesc = target.querySelector(".item-desc").innerText;

        let bookCover = target.querySelector("img").src;

        overlay.style.display = "grid";
        overlay.querySelector(".pop-up__book-cover img").src = bookCover;
        overlay.querySelector(".pop-up__book-title p").innerText = bookTitle;
        overlay.querySelector(".pop-up__desc p").innerText = bookDesc;

    });
    overlay.querySelector(".close").addEventListener("click",function (){
        overlay.style.display = "none";
    });
})();
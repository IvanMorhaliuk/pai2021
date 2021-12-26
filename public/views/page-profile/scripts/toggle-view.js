(function(){
    let btnListView = document.getElementById("list-view");
    let btnGridView = document.getElementById("grid-view");
    let books = document.getElementById("books");
    btnListView.addEventListener("click",function (){
        document.getElementById("list-view-img").setAttribute("src","/public/img/icons/icon-list-view.svg");
        document.getElementById("grid-view-img").setAttribute("src","/public/img/icons/icon-grid-view_inactive.svg");
        books.style.gridAutoFlow = "row";
        for(let item of document.getElementsByClassName("books__item")){
            item.style.backgroundColor = "#D2D2D2";
            item.style.gridAutoFlow = "column";
            item.children[1].children[0].style.textAlign = "left";
            item.children[1].children[0].style.fontWeight = "bold";
            item.children[1].children[1].style.display = "block";
            item.children[1].children[2].style.display = "block";
        }

    });
    btnGridView.addEventListener("click",function (){
        document.getElementById("list-view-img").setAttribute("src","/public/img/icons/icon-list-view_inactive.svg");
        document.getElementById("grid-view-img").setAttribute("src","/public/img/icons/icon-grid-view.svg");
        books.style.gridAutoFlow = "column";
        for(let item of document.getElementsByClassName("books__item")){
            item.style.backgroundColor = "#ffffff";
            item.style.gridAutoFlow = "row";
            item.children[1].children[0].style.textAlign = "center";
            item.children[1].children[0].style.fontWeight = "normal";
            item.children[1].children[1].style.display = "none";
            item.children[1].children[2].style.display = "none";
        }
    });
})();
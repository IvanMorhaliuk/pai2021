(function(){
    let btnListView = document.getElementById("list-view");
    let btnGridView = document.getElementById("grid-view");
    let books = document.getElementById("books");
    btnListView.addEventListener("click",function (){
        document.getElementById("list-view-img").setAttribute("src","/public/img/icons/icon-list-view.svg");
        document.getElementById("grid-view-img").setAttribute("src","/public/img/icons/icon-grid-view_inactive.svg");
        books.style.gridTemplateColumns = "repeat(1,100%)";
        document.querySelectorAll(".books__item")
            .forEach(item=>item.style.gridTemplateColumns = "20% 80%");
        document.querySelectorAll(".item-date,.item-desc")
            .forEach(item=>item.style.display="block");
        document.querySelectorAll(".item-caption")
            .forEach(item=>item.style.cssText = "text-align:left;font-weight:bold");

    });
    btnGridView.addEventListener("click",function (){
        document.getElementById("list-view-img").setAttribute("src","/public/img/icons/icon-list-view_inactive.svg");
        document.getElementById("grid-view-img").setAttribute("src","/public/img/icons/icon-grid-view.svg");
        books.style.gridTemplateColumns = "repeat(4,25%)";
        document.querySelectorAll(".books__item")
            .forEach(item=>item.style.gridTemplateColumns = "100%");
        document.querySelectorAll(".item-date,.item-desc")
            .forEach(item=>item.style.display="none");
        document.querySelectorAll(".item-caption")
            .forEach(item=>item.style.cssText = "text-align:center;font-weight:normal");

    });
})();
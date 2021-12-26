(function(){
    document.getElementById("menu_show").addEventListener("click",function (){
        let dropdown = document.getElementById("dropdown");
        dropdown.style.display = dropdown.style.display === "none" || !dropdown.style.display ? "grid" : "none";
    });
    document.getElementById("dropdown_close").addEventListener("click",function (){
        document.getElementById("dropdown").style.display = "none";
        console.log("closed menu");
    });

})();
import Bookshelf from "/public/views/shared/components/bookshelf/scripts/bookshelf.js";
import ToggleBookCardPopUp from "/public/views/shared/components/overlay/scripts/toggleBookCardPopUp.js";

var oDoc, sDefTxt;

function initDoc() {
    oDoc = document.getElementById("textBox");
    sDefTxt = oDoc.innerHTML;
    //if (document.compForm.switchMode.checked) { setDocMode(true); }
    document.getElementById("format-block").addEventListener("change",function (){
        formatDoc('formatblock',this[this.selectedIndex].value);this.selectedIndex=0;
    });
    document.getElementById("font-name").addEventListener("change",function (){
        formatDoc('fontname',this[this.selectedIndex].value);this.selectedIndex=0;
    });
    document.getElementById("font-size").addEventListener("change",function (){
        formatDoc('fontsize',this[this.selectedIndex].value);this.selectedIndex=0;
    });
    document.getElementById("forecolor").addEventListener("change",function (){
        formatDoc('forecolor',this[this.selectedIndex].value);this.selectedIndex=0;
    });
    document.getElementById("backcolor").addEventListener("change",function (){
        formatDoc('backcolor',this[this.selectedIndex].value);this.selectedIndex=0;
    });

}

function formatDoc(sCmd, sValue) {
    document.execCommand(sCmd, false, sValue);
    oDoc.focus();
}

function validateMode() {
    if (!document.compForm.switchMode.checked) { return true ; }
    alert("Uncheck \"Show HTML\".");
    oDoc.focus();
    return false;
}

function setDocMode(bToSource) {
    var oContent;
    if (bToSource) {
        oContent = document.createTextNode(oDoc.innerHTML);
        oDoc.innerHTML = "";
        var oPre = document.createElement("pre");
        oDoc.contentEditable = false;
        oPre.id = "sourceText";
        oPre.contentEditable = true;
        oPre.appendChild(oContent);
        oDoc.appendChild(oPre);
        document.execCommand("defaultParagraphSeparator", false, "div");
    } else {
        if (document.all) {
            oDoc.innerHTML = oDoc.innerText;
        } else {
            oContent = document.createRange();
            oContent.selectNodeContents(oDoc.firstChild);
            oDoc.innerHTML = oContent.toString();
        }
        oDoc.contentEditable = true;
    }
    oDoc.focus();
}

function printDoc() {
    if (!validateMode()) { return; }
    var oPrntWin = window.open("","_blank","width=450,height=470,left=400,top=100,menubar=yes,toolbar=no,location=no,scrollbars=yes");
    oPrntWin.document.open();
    oPrntWin.document.write("<!doctype html><html><head><title>Print<\/title><\/head><body onload=\"print();\">" + oDoc.innerHTML + "<\/body><\/html>");
    oPrntWin.document.close();
}

window.onload = async function (){
    import("/public/views/shared/components/header/scripts/menu.js");
    import("/public/views/shared/components/nav/scripts/ActiveTabProvider.js");

    /*fetch("/temp_get.php")
        .then((response) => response.json())
        .then( (response) => {
            new Bookshelf(response).render()});*/
    let json;
    let response = await fetch("/temp_get.php");
    if (response.ok){
        json = await response.json();
    }

    let bookshelf = new Bookshelf(json);
    await bookshelf.render();

    let bookClassNames = {
        className: "book",
        title: ".bk-book__title",
        description: ".bk-book__desc",
        cover: ".coverImg",
    }
    let popUp = new ToggleBookCardPopUp(document.getElementById("bk-list"), bookClassNames);

    popUp.overlay.querySelector(".read").addEventListener("click",function (){
        popUp.overlay.querySelector(".book-entity").style.display = "block";
        popUp.overlay.querySelector(".book-entity__content").innerHTML =
            popUp.clickedElement.querySelector(".bk-book__content").innerHTML;
    });
    popUp.overlay.querySelector(".edit").addEventListener("click",function (){
        popUp.overlay.querySelector(".book-entity").style.display = "block";
        popUp.overlay.querySelector(".book-entity__content").innerHTML =
            popUp.clickedElement.querySelector(".bk-book__content").innerHTML;
        initDoc();
        popUp.overlay.querySelector(".book-entity__edit-panel").style.display = "flex";
        popUp.overlay.querySelector(".book-entity__content").setAttribute("contenteditable",true);
    });
    popUp.overlay.querySelector(".book-entity__close").addEventListener("click",function (){
        popUp.overlay.querySelector(".book-entity").style.display = "none";
        popUp.overlay.querySelector(".book-entity__edit-panel").style.display = "none";
        popUp.overlay.querySelector(".book-entity__content").setAttribute("contenteditable",false);
    });


    /*let json;
    let response = await fetch("/temp_get.php");
    if (response.ok){
        json = await response.json();

    }
    console.log(json);*/
};

/*
function IsDivOverFlow(div)
{
    if (div.outerHeight() < div.prop('scrollHeight') || div.outerWidth() < div.prop('scrollWidth')) {
        return true;
    } else {
        return false;
    }
}*/

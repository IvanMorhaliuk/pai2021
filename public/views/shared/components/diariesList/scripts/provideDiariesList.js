import ToggleBookCardPopUp from "/public/views/shared/components/overlay/scripts/toggleBookCardPopUp.js";

(function () {
    let bookClassNames = {
        className: "books__item",
        title: ".item-caption",
        description: ".item-desc",
        cover: ".item-cover",
    }
    new ToggleBookCardPopUp(document.getElementById("books"),bookClassNames);
})();
(function () {
    const url = window.location.href;
    const params = url.split('/');
    const tab = params[3];
    document.querySelectorAll(".nav__elem").forEach(
        elem => elem.classList.remove("nav__elem_active"));
    const elem = tab === 'login' ? document.querySelector(`.nav__elem[href='/profile']`)
        : document.querySelector(`.nav__elem[href='/${CSS.escape(tab)}']`);
    elem.classList.add("nav__elem_active");
}());
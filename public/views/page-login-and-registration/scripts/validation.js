window.onload = function (){
    fetch("/registeruser")
        .then(response => response.text())
        .then(response => {
            if (response === "1"){
                alert('Such user already exists');
            }
        });
}
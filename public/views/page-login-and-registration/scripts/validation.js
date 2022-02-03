window.onload = function (){
    function validatePassword(pw) {

        return /[A-Z]/       .test(pw) &&
            /[a-z]/       .test(pw) &&
            /[0-9]/       .test(pw) &&
            /[^A-Za-z0-9]/.test(pw) &&
            pw.length > 4;
    }
    let input = document.getElementById('password');
    input.addEventListener('input',function (){
        let providedPassword = this.value;
        let messageBox = document.querySelector('.messages_tmp');
        if(!validatePassword(providedPassword)){
            messageBox.innerHTML =
                `Password must contain at least
                <ul> 
                    <li>one uppercase letter</li>
                    <li>one lowercase letter</li>
                    <li>one digit</li>
                    <li>one special symbol</li>
                </ul>`
        }else {
            messageBox.innerHTML = "";
        }
        document.querySelector('button[type="submit"]')
            .addEventListener('click',function (e){
                if( !(messageBox.innerHTML === ""
                    || messageBox.innerHTML === "Such user already exists") ){
                    e.preventDefault();
                }
            });

    });

    /*let providedPassword = document.getElementById('password').value;
    console.log(providedPassword)*/
}
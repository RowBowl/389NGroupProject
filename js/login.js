
//Client-side validation
window.onsubmit = main;

var attempts = 0;
function main(){


    if( !(checkLogin()) ){
        return false;
    }


}

function checkLogin(){

    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let text = document.getElementById("bottomtext");

    let regexuser = /^[A-Za-z]+$/;
    let regexpass = /^[A-Za-z0-9]+$/
    if(username.length < 6 || username.length > 20 || password.length < 6 || password.length > 20
        || !(regexuser.test(username)) || !(regexpass.test(password))){
        alert("Invalid login information.");
        if(attempts >= 2){
            bottomtext.innerHTML = "<p>Username should only contain letters, password should only contain letters/numbers.</p>"

        }
        attempts++;
        return false;
    }

    return true;
}
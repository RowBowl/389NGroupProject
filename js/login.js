
//Client-side validation
window.onsubmit = main;

var attempts = 0;
function main(){

    if( !(checkLogin()) ){
        return false;
    }


}

function checkLogin(){

    let username = trim(document.getElementById("username").value);
    let password = trim(document.getElementById("password").value);
    let text = trim(document.getElementById("bottomtext"));

    let regexuser = /^[A-Za-z]+$/;
    let regexpass = /^[A-Za-z0-9]+$/
    console.log(username + " " + password);
    if(username.length < 1 || username.length > 20 || password.length < 1 || password.length > 20
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


function changevalues(value) {
    let url = "";
    if (value == "login") {
        url = "/apnaSathi/login.php";
    } else if (value == "logout") {
        url = "/apnaSathi/logout.php";
        
    } else if (value == "signUp") {
        url = "/apnaSathi/signUp.php";
        
    } else {
        alert("Error: Please try again after some time!");
        return;
    }
    location.assign(url);
}

/*
Date: 24/08/2024
This file is for handling the custom validation for the fields which are present in the signUp.php.
Check the code for more info.
*/

function validate() {
    var name = document.getElementById("name").value;
    var nameRegex = /^[a-zA-Z\s]{3,}$/;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var user_id_1 = document.getElementById("user-beneficiary").checked;
    var user_id_2 = document.getElementById("user-donor").checked;
    console.log("Name:" + name);
if(!nameRegex.test(name)) {
    alert("Invalid name format. Please use letters only, and it should contain a minimum of 3 letters.");
    return false;
}
    if (!emailRegex.test(email)) {
        alert("Error: Invalid email format.");
        return false;
    } 
    if (password !== confirmPassword) {
        alert("Error: Passwords do not match. Please try again!");
        return false;
    }
    if (!user_id_1 && !user_id_2) {
        alert("Error: Please select a user type.");
        return false;
    }
    return true;
}

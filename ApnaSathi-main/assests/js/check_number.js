function number () {
    let num = document.getElementById("phonenumber").value;
    //Adding the regx for the check and validate the phone number
    let regexNo = /^\d{10}$/;
if(!regexNo.test(num)) {
    alert("The number should contains 10 Digits.");
    return false;
}else{
    return true;
}
}
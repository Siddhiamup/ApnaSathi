function validate() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var admin_phone_number=document.getElementById("admin_phone_number").value;

    if (!emailRegex.test(email)) {
        alert("Error: Invalid email format.");
        return false;
    }
    if (password !== confirm_password) {
        alert("Error: Passwords do not match. Please try again!");
        return false;
    }
    
    if (isNaN(admin_phone_number) || admin_phone_number.length != 10) {
        alert("Please enter a valid 10-digit mobile number.");
      return false; // Prevent form submission
      }
}

function changevalues(action) {
    if (action === 'login') {
        // Implement the function logic here if necessary
        alert("Redirecting to login page...");
        // Add redirection logic if needed
    }
}

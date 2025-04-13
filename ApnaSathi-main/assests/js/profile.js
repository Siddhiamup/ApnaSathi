function handleSubmit(event) {
  event.preventDefault();

  const name = document.getElementById("name").value;
  const mobile = document.getElementById("mobile").value;
  const birthdate = document.getElementById("birthday").value;

  // Perform validation here
  if (!name || !mobile || !birthday) {
    alert("Please fill in all required fields.");
    return false;
  }

  // Validate mobile number format
  if (!mobile.match(/^[1-9]\d{9}$/)) {
    alert(
      "Invalid mobile number format. Please enter a 10-digit mobile number."
    );
    return false;
  }

  if (birthdate === "") {
    errorMessages.push(
      "The 'Birthdate' field is required. Please select your birthdate."
    );
    valid = false;
  } else {
    const ageValid = calculateAge(); // Call the age calculation function and check if valid
    if (!ageValid) {
      errorMessages.push(
        "The 'Age' must be a valid two-digit number (at least 10)."
      );
      valid = false;
    }
  }
  // If validation passes, submit the form
  form.addEventListener("submit", (event) => {
    if (!handleSubmit()) {
      event.preventDefault();
    }
  });
}
/* age calculation js */
function calculateAge() {
  const dobInput = document.getElementById("birthday").value;
  if (dobInput) {
    const dob = new Date(dobInput);
    const today = new Date();

    let age = today.getFullYear() - dob.getFullYear();
    const monthDiff = today.getMonth() - dob.getMonth();

    // Adjust age if the birthday hasn't occurred yet this year
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
      age--;
    }

    document.getElementById("age").value = age; // Set the calculated age

    // Check if age is a valid two-digit number
    if (age < 10 || age > 99) {
      return false;
    }
    return true;
  } else {
    document.getElementById("age").value = ""; // Clear age if no DOB is entered
    return false;
  }
}

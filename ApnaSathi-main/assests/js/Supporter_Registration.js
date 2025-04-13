document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("myF");
    const next = document.getElementById("next");
    const next2 = document.getElementById("next2");
    const back = document.getElementById("back");
    const back2 = document.getElementById("back2");
    const p1 = document.getElementById("p1");
    const p2 = document.getElementById("p2");
    const p3 = document.getElementById("p3");
  

    const validatePage1 = () => {
        const name = form.uname.value.trim();
        const mobile = form.umobile.value.trim();
        const birthdate = form.bdate.value.trim();
        const photo = form.photo.value.trim();
        const idProof = form.idProof.value.trim();


        let valid = true;
        let errorMessages = [];

        if (name === "") {
            errorMessages.push("The 'Name' field is required. Please enter your name.");
            valid = false;
        }
        if (mobile === "") {
            errorMessages.push("The 'Mobile Number' field is required. Please enter your 10-digit mobile number.");
            valid = false;
        } else if (mobile.length !== 10) {
            errorMessages.push("The 'Mobile Number' must be exactly 10 digits long. Please enter a valid number.");
            valid = false;
        }
        if (birthdate === "") {
            errorMessages.push("The 'Birthdate' field is required. Please select your birthdate.");
            valid = false;
        } else {
            const ageValid = calculateAge(); // Call the age calculation function and check if valid
            if (!ageValid) {
                errorMessages.push("The 'Age' must be a valid two-digit number (at least 10).");
                valid = false;
            }
        }
        if (photo === "") {
            errorMessages.push("The 'Photo' field is required. Please upload your photo.");
            valid = false;
        }
        if (idProof === 0) {
            errorMessages.push(" PAN Card");
            valid = false;
          }

        if (!valid) {
            alert(`Please correct the following issues:\n\n- ${errorMessages.join("\n- ")}`);
        }

        return valid;
    };

    const validatePage2 = () => {
        const foundationRadio = document.getElementById('Foundation');
        const foundationName = document.getElementById('foundationNameInput').value.trim();

        
        let valid = true;
        let errorMessages = [];
        
          if (foundationRadio.checked && foundationName === "") {
                errorMessages.push("The 'Foundation Name' is required since you have selected 'Foundation'. Please provide the foundation's name.");
                valid = false;
            }
    
          
          const helpAmount = form.help.value;
          if (!helpAmount) {
            errorMessages.push("Amount needed");
            valid = false;
          }

    
        if (!valid) {
            alert(`Please correct the following issues:\n\n- ${errorMessages.join("\n- ")}`);
        }
    
        return valid;
    };
    
    // "Next" button on Page 1
  next.addEventListener("click", (event) => {
    event.preventDefault();
    if (validatePage1()) {
      p1.style.display = 'none';
      p2.style.display = 'block';
    }
  });

  next2.addEventListener("click", (event) => {
        event.preventDefault();
        if (validatePage2()) {
            p2.style.display = 'none';
            p3.style.display = 'block';
        }
  });

    back.addEventListener("click", (event) => {
        event.preventDefault();
        p1.style.display = 'block';
        p2.style.display = 'none';
    });

    back2.addEventListener("click", (event) => {
        event.preventDefault();
        p2.style.display = 'block';
        p3.style.display = 'none';
    });

    form.addEventListener("submit", (event) => {
      if (!validatePage1() || !validatePage2()) {
          event.preventDefault();
      }
  });

     // Show/Hide Foundation Name Input
     const foundationRadio = document.getElementById('Foundation');
     const individualRadio = document.getElementById('Individual');
     const foundationNameInput = document.getElementById('foundationName');
 
     foundationRadio.addEventListener('change', function () {
         foundationNameInput.style.display = 'block';
     });
 
     individualRadio.addEventListener('change', function () {
         foundationNameInput.style.display = 'none';
     });

});
    

   

/* age calculation js */
function calculateAge() {
    const dobInput = document.getElementById('bdate').value;
    if (dobInput) {
        const dob = new Date(dobInput);
        const today = new Date();
        
        let age = today.getFullYear() - dob.getFullYear();
        const monthDiff = today.getMonth() - dob.getMonth();
        
        // Adjust age if the birthday hasn't occurred yet this year
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        
        document.getElementById('age').value = age; // Set the calculated age

        // Check if age is a valid two-digit number
        if (age < 10 || age > 99) {
            return false;
        }
        return true;
    } else {
        document.getElementById('age').value = ''; // Clear age if no DOB is entered
        return false;
    }
}

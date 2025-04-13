
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
    const photo = form.photo.value;
    let valid = true;
    missingFields=[];


    if (name === "") {
     missingFields.push("name");
            valid = false;
    }
    if (mobile === "" || mobile.length !== 10) {
      missingFields.push(" Mobile no");
      valid = false;
  }
    if (birthdate === "") {
      missingFields.push(" birth date");
      valid = false;
    }
    if (photo === "") {
      missingFields.push(" Photo");
      valid = false;
    }
    if (!valid) {
      alert(`Please fill out the following fields: ${missingFields.join(", ")}`);
  }
    return valid;
  };

  const validatePage2 = () => {
    const signature = form.Signature.value;
    const aadhar = form.Aadhar.value;
    const incomeCerti = form.incomeCerti.value;
    const help = form.help.value;
    let valid = true;
    missingFields=[];

    if (signature === "") {
      missingFields.push(" Signature");
      valid = false;
    }

    if (aadhar === "") {
      missingFields.push(" Aadhar");
      valid = false;
    }
    if (incomeCerti === "") {
      missingFields.push(" Income Certificate");
      valid = false;
    }
    if (!help) {
      missingFields.push("Amount needed");
      valid = false;
  }
    if (!valid) {
      alert(`Please fill out the following fields: ${missingFields.join(", ")}`);
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

// "Next" button on Page 2
next2.addEventListener("click", (event) => {
    event.preventDefault();
    if (validatePage2()) {
        p2.style.display = 'none';
        p3.style.display = 'block';
    }
});

// "Back" button on Page 2
back.addEventListener("click", (event) => {
    event.preventDefault();
    p1.style.display = 'block';
    p2.style.display = 'none';
});

// "Back" button on Page 3
back2.addEventListener("click", (event) => {
    event.preventDefault();
    p2.style.display = 'block';
    p3.style.display = 'none';
});

// Form submission validation
form.addEventListener("submit", (event) => {
    if (!validatePage1() || !validatePage2()) {
        event.preventDefault();  // Prevent form submission if validation fails
    }
});
});

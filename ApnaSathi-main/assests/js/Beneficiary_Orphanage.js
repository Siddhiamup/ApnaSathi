document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("orphanAge");
  const next = document.getElementById("next");
  const next2 = document.getElementById("next2");
  const back = document.getElementById("back");
  const back2 = document.getElementById("back2");
  const p1 = document.getElementById("p1");
  const p2 = document.getElementById("p2");
  const p3 = document.getElementById("p3");

  // Validate Page 1
  const validatePage1 = () => {
      const orphanageName = form.oname.value.trim();
      const mobile = form.omobile.value.trim();
      const address = form.oaddress.value.trim();
      const addressProof = form.AddressProof.value.trim();
      let valid = true;
      let missingFields = [];

      if (orphanageName === "") {
          missingFields.push("Orphanage name");
          valid = false;
      }
      if (mobile === "" || mobile.length !== 10) {
          missingFields.push("Valid 10-digit mobile number");
          valid = false;
      }
      if (address === "") {
          missingFields.push("Address");
          valid = false;
      }
      if (addressProof === "") {
          missingFields.push("Address proof");
          valid = false;
      }

      if (!valid) {
          alert(`Please fill out the following fields: ${missingFields.join(", ")}`);
      }

      return valid;
  };

  // Validate Page 2
  const validatePage2 = () => {
      const photo = form.photo.value.trim();
      const regCerti = form.Reg_Certi.value.trim();
      const license = form.License.value.trim();
      const help = form.help.value;
      let valid = true;
      let missingFields = [];

      if (photo === "") {
          missingFields.push("Photo");
          valid = false;
      }
      if (regCerti === "") {
          missingFields.push("Registration certificate");
          valid = false;
      }
      if (license === "") {
          missingFields.push("License");
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

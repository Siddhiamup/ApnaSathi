document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("myF");
    const next = document.getElementById("next");
    const back = document.getElementById("back");
    const p1 = document.getElementById("p1");
    const p2 = document.getElementById("p2");

    const validatePage1 = () => {
        const name = form.uname.value.trim();
       // const email = form.uemail.value.trim();
        const mobile = form.umobile.value.trim();
        const birthdate = form.bdate.value.trim();
        let valid = true;

        if (name === "") {
            alert("Name is required");
            valid = false;
        }
       /* if (email === "") {
            alert("Email is required.");
            valid = false;
        } else if (!/^\S+@\S+\.\S+$/.test(email)) {
            alert("Enter a valid email address");
            valid = false;
        }*/
        if (mobile === "") {
            alert("Mobile number is required");
            valid = false;
        } else if (!/^\d{10}$/.test(mobile)) {
            alert("Enter a valid 10-digit mobile number");
            valid = false;
        }
        if (birthdate === "") {
            alert("Birth date required.");
            valid = false;
        }
        return valid;
    };

    const validatePage2 = () => {
        const signature = form.Signature.value;
        const photo = form.photo.value;
        const aadhar = form.Aadhar.value;
        const slot = form.slot.value;
        const foundationName = document.getElementById('foundationNameInput').value.trim();
        let valid = true;

        if (signature === "") {
            alert("Signature is required");
            valid = false;
        }
       
        if (slot === "") {
            alert("Please select an appropriate slot.");
            valid = false;
        }
        if (document.getElementById('Foundation').checked && foundationName === "") {
            alert("Foundation name is required.");
            valid = false;
        }
        if (photo === "") {
            alert("Photo is required");
            valid = false;
        }
        if (aadhar === "") {
            alert("Aadhar is required");
            valid = false;
        }
        return valid;
    };

    next.addEventListener("click", (event) => {
        if (validatePage1()) {
            p1.style.display = 'none';
            p2.style.display = 'block';
        }
    });

    back.addEventListener("click", () => {
        p1.style.display = 'block';
        p2.style.display = 'none';
    });

    form.addEventListener("submit", (event) => {
        if (!validatePage2()) {
            event.preventDefault();
        }
    });


    // Show or hide custom slot based on radio selection
    const customSlot = document.getElementById('customSlot');
    const customDatesRadio = document.getElementById('CustomDates');
    const weekEndRadio = document.getElementById('WeekEnd');
    const everyDayRadio = document.getElementById('EveryDay');

    customDatesRadio.addEventListener('change', () => {
        if (customDatesRadio.checked) {
            customSlot.style.display = 'block';
        }
    });

    weekEndRadio.addEventListener('change', () => {
        if (weekEndRadio.checked) {
            customSlot.style.display = 'none';
        }
    });

    everyDayRadio.addEventListener('change', () => {
        if (everyDayRadio.checked) {
            customSlot.style.display = 'none';
        }
    });


    // Show or hide foundation name 
    const foundationRadio = document.getElementById('Foundation');
    const individualRadio = document.getElementById('Individual');
    const foundationNameInput = document.getElementById('foundationName');

    foundationRadio.addEventListener('change', function () {
        if (this.checked) {
            foundationNameInput.style.display = 'block';
        }
    });

    individualRadio.addEventListener('change', function () {
        if (this.checked) {
            foundationNameInput.style.display = 'none';
        }
    });
});


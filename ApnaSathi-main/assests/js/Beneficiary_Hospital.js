document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("HealthCare");
    const next = document.getElementById("next");
    const next2 = document.getElementById("next2");
    const back = document.getElementById("back");
    const back2 = document.getElementById("back2");
    const p1 = document.getElementById("p1");
    const p2 = document.getElementById("p2");
    const p3 = document.getElementById("p3");

    //Validate patient details -page 1
    const validatePage1 = () => {
        const patientName = form.pname.value.trim();
        const aadhar = form.Aadhar.value.trim();
        const guardianMobile = form.pmobile.value.trim();
        const illness = form.illness.value.trim();
        const medicalReports = form.medical_reports.value.trim();
        let valid = true;
        let missingFields = [];

        if (patientName === "") {
            missingFields.push("patient name");
            valid = false;
        }
        if (aadhar === "") {
            missingFields.push("Aadhar");
            valid = false;
        }
        if (guardianMobile === "" || guardianMobile.length !== 10) {
            missingFields.push("Guardian Mobile no");
            valid = false;
        }
        if (illness === "") {
            missingFields.push("illness");
            valid = false;

        }
        if (medicalReports === "") {
            missingFields.push("medical reports");
            valid = false;
        }
        if (!valid) {
            alert(`Please fill out the following fields: ${missingFields.join(", ")}`);
        }

        return valid;
    };

    //validate hospital page
    const validatePage2 = () => {
        const hospitalName = form.hname.value.trim();
        const hospitalAddress = form.haddress.value.trim();
        const hospitalContact = form.hcontact.value.trim();
        const help = form.help.value;
        let valid = true;
        missingFields = [];

        if (hospitalName === "") {
            missingFields.push("Hospital Name");
            valid = false;
        }
        if (hospitalAddress === "") {
            missingFields.push("Hosiptal Address");
            valid = false;
        }
        if (hospitalContact === "" || hospitalContact.length !== 10) {
            missingFields.push("Hospital contact no");
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



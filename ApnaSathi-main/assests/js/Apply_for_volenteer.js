document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("myF");
    const next = document.getElementById("next");
    const next2 = document.getElementById("next2");
    const back = document.getElementById("back");
    const back2 = document.getElementById("back2");
    const p1 = document.getElementById("p1");
    const p2 = document.getElementById("p2");
    const p3 = document.getElementById("page3");

    const validatePage1 = () => {
        const name = form.bname.value.trim();
        const mobile = form.bmobile.value.trim();  
        let valid = true;
        missingFields=[];

        if (name === "") {
            missingFields.push("Name");
            valid = false;
        }
        if (mobile === "" || mobile.length !== 10) {
            missingFields.push("Valid 10-digit mobile number");
            valid = false;
        }
        if (!valid) {
            alert(`Please fill out the following fields: ${missingFields.join(", ")}`);
        }
        return valid;
    };

    const validatePage2 = () => {
        const slot = form.slot.value;
        const helpTypeOtherChecked=document.getElementById('other').checked;
        const otherHelpType = document.querySelector('input[name=otherHelpType]').value.trim();
        let valid = true;
        missingFields=[];

        if (slot === "") {
            missingFields.push("slot");
            valid = false;
        }
        if (document.getElementById('other').checked && otherHelpType === "") {
            missingFields.push("Help type");
            valid = false;
        }
        // Validate at least one help type is selected
        const helpTypes = document.querySelectorAll('input[name="helpType"]');
        let helpTypeSelected = false;
        helpTypes.forEach(radio => {
            if (radio.checked) {
                helpTypeSelected = true;
            }
        });
        if (!helpTypeSelected) {
            missingFields.push("Help type");
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

    const customSlot = document.getElementById('customSlot');
    const customDatesRadio = document.getElementById('CustomDates');

    customDatesRadio.addEventListener('change', () => {
        if (customDatesRadio.checked) {
            customSlot.style.display = customDatesRadio.checked ? 'block' :'none';
        }
    });
    document.querySelectorAll('input[name="slot"]').forEach(radio=>{
        radio.addEventListener('change',()=>{
            if(!customDatesRadio.checked){
                customSlot.style.display='none';
            }
        });
    });


    // Show ordisplay other hepl 
   const otherHelpTypeInput=document.getElementById('otherHelpType');
   document.getElementById('other').addEventListener('change',function(){
       otherHelpTypeInput.style.display=this.checked ? 'block' : 'none';
   });

   document.querySelectorAll('input[name="helpType"]').forEach(radio=>{
    radio.addEventListener('change',()=>{
        if(!document.getElementById('other').checked){
              otherHelpTypeInput.style.display='none';

        }   
     });
   });

});


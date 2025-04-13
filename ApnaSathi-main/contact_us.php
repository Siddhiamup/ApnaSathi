<!DOCTYPE html>
        <!--
            Date: 27/4/2024
            This web page allow users to             Contact to the Company viya form or Direct Sending email to the  site owner. 
            it takes input from the user and submit that in to the database. 
            php  file is  included for handaling the   back end logic.
            check the code for more info...
        -->

<!--
    Adding the javascript file for the Custom Validation.
    The Path of the used js file is: bookworld/src/js/contact_us.js
check the Js file for more info.
-->


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="assests/css/contact.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <script src="./assests/js/check_number.js"></script>
      <script src="../js/contact_us.js"></script>  
</head>
  <body>
  <main id="main-content">
    <?php include "./header.php"; ?>
    <div class="container">
      <span class="big-circle"></span>
      <img src="assests/image/shape.png" class="square" alt="" />
      <div class="form">
        <div class="contact-info">
          <h3 class="title">Let's get in touch</h3>
          <p class="text">
            Apna Sathi is an Indian development organisation that works with children and their families to provide access to quality education, primary healthcare, and livelihood opportunities.
          </p>

          <div class="info">
            <div class="information">
              <img src="assests/image/location.png" class="icon" alt="" />
              <p>Apna Sathi Community Pune, pin: 411003</p>
            </div>
            <div class="information">
              <img src="assests/image/email.png" class="icon" alt="" />
              <p accesskey="e">apnaSathi@gmail.com</p>
            </div>
            <div class="information">
              <img src="assests/image/phone.png" class="icon" alt="" />
              <p>+91 234 567 8900</p>
            </div>
          </div>

          <div class="social-media">
            <p>Connect with us :</p>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact-form">
          <span class="circle one"></span>
          <span class="circle two"></span>

          <form  onsubmit="return number()" method="post" action="./assests/database/contact_us_2.php" autocomplete="off">
          
          <h3 class="title">Contact us</h3>
            <div class="input-container">
              <input type="text" name="fname" id="fname" class="input" />
              <label for="fname">Username</label>
              <span>Username</span>
            </div>
            <div class="input-container">
              <input type="email" name="email" id="email"  class="input" />
              <label for="email">Email</label>
              <span>Email</span>
            </div>
            <div class="input-container">
              <input type="number" name="phone" maxlenght="10" minlingth="10" id="phonenumber" class="input" />
              <label for="phonenumber">Phone</label>
              <span>Phone</span>
            </div>
            <div class="input-container">
              <input type="text" name="subject" id="subject" class="input" />
              <label for="subject">subject</label>
              <span>Phone</span>
            </div>
            <div class="input-container textarea">
              <textarea id="myproblem" name="user_issue"  class="input"></textarea>
              <label for="myproblem">Your Issue:</label>
              <span>Your Issue:</span>
            </div><br>
            <input type="submit" class="btn" value="Send" accesskey="v">
    
        <input type="reset" value="Reset" class="btn" accesskey="c">
          </form>
        </div>
      </div>
    </div>
    <section > <center>
    <h2 align="center">Facing difficulty while submitting the form?</h2>
    <p> <a href="mailto:apnasathi1010@gmail.com" accesskey="e">Click here to send email</a></p></center>
</section>
    </main>
    <?php include "./footer.php"; ?>
    <!-- Move your script here -->
    <script>
      const inputs = document.querySelectorAll(".input");

      function focusFunc() {
        let parent = this.parentNode;
        parent.classList.add("focus");
      }

      function blurFunc() {
        let parent = this.parentNode;
        if (this.value == "") {
          parent.classList.remove("focus");
        }
      }

      inputs.forEach((input) => {
        input.addEventListener("focus", focusFunc);
        input.addEventListener("blur", blurFunc);
      });
    </script>
  </body>
</html>


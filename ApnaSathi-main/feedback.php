<!DOCTYPE html>
<html lang="en">
        <!--
    date: 25/08/2024
    This file provides functionality for the user to submit their data for Apna Sathi.
    It also includes other PHP files for submitting the data and handling other tasks related to the database.
    Check the code for more info.
    -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback System</title>
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assests/css/f.css" />
</head>
<?php include "./header.php"; ?>
<body class="body" background="assests/image/flag2.jpeg">
<main id="main-content">  
<form method="post" onsubmit="return number()" action="./assests/database/feedback_form_2.php">

    <div class="feedback-container">
        <h1>Give us your valuable feedback</h1>
        <p>Your feedback is very important to us</p>

        <div class="emoji-box">
            <button class="btn normal">&#128578;</button>
            <button class="btn normal">&#128515;</button>
            <button class="btn normal">&#128519;</button>
            <button class="btn normal">&#128531;</button>
            <button class="btn normal">&#128532;</button>
            <button class="btn normal">&#128545;</button>
        </div><br>
        <label for="user-rating" class="question"> <p class="question">Your rating:</p></label><br>
            <select id="user-rating" name="user_rating" required>
                <option value="" disabled selected>Choose your rating</option>
                <option value="excellent">Excellent</option>
                <option value="good">Good</option>
                <option value="average">Average</option>
                <option value="poor">Poor</option>
                <option value="very poor">Very poor</option>
            </select><br><br>
            
            <label for="user-message" ><p class="question">What do you want to say?</p>
            <textarea id="textarea" cols="20" rows="5"></textarea>
             
       
        <p class="question">Do you want to share this publicly?</p>
        <div class="radio-btns">
            <div class="one-btn">
                <input type="radio" name="one" id="Yes">
                <label for="Yes">Yes</label>
            </div>
            <div class="one-btn">
                <input type="radio" name="one" id="No">
                <label for="No">No</label>
            </div>
        </div>

        <div class="info-field">
            <div class="name">
            <label for="user-name"><span>Nickname</span>
                    <input type="text" id="user-name"  autocomplete="name" name="user_name">
                   </label>
                </div>
                <div class="email">
                <label for="phonenumber">
                <input type="number" id="phonenumber" required  autocomplete="tel-national" name="user_contact" minlength="10" maxlength="10">
                <span>Contact number:</span>
                </label> 
            </div>
            <div class="email">
                <label for="user-email">
                    <input type="email" d="user-email" placeholder=" " name="user_email" autocomplete="email">
                    <span>Email address (Will not be published)</span>
                </label> 
            </div>
           
            <div class="email">
                <label for="user-subject">
                    <input type="text" id="user-subject" placeholder=" " name="user_subject" autocomplete="email">
                    <span>Your Subject :</span>
                </label> 
            </div>
        </div>

        <div class="accept">
            <input type="checkbox" id="accept">
            <label for="accept">I accept the <a href="#">terms and conditions</a></label>
        </div>

        <div class="center">
            <button class="btn button" accesskey="v">Send</button>  
          

        </div>
        <div class="center">
            <button class="btn button" type="reset" value="Clear form" accesskey="c" >Reset</button>  
        

        </div>
    </div>
</form>
</main>
    <script src="./assets/js/f.js"></script>
</body>
<?php include "./footer.php"; ?>
</html>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback System</title>
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="f.css" />
</head>
//
<body class="body" background="image/flag2.jpeg">
   
    <main id="main-content">
    <div class="feedback-container">
        <h1>Give us your valuable feedback</h1>
        <p>Your feedback is very important to us</p>
        <form method="post" action="./assets/database/feedback_form_2.php">
        <fieldset>
        <div class="emoji-box">
        <select id="user-rating" name="user_rating" required>
            <label for="user-rating">Your rating:</label>
            <button class="btn normal" value="excellent">&#128578;</button>
            <button class="btn normal" value="good">&#128515;</button>
            <button class="btn normal" value="Average">&#128519;</button>
            <button class="btn normal" value="poor">&#128531;</button>
            <button class="btn normal" value="">&#128532;</button>
            <button class="btn normal" value="very poor">&#128545;</button>
        </select>
        </div>

        <p class="question">What do you want to say?</p>
        <label for="user-message"></label>
        <textarea  id="user-message" required name="user_message"  cols="20" rows="5"></textarea>

        <p class="question">Do you want to share this publicly?</p>
        <div class="radio-btns">
            <div class="one-btn">
                <input type="radio" name="one" id="Yes">
                <label for="Yes">Yes</label>
            </div>
            <div class="one-btn">
                <input type="radio" name="one" id="No">
                <label for="No">No</label>
            </div>
        </div>

        <div class="info-field">
            <div class="name">
                <label for="user-name">
                    <input type="text"  id="user-name"  placeholder=" ">
                    <span>Nickname</span>
                </label>
            </div>
            <div class="number">
                <label for="user-no">
                    <input type="Number"  id="user-no"  placeholder=" ">
                    <span>Nickname</span>
                </label>
            </div>
            <div class="email">
                <label for="user-email">
                    <input type="email" id="user-email" placeholder=" ">
                    <span>Email address (Will not be published)</span>
                </label>
            </div>
        </div>

        <div class="accept">
            <input type="checkbox" id="user-message" required name="user_message" >
            <label for="user-message">I accept the <a href="#">terms and conditions</a></label>
        </div>

        <div class="center">
            <button class="btn button" type="submit" value="Submit" accesskey="v">Send</button>
        </div>
        <div class="center"><input type="reset" class="btn button"  value="Clear form" accesskey="c"></div>
        
        </fieldset>
    </form>
</main>
    </div>

    <script src="/f.js"></script>
</body>
//
</html>
-->
<!DOCTYPE html>
<!--
This is the home page of the Website.
other php files are included to handle further operations.
For any other info please check the code.
Date: 09/08/2024
-->
<html lang="en">

<head>
    <title>Apna Sathi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- FontAwesome Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <!-- css -->  
   <link rel="stylesheet" href="assests/css/index2.css">
</head>

<body>
    <!--Adding the other php file for the header
-->
<?php include "./header.php"; ?>
    
<main id="main-content">
<!--<div class="slider">
    <figure>
      <div class="slide">
        <h1></h1>
        <img src="assets/image/smile.jpg" alt="">
      </div>
      <div class="slide">
        <h1>Education</h1>
        <img src="assets/image/education.jpg" alt="">
      </div>
      <div class="slide">
        <img src="assets/image/DO IT.png" alt="">
      </div>
      <div class="slide">
        <h1>If you see a need, take the lead</h1>
        <img src="assets/image/red kid.jpg" alt="">
      </div>
    </figure>
  </div>
  COUNTING SCRIPT
  <script src="assets/js/imageSlide.js"></script>
<br><br>-->
<?php include "./slideMain.php"; ?><br>
<div class="para">
    <p>
      Started in 2002, Apna Sathi is an Indian development organisation that works with children and their families to
      provide access to quality education, primary healthcare and livelihood opportunities. We have over 130 projects,
      spread over 2000 villages and slums in 25 states of the country.
      Apna Sathi Foundation acts as a catalyst in the cycle of change, complementing and supplementing government
      efforts towards achieving the Sustainable Development Goals (SDGs). We collaborate, sensitize and partner with
      like-minded institutions and individuals to implement high-impact programmes. The focus is to enable access,
      enhance quality and bring long-term behavioral change to communities, especially at the grassroots.
      <br><br>When you make a donation under Section 80G to Apna Sathi Foundation, you can claim a tax deduction on the
      donated amount. This reduces your overall taxable income, and you end up paying less in income tax. We are
      registered under Section 12A (a) of the Income Tax Act, 1961 and the Indian Trusts Act, 1882.
      <br><br><b><a href="aboutUs.php"> Know more </a></b>
    </p><br><br>
    </div>
  <?php include "./count2.php"; ?>
  </main>
    <script src="./assests/js/user_status.js"> </script>


<!-- Adding the footer file also -->    
<?php include "./footer.php"; ?>

</body>

</html>

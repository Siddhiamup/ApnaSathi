<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apna Sathi - FAQs</title>
    <style>
        /* FAQ Page Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .faq-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .faq-item {
            margin-bottom: 20px;
        }
        .faq-question {
            font-weight: bold;
            font-size: 1.2em;
            background-color: #1abc9c;
            color: #fff;
            padding: 15px;
            border-radius: 8px;
            cursor: pointer;
        }
        
.btn {
  padding: 0.6rem 1.3rem;
  background-color: #fff;
  border: 2px solid #fafafa;
  font-size: 0.95rem;
  color: #1abc9c;
  line-height: 1;
  border-radius: 25px;
  outline: none;
  cursor: pointer;
  transition: 0.3s;
  align-items: center;
  margin-left: 45%;

}

.btn:hover {
  background-color: transparent;
  color: #fff;
}

        .faq-answer {
            padding: 10px 15px;
            margin-top: 5px;
            display: none; /* Initially hidden */
            background-color: #f1f1f1;
            border-radius: 8px;
        }
        .faq-question:hover {
            background-color: #149279;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var faqQuestions = document.querySelectorAll(".faq-question");
            faqQuestions.forEach(function(question) {
                question.addEventListener("click", function() {
                    var answer = this.nextElementSibling;
                    if (answer.style.display === "block") {
                        answer.style.display = "none";
                    } else {
                        answer.style.display = "block";
                    }
                });
            });
        });
    </script>
</head>
<?php include "./header.php"; ?>
<body>

    <div class="faq-container">
        <h1>Frequently Asked Questions</h1>

        <div class="faq-item">
            <div class="faq-question">What is Apna Sathi?</div>
            <div class="faq-answer">
                Apna Sathi is a platform designed to connect donors with beneficiaries in need. It enables donors to contribute to various causes such as education, orphanages, healthcare, etc., and provides beneficiaries a way to request support.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">How does Apna Sathi work?</div>
            <div class="faq-answer">
                Donors and beneficiaries can create profiles on the platform. Donors can make contributions, and beneficiaries can submit requests for help. The platform verifies users to ensure security and authenticity.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Do I need an account to donate?</div>
            <div class="faq-answer">
                Yes, while the platform allows public viewing, donations can only be made by registered and verified users.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">What types of support can be provided on Apna Sathi?</div>
            <div class="faq-answer">
                Donors can support causes like orphanages, education, healthcare, and volunteering through donations or contributions in other forms.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Is user information secure?</div>
            <div class="faq-answer">
                Yes, all users are verified to ensure authenticity, and data security measures like PHPMailer and MYSQL databases are employed to secure transactions and personal information.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">How do beneficiaries request help?</div>
            <div class="faq-answer">
                Beneficiaries can create a profile and submit a request for support. These requests are visible to donors who can choose to offer help.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">Is Apna Sathi free to use?</div>
            <div class="faq-answer">
                Yes, Apna Sathi is free to use. However, the platform may introduce premium features in the future for advanced donor reporting and priority beneficiary access.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">What technologies power Apna Sathi?</div>
            <div class="faq-answer">
                The platform uses PHP 8.2.13, MYSQL for the database, PHPMailer for communication, and it is designed to be accessible and secure.
            </div>
        </div>

    </div>
    <p align="center">if you have another query please click here to write your issues</p>
<a href="contact_us.php"><button class="btn" align="center">Contact Us</button></a>
<br><br>
</body>
<?php include "./footer.php"; ?>
</html>

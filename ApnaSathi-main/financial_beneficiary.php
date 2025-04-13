<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assests/css/Ben.css">
    <script src="./assests/js/financial_beneficiary.js"></script>
    <link rel="stylesheet" href="./assests/css/bootstrap.min.css">

</head>

<body>
    
    <div class="img-bg">
        <div class="blur"></div>
        <div class="block">

            <main id="register">
                <h2 class="text-center ">Financial Beneficiary Registration Form</h2>


                <div class="container text-center mt-5">
                    <form id="myF" method="POST" enctype="multipart/form-data" name="reg" action="./assests/database/financial_beneficiary_2.php">
                        <!--page1-->
                        <fieldset id="p1">
                            <div id="p1">
                                <div class="mb-3">
                                    <label class="lbl" >Name:</label><br>
                                    <input type="text" name="uname" placeholder="Enter your full name" required
                                        class="form-control w-50 m-auto">
                                </div>
                              
                                <div class="mb-3">
                                    <label class="lbl">Mobile No:</label>
                                    <input type="number" name="umobile" placeholder="Enter Mobile no" maxlength="10"
                                        required class="form-control w-50 m-auto">
                                </div>
                                <div class="mb-3">
                                    <label class="lbl">Birth date:</label>
                                    <input type="date" name="bdate" placeholder="Enter your birthdate" required
                                        class="form-control w-50 m-auto" id="bdate" onchange="calculateAge()">
                                </div>
                                <div class="mb-3">
                                    <label class="lbl">Age:</label>
                                    <input type="text" name="age" id="age" class="form-control w-50 m-auto" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="lbl">Photo:</label>
                                    <input type="file" name="photo" enctype="multipart/form-data" required
                                        class="form-control w-50 m-auto">
                                </div>
                             
                                 <!--For both company & individual-->
                                 <div class="mb-3">
                                    <label class="lbl"> ID Proof:</label>
                                    <input type="file" name="idProof" enctype="multipart/form-data" required
                                        class="form-control w-50 m-auto">
                                </div>
                                

                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button id="next" class="btn btn-primary">Next</button>
                            </div>
                        </fieldset>
                        <!--page2-->

                        <fieldset id="p2" style="display:none;">

                          <div class="mb-3">
                                <label>Purpose :</label><br>
                                <input type="text" name="purpose" placeholder="Specify your purpose" required
                                class="form-control w-50 m-auto"><br>
                            </div>
                        
                               
                           
                            <div class="mb-3">
                                <label>Amount you required :</label><br>
                                <input type="radio" id="below2lakhs" value="below2lakhs" class="require" name="require">
                                <label for="below2lakhs">below 2 lakhs</label><br>
                                <input type="radio" id="between2to5lakhs" value="between2to5lakhs" class="require" name="require">
                                <label for="between2to5lakhs">Between 2 and 5 lakhs</label><br>
                                <input type="radio" id="between5to10lakhs" value="between5to10lakhs" class="require" name="require">
                                <label for="between5to10lakhs">Between 5 to 10lakhs</label><br>
                                <input type="radio" id="between10to20lakhs" value="between10to20lakhs" class="require" name="require">
                                <label for="between10to20lakhs">Between 10 to 20lakhs</label><br>
                                <input type="radio" id="above20lakhs" value="above20lakhs" class="require" name="require">
                                <label for="above20lakhs">Above 20 lakhs</label><br>
                            </div>
                            <button id="back" class="btn btn-secondary">Back</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button id="next2" class="btn btn-primary">Next</button>
                        </fieldset>

                        <!-- Page 3 (Submit Page) -->
                        <fieldset id="p3" style="display:none;">
                            <legend>Confirm and Submit</legend>
                            <h4>Confirm and Submit Your Details</h4>
                            <button id="back2" class="btn btn-primary" accesskey="o">Back</button>
                        <br/><br>
                            <button id="submit" type="submit" class="btn btn-primary" accesskey="v">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <!--<footer>
        <p>&copy; 2024 Apna Sathi. All rights reserved.</p>
    </footer>-->
</body>

</html>
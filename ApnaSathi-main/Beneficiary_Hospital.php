<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assests/css/Ben.css">
    <script src="./assests/js/Beneficiary_Hospital.js"></script>

</head>

<body>
    <header>
        <div class="logo-container">
            <img src="./assests/img/logo.jpeg" alt="logo" width="60" height="60">
            <p style="text-align: left; font-style: italic; margin-top: 5px;">If You See A Need, Take The Lead</p>
        </div>
        <nav>
            <a href="#register">Skip to main content</a>
        </nav>

    </header>
    <div class="img-bg">
        <div class="blur"></div>
        <div class="block">

            <main id="register">
                <h2 class="text-center ">Helthcare setup Regestration Form</h2>


                <div class="container text-center mt-5">
                    <form id="HealthCare" method="POST" enctype="multipart/form-data" name="reg">
                        <!--page1-->
                        <fieldset id="p1">
                            <div id="p1">
                                <div class="mb-3">
                                    <label class="lbl"> Patient Name:</label><br>
                                    <input type="text" name="pname" placeholder="Enter your full name" required
                                        class="form-control w-50 m-auto">
                                </div>
                                <!--<div class="mb-3">
                                    <label class="lbl">Registered Email Id/Username:</label>
                                    <input type="email" name="uemail" placeholder="Enter Registered email/Username"
                                        required class="form-control w-50 m-auto">
                                </div>-->
                                <div class="mb-3">
                                    <label class="lbl"> Aadhar:</label>
                                    <input type="file" name="Aadhar" enctype="multipart/form-data" required
                                        class="form-control w-50 m-auto">
                                </div>
                                <div class="mb-3">
                                    <label class="lbl"> Guardian's Mobile No:</label>
                                    <input type="number" name="pmobile" placeholder="Enter Mobile no" maxlength="10"
                                        required class="form-control w-50 m-auto">
                                </div>
                                <div class="mb-3">
                                    <label class="lbl"> Illness Description:</label><br>
                                    <input type="text" name="illness" placeholder="Describe your illness:" required
                                        class="form-control w-50 m-auto" placeholder="upload your mediacal reports:">
                                </div>
                                <div class="mb-3">
                                    <label class="lbl">Medical reports:</label>
                                    <input type="file" name="medical_reports" enctype="multipart/form-data" required
                                        class="form-control w-50 m-auto">
                                </div>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button id="next" class="btn btn-primary">Next</button>
                            </div>
                        </fieldset>
                        <!--page2-->

                        <fieldset id="p2" style="display:none;">
                            <div class="mb-3">
                                <label class="lbl"> Hospital Name:</label><br>
                                <input type="text" name="hname" placeholder="Enter your Hospital name:" required
                                    class="form-control w-50 m-auto">
                            </div>
                            <div class="mb-3">
                                <label class="lbl">Hospital Address:</label><br>
                                <textarea name="haddress" placeholder="Enter your Hospital Address:" required class="form-control w-50 m-auto" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="lbl"> Hospital's contact no:</label>
                                <input type="number" name="hcontact" placeholder="Enter Hospital's contact no:" maxlength="10"
                                    required class="form-control w-50 m-auto">
                            </div>
                            <div class="mb-3">
                                <label>Amount you need:</label><br>
                                <input type="radio" id="below2lakhs" value="below2lakhs" class="help" name="help">
                                <label for="below2lakhs">below 2 lakhs</label><br>
                                <input type="radio" id="between2to5lakhs" value="between2to5lakhs" class="help" name="help">
                                <label for="between2to5lakhs">Between 2 and 5 lakhs</label><br>
                                <input type="radio" id="between5to10lakhs" value="between5to10lakhs" class="help" name="help">
                                <label for="between5to10lakhs">Between 5 to 10lakhs</label><br>
                                <input type="radio" id="between10to20lakhs" value="between10to20lakhs" class="help" name="help">
                                <label for="between10to20lakhs">Between 10 to 20lakhs</label><br>
                                <input type="radio" id="above20lakhs" value="above20lakhs" class="help" name="help">
                                <label for="orphanage">Above 20 lakhs</label><br>
                            </div>
                            <button id="back" class="btn btn-secondary">Back</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button id="next2" class="btn btn-primary">Next</button>
                        </fieldset>

                       <!-- Page 3 (Submit Page) -->
                       <fieldset id="p3" style="display:none;">
                            <h4>Confirm and Submit Your Details</h4>
                            <button id="back2" class="btn btn-primary">Back</button>
                            <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </main>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Apna Sathi. All rights reserved.</p>
    </footer>
</body>

</html>
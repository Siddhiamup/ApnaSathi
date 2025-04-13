<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assests/css/Ben.css">
    <script src="./assests/js/Volunteer_Form.js"></script>
    <link rel="stylesheet" href="./assests/css/bootstrap.min.css">
</head>

<body>
   
    <div class="img-bg">
        <div class="blur"></div>
        <div class="block">

            <main id="main-content">
                <h2 class="text-center">Non Financial Beneficiary Registration Form</h2>

                <div class="container text-center mt-5">
                    <form id="myF" method="POST" enctype="multipart/form-data" name="reg" action="./assests/database/nonFinancial_beneficiary_2.php">
                        <!-- Page 1 -->
                        <fieldset id="p1">
                            <legend>Personal Information</legend>
                            <div id="p1">
                                <div class="mb-3">
                                    <label class="lbl">Name:</label><br>
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
                                <button type="reset" class="btn btn-primary" accesskey="c">Clear Form </button>
                                <br/>
                                <button id="next" class="btn btn-primary" accesskey="n">Next</button>
                            </div>
                        </fieldset>

                        <!-- Page 2 -->
                        <fieldset id="p2" style="display:none;">
                            <legend>Volunteer Details</legend>
                            <div class="mb-3">
                                <label>What is your availability:</label><br>
                                <input type="radio" id="EveryDay" value="EveryDay" name="slot">
                                <label for="EveryDay">Every Day</label><br>
                                <input type="radio" id="WeekEnd" value="WeekEnd" name="slot">
                                <label for="WeekEnd">Week End</label><br>
                                <input type="radio" id="CustomDates" value="CustomDates" name="slot">
                                <label for="CustomDates">Custom Dates</label><br>
                            </div>

                            <!-- Custom Slot -->
                            <div class="mb-3" id="customSlot" style="display:none;">
                                <label class="lbl">Select Date and Time:</label><br>
                                <label for="StartDate">Start Date:</label>
                                <input type="date" name="StartDate" class="form-control w-50 m-auto">
                                <label for="EndDate">End Date:</label>
                                <input type="date" name="EndDate" class="form-control w-50 m-auto">
                            </div>

                            <div class="mb-3">
                                <label class="lbl">Photo:</label>
                                <input type="file" name="photo" enctype="multipart/form-data" required
                                    class="form-control w-50 m-auto" accept=".jpg, .jpeg, .png">
                            </div>

                            <div class="mb-3">
                                <label class="lbl">ID Proof :</label>
                                <input type="file" name="Aadhar" enctype="multipart/form-data" required
                                    class="form-control w-50 m-auto" accept=".pdf, .doc, .docx">
                            </div>

                            <div class="mb-3">
                                <label>Are you an Individual or a Foundation?</label><br>
                                <input type="radio" id="Individual" value="Individual" name="foundationType" checked>
                                <label for="Individual">Individual</label><br>
                                <input type="radio" id="Foundation" value="Foundation" name="foundationType">
                                <label for="Foundation">Foundation</label><br>
                            </div>

                            <!-- Foundation Name Input -->
                            <div class="mb-3" id="foundationName" style="display:none;">
                                <label class="lbl">Foundation Name:</label>
                                <input type="text" id="foundationNameInput" name="foundationName" placeholder="Enter Foundation Name:" class="form-control w-50 m-auto">
                            </div>

                            <button id="back" class="btn btn-secondary" accesskey="o">Back</button>
                            <br/>
                            <button type="reset" class="btn btn-primary" accesskey="c"> Clear Form </button>
                            <br/>
                            <button id="next2" class="btn btn-primary" accesskey="n">Next</button>
                        </fieldset>

                        <!-- Page 3 (Submit Page) -->
                        <fieldset id="p3" style="display:none;">
                            <legend>Confirm and Submit</legend>
                            <h4>Confirm and Submit Your Details</h4>
                            <button id="back2" class="btn btn-primary" accesskey="o">Back</button>
                        <br/>
                            <button id="submit" type="submit" class="btn btn-primary" accesskey="v">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </main>
        </div>
    </div>


</html>

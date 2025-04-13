<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assests/css/Ben.css">
    <script src="./assests/js/Apply_for_volenteer.js"></script>
    <link rel="stylesheet" href="./assests/css/bootstrap.min.css">

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
                <h2 class="text-center ">Application for volenteer form </h2>


                <div class="container text-center mt-5">
                    <form id="myF" method="POST" enctype="multipart/form-data" name="reg">
                        <!--page1-->
                        <fieldset id="p1">
                            <div id="p1">
                                <div class="mb-3">
                                    <label class="lbl">Benificary Name:</label><br>
                                    <input type="text" name="bname" placeholder="Enter your full name" required
                                        class="form-control w-50 m-auto">
                                </div>
                                <div class="mb-3">
                                    <label class="lbl">Mobile No:</label>
                                    <input type="number" name="bmobile" placeholder="Enter Mobile no" maxlength="10"
                                        required class="form-control w-50 m-auto">
                                </div>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button id="next" class="btn btn-primary">Next</button>
                            </div>
                        </fieldset>
                        <!--page2-->


                        <fieldset id="p2" style="display:none;">
                        <div class="mb-3">
                                <label>What is your requirement:</label><br>
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
                                <label>Which kind of help you need?</label><br>                  
                                <input type="radio" id="help" value="help" name="helpType">
                                <label for="Campign">For Campign or program:</label><br>
                                <input type="radio" id="help" value="help" name="helpType">
                                <label for="personalAsistant">Personal Asstistant:</label><br>
                                <input type="radio" id="help" value="help" name="helpType">
                                <label for="medical">Medical(Caretaker):</label><br>
                                <input type="radio" id="other" value="other" name="helpType">
                                <label for="Foundation">other</label><br>
                            </div>
                            <div class="mb-3" id="otherHelpType" style="display:none;">
                                <label class="lbl">Other Help type:</label>
                                <input type="text" id="otherHelpType" name="otherHelpType" placeholder="Enter Help required." class="form-control w-50 m-auto">
                                </div>
                            <button id="back" class="btn btn-secondary">Back</button>
                            <button type="reset" class="btn btn-primary">Reset</button>
                            <button id="next2" class="btn btn-primary">Next</button>
                        </fieldset>

                        <!-- Page 3 (Submit Page) -->
                        <fieldset id="page3" style="display:none;">
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
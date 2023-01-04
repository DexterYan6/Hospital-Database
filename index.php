<!DOCTYPE html>
<html>
<head>
        <title>Hospital Database</title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
        <nav class = "navbar navbar-light" style = "background-color: #e3f2fd;">
                <a class = "navbar-brand px-3" href = "#">
                        <div class = "d-flex align-items-center justify-content-center">
                                <img class = "align-middle" src = "https://thumbs.dreamstime.com/b/hospital-color-icon-shadow-blue-background-vector-illustration-hospital-color-icon-shadow-blue-background-133348914.jpg" width = "50" height = "50" alt = "">
                                <h1 class = "align-middle px-4">HOSPITAL DATABASE </h1>
                        </div>
                </a>
        </nav>

        <!-- Order and filter the list of doctors -->
        <div class = "container py-3">
                <h2> LIST OF DOCTORS</h2>
                <form action = "" method = "post">
                        <div class = "row">
                                <div class = "col form-group">
                                        <!-- Choose what to sort by -->
                                        <h4>Sort by:</h4>
                                        <div class = "form-check">
                                                <input class = "form-check-input" type = "radio" name = "sort" value = "lastname" checked = "checked">Last name</br>
                                        </div>
                                        <div class = "form-check">
                                                <input class = "form-check-input" type = "radio" name = "sort" value = "birthdate"> Birth Date
                                        </div>
                                </div>
                                <div class = "col form-group">
                                        <!-- Sort based on ascending/descending order -->
                                        <h4>Order by:</h4>
                                        <div class = "form-check">
                                                <input class = "form-check-input"  type = "radio" name = "order" value = "ASC" checked = "checked"> Ascending</br>
                                        </div>
                                        <div class = "form-check">
                                                <input class = "form-check-input" type = "radio" name = "order" value = "DESC"> Descending
                                        </div>
                                </div>
                                <div class = "col form-group">
                                        <!-- Filter based on doctor speciality -->
                                        <h4>Speciality:</h4>
                                        <select class="form-control mb-4" name = "filter" id = "filter">
                                        <option value = "1" selected = "selected">None</option>
                                        <?php
                                                include "speciality.php";
                                        ?>
                                        </select>
                                </div>
                        <br>
                        <br>
                </div>
                <button class = "btn btn-outline-secondary" type = "submit">Apply Filters</button>
                </form>
                <br>
                <div class = "row">
                        <!-- Display table -->
                        <?php
                                if(isset($_POST["sort"]) && (isset($_POST["order"]))) {
                                        include "getDoctors.php";
                                }
                        ?>
                        </br>
                </div>
        </div>

        <div class = "container">
                <!-- Add a doctor to database -->
                <h2>ADD A DOCTOR</h2>
                        <!-- Fill in Doctor information -->
                        <form action = "" method = "post">
                        <div class = "form-row row mb-4">
                                <div class = "col">
                                        <!-- Doctor license number -->
                                        <label for="licensenum">License Number:</label>
                                        <input class = "form-control" type = "text" name = "licensenum" id = "licensenum" value = ""  required/></br>
                                </div>
                                <div class = "col">
                                        <!-- Doctor first name -->
                                        <label for="firstname">Doctor First Name:</label>
                                        <input class = "form-control" type = "text" name = "firstname" id = "firstname" value = ""  required/></br>
                                </div>
                                <div class = "col">
                                        <!-- Doctor last name -->
                                        <label for = "lastname">Doctor Last Name:</label>
                                        <input class = "form-control" type = "text" name = "lastname" id = "lastname" value = ""  required/></br>
                                </div>
                        </div>
                        <div class = "form-row row mb-4">
                                <div class = "col">
                                        <!-- Doctor License date -->
                                        <label>License Date:</label>
                                        <input class = "form-control" type = "date" name = "licensedate" value = "" placeholder = "YYYY-MM-DD" required/></br>
                                </div>
                                <div class = "col">
                                        <!-- Doctor Birth Date -->
                                        <label>Birth Date:</label>
                                        <input class = "form-control" type = "date" name = "birthdate" value = "" placeholder = "YYYY-MM-DD" required/></br>
                                </div>
                                <div class = "col">
                                        <!-- Doctor hospital -->
                                        <label>Doctor Hospital:</label>
                                        <select class = "form-control" name = "hosworksat" id="hosworksat" required>
                                        <option value = "" selected disabled hidden>Select a hospital</option>
                                        <?php
                                                include "hospCode.php";
                                        ?>
                                        </select>
                                        <br>
                                </div>
                        </div>
                        <div class = "form-row row">
                                <div class = "col">
                                        <!-- Doctor speciality -->
                                        <label for = "speciality">Speciality:</label>
                                        <input class = "form-control" type = "text" name = "speciality" id = "speciality" value = ""  required/><br>
                                </div>
                        </div>
                <br>
                <button class = "btn btn-outline-secondary" type = "submit">Add Doctor</button>
                </form>
                <!-- Add doctor to database -->
                <br>
                <?php
                        if(isset($_POST["hosworksat"])) {
                                include "addDoctor.php";
                        }
                ?>
                </br>
        </div>

        <div class = "container py-3">
                <!-- Delete a doctor from the database -->
                <h2>DELETE A DOCTOR</h2>
                <label>Input a doctor's license number to delete from the database:</label>
                <form action = "" method = "post">
                <input class = "form-control" type = "text" name = "deleteDoc" id = "deleteDoc" value = "" required/></br>
                <button class = "btn btn-outline-danger" type = "submit" onclick = "confirmation(event)">Delete Doctor</button>
                <!-- Script for popup -->
                <script>
                function confirmation(e) {
                        if(!confirm('Are you sure you want to delete this doctor?')) {
                                e.preventDefault();
                        }
                }
                </script>
                </form>
                </br>
                <!-- If confirmed carry out delete function -->
                <?php
                        if(isset($_POST["deleteDoc"])) {
                                include "deleteDoc.php";
                        }
                ?>
        </div>

        <div class = "container py-3">
                <!-- Assigning a doctor to a patient -->
                <h2>ASSIGN DOCTOR TO PATIENT</h2>
                <form action = "" method = "post">
                        <div class = "form-row row">
                                <div class = "col form-group">
                                        <label>Doctor selection:</label>
                                        <select class = "form-control" name = "assignDoc" id = "assignDoc" required>
                                        <option value = ""selected disabled hidden>Select a doctor</option>
                                        <?php
                                                include "allDoc.php";
                                        ?>
                                        </select>
                                </div>
                                <div class = "col form-group">
                                        <label>Patient selection:</label>
                                        <select class = "form-control" name = "assignPat" id = "assignPat" required>
                                        <option value = ""selected disabled hidden>Select a patient</option>
                                        <?php
                                                include "allPatient.php";
                                        ?>
                                        </select>
                                </div>
                        </div>
                <br>
                <button class = "btn btn-outline-secondary" type = "submit">Assign</button>
                </form>
                <!-- Once form is submitted send in info to assign doctor to patient -->
                <?php
                        if(isset($_POST["assignDoc"])){
                                include "assigned.php";
                        }
                ?>
        </div>

        <div class = "container py-3">
                <!-- Look at patients assigned to doctor -->
                <h2>LIST PATIENTS ASSIGNED TO DOCTOR</h2>
                <form action = "" method = "post">
                        <b>Doctor selection:</b>
                        <select class = "form-control" name = "getDoc" id = "getDoc" required>
                        <option value = ""selected disabled hidden>Select a doctor</option>
                        <?php
                                include "allDoc.php";
                        ?>
                        </select>
                <br>
                <button class = "btn btn-outline-secondary" type = "submit">Show Patients</button>
                </form>
                <br>
                <div class = "row">
                        <?php
                                if(isset($_POST["getDoc"])) {
                                        include "docPat.php";
                                }
                        ?>
                </div>
        </div>

        <div class = "container py-3">
                <!-- Display information of chosen hospital -->
                <h2>LIST HOSPITAL INFORMATION</h2>
                <form action = "" method = "post">
                <label>Hospital selection:</label>
                <select class = "form-control" name = "hospCode" id = "hospCode" required>
                <option value = ""selected disabled hidden>Select a hospital</option>
                <?php
                        include "hospCode.php";
                ?>
                </select>
                <br>
                <button class = "btn btn-outline-secondary" type = "submit">Get Info</button>
                </form>
                <br>
                <div class = "row">
                        <?php
                                if(isset($_POST["hospCode"])) {
                                        include "hospInfo.php";
                                        echo "<br>";
                                        echo "<label>Doctor list:</label>";
                                        include "worksAt.php";
                                }
                        ?>
                </div>
        </div>

        <div class = "container py-3">
                <!-- Update number of hospital beds -->
                <h2>UPDATE HOSPITAL BEDS</h2>
                        <form action = "" method = "post">
                        <div class = "form-row row">
                                <div class = "col form-group">
                                        <label>Hospital selection:</label>
                                        <select class = "form-control" name = "updateBed" id = "updateBed" required>
                                        <option value = "" selected disabled hidden>Select a hospital</option>
                                        <?php
                                                include "hospCode.php";
                                        ?>
                                        </select>
                                </div>
                                <div class = "col form-group">
                                        <label>Number of beds:</label>
                                        <input class = "form-control" type = "number" min = "0"  name = "newCount" value = "" required/>
                                </div>
                        </div>
                <br>
                <button class = "btn btn-outline-secondary" type = "submit">Update Bed Count</button>
                </form>
                <?php
                        if(isset($_POST["newCount"])) {
                                include "updateBed.php";
                        }
                ?>
                </br>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>


    <header class="p-5"><h2>Contact Form</h2></header>
    <a class='p-5' href="contactTable.php" target="_blank">View saved contacts.</a>
    <section class="row">
        <form name="contactForm" class="p-5 col-sm-6" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <article class="form-group">
                <label class="font-weight-bold" for="fname">First Name:</label>
                <input class="form-control" type="text" name="fname" id="fname" value="<?php echo $_SESSION["firstName"]; unset($_SESSION["firstName"]);?>">
                <p></p>
            </article>
            <article class="form-group">
                <label class="font-weight-bold" for="lname">Last Name:</label>
                <input class="form-control" type="text" name="lname" id="lname" value="<?php echo $_SESSION["lastName"]; unset($_SESSION["lastName"]);?>">
            </article> 
            <article class="form-group">
                <label class="font-weight-bold" for="email">Email Address:</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php echo $_SESSION["email"];unset($_SESSION["email"]);?>">
            </article> 
            <article class="form-group">
                <label class="font-weight-bold" for="telephone">Telephone Number:</label>
                <input class="form-control" type="number" name="telephone" id="telephone" value="<?php echo $_SESSION["telephone"]; unset( $_SESSION["telephone"]);?>">
            </article>
            <article class="form-group">
                <label class="font-weight-bold" for="address">Home Address:</label>
                <textarea class="form-control" name="address" id="address" cols="30" rows="10" value="<?php echo $_SESSION["address"]; unset($_SESSION["address"]);?>"></textarea>
            </article>
            <label class="font-weight-bold" for="gender">Gender:</label>
            <article class="form-check">
                <label class="form-check-label"><input class="form-check-input" type="radio" name="gender" value="male" id="">Male</label>
            </article>
            <article class="form-check">
                <label class="form-check-label pb-3"><input class="form-check-input" type="radio" name="gender" value="female" id="">Female</label>
            </article>
            <article class="form-group">
                <label class="font-weight-bold" for="birthdate">Date of Birth:</label>
                <input class="form-control" type="date" name="birthdate" id="birthdate" value="<?php echo $_SESSION["birthdate"]; unset($_SESSION["birthdate"]);?>">
            </article>

            <button class="btn btn-success mr-2" id="saveButton" type="submit" onclick="saveContact()">Save</button>
            <button class="btn btn-warning" type="reset" name="resetButton" onclick="resetForm()">Clear form</button>
        </form>
    </section>
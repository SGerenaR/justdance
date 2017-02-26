<form name="registration" method="post" action="registrationHandler.php">
    <div>
        <?php echo $alert; ?>
    </div>
    <br>
    
    <div class="form-group">
        <label for="PutName">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="User Name">
    </div>
    
    <div class="form-group">
        <label for="PutSurname">Surname</label>
        <input type="text" class="form-control" id="surname" name="surname" placeholder="User Surname">
    </div>
    
    <div class="form-group">
        <label for="PutAddress">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="User Address">
    </div>
    
    <div class="form-group">
        <label for="PutPhoneNumber">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="User Phone Number">
    </div>
    
    <div class="form-group">
        <label for="PutUsername">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>
    
     <div class="form-group">
        <label for="PutPassword">Password</label>
        <input type="password" class="form-control" name="password" id="password" value="">
    </div>
    
    <div class="form-group">
        <label for="PutConfirmPassword">Confirm Password</label>
        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" value="">
    </div>
    
    <br>
    <div>
        <input type="submit" class="btn btn-primary" style="width: 150px" value="Create New User">
        <input type="button" id="registrationCancel" class="btn btn-primary" style="width: 100px" value="Cancel">
    </div>
</form>

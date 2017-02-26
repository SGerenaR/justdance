<?php
    require_once ("objects/User.php");
    $id = $_SESSION["sipoz_user_id"];
    if (!empty($id)) {
        $id = array($id);
        $User = User::loadArray($id);
        $User = $User[0];
    }
?>
<form name="userdetails" method="post" action="myAccountUpdate.php">
    <div class="form-group">
        <label for="PutUserName">User Name</label>
        <input type="text" class="form-control" id="username" disabled="" name="username" placeholder="Username ..... " value=<?php if (!empty($id)) { echo $User->getUserName(); }?>>
    </div>
    <br>
    <div>
        <label for="PutUserName">First Name</label>
        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name ..... " value="<?php if (!empty($id)) { echo $User->getFirstName(); }?>">
    </div>
    <br>
    <div>
        <label for="PutUserName">Last Name</label>
        <input type="text" class="form-control" name="lastname" id="lastname" value="<?php if (!empty($id)) { echo $User->getLastName(); }?>">
    </div>
    <br>
    <?php if (!empty($alert)) { ?>
        <div class="<?php echo $class; ?>"><?php echo $alert; ?></div>
    <?php } ?>
    <br>
    <div>
        <label for="PutUserName">Password</label>
        <input type="password" class="form-control" name="password" id="password" value="">
    </div>
    <br>
    <div>
        <label>Confirm Password</label>
        <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" value="">
    </div>
    <br>
    <div>
        <input type="hidden" id="user_id" name="user_id" value="<?php if (!empty($id)) { echo $User->getId(); } ?>">
    </div>
    <br>
    <div>
        <input type="submit" class="btn btn-primary" style="width: 250px" value="Update">
    </div>
</form>

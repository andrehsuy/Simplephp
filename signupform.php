<form id="sign_up_form" action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validate(event)" method="post">
<input type="text" name="firstname" placeholder="First Name"><br>
<input type="text" name="lastname" placeholder="Last Name"><br>
<input type="text" name="email" placeholder="Email"><br>
<input type="password" name="password1" placeholder="New Password"><br>
<input type="password" name="password2" placeholder="Re-enter"><br>
<input type="time" name="birthday" placeholder="Birthday"><br>
<input type="submit" name="submit">
</form>
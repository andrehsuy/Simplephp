<form id="sign_up_form" action="<?php echo $_SERVER['PHP_SELF'] ?>" onsubmit="return validate(event)" method="post">

    <input type="text" name="firstname" placeholder="First Name">
    <br>
    <input type="text" name="lastname" placeholder="Last Name">
    <br>
    <input type="text" name="email" placeholder="Email">
    <br>
    <input type="password" name="password1" placeholder="New Password">
    <br>
    <input type="password" name="password2" placeholder="Re-enter">
    <br>

    Birthday
    <br>
    <select id="daydropdown" name="daydropdown"> </select>
    <select id="monthdropdown" name="monthdropdown"> </select>
    <select id="yeardropdown" name="yeardropdown"></select><br>

    <script type="text/javascript">
        window.onload=function()
        {
            populatedropdown("daydropdown", "monthdropdown", "yeardropdown")
        }
    </script>

    <input type="submit" name="submit">

</form>



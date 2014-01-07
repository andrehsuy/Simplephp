<?php
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Text to send if user hits Cancel button';
        exit;
    } else {
        echo "<p>Hello {$_SERVER['PHP_AUTH_USER']}.</p>";
        echo "<p>You entered {$_SERVER['PHP_AUTH_PW']} as your password.</p>";
    }
    ?>

<form id="login" action="link.php" method="post">

<input type="text" name="userid" placeholder="Username">
<br>
<input type="password" name="password" placeholder="Password">
<br>
<input type="submit" name="submit">
<br>
<a href="welcome.php"> Not a member yet? </a>

</form>

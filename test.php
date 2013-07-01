<?php
    
    require_once "Mail.php";
    
    $from = "Andre Hsu <andrehsugod@gmail.com>";
    $to = "Andre Hsu <andrehsugod@ucla.edu>";
    $subject = "Hi!";
    $body = "Hi,\n\nHow are you?";
    
    $host = "smtp.gmail.com";
    $port = 587; 
    $username = "andrehsugod@gmail.com";
    $password = "Aa1992915";
    
    $headers = array ('From' => $from,
                      'To' => $to,
                      'Subject' => $subject);
    $smtp = Mail::factory('smtp',
                          array ('host' => $host,
                                 'port' => $port,
                                 'auth' => true,
                                 'username' => $username,
                                 'password' => $password));
    
    $mail = $smtp->send($to, $headers, $body);
    
    if (PEAR::isError($mail)) {
        echo("<p>" . $mail->getMessage() . "</p>");
    } else {
        echo("<p>Message successfully sent!</p>");
    }
?>
<?php

    //$targetemail = 'your_em@il.com';
    $targetemail = 'hr.piggy@hotmail.com';
    
    $name = $_POST['inputFullname'];

    $email = $_POST['inputEmail'];

    $phone = $_POST['inputPhone'];

    $message = $_POST['inputMessage'];


    $num1 = isset($_POST['num1']) ? $_POST['num1'] : "";
    $num2 = isset($_POST['num2']) ? $_POST['num2'] : "";
    $total = isset($_POST['captcha']) ? $_POST['captcha'] : "";

    $captcha_error = captcha_validation($num1, $num2, $total);

    if (is_null($captcha_error)) { 
        $fullmessage = 'Name : ' . $name . '<br />' .

        'Email : ' . $email . '<br />' .

        'Phone : ' . $phone . '<br />' .

        'Message : ' . $message . '<br />';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
        // More headers
        $headers .= 'From: <' . $email . '>' . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

        //send email
        mail($targetemail, "Contact from " .$email, $fullmessage, $headers);
    }

    function captcha_validation($num1, $num2, $total) {
            global $error;
            //Captcha check - $num1 + $num = $total
            if( intval($num1) + intval($num2) == intval($total) ) {
                    $error = null;
            }
            else {
                    $error = "Captcha value is wrong.";
            }
            return $error;
    }
 
?>
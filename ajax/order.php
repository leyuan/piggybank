<?php
    //  user info
    $country = $_POST["billing_country"];
    $firstname = $_POST["billing_first_name"];
    $lastname = $_POST["billing_last_name"];
    $address = $_POST["billing_address_1"];
    $postcode = $_POST["billing_postcode"];
    $city  = $_POST["billing_city"];
    $email  = $_POST["billing_email"];
    $phone  = $_POST["billing_phone"];
    $comments  = $_POST["order_comments"];
    // user order
    $quantity = $_POST["billing_form_quantity"];
    $amount = $_POST["billing_form_amount"];
    
    // connect to db
    $con=mysqli_connect("localhost:3306","root","9eyu20","piggy_bank");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $part_sql = "'".$country."','".$firstname."','".$lastname."','".$address."',"
            . "'".$postcode."','".$city."','".$email."','".$phone."',"
            . "'".$comments."','".$quantity."','".$amount."'";
    $sql = "insert into user_order(country,firstname,lastname,address,postcode,"
            . "city,email,phone,comments,quantity,amount)"
            . "values(".$part_sql.")";
    
   if   ($result = $con->query($sql)) {
       echo "Thanks for ordering, your card will be delivered soon!";
   } else {
       echo "Oops, something is wrong, please <a> contact the webmaster </a>";
   }
    //echo $sql."<br>";
    //echo $quantity."<br>".$amount;
    mysqli_close($con);
    

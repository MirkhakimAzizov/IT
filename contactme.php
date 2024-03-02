<?php   
    require("./mailing/mailfunction.php");

    $name = $_POST["name"];
    $phone = $_POST['phone'];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $body = "<ul><li>Name: ".$name."</li><li>Phone: ".$phone."</li><li>Email: ".$email."</li><li>Message: ".$message."</li></ul>";

    $status = mailfunction("sadobooks@gmail.com", "Company", $body); //reciever
    if($status)
        echo '<center><h1>Rahmat! Tez orada siz bilan bog\'lanamiz.</h1></center>';
    else
        echo '<center><h1>Xabar yuborishda xatolik yuz berdi! Iltimos, yana bir bor urinib ko\'ring.</h1></center>';    
?>

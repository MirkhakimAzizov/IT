<?php   
    require("./mailing/mailfunction.php");

    $name = $_POST["name"];
    $phone = $_POST['phone'];
    $email = $_POST["email"];
    $applyfor = $_POST["status"];
    $experience = $_POST["experience"];
    $otherdetails = $_POST["details"];

    $filename = $_FILES["fileToUpload"]["name"];
	$filetype = $_FILES["fileToUpload"]["type"];
	$filesize = $_FILES["fileToUpload"]["size"];
	$tempfile = $_FILES["fileToUpload"]["tmp_name"];
	$filenameWithDirectory = "".$name.".pdf";  //give path of tmp-uploads folder(available in this project folder) with slash(/ or \ as per your path) at end of path

    $body = "<ul><li>Name: ".$name."</li><li>Phone: ".$phone."</li><li>Email: ".$email."</li><li>Apply For: ".$applyfor."</li><li>Experience: ".$experience." Yrs.</li><li>Resume(Attached Below):</li></ul>";
	if(move_uploaded_file($tempfile, $filenameWithDirectory))
	{
		$status = mailfunction("sadobooks@gmail.com", "Company", $body, $filenameWithDirectory); //reciever
        if($status)
            echo '<center><h1>Xabar yuborganigiz uchun rahmat, tez orada siz bilan bog\'lanamiz.</h1></center>';
        else
            echo '<center><h1>Xabar yuborishda xatolik yuz berdi! Iltimos, yana bir bor urinib ko\'ring.</h1></center>';
	}
	else 
	{
		echo "<center><h1>Faylni yuklashda xatolik yuz berdi! Iltimos, yana bir bor urinib ko'ring.</h1></center>";
	}

?>

<?php
$params= array(
            "email" => 'teamlead@a1professionals.com',
           "password" => '123456'
        );
        $postData = '';
        foreach($params as $k => $v) 
        { 
          $postData .= $v.'&'; 
        }
        rtrim($postData, '&');
//echo $postData = "First line of text\nSecond line of text";

$url = "http://srv1.a1professionals.net/dentalMail/otpemail.php";
			$ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, false); 
            curl_setopt($ch, CURLOPT_POST, $postData);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            $output=curl_exec($ch);
			if (curl_errno($ch)) {
            echo $error_msg = curl_error($ch);

}
/*


// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("lucaroman45@gmail.com","My subject",$msg);
//mail("teamlead@a1professionals.com","My subject",$msg);
echo "Good..!! you see this message means the page loaded success.";
echo "This url for test the email function. If email server run you receive email on lucaroman45@gmail.com address.";
*/
?>
<?php
    //Message vars
    $msg = "";
    $msgClass=""; //For Bootstrap / Tailwind css classes

    //Check for post method and the submit button
    if(filter_has_var(INPUT_POST, 'submit')){
        //Get all Variables from the form
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $subject = htmlspecialchars($_POST['subject']);
        $message = htmlspecialchars($_POST['message']);

        //Check requrie field
        if(!empty($name) && !empty($email) && !empty($subject) && !empty($message)){
            //All field are not empty
            if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                //Failed
                $msg = "Please validate your email";
               // $msgClass = "alert-danger";
            }else{
                //E-Mail is valid
                $toEMail = "YOUR_EMAIL@gmail.com";

                $subject = "Contact Request from " . $name; 

                $body = "<h2>Contact Request</h2>";
                $body .= "<h4>Name</h4><p> . $name . </p>";
                $body .= "<h4>Email</h4><p> . $email . </p>";
                $body .= "<h4>Subject</h4><p> . $subject . </p>";
                $body .= "<h4>Mesage</h4><p> . $message . </p>";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: " . $name . "<" . $email . ">" .  "\r\n";

                if(mail($toEMail, $subject, $body, $headers)){
                    $msg = "Your email has been sent";
                   // $msgClass = "alert-succes";
                    header("Location: index.php?mailsend");
                }else{
                    $msg = "Your email was not sent";
                  //  $msgClass = "alert-danger";
                    header("Location: index.php?mailNotSend");
                }
            }   
        }else{
            $msg = "All field are required";
           // $msgClass = "alert-danger";
        }
    }
?>
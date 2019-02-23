<?php
    if(isset($_POST['email'])) {
        $email_to = "mail.thebinarystudio@gmail.com";
        $email_from = "studiothebinary@gmail.com";
        $password = '9415283587';
        $email_subject = "Query - The Binary Studio";

        function clean_string($string) {
            $bad = array("content-type","bcc:","to:","cc:","href");
            return str_replace($bad,"",$string);
        }

        $name = $_POST['name']; // required
        $email = $_POST['email']; // required
        $telephone = $_POST['ph_no']; // not required
        $query = $_POST['query']; // required

        $email_message= "Hi Prashant, "."\n\n";
        $email_message .= "You got a new query!, "."\n\n";

        $email_message .= "First Name: ".clean_string($name)."\n";
        $email_message .= "Email: ".clean_string($email)."\n";
        $email_message .= "Telephone: ".clean_string($telephone)."\n";
        $email_message .= "Comments: ".clean_string($query)."\n\n";

        $email_message .= "Regards, "."\n";
        $email_message .= "The Binary Studio, "."\n\n";

        //import PHPMailerAutoload.php file which located inside phpmailer folder
        require 'phpmailer/PHPMailerAutoload.php';

        // create object of class PHPMailer
        $mail = new PHPMailer;
        // print client server communication output if we don't want to print it we can use 3
        $mail->SMTPDebug = 0;  
        // Set mailer to use SMTP
        $mail->isSMTP(); 
        // Specify main and backup SMTP servers 
        $mail->Host = 'smtp.gmail.com';
        // Enable SMTP authentication
        $mail->SMTPAuth = true;
        // SMTP username mainly it is sender gmail replace 'studiothebinary@gmail.com' with your gmail   
        $mail->Username = $email_from;
        // SMTP password it is your gmail password
        $mail->Password = $password;
        // Enable TLS encryption, `ssl` also accepted
        $mail->SMTPSecure = 'tls';  
        // TCP port to connect to 
        $mail->Port = 587;
        // set from it show in from of your mail 
        $mail->setFrom($email_from, 'The Binary Studio');        
        $mail->addReplyTo($email_from, 'no-reply');
        $mail->Subject = $email_subject;
        $mail->Body    = $email_message;
        $mail->addAddress($email_to);

        /* finally send email if email send is success then print 'Message has been sent'
        if not then print 'Message could not be sent'
        */
        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }  
        else  
        {
            echo 'success';
            
        }
    }
    ?>
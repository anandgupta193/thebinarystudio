<footer class="footer">
        <!-- Links -->
        <div class="footer-seperator">
            <div class="content-lg container">
                <div class="row">
                    <div class="col-sm-2 sm-margin-b-50">
                        <!-- List -->
                        <ul class="list-unstyled footer-list">
                            <li class="footer-list-item"><a class="footer-list-link" href="index.php">Home</a></li>
                            <li class="footer-list-item"><a class="footer-list-link" href="about.php">About</a></li>
                            <li class="footer-list-item"><a class="footer-list-link" href="services.php">Services</a></li>
                            <li class="footer-list-item"><a class="footer-list-link" href="projects.php">Projects</a></li>
                            <li class="footer-list-item"><a class="footer-list-link" href="contact.php">Contact</a></li>
                            <!-- <li class="footer-list-item"><a class="footer-list-link" href="#">Careers</a></li>
                            <li class="footer-list-item"><a class="footer-list-link" href="#">Contact</a></li>
                            <li class="footer-list-item"><a class="footer-list-link" href="#">Terms</a></li> -->
                        </ul>
                        <!-- End List -->
                    </div>
                    <div class="col-sm-4 sm-margin-b-30">
                        <!-- List -->
                        <ul class="list-unstyled footer-list">
                            <!-- <li class="footer-list-item"><a class="footer-list-link" href="#">Twitter</a></li> -->
                            <li class="footer-list-item"><a class="footer-list-link" href="https://www.facebook.com/thebinarystudio/">Facebook</a></li>
                            <li class="footer-list-item"><a class="footer-list-link" href="https://www.instagram.com/the_binary_studio/">Instagram</a></li>
                            <li class="footer-list-item"><a class="footer-list-link" href="#">LinkedIn</a></li>
                        </ul>
                        <!-- End List -->
                    </div>
                    <div class="col-sm-5 sm-margin-b-30">
                        <h2 class="color-white">Send Us A Query</h2>
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <input type="text" name="name" maxlength="50" class="form-control footer-input margin-b-20" placeholder="Enter your name" required>
                            <input type="email" maxlength="80" name="email" class="form-control footer-input margin-b-20" placeholder="Enter your email" required>
                            <input type="number" maxlength="10" name="ph_no" class="form-control footer-input margin-b-20" placeholder="Enter your phone number" required>
                            <textarea name="query" maxlength="250" class="form-control footer-input margin-b-30" rows="6" placeholder="Ask a query" required></textarea>
                            <button type="submit" class="btn-theme btn-theme-sm btn-base-bg text-uppercase">Submit</button>
                        </form>
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End Links -->

        <!-- Copyright -->
        <div class="content container">
            <div class="row">
                <div class="col-xs-6">
                    <img class="footer-logo" src="img/logo.png" alt="the binary studio Logo">
                </div>
                <div class="col-xs-6 text-right">
                    <p class="margin-b-0"><a class="color-base fweight-700" href="index.php">the
                            binary studio</a></p>
                </div>
            </div>
            <!--// end row -->
        </div>
        <!-- End Copyright -->
    </footer>

    <?php
    
    error_reporting(-1);
    ini_set('display_errors', 'On');
    set_error_handler("var_dump");

    if(isset($_POST['email'])) {
        $email_to = "mail.thebinarystudio@gmail.com";
        $email_subject = "Query - The Binary Studio";

//         if(isset($_POST['name']) ||
//         isset($_POST['email']) ||
//         isset($_POST['ph_no']) ||
//         isset($_POST['query'])) {
//         die();     
//         }

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
        $email_message .= "Comments: ".clean_string($query)."\n";

        $email_message .= "Regards, "."\n";
        $email_message .= "The Binary Studio, "."\n\n";

        // create email headers
        $headers = 'From: '.$email."\r\n".
        'Reply-To: '.$email."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        $response = @mail($email_to, $email_subject, $email_message, $headers);
        if($response == true) {
            echo "Message sent successfully...";
        } else {
            echo "Message could not be sent...";
        }

    }

    ?>
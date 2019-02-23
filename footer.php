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
                            <li class="footer-list-item"><a class="footer-list-link" href="https://www.linkedin.com/company/the-binary-studio/about/">LinkedIn</a></li>
                        </ul>
                        <!-- End List -->
                    </div>
                    <div id="contact-form" class="col-sm-5 sm-margin-b-30">
                        <h2 class="color-white">Send Us A Query</h2>
                        <form method="POST" onsubmit="sendEmail(event)">
                            <input type="text" name="name" maxlength="50" class="form-control footer-input margin-b-20" placeholder="Enter your name" required>
                            <input type="email" maxlength="80" name="email" class="form-control footer-input margin-b-20" placeholder="Enter your email" required>
                            <input type="number" minlength="10" name="ph_no" class="form-control footer-input margin-b-20" placeholder="Enter your phone number" required>
                            <textarea name="query" maxlength="250" class="form-control footer-input margin-b-30" rows="6" placeholder="Ask a query" required></textarea>
                            <button id="load" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending Email" type="submit" class="btn-theme btn-theme-sm btn-base-bg text-uppercase">Submit</button>
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

    <script>
    function sendEmail(e) {
        e.preventDefault();
        $('#load').button('loading');
        $.ajax({
            url: 'sendEmail.php',
            type: 'POST',
            data: {
                name: e.target.name.value,
                email: e.target.email.value,
                ph_no: e.target.ph_no.value,
                query: e.target.query.value
            },
            success: function(resp) {
                $('#load').button('reset');
                if(resp === 'success'){
                    document.getElementById("contact-form").innerHTML = "<h2 style=\"color: #cbd3e1;\">Thank you for contacting us.</h2><h5 style=\"color: #cbd3e1;\">Our team will get back to you shortly.</h5>";
                } else {
                    alert('Error Occured, Please try again after some time.');
                }
            }
        }); 
    }
    </script>
<?php include('header.php'); ?>

<body id="login">
    <div class="container">
        <div class="row-fluid">
            <div class="span6">
                <div class="title_index">
                    <?php include('title_index.php'); ?>
                </div>
            </div>
            <div class="span6">
                <div class="pull-right">
                    <form id="reset_password" class="form-signin" method="post">
                        <h3 class="form-signin-heading"><i class="icon-lock"></i>Enter New Password</h3>
                        <input type="password" class="input-block-level" id="password" name="password" placeholder="New Password" required>
                        <input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                        <button id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i>Reset</button>
                    </form>



                    <script>
                        jQuery(document).ready(function() {
                            jQuery("#reset_password").submit(function(e) {
                                e.preventDefault();

                                var password = jQuery('#password').val();
                                var cpassword = jQuery('#cpassword').val();


                                if (password == cpassword) {
                                    var formData = jQuery(this).serialize();
                                    $.ajax({
                                        type: "POST",
                                        url: "reset_password.php",
                                        data: formData,
                                        success: function(html) {
                                            if (html == 'true') {
                                                $.jGrowl("Password Changed Successfully", {
                                                    header: 'Reset Success'
                                                });
                                                var delay = 2000;
                                                setTimeout(function() {
                                                    window.location = 'index.php'
                                                }, delay);
                                            } else if (html == 'false') {
                                                $.jGrowl("Password not valid", {
                                                    header: 'Reset Failed'
                                                });
                                            }
                                        }


                                    });

                                } else {
                                    $.jGrowl("Password not matched", {
                                        header: 'Try Again'
                                    });
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="index-footer">
                    <?php include('link.php'); ?>
                </div>
            </div>
        </div>
        <!-- /container -->
        <?php include('footer.php'); ?>
    </div> <!-- /container -->
    <?php include('script.php'); ?>
</body>

</html>
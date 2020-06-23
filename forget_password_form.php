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
                    <form id="forgot_password" class="form-signin" method="post">
                        <h3 class="form-signin-heading"><i class="icon-lock"></i>Enter Info To Reset Password</h3>
                        <input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
                        <input type="text" class="input-block-level" id="fname" name="fname" placeholder="First Name" required>
                        <input type="text" class="input-block-level" id="lname" name="lname" placeholder="Last Name" required>
                        <input type="text" class="input-block-level" id="question1" name="question1" placeholder="What is your pet name?" required>
                        <input type="text" class="input-block-level" id="question2" name="question2" placeholder="What is your  nickname?" required>
                        <button id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i>Reset</button>
                    </form>



                    <script>
                        jQuery(document).ready(function() {
                            jQuery("#forgot_password").submit(function(e) {
                                e.preventDefault();

                                    var formData = jQuery(this).serialize();
                                    $.ajax({
                                        type: "POST",
                                        url: "forget_password_check.php",
                                        data: formData,
                                        success: function(html) {
                                            if (html == 'true') {
                                                $.jGrowl("Welcome to HLMS Learning Management System", {
                                                    header: 'Resetting'
                                                });
                                                var delay = 2000;
                                                setTimeout(function() {
                                                    window.location = 'reset_password_form.php'
                                                }, delay);
                                            } else if (html == 'false') {
                                                $.jGrowl("student does not found in the database Please Sure to Check Your ID Number or Firstname, Lastname and the Section You Belong. ", {
                                                    header: 'Reset Failed'
                                                });
                                            }
                                        }


                                    });
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
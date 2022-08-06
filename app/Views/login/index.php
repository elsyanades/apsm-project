<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Login Page | APSM System</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?=base_url()?>/template/assets/images/favicon.ico">

    <link href="<?=base_url()?>/template/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>/template/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url()?>/template/assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body>


    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <h3 class="text-center mt-0 m-b-15">
                    Login
                </h3>

                <div class="p-3">
                    <?= form_open('login/cekuser', ['class' => 'formlogin']) ?>
                    <?= csrf_field(); ?>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="text" placeholder="Username" name="username" id="username"
                                autofocus>
                            <div class="invalid-feedback errorUsername">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="password" placeholder="Password" name="password_user" id="password_user">
                            <div class="invalid-feedback errorPassword">
                            </div>
                        </div>
                    </div>


                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-danger btn-block waves-effect waves-light btnlogin" type="submit">Login</button>
                        </div>
                    </div>

                    <?= form_close(); ?>
                </div>

            </div>
        </div>
    </div>



    <!-- jQuery  -->
    <script src="<?=base_url()?>/template/assets/js/jquery.min.js"></script>
    <script src="<?=base_url()?>/template/assets/js/popper.min.js"></script>
    <script src="<?=base_url()?>/template/assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/template/assets/js/modernizr.min.js"></script>
    <script src="<?=base_url()?>/template/assets/js/waves.js"></script>
    <script src="<?=base_url()?>/template/assets/js/jquery.slimscroll.js"></script>
    <script src="<?=base_url()?>/template/assets/js/jquery.nicescroll.js"></script>
    <script src="<?=base_url()?>/template/assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script>
    $(document).ready(function() {
        $('.formlogin').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnlogin').prop('disabled', true);
                    $('.btnlogin').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btnlogin').prop('disabled', false);
                    $('.btnlogin').html('Login');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.username) {
                            $('#username').addClass('is-invalid');
                            $('.errorUsername').html(response.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('.errorUsername').html('');
                        }

                        if (response.error.password_user) {
                            $('#password_user').addClass('is-invalid');
                            $('.errorPassword').html(response.error.password_user);
                        } else {
                            $('#password_user').removeClass('is-invalid');
                            $('.errorPassword').html('');
                        }
                    }

                    if (response.sukses) {
                        window.location = response.sukses.link;
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" +
                        thrownError);
                }
            });
            return false;
        });
    });
    </script>
</body>

</html>
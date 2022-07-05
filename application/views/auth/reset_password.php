<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $judul; ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url('assets2'); ?>/images/logo.png">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets3') ?>/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets3') ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets3') ?>/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets3') ?>/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets3') ?>/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets3') ?>/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets3') ?>/css/main.css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="post" action="<?= base_url('auth/simpan_password') ?>" class="login100-form validate-form">
                    <span class="login100-form-title">
                        FORM Reset Password
                    </span>
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="wrap-input100">
                        <input type="text" id="username" name="username" value="<?= $usr ?>" hidden readonly />
                        <input type="password" class="input100" placeholder="Password Baru" id="password" name="password" required />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100">
                        <input type="password" class="input100" placeholder="Konfirmasi Password Baru" id="password2" name="password2" required />
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Ubah Password
                        </button>
                    </div>

                    <div class="text-center p-t-136">
                        <span class="txt1">
                        </span>
                        <a class="txt2 change_link" href="<?= base_url('auth/lupa_password'); ?>">
                            <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                            Kembali ke Halaman Sebelumnya
                        </a>
                    </div>
                </form>

                <div class="login100-pic">
                    <img src="<?= base_url('assets3') ?>/images/3.png" alt="IMG">
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="<?= base_url('assets3') ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets3') ?>/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url('assets3') ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets3') ?>/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets3') ?>/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?= base_url('assets3') ?>/js/main.js"></script>

</body>

</html>
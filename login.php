<?php
require('koneksi.php');
session_start();

$error = '';
$validate = '';

if (isset($_SESSION['username'])) {
    header('Location: home1.php');
    exit();
}

if (isset($_POST['submit'])) {
    $username = stripslashes($_POST['username']);
    $username = mysqli_real_escape_string($koneksi, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($koneksi, $password);
    $captcha = $_POST['kodecaptcha'];
    $captchaSession = $_SESSION['captcha'];

    if (!empty(trim($username)) && !empty(trim($password))) {
        if ($captcha == $captchaSession) {
            $query = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($koneksi, $query);
            $rows = mysqli_num_rows($result);

            if ($rows != 0) {
                $hash = mysqli_fetch_assoc($result)['password'];
                if (password_verify($password, $hash)) {
                    $_SESSION['username'] = $username;
                    header('Location: home1.php');
                    exit();
                } else {
                    $error = 'Login User Gagal !!';
                }
            } else {
                $error = 'Username belum terdaftar';
            }
        } else {
            $error = 'Captcha tidak cocok';
        }
    } else {
        $error = 'Data tidak boleh kosong!!';
    }
}
?>

<script>
<?php if(isset($_SESSION['login_success'])) { ?>
alert("Login berhasil!");
<?php unset($_SESSION['login_success']); ?>
<?php } ?>
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
    }

    .container {
        margin-top: 50px;
    }

    .form-container {
        background-color: #fff;
        /* White background for login form */
        border-radius: 10px;
        /* Rounded corners */
        padding: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Box shadow */
    }

    .col-md-6 {
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-primary {
        width: 100%;
    }

    #register-link {
        text-align: center;
    }

    #register-link a {
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s;
    }

    #register-link a:hover {
        color: #0056b3;
    }

    .captcha-container {
        margin-bottom: 10px;
        /* Atur jarak bawah antara gambar captcha dan input teks */
    }
    </style>
</head>

<body>
    <section>
        <section>
            <section>
                <form class="container form-container" action="home1.php" method="POST">
                    <h4 class="text-center font-weight-bold">Sign In</h4>
                    <?php if ($error != '') { ?>
                    <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="InputUsername">Username</label>
                        <input type="text" class="form-control" name="username" id="InputUsername"
                            placeholder="Enter Username">
                    </div>

                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="InputPassword"
                            placeholder="Enter Password">
                        <?php if ($validate != '') { ?>
                        <p class="text-danger"><?= $validate; ?></p>
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="InputCaptcha">Captcha</label>
                        <div class="captcha-container">
                            <img src="captcha.php" alt="Captcha Image">
                        </div>
                        <input type="text" class="form-control" name="kodecaptcha" id="InputCaptcha"
                            placeholder="Enter Captcha">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                    <div class="form-footer mt-2">
                        <p>Don't have an account? <a href="register.php">Register</a></p>
                    </div>
                </form>
            </section>
        </section>
    </section>
</body>


<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: #f8f9fa;
        /* Light grey background */
        padding-top: 50px;
        /* Added padding to align with container */
    }

    h4 {
        margin-bottom: 30px;
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

    .form-group {
        margin-bottom: 20px;
    }

    .btn-primary {
        width: 100%;
    }

    #login-link a {
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s;
    }

    #login-link a:hover {
        color: #0056b3;
    }

    /* Added styles for text-danger */
    .text-danger {
        color: #dc3545;
        font-size: 80%;
        margin-top: 5px;
    }
    </style>
</head>

<body>
    <?php
        require('koneksi.php');
        session_start();

        $error = '';
        $validate = '';
        if(isset($_SESSION['user'])) header('Location: home1.php');
        if(isset($_POST['submit'])) {
            $username = stripslashes($_POST['username']);
            $username = mysqli_real_escape_string($koneksi, $username);
            $name = stripslashes($_POST['name']); // Fix syntax here
            $name = mysqli_real_escape_string($koneksi, $name);
            $email = stripslashes($_POST['email']); // Fix syntax here
            $email = mysqli_real_escape_string($koneksi, $email);
            $password = stripslashes($_POST['password']); // Fix syntax here
            $password = mysqli_real_escape_string($koneksi, $password);
            $repass = stripslashes($_POST['repassword']); // Fix syntax here
            $repass = mysqli_real_escape_string($koneksi, $repass);


            if(!empty(trim($name)) && !empty(trim($username)) && !empty(trim($email)) && !empty(trim($password)) && !empty(trim($repass))) {
                if($password == $repass){
                    if(cek_nama($name, $koneksi) == 0) {
                        $pass = password_hash($password, PASSWORD_DEFAULT);
                        $query = "INSERT INTO users(username, name, email, password) VALUES ('$username', '$name', '$email', '$pass')";
                        $result = mysqli_query($koneksi, $query);

                        if($result) {
                            $_SESSION['registration_success'] = true;
                        } else {
                            $error = 'Register User Gagal !!';
                        }
                    } else {
                        $error = 'Username sudah terdaftar';
                    }
                } else {
                    $validate = 'Password tidak sama!!';
                }
            } else {
                $error = 'Data tidak boleh kosong!!';
            }
        }

        function cek_nama($username, $koneksi) {
            $name = mysqli_real_escape_string($koneksi, $username);
            $query = "SELECT * FROM users WHERE username = '$name'";
            if($result = mysqli_query($koneksi, $query)) return mysqli_num_rows($result);
        }
    ?>
    <script>
    <?php if(isset($_SESSION['registration_success'])) { ?>
    alert("Registrasi berhasil!");
    <?php unset($_SESSION['registration_success']); ?>
    <?php } ?>
    </script>

    <section>
        <section>
            <section>
                <form class="container form-container" action="register.php" method="POST">
                    <h4 class="text-center font-weight-bold">Sign Up</h4>
                    <?php if ($error!= '') { ?>
                    <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                    <?php } ?>


                    <div class="form-group">
                        <label for="InputName">Nama</label>
                        <input type="text" class="form-control" name="name" id="InputName" placeholder="Masukkan Nama">
                    </div>

                    <div class="form-group">
                        <label for="InputEmail">Email</label>
                        <input type="email" class="form-control" name="email" id="InputEmail"
                            placeholder="Masukkan Alamat Email">
                    </div>

                    <div class="form-group">
                        <label for="InputUsername">Username</label>
                        <input type="text" class="form-control" name="username" id="InputUsername"
                            placeholder="Masukkan Username">
                    </div>

                    <div class="form-group">
                        <label for="InputPassword">Password</label>
                        <input type="password" class="form-control" name="password" id="InputPassword"
                            placeholder="Masukkan Password">
                        <?php 
                        if($validate != '') { ?>
                        <p class="text-danger"><?= $validate; ?></p>
                        <?php } ?>

                    </div>

                    <div class="form-group">
                        <label for="InputRepassword">Re-enter Password</label>
                        <input type="password" class="form-control" name="repassword" id="InputRepassword"
                            placeholder="Masukkan Password Kembali">
                        <?php 
                            if($validate != '') { ?>
                        <p class="text-danger"><?= $validate; ?></p>
                        <?php } ?>

                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                    <div>
                        <p>Sudah punya akun? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </section>
        </section>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
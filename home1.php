<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Store</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
    body {
        margin: 0;
        font-family: 'Roboto', sans-serif;
        color: #000;
        background-color: #f2f2f2;
    }

    .container {
        width: 80%;
        margin: 0 auto;
    }

    header {
        background: #333;
        color: #fff;
        padding: 10px 0;
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo h1 {
        margin: 0;
        font-size: 24px;
    }

    .menu ul {
        list-style: none;
        display: flex;
        justify-content: space-between;
        /* Memberikan ruang di antara Home dan Pembelian */
    }

    .menu ul li {
        margin-right: 100px;
    }

    .menu ul li a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    .menu ul li a:hover {
        color: #ccc;
    }

    .user-actions {
        display: flex;
        align-items: center;
    }

    .btn-logout {
        background-color: red;
        color: #fff;
        padding: 8px 16px;
        border-radius: 3px;
        text-decoration: none;
        transition: background-color 0.3s ease-in-out;
        margin-right: 20px;
    }

    .btn-logout {
        margin-right: 0;
    }

    .btn-logout:hover {
        background-color: #0056b3;
    }


    .welcome {
        background-image: url('https://cdn.acehtrend.com/files/images/wp-jualan-online-@keeppack-com.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        text-align: center;
        color: #fff;
        /* Mengurangi padding agar gambar tidak terpotong */
        padding: 100px;
        /* Menambahkan min-height agar gambar latar belakang terlihat sepenuhnya */
        min-height: 400px;
    }

    .welcome-content {
        max-width: 600px;
        margin: 0 auto;
    }

    .welcome h2 {
        font-size: 48px;
        margin-bottom: 20px;
    }

    .welcome p {
        font-size: 18px;
        margin-bottom: 30px;
    }

    .btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        transition: background-color 0.3s ease-in-out;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .products {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 50px;
        flex-wrap: wrap;
    }

    .product-row {
        width: 80%;
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .product-card {
        width: 200px;
        text-align: center;
        margin: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        width: 100%;
        height: auto;
    }

    .product-card h2 {
        font-size: 24px;
        margin: 10px 0;
        text-align: center;
    }

    .description {
        color: #666;
        margin-bottom: 15px;
        text-align: center;
    }

    footer {
        background: #333;
        color: #fff;
        text-align: center;
        padding: 15px 0;
        margin-top: 100px;
    }
    </style>
</head>

<body>
    <header style="background-color: #007bff;">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <h1 style="color: #fff;">My Store</h1>
                </div>
                <div class="user-actions">
                    <div class="menu">
                        <ul>
                            <li><a href="home1.php" style="color: #fff; text-decoration: none;">Home</a></li>
                            <li><a href="index.php" style="color: #fff; text-decoration: none;">List Pembelian</a></li>
                        </ul>
                    </div>
                    <div class="user-auth">
                        <a href="logout.php" class="btn-logout" style="color: #fff; text-decoration: none;">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section class="welcome">
            <div class="container welcome-content">
                <h2 style="color: #000;">Welcome to My Store</h2>
                <p style="color: #000;">Find a variety of interesting and quality products in our online store.</p>
                <a href="index.php" class="btn">Lihat Tabel Pembelian</a>
            </div>
        </section>

        <div class="container">
            <section class="products">
                <div class="product-row">
                    <div class="product-card">
                        <img src="https://www.asus.com/media/Odin/Websites/global/ProductLine/20200824120814.jpg"
                            alt="Product Image">
                        <h2 style="text-align: center">Laptop ROG</h2>
                        <p class="description" style="text-align: center">Laptop Mahal dan bagus</p>
                    </div>

                    <div class=" product-card">
                        <img src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2022/2/20/a9b399df-9f0a-484c-8b53-adea25ddd513.jpg"
                            alt="Phone Image">
                        <h2 style="text-align: center">Handphone ROG</h2>
                        <p class="description" style="text-align: center">Handphone Keren</p>
                    </div>

                    <div class="product-card">
                        <img src="https://down-id.img.susercontent.com/file/5c5c7c1dc11c78d433a3f30742aef016"
                            alt="Tablet Image">
                        <h2 style="text-align: center">Tablet</h2>
                        <p class="description" style="text-align: center">Tablet Mewah</p>
                    </div>

                    <div class="product-card">
                        <img src="https://buku.laditrikarya.com/wp-content/uploads/2020/05/feed-web-Sajak-Rindu-.jpg"
                            alt="Tablet Image">
                        <h2 style="text-align: center">Buku Puisi</h2>
                        <p class="description" style="text-align: center">Sajak Rindu untuk Biru</p>
                    </div>
                </div>

                <div class="product-row">
                    <div class="product-card">
                        <img src="https://www.asus.com/media/Odin/Websites/global/ProductLine/20200824120814.jpg"
                            alt="Product Image">
                        <h2 style="text-align: center">Laptop ROG</h2>
                        <p class="description" style="text-align: center">Laptop Mahal dan bagus</p>
                    </div>

                    <div class=" product-card">
                        <img src="https://images.tokopedia.net/img/cache/500-square/VqbcmM/2022/2/20/a9b399df-9f0a-484c-8b53-adea25ddd513.jpg"
                            alt="Phone Image">
                        <h2 style="text-align: center">Handphone ROG</h2>
                        <p class="description" style="text-align: center">Handphone Keren</p>
                    </div>

                    <div class="product-card">
                        <img src="https://down-id.img.susercontent.com/file/5c5c7c1dc11c78d433a3f30742aef016"
                            alt="Tablet Image">
                        <h2 style="text-align: center">Tablet</h2>
                        <p class="description" style="text-align: center">Tablet Mewah</p>
                    </div>

                    <div class="product-card">
                        <img src="https://buku.laditrikarya.com/wp-content/uploads/2020/05/feed-web-Sajak-Rindu-.jpg"
                            alt="Tablet Image">
                        <h2 style="text-align: center">Buku Puisi</h2>
                        <p class="description" style="text-align: center">Sajak Rindu untuk Biru</p>
                    </div>
                </div>
            </section>
        </div>
    </main>


    <footer>
        <div class="container">
            <p>&copy; 2023 My Store. All Rights Rizq.</p>
        </div>
    </footer>
</body>

</html>
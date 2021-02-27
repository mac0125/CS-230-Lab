<?php
require 'includes/header.php';
?>

<main>
    <link rel="stylesheet" href="css/login.css">
    <div class="bg-cover">
        <div class="container">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="images/wvTitle.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/fatwsTitle.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="images/bwTitle.jpg" alt="Third slide">
                    </div>
                </div>
            </div>
        </div>
        <div class="h-40 center-me">
            <div class="my-auto">
                <form class="form-signin" action='includes/login-helper.php' method='post'>

                    <h1 class="h3 mb-3 font-weight-normal">Login</h1>

                    <input type="text" class="form-control" name="uname-email" placeholder="Username/Email" required
                        autofocus>

                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>

                    <button class="btn btn-lg btn-outline-danger btn-block" name="login-submit" type="submit">Sign
                        In</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2021</p>

                </form>
            </div>
        </div>
    </div>
</main>
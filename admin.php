<?php
    session_start();
require 'includes/header.php';
require 'includes/dbhandler.php';
?>

<main>
    <link rel="stylesheet" href="css/admin.css">

    <script>
    funciton triggered() {
        document.querySelector("#gallery-image").click();
    }
    funciton preview(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#gallery-display').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
    </script>

    <?php
    if(isset($_SESSION['uid'])){
    ?>

    <div class="h-50 center-me text-center">
        <div class="my-auto">
            <form action="includes/gallery-helper.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <img src="images/adminDefault.jpeg" alt="profile pic" onclick="triggered();" id="gallery-display">

                    <label for="gallery-image" id="annoying-fix">Click To Load Picture</label>
                    <input type="text" name="title" class="form-control" placeholder="Title">
                    <input type="file" name="gallery-image" id="gallery-image" onchange="preview(this)" class="form-control" style="display: none;">
                </div>

                <div class="form-group">
                    <textarea name="descript" id="bio" cols="30" rows="10" placeholder="Description" style="text-align: center"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" name="gallery-submit" class="btn btn-outline-success btn-lg btn-block">Upload To Gallery</button>
                </div>
            </form>
        </div>
    </div>

    <?php
    }
?>

</main>
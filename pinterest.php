<?php
include './upload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pinterest</title>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<div>

    <div class="container-fluid" id="DivColor" >
        <br><br>


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div align="center" <title>Photo gallery with ISOTOPE and PHP + HTML</title>
        <br><br>

        <div class="container">
        <div class="row">

<br><br>
            <div id="Text_Align_Left">
                <label for="fileSelect">Filename:</label>
                <input type="file" name="photo" id="fileSelect">
                <input class="btn btn-primary" type="submit" name="submit" value="Upload">


                <div id="Text_Align_Right">
                    <a  class="fa" href="#"><img  src="images/facebook.svg"></a>
                    <a class="fa" href="#"><img   src="images/twitter.svg"></a>
                    <a class="fa" href="#"><img   src="images/instagram.svg"></a>
                    <a class="fa" href="#"><img   src="images/linkedin.svg"></a>
                    <a class="fa" href="#"><img   src="images/medium.svg"></a>
                </div>
            </div>


        </div>
        </div>

    </form>

</div>


</div>
<div class="grid">
    <div class="grid-sizer"></div>
    <div id="timings_demo" class="shadow hover">
    <?php
    echo Load_Images();

    ?>
    </div>



</div>

<script async src="http://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

</body>
</html>

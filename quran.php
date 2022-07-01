<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&family=Prompt:wght@600&display=swap');
.logo{
    font-family: 'Prompt', sans-serif;
    font-size: 30px;
}
/* font-family: 'Noto Naskh Arabic', serif;
font-family: 'Prompt', sans-serif; */
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand text-success logo">Quran</a>
      <a class="btn btn-outline-success">About</a>
  </div>
</nav><br>
    <!-- End Navbar -->
<div class="container">
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/1.png" class="d-block w-100 img-fluid rounded" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/2.png" class="d-block w-100 img-fluid rounded" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/3.png" class="d-block w-100 img-fluid rounded" alt="...">
    </div>
  </div>
</div>
<br>
<p class="text-center logo"> بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</p>
<br>
    <div class="d-grid gap-2">
    <?php for ($i=1; $i < 31; $i++) { ?>
        <a href="http://localhost:3000/alquran-native/juz.php?id=<?php echo $i; ?>" class="btn btn-success btn-lg h-200" type="button" style="padding: 20px 30px;">Juz <?php echo $i; ?></a>
        <?php } ?>
    </div>
</div>

<br>
<!-- Footer -->

<footer class="page-footer font-small text-light bg-success">
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">Made with ☕
    <a class="text-white" href="https://ikyyilham.github.io/"> by Ilham.</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>
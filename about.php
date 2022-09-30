<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
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
body{
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
footer{
    margin-top: auto;
}
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand text-success logo">Quran</a>
      <a href="http://holy-quran.epizy.com/quran.php" class="btn btn-success">Home</a>
  </div>
</nav><br>

<div class="text-center">
    <h1 class="text-center text-success logo fs-1">Holy Quran</h1>
    <p>language : PHP & JavaScript</p>
    <p>framework : Bootstrap 5</p>
    <p>version : Beta 1.0</p>
    <p>author : Ilham Wahyudin</p>
    <p>api version : <a class="btn btn-success" href="https://fathimah.docs.apiary.io/">Click Me</a></p>
    <p>Social Media : <a class="btn btn-success" href="https://ikyyilham.github.io/"><i class="bi bi-github"></i></a> <a class="btn btn-success" href="https://www.instagram.com/i.kyyyy_/"><i class="bi bi-instagram"></i></a></p>
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
    <script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</body>
</html>
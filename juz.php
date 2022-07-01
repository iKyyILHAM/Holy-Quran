<?php
    if (!empty($_GET['id'])) {
        $url = "http://api.alquran.cloud/v1/juz/". $_GET['id']. "/ar.asad";
        //  Initiate curl
        $ch = curl_init();
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // Set the url
        curl_setopt($ch, CURLOPT_URL,$url);
        // Execute
        $result=curl_exec($ch);
        // Closing
        curl_close($ch);

        // Will dump a beauty json :3
        $data = json_decode($result, true);
        if (!empty($data)&& $data['status'] == "OK") {
        }
    }
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

      <a class="btn btn-outline-success">Home</a>

  </div>
</nav>
    <!-- End Navbar -->
<div class="container">
    <div class="d-grid gap-2">
    <?php foreach ($data['data']['surahs'] as $key => $value)  {?>
        <a href="http://localhost:3000/alquran-native/surah.php?id=<?php echo $value ['number']; ?>" class="btn btn-success btn-lg h-200" type="button" style="padding: 20px 30px;"><p><?php echo $value ['englishName'];?></p>
        <p><?php echo $value ['numberOfAyahs'];?> Ayat</p></a>
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
<script>
    
</script>
</body>
</html>
<?php
$url = "https://api.banghasan.com/quran/format/json/surat";
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
// var_dump ($data);exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holy Quran</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
  <style>
@import url('https://fonts.googleapis.com/css2?family=Amiri&family=Poppins:ital@1&family=Prompt:wght@600&display=swap');


    .logo {
      font-family: 'Prompt', sans-serif;
      font-size: 30px;
    }

    .logo2 {
      font-family: 'Amiri', serif;
      font-size: 30px;
    }

    .data-ayat {
        padding: 20px 30px;
    }

    /* font-family: 'Noto Naskh Arabic', serif;
font-family: 'Prompt', sans-serif; */
  </style>
  
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-success logo">Quran</a>
      <form class="d-flex">
      <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#myModal">Info</button>
      <a href="http://holy-quran.epizy.com/about.php" class="btn btn-outline-success">About</a>
      </form>
    </div>
  </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi Holy Quran</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span>1. Aplikasi Masih Tahap Pengembangan</span><br>
        <span>2. Jika Ada Kesalahan Dalam Penulisan Mohon Memberitahu Author</span><br>
        <span>3. Gunakan Live Search Untuk Mencari Surat Dengan Mudah</span><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<br>
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
<p class="text-center logo2"> بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</p><br>
<div class="mb-3">
  <input type="text" id="search" onkeyup="search(this.value)" class="form-control" placeholder="Cari nama surat atau arti surat">
</div>
<br>

    <div class="d-grid gap-2">
    <?php foreach ($data['hasil'] as $key => $value ){?>
        <a href="http://holy-quran.epizy.com/surah.php?id=<?php echo $value['nomor']; ?>" id="<?php echo $value['nama']; ?> <?php echo $value['arti']; ?>" class="btn btn-success fs-2 btn-lg h-200" type="button" style="padding: 20px 30px;"><?php echo $value['nama']; ?><br><span class="text-start fs-6"><?php echo $value['ayat']; ?> Ayat   |   <?php echo $value['arti']; ?></span></a>
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
<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script>
function search(query){
    var query = query.toLowerCase().replace(" ","");
    var dataAll = document.querySelectorAll(".btn.btn-success.btn-lg.h-200");
    for( let i = 0; i < dataAll.length; i++){
        var data_id = dataAll[i].id.replace(" ","");
        data_id = data_id.toLowerCase();
        if( data_id.indexOf(query) >= 0 || query == "" ){
            dataAll[i].style.display = 'block';
        }else{
            dataAll[i].style.display = 'none';
        }
    }
}
</script>
    <script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</body>
</html>
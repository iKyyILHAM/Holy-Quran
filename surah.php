<?php 
    if (!empty($_GET['id'])) {
        $url = "http://api.alquran.cloud/v1/surah/". $_GET['id']. "/ar.asad";
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
            // print_r ($data['data']['englishName']);
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic&family=Noto+Sans+Arabic&family=Noto+Sans+Indic+Siyaq+Numbers&family=Prompt:wght@600&display=swap');
.logo{
    font-family: 'Prompt', sans-serif;
    font-size: 30px;
}
.arabic-number{
    ont-family: 'NNoto Sans Indic Siyaq Numbers', sans-serif;
}
/* font-family: 'Noto Naskh Arabic', serif;
font-family: 'Prompt', sans-serif; */
</style>

<body style="font-family: 'Noto Sans Arabic', sans-serif;">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-light sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand text-success logo"><?php echo ($data['data']['englishName']); ?></a>
    <a class="btn btn-success" onclick="history.back()">Kembali</a>
  </div>
</nav>
    <!-- End Navbar -->
<div class="container">
<h3></h3>  
    <div class="d-grid gap-2">
    <?php foreach ($data['data']['ayahs'] as $key => $value)  {?>
        <a class="btn btn-success btn-lg h-200" type="button" style="padding: 20px 30px;"><span><?php echo $value ['numberInSurah'];?></span>
        <hr><p class="text-end"><?php echo $value ['text'];?></p></a>
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




<script language="JavaScript" type="text/javascript">


var replaceDigits = function() {
var map =
[
"&\#1632;","&\#1633;","&\#1634;","&\#1635;","&\#1636;",
"&\#1637;","&\#1638;","&\#1639;","&\#1640;","&\#1641;"
]

document.body.innerHTML =
document.body.innerHTML.replace(
/\d(?=[^<>]*(<|$))/g,
function($0) { return map[$0] }
);
}

</script>
<script type="text/javascript">
window.onload = replaceDigits
</script>
</body>
</html>
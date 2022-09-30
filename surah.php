<?php 
    function getAyat($id,$start){
        $jumlah_ayat = $start+10;
        $url = "https://api.banghasan.com/quran/format/json/surat/". $id. "/ayat/".$start."-".$jumlah_ayat;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
        $result=curl_exec($ch);
        curl_close($ch);
        
        $data = json_decode($result, true);
        if ($id > 1  && strstr( $data['ayat']['data']['ar'][0]['teks'], "بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ" ) && $start <= 1 ){
            $data_surah[0] = array(
                "id" => "Dengan menyebut nama Allah Yang Maha Pemurah lagi Maha Penyayang.",
                "ayat" => "-",
                "teks" => "بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ",
                "latin" => "bismi <strong>al</strong>l<u>aa</u>hi <strong>al</strong>rra<u>h</u>m<u>aa</u>ni <strong>al</strong>rra<u>h</u>iim<strong>i</strong><br>"
            );
            $ganti = 1;
        }
       

        foreach($data['ayat']['data']['ar'] as $key => $value ){
            $value['id'] =  $data['ayat']['data']['id'][$key]['teks'];
            $value['latin'] =  $data['ayat']['data']['idt'][$key]['teks'];
            $value['id'] = preg_replace('/{\d+}/', ' ', $value['id']);
            $value['id'] = str_replace("{","",$value['id']);
            $value['id'] = str_replace("{","",$value['id']);
            
            if( @$ganti == 1 ){
                $value['teks'] = str_replace("بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ","",$value['teks']);
            }
            $data_surah[$value['ayat']] = $value;
        }

        $data['ayat']['data']['ar'] = $data_surah;
        return $data;
    }
    if( isset($_GET['api_on']) && isset($_GET['id']) && isset($_GET['start']) ){
        header('Content-type: application/json');
        echo json_encode(getAyat($_GET['id'],$_GET['start'])['ayat']['data']['ar'],1);
        exit;
    }

    if ( isset($_GET['id']) ) {
        $data = getAyat($_GET['id'],1);
        // var_dump ($data);exit;

    }
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surah <?php echo $data['surat']['nama']; ?> </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <style>
@import url('https://fonts.googleapis.com/css2?family=Amiri&family=Poppins:ital@1&family=Prompt:wght@600&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

    .logo {
      font-family: 'Prompt', sans-serif;
      font-size: 30px;
    }

    .data-ayat {
        padding: 20px 30px;
    }

    /* font-family: 'Noto Naskh Arabic', serif;
font-family: 'Prompt', sans-serif; */
  </style>
  <body >
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md bg-light sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand text-success logo">  <?php echo $data['surat']['nama']; ?> </a>
        <a class="btn btn-success" href="http://holy-quran.epizy.com/quran.php">Kembali</a>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container">
        <div class="d-grid gap-2" id="data-bacaan"> 
      
        <?php foreach ($data['ayat']['data']['ar'] as $key => $value)  {?> 
        
        <button class="btn btn-success btn-lg h-200 data-ayat"  type="button">
            <span> <?php echo $value['ayat'];?> </span> <hr>
            <p class="text-end fs-1" style="font-family: 'Roboto', sans-serif;">  <?php echo $value['teks'];?></p> 
            <p class="text-start fs-6" style="font-family: 'Poppins', sans-serif;"><?php echo $value ['latin'];?> </p>
            <p class="text-start fs-6" style="font-family: 'Poppins', sans-serif;"><?php echo $value ['id'];?> </p>
        </button> 
            
        <?php } ?> 
    
        </div>
    </div>
    <br>
    <!-- Footer -->
    <footer class="page-footer font-small text-light bg-success">
      <!-- Copyright -->
      <div class="footer-copyright text-center py-3">Made with ☕ <a class="text-white" href="https://ikyyilham.github.io/"> by Ilham.</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <script language="JavaScript" type="text/javascript">
      var data_json = <?php echo json_encode($data['ayat']['data']['ar'],1);?>;
      console.log(data_json);
      var map = ["&\#1632;", "&\#1633;", "&\#1634;", "&\#1635;", "&\#1636;", "&\#1637;", "&\#1638;", "&\#1639;", "&\#1640;", "&\#1641;"];
      function updateNoArab(no){
          no = no.replace(/\d(?=[^<>]*(<|$))/g, function($0) {
              return map[$0]
          });
          return no;
      }
      function updateArabic()
        {
            document.body.innerHTML = document.body.innerHTML.replace(/\d(?=[^<>]*(<|$))/g, function($0) {
            return map[$0]
            });
        }
       function updateSurah(){
        //    var old = document.getElementById('data-bacaan').innerHTML;
           var new_btn = ""; 
           for( var n = 0; n < data_json.length; n++ ){
               if( data_json[n] !== undefined ){
                new_btn += '<button class="btn btn-success btn-lg h-200 data-ayat" type="button"><span style="font-family: Roboto, sans-serif;"> '+updateNoArab(data_json[n].ayat)+' </span> <hr><p class="text-end fs-1"  style="font-family: Poppins, sans-serif;"> '+data_json[n].teks+'</p> <p class="text-start fs-6" style="font-family: Poppins, sans-serif;">'+data_json[n].latin+' </p><p class="text-start fs-6">'+data_json[n].id+' </p></button>';
               }
           }
           document.getElementById('data-bacaan').innerHTML = new_btn;
       }
       async function httpGet (url) 
        {
            let response = await fetch(url);
            let data = await response.json();
            return data;
        }


      var api = [];
      var loadNew = async function() {
        updateArabic();
        var id = <?php echo htmlspecialchars($_GET['id'])?>;
        var stop = false;
        var i = 1;
        while( stop == false ){
            i = i+9;
            var data_ = await httpGet("http://holy-quran.epizy.com/surah.php?id="+id+"&api_on=1&start="+i);
            for( var no = i; no <= i+9; no++ ){
                data_json[no] = data_[no];
                updateSurah();
            }
            if( data_[i+9] == undefined ){
                console.log('stop at '+i);
                stop = true;
            }else{
                console.log("load new "+i);
            }
        }

      }
    </script>
    <script type="text/javascript">
      window.onload = loadNew
    </script> 
    <script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
  </body>
</html>
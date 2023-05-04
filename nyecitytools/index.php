<?php

 $host 				= "localhost";
 $felhasznalo 	= "root";
 $jelszo 			= "";
 $db 					= "grafikateszt";
 
 $condb = new mysqli($host,$felhasznalo,$jelszo,$db);
 
 if($condb->connect_error)
 {
	 die("Sikertelen kapcsolodas" . $condb->connect_error);
 }

 
 if (isset($_POST['citySelect'])){
 $aktivCity = $_POST['citySelect'];
 }
 else {
 $aktivCity = "Sarospatak";
 }

 if (isset($_POST['nyelv'])){
 $nyelv = $_POST['nyelv'];
 }
 else {
 $nyelv = "magyar";
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="css\custom.css">
  <title>Document</title>
</head>

<body style="background: #ECEFF1;">
<div class="container" style="max-width: 99%;">
  <div class="row">
    <div class="col-md-3 text-center">
      <img src="images\\NYECITYTOOLS.png" style="width: 60px;">
    </div>
    <div class="col-md-6">
      <div class="container bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid d-flex flex-grow justify-content-betwen">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
              aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">CityTool</a>
            <div class="collapse navbar-collapse text-decoration" id="navbarNavDarkDropdown">
              <form method="post" class="row g-3">
		          <!-- <div class="form-group"> -->
		        	<label for="citySelect"></label>
			        <div class="col-auto"><select name="citySelect" id="citySelect" class="form-control">
              <?php 
              $sql = "SELECT countryCity, city  FROM cities ORDER BY cityID ASC";
              $result = $condb->query($sql);
              if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                echo "<option value=\"" . $row["city"]. "\">". $row["countryCity"]. "</option>"; } } ?>
			        </select></div><div class="col-auto"><label for="nyelv"></label>		        	
			        <select name="nyelv" id="nyelv" class="row g-3">
              <option value=magyar <?php if ($nyelv == "magyar") {echo "selected='selected'"; } ?>>Magyar</option>
              <option value=english <?php if ($nyelv == "english") {echo "selected='selected'"; } ?>>English</option>
              <option value=deutsch <?php if ($nyelv == "deutsch") {echo "selected='selected'"; } ?>>Deutsch</option>
			        </select></div><div class="col-auto">
			        <button type="submit" class="btn btn-primary">Submit</button></div>
	          	<!-- </div>	 -->
            	</form><div class="col-auto">
              <img src="images\nyelvikon\<?php echo strtolower($nyelv); ?>.png" style="width: 40px;"></div> 
            </div>
          </div>
        </nav>
      </div>
    </div>
  <div>
    <div class="row">
      <div class="col-md-4 p-2">
        <div>
          <div class="p-2">
          <h5 style="color: var(--bs-black);text-shadow: 0px 0px 6px var(--bs-light);"><?php if ($nyelv == "magyar") {echo "Időjárás";} elseif ($nyelv == "deutsch") {echo "Wetter";} else {echo "Weather";}?></h5>
          </div>
          
          <!-- weather widget start -->
          <a class="weatherwidget-io" href="<?php if ($nyelv == "magyar") {echo "https://forecast7.com/hu";} elseif ($nyelv == "deutsch") {echo "https://forecast7.com/de";} else {echo "https://forecast7.com/en";}?><?php $sql = "SELECT weather FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   echo $row['weather']; ?>"
            data-icons="Climacons Animated" data-days="3" data-theme="pure"></a>
          <script>
            !function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (!d.getElementById(id)) { js = d.createElement(s); js.id = id; js.src = 'https://weatherwidget.io/js/widget.min.js'; fjs.parentNode.insertBefore(js, fjs); } }(document, 'script', 'weatherwidget-io-js');
          </script>
          <!-- weather widget end -->
          <a class="weatherwidget-io" href="<?php if ($nyelv == "magyar") {echo "https://forecast7.com/hu";} elseif ($nyelv == "deutsch") {echo "https://forecast7.com/de";} else {echo "https://forecast7.com/en";}?><?php $sql = "SELECT weather FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   echo $row['weather']; ?>?unit=us"
            data-icons="Climacons Animated" data-days="3" data-theme="pure"></a>
          <script>
            !function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (!d.getElementById(id)) { js = d.createElement(s); js.id = id; js.src = 'https://weatherwidget.io/js/widget.min.js'; fjs.parentNode.insertBefore(js, fjs); } }(document, 'script', 'weatherwidget-io-js');
          </script>
          <!-- weather widget end -->
        </div>
      </div>

      <div class="col-md-4 p-2">
        <!-- Térkép-->
        <div class="video-responsive iframe">
          <iframe scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas"
            src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=%20<?php echo $aktivCity; ?>+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
            width="832" height="450" frameborder="0"></iframe> <a href='https://add-map.com/'>embedding google
            maps</a>
          <script type='text/javascript'
            src='https://embedmaps.com/google-maps-authorization/script.js?id=268828addd675a05bc94ea2966529864f8280821'></script>
        </div>
      </div>

      <div class="col-md-4 p-2">
        <div class="row">
          <div class="col">
            <div class="card card-body mb-2" style="background: #F9FBE7;">
              <div class="media d-block d-md-flex">
                <img class="img-thumbnail" src="images\city\<?php echo $aktivCity; ?>\link1.jpg" style="width: 226px;">
                <div class="text-center col-6 align-self-center">
                  <a href="<?php if (isset($_POST['citySelect'])){$sql = "SELECT cityLinkEgy FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   echo $row['cityLinkEgy'];} else{echo "https://sarospatak.hu/2019/05/24/szamosujvaron-vendegszerepelt-a-bodrog-neptancegyuttes/";} ?>" class="card-link"><?php if (isset($_POST['citySelect'])){$sql = "SELECT cityLinkEgy FROM cities WHERE city = '$aktivCity'";
    $result = $condb->query($sql);
    $row = $result->fetch_assoc();
       echo mb_strimwidth($row['cityLinkEgy'], 0, 120, "...");} else{echo mb_strimwidth('https://sarospatak.hu/2019/05/24/szamosujvaron-vendegszerepelt-a-bodrog-neptancegyuttes/', 0, 120, "...");} ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card card-body mb-2" style="background: #F9FBE7;">
              <div class="media d-block d-md-flex">
                <img class="img-thumbnail" src="images\city\<?php echo $aktivCity; ?>\link2.jpg" style="width: 226px;">
                <div class="text-center col-6 align-self-center">
                  <a href="<?php if (isset($_POST['citySelect'])){$sql = "SELECT cityLinkKetto FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   echo $row['cityLinkKetto'];} else{echo "https://sarospatak.hu/";} ?>" class="card-link"><?php if (isset($_POST['citySelect'])){$sql = "SELECT cityLinkKetto FROM cities WHERE city = '$aktivCity'";
    $result = $condb->query($sql);
    $row = $result->fetch_assoc();
    echo mb_strimwidth($row['cityLinkKetto'], 0, 120, "...");} else{echo mb_strimwidth('https://sarospatak.hu/', 0, 120, "...");} ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>        
      </div>

      <div class="col-md-4 p-2">
        <div class="card">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images\city\<?php echo $aktivCity; ?>\1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h2 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);"><?php if ($nyelv == "magyar") {$sql = "SELECT cityKepMagyEgy FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   echo $row['cityKepMagyEgy'];} elseif ($nyelv == "deutsch") {$sql = "SELECT cityKepNemeEgy FROM cities WHERE city = '$aktivCity'";
    $result = $condb->query($sql);
    $row = $result->fetch_assoc();
       echo $row['cityKepNemeEgy'];} else {$sql = "SELECT cityKepAngoEgy FROM cities WHERE city = '$aktivCity'";
    $result = $condb->query($sql);
    $row = $result->fetch_assoc();
       echo $row['cityKepAngoEgy'];}?></h2>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images\city\<?php echo $aktivCity; ?>\2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h2 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);"><?php if ($nyelv == "magyar") {$sql = "SELECT cityKepMagyKetto FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   echo $row['cityKepMagyKetto'];} elseif ($nyelv == "deutsch") {$sql = "SELECT cityKepNemeKetto FROM cities WHERE city = '$aktivCity'";
    $result = $condb->query($sql);
    $row = $result->fetch_assoc();
       echo $row['cityKepNemeKetto'];} else {$sql = "SELECT cityKepAngoKetto FROM cities WHERE city = '$aktivCity'";
    $result = $condb->query($sql);
    $row = $result->fetch_assoc();
       echo $row['cityKepAngoKetto'];}?></h2>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images\city\<?php echo $aktivCity; ?>\3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h2 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);"><?php if ($nyelv == "magyar") {$sql = "SELECT cityKepMagyHarom FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   echo $row['cityKepMagyHarom'];} elseif ($nyelv == "deutsch") {$sql = "SELECT cityKepNemeHarom FROM cities WHERE city = '$aktivCity'";
    $result = $condb->query($sql);
    $row = $result->fetch_assoc();
       echo $row['cityKepNemeHarom'];} else {$sql = "SELECT cityKepAngoHarom FROM cities WHERE city = '$aktivCity'";
    $result = $condb->query($sql);
    $row = $result->fetch_assoc();
       echo $row['cityKepAngoHarom'];}?></h2>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>

      <div class="col-md-4 p-2">
        <!-- center block -->
        <div class="card">
          <img class="card-img" src="images\city\<?php echo $aktivCity; ?>\c.jpg" alt="...">
          <div class="card-img-overlay text-white d-flex justify-content-center align-items-end">
          <h3 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);"><?php if (isset($_POST['citySelect'])){$sql = "SELECT city FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   echo $row['city'];} else{echo "Sarospatak";} ?></h3>
          </div>
          <div class="card-img-overlay d-flex justify-content-left align-items-end">
            <img src="images\city\<?php echo $aktivCity; ?>\cim.png" style="width: 100px;">
          </div>
        </div>
      </div>

      <div class="col-md-4 p-2">
        <div class="card ">
          <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <?php $sql = "SELECT accessibilityBus FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   if ($row['accessibilityBus'] == true) {echo'
              <div class="carousel-item active">
                <img src="images\city\\'; echo $aktivCity; echo'\bus.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption text-white d-flex justify-content-center align-items-end">
                  <h2 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);">'; if ($nyelv == "magyar") {echo "Buszallomas";} elseif ($nyelv == "deutsch") {echo "Bushaltestelle";} else {echo "Bus station";} echo '</h2>
                </div>
                <div class="card-img-overlay d-flex justify-content-left align-items-end">
                  <img src="images\transikon\bus.png" style="width: 100px;">
                </div>
              </div>';}?>
              <?php $sql = "SELECT accessibilityShip FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   if ($row['accessibilityShip'] == true) {echo'
              <div class="carousel-item">
                <img src="images\city\\'; echo $aktivCity; echo'\port.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption text-white d-flex justify-content-center align-items-end">
                  <h2 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);">'; if ($nyelv == "magyar") {echo "Hajo kikoto";} elseif ($nyelv == "deutsch") {echo "Schiff hafen";} else {echo "Ship port";} echo '</h2>
                </div>
                <div class="card-img-overlay d-flex justify-content-left align-items-end">
                  <img src="images\transikon\hajo.png" style="width: 100px;">
                </div>
              </div>';}?>
              <?php $sql = "SELECT accessibilityAirplane FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   if ($row['accessibilityAirplane'] == true) {echo'
              <div class="carousel-item">
                <img src="images\city\\'; echo $aktivCity; echo'\airport.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption text-white d-flex justify-content-center align-items-end">
                <h2 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);">'; if ($nyelv == "magyar") {echo "Repuloter";} elseif ($nyelv == "deutsch") {echo "Flughafen";} else {echo "Airport";} echo '</h2>
                </div>
                <div class="card-img-overlay d-flex justify-content-left align-items-end">
                  <img src="images\transikon\repulo.png" style="width: 100px;">
                </div>
              </div>';}?>
              <?php $sql = "SELECT accessibilityTrain FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   if ($row['accessibilityTrain'] == true) {echo'
              <div class="carousel-item">
                <img src="images\city\\'; echo $aktivCity; echo'\train.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption text-white d-flex justify-content-center align-items-end">
                <h2 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);">'; if ($nyelv == "magyar") {echo "Vasutallomas";} elseif ($nyelv == "deutsch") {echo "Bahnhof";} else {echo "Train station";} echo '</h2>
                </div>
                <div class="card-img-overlay d-flex justify-content-left align-items-end">
                  <img src="images\transikon\mozdony.png" style="width: 100px;">
                </div>
              </div>';}?>
              <?php $sql = "SELECT accessibilityLama FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   if ($row['accessibilityLama'] == true) {echo'
              <div class="carousel-item">
                <img src="images\city\\'; echo $aktivCity; echo'\lama.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption text-white d-flex justify-content-center align-items-end">
                <h2 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);">'; if ($nyelv == "magyar") {echo "Lama";} elseif ($nyelv == "deutsch") {echo "Lama";} else {echo "Llama";} echo '</h2>
                </div>
                <div class="card-img-overlay d-flex justify-content-left align-items-end">
                  <img src="images\transikon\lama.png" style="width: 100px;">
                </div>
              </div>';}?>
              <?php $sql = "SELECT accessibilityNoCar FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   if ($row['accessibilityNoCar'] == true) {echo'
              <div class="carousel-item">
                <img src="images\city\\'; echo $aktivCity; echo'\nocar.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption text-white d-flex justify-content-center align-items-end">
                <h2 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);">'; if ($nyelv == "magyar") {echo "Gyalog";} elseif ($nyelv == "deutsch") {echo "Zu fuss";} else {echo "On foot";} echo '</h2>
                </div>
                <div class="card-img-overlay d-flex justify-content-left align-items-end">
                  <img src="images\transikon\nocar.png" style="width: 100px;">
                </div>
              </div>';}?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>

      <div class="col-md-4 p-2">
        <!--Videó-->
        <div class="video-responsive iframe">
          <iframe width="832" height="625" src="https://www.youtube.com/embed/<?php $sql = "SELECT cityVideoLink FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   echo $row['cityVideoLink']; ?>"
            title="YouTube video player" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
        </div>
      </div>


      <div class="col-md-4 p-2">
        <!--Tánc-->
        <div class="card">
          <img class="card-img" src="images\city\<?php echo $aktivCity; ?>\traditional.jpg" alt="...">
          <div class="card-img-overlay text-white d-flex justify-content-center align-items-end">
          <h2 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);"><?php if ($nyelv == "magyar") {echo "Nepzene";} elseif ($nyelv == "deutsch") {echo "Volksmusik";} else {echo "Folk music";}?></h2>
          </div>
          <div class="card-img-overlay d-flex justify-content-left align-items-end">
            <div data-video="<?php $sql = "SELECT cityAnthem FROM cities WHERE city = '$aktivCity'";
$result = $condb->query($sql);
$row = $result->fetch_assoc();
   echo $row['cityAnthem']; ?>" data-autoplay="0" data-loop="1" id="youtube-audio"></div>
            <script src="https://www.youtube.com/iframe_api"></script>
            <script src="https://cdn.rawgit.com/labnol/files/master/yt.js"></script>
          </div>
        </div>
      </div>

      <div class="col-md-4 p-2">
        <!-- last block -->
        <div class="card">
          <img class="card-img" src="images\city\<?php echo $aktivCity; ?>\food.jpg" alt="...">
          <div class="card-img-overlay text-white d-flex justify-content-center align-items-end">
          <h2 style="color: var(--bs-white);text-shadow: 0px 0px 6px var(--bs-dark);"><?php if ($nyelv == "magyar") {echo "Helyi konyha";} elseif ($nyelv == "deutsch") {echo "Lokale keuken";} else {echo "Regional cuisine";}?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
  <script src="scr/script.js"></script>
</body>

</html>
<?php 
$condb->close();
?>
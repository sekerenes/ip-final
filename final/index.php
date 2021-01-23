<?php require_once ("yonetici/kutuphane/baglanti.php"); ?>

<?php 
	$sorgu="SELECT * FROM bilgi";
	$sonuc=mysqli_query($baglanti,$sorgu);

	while($satir=mysqli_fetch_array($sonuc)) {
		$bilgiler[$satir['id']]=$satir;;
	}

	$sorgu="SELECT * FROM egitim";
	$sonuc=mysqli_query($baglanti,$sorgu);

	while($satir=mysqli_fetch_array($sonuc)) {
		$egitimler[$satir['id']]=$satir;;
  }
  

  $sorgu="SELECT * FROM slayt";
  $sonuc=mysqli_query($baglanti,$sorgu);

  while($satir=mysqli_fetch_array($sonuc)) {
    $slaytlar[$satir['id']]=$satir;;
  }

  $sorgu="SELECT * FROM resimler";
  $sonuc=mysqli_query($baglanti,$sorgu);

  while($satir=mysqli_fetch_array($sonuc)) {
    $galeri[$satir['id']]=$satir;;
  }

  if(@$_POST["gonder"] == 1) {
    $isim = $_POST['isim'];
    $soyisim = $_POST['soyisim'];
    $eposta = $_POST['eposta'];
    $mesaj = $_POST['mesaj'];

    if(!empty($isim) && !empty($soyisim) && !empty($eposta) && !empty($mesaj)) {
      $sorgu = "INSERT INTO iletisim(isim, soyisim, eposta, mesaj) VALUES('{$isim}', '{$soyisim}', '{$eposta}', '{$mesaj}')";
      $sonuc = mysqli_query($baglanti, $sorgu);
      if($sonuc == 1) {
        yonlendir("index.php");
      }
    }
  }


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $bilgiler[1]['icerik']; ?> kişisel web sayfası</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap">
      
      <div class="site-navbar site-navbar-target js-sticky-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-6 col-md-4">
              <h1 class="my-0 site-logo"><a href="index.php"><span class="text-primary"><?php echo $bilgiler[1]['icerik']; ?></span> </a></h1>
            </div>
            <div class="col-6 col-md-8">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">

                  <div class="d-inline-block d-lg-block ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black">
                    <span class="icon-menu h3"></span> <span class="menu-text">Menu</span>
                  </a></div>

                  <ul class="site-menu main-menu js-clone-nav d-none d-lg-none">
                    <li><a href="#home-section" class="nav-link">Ana sayfa</a></li>
                    <li><a href="#what-we-do-section" class="nav-link">Eğitim Bilgeri</a></li>
                    <li><a href="#about-section" class="nav-link">Hakkımızda</a></li>
                    <li><a href="#studio-section" class="nav-link">Galeri</a></li>
                    <li><a href="#contact-section" class="nav-link">İletişim</a></li>
                    <li><a href="yonetici" class="nav-link">Yönetici Girişi</a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- END .site-navbar-wrap -->
    
    <div class="site-blocks-cover" id="home-section">
      <div class="img-wrap">
        <div class="owl-carousel slide-one-item hero-slider">
          
          <?php  foreach ($slaytlar as $slayt)  { ?>
          <div class="slide">
            <img src="yonetici/img/slayt/<?php echo $slayt['id']; ?>.jpg" alt="Image">  
          </div>
          <?php } ?>
         
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto align-self-center">
            <div class="intro">
              <div class="heading">
                <h1><?php echo $bilgiler[1]['icerik']; ?></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- END .site-blocks-cover -->

    <div class="site-section" id="what-we-do-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-6 section-title">
            <span class="sub-title mb-2 d-block"></span>
            <h2 class="title text-primary">Eğitim Bilgileri</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 ml-auto">
            <div class="row">
             
            <?php  foreach ($egitimler as $egitim)  { ?>
              <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="service h-100">
                  <h3><?php echo $egitim['tipi'];?></h3>
                  <p><?php echo $egitim['adi'];?></p>
                  <p class="readmore">
                  	<?php 
                      echo $egitim['baslama'] ."-";

                      if(empty($egitim['bitis'])==false) {
                        echo $egitim['bitis'];
                      }else {
                        echo "Devam Ediyor";
                      }
                  	?>
                  </p>
                </div>
              </div>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- END .site-section -->

    <div class="site-section" id="about-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-5">
          <img src="yonetici/img/slayt/<?php echo $slayt[0]; ?>.jpg" class="img-fluid" alt="Image"> 
          </div>
          <div class="col-lg-5 ml-auto section-title">
            <span class="sub-title mb-2 d-block">HAKKIMDA</span>
            <h2 class="title text-primary mb-3">BİLGİ</h2>
            <p class="mb-4"><?php echo $bilgiler[2]['icerik']; ?></p>
          </div>
        </div>
      </div>
    </div> <!-- .END site-section -->


    
    <div class="site-section" id="studio-section">
      <div class="container">

        <div class="row mb-5 ">
          <div class="col-md-7 section-title text-center mx-auto">
            <span class="sub-title mb-2 d-block">Resimler</span>
            <h2 class="title text-primary mb-3">Galerim</h2>
          </div>
        </div>
        <div class="row">
          <?php  foreach ($galeri as $g)  { ?>
              <div class="item design col-md-4">
                <a href="yonetici/img/resimler/<?php echo $g['id']; ?>.jpg" class="item-wrap" data-fancybox="gal">
                  <span class="icon-search2"></span>
                  <img class="img-fluid" src="yonetici/img/resimler/<?php echo $g['id']; ?>.jpg" style="height:400px;">
                </a>
              </div>
          <?php } ?>
        </div>

        </div>
      </div>
    </div> <!-- END .site-section -->
    
    <div class="site-section" id="contact-section">
      <div class="container">
        <form method="post" enctype="multipart/form-data" class="contact-form">

          <div class="section-title text-center mb-5">
            <span class="sub-title mb-2 d-block">İletişim</span>
            <h2 class="title text-primary">Bize Ulaşın</h2>
          </div>

          <div class="row mb-4">
            <div class="col-md-6 mb-4 mb-md-0">
              <input type="text" name="isim" class="form-control" placeholder="First Name">
            </div>
            <div class="col-md-6">
              <input type="text" name="soyisim" class="form-control" placeholder="Last Name">
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-12">
              <input type="text" name="eposta" class="form-control" placeholder="E-mail">
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-12">
              <textarea class="form-control" name="mesaj" cols="30" rows="10" placeholder="Message"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button name="gonder" value="1" class="btn btn-primary btn-md">Submit Message</button>
            </div>
          </div>

        </form>
      </div>
    </div> <!-- END .site-section -->
  
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-12">
                <h3 class="footer-heading mb-4"><?php echo $bilgiler[2]['isim']; ?></h3>
                <p><?php echo $bilgiler[2]['icerik']; ?></p>
              </div>
            </div>
            

            
          </div>
          <div class="col-lg-3 ml-auto">
           
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigation</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#home-section" class="smoothscroll">Home</a></li>
                  <li><a href="#what-we-do-section" class="smoothscroll">What We Do</a></li>
                  <li><a href="#about-section" class="smoothscroll">About Us</a></li>
                  <li><a href="#team-section"  class="smoothscroll">Team</a></li>
                </ul>
              </div>
              
            </div>
            
          </div>
          

          <div class="col-lg-4 mb-5 mb-lg-0">

            <div class="mb-5">
              <h3 class="footer-heading mb-2">Subscribe Newsletter</h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>

              <form method="post" class="form-subscribe">
                <div class="form-group mb-3">
                  <input type="text" class="form-control border-white text-white bg-transparent" placeholder="Enter full name" aria-label="Enter Email" aria-describedby="button-addon2">
                </div>
                <div class="form-group mb-3">
                  <input type="text" class="form-control border-white text-white bg-transparent" placeholder="Enter email" aria-label="Enter Email" aria-describedby="button-addon2">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary px-5" type="submit">Subscribe</button>
                </div>
              </form>

            </div>

            


          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="mb-4">
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/stickyfill.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/main.js"></script>

     
  </body>
</html>
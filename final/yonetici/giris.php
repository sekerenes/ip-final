<?php require_once ("kutuphane/baglanti.php"); ?>

<?php 
    if(empty($_SESSION['kullanici']['id'])==false) {
        yonlendir("index.php");
    }

    
    if(isset($_POST['giris'])==true) {

       $eposta=$_POST['eposta'];
       $sifre=$_POST['sifre'];

       if (empty($eposta)==false && empty($sifre)==false) {

            $sorgu="SELECT * FROM kullanici WHERE eposta='{$eposta}' AND sifre='{$sifre}'";
            $sonuc=mysqli_query($baglanti,$sorgu);

            $kullanici=mysqli_fetch_array($sonuc);
            $sayisi=mysqli_num_rows($sonuc);

            if($sayisi==1){

                $_SESSION['kullanici']['id']=$kullanici['id'];
                $_SESSION['kullanici']['kimlik']=$kullanici['isim'] . " ". $kullanici['soyisim'];

                yonlendir("index.php");

               
            }else {
                $hata="Eposta ve şifre uyumsuzluğu!";

            }


           
       }else {
            $hata="Alanlar boş bırakılamaz.";
       }
    }

?>

<!DOCTYPE html>
<html lang="en" class="body-full-height">
    
<!-- Mirrored from aqvatarius.com/themes/atlant/html/pages-login-website-light.html by HTTrack Website Copier/3.x [XR&CO'2005], Sun, 13 Nov 2016 12:09:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
<head>        
        <!-- META SECTION -->
        <title>Yönetici Girişi</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        
        <div class="login-container lightmode">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <?php mesaj(@$hata);?>  
                    <div class="login-title">Yönetici sayfasına <strong>Giriş Yap</strong></div>
                    <form  class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" class="form-control" placeholder="E-posta" name="eposta" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Şifre" name="sifre" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Şifrenizi mi unuttunuz?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" name="giris" value="1">Giriş Yap</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; <?php echo date('Y'); ?> ZTYO - Yönetim Bilişim Sistemleri bölümü projesi
                    </div>
                  
                </div>
            </div>
            
        </div>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-36783416-1', 'auto');
        ga('send', 'pageview');
    </script>        
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter25836617 = new Ya.Metrika({
                        id:25836617,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "../../../../mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/25836617" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->    
    </body>

<!-- Mirrored from aqvatarius.com/themes/atlant/html/pages-login-website-light.html by HTTrack Website Copier/3.x [XR&CO'2005], Sun, 13 Nov 2016 12:09:21 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8"><!-- /Added by HTTrack -->
</html>







<?php require_once ("kutuphane/baglanti.php"); ?>

<?php

if(empty($_SESSION['kullanici']['id'])==true) {
	yonlendir("giris.php");
}

$baslik="Anasayfa";
$sira=1;
$sorgu="SELECT * FROM egitim";
$sonuc=mysqli_query($baglanti,$sorgu); // yazdığımız sorguyu çalıştır. 

while($satir=mysqli_fetch_array($sonuc)) {
	$egitimler[]=$satir;
}




?>

<?php require_once ("kutuphane/ust.php"); ?>

<div class="row">
    <div class="col-md-12">
    	<!-- START BORDERED TABLE SAMPLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Eğitim Bilgileri</h3>
            </div>
            <div class="panel-body">
               
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sıra</th>
                                <th>Eğitim Adı</th>
                                <th>Eğitim Tipi</th>
                                <th>Başlama Yılı</th>
                                <th>Bitiş Yılı</th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach($egitimler as $egitim)  { ?>
                            <tr>
                                <td><?php echo $sira; ?></td>
                                <td><?php echo $egitim['adi']; ?></td>
                                <td><?php echo $egitim['tipi']; ?></td>
                                <td><?php echo $egitim['baslama']; ?></td>
                                

                                <?php if(empty($egitim['bitis'])==false)  { ?>
                                <td><?php echo $egitim['bitis']; ?></td>
                                <?php } else { ?>	
                               <td>Devam Ediyor</td>  	
                                <?php  } ?>
                            </tr>

                            <?php $sira++; } ?>
 
                          
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE SAMPLE -->


	</div>
</div>

<?php require_once ("kutuphane/alt.php"); ?>


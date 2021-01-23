<?php require_once ("kutuphane/baglanti.php"); ?>

<?php

if(empty($_SESSION['kullanici']['id'])==true) {
	yonlendir("giris.php");
}

 
if(@$_POST['mesaj_sil']) {
    $id = $_POST['mesaj_sil'];
    $sorgu = "DELETE FROM iletisim WHERE id='{$id}'";
    $sonuc = mysqli_query($baglanti, $sorgu);
    if($sonuc) {
        header("Refresh: 0");
    }
}


$baslik="İletişim";
$sira=1;
$sorgu="SELECT * FROM iletisim";
$sonuc=mysqli_query($baglanti,$sorgu); // yazdığımız sorguyu çalıştır. 

while($satir=mysqli_fetch_array($sonuc)) {
	$mesajlar[]=$satir;
}




?>

<?php require_once ("kutuphane/ust.php"); ?>

<div class="row">
    <div class="col-md-12">
    	<!-- START BORDERED TABLE SAMPLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Kullanıcılardan Gelenler</h3>
            </div>
            <div class="panel-body">
               
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sıra</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>E Posta</th>
                                <th>Mesaj</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($mesajlar)==false) { ?>
                        	<?php foreach($mesajlar as $mesaj)  { ?>
                            <tr>
                                <td><?php echo $sira; ?></td>
                                <td><?php echo $mesaj['isim']; ?></td>
                                <td><?php echo $mesaj['soyisim']; ?></td>
                                <td><?php echo $mesaj['eposta']; ?></td>
                                <td><?php echo $mesaj['mesaj']; ?></td>
                                <td>
                                    <form method="post" enctype="multipart/form-data">
                                        <button class="btn btn-success" name="mesaj_sil" value="<?php echo $mesaj['id']; ?>">TEMİZLE</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $sira++; } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6" style="text-align: center; background-color:rgba(255,0,0,0.1)">Henüz Kayıt Bulunmuyor</td>
                            </tr>

                        <?php } ?>
 
                          
                        </tbody>
                    </table> 
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE SAMPLE -->


	</div>
</div>

<?php require_once ("kutuphane/alt.php"); ?>


<?php require_once ("kutuphane/baglanti.php"); ?>

<?php



if(empty($_SESSION['kullanici']['id'])==true) {
	yonlendir("giris.php");
}



if(@$_POST['resim_sil']) {
    $id = $_POST['resim_sil'];
    $sorgu = "DELETE FROM resimler WHERE id='{$id}'";
    $sonuc = mysqli_query($baglanti, $sorgu);
    if($sonuc) {
        yonlendir("resim_duzenle.php");
    }
}


$baslik="Resim Düzenleme";
$sira=1;
$sorgu="SELECT * FROM resimler";
$sonuc=mysqli_query($baglanti,$sorgu); // yazdığımız sorguyu çalıştır. 

while($satir=mysqli_fetch_array($sonuc)) {
	$resimler[]=$satir;
}




?>

<?php require_once ("kutuphane/ust.php"); ?>

<div class="row">
    <div class="col-md-12">
    	<!-- START BORDERED TABLE SAMPLE -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Resim Düzenle</h3>
            </div>
            <div class="panel-body">
               
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sıra</th>
                                <th>Resim Adı</th>
                                <th>Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($resimler)==false) { ?>
                        	<?php foreach($resimler as $resim)  { ?>
                            <tr>
                                <td><?php echo $sira; ?></td>
                                <td><?php echo $resim['ad']; ?></td>
                                <td>
                                    <form method="post" enctype="multipart/form-data">
                                        <button class="btn btn-danger text-center" name="resim_sil" value="<?php echo $resim['id']; ?>">
                                            <span class="fa fa-remove"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php $sira++; } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="3" style="text-align: center; background-color:rgba(255,0,0,0.1)">Henüz Kayıt Bulunmuyor</td>
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


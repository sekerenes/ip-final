<?php require_once ("kutuphane/baglanti.php"); ?>


<?php
if(empty($_SESSION['kullanici']['id'])==true) {
    yonlendir("giris.php");
}

$baslik="Site Bilgileri Düzenleme Paneli";

$sorgu="SELECT * FROM bilgi";
    $sonuc=mysqli_query($baglanti,$sorgu);

    while($satir=mysqli_fetch_array($sonuc)) {
        $bilgiler[$satir['id']]=$satir;;
    }





if(@$_POST['kaydet']==1) {

	$sitesahibi=$_POST['sitesahibi'];
    $hakkimizda=$_POST['hakkimizda'];
	

	if(empty($sitesahibi)==false ) {
       
		$sorgu="UPDATE bilgi SET icerik='{$sitesahibi}' WHERE id=1 LIMIT 1";
		$sonuc=mysqli_query($baglanti,$sorgu);
		header('Location:bilgi_duzenle.php');
		
	}else {
		echo "Lütfen site sahibi alanını doldurunuz.";
	}

    if(empty($hakkimizda)==false ) {
       
        $sorgu="UPDATE bilgi SET icerik='{$hakkimizda}' WHERE id=2 LIMIT 1";
        $sonuc=mysqli_query($baglanti,$sorgu);
        header('Location:bilgi_duzenle.php');
        
    }else {
        echo "Lütfen site sahibi alanını doldurunuz.";
    }
}

?>
<?php require_once ("kutuphane/ust.php"); ?>

   <div class="row">
        <div class="col-md-12">
            
            <form class="form-horizontal" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong></strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
             
                <div class="panel-body">                                                                        
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Site Sahibi</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="sitesahibi" value="<?php echo $bilgiler[1]['icerik']; ?>" autocomplete="off" />
                            </div>                                            
                            <span class="help-block">Site sahibi bilgilerini günceller.</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Hakkımızda</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <textarea class="form-control" rows="5" name="hakkimizda"><?php echo $bilgiler[2]['icerik']; ?></textarea>
                            <span class="help-block">Site altlığında hakkımızda bilgisi yerine yazılır.</span>
                        </div>
                    </div>
                   

                 
                    
                </div>
                <div class="panel-footer">
                    <button class="btn btn-default">Formu temizle</button>                                    
                    <button class="btn btn-primary pull-right" name="kaydet" value="1">Kaydet</button>
                </div>
            </div>
            </form>
            
        </div>
    </div>   

<?php require_once ("kutuphane/alt.php"); ?>

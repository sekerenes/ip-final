<?php require_once ("kutuphane/baglanti.php"); ?>


<?php
if(empty($_SESSION['kullanici']['id'])==true) {
    yonlendir("giris.php");
}

$baslik="Eğitim Bilgisi Ekleme Paneli";



if(@$_POST['ekle']==1) {

	$adi=$_POST['adi'];
	$tipi=$_POST['tipi'];
	$baslama=$_POST['baslama'];
	$bitis=$_POST['bitis'];

	if(empty($adi)==false && empty($tipi)==false && empty($baslama)==false) {

		if(empty($bitis)==false) {
			$sorgu="INSERT INTO (adi,tipi,baslama,bitis) VALUES ('$adi','$tipi','$baslama','$bitis')";
		}else {
			$sorgu="INSERT INTO egitim(adi,tipi,baslama) VALUES ('$adi','$tipi','$baslama')";
		}
		//echo $sorgu;

		$sorgu=mysqli_query($baglanti,$sorgu);

		header('Location:index.php');
	
 		

		
	}else {
		$hata="Lütfen alanları doldurunuz.";
	}
}

?>
<?php require_once ("kutuphane/ust.php"); ?>

   <div class="row">
        <div class="col-md-12">
            <?php mesaj(@$hata);?>  
            <form class="form-horizontal" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Ekleme Paneli</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
             
                <div class="panel-body">                                                                        
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Eğitim Adı</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="adi" autocomplete="off" />
                            </div>                                            
                            <span class="help-block">okul adı, bulunduğu şehir vs.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Eğitim Tipi</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="tipi" autocomplete="off" />
                            </div>                                            
                            <span class="help-block">Lisans, Lise vb.</span>
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Başlama Yılı</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="baslama" autocomplete="off" />
                            </div>                                            
                            <span class="help-block">Sadece Yıl yazın</span>
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Bitiş Yılı</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="bitis" autocomplete="off" />
                            </div>                                            
                            <span class="help-block">Mezun olunmamışsa boş bırakın</span>
                        </div>
                    </div>
                    
                </div>
                <div class="panel-footer">
                    <button class="btn btn-default">Formu temizle</button>                                    
                    <button class="btn btn-primary pull-right" name="ekle" value="1">Ekle</button>
                </div>
            </div>
            </form>
            
        </div>
    </div>   

<?php require_once ("kutuphane/alt.php"); ?>

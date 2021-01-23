<?php require_once ("kutuphane/baglanti.php"); ?>


<?php
if(empty($_SESSION['kullanici']['id'])==true) {
    yonlendir("giris.php");
}

$baslik="Slayt Ekleme Paneli";



if(@$_POST['ekle']==1) {

    $adi=$_POST['adi'];
    $size=$_FILES['resim']['size'];

    if(empty($adi)==false && empty($size)==false) {

        $sorgu="INSERT INTO slayt(ad) VALUES ('{$adi}')";
        $sonuc=mysqli_query($baglanti,$sorgu);
        $kayit_id=mysqli_insert_id($baglanti);

        if($sonuc==1) {

            $dosya="img/slayt/{$kayit_id}.jpg";

            if (move_uploaded_file($_FILES["resim"]["tmp_name"], $dosya)) {
                yonlendir("slayt_duzenle.php");
            }


           
        }


    }



}

?>
<?php require_once ("kutuphane/ust.php"); ?>

   <div class="row">
        <div class="col-md-12">
            <?php mesaj(@$hata);?>  
            <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Ekleme Paneli</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
             
                <div class="panel-body">                                                                        
                    
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Resim Adı</label>
                        <div class="col-md-6 col-xs-12">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="adi" autocomplete="off" />
                            </div>                                            
                            <span class="help-block">Resmi hatırlatıcı bir bilgi veriniz</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Resim</label>
                        <div class="col-md-6 col-xs-12">                                                                                                                                        
                            <input type="file" class="fileinput btn-primary" name="resim" id="resim" title="Göz At"/>
                            <span class="help-block">Lütfen jpg uzantılı bir resim seçiniz</span>
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

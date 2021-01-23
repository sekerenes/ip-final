<?php 

	function dizigor($dizi) {
		echo "<pre>";
		print_r($dizi);
		echo "</pre>";
	}

	function yonlendir ($url) {

		header("Location:{$url}");
		exit(); // Kod düzgün çalışırsa buraya hiç gelmez.
	}


	function mesaj ($icerik=0) {

		if(empty($icerik)==false) {
			echo "<div class=\"alert alert-danger\" role=\"alert\">
	            <button type=\"button\" class=\"close\" data-dismiss=\"alert\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">Close</span></button>
	            <strong>Hata! </strong>{$icerik}
	        </div>";
        }
	}

?>
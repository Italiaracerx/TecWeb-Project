<?php

    require_once __DIR__.'/../../utility/lang.php';
    require_once __DIR__.'/../../query/image.php';

	if(isset($_GET['name'])){
		$titolo =$_GET['name'];
		$image = new image();
		$result = $image->search($this->titolo)->fetch_array(MYSQLI_ASSOC);
	}
	if($this->result == NULL){
		unset($_GET['name']);
		header('location: promozioni.php');
		die;
	}
	
	$lang=getTextLanguage($this->result['descrizione'],'it');
	$start=NULL;
	$end=NULL;
	if($lang != 'it'){
		$start='<span xml:lang="'.$lang.'">';
		$end='</span>';
	}

	echo '
	<div id="content">
		<div id="content_prodpromo">
			<h3 id="intestazione">
			<a href="negozio.php?shop='.$this->result['username'].'">'.$this->result['username'].'</a>: '.$this->result['titolo'].'</h3>
			<div id="prodpromo_leftSide">
				<img id="img_prodpromo" src="images/'.$this->result['type'].'/'.$this->result['source'].'" alt="'.$this->result['alt'].'"/>
			</div>
			<div id="prodpromo_rightSide">
				<p id="descrizione_prodpromo">'.$start.$this->result['descrizione'].$end.'</p>
				<p id="date_inizio_fine">Inizio: '.$this->result['start'].' <br> Fine: '.$this->result['finish'].'</p>
			</div>
		</div>
	</div>';
        
?>
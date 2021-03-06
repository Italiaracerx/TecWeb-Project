<?php

    require_once __DIR__.'/../../utility/lang.php';
	require_once __DIR__.'/../../query/image.php';
	
	$titolo = $_GET['promo'];
	$image = new image('promozione');
	$result = $image->read($titolo)->fetch_array(MYSQLI_ASSOC);

	if($result == NULL){
		unset($_GET['promo']);
		header('location: promozione.php');
		die;
	}
	
	$lang=getTextLanguage($result['descrizione'],'it');
	$start=NULL;
	$end=NULL;
	if($lang != 'it'){
		$start='<span xml:lang="'.$lang.'">';
		$end='</span>';
	}

	echo '
	<div id="content_prodpromo">
	<h3 id="intestazione"><a href="negozio.php?shop='.$result['username'].'">'.$result['username'].'</a>: '.$result['titolo'].'</h3>
	<div id="imgPromozioneProdotto">
		<img src="images/'.$result['type'].'/'.$result['source'].'" alt="'.$result['alt'].'"/>
	</div>
		<div id="descrizioneProdottoPromozione">
			<h4>Descrizione</h4>
			<p>'.$start.$result['descrizione'].$end.'</p>
			<p id="date_inizio_fine">Inizio: '.$result['start'].' Fine: '.$result['finish'].'</p>
		</div>
	</div>';
        
?>
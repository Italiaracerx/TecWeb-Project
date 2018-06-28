<?php

    require_once __DIR__.'/../../utility/lang.php';
	require_once __DIR__.'/../../query/image.php';
	
	$titolo = $_GET['prod'];
	$image = new image('prodotto');
	$result = $image->read($titolo)->fetch_array(MYSQLI_ASSOC);

	if($result == NULL){
		unset($_GET['prod']);
		header('location: negozio.php');
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
	<div id="content">
		<div id="content_prodpromo">
			<h3 id="intestazione">
			<a href="negozio.php?shop='.$result['username'].'">'.$result['username'].'</a>: '.$result['titolo'].'</h3>
			<div id="prodpromo_leftSide">
				<img id="img_prodpromo" src="images/'.$result['type'].'/'.$result['source'].'" alt="'.$result['alt'].'"/>
			</div>
			<div id="prodpromo_rightSide">
				<p id="descrizione_prodpromo">'.$start.$result['descrizione'].$end.'</p>
				<p id="date_inizio_fine">Inizio: '.$result['start'].' <br> Fine: '.$result['finish'].'</p>
			</div>
		</div>
	</div>';
        
?>
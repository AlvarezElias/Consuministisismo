<?php
include('../clases/Rss.php');
session_start();
$user = $_SESSION['user'];

if(isset($_POST['rssNuevo'])){
    $items = Rss::cargarNuevosRss();
}else{
    $items = Rss::cargarRss();
}
$i = 0;

    for ($i=0; $i <10 ; $i++) 
    {    
		strip_tags($items[$i]->description);
		strip_tags($items[$i]->pubDate);
		strip_tags($items[$i]->title);
		
    echo"<article class='notice text-center'>
	        <h4 class='Item-title'>
		       	<a href='". $items[$i]->link."' target='_blank'>". $items[$i]->title ." </a>
			</h4>		
			<div class='Item-date'>". (string) $items[$i]->pubDate ."</div>
					
			<div class='Item-content'>". substr($items[$i]->description,0,180) . 
			    "<a href='". $items[$i]->link ."'>Dame mas</a>
			</div>
			<button id='eliminar' class='btn btn-default'>Eliminar</button>
		</article>";
	}
			
			
?>
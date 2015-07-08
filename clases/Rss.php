<?php
class Rss
{

	public function cargarRss()
	{
		// $urlRSS = 'http://nelsonkewebs.tumblr.com/rss';
		$urlRSS = 'http://feeds.feedburner.com/nelsonkewebs';
		$XML = simplexml_load_file($urlRSS);

		$items = $XML->channel->item;
		return $items;
	}

	private function prueba()
	{
			for ($i=0; $i <10 ; $i++) 
			{ 
				strip_tags($items[$i]->description, '<br><br/>');
				strip_tags($items[$i]->description, '<strong></strong>');
				strip_tags($items[$i]->pubDate, '<a></a>');
				echo 
				"<article class=' notice text-center'>
					<h4 class='Item-title'>
					   	<a href='".$items[$i]->link."' target='_blank'>".$items[$i]->title ." </a>
					</h4>
				
					<div class='Item-date'>". substr($items[$i]->pubDate,0) ."</div>
				
					<div class='Item-content'>".substr($items[$i]->description,0,180) . 
					  	"<a href='".$items[$i]->link."'>Dame mas</a>
					</div>
				</article>";
			}
		
	}
}

/* foreach ($items as $item): ?>
	  		<?php strip_tags($items->description, '<br><br/>') ?>	
			   <article class=' notice text-center'>
				    <h4 class="Item-title">
				    	<a href="<?php echo $item->link; ?>" target="_blank"><?php echo $item->title; ?></a>
				    </h4>

				    <div class="Item-date">
				    	<?php echo $item->pubDate; ?>
				    </div>

				    <div class="Item-content"><?php echo substr($item->description,0,180); ?> 
				    	<a href="<?php echo $item->link; ?>">Dame mas</a>
				    </div>
			   </article>
			   <?php 
				   if($i == 10){ break;} 
				   $i =+1;  
			   ?>
			<?php   endforeach; */
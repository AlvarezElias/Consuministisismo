<?php
class Rss
{

	public function cargarRss()
	{
		// $urlRSS = 'http://nelsonkewebs.tumblr.com/rss';
		$urlRSS = 'http://feeds.feedburner.com/nelsonkewebs';
		$XML = simplexml_load_file($urlRSS);

		$items = $XML->channel->item;
		
	}
}
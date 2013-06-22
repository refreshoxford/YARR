<?php

class RssGrabberController extends BaseController {


	public function test($url)
	{
		// $uri = "http://www.telegraph.co.uk/technology/rss";
		
		// $response = Httpful\Request::get($uri)->expectsXml()->send();
		
		// echo '<pre>'.print_r($response, true).'</pre>';

		// foreach ($response->body->channel->item as $item) {
		// 	echo '<pre>'.print_r($item, true).'</pre>';
		// }

		$url = 'http://www.jpstacey.info/blog/feed';

		//$rss = new RssFeed();
		//$rss->url = $url;
		//$rss->save();
		//$rss->fetch();
		// $rss->save();
		
		// echo '<pre>'.print_r($rss, true).'</pre>';
		// echo '<pre>'.print_r(RSSFeed::find('http://www.telegraph.co.uk/technology/rss')->items, true).'</pre>';
		// echo '<pre>';
		// var_dump(RssFeed::where('url','=',$url)->first()->getItems());
		// echo '</pre>';

	    // echo $rss::find(1)->items()->title.' 1<br>';
	    // echo $rss::find(1)->items()->link.' 1<br>';
	    // echo $rss::find(1)->items()->description.' 1<br>';
	    // echo $rss::find(1)->items()->description.' 1<br>';
	    // echo $rss::find(1)->items()->pubDate.' 1<br>';
	    // echo $rss::find(1)->items()->author.' 1<br>';
	    // echo $rss::find(1)->items()->author.' 1<br>';
	    // echo $rss::find(1)->items()->guid.' 1<br>';
		return View::make('feed', array('feeds' => RssFeed::where('url','=',$url)->first()));
	}

}
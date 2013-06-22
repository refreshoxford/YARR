<?php

class RssGrabberController extends BaseController {


	public function test($url)
	{
		$uri = "http://www.telegraph.co.uk/technology/rss";
		
		$response = Httpful\Request::get($uri)->expectsXml()->send();
		
		echo '<pre>'.print_r($response, true).'</pre>';
		
		return '';
	}

}
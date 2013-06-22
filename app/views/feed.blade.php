<html>

	<head>
		<link rel="stylesheet" type="text/css" href="/css/yarr.css">
	</head>

	<body>

		<div class="main_container">

			<h1 class="feed_header">{{$feeds->url}}</h1>

			@foreach ($feeds->getItems() as $feed)

				<div id="{{$feed->guid}}" class="feed_item_container">
					<h2><a href="{{$feed->link}}" target="_blank">{{$feed->title}}</a></h2>
					<!-- <h3>{{date('l \t\h\e jS \o\f F Y \a\t h:ia', strtotime($feed->pubDate))}}</h3> -->
					
					<div class="feed_item_description_container">
					
						<p>{{$feed->description}}</p>

					</div>
				</div>
				<!-- <p>{{$feed->author}}</p> -->
				<!-- <p>{{$feed->guid}}</p> -->
			@endforeach

		</div>
		
	</body>
</html>
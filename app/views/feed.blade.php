<!doctype html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="/css/yarr.css">
	</head>

	<body>

		<div class="main_container">

			<h1 class="feed_header">{{$feeds->url}}</h1>

			@foreach ($feeds->items as $feed)

				<div id="{{$feed->guid}}" class="content_container">
					<h2><a href="{{$feed->link}}" target="_blank">{{$feed->title}}</a></h2>
					
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
<!doctype html>
<html>

	<head>
		<link rel="stylesheet" type="text/css" href="/css/yarr.css">
	</head>

	<body>

		<div class="main_container">

			<h1 class="feed_header">{{$feed->url}}</h1>

			@foreach ($feed->items as $item)

				<div id="{{$item->guid}}" class="content_container">
					<h2><a href="{{$item->link}}" target="_blank">{{$item->title}}</a></h2>
					
					<div class="feed_item_description_container">
					
						<p>{{$item->description}}</p>

					</div>
				</div>
				<!-- <p>{{$item->author}}</p> -->
				<!-- <p>{{$item->guid}}</p> -->
			@endforeach

		</div>

	</body>
</html>

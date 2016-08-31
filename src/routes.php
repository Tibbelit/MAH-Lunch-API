<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    $restaurants = Restaurant::restaurants();
    $json = new ArrayObject();
    foreach($restaurants as $restaurant){
        $r = new $restaurant();
		try{
			$json[$r->name] = json_decode($r->getWeekMenu());
		}catch(Exception $error){
			// Do nothing at the moment
		}
    }
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withStatus(200);
    $response = $response->withJson($json);
    return $response;
});

$app->get('/today', function ($request, $response, $args) {
    $restaurants = Restaurant::restaurants();
    $json = new ArrayObject();
    foreach($restaurants as $restaurant){
        $r = new $restaurant();
        $json[$r->name] = json_decode($r->getDayMenu());
    }
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withStatus(200);
    $response = $response->withJson($json);
    return $response;
});

/*
	Slack
*/
$app->get('/slack', function ($request, $response, $args) {
	$restaurants = Restaurant::restaurants();
    $att = new ArrayObject();
    foreach($restaurants as $restaurant){
		$rJson = new ArrayObject();
        $r = new $restaurant();
		$rJson["title"] = "$r->name";
		$food = "";
		foreach(json_decode($r->getDayMenu()) as $category => $dish){
			$food .= "*$category*: $dish->title\n";
		}
		$rJson["text"] = $food;
		$rJson["fallback"] = $food;
		$rJson["color"] = "#36a64f";
		$rJson["mrkdwn_in"] = ["text", "pretext"];
		$att[] = $rJson;
    }

	$url = 'https://hooks.slack.com/services/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';
	$json = new ArrayObject();
	$json["text"] = "Dagens lunch presenteras genom API: <http://mahlunch.antontibblin.se|MAHLunch> (<https://github.com/Tibbelit/MAH-Lunch-API|Github>), mer info hittar ni på <http://niagaralunch.antontibblin.se|Webbappen: NiagaraLunch> (<https://github.com/Tibbelit/MAH-Lunch-Webapp|Github>)";
	$json["username"] = "Lunchdags";
	$json["icon_emoji"] = ":hamburger:";
	//$json["channel"] = "Lunch";
	$json["mrkdwn"] = true;
	$json["attachments"] = $att;
	$data = array('payload' => json_encode($json));

	// use key 'http' even if you send the request to https://...
	$options = array(
		'http' => array(
			'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			'method'  => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	//echo json_encode($json);
});

/*
    Routes to different sources of menus
*/
$app->get('/restaurants', function ($request, $response, $args) {
    $restaurants = [];
    $restaurants["Restaurants"] = Restaurant::restaurants();
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withStatus(200);
    $response = $response->withJson($restaurants);
    return $response;
});

$app->get('/{restaurant}', function ($request, $response, $args) {
    $restaurantName = $args["restaurant"];
    if(class_exists($restaurantName)){
        $restaurant = new $restaurantName();
    }
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withStatus(200);
    $response = $response->withHeader('Content-type', 'application/json');
    $response = $response->withJson(json_decode($restaurant->getWeekMenu()));
    return $response;
});

$app->get('/{restaurant}/today', function ($request, $response, $args) {
    $restaurantName = $args["restaurant"];
    if(class_exists($restaurantName)){
        $restaurant = new $restaurantName();
    }
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withStatus(200);
    $response = $response->withJson(json_decode($restaurant->getDayMenu()));
    return $response;
});

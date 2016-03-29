<?php
// Routes

$app->get('/', function ($request, $response, $args) {
    $restaurants = Restaurant::restaurants();
    $json = new ArrayObject();
    foreach($restaurants as $restaurant){
        $r = new $restaurant();
        $json[$r->name] = json_decode($r->getWeekMenu());
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

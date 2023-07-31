<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//select 
$app->get('/locationAll', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $sql = "SELECT location_W.lid, country.name, location_W.lname, location_W.detail, location_W.image FROM country, location_W WHERE country.id = location_W.Cid ";
    $result = $conn->query($sql);
    
    $data = array();
    while(($row = $result->fetch_assoc()) !== null) {
        array_push($data,$row);

    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('Content-Type', 'application/json');
});

// select name 1 table
$app->get('/country', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $sql = "SELECT name FROM country";
    $result = $conn->query($sql);
    
    $data = array();
    while(($row = $result->fetch_assoc()) !== null) {
        array_push($data,$row);

    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('Content-Type', 'application/json');
});

// select for 1 bill ข้อ 2.1.2
$app->get('/localtion/{id}', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $code = $args['id'];
    $sql = "SELECT location_W.lid, location_W.lname, country.name, location_W.detail, location_W.image  FROM country, location_W WHERE location_W.Cid = country.id AND location_W.lid = {$code}";
    $result = $conn->query($sql);
    $data = array();
    while(($row = $result->fetch_assoc()) !== null) {
        array_push($data,$row);

    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('Content-Type', 'application/json');
});

//update ข้อ 2.1.3
$app->post('/update/locationAt/{id}', function (Request $request, Response $response, array $args) {

    $conn = $GLOBALS['dbconn'];
    $code = intval($args['id']);
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);
    $stmt = $conn->prepare("UPDATE location_W, country
                            SET location_W.lname = ?,
                                location_W.Cid = (  SELECT id
                                                    FROM country 
                                                    WHERE name = ?),
                                    location_W.detail = ?, 
                                    location_W.image = ?
                            WHERE   country.id = location_W.Cid 
                            AND     location_W.lid = ? ");
    $stmt->bind_param("ssssi",  $bodyArray['lname'], $bodyArray['name'], $bodyArray['detail'], $bodyArray['image'], $code);
    
    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result."".mysqli_error($conn));
    return $response->withHeader('Content-Type', 'application/json');
});

// update only json
$app->post('/update/json/', function (Request $request, Response $response, array $args) {

    $conn = $GLOBALS['dbconn'];
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);
 
    $stmt = $conn->prepare("UPDATE location_W, country
                            SET location_W.lname = ?,
                                location_W.Cid = (  SELECT id
                                                    FROM country 
                                                    WHERE name = ?),
                                    location_W.detail = ?, 
                                    location_W.image = ?
                            WHERE   country.id = location_W.Cid 
                            AND     location_W.lid = ? ");                        
    $stmt->bind_param("ssssi",  $bodyArray['lname'], $bodyArray['name'], $bodyArray['detail'], $bodyArray['lid'] );
    echo $bodyArray['lid'];
    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result."".mysqli_error($conn));
    return $response->withHeader('Content-Type', 'application/json');
});
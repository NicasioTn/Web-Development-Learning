<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
    

//select 
$app->get('/food', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $sql = "select * from food";
    $result = $conn->query($sql);
    
    $data = array();
    while($row = $result->fetch_assoc()) {
        array_push($data,$row);

    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('Content-Type', 'application/json');
});

// insert
$app->post('/food/insert', function (Request $request, Response $response, array $args) {

    $conn = $GLOBALS['dbconn'];
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);

    $stmt = $conn->prepare("INSERT INTO foodbill (oid, fid, name, price, many, sumBill, List) values(?,?,?,?,?,?,?)");
    $stmt->bind_param("iisiiii",  $bodyArray['oid'], $bodyArray['fid'], $bodyArray['name'], $bodyArray['price'],
            $bodyArray['many'], $bodyArray['sumBill'], $bodyArray['List'] );
    
    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result."".mysqli_error($conn));
    return $response->withHeader('Content-Type', 'application/json');
});

// select for showAllbill 
$app->get('/bill', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn'];
    $sql = "select * from billorder";
    $result = $conn->query($sql);
    // $num = $result->num_rows;
    $data = array();
    while($row = $result->fetch_assoc()) {
        array_push($data,$row);

    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('Content-Type', 'application/json');
});

// select for 1 bill 
$app->get('/bill/{code}', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $code = $args['code'];
    $sql = "select * from foodbill where List = {$code}";
    $result = $conn->query($sql);
    $data = array();
    while($row = $result->fetch_assoc()) {
        array_push($data,$row);

    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('Content-Type', 'application/json');
});

// insert bill 1 bill
$app->post('/food/bill', function (Request $request, Response $response, array $args) {

    $conn = $GLOBALS['dbconn'];
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);

    $stmt = $conn->prepare("INSERT INTO billorder (ListofBill , date, amount) values(?,?,?)");
    $stmt->bind_param("isi",  $bodyArray['ListofBill'], $bodyArray['date'], $bodyArray['amount']);
    
    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result."".mysqli_error($conn));
    return $response->withHeader('Content-Type', 'application/json');
});

// select for 1 bill 
$app->get('/sumBill/{code}', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $code = $args['code'];
    $sql = "select amount from billorder where ListofBill = {$code}";
    $result = $conn->query($sql);
    $data = array();
    while($row = $result->fetch_assoc()) {
        array_push($data,$row);

    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('Content-Type', 'application/json');
});






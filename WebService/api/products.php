<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//  Show All data in products
$app->get('/products', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn'];
    $sql = "select * from products";
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

//Insert Json
$app->post('/products/insert_json', function (Request $request, Response $response, $args) {
   // get from method post send by form
   $body = $request->getBody();
   $bodyArray = json_decode($body, true);

   $conn = $GLOBALS['dbconn'];
   // change to Updata statement
   $stmt = $conn->prepare("insert into products ".
   "(productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP)".
   "values (?,?,?,?,?,?,?,?,?)");
   $stmt->bind_param("ssssssidd",
   $bodyArray['productCode'], $bodyArray['productName'], $bodyArray['productLine'],
   $bodyArray['productScale'], $bodyArray['productVendor'], $bodyArray['productDescription'],
   $bodyArray['quantityInStock'], $bodyArray['buyPrice'], $bodyArray['MSRP'] );
   $stmt->execute();
   $result = $stmt->affected_rows; // number row of affected
   

   $response->getBody()->write($result."");
   return $response->withHeader('Content-Type', 'application/json');
});

// delete get
$app->get('/products/delete/{code}', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $code = $args['code'];

    $stmt = $conn->prepare("DELETE from products WHERE productCode = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result." ".$code);
    return $response;
});

// delete post
$app->post('/products/delete', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $code = $request->getParsedBody();

    $stmt = $conn->prepare("DELETE from products WHERE productCode = ?");
    $stmt->bind_param("s", $code['productCode']);
    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result." ".$code['productCode']);
    return $response;
});

//Edit post
$app->post('/products/edit', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $code = $request->getParsedBody();

    //catch data for math whith colum type
    $int1 = intval($code['quantityInStock']);
    $float1 = floatval($code['buyPrice']);
    $float2 = floatval($code['MSRP']);

    $stmt = $conn->prepare("Update products set ".
    "productName = ?, productLine = ?, productScale = ?, productVendor = ?, productDescription = ?, quantityInStock = ?, buyPrice = ?, MSRP = ?
    WHERE productCode = ?");
    $stmt->bind_param("sssssidds",
    $code['productName'], $code['productLine'], $code['productScale'], $code['productVendor'], $code['productDescription'], 
    $int1, $float1, $float2 ,
    $code['productCode']); // where 

    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result." ".$code['productCode']);
    return $response;
});

//edit json
$app->post('/products/edit/json', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $body = $request->getBody();
    $bodyArray = json_decode($body, true);
    //catch data for math whith colum type
    $int1 = intval($bodyArray['quantityInStock']);
    $float1 = floatval($bodyArray['buyPrice']);
    $float2 = floatval($bodyArray['MSRP']);

    $stmt = $conn->prepare("Update products set ".
    "productName = ?, productLine = ?, productScale = ?, productVendor = ?, productDescription = ?, quantityInStock = ?, buyPrice = ?, MSRP = ?
    WHERE productCode = ?");
    $stmt->bind_param("sssssidds",
    $bodyArray['productName'], $bodyArray['productLine'], $bodyArray['productScale'], $bodyArray['productVendor'], 
    $bodyArray['productDescription'], 
    $int1, $float1, $float2 ,
    $bodyArray['productCode']); // where 

    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result." ".$bodyArray['productCode']);
    return $response;
});

// search get
$app->get('/products/search/{code_Name}', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $code = $args['code_Name'];
    $sql = "select * from products where productCode like '%{$code}%' OR productName like '%{$code}%'";
    $result = $conn->query($sql);
    $data = array();
    while($row = $result->fetch_assoc()) {
        array_push($data,$row);

    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('Content-Type', 'application/json');
});

// search post
$app->post('/products/search', function (Request $request, Response $response, array $args) {
    $conn = $GLOBALS['dbconn'];
    $code = $request->getParsedBody();

    $param = "%{$code['key']}%";
    $stmt = $conn->prepare("SELECT * FROM products WHERE productCode LIKE ? OR productName like ?");
    $stmt->bind_param("ss", $param, $param);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $data = array();
    while ($row = $result->fetch_assoc()) {
       array_push($data, $row);
    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('Content-Type', 'application/json');
});



?>



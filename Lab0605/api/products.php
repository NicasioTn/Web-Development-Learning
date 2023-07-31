<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//  select * from products and connect to Database 
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

//  select only code
$app->get('/products/{product_code}', function (Request $request, Response $response, array $args) {
    
    $pCode = $args['product_code'];
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare("select * from products where productCode = ?");
    $stmt->bind_param("s", $pCode);
    $stmt->execute();
    $result = $stmt->get_result();

    // $num = $result->num_rows;
    $data = array();
    while($row = $result->fetch_assoc()) {
        array_push($data,$row);

    }
    $json = json_encode($data);
    $response->getBody()->write($json);
    return $response->withHeader('Content-Type', 'application/json');
});

// POST => Insert data or Update data
$app->post('/products', function (Request $request, Response $response, array $args) {
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
    $bodyArray['quantityInStock'], $bodyArray['buyPrice'], $bodyArray['MSRP'], );
    $stmt->execute();
    $result = $stmt->affected_rows; // number row of affected
    

    $response->getBody()->write($result."");
    return $response->withHeader('Content-Type', 'application/json');
});
?>
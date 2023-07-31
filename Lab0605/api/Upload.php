<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


 
function base64_to_file($base64_string, $output_file){
    $ifp = fopen($output_file, 'wb');
    $data = explode(',' , $base64_string);
    // header, base64
    if(count($data) == 2){
        fwrite($ifp, base64_decode($data[1]));
    }else{
        fwrite($ifp, base64_decode($data[0]));
    }
    fclose($ifp);
    return $output_file;
}
//  select * from products and connect to Database 
$app->post('/Upload', function (Request $request, Response $response, array $args) {
    
    $json = $request->getBody();
    $jsonArray = json_decode($json, true);
    // check data
    if(array_key_exists('filename', $jsonArray)) {
        try{
            base64_to_file($jsonArray['base64'], __DIR__ . '/../files/' . 
            $jsonArray['filename']);

            $response->getBody()->write(json_encode("Success"));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(200);

        }catch(Exception $ex){
            $response->getBody()->write(json_encode($ex));
            return $response->withHeader('Content-Type', 'application/json')->withStatus(400);
        }
    }else{
        $response->getBody()->write(json_encode("No filename"));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(400);

    }
    
});


?>
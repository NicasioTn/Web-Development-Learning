<?php

ini_set('display_errors',1);
error_reporting(E_ALL);
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;



function get_emailDB($conn, $in_email)
{
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare("select email from employees where email=? ");
    $stmt->bind_param("s", $in_email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1)
    {
        $row = $result->fetch_assoc();
        return $row["email"];
    }
    else{
        return "";
    }
}
function get_passwordDB($conn, $in_email)
{
    $conn = $GLOBALS['dbconn'];
    $stmt = $conn->prepare("select password from employees where email=?");
    $stmt->bind_param("s", $in_email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows == 1)
    {
        $row = $result->fetch_assoc();
        return $row["password"];
    }
    else{
        return "";
    }
}

//  Login post 1234
$app->post('/employees/login', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn'];
    $info_login = $request->getParsedBody();
    
    $in_email = $info_login['email'];
    $in_password = $info_login['password'];

    $emailDB = get_emailDB($conn, $in_email);
    $pwdDB = get_passwordDB($conn, $in_email);

    if(strcmp($in_email, $emailDB) == 0){
        if(password_verify($in_password, $pwdDB)){
            $result = "success";
        }
        else{
            $result = "unsuccess";
        }
    }

    $s = strcmp($in_email, $emailDB);
    $response->getBody()->write("email=".$emailDB ."\npassword=". $pwdDB ."\nverify email = ".$s ."\n".$result );
    return $response;
});

//change password
$app->post('/employees/change_password', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn'];
    $info_login = $request->getParsedBody();
    
    $in_email = $info_login['email'];
    $in_password = $info_login['password'];
    $new_password = $info_login['newpassword'];

    $emailDB = get_emailDB($conn, $in_email);
    $pwdDB = get_passwordDB($conn, $in_email);

    if(strcmp($in_email, $emailDB) == 0){
        if(password_verify($in_password, $pwdDB)){
            // $result = "success";
            $stmt = $conn->prepare("update employees set password = ? where password = ?");
            $stmt->bind_param("ss", $new_password, $pwdDB);
            $stmt->execute();
            $result = $stmt->affected_rows;
            if($result == 1)
            {
                $text = "change success";
            }
            else{
                $text = "change unsuccess";
            }
            
        }
        else{
            $text = "password not match";
        }
    }

    $s = strcmp($in_email, $emailDB);
    $response->getBody()->write("email=".$emailDB ."\nOldpassword=". $pwdDB ."\nverify email = ".$s ."\n".$text );
    return $response;
});

// insert password
$app->post('/employees/insertpassword', function (Request $request, Response $response, array $args) {
    
    $conn = $GLOBALS['dbconn'];
    $info = $request->getParsedBody();
    
    $in_employeeNumber = $info['employeeNumber'];
    $in_email = $info['email'];
    $in_pwd = $info['password'];
    $hased = password_hash($in_pwd , PASSWORD_DEFAULT);

    $stmt = $conn->prepare("update employees set password = ? where employeeNumber = ? and email = ?");
    $stmt->bind_param("sss", $hased,  $in_employeeNumber,  $in_email);
    $stmt->execute();
    $result = $stmt->affected_rows;
    $response->getBody()->write($result." ".$hased);
    return $response;
});
    
    
?>
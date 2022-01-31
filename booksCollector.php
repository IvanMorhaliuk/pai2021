<?php
$contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';
if($contentType === 'application/json'){
    $content = file_get_contents("php://input");
    $decoded = json_decode($content,true);
    header('Content-Type: application/json');
    http_response_code(200);
    $decoded['bookContentHtml'] .= "hello";
    echo json_encode($decoded['bookContentHtml']);
}

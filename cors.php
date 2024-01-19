<?php
// cors.php

// set CORS headers to allow cross-origin requests
// need it since i am running both a reactjs and a php server
header("Access-Control-Allow-Origin: *"); // Adjust this to restrict origins if needed
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// check if it's an OPTIONS request (preflight request)
// preflight request: browser sends a request to check if the actual request is allowed.
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200); // Respond with 200 OK for preflight requests
    exit();
}

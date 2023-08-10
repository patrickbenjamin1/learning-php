<?php
// get thing id from path

$things = getAllThings();

http_response_code(200);
echo json_encode($things);
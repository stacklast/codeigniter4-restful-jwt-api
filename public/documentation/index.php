<?php
require("../../vendor/autoload.php");
		
// $openapi = \OpenApi\Generator::scan([$_SERVER['DOCUMENT_ROOT']]);
$openapi = \OpenApi\Generator::scan(['../../app/Controllers/']);

header('Content-Type: application/json');
echo $openapi->toJSON();
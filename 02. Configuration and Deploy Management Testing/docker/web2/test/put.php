<?php
$key = ($_REQUEST['apikey'])?$_REQUEST['apikey']:'';
function getHeaders()
{
	$headers = array();
	if (function_exists('apache_request_headers'))
	{
		$headers = apache_request_headers();
	}
	else
	{
		foreach ($_SERVER as $k => $v)
		{
			if (substr($k, 0, 5) == "HTTP_")
			{
				$k = str_replace(' ', '-', str_replace('_', ' ', ucwords(strtolower(substr($k, 5)))));
				$headers[$k] = $v;
			}
		}
	}
	return $headers;
}
$verb = strtolower($_SERVER['REQUEST_METHOD']);
$data	= array();
switch ($verb)
{
	case 'get':
		$data = $_GET;
		break;
	case 'post':
		$data = $_POST;
		break;
	case 'put':
		parse_str(file_get_contents('php://input'), $put_data);
		$data = $put_data;
		break;
}

print <<<EOD1
<!DOCTYPE html>
<html>
<head><title>test</title></head>
<body><pre>
<b>Request:</b>


EOD1;
print_r($_REQUEST);

echo "\n\n<b>Headers:</b>\n\n";
print_r(getHeaders());

echo "\n\n<b>Verb:</b>\n\n";
print_r($verb);

echo "\n\n<b>Data:</b>\n\n";
print_r($data);
print <<<EOD
</pre>
</body></html>

EOD;
?>
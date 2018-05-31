<?php
header("Content-Type: application/json; charset=utf-8");
//↑data is json 

$return_data = array(
	
	'name' => '記念祭',
	'date' => array(
			array(
				'start' => date(DATE_ATOM, mktime(12, 0, 0, 9, 29, 2018)),
				'end' => date(DATE_ATOM, mktime(16, 0, 0, 9, 29, 2018))
			),
			array(
				'start' => date(DATE_ATOM, mktime(9, 0, 0, 9, 30, 2018)),
				'end' => date(DATE_ATOM, mktime(15, 0, 0, 9, 30, 2018))
			),
		),
	'location' => '東区のどこか'
	);

echo json_encode($return_data);

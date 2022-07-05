<?php 

function getDatabase() {
	$json = file_get_contents("data/data.json");
	if ($json) {
		return json_decode($json, true);
	} else {
		return [
			"name" => "databaseName",
			"lastUpdated" => date('a'),
			"articles" => [

			],
		];
	}
}

function getArticles() {
	$data = getDatabase();
	$articles = $data["articles"];
	return $articles;
}

function createRecord($record) {
	$data = getDatabase();
	$id = uniqid("a");
	$data["articles"][$id] = $record;
	$json = json_encode($data);
	file_put_contents("data/data.json", $json);
}


function deleteRecord($id) {
	$data = getDatabase();
	unset($data["articles"][$id]);
	$json = json_encode($data);
	file_put_contents("data/data.json", $json);
}


?>
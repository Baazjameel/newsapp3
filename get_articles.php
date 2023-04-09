<?php
$api_key = '6dfa5e9547964295af63a9e3a33d4b7d';

$url = 'https://newsapi.org/v2/top-headlines?';

$category = $_POST['category'];

$query_parameters = array(
  'category' => $category,
  'sortBy' => 'top',
  'country' => 'gb',
  'apiKey' => $api_key
);

$url .= http_build_query($query_parameters);

$response = file_get_contents($url);

$articles = json_decode($response)->articles;

$results = array();

foreach ($articles as $article) {
  $results[] = array(
    'title' => $article->title,
    'url' => $article->url
  );
}

echo json_encode($results);
?>

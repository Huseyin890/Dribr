<?php

$video = json_decode(file_get_contents('https://driveplyr.appspages.online/dashboard/api/video.php?id='.$_GET['id']));

//print_r($video);
echo $poster_url = $video['poster_url'];
echo $title = $video['title'];
echo $views = $video['views'];
echo $downloads = $video['downloads'];
echo $description = $video['description'];

//

if(isset($_GET['player'])){
  $player = $_GET['player'];
}
$videourl = 'https://driveplyr.appspages.online/dashboard/api/getvideo.php?id='.$_GET['id'];

//include 'player/griffith.php';

?>
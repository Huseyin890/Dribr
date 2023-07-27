<?php

include 'func.php';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../logo.png" type="image/x-icon">
    <!-- Material Icons -->
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=64bd1f4e71afd40013e96b95&product=sop' async='async'></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- CSS File -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.1.0/lux/bootstrap.min.css"/>
    <link rel="stylesheet" href="../../styles.css" />
    <title>DrivePlyr</title>
    
<link rel="manifest" href="../../manifest.json">
<meta name="theme-color" content="#007bff">

    <script>
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
      navigator.serviceWorker.register('../../sw.js')
        .then((registration) => {
          console.log('ServiceWorker registration successful with scope:', registration.scope);
        })
        .catch((error) => {
          console.log('ServiceWorker registration failed:', error);
        });
    });
  }
</script>

  </head>
  <body>
    <!-- Header Starts -->
    <div class="header">
      <div class="header__left">
        <i id="menu" class="material-icons">menu</i>
        <img
          src="https://driveplyr.appspages.online/dp.png"
          alt=""
        />
      </div>

      <div class="header__search">
        <form action="">
          <input type="text" placeholder="Search" />
          <button><i class="material-icons">search</i></button>
        </form>
      </div>

      <div class="header__icons">
        <i class="material-icons display-this">search</i>
        <i class="material-icons">videocam</i>
        <i class="material-icons">apps</i>
        <i class="material-icons">notifications</i>
       <a href="../../dashboard/"><i class="material-icons display-this">account_circle</i></a>
      </div>
    </div>
    
    <!-- Header Ends -->

    <!-- Main Body Starts -->
    <div class="mainBody">
      <!-- Sidebar Starts -->
      <div class="sidebar">
        <div class="sidebar__categories">
          <div class="sidebar__category">
            <i class="material-icons">home</i>
            <span>Home</span>
          </div>
          <div class="sidebar__category">
            <i class="material-icons">local_fire_department</i>
            <span>Trending</span>
          </div>
          <div class="sidebar__category">
            <i class="material-icons">subscriptions</i>
            <span>Subcriptions</span>
          </div>
        </div>
        <hr />
        <div class="sidebar__categories">
          <div class="sidebar__category">
            <i class="material-icons">library_add_check</i>
            <span>Library</span>
          </div>
          <div class="sidebar__category">
            <i class="material-icons">history</i>
            <span>History</span>
          </div>
          <div class="sidebar__category">
            <i class="material-icons">play_arrow</i>
            <span>Your Videos</span>
          </div>
          <div class="sidebar__category">
            <i class="material-icons">watch_later</i>
            <span>Watch Later</span>
          </div>
          <div class="sidebar__category">
            <i class="material-icons">thumb_up</i>
            <span>Liked Videos</span>
          </div>
          <div class="sidebar__category">
            <!-- <i class="material-icons">thumb_up</i> -->
           <a href="tos.php"><span>Terms of Service</span></a> 
          </div>
        </div>
        <hr />
      </div>
      <!-- Sidebar Ends -->
      <!-- Videos Section -->
      <div class="videos">
      <!DOCTYPE html>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
  /* Custom CSS for the circular logo with background image */
  .user-logo {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background-color: #f2f2f2;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background-image: url('background.jpg'); /* Replace 'background.jpg' with the actual background image URL */
    background-size: cover;
  }
  .user-logo img {
    max-width: 100%;
    max-height: 100%;
  }
</style>
</head>
<body>
<div class="container-fluid">
  <div class="card">
    <div class="card-body text-center">
      <!-- Circular logo with background image -->
      <div class="user-logo mx-auto mb-4">
        <!-- Replace 'logo.png' with the actual logo image URL -->
        <img src="https://i.imgur.com/n5MBy0m.jpg" alt="Logo">
      </div>

      <!-- User Name -->
      <h4 class="card-title"><?php echo getUser($_GET['id'])[0]->name ; ?></h4>

      <!-- Website -->
      <p class="card-text"><a href="https://appspages.online" target="_blank">www.appspages.online</a></p>

      <!-- Follow button (you can replace '#' with the follow action URL) -->
      <button class="btn btn-primary mb-3" onclick="followUser('#')">Follow</button>

      <!-- Row with number of followers, views, and videos -->
      <div class="row text-center">
        <div class="col">
          <h5>100</h5>
          <p>Followers</p>
        </div>
        <div class="col">
          <h5>500</h5>
          <p>Views</p>
        </div>
        <div class="col">
          <h5>50</h5>
          <p>Videos</p>
        </div>
      </div>
    </div>
  </div>
</div>



        <h1>Videos From <?php echo getUser($_GET['id'])[0]->name ; ?></h1>

        <div class="videos__container">
        <?php
        
        
        // Example usage:
        $viewsCount = 1000;

        include 'conn.php';
// Retrieve the video list from the database
$user = $_SESSION['id'];
$uploader = $_GET['id'];
$sql = "SELECT * FROM videos where user = $uploader";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through each video and generate the table rows
    while ($row = $result->fetch_assoc()) {
        $videoId = $row['id'];
        $videoTitle = $row['title'];
        $videoPosterURL = $row['poster_url'] ?: 'https://driveplyr.appspages.online/dashboard/api/Image_not_available.png';
        $videoStatus = 'Public';//$row['status'];
        $videoViews = $row['views'];
        $videoDownloads = $row['downloads'];
        $videoScore = '100%';//$row['progress'];
        $userid = $row['user'];

        echo '          <!-- Single Video starts -->
        <div class="video">
          <div class="video__thumbnail">
          <a href="../watch/'.$videoId.'/'.generateSlug($videoTitle).'">
          <img src="'.$videoPosterURL.'" alt="" />
          </a>
          </div>
          <div class="video__details">
            <div class="author">
              <img src="http://aninex.com/images/srvc/web_de_icon.png" alt="" />
            </div>
            <div class="title">
              <h3>
              <a href="../watch/'.$videoId.'/'.generateSlug($videoTitle).'">
                '.$videoTitle.' 
              </a>
                </h3>
              <a href="../channel/'.$userid.'">'.getUser($userid)[0]->name.'</a>
              <span>'.formatViewsCount($videoViews).' Views • '.convertToRelativeTime($row['date']).'</span>
            </div>
          </div>
        </div>
        <!-- Single Video Ends -->
';
    }
} else {
    echo '<tr><td colspan="6">No videos found.</td></tr>';
}
?>


        </div>
      </div>
    </div>
    <script>
        const menu = document.querySelector('#menu');
console.log(menu);
const sidebar = document.querySelector('.sidebar');
console.log(sidebar);

menu.addEventListener('click', function () {
  sidebar.classList.toggle('show-sidebar');
});

    </script>
    <style>
      /* Media query for max-width 450px */
@media (max-width: 450px) {
  .video {
    width: 100%;
  }
}
    </style>
    <!-- Main Body Ends -->
  </body>
</html>

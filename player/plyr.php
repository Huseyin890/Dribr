
<link rel="icon" href="drive-logo.png">
<title><?php echo $title ?></title>
<style>
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

.plyr  {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  /*object-fit: cover;
  z-index: -1;*/
}
</style>
<!-- Docs styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/CDNSFree2/Plyr/plyr.css" />

<!--Add a Simple HTML5 Video tag-->
<div id="container">
  <video controls poster="<?php echo $videourl ?>" id="vid1">
    <!-- Video files -->
    <source src="<?php echo $poster_url ?>" type="video/mp4" size="576" />

  </video>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.7/plyr.min.js"></script>

<script>
  var controls =
[
    'play-large', // The large play button in the center
   // 'restart', // Restart playback
   // 'rewind', // Rewind by the seek time (default 10 seconds)
    'play', // Play/pause playback
    'fast-forward', // Fast forward by the seek time (default 10 seconds)
    'progress', // The progress bar and scrubber for playback and buffering
    'current-time', // The current time of playback
    'duration', // The full duration of the media
    'mute', // Toggle mute
    'volume', // Volume control
    'captions', // Toggle captions
    'settings', // Settings menu
    'pip', // Picture-in-picture (currently Safari only)
    'airplay', // Airplay (currently Safari only)
    //'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
    'fullscreen' // Toggle fullscreen
];

  const player = new Plyr('#vid1',{controls});
</script>

<style>
  :root {
  --plyr-color-main: #e657ff;
    --plyr-video-control-color  :#e8ffba;
}

</style>



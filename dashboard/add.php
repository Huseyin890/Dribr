<!DOCTYPE html>
<html>
<head>
  <?php 
  include 'head.php';
  ?>
  <script>
    function checkVideoURL() {
      const urlParams = new URLSearchParams(window.location.search);
      const videoURL = urlParams.get('video');

      if (videoURL) {
        alert('Video URL: ' + videoURL);
      }
    }
  </script>
</head>
<body>
  <!-- Sidenav -->
  <?php include 'nav.php' ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include 'topnav.php' ?>
    <!-- Page content -->
    <div class="container-fluid mt-6">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <video width="100%" height="" controls>
            <source src="https://bit.ly/bbsamplevideo" type="video/mp4">
          </video>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Edit profile</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form class="needs-validation" action="api/upload.php" method="post" enctype="multipart/form-data">
                <h6 class="heading-small text-muted mb-6">Video information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-url">Video URL</label>
                        <input id="input-url" class="form-control" placeholder="Video URL" name="url" value="" type="text" required>
                        <div class="invalid-feedback">
                          Please enter a valid video URL.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-hosting">Hosting</label>
                        <input id="input-hosting" class="form-control" name="hosting" readonly placeholder="Do not edit">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-title">Title</label>
                        <input type="text" id="input-title" class="form-control" placeholder="Title" name="title" value="" required>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-description">Description</label>
                        <textarea rows="1" class="form-control" placeholder="Description" name="description" required></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-allow-download">Allow download</label>
                        <input type="checkbox" id="input-allow-download" class="form-control" name="allow_download" value="1">
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="form-group">
                        <label class="form-control-label" for="input-poster">Poster URL</label>
                        <input type="text" id="input-poster" class="form-control" placeholder="Poster URL" name="poster_url" value="">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4"></hr>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Upload</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <?php include 'footer.php' ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="https://cdn.jsdelivr.net/gh/creativetimofficial/argon-dashboard-bs4@main/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/creativetimofficial/argon-dashboard-bs4@main/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/creativetimofficial/argon-dashboard-bs4@main/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/creativetimofficial/argon-dashboard-bs4@main/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/creativetimofficial/argon-dashboard-bs4@main/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Argon JS -->
  <script src="https://cdn.jsdelivr.net/gh/creativetimofficial/argon-dashboard-bs4@main/assets/js/argon.js?v=1.2.0"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      checkVideoURL();
    });
  </script>
</body>
</html>
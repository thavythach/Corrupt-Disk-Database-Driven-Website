<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../../../favicon.ico">

    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

		<title>Databases Home Page</title>
	</head>
	<body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">TeamCorruptDisk</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="showPassengers.php">Show All Passengers <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="showPassengers.php">Show All Passengers <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="insertPass.php">Create Passenger <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="sqlquery.php">SQL Form <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="img/banner.jpg" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <h1>Welcome to our page!</h1>
                <p>This page was made by a trio of college seniors with a vision and a dream. Please support us by donating to help fund our use of AWS to keep this page (and our dream) alive.</p>
                <p><a class="btn btn-lg btn-primary" href="showPassengers.php" role="button">Show All Passengers</a></p>
              </div>
            </div>
          </div>
          <!-- <div class="carousel-item">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
              <div class="carousel-caption">
                <h1>Another example headline.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
              <div class="carousel-caption text-right">
                <h1>One more for good measure.</h1>
                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
              </div>
            </div>
          </div>
        </div> -->
      </div>

      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Questions from <span class="text-muted">Assignment 1</span></h2>
          </div>
          <div class="col-md-5">
            <ol>
							<li>sudo service httpd status</li>
              <li>A GET command will retrieve the specified data from the server, POST adds it to the server, and HEAD retrieves metadata.</li>
              <li>ServerRoot contains the files for the server. DocumentRoot contains the files for the webpages that are sent through the server</li>
              <li>The default value is Port 80.</li>
              <li>/var/www/html/index.html (the document root)</li>
              <li>the config file specifies an {APACHE_LOG_DIR} that stores all the logs. The tail command is used to access the last few lines of a file.</li>
              <li>A directory index file is one that is specified to display when a user tries to look in a specific directory, and this is useful to offer the user a default page.</li>
              <li>A VirtualHost block needs to be added to ports.conf and modified in 000-default.conf:
                <code>
                  <br>
                  Listen 80 <br>
                  Listen 8080 <br>
                  &lt;VirtualHost *:80&gt;<br>
                	&nbsp DocumentRoot "/var/www/html/teamcorruptdisk"
                  &lt;/VirtualHost&gt;.
              </code>
            </li>
              <li>A password-protected file needs to have an htpasswd file and that must be referenced in the htaccess file which establishes requirements to access that directory.</li>
              <li>Automatic redirection requires us to find the 404 error contingency and have it refer to a file of our choice.</li>
						</ol>
          </div>
        </div>

        <hr class="featurette-divider">

      <!--   <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Questions from <span class="text-muted">Assignment 2</span></h2>
          </div>
          <div class="col-md-5 order-md-1">
            <h1 class="text-muted">Under Construction</h1>
          </div>
        </div>

        <hr class="featurette-divider"> -->

        <!-- Three columns of text below the carousel -->
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/nick.jpg" alt="Nick Profile Picture" width="140" height="140">
            <h2>Nick Bigger</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn btn-secondary" href="https://github.com/nbigger" role="button">View GitHub &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/thavy.jpg" alt="Thavy Profile Picture" width="140" height="140">
            <h2>Thavy Thach</h2>
            <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
            <p><a class="btn btn-secondary" href="https://github.com/thavythach" role="button">View GitHub &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="img/jake.jpg" alt="Jake Profile Picture" width="140" height="140">
            <h2>Jake Redmond</h2>
            <p>Just learned how to use a list item in html and ready to go.</p>
            <p><a class="btn btn-secondary" href="https://github.com/Jakeredmond22" role="button">View GitHub &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2018-2019 TeamCorruptDisk, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
  </body>
</html>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Criss - The most the bester of bests</title>

    <!-- Podstawowe wbudowane style CSS bootstrapa -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Dodatkowe czcionki do tego szablonu-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

     <!-- Moje nadpisane style bootstrapa -->
    <link href="css/nowestyle.css" rel="stylesheet">
    <style>
      .error {
        color: red;
        margin-top: 10px;
        margin-bottom: 10px;
      }
    </style>


    <!-- Recaptcha-->
    <script src='https://www.google.com/recaptcha/api.js'></script>

  </head>

  <body id="page-top">

    <!-- Nawigacja -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Be like Criss!</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#registration">Rejestracja</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#logon">Logowanie</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
           <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Nagłówek -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To Our Studio!</div>
          <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
        </div>
      </div>
    </header>

    <!-- Rejestracja -->
    <section id="registration">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Rejestracja</h2>
            <h3 class="section-subheading text-muted">Zarejestruj się.</h3>

            <?php
            include('rejestracja.php');
            ?>

              <form action="rejestracja.php" method="post">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <input class="form-control" name="nick" type="text" value="<?php
                              if (isset($_SESSION['fr_nick'])) {
                                  echo $_SESSION['fr_nick'];
                                  unset($_SESSION['fr_nick']);
                              }
                              ?>" placeholder="Your Nick *" required="required" data-validation-required-message="Please enter your name.">
                              <?php
                              if (isset($_SESSION['e_nick'])) {
                                  echo '<div class="error">' . $_SESSION['e_nick'] . '</div>';
                                  unset($_SESSION['e_nick']);
                              }
                              ?>
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="haslo1" type="password" value="<?php
                              if (isset($_SESSION['fr_haslo1'])) {
                                  echo $_SESSION['fr_haslo1'];
                                  unset($_SESSION['fr_haslo1']);
                              }
                              ?>" placeholder="Your password *" required="required" data-validation-required-message="Please enter your password.">
                              <?php
                              if (isset($_SESSION['e_haslo'])) {
                                  echo '<div class="error">' . $_SESSION['e_haslo'] . '</div>';
                                  unset($_SESSION['e_haslo']);
                              }
                              ?>
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="haslo2" type="password" value="<?php
                              if (isset($_SESSION['fr_haslo2'])) {
                                  echo $_SESSION['fr_haslo2'];
                                  unset($_SESSION['fr_haslo2']);
                              }
                              ?>" placeholder="Your password *" required="required" data-validation-required-message="Please enter your password.">
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="imie" type="text" value="<?php
                              if (isset($_SESSION['fr_imie'])) {
                                  echo $_SESSION['fr_imie'];
                                  unset($_SESSION['fr_imie']);
                              }
                              ?>" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                              <?php
                              if (isset($_SESSION['e_imie'])) {
                                  echo '<div class="error">' . $_SESSION['e_imie'] . '</div>';
                                  unset($_SESSION['e_imie']);
                              }
                              ?>
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="nazwisko" type="text" value="<?php
                              if (isset($_SESSION['fr_naziwsko'])) {
                                  echo $_SESSION['fr_naziwsko'];
                                  unset($_SESSION['fr_naziwsko']);
                              }
                              ?>" placeholder="Your Surname *" required="required" data-validation-required-message="Please enter your surname.">
                              <?php
                              if (isset($_SESSION['e_nazwisko'])) {
                                  echo '<div class="error">' . $_SESSION['e_nazwisko'] . '</div>';
                                  unset($_SESSION['e_nazwisko']);
                              }
                              ?>
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="email" type="text" value="<?php
                              if (isset($_SESSION['fr_email'])) {
                                  echo $_SESSION['fr_email'];
                                  unset($_SESSION['fr_email']);
                              }
                              ?>" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                              <?php
                              if (isset($_SESSION['e_email'])) {
                                  echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
                                  unset($_SESSION['e_email']);
                              }
                              ?>
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="miasto" value="<?php
                              if (isset($_SESSION['fr_miasto'])) {
                                  echo $_SESSION['fr_miasto'];
                                  unset($_SESSION['fr_miasto']);
                              }
                              ?>" type="text" placeholder="Your Miasto *" required="required" data-validation-required-message="Please enter your city.">
                              <?php
                              if (isset($_SESSION['e_miasto'])) {
                                  echo '<div class="error">' . $_SESSION['e_miasto'] . '</div>';
                                  unset($_SESSION['e_miasto']);
                              }
                              ?>
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                              <input class="form-control" name="adres" value="<?php
                              if (isset($_SESSION['fr_adres'])) {
                                  echo $_SESSION['fr_adres'];
                                  unset($_SESSION['fr_adres']);
                              }
                              ?>" type="text" placeholder="Your Adres *" required="required" data-validation-required-message="Please enter your address.">
                              <?php
                              if (isset($_SESSION['e_adres'])) {
                                  echo '<div class="error">' . $_SESSION['e_adres'] . '</div>';
                                  unset($_SESSION['e_adres']);
                              }
                              ?>
                              <p class="help-block text-danger"></p>
                          </div>
                      </div>

                      <?php
                      if (isset($_SESSION['e_regulamin'])) {
                          echo '<div class="error">' . $_SESSION['e_regulamin'] . '</div>';
                          unset($_SESSION['e_regulamin']);
                      }
                      ?>
                      </div>

                  <div class="g-recaptcha" data-sitekey="6LcRhYwUAAAAAO8kw2GQkyKzmVr8cGVM4cPIjQvV"></div>
                  <?php
                  if (isset($_SESSION['e_captcha'])) {
                      echo '<div class="error">' . $_SESSION['e_captcha'] . '</div>';
                      unset($_SESSION['e_captcha']);
                  }
                  ?>
                  <label>
                      <input type="checkbox" name="regulamin"<?php
                      if (isset($_SESSION['fr_regulamin'])) {
                          echo "checked";
                          unset($_SESSION['fr_regulamin']);
                      }
                      ?>>Akceptuję regulamin
                  </label>
                  <br/>

                      <div class="clearfix"></div>
                      <div class="col-lg-12 text-center">
                          <div id="success"></div>
                          <input id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit" value="Zarejestruj się"></input>
                      </div>
              </form>







              </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">E-Commerce</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Responsive Design</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Web Security</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Logowanie -->
    <section id="logon">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Logowanie</h2>
            <h3 class="section-subheading text-muted">Zaloguj się.</h3>



            <form action="zaloguj.php" method="post">
                <div class="row text align-content-center"">
                    <div class="col-lg-12  text-center">
                        <div class="form-group">
                            <input class="form-control" name="login" type="text" placeholder="Your Login *" required="required" data-validation-required-message="Please enter your login.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="haslo" type="password" placeholder="Your Password *" required="required" data-validation-required-message="Please enter your password.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-12 text-center">
                        <div id="success"></div>
                        <input value="Zaloguj się" id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit"><br /><br /><br />

                </div>
            </form>


        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">E-Commerce</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Responsive Design</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-lock fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Web Security</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Portfolio -->
    <section class="bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Portfolio</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/01-thumbnail.jpg" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Threads</h4>
                        <p class="text-muted">Illustration</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/02-thumbnail.jpg" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Explore</h4>
                        <p class="text-muted">Graphic Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/03-thumbnail.jpg" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Finish</h4>
                        <p class="text-muted">Identity</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/04-thumbnail.jpg" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Lines</h4>
                        <p class="text-muted">Branding</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/05-thumbnail.jpg" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Southwest</h4>
                        <p class="text-muted">Website Design</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fas fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="img/portfolio/06-thumbnail.jpg" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Window</h4>
                        <p class="text-muted">Photography</p>
                    </div>
                </div>
            </div>
        </div>


    </section>

    <!-- O mnie  -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
                </div>
                <div class="timeline-panel">
                    <div id="show_account">
                        <?php
                        if (isset($_SESSION['zalogowany'])) {
                            echo '<div class="timeline-heading">';
                            echo "[<a href='#' class='js-scroll-trigger' onclick='return show()'>Edycja konta</a>] [<a href=\"logout.php\">Wyloguj się!</a>] [<a href='usun.php'>Usuwanie konta</a>]<br/><br/>";

                            echo "<h4>Witaj " . $_SESSION['user'] . '!</h4>';
                            echo "<h4 class='subheading'>Imię: " . $_SESSION['imie'] . "</h4><br />";
                            echo "<h4 class='subheading'>Nazwisko: " . $_SESSION['nazwisko'] . "</h4><br />";
                            echo '</div>          <div class="timeline-body">';
                            echo '<p class="text-muted">Email: ' . $_SESSION['email'] . "</p><br />";
                            echo '<p class="text-muted">Miasto: ' . $_SESSION['miasto'] . "</p><br />";
                            echo '<p class="text-muted">Adres: ' . $_SESSION['adres']. "</p><br/>";
                            echo '</div>';
                        }

                        ?>
                    </div>
                    <?php
                    include('edycja.php');
                    ?>
                    <div id="show_edition" style="display: none">
                        <a href='#' onclick='return hide()' class='js-scroll-trigger'>Wróć</a><br/><br/>
                        <!--            <a href="zmianahasla.php">Zmiana hasła</a><br/><br/>-->
                        <!--            <a href="usun.php">Usuń konto</a><br/><br/>-->

                        <form method="post">
                            Imię: <br/><input type="text" value="<?php
                            echo $_SESSION['imie'];
                            ?>" name="imie"/><br/>
                            <?php
                            if (isset($_SESSION['e_imie'])) {
                                echo '<div class="error">' . $_SESSION['e_imie'] . '</div>';
                                unset($_SESSION['e_imie']);
                            }
                            ?>
                            Nazwisko: <br/><input type="text" value="<?php
                            echo $_SESSION['nazwisko'];
                            ?>" name="nazwisko"/><br/>
                            <?php
                            if (isset($_SESSION['e_nazwisko'])) {
                                echo '<div class="error">' . $_SESSION['e_nazwisko'] . '</div>';
                                unset($_SESSION['e_nazwisko']);
                            }
                            ?>
                            E-mail: <br/><input type="email" value="<?php
                            echo $_SESSION['email'];
                            ?>" name="email"/><br/>
                            <?php
                            if (isset($_SESSION['e_email'])) {
                                echo '<div class="error">' . $_SESSION['e_email'] . '</div>';
                                unset($_SESSION['e_email']);
                            }
                            ?>
                            Miasto: <br/><input type="text" value="<?php
                            echo $_SESSION['miasto'];
                            ?>" name="miasto"/><br/>
                            <?php
                            if (isset($_SESSION['e_miasto'])) {
                                echo '<div class="error">' . $_SESSION['e_miasto'] . '</div>';
                                unset($_SESSION['e_miasto']);
                            }
                            ?>
                            Adres: <br/><input type="text" value="<?php
                            echo $_SESSION['adres'];
                            ?>" name="adres"/><br/>
                            <?php
                            if (isset($_SESSION['e_adres'])) {
                                echo '<div class="error">' . $_SESSION['e_adres'] . '</div>';
                                unset($_SESSION['e_adres']);
                            }
                            ?>
                            Hasło: <br/><input type="password" name="haslo1"/><br/>

                            <input type="submit" value="Edytuj">
                        </form>
                        <?php
                        if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
                        ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Your Website 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Threads</li>
                    <li>Category: Illustration</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Explore</li>
                    <li>Category: Graphic Design</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/03-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Finish</li>
                    <li>Category: Identity</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/04-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Lines</li>
                    <li>Category: Branding</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/05-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Southwest</li>
                    <li>Category: Website Design</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Project Name</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Window</li>
                    <li>Category: Photography</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    if (isset($_SESSION['blad'])) echo $_SESSION['blad'];
    ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
    <script>
        function show() {
            document.getElementById('show_edition').style.display = 'block';
            document.getElementById('show_account').style.display = 'none';
        }

        function hide() {
            document.getElementById('show_account').style.display = 'block';
            document.getElementById('show_edition').style.display = 'none';
        }

    </script>
  </body>

</html>

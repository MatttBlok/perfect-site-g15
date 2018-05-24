<?php

require_once '../includes/connection.php';

$request = "SELECT 
`id`, `category`, `title`, `subtitle`, `content`, `imgSrc`, `imgAlt`, `imgTitle`, `publishedDate`, `author`, `signature`, `logoSrc`, `logoAlt`, `logoTitle` 
FROM
`articles`
;";

$stmt = $pdo->prepare($request);
$stmt->execute();
$row = $stmt->fetchAll();

$rowLength = count($row) - 1;
$counter = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/flexboxgrid.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/master.min.css">
  <title>Une année de voyage</title>
</head>

<body>
  <div class="container">
    <div class="row container-bg">
      <img class="container-bg-hero" src="assets/img/bg-hero.png" alt="background">
    </div>
    <div class="row nav">
      <div class="col-xs-offset-1 col-xs-2">
        <img class="nav-logo-desktop" src="assets/logo/logo_uneanneedevoyages_Desktop-black.svg" alt="logo" title="logo">
        <img class="nav-logo-mobile" src="assets/logo/logo_uneanneedevoyages_Mobil-black.svg" alt="logo" title="logo">
      </div>
      <div class="col-xs-2 col-xs-offset-6 col-md-6 col-md-offset-3">
        <div class="nav-burger"></div>
        <div class="nav-burger"></div>
        <div class="nav-burger"></div>
        <ul class="nav-list">
          <li><a class="nav-list-item" href="#">Home</a></li>
          <li><a class="nav-list-item" href="#">Top 100</a></li>
          <li><a class="nav-list-item" href="#">Actualités</a></li>
          <li><a class="nav-list-item" href="#">Galerie</a></li>
          <li><a class="nav-list-item" href="#">Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-offset-1 col-xs-11">
        <h1 class="title">Une année de voyages</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-offset-1 col-xs-11">
        <h2 class="title-sub">Des voyages testés... Des idées pour partir toute l'année !</h2>
      </div>
    </div>
    <div class="row bottom-xs">
      <div class="col-xs-1 col-xs-offset-1">
        <div class="social">
          <img class="social-icon" src="assets/icons/facebook.svg" alt="social-icon" title="facebook-icon">
          <img class="social-icon" src="assets/icons/instagram.svg" alt="social-icon" title="instagram-icon">
          <img class="social-icon" src="assets/icons/twitter.svg" alt="social-icon" title="twitter-icon">
          <img class="social-icon" src="assets/icons/youtube.svg" alt="social-icon" title="youtube-icon">
        </div>
      </div>
      <div class="col-xs-8 col-xs-offset-2 center-xs col-md-3 col-md-offset-7">
        <div class="anounce">
          <h4 class="anounce-subtitle">Prochaine sortie 2018</h4>
          <h1 class="anounce-title">MOOK COLLECTOR / APP</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="news">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1">
        <div class="news-feed">
          <h2 class="news-feed-title">Actualités</h2>
        <?php while ($counter < 3) :?>
          <div class="news-feed-box">
            <div class="news-feed-box-flex">
              <h4 class="news-feed-box-flex-title"><?=$row[$rowLength]['title']?></h4>
              <p class="news-feed-box-flex-author"><?=$row[$rowLength]['author']?></p>
            </div>
            <p class="news-feed-box-subtitle"><?=$row[$rowLength]['subtitle']?></p>
            <p class="news-feed-box-content"><?=$row[$rowLength]['content']?></p>
          </div>
        <?php
            $rowLength--;
            $counter++;
            endwhile;
        ?>
          <div class="row middle-xs">
            <div class="col-xs-10 col-xs-offset-1">
              <div class="news-feed-more">
                <h4 class="news-feed-more-btn">Plus d'actualités</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-10 col-xs-offset-1 col-md-5">
        <div class="news-twitter">
          <a class="twitter-timeline" href="https://twitter.com/ParisAeroport?ref_src=twsrc%5Etfw">Tweets by ParisAeroport</a>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
      </div>
    </div>
  </section>

  <section class="info">
    <article class="info-mook">
      <div class="row">
        <div class="col-xs-12 col-md-6">
          <div class="info-mook-container">
            <img src="assets/img/mook.jpg" alt="" class="info-mook-container-img">
          </div>
        </div>
        <div class="col-xs-12 col-md-6">
          <div class="info-mook-text">
            <h2 class="info-mook-text-title">Un mook collector</h2>
            <p class="info-mook-text-content">Un mook (contraction de magazine et book) est un ouvrage hybride dont le format se situe entre le magazine et le livre. Il est publié de manière périodique et renferme essentiellement de grands reportages. Il comprend également des dessins
              et des photos servant à l’illustration des textes.</p><br>
            <p class="info-mook-text-content">• Un mook annuel à collectionner grâce à sa couverture illustrée, œuvre d'un artiste</p><br>
            <p class="info-mook-text-content">• Des goddies : 5 dessins originaux issus des "illustrateurs voyageurs" de la communauté internationale Urban Sketchers</p><br>
            <p class="info-mook-text-content">• 300 pages de reportages sous forme de "carnets de voyages"</p><br>
            <p class="info-mook-text-content">• Des destinations testées et approuvées par nos journalistes (pas de mauvaise surprise à l'arrivée !)</p><br>
            <p class="info-mook-text-content">• 40.000 exemplaires vendus en kiosques, librairies et sur notre site</p><br>
            <p class="info-mook-text-content">• Des fiches pratiques d'exception et détachables.</p>
          </div>
        </div>
      </div>
    </article>

    <article class="info-cards"></article>
    <article class="info-app"></article>
  </section>
</body>

</html>
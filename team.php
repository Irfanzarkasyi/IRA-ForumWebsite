<?php

    session_start();
    require 'includes/dbh.inc.php';
    
    define('TITLE',"The Team | KLiK");
    
    if(!isset($_SESSION['userId']))
    {
        header("Location: login.php");
        exit();
    }
    
    include 'includes/HTML-head.php';
?>  


        <link href="css/creator-portfolio.min.css" rel="stylesheet">
    </head>
    
    <body style="background: #f1f1f1">

        <?php include 'includes/navbar.php'; ?>
   

        <div class="jumbotron text-white" style="background-image: url('img/team-cover.png')">
            <div class="container">
              <h1 class="display-3">Kelompok 1</h1>
              <h4>The Brains and Brawns behind all this</h4>
              
            </div>
        </div>

        
      <div class="container">
        
        <section class="content-section" id="portfolio">
            
          <div class="container">
              
            <div class="content-section-heading text-center">
              <h3 class="text-secondary mb-0">Anggota</h3>
              <h2 class="mb-5">The Team</h2>
            </div>
            <div class="row no-gutters">
              <div class="col-lg-6">
                  <a class="portfolio-item" href="_KLiK creators/KLiK_saad.php" target="_blank">
                  <span class="caption">
                    <span class="caption-content">
                      <h2>Muhammad Rifky Irfan Zarkasyi</h2>
                      <p class="mb-0 text-white">195150307111027</p>
                    </span>
                  </span>
                  <img class="img-fluid" src="img/black-bg.jpg" alt="">
                </a>
              </div>
              <div class="col-lg-6">
                <a class="portfolio-item" href="_KLiK creators/KLiK_anas-kamal.php" target="_blank">
                  <span class="caption">
                    <span class="caption-content">
                      <h2>Rizki Cahya Arasy</h2>
                      <p class="mb-0 text-white">195150307111032</p>
                    </span>
                  </span>
                    <img class="img-fluid" src="img/black-bg.jpg" alt="">
                </a>
              </div>
              <div class="col-lg-6">
                <a class="portfolio-item" href="_KLiK creators/KLiK_ubaid.php" target="_blank">
                  <span class="caption">
                    <span class="caption-content">
                      <h2>Muhammad Makbul Zaid</h2>
                      <p class="mb-0 text-white">195150301111027</p>
                    </span>
                  </span>
                  <img class="img-fluid" src="img/black-bg.jpg" alt="">
                </a>
              </div>
              <div class="col-lg-6">
                <a class="portfolio-item" href="_KLiK creators/KLiK_anas-imran.php" target="_blank">
                  <span class="caption">
                    <span class="caption-content">
                      <h2>Hamdan Malik Satriyo Aji</h2>
                      <p class="mb-0 text-white">195150301111029</p>
                    </span>
                  </span>
                    <img class="img-fluid" src="img/black-bg.jpg" alt="">
                </a>
              </div>
            </div>
          </div>
        </section>
          

      </div>
        
        <?php include 'includes/footer.php'; ?>
        
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    </body>
</html>
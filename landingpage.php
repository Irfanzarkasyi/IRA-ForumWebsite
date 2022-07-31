<?php
    
    session_start();
    include_once 'includes/dbh.inc.php';
    define('TITLE',"IRA| KLiK");

    $companyName = "Franklin's Fine Dining";
    
    function strip_bad_chars( $input ){
        $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }
    
    // if(!isset($_SESSION['userId']))
    // {
    //     header("Location: login.php");
    //     exit();
    // }
    
    include 'includes/HTML-head.php';
?>

<link href="css/loader.css" rel="stylesheet">

<body onload="pageLoad()">

    <div id="loader-wrapper">
        <img src='img/LOGO.png' id='loader-logo'>
        <div class="loader">
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__ball"></div>
        </div>
    </div>
     
    
  

    <nav class="navbar sticky-top navbar-expand-md navbar-light " style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/LOGO.png" width="50" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-right" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto mr-1">
                
              <li class="nav-item px-3">
                       <a class="nav-link" href="index.php">Explore us</a>
                </li>
                <li class="nav-item px-3">
                       <a class="nav-link" href="#">About us</a>
                </li>
                
              
                
               
                <li class="nav-item px-3">
                  <a class="nav-link" href="includes/logout.inc.php">
                      <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                  </a>
                </li>
              </ul>
            </div>
            </div>
        </nav>
        
     


   

    



    <div class="banner">
        <div class="container banner-text">
            <h1>IRA Company</h1>
            <h4>Lets Make a World Better Together</h4>
        </div>
    </div>



    <div class="container mb-10">
      <div class="about-us">
          <h1 class="text-center">About Us</h1>
          <hr>
          <p>IRA hadir karena bumi dan lingkungan perlu mendapat perhatian dari semua orang. Perhatian datang dari informasi. Dari perhatian datang perubahan.

Di seluruh dunia, kita berdiri bersama-sama dengan masyarakat, menuntut pertanggung jawaban berbagai pemerintahan dan perusahaan untuk bertanggung jawab. Mulai dari jalanan hingga ke tempat para pengambil keputusan, kita mempunyai kekuatan nyata jika kita bekerja sama.</p>
      </div>
  </div>

    <div class="container">
        <div class="blog-title">
            <h1>Lastest Blog</h1>
            <hr>
        </div>
        <div class="blog-section">

            <?php
$sql = "select * from Blogs, users 
        where blogs.blog_by = users.idUsers
        order by blog_id desc, blog_votes asc
        LIMIT 2";
$stmt = mysqli_stmt_init($conn);    

if (!mysqli_stmt_prepare($stmt, $sql))
{
    die('SQL error');
}
else
{
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    while ($row = mysqli_fetch_assoc($result))
    {
        echo '
        
        <div class="row">
             <div class="col-sm-12">
             <div class="card">
                 <div class="card-body">
                 <img class="card-img-right flex-auto d-none d-lg-block blogindex-cover" 
                 src="uploads/'.$row['blog_img'].'" alt="Card image cap" style="height: 400px;width: 100%">
                 <strong class="d-inline-block mb-2 text-primary">
                 <i class="fa fa-thumbs-up" aria-hidden="true"></i> '.$row['blog_votes'].'
             </strong>
             <h1 class="mb-0">
               <a class="text-dark" href="blog-page.php?id='.$row['blog_id'].'">'.substr($row['blog_title'],0,20).'...</a>
             </h1>
             <small class="mb-1 text-muted">'.date("F jS, Y", strtotime($row['blog_date'])).'</small>
             <small class="card-text mb-auto">'.substr($row['blog_content'],0,40).'...</small>
             <a href="blog-page.php?id='.$row['blog_id'].'">Continue reading</a>
                  </div>
                  <a class="nav-link" href="index.php">Explore More</a>
             </div>
             </div>
             
        </div>
              ';
    }
}
?>

        </div>
    </div>



    <div id="wrapper-section" class="container-fluid">
        <div class="section-header">
        <h1>Upcoming events</h1>
    <p>Jangan ketinggalan event-event yang akan datang. Pilihlah sesuai dengan minat Anda dan silakan hadir di kota terdekat Anda.</p>
        </div>
    
        <div class="blog-section" >
         
           
                <?php

  $sql = "select event_id, event_by, title, event_date, event_image
          from events
          where event_date > now()
          order by event_date asc
          LIMIT 5";
  $stmt = mysqli_stmt_init($conn);    

  if (!mysqli_stmt_prepare($stmt, $sql))
  {
      die('SQL error');
  }
  else
  {
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      while ($row = mysqli_fetch_assoc($result))
      {
          $earlier = new DateTime(date("Y-m-d"));
          $later = new DateTime($row['event_date']);
          $diff = $later->diff($earlier)->format("%a");

          echo '
          <div class="row">
          <div class="col-sm-12">
          <div class="card">
              <div class="card-body">
              <a href="event-page.php?id='.$row['event_id'].'">
              <img src="uploads/'.$row['event_image'].'" alt="" class="card-img-right flex-auto d-none d-lg-block blogindex-cover" style="width:100%; height: 300px;">
              <strong class="d-block text-gray-dark">'.ucwords($row['title']).'</strong></a>
              '.date("F jS, Y", strtotime($row['event_date'])).'<br><br>
              <h2 class="text-primary" >'.$diff.' days remaining </h2>
          </strong>
         
          
         
               </div>
          </div>
          </div>
          
     </div>
                 
                 ';
      }
 }
?>

            </div>
        </div>
    </div>


    <?php include 'includes/footer.php'; ?>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        var myVar;

        function pageLoad() {
            myVar = setTimeout(showPage, 4000);
        }

        function Loginrequired() {

        }

        function showPage() {
            document.getElementById("loader-wrapper").style.display = "none";
            document.getElementById("content").style.display = "block";

        }
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Discussion Forum</title>
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="stylesheet" href="../CSS/mini_style.css" />
    <link
      rel="stylesheet"
      media="screen and (max-width: 1480px)"
      href="../CSS/phone.css"
    />
    <!-- Added Phone.css for Media Query  -->
    <link
      href="https://fonts.googleapis.com/css2?family=Baloo+Bhai+2:wght@600&family=Bree+Serif&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="../Pictures/logo.png" type="image/png" />
    <link rel="stylesheet" href="../CSS/preloader.css" />
    <link rel="stylesheet" href="../Pages/form.css" type="text/css"><!--css for preloader and news letter-->
  </head>
<!--body-->
<body>
    <nav id="navbar">
      <div id="logo">
        <img
          src="Pictures/logo.png"
          alt="Forum Logo"
          height="75px"
          width="100px"
        />
      </div>

      <div class="list_item">
        <ul>
          <li class="item"><a href="home.php">Home</a></li>
          <li class="item"><a href="myThreads.php">My Thread</a></li>
          <li class="item"><a href="myComments.php">My Comments</a></li>
          <li class="item"><a href="addThread.php">Add Thread</a></li>
          <li class="item"><a href="aboutUS.php">About Us</a></li>
          <li class="item"><a href="contactUs.php">Contact Us</a></li>
        </ul>
      </div>
    </nav>

    <div class="body-content">
        <div class="module">
        <?php 
            include '../Pages/utility.php';
            //$_SESSION variables become available on this page
            session_start();
            // $_SESSION['message'] = '';
            // $mysqli = new mysqli('localhost','root','','forum');
            // $username =  $_SESSION['username'];
            // echo $username;
            $str = "SELECT * from threads where threadId = $_GET[id]";
            $result=ExecuteQuery($str);
            $noRows = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)){
                    $topic = $row['topic'];
                    echo "<h1>";
                    echo $topic;
                    echo "</h1>";
                    echo "<a href = 'addComment.php?id=$_GET[id]'> Add a new Comment </a>";
                    echo"<br/><br/>";
                    $summary = $row['summary'];
                    echo $summary;
                    echo "<br/><br/><br/>";
                    $tDateTime = $row['tDateTime'];
                    echo $tDateTime;
                    echo "<br/><br/>";
                    $tag = $row['tag'];
                    echo $tag;
            }
            echo "<h1> Comments </h1>";
                 
            $str = "SELECT * from comments where threadId = $_GET[id]";
            $result=ExecuteQuery($str);
            while($row = mysqli_fetch_assoc($result)){
                
                $description = $row['description'];
                echo $description;
                echo "<br/>";
                $cDateTime = $row['cDateTime'];
                echo $cDateTime;
                echo "<br/><br/>";
                
          }
        ?>
    </div>
    </div>

    <!-- Start Footer -->
    <footer class="footer-area bg-f">
      <div class="copyright">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <p class="company-name">
                All Rights Reserved. &copy; 2021
                <a href="#">Discussion Forum</a> Design By :
                <a href="#">SVNIT Students</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- End Footer -->
   
  </body>
</html>
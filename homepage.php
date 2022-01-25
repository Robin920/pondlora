<?php
  include("connection.php");
  $query="SELECT * FROM data ORDER BY id DESC LIMIT 3";
  $result=mysqli_query($con,$query);
  $query2="SELECT MIN(temperature) AS lowtemp, MAX(temperature) AS hightemp FROM loradata;";
  $result2=mysqli_query($con,$query2);
  $query3="SELECT MIN(potentiometer) AS lowp, MAX(potentiometer) AS highp FROM loradata;";
  $result3=mysqli_query($con,$query3);
  $query4="SELECT MIN(humidity) AS lowh, MAX(humidity) AS highh FROM loradata;";
  $result4=mysqli_query($con,$query4);
  $query5="SELECT * FROM data ORDER BY id DESC LIMIT 1";
  $result5=mysqli_query($con,$query5);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="refresh" content="10">
  <title>LoraInnovation show data</title>
  <!--Bootstrap Library-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
  integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logoimg"> <img src="./assets/loraLogo.jpeg" alt="Intellimixio" width="40" height="40"> </div>
      <div class="logo">  <a href="#">LoraInnovation</a></div>
       <!-- <ul class="links">
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact Us</a></li>
        </ul>-->
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="Type Something to Search..." required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    </nav>
  </div>
  
<div class="data-container">
        <table border="2px" class="datatable">
            <tr>
                <th colspan="2"><h1><br>Sensor data </h1></th>
            </tr>
            <t>
                <th>
                    Water Level
                </th>
                <th>
                    Temperature
                </th>
            </t>
            <?php
            while($rows=mysqli_fetch_assoc($result))
            {
            ?>
            <tr>
                <td><?php echo $rows['potentiometer'];?></td>
                <td><?php echo $rows['temperature'];?></td>
            </tr>
            <?php
            }
            ?>
        </table>
        </div>
        
        <br>
        <h1 align="center">Water flow: </h1>
            <span>
            <?php
            if($f=mysqli_fetch_assoc($result5))
            {
            ?>
                <p><?php echo $f['humidity'];?></p>
            <?php
            }
            ?>
            </span>
        <br>
        <h1 align="center">Current voltage: </h1>
            <span>
            <?php
            if($v=mysqli_fetch_assoc($result5))
            {
            ?>
                <p><?php echo $v['voltage'];?></p>
            <?php
            }
            ?>
            </span>
        <br>
        <h1 align="center">Temperature Variation</h1>
        <?php
        if($r=mysqli_fetch_assoc($result2))
        {
        ?>
        <h3 align="center">minimum temp :- <?php echo $r['lowtemp'];?></h3>
        <h3 align="center">maximum temp :- <?php echo $r['hightemp'];?></h3>
        <?php
        }
        ?>
        <h1 align="center">Water Level Variation</h1>
        <?php
        if($p=mysqli_fetch_assoc($result3))
        {
        ?>
        <h3 align="center">minimum water level :- <?php echo $p['lowp'];?></h3>
        <h3 align="center">maximum water level :- <?php echo $p['highp'];?></h3>
        <?php
        }
        ?>

        <h3 align="center"></h3>
        <div class="control-container">
    
    <span><?php
        if(file_exists("log.txt")) {
         $file = "log.txt";
         $content = file_get_contents($file);
        } 
        else {
         $newfile = fopen("log.txt","w");
         header("Refresh:0");
        }
        ?></span>
    
    <div class="on-button">
    <form action="newprocess.php" method="post">
    <input type="submit" name="button" value="Turn On" class="on">
    </form>
    </div>
    <div class="off-button"> 
    <form action="newprocess.php" method="post">
    <input type="submit" name="button" value="Turn Off" class="off">
    </form>
    </div>

</div>

  <footer>
    <div class="footer-content">
        <h3>LoraInnovation</h3>
        <p>Act today for tomorrow | Bihar Innovation</p>
        <ul class="socials">
            <li><a href="https://www.facebook.com/BiharInnovation"><i class="fab fa-facebook"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://www.linkedin.com/in/biharinnovation/"><i class="fab fa-linkedin"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCLlrSd6NZG4MpAK8zn-loOA"><i class="fab fa-youtube"></i></i></a></li>
            <li><a href="mailto:intellimixio.pce19@gmail.com"><i class="fas fa-envelope"></i></a></li>
            <li><a href="#"> <i class="fab fa-github"></i></a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        <p>copyright &copy;2021 LoraInnovation | Developed by Bihar Innovation<span></span></p>
    </div>
</footer>
</body>
</html>

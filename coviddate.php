<?php

//The main page for the api trakt website
define('TRAKT_URL', 'https://api.trakt.tv');

//client id, and client secret will be need it in order to access to this application api
 $TRAKT = array (
 'client_id' => 'd63eeab904a20658a04dca8aca6a8724aeb26403332b879c80835c982978c948',
 'client_secret' => '204189ab2d2d666e0bfc17a00a6b3007ecb98ce3d6090573a4b1374a059ae51c',
 'redirect_uri' => 'http://localhost/APIProject_BarbaraCamN01457183_5203/Index.php',
 'state' =>'aaaaaa'
 ); 

 // Requesting an array for the most played movies with a limit of 8 movies
 $url = TRAKT_URL . '/movies/played/weekly?page=1&limit=8';
 
 $headers = array (
  "Content-Type:application/json",
  "trakt-api-version:2",
  "trakt-api-key:$TRAKT[client_id]"
);

$opts = array(
  'http' => array (
      'header' => $headers,
      'method' => 'GET'

  )
);

$context = stream_context_create($opts);
$result = json_decode(file_get_contents($url, false, $context));
 
// For loop is using to access the items from the array and display them in a table
$rows = '';
for($i = 0; $i < sizeof($result); $i++){    
        $rows .= '<tr>';
        $rows .= "<td><a href='https://www.imdb.com/title/".$result[$i]->movie->ids->imdb."/' />".$result[$i]->movie->title."</a></td>";
        $rows .= '<td>'.$result[$i]->movie->year.'</td>';
        $rows .= '<td>'.$result[$i]->collected_count.' views </td>';
        $rows .= "<td><img src ='./images/coviddate/movielist/movielist".$i.".jpg' width=50px/></td>";
        $rows .= '</tr>';  
}

// Second API access, spooncular. An api key was neccesary in order to access this api.
// A recipe was displayed by Id an a picture, title and link was extracted from the array in order to display it in the website.

define('spoonacular_URL', 'https://api.spoonacular.com'); //main website access

 $url2 = spoonacular_URL . '/recipes/639851/information?apiKey=738b74d5aa6c4c6eaed7b767f986d97c&includeNutrition=false'; // to access the information from a recipe by the id

 $headers2 = array (
  "Content-Type:application/json",
);

$opts2 = array(
  'http' => array (
      'header' => $headers2,
      'method' => 'GET'
  )
);

$context2 = stream_context_create($opts2);
$result2 = json_decode(file_get_contents($url2, false, $context2));
// var_dump($context2);
// var_dump($result2);

$rows2 = '';
$rows3 = '';                   
    $rows2 .= "<a href='".$result2->sourceUrl."'>".$result2->title."</a>";
    $rows3 .= "<a href='".$result2->image."'><img src='./images/coviddate/recipes/fishdish.jpg' width='400' /></a>";     
      
  //Displaying the information requested from the array in the container number two(index.php)

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karantina&family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/coviddate/style.css">
    <title>Quarantine Scape</title>
    <link rel="stylesheet" href="./css/coviddate/style.css">
    <script src="./js/coviddate/script.js" async defer></script>    
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script> -->
  </head>
  <body>
  <header>
    <div class="banner">
        <div class="logo">
            <img src="./images/coviddate/moviecovid1.png" alt="">
        </div>
        <h1 class="siteName">Covid Date</h1>
    </div>
    <div class="borderDiv"></div>
    <nav>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Movies</a></li>
            <li><a href="">Recipes</a></li>
            <li><a href="">Things to Do</a></li>
        </ul>
    </nav>    
</header>
    <main>
      <div class="mainDiv">
        <div class="content">
          <div>            
            <!-- The reference for the slideshow-container, it is a code extracted from W3School https://www.w3schools.com/howto/howto_js_slideshow.asp -->
            <div class="slideshow-container">
              <!-- Full-width images with number and caption text -->
              <div class="mySlides fade">
                <div class="numbertext">1 / 7</div>
                <img src="./images/coviddate/movie6.jpg" style="width:100%">
                <!-- <div class="text">Caption Text</div> -->
              </div>

              <div class="mySlides fade">
                <div class="numbertext">2 / 7</div>
                <img src="./images/coviddate/couple.jpg" style="width:100%">
                <!-- <div class="hidden">Caption Two</div> -->
              </div>

              <div class="mySlides fade">
                <div class="numbertext">3 / 7</div>
                <img src="./images/coviddate/food1.jpg" style="width:100%">
                <!-- <div class="hidden">Caption Three</div> -->
              </div>

              <div class="mySlides fade">
                <div class="numbertext">4 / 7</div>
                <img src="./images/coviddate/movie7.jpg" style="width:100%">
                <!-- <div class="hidden">Caption Four</div> -->
              </div>

              <div class="mySlides fade">
                <div class="numbertext">5 / 7</div>
                <img src="./images/coviddate/couple4.jpg" style="width:100%">
                <!-- <div class="hidden">Caption Five</div> -->
              </div>

              <div class="mySlides fade">
                <div class="numbertext">6 / 7</div>
                <img src="./images/coviddate/food2.jpg" style="width:100%">
                <!-- <div class="hidden">Caption Five</div> -->
              </div>

              <div class="mySlides fade">
                <div class="numbertext">7 / 7</div>
                <img src="./images/coviddate/couple3.jpg" style="width:100%">
                <!-- <div class="hidden">Caption Five</div> -->
              </div>

              <!-- Next and previous buttons -->
              <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
              <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>
            <!-- The dots/circles -->
            <div style="text-align:center">
              <span class="dot" onclick="currentSlide(1)"></span>
              <span class="dot" onclick="currentSlide(2)"></span>
              <span class="dot" onclick="currentSlide(3)"></span>
              <span class="dot" onclick="currentSlide(4)"></span>
              <span class="dot" onclick="currentSlide(5)"></span>
              <span class="dot" onclick="currentSlide(6)"></span>
              <span class="dot" onclick="currentSlide(7)"></span>
            </div>

            <!--Container 1 -->
            <div class="container1">
              <h2><span>CovidDate</span> is your only source of fun during this pandemic</h2>
              <p>
                Boring during this pandemic? We will suggest you with amazing activities and creative ideas, the best movie's list and some exquisite recipes. We will guaratee a perfect date at home to keeping your relationship alive. This great date's ideas are cheap, fun and romantic with a bit feeling of a staycation.
              </p>
            </div>
           <!-- End Container 1 -->
            <!-- Container 2 -->
            <div class="container2">
              <h3>Recipe of the week</h3>
              <div id='results2'>
                   <div class="results2a"><?php echo $rows3; ?></div>
                  <div class="results2a"><?php echo $rows2; ?> </div>       
              </div>                
            </div>
            <!-- End Container 2 -->
            <!-- Container 3 -->
            <div class="container3">
              <h3>Most Played Movies (weekly)</h3>
              <div id="results">
                <table>
                  <thead>
                    <tr>
                      <th>Movie Title</th>
                      <th>Year</th>
                      <th>Times Played</th> 
                      <th></th>                          
                    </tr>
                  </thead>
                  <tbody>
                  <?php echo $rows; ?>                                       
                  </tbody>
                </table>
              </div>                
            </div>
            <!-- Container 4-->
            <div class="container4">
              <div>
                <img src="./images/coviddate/couple2.jpg"  width="350"/> 
              </div>
              <div>
                <h3>Things to Do</h3>
                <p>Stuck in the house for the next week, month, a year or forever...? The current reality that we are facing due the Covid is not changing anytime soon. We need to stay positive, keep optimistic and enthusiastic to help and support each other. Fun activities will help, it is such a great way to connect with your partner and have a romantic home dates.
                  Like having a movie marathon, host virtual parties, cook together, take dancing classes(online) or building a puzzle.</p> 
                <p>Sit down with your partner to discuss everything that’s on your plate, and make a plan for how you’re going to handle it as a team.</p>
              </div> 
            </div>
              <!-- end Container 3 --->                  
          </div>
        </div>
      </div>
    </main>
    <!--global footer-->
    <footer>
    <div class="borderDiv"></div>
    <nav class="footerNav">
        <ul>
            <li><a href="">About Us</a></li>
            <li><a href="">FAQ</a></li>
            <li><a href="">Terms of Service</a></li>
        </ul>        
    </nav>    
    <p>©Barbara Cam. All rights reserved.</p>
</footer>
  </body>
</html>
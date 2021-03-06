<?php include("auth.php"); //include auth.php file on all secure pages ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/icons/favicon.png"/>
        <title>Tomodachi</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="fonts/antonio-exotic/stylesheet.css" rel="stylesheet">
        <link rel="stylesheet" href="css/lightbox.min.css">
        <link href="css/responsive.css" rel="stylesheet">
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/lightbox-plus-jquery.min.js" type="text/javascript"></script>
        <script src="js/instafeed.min.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="page">
            <!---header top---->
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6"><div class="social-grid">
                                <ul class="list-unstyled text-right">
                                    <li><a><i class="fa fa-facebook"></i></a></li>
                                    <li><a><i class="fa fa-twitter"></i></a></li>
                                    <li><a><i class="fa fa-linkedin"></i></a></li>
                                    <li><a><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div></div>
                    </div>
                </div>
            </div>
            <!--header--->
            <header class="header-container">
                <div class="container">
                    <div class="top-row">
                        <div class="row">
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <div id="logo">
                                    <!--<a href="index.php"><img src="images/logo.png" alt="logo"></a>-->
                                    <a href="index.php"><span>Tomo</span>dachi</a>
                                </div>
                            </div>
                            <div class="col-sm-6 visible-sm">
                                <div class="text-right"><button type="button" class="book-now-btn">Log In</button></div>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12 remove-padd">
                                <nav class="navbar navbar-default">
                                    <div class="navbar-header page-scroll">
                                        <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>

                                    </div>
                                    <div class="collapse navigation navbar-collapse navbar-ex1-collapse remove-space">
                                        <ul class="list-unstyled nav1 cl-effect-10">
                                            <li><a data-hover="Home" href="index.php"><span>Home</span></a></li>
                                            <li><a data-hover="Conventions"  class="active"><span>Conventions</span></a></li>
                                            <li><a data-hover="Map"  href="rooms.php"><span>Map</span></a></li>
                                            <li><a data-hover="Chat"  href="gallery.php"><span>Chat</span></a></li>
                                            <li><a data-hover="MegaChat" href="dinning.php"><span>MegaChat</span></a></li>
                                            <li><a data-hover="Connect" href="news.php"><span>Connect</span></a></li>
                                            <li><a data-hover="Contact Us" href="contact.php"><span>Contact Us</span></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="col-md-2  col-sm-4 col-xs-12 hidden-sm">
                            <!--    <div class="text-right"><button type="button" class="book-now-btn"><a href="login.php" style="color:#FFFFFF";>Log in</a></button></div> -->
                            
                                <div class="text-right"><p style="display:inline"><p>
<?php if(!isset($_SESSION["name"])) { echo "Log in"; } else { echo "Logged in as " . $_SESSION['name']; } ?>
<button type="button" class="book-now-btn"><a href="logout.php" style="color:#FFFFFF">
<?php if(!isset($_SESSION["name"])) { echo "Log in"; } else { echo "Log out"; } ?></a></button></p>
</div>
                        </div>
                    </div>
                </div>
            </header>
            <style type="text/css">
              #map_area { padding: 0px 20px; }
              #map_canvas { height: 100%; margin: 0; padding: 0; width: 100%; min-width: 400px; margin: 20px auto; height: 500px; padding: 0px;}
              #info_window { height: 150px; width: 250px; overflow: scroll; }
             /* p { color: #555; font: 16px/24px Tahoma,Arial,sans-serif; padding: 10px 20px; }*/
            </style>
            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDa9_i0NzxwjWG8biuJTobxpFFVYlE0qRA">
            </script>
            <script type="text/javascript">
              var cons = [];
              var infowindow;
              function initialize() {
                var mapOptions = {
                  center: { lat: 41.87, lng: -87.62},
                  zoom: 2
                };
                var map = new google.maps.Map(document.getElementById('map_canvas'),mapOptions);
                infowindow = new google.maps.InfoWindow({ content: "Convention" });
            	//		infowindow = new google.maps.InfoWindow ({
            	//			size: new google.maps.Size(250,150)
            	//		});
                get_the_cons(map);
              }
              function add_convention(map,location,name) {

                return marker;
              }
              google.maps.event.addDomListener(window, 'load', initialize);
              get_the_cons = function get_the_cons(map) {
                var req = new XMLHttpRequest();
                req.onreadystatechange = function (e) { process_the_cons (req,map); }
                req.open('GET', '/upcomingcons.csv', true);
                req.send(null);
              }
              process_the_cons = function process_the_cons(req,map) {
                if(req.readyState==4 && req.status == 200) {
                  cons_list = req.responseText.split("\n");
                  for (i = 0; i < cons_list.length; ++i) {
                    coninfo = cons_list[i].split(",");
                    cons[i] = coninfo[2];
                    var location = new google.maps.LatLng(coninfo[0],coninfo[1]);
                    var marker = new google.maps.Marker({
                      position: location,
                      map: map,
                      title: coninfo[2]+"--"+coninfo[3]+"--"+coninfo[4]+"--"+coninfo[5]+"--"+coninfo[6]
                    });
                    google.maps.event.addListener(marker, 'click', function() {
                      //infowindow.setContent("<div id='info_window'><h2><a href='/upcomingcons/"+this.title.split("--")[2]+"'>"+this.title.split("--")[0]+"</a></h2><p>"+this.title.split("--")[1]+"</p></div>");
            var gq1 = this.title.split("--")[3];
            if(gq1.slice(0,1) === '\"'){
            gq1 = gq1.substring(1);

            }
            var gq2 = this.title.split("--")[4];
            if(gq2.substr(1) === '\"'){
            gq2 = gq2.substring(1);

            }
            var poop = gq1+", "+gq2;
            if (poop.substr(-1) === '\"'){
            poop = poop.slice(0, -1);
            }
                      infowindow.setContent("<div id='info_window'><h2><a href='/upcomingcons/"+this.title.split("--")[2]+"'>"+this.title.split("--")[0]+"</a></h2><p>"+this.title.split("--")[1].substring(1)+"<br />"+poop+"</p></div>");
                      infowindow.open(map,this);
                    });
                  }
                }
              }
            </script>
            <div id="map_area"><div id="map_canvas"></div></div>



            <!--end
            <section class="image-head-wrapper" style="background-image: url('images/banner3.jpg');">
                <div class="inner-wrapper">
                    <h1>About us</h1>
                </div>
            </section>
            <div class="clearfix"></div>-->
<!--  <p id="mytab1">hi</p>-->




      <style>

textarea {
	display: none;
	font-family: 'Inconsolata', monospace ;
	width: 95%;
	background-color: #eee;
}
    </style>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>-->

<body>
  <div class="container" ng-app="myApp" ng-controller="Example">
		<div class="container">
				<div class="row">

						<div class="col-md-12">
								<textarea cols="30" rows="10" class="source">Date;Name;Location;Type;Status
December 23, 2018;Rainbow Gala 2018;Kowloon Bay, Hong Kong;Anime;Active
December 28-30, 2018;Ikkicon 2018;Austin, TX;Anime;Active
December 29-30, 2018;PopCon Fort Wayne 2018;Fort Wayne, IN;Comic;Active
December 29, 2018;Tampa Anime Day 2018;Tampa, FL;Anime;Active
December 29-31, 2018;Comic Market 2018;Tokyo, Japan;Comic;Active
January 4-6, 2019;Aki Con 2019;Seattle, WA;Anime;Active
January 4-6, 2019;SacAnime 2019;Sacramento, CA;Anime;Active
January 4-6, 2019;Anime-Zap! 2019;East Peoria, IL;Anime;Active
January 5, 2019;"T&eacute;li MondoCon 2019";Budapest, Hungary;Anime;Active
January 5, 2019;Cos-Losseum Cosplay Con San Diego 2019;San Diego, CA;Costume;Active
January 5, 2019;Anime Flea Market 2019;Berlin, Germany;Anime;Active
January 5-6, 2019;Fandom PDX 2019;Portland, OR;Comic;Active
January 10-13, 2019;Ichibancon 2019;Concord, NC;Anime;Active
January 10-13, 2019;"Anim&eacute; Los Angeles 2019";Ontario, CA;Anime;Active
January 11-13, 2019;Taiyou Con 2019;Mesa, AZ;Anime;Active
January 11-12, 2019;Anime, Toys, and Collectibles Show 2019;Evansville, IN;Toys;Active
January 11-13, 2019;AniMore 2019;Baltimore, MD;Anime;Active
January 11-12, 2019;KotoriCon 2019;Sewell, NJ;Anime;Active
January 11-13, 2019;Ohayocon 2019;Columbus, OH;Anime;Active
January 12-13, 2019;Animini 2019;Edmonton, AB, Canada;Anime;Active
January 13, 2019;Jacksonville Anime Day 2019;Jacksonville, FL;Anime;Active
January 18-20, 2019;Akumakon 2019;Galway, Ireland;Anime;Active
January 18-20, 2019;G-Anime Winter 2019;Gatineau, QC, Canada;Anime;Active
January 19, 2019;ABC Winterfest Remix 2019;Southaven, MS;Anime;Active
January 19, 2019;Washi Con 2019;Ypsilanti, MI;Anime;Active
January 19, 2019;Anime Shogatsu 2019;North York, ON, Canada;Anime;Active
January 19-20, 2019;Anime Impulse 2019;Pomona, CA;Anime;Active
January 25-27, 2019;Anime WTX 2019;Lubbock, TX;Anime;Active
January 25-28, 2019;Colossalcon Cruise 2019;Departing from Cape Canaveral, FL;Anime;Active
January 26, 2019;Iigurubando Con 2019;Fairfield, TX;Anime;Active
January 26, 2019;Knoxville Anime Day 2019;Knoxville, TN;Anime;Active
January 26-27, 2019;STCE's Comic Con 2019;Laredo, TX;Comic;Active
January 26, 2019;SSA+S Toracon 2019;Sarasota, FL;Anime;Active
January 26-27, 2019;Setsucon 2019;Altoona, PA;Anime;Active
February 1-3, 2019;Star City Anime 2019;Roanoke, VA;Anime;Active
February 1-3, 2019;GalaxyFest 2019;Colorado Springs, CO;SciFi;Active
February 2-3, 2019;Anime Expo Santiago 2019;Santiago, Chile;Anime;Active
February 2-3, 2019;Cardiff Anime & Gaming Con 2019;Cardiff, UK;Anime;Active
February 2-3, 2019;Bak-Anime 2019;Bakersfield, CA;Anime;Active
February 8-10, 2019;ODUCon 2019;Norfolk, VA;Anime;Active
February 8-10, 2019;Kanpai!Con 2019;Omaha, NE;Anime;Active
February 8-10, 2019;Seishun Con 2019;Atlanta, GA;Anime;Active
February 8-10, 2019;Anime Crossroads 2019;Indianapolis, IN;Anime;Active
February 9-10, 2019;GenreCon 2019;Guelph, ON, Canada;SciFi;Active
February 9, 2019;Chibi Chibi Con 2019;Olympia, WA;Anime;Active
February 9-10, 2019;Cochise College Comic Con 2019;Sierra Vista, AZ;Comic;Active
February 9, 2019;ArtCon 2019;Neosho, MO;Comic;Active
February 9, 2019;Uchi-con 2019;Chicago, IL;Anime;Active
February 9-10, 2019;Animangapop 2019;Plymouth, UK;Anime;Active
February 10, 2019;Animefest 2019;La Jolla, CA;Anime;Active
February 15-17, 2019;London Anime & Gaming Con 2019;London, UK;Anime;Active
February 15-17, 2019;Desucon Frostbite 2019;Lahti, Finland;Anime;Active
February 15-17, 2019;Ushicon 2019;Round Rock, TX;Anime;Active
February 15-17, 2019;Katsucon 2019;National Harbor, MD;Anime;Active
February 15-18, 2019;NotCon at Sea 2019;Departing from Miami, FL;Other;Active
February 15-17, 2019;Anime Milwaukee 2019;Milwaukee, WI;Anime;Active
February 16-17, 2019;Paris Manga & Sci-Fi Show 2019;Paris, France;Anime;Active
February 22-24, 2019;C3AFA Hong Kong 2019;Wan Chai, Hong Kong;Anime;Active
February 22-24, 2019;Con Nooga 2019;Chattanooga, TN;Anime;Active
February 22-24, 2019;Pensacon 2019;Pensacola, FL;Comic;Active
February 22-24, 2019;Genericon 2019;Troy, NY;SciFi;Active
February 22-24, 2019;Kami-Con 2019;Birmingham, AL;Anime;Active
February 23-24, 2019;MiyakoCon 2019;Keizer, OR;Anime;Active
February 23-24, 2019;Jaycon 2019;Elizabethtown, PA;Anime;Active
February 23-24, 2019;Arizona Matsuri 2019;Phoenix, AZ;Other;Active
February 23, 2019;Ai-Kon Winterfest 2019;Winnipeg, MB, Canada;Anime;Active
February 23, 2019;Zipcon 2019;Akron, OH;Anime;Active
March 2-3, 2019;RubikCon 2019;Drummondville, QC, Canada;VGames;Active
March 2-3, 2019;AgamaCon 2019;Aiken, SC;Anime;Active
March 8-10, 2019;Con-Munnity Festival 2019;Amarillo, TX;Anime;Active
March 8-10, 2019;Minami Con 2019;Southampton, UK;Anime;Active
March 9, 2019;Mississippi Anime Festival 2019;Jackson, MS;Anime;Active
March 9, 2019;Monaco Anime Game International Conferences 2019;Monaco;Anime;Active
March 10, 2019;Anime Recharge 2019;Des Moines, IA;Anime;Active
March 15-17, 2019;Triad Anime Con 2019;Winston-Salem, NC;Anime;Active
March 15-17, 2019;Naka-Kon 2019;Overland Park, KS;Anime;Active
March 15-17, 2019;Kigacon 2019;Newport News, VA;Anime;Active
March 15-17, 2019;Omni Fandom Expo 2019;Orlando, FL;SciFi;Active
March 16-17, 2019;Ani-Me Con 2019;Fresno, CA;Anime;Active
March 16-17, 2019;Madman Anime Festival Sydney 2019;Sidney, New South Wales, Australia;Anime;Active
March 16-17, 2019;SwampCon 2019;Gainesville, FL;Anime;Active
March 16, 2019;My-Con 2019;Orlando, FL;Anime;Active
March 21, 2019;Harucon 2019;Jerusalem, Israel;Anime;Active
March 22-24, 2019;Animatic Con 2019;Cincinnati, OH;Anime;Active
March 22-24, 2019;Shuto Con 2019;Lansing, MI;Anime;Active
March 22-24, 2019;Zenkaikon 2019;Lancaster, PA;Anime;Active
March 22-24, 2019;EvilleCon 2019;Evansville, IN;Anime;Active
March 22-24, 2019;AggieCon 2019;College Station, TX;SciFi;Active
March 23, 2019;Queen City Kamikaze 2019;Manchester, NH;Anime;Active
March 23, 2019;AniFest 2019;Torrance, CA;Anime;Active
March 23, 2019;Dev Fare 2019;Glendale, AZ;VGames;Active
March 29-31, 2019;Anime Detour 2019;Minneapolis, MN;Anime;Active
March 30-31, 2019;Savannah Animazing Con 2019;Savannah, GA;Anime;Active
March 30-31, 2019;Animarathon 2019;Bowling Green, OH;Anime;Active
April 5-7, 2019;AnimeCon Arkansas 2019;Little Rock, AR;Anime;Active
April 5-7, 2019;Supanova Comic-Con & Gaming Expo - Melbourne 2019;Melbourne, Victoria, Australia;Comic;Active
April 5-7, 2019;NashiCon 2019;Columbia, SC;Anime;Active
April 5-7, 2019;Kawaii Kon 2019;Honolulu, HI, New Zealand;Anime;Active
April 6, 2019;Mizuumi-Con 2019;San Antonio, TX;Anime;Active
April 6-7, 2019;FACTS 2019;Ghent, Belgium;Comic;Active
April 11-14, 2019;Tekko 2019;Pittsburgh, PA;Anime;Active
April 12-14, 2019;Supanova Comic-Con & Gaming Expo - Gold Coast 2019;Broadbeach, Queensland, Australia;Comic;Active
April 12-13, 2019;South Campus Anime Convention 2019;Fort Worth, TX;Anime;Active
April 13-15, 2019;Armageddon Wellington 2019;Wellington, New Zealand;SciFi;Active
April 13-14, 2019;Manchester Anime & Gaming Con 2019;Manchester, UK;Anime;Active
April 13, 2019;ASAHiCon 2019;Antioch, CA;Anime;Active
April 13, 2019;Kogaracon 2019;Edison, NJ;Anime;Active
April 13, 2019;Superior Con 2019;Marquette, MI;Comic;Active
April 13-14, 2019;Tiger Con 2019;Valdosta, GA;Anime;Active
April 19-21, 2019;LouisiANIME 2019;Baton Rouge, LA;Anime;Active
April 19-21, 2019;Middle Tennessee Anime Convention 2019;Nashville, TN;Anime;Active
April 19-21, 2019;International Fan Festival Toronto 2019;Toronto, ON, Canada;Anime;Active
April 19-21, 2019;Sakura-Con 2019;Seattle, WA;Anime;Active
April 19-21, 2019;Colorado Anime Fest 2019;Denver, CO;Anime;Active
April 19-21, 2019;Anime Boston 2019;Boston, MA;Anime;Active
April 20, 2019;Karoshi-Con 2019;DeKalb, IL;Anime;Active
April 20, 2019;LTU Expo 2019;Southfield, MI;Anime;Active
April 26-28, 2019;Lvl Up Expo 2019;Las Vegas, NV;VGames;Active
April 26-28, 2019;Gojotekicon 2019;Ashland, OH;Anime;Active
April 27-28, 2019;Bristol Anime & Gaming Con 2019;Bristol, UK;Anime;Active
April 27-28, 2019;Castle Point Anime Convention 2019;Secaucus, NJ;Anime;Active
May 3-5, 2019;Anime St. Louis 2019;St. Charles, MO;Anime;Active
May 3-5, 2019;Fan Expo Dallas 2019;Dallas, TX;Comic;Active
May 4, 2019;Mini-Mini Con 2019;San Antonio, TX;Anime;Active
May 4, 2019;Rai Con Spring 2019;Glasgow, UK;Anime;Active
May 10-12, 2019;Sabaku Con 2019;Albuquerque, NM;Anime;Active
May 17-19, 2019;Otafest 2019;Calgary, AB, Canada;Anime;Active
May 17-19, 2019;Anime Central 2019;Rosemont, IL;Anime;Active
May 18-19, 2019;Yorkshire Cosplay Con 2019;Sheffield, UK;Costume;Active
May 23-26, 2019;Animazement 2019;Raleigh, NC;Anime;Active
May 23-26, 2019;MomoCon 2019;Atlanta, GA;Anime;Active
May 24-26, 2019;Thy Geekdom Con 2019;Oaks, PA;Comic;Active
May 24-27, 2019;Anime Oasis 2019;Boise, ID;Anime;Active
May 24-26, 2019;Anime North 2019;Toronto, ON, Canada;Anime;Active
May 24-27, 2019;FanimeCon 2019;San Jose, CA;Anime;Active
May 25, 2019;Anime Park 2019;Canton, MI;Anime;Active
May 25-26, 2019;Madman Anime Festival Brisbane 2019;South Brisbane, Queensland, Australia;Anime;Active
May 25, 2019;County Pop Con 2019;Grayslake, IL;Comic;Active
May 30 - June 2, 2019;Colossalcon 2019;Sandusky, OH;Anime;Active
June 6-9, 2019;A-Kon 2019;Fort Worth, TX;Anime;Active
June 7-9, 2019;OMG!Con 2019;Owensboro, KY;Anime;Active
June 7-9, 2019;JAFAX 2019;Grand Rapids, MI;Anime;Active
June 7-9, 2019;Indy PopCon 2019;Indianapolis, IN;Comic;Active
June 7-8, 2019;Sawa Con 2019;Covington, LA;Anime;Active
June 7-9, 2019;AnimeNEXT 2019;Atlantic City, NJ;Anime;Active
June 7-9, 2019;SacAnime 2019;Sacramento, CA;Anime;Active
June 8-9, 2019;Liverpool Anime & Gaming Con 2019;Liverpool, UK;Anime;Active
June 8-9, 2019;DoKomi 2019;"D&uuml;sseldorf, Germany";Anime;Active
June 13-16, 2019;Anime Matsuri 2019;Houston, TX;Anime;Active
June 14-16, 2019;YetiCon 2019;The Blue Mountains, ON, Canada;Anime;Active
June 14-16, 2019;AnimeCon 2019;Rotterdam, Netherlands;Anime;Active
June 21-23, 2019;Supanova Comic-Con & Gaming Expo - Sydney 2019;Sydney, New South Wales, Australia;Comic;Active
June 27-30, 2019;PortConMaine 2019;South Portland, ME;Anime;Active
June 28-30, 2019;Animaritime 2019;Fredericton, NB, Canada;Anime;Active
June 28-30, 2019;Supanova Comic-Con & Gaming Expo - Perth 2019;Perth, Western Australia, Australia;Comic;Active
June 28-30, 2019;Anime Festival Wichita 2019;Wichita, KS;Anime;Active
June 28-30, 2019;SunnyCon Anime Expo Newcastle 2019;Newcastle, UK;Anime;Active
July 3-7, 2019;Anime Expo 2019;Los Angeles, CA;Anime;Active
July 4-7, 2019;Florida Supercon 2019;Miami Beach, FL;Comic;Active
July 5-7, 2019;AVCon 2019;Adelaide, South Australia, Australia;Anime;Active
July 5-7, 2019;Montreal Comiccon 2019;Montreal, QC, Canada;Comic;Active
July 5-7, 2019;Anime Midwest 2019;Rosemont, IL;Anime;Active
July 6, 2019;Geektopia 2019;Vancouver, BC, Canada;Comic;Active
July 11-14, 2019;ConnectiCon 2019;Hartford, CT;Other;Active
July 12-14, 2019;Dokidokon 2019;Kalamazoo, MI;Anime;Active
July 12-14, 2019;AnimeIowa 2019;Des Moines, IA;Anime;Active
July 12-14, 2019;Blerdcon 2019;Arlington, VA;Comic;Active
July 13, 2019;MinCon 2019;Mineola, NY;Comic;Active
July 13-14, 2019;Ganbatte 2019;Saskatoon, SK, Canada;Anime;Active
July 19-21, 2019;OokiiSoraCon 2019;Helena, MT;Anime;Active
July 19-21, 2019;Okashicon 2019;Pflugerville, TX;Anime;Active
July 20, 2019;Kogan Con 2019;Grand Haven, MI;Anime;Active
July 26-28, 2019;Otakon 2019;Washington, DC;Anime;Active
July 26-28, 2019;Hazard Con 2019;Erie, PA;Anime;Active
July 26-28, 2019;MechaCon 2019;New Orleans, LA;Anime;Active
July 27, 2019;Lock City Anime & Comic Con 2019;North Haven, CT;Anime;Active
August 2-4, 2019;AnimagiC 2019;Mannheim, Germany;Anime;Active
August 2-4, 2019;SaikouCon 2019;White Haven, PA;Anime;Active
August 2-4, 2019;Animanga 2019;Pomona, CA;Anime;Active
August 2-4, 2019;Anime-zing! 2019;Davenport, IL;Anime;Active
August 9-11, 2019;Anime Festival Orlando 2019;Orlando, FL;Anime;Active
August 9-11, 2019;Anirevo Summer 2019;Vancouver, BC, Canada;Anime;Active
August 9-11, 2019;Queen City Anime Convention 2019;Charlotte, NC;Anime;Active
August 9-11, 2019;Animethon 2019;Edmonton, AB, Canada;Anime;Active
August 9-12, 2019;Comic Market 2019;Tokyo, Japan;Comic;Active
August 10-11, 2019;SunnyCon Anime Expo Liverpool 2019;Liverpool, UK;Anime;Active
August 16-18, 2019;Anime Austin 2019;Austin, TX;Anime;Active
August 16-19, 2019;AnimeFest 2019;Dallas, TX;Anime;Active
August 16-18, 2019;Otakuthon 2019;"Montr&eacute;al, QC, Canada";Anime;Active
August 16-18, 2019;Matsuricon 2019;Columbus, OH;Anime;Active
August 22-25, 2019;FanExpo Canada 2019;Toronto, ON, Canada;Comic;Active
August 23-25, 2019;Nan Desu Kan 2019;Denver, CO;Anime;Active
August 24-25, 2019;C3AFA Tokyo 2019;Chiba, Japan;Anime;Active
August 24-25, 2019;Drumheller Dinosaur & Comic Expo 2019;Drumheller, AB, Canada;Other;Active
August 24-25, 2019;A.g.S Con 2019;Mobile, AL;Anime;Active
August 29 - September 2, 2019;Dragon Con 2019;Atlanta, GA;SciFi;Active
August 30 - September 1, 2019;Crunchyroll Expo 2019;San Jose, CA;Anime;Active
August 30 - September 1, 2019;San Japan 2019;San Antonio, TX;Anime;Active
September 13-15, 2019;Anime Fargo 2019;Fargo, ND;Anime;Active
September 13-15, 2019;Rose City Comic Con 2019;Portland, OR;Comic;Active
September 13-14, 2019;Sy-Con 2019;Syosset, NY;Comic;Active
September 14-15, 2019;Madman Anime Festival Melbourne 2019;South Wharf, Victoria, Australia;Anime;Active
September 20-22, 2019;Delta H Con 2019;Houston, TX;Anime;Active
September 20-22, 2019;Anime Sekai 2019;Abilene, TX;Anime;Active
September 21, 2019;Puchi Con! 2019;Brooklyn, NY;Anime;Active
October 3-6, 2019;New York Comic Con 2019;New York, NY;Comic;Active
October 5-6, 2019;Madman Anime Festival Perth 2019;Perth, Western Australia, Australia;Anime;Active
October 11-13, 2019;Tsubasacon 2019;Charleston, WV;Anime;Active
October 12-13, 2019;Nomikai Dallas 2019;Lewisville, TX;Anime;Active
October 18-21, 2019;ValleyCon 2019;Fargo, ND;SciFi;Active
October 18-20, 2019;Bakuretsu Con 2019;Colchester, VT;Anime;Active
October 19-20, 2019;FACTS 2019;Ghent, Belgium;Comic;Active
October 19-20, 2019;Shikkaricon 2019;Philadelphia, PA;Anime;Active
October 25-27, 2019;DerpyCon 2019;Morristown, NJ;Anime;Active
October 31 - November 3, 2019;Anime Weekend Atlanta 2019;Atlanta, GA;Anime;Active
November 1-3, 2019;Anime USA 2019;Washington, DC;Anime;Active
November 1-3, 2019;NekoCon 2019;Hampton, VA;Anime;Active
November 1-3, 2019;Supanova Comic-Con & Gaming Expo - Adelaide 2019;Wayville, South Australia, Australia;Comic;Active
November 8-10, 2019;Philcon 2019;Cherry Hill, NJ;SciFi;Active
November 8-10, 2019;Supanova Comic-Con & Gaming Expo - Brisbane 2019;South Brisbane, Queensland, Australia;Comic;Active
November 15-17, 2019;SNAFU Con 2019;Reno, NV;Anime;Active
November 15-17, 2019;Anime NYC 2019;New York, NY;Anime;Active
December 28-31, 2019;Comic Market 2019;Tokyo, Japan;Comic;Active
January 9-12, 2020;"Anim&eacute; Los Angeles 2020";Ontario, CA;Anime;Active
March 20-22, 2020;Colorado Anime Fest 2020;Denver, CO;Anime;Active
April 10-12, 2020;Anime Boston 2020;Boston, MA;Anime;Active
July 17-19, 2020;Okashicon 2020;Pflugerville, TX;Anime;Active
July 24-26, 2020;Hazard Con 2020;Erie, PA;Anime;Active
July 24-26, 2020;MechaCon 2020;New Orleans, LA;Anime;Active
October 30 - November 1, 2020;DerpyCon 2020;New Brunswick, NJ;Anime;Active
January 7-10, 2021;"Anim&eacute; Los Angeles 2021";Ontario, CA;Anime;Active
March 19-21, 2021;Colorado Anime Fest 2021;Denver, CO;Anime;Active
April 2-4, 2021;Anime Boston 2021;Boston, MA;Anime;Active
July 23-25, 2021;Hazard Con 2021;Erie, PA;Anime;Active
July 23-25, 2021;MechaCon 2021;New Orleans, LA;Anime;Active
May 27-29, 2022;Anime Boston 2022;Boston, MA;Anime;Active
April 7-9, 2023;Anime Boston 2023;Boston, MA;Anime;Active
March 29-31, 2024;Anime Boston 2024;Boston, MA;Anime;Active
May 23-25, 2025;Anime Boston 2025;Boston, MA;Anime;Active
December 22-23, 2018;Comic Fiesta 2018;Kuala Lumpur, Malaysia;Anime;Active
</textarea>
						</div>
						<div class="col-md-12">
								<div class="output"></div>
						</div>
						<div class="col-md-12"></div>
				</div>
		</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



    <script  src="js/index.js"></script>




</body>



<!--
            <section class="about-block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 about-left">
                            <p>Lorem <label>ipsum</label> dol  <span>-sitamet</span></p>
                        </div>
                        <div class="col-md-7 about-right">
                            <h3>Lorem ipsum dolor sit amet, consec</h3>
                            <p>Donec bibendum massa metus, vel aliquet nunc varius eu. Curabitur nec scelerisque dui. Quisque mattis libero et enim ultricies gravida. Nulla ut commodo massa, eget tincidunt ligula. Vivamus eu ante tincidunt, fermentum risus nec, pharetra turpis. Donec rhoncus eros sed felis aliquet tincidunt. In consectetur tempor quam</p>
                            <ul class="list-unstyled list-inline">
                                <li>Sed vitae facilisis nisi, in finibus lacus. Duis vel nulla orci.</li>
                                <li>fringilla, at ultrices felis dignissim. Integer ultricies posuere odio</li>
                                <li>Sed vestibulum mattis laoreet. Donec sollicitudin justo luctus nulla consectetur</li>
                                <li>Nam dolor tellus, dictum sit amet libero eu, semper placerat massa.</li>
                                <li>consectetur tempor quam, aliquam dignissim diam hendrerit nec. Cras sodales at nisl</li>
                            </ul>
                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </section>-->

            <!---footer--->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12 width-set-100">
                            <div class="footer-details">
                                <h4>Get in touch</h4>
                                <ul class="list-unstyled footer-contact-list">
                                    <li>
                                        <i class="fa fa-map-marker fa-lg"></i>
                                        <p>San Francisco Bay Area, CA</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone fa-lg"></i>
                                        <p><a href="tel: 408-805-2688"> 408-805-2688</a></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o fa-lg"></i>
                                        <p><a href="mailto:tomodachiconventions@gmail.com"> tomodachiconventions@gmail.com</a></p>
                                    </li>
                                </ul>
                                <div class="footer-social-icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                                <div class="input-group" id="subscribe">
                                    <input type="text" class="form-control subscribe-box" value="" name="subscribe" placeholder="EMAIL ID">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn subscribe-button"><i class="fa fa-paper-plane fa-lg"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 width-50 width-set-50">
                            <div class="footer-details">
                                <h4>explore</h4>
                                <ul class="list-unstyled footer-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active"><a>Conventions</a></li>
                                    <li><a href="rooms.php">Map</a></li>
                                    <li><a href="gallery.php">Chat</a></li>
                                    <li><a href="#">MegaChat</a></li>
                                    <li> <a href="news.php">Connect</a></li>
                                    <li> <a href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="footer-details">
                                <h4>Coming Soon: Mobile Applications</h4>
                                <div class="row">
                                    <div class="instagram-images">
                                        <div id="instafeed"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="copyright">
                        &copy; 2017 All right reserved.
                    </div>

                </div>
            </footer>

            <!--back to top--->
            <a style="display: none;" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
                <span><i aria-hidden="true" class="fa fa-angle-up fa-lg"></i></span>
                <span>Top</span>
            </a>

        </div>
    </body>
</html>

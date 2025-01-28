<?php
function echoActiveClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
    if ($current_file_name == $requestUri) {
        echo 'class="active"';
    }

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
{VRL_META}
    <title>Bigelow Vacation Rentals</title>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/assets/css/custom.css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://malsup.github.io/jquery.cycle2.js"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<div class="container">
		<div class="masthead">
        <div class="logo"><a href="/index.php"><img src="/assets/header.png"  alt="Bigelow Vacation Rentals" ></a></div>
        <ul class="nav nav-justified navbar-inverse">
          <li <?=echoActiveClassIfRequestMatches("index")?>><a href="/index.php">Home</a></li>
          <li <?=echoActiveClassIfRequestMatches("properties")?>><a href="/properties.php">Properties</a></li>
          <li <?=echoActiveClassIfRequestMatches("services")?>><a href="/services.php">Services</a></li>
          <li class="dropdown" >
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Activities<span class="caret"></span></a>
            <ul class="dropdown-menu">
          <li <?=echoActiveClassIfRequestMatches("golf")?>><a href="/golf.php">Golf</a></li>
          <li <?=echoActiveClassIfRequestMatches("spring-training")?>><a href="/spring-training.php">Spring Traning</a></li>
          <li <?=echoActiveClassIfRequestMatches("sports-venues")?>><a href="/sports-venues.php">Sports Venues</a></li>
           <li <?=echoActiveClassIfRequestMatches("casino")?>><a href="/casino.php">Casinos</a></li>
          <li <?=echoActiveClassIfRequestMatches("shopping")?>><a href="/shopping.php">Shopping</a></li>
           <li <?=echoActiveClassIfRequestMatches("water")?>><a href="/water.php">Arizona Lakes/Water Fun</a></li>
            <li <?=echoActiveClassIfRequestMatches("parks")?>><a href="/parks.php">Arizona Parks/Zoos</a></li>
            <li <?=echoActiveClassIfRequestMatches("family")?>><a href="/family.php">Arizona Family Entertainment</a></li>
            <li <?=echoActiveClassIfRequestMatches("night-club")?>><a href="/night-club.php">Scottsdale Nightclubs</a></li>
          </ul>
        </li>
          <li <?=echoActiveClassIfRequestMatches("about")?>><a href="/about.php">About</a></li>
          <li <?=echoActiveClassIfRequestMatches("contact")?>><a href="/contact.php">Contact</a></li>
          <li <?=echoActiveClassIfRequestMatches("addproperty")?>><a href="/addproperty.php">Add Property</a></li>
        </ul>
      </div>
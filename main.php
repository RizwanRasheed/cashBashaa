<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>
<body>

<div class="header">
  <a href="#default" class="logo">Supply Cart</a>
  <div class="header-right">
    <a class="active" href="#home">Home</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
  </div>
</div>

<?php

  session_start();
	$url = 'https://www.amazon.com/ref=nav_logo';
	$decoded_content = file_get_contents($url);
	$decoded_content = gzdecode($decoded_content);
	//$decoded_content = str_replace("<title>Amazon.com: ","<title>SupplyCart - Amazon.com: ",$decoded_content);
	//$decoded_content = str_replace("href=\"https://www.amazon.com/","href=/",$decoded_content);
	echo $decoded_content;  

  $cookies = ' ';
  foreach ($http_response_header as $hdr) {
      if (preg_match('/^Set-Cookie:\s*([^;]+)/', $hdr, $matches)) {
          
        $cookies = $cookies . $matches[1] . '; ';
          
        //parse_str($matches[1], $tmp);
        //$cookies += $tmp;
      }
      //$cookies = substr_replace($cookies,"",-1);
  }
  echo $cookies;
  $_SESSION["amazon"] = $cookies;
  
?>
<!-- </body>
</html> -->


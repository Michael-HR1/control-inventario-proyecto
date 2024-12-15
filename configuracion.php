<?php
  require_once 'vendor/autoload.php';

  $clientID = '866956283219-bu7t85e60fv5mimg1imfg37p097epdog.apps.googleusercontent.com';
  $clientSecret = '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';
  $redirectUri = 'http://localhost/contro-inventario/home.php';

  // create Client Request to access Google API
  $client = new Google_Client();
  $client->setClientId($clientID);
  $client->setClientSecret($clientSecret);
  $client->setRedirectUri($redirectUri);
  $client->addScope("email");
  $client->addScope("profile");

 
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://fonts.googleapis.com/css?family=Roboto:300i,400,700&display=swap" rel="stylesheet">
   <!-- <link rel="stylesheet" href="reset.css">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="media_left.css"> -->
   <title>Document</title>
   <?php wp_head(); ?>
</head>

<body>
<div class="head-test_wrap">

   <header class="head-test">

      <a href="<?php echo home_url() ?>" class="logo">
      <img src="<?php echo get_template_directory_uri(); ?> /brave.svg">
      <?php //the_custom_logo(); ?>
      </a>
      
      <span class="btn" id="btn">
         <span></span>
      </span>
      <div class="menu" id="menu">
      <?php 
         wp_nav_menu([
            'theme_location' => 'top',
            'container' => null,
            'items_wrap' => '<ul>%3$s</ul>'
         ]);
      ?>
      </div>



   </header>
</div>

   <script src="main.js"></script>
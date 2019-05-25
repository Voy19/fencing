<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- <link rel="stylesheet" href="reset.css">
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="media_left.css"> -->
   <title>Document</title>
   <?php wp_head(); ?>
</head>

<body>
   <header>

      <a href="<?php echo home_url() ?>" class="logo"></a>
      
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

   <script src="main.js"></script>
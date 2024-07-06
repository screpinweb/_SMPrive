<?php include("includes/config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head.php");?>
</head>

<body class="mad-body--scheme-brown">
  
  <div id="mad-page-wrapper" class="mad-page-wrapper">
    
    <?php include("includes/header.php");?>
    

    <?php include("includes/home-hero-slider.php");?>
      
      <div class="mad-content no-pd">
        <div class="container">

            <div class="mad-section mad-img-section section-with-img no-pb mad-section--stretched mad-colorizer--scheme-color 
            ">
              <div class="container">
                <?php include("includes/home-intro-text.php"); ?>
                <?php include("includes/home-services.php"); ?>
              </div>
            </div>
       
        <?php include("includes/home-values.php"); ?>
        <?php include("includes/home-testimonials.php"); ?>

        </div>
      </div>
  </div>

<?php include("includes/footer.php");?>

</body>
</html>
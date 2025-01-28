<?php
ob_start();
?>
<?php include('header.php'); ?>
<?php if($_GET['action'] == ''){ ?>
      <!-- Jumbotron -->
     
        <div class="cycle-slideshow" data-cycle-fx=scrollHorz data-cycle-timeout=2000>
    <!-- empty element for pager links -->
    <div class="cycle-pager"></div>
   <img src="/img/slide1.png" width="940" height="499" /> 
    <img src="/img/slide2.png" width="940" height="499" />
    <img src="/img/slide3.png" width="940" height="499" />
    <img src="/img/slide4.png" width="940" height="499" />
    <img src="/img/slide5.png" width="940" height="499" />
    <img src="/img/slide6.png" width="940" height="499" />
    <img src="/img/slide7.png" width="940" height="499" />
    
      </div>
    
<?php } ?>
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
         
         {VRL_FEATURED}
        </div>
        
      </div>

      <!-- Site footer -->
<?php
include('footer.php');
?>
<?php include '/home/bigelowva/public_html/admin/app/views/pjLayouts/pjActionFeatured.php'; ?>
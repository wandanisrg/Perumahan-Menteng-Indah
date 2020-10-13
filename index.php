<?php
include 'head_user.php';
$result = tampilbanner()
?>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">

    <div class="item active">
      <img width="100%" src="img/banner/rumah.jpg">
    </div>


    <div class="item">
      <img width="100%" sizes="100" src="img/banner/rumah2.jpg">
    </div>
    <div class="item">
      <img width="100%" sizes="100" src="img/banner/rumah3.jpg">
    </div>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</br>

<?php include 'sidebar.php'; ?>

<?php include 'tagline.php'; ?>
<?php include 'foot_user.php'; ?>
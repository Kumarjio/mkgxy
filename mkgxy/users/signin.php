<?php
$pageTitle = 'Login To Site';
include(SITEDIR.'/libraries/addresses/nearby.php');
?>
<div class="row">
  <div class="col-lg-12">
    <iframe src="http://mkgalaxy.com/users/login?domain=<?php echo $_SERVER['HTTP_HOST']; ?>&logout=<?php echo !empty($_GET['logout']) ? $_GET['logout'] : ''; ?>" scrolling="no" frameborder="0" width="400" height="600" />
  </div>
</div>
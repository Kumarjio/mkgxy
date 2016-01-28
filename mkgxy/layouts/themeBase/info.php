
<div class="container-fluid" id="main">
  <div class="row">
    <div class="col-xs-8" id="middle">
    <!--<div id="mapCanvas"></div>-->
    <?php echo $contentForTemplate; ?>
    </div>
    <div class="col-xs-2" id="right">
      <br />
      <div class="panel panel-primary">
        <div class="panel-heading">Search City</div>
        <div class="panel-body">
          <?php include(SITEDIR.'/locations/searchcity.php'); ?>
        </div>
      </div>
      <?php if (!empty($pageDynamicNavigationItem)) { ?>
      <div class="panel panel-primary">
        <div class="panel-heading">Information</div>
        <div class="panel-body">
          <?php echo $pageDynamicNavigationItem; ?>
        </div>
      </div>
      <?php } ?>
      
      <?php if (!empty($pageDynamicNearby)) { ?>
      <div class="panel panel-primary">
        <div class="panel-heading">Nearby Cities</div>
        <div class="panel-body">
          <?php echo $pageDynamicNearby; ?>
        </div>
      </div>
      <?php } else { ?>
      
        <div id="homepagenearby" style="display:none;" class="panel panel-primary">
          <div class="panel-heading">Nearby Cities</div>
          <div class="panel-body" id="homepagenearbycontent">
            
          </div>
        </div>
      <?php } ?>
    </div>
    
    <div class="col-xs-2" id="adright">
    
    </div>
  </div>
</div>
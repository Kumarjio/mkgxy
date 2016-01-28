<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
<meta property="og:image" content="http://mkgalaxy.com/images/horo.jpg" />
<link href="http://fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet">
<link rel="stylesheet" href="<?php echo config_item('base_url_no_host'); ?>css/mm/5grid/core.css" >
<link rel="stylesheet" href="<?php echo config_item('base_url_no_host'); ?>css/mm/5grid/core-desktop.css" >
<link rel="stylesheet" href="<?php echo config_item('base_url_no_host'); ?>css/mm/5grid/core-1200px.css" >
<link rel="stylesheet" href="<?php echo config_item('base_url_no_host'); ?>css/mm/5grid/core-noscript.css" >
<link rel="stylesheet" href="<?php echo config_item('base_url_no_host'); ?>css/mm/style.css" >
<link rel="stylesheet" href="<?php echo config_item('base_url_no_host'); ?>css/mm/style-desktop.css" />
<script src="<?php echo config_item('base_url_no_host'); ?>css/mm/5grid/jquery.js"></script>
<script src="<?php echo config_item('base_url_no_host'); ?>css/mm/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none&amp;mobileUI.titleBarHeight=55&amp;mobileUI.openerWidth=66"></script>
<!--[if IE 9]><link rel="stylesheet" href="<?php echo config_item('base_url_no_host'); ?>css/mm/style-ie9.css" /><![endif]-->

<script type="text/javascript" src="<?php echo config_item('base_url_no_host'); ?>js/jquery-1.7.1.min.js"></script>
<script language="javascript" src="<?php echo config_item('base_url_no_host'); ?>js/custom.js"></script>
<script language="javascript">

var loadingicon = '<img src="/images/loading.gif" />';
var baseurl = '<?php echo config_item('base_url_no_host'); ?>';
</script>

</head>
<body>
<div id="header-wrapper">
	<div class="5grid-layout">
		<div class="row">
			<div class="12u">
				
				<header id="header">
					<h1><a href="#" class="mobileUI-site-name">AstroMatch</a></h1>
					<nav class="mobileUI-site-nav">
						<a href="/horo2/home" <?php if (empty($menuItemSel)) { ?>class="current-page-item"<?php } ?>>Home</a>
						<a href="/horo2/mylocation" <?php if (!empty($menuItemSel) && $menuItemSel === 'mylocation') { ?>class="current-page-item"<?php } ?>>My Locations</a>
						<a href="/horo2/mybirthdetails" <?php if (!empty($menuItemSel) && $menuItemSel === 'mybirthdetails') { ?>class="current-page-item"<?php } ?>>My Birth Details</a>
						<a href="/horo2/dailymatches" <?php if (!empty($menuItemSel) && $menuItemSel === 'dailymatches') { ?>class="current-page-item"<?php } ?>>Daily Matches</a>
						<a href="/horo2/bestmatches" <?php if (!empty($menuItemSel) && $menuItemSel === 'bestmatches') { ?>class="current-page-item"<?php } ?>>Best Matches</a>
						<a href="/horo2/matchmakingprofile" <?php if (!empty($menuItemSel) && $menuItemSel === 'matchmakingprofile') { ?>class="current-page-item"<?php } ?>>Match Making</a>
						<?php if (!empty($_COOKIE['user_id'])) { ?>
						<a href="/user/logout/horo2">Exit</a>
						<?php } ?>
					</nav>
				</header>
			
			</div>
		</div>
	</div>
</div>
<!--<div id="banner-wrapper">
	<div class="5grid-layout">
		<div class="row">
			<div class="12u">
			
				<div id="banner">
					<h2>Match Making!</h2>
					<span>Create Show & Share</span>
				</div>
		
			</div>
		</div>
	</div>
</div> -->
<div id="main">
			<div class="5grid-layout">
				<div class="row main-row">
					<div class="12u">
						
						<section>
							<?php echo $content_for_layout?>
						</section>
					
					</div>
				</div>
			</div>
		</div>
<div id="footer-wrapper">
	<div class="5grid-layout">
		<div class="row">
			<div class="8u">
				
				<section>
				</section>
			
			</div>
			<div class="4u">

				<section>
					Page rendered in <strong>{elapsed_time}</strong> seconds / {memory_usage}
				</section>

			</div>
		</div>
		<div class="row">
			<div class="12u">

				<div id="copyright">
					&copy; MkGalaxy.Com. All rights reserved.
				</div>

			</div>
		</div>
	</div>
</div>

</body>
</html>
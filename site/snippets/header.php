<!DOCTYPE html>
<html lang="nl"><head>
	<title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
	<meta charset="utf-8">
	<meta http-equiv="Content-Language" content="nl">
	<meta name="robots" content="index, follow, noodp, noydir" />
	<meta name="keywords" content="<?php echo $site->keywords()->html() ?>">
	<meta name="description" content="<?php echo $site->description()->html() ?>">
	<link rel="icon" href="/images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
	<?php echo css('assets/css/style.css') ?>
	<?php echo css('assets/css/tms.css') ?>
	<?php echo css('assets/css/skin.css') ?>
	<?php echo css('assets/css/tabs.css') ?>
	<?php echo js('assets/js/jquery-1.6.1.min.js') ?>
	<?php echo js('assets/js/superfish.js') ?>
	<?php echo js('assets/js/jquery.easing.1.3.js') ?>
	<?php echo js('assets/js/tms-0.3.js') ?>
	<?php echo js('assets/js/tms_presets.js') ?>
	<?php echo js('assets/js/jquery.jcarousel.js') ?>
	<?php echo js('assets/js/tabs.js') ?>
	<?php echo js('assets/js/FF-cash.js') ?>
	<script>
	    $(function(){
		$('#tabs').tabs();
	    })
	    jQuery(document).ready(function() {
		jQuery('#mycarousel').jcarousel();
	    });
	    $(window).load(function(){
		$('.slider')._TMS({
		    prevBu:'#prev',
		    nextBu:'#next',
		    playBu:false,
		    duration:800,
		    easing:'easeOutQuad',
		    preset:'diagonalExpand',
		    pagination:false,//'.pagination',true,'<ul></ul>'
		    pagNums:false,
		    slideshow:6000,
		    numStatus:true,
		    banners:false,// fromLeft, fromRight, fromTop, fromBottom
		    waitBannerAnimation:false,
		    progressBar:false
		})
	    })
		
	</script>
	<script type="text/javascript">
	    var _gaq = _gaq || [];
	    _gaq.push(['_setAccount', 'UA-36431537-1']);
	    _gaq.push(['_trackPageview']);
		
	    (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	    })();
	</script>

	<!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
	<!--[if lt IE 9]>
		    <script type="text/javascript" src="js/html5.js"></script>
	    <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	    <![endif]-->
    </head>
    <body>
	<div class="main">
	    <!--==============================header=================================-->
	    <div class="main1">
		<header>
		    <h1><a class="logo" href="<?php echo $site->homePage()->url() ?>"><?php echo $site->title()->html() ?></a></h1>
		    <div class="search_box">
			<div class="f_left">
			    Zoeken
			</div>
			<div class="f_right">
			    <form id="search" method="get" action="<?php echo url('zoekresultaten') ?>">
				<input name="q" type="text" class="input" value=""/>
				<a onclick="document.getElementById('search').submit()"></a>                    
			    </form>
			</div>
		    </div>
		    <div id="cartcount">
			<a href="<?php echo url('offertemandje')?>">
			    <?php
			    $sessionid = session_id();
			    $filename = kirby()->roots->cache() . "/quote/$sessionid.txt";
			    $arr = array();
			    if(file_exists($filename))
				$arr = json_decode(file_get_contents($filename), true);
			    ?>
			    <?php if(!$arr) : ?>
				Uw offertemandje is leeg
			    <?php else : ?>
				<?php echo count($arr) ?> item(s) in uw offertemandje
			    <?php endif ?>
			</a>
		    </div>
		</header>
		<div class="white_block">
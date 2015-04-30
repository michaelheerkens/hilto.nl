<nav>
    <div class="nav_left"></div>
    <div class="nav_right"></div>
    <ul class="sf-menu">
	<li><a href="<?php echo $site->homePage()->url() ?>">Home</a></li>
	<?php foreach($pages->visible() as $p): ?>
	<li>
	    <a href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
	</li>
	<?php endforeach ?>
    </ul>
    <div class="clear"></div>
</nav>

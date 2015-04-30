<?php snippet('header') ?>
<?php snippet('menu') ?>
<section id="content">
    <div class="container_12">
	<div class="wrapper">
	    <article class="grid_5">
		<h1><?php echo $page->title()->html() ?></h1>
		<?php echo $page->text()->kirbytext() ?>
	    </article>
	</div>
    </div>
</section>
<?php snippet('footer') ?>
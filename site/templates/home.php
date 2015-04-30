<?php snippet('header') ?>
<div class="slider_box">
    <div class="slider">
	<div id="prev"></div>
	<div id="next"></div>
	<ul class="items">
	    <?php foreach ($page->images() as $image): ?>
    	    <li><img src="<?php echo $image->url() ?>" width="995" height="440" alt=""></li>
	    <?php endforeach ?>
	</ul>
    </div>
</div>
<?php snippet('menu') ?>
<section id="content" class="cont_pad">
    <div class="container_12">
	<div class="wrapper">
	    <article class="grid_12">
		<h2 class="ind">Onze producten</h2>
		<ul id="mycarousel" class="jcarousel-skin-tango">
		    <?php foreach ($pages->get('producten')->children() as $p): ?>
    		    <li>
    			<div>
    			    <a href="<?php echo $p->url() ?>">
    				<img src="<?php echo $p->image()->url() ?>" width="197" height="190" alt="" />
    				<br/>
    				<span class="box">
    				    <strong><?php echo $p->title()->html() ?></strong>
    				</span>
    			    </a>
    			</div>
    		    </li>
		    <?php endforeach ?>
		</ul>
	    </article>
	    <article class="grid_6">
		<h2 class="ind">Nieuws</h2>
		<div id="tabs">
		    <div id="tabs-1">
			<?php foreach ($pages->get('nieuws')->children() as $p): ?>
			<div class="extra_container project">
			    <figure><a target="_blank" href=""><?php echo thumb($p->image(), array('width' => 50)); ?></a></figure>
			    <div>
				<div class="title">
				    <?php echo $p->date(('d/m/Y')) ?>
				</div>
				<?php echo $p->text()->html() ?>
			    </div>
			</div>
			<?php endforeach ?>
		    </div>
		</div>
	    </article>
	    <article class="grid_6">
		<h2 class="ind"><?php echo $page->title()->html() ?></h2>
		<div class="wrapper">
		    <?php echo $page->text()->kirbytext() ?>
		</div>
	    </article>
	</div>
    </div>
</section>
<?php snippet('footer') ?>
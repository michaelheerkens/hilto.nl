<?php snippet('header') ?>
<?php snippet('menu') ?>

<?php
$results = $site->search(get('q'));
?>

<section id="content">
    <div class="container_12">
	<div class="wrapper">
	    <article class="grid_10">
		<h2 class="ind1">Zoekresultaten</h2>
		<p id="xsltsearch_summary">Uw zoekopdracht voor <strong><?php echo get('q') ?></strong> overeenkomsten <strong><?php echo count($results) ?></strong> pagina's</p>
		<?php if ($results): ?>
    		<ul>
			<?php foreach ($results as $result): ?>
			    <li><a href="<?php echo $result->url() ?>"><?php echo $result->title() ?></a></li>
			<?php endforeach ?>
    		</ul>
		<?php endif ?>
	    </article>
	</div>
    </div>
</section>
<?php snippet('footer') ?>
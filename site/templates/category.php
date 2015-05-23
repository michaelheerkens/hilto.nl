<?php snippet('header') ?>
<?php snippet('menu') ?>
<?php
$pricelist = '';
$pricelistUrl = '';
$infoFiles = array();
foreach ($page->files() as $file) {
    if ($file->extension() === 'csv') {
	$pricelist = $file->dir() . '/' . $file->filename();
	$pricelistUrl = $file->url();
    } else {
	$infoFiles[] = $file->url();;
    }
}
?>
<section id="content">
    <div class="container_12">
	<div class="wrapper">
	    <article class="grid_12">
		<h4>
		    <?php foreach ($site->breadcrumb() as $crumb): ?>
    		    <a href="<?php echo $crumb->url() ?>">
			    <?php echo html($crumb->title()) ?>
    		    </a>
    		    <span> > </span>
		    <?php endforeach ?>
		</h4>
		<h2 class="ind2">Producten</h2>
		<ul id="categories">
		    <?php foreach ($page->children() as $p): ?>
    		    <li>
    			<a href="<?php echo $p->url() ?>">
    			    <div>
				    <?php if ($image = $p->image()): ?>
					<img src="<?php echo $image->url() ?>">
					<br>
				    <?php endif ?>
    				<span class="box"><strong><?php echo $p->title()->html() ?></strong></span>
    			    </div></a></li>
		    <?php endforeach ?>
		</ul>

		<?php
		$row = 0;
		$priceArr = array();
		if (($handle = fopen($pricelist, "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
			if ($data[2] > 0) {
			    $priceArr[$row]['ARTNUMMER'] = $data[0];
			    $priceArr[$row]['ARTFAK_OM'] = $data[1];
			    $priceArr[$row]['ART_PRI_V'] = $data[2];
			}
			$row++;
		    }
		    fclose($handle);
		}
		?>
		<?php if (count($priceArr) > 0) : ?>
		<h3><a href="<?php echo $pricelistUrl?>">Download prijslijst</a></h3>
		<?php foreach ($infoFiles as $if) : ?>
		<h3><a target="_blank" href="<?php echo $if ?>">Download info bestand</a></h3>
		<?php endforeach ?>
    		<div id="scrollingDiv" style="position:absolute;"></div>
    		<fieldset style="padding-bottom:6px;">
    		    <legend style="float: left; ">Filteren: </legend><input id="searchInput" value=""></fieldset>
    		<table class="alternate_color">
    		    <tbody id="fbody">
			    <?php foreach ($priceArr as $priceItem): ?>
				<tr>
				    <td style="width:200px"><?php echo $priceItem['ARTNUMMER'] ?></td>
				    <td style="width:300px"><?php echo $priceItem['ARTFAK_OM'] ?></td>
				    <td style="width:150px">€ <?php echo $priceItem['ART_PRI_V'] ?></td>
				    <td style="width:150px">
					<?php /*
					<form method="post" action="<?php echo url('offertemandje') ?>">
					    <input type="submit" class="addToCartButton" id="add_XXX" value="Submit">
					    <input type="hidden" name="ARTNUMMER" value="<?php echo $priceItem['ARTNUMMER'] ?>" />
					    <input type="hidden" name="ARTFAK_OM" value="<?php echo $priceItem['ARTFAK_OM'] ?>" />
					    <input type="hidden" name="ART_PRI_V" value="<?php echo $priceItem['ART_PRI_V'] ?>" />
					</form>
					 */
					?>
				    </td>
				</tr>
			    <?php endforeach ?>
    		    </tbody>
    		</table>
		<?php endif ?>
	    </article>
	</div>
    </div>
</section> 

<script type="text/javascript">
    <!--
    $(document).ready(function() {
	$('.addToCartButton').click(function(e) {
	    var $id = parseInt(this.id.substring(4));
	    $.get('/Base/DocCart/AddToCart/' + $id, function(data) { 
		if (data == 1) {
		    $('.cartCount').html(data + ' item in uw offertemandje'); 
		    $('#scrollingDiv').html('<a href="/offertemandje.aspx">' + data + ' item in uw offertemandje</a>'); 
		} else {
		    $('.cartCount').html(data + ' items in uw offertemandje'); 
		    $('#scrollingDiv').html('<a href="/offertemandje.aspx">' + data + ' items in uw offertemandje</a>'); 
		}
	    }); 
	    var $scrollingDiv = $("#scrollingDiv");
	    $scrollingDiv
	    .stop()
	    .animate({"marginTop": (e.pageY-282) + "px"}, "slow" );	
	}); 

	$("table.alternate_color tr:even").addClass("d0");
	$("table.alternate_color tr:odd").addClass("d1");
		
	//Declare the custom selector 'containsIgnoreCase'.
	$.expr[':'].containsIgnoreCase = function(n,i,m){
	    return jQuery(n).text().toUpperCase().indexOf(m[3].toUpperCase())>=0;
	};
  
	$("#searchInput").keyup(function(){

	    $("#fbody").find("tr").hide();
	    var data = this.value.split(" ");
	    var jo = $("#fbody").find("tr");
	    $.each(data, function(i, v){

		//Use the new containsIgnoreCase function instead
		jo = jo.filter("*:containsIgnoreCase('"+v+"')");
	    });

	    jo.show();

	}).focus(function(){
	    this.value="";
	    $(this).css({"color":"black"});
	    $(this).unbind('focus');
	}).css({"color":"#C0C0C0"});
    });		
    // -->
</script>

<?php snippet('footer') ?>
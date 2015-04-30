<?php
$sessionid = session_id();
$filename = kirby()->roots->cache() . "/quote/$sessionid.txt";
if (file_exists($filename))
    $arr = json_decode(file_get_contents($filename), true);

if ($_POST['ARTNUMMER']) {
    switch ($_POST['action']) {
	case 'Verwijder':
	    unset($arr[$_POST['ARTNUMMER']]);
	    break;
	case 'Update':
	    $arr[$_POST['ARTNUMMER']]['QUANTITY'] = $_POST['quantity'];
	    break;
	default:
	    $arr[$_POST['ARTNUMMER']] = array(
		'ARTFAK_OM' => $_POST['ARTFAK_OM'],
		'ART_PRI_V' => str_replace(',', '.', $_POST['ART_PRI_V']),
		'QUANTITY' => (isset($arr[$_POST['ARTNUMMER']]) ? ((int) $arr[$_POST['ARTNUMMER']]['QUANTITY']) + 1 : 1)
	    );
	    break;
    }
    file_put_contents($filename, json_encode($arr));
}
?>
<?php snippet('header') ?>
<?php snippet('menu') ?>
<section id="content">
    <div class="container_12">
	<div class="wrapper">
	    <article class="grid_10">
		<h2 class="ind1">Offertemandje</h2>
		<table id="cart" style="width:800px">
		    <thead>
		    <th>
		    </th>
		    <th style="text-align: left;">
			Code
		    </th>
		    <th style="text-align: left;">
			Omschrijving
		    </th>
		    <th style="text-align: left;">
			Aantal
		    </th>
		    <th style="text-align: right;">
			Prijs
		    </th>
		    </thead>
		    <tbody>
			<?php if (count($arr) > 0) : ?>
			    <?php foreach ($arr as $k => $v) : ?>
				<?php $subtotal += (float) ($v['QUANTITY'] * $v['ART_PRI_V']); ?>
				<tr>
				    <td style="text-align: left;">
					<form method="post" action="<?php echo url('offertemandje') ?>">
					    <input type="submit" id="submit" name="action" value="Verwijder" class="">
					    <input type="hidden" name="ARTNUMMER" value="<?php echo $k ?>">
					</form>
				    </td>
				    <td style="text-align: left;">
					<?php echo $k ?>
				    </td>
				    <td>
					<?php echo $v['ARTFAK_OM'] ?>
				    </td>
				    <td style="text-align: left;">
					<form method="post" action="<?php echo url('offertemandje') ?>">
					    <input type="text" name="quantity" id="quantity" style="width: 20px;" value="<?php echo $v['QUANTITY'] ?>">
					    <input type="hidden" name="ARTNUMMER" value="<?php echo $k ?>">
					    <input type="submit" id="submit" name="action" value="Update" class="">
					</form>
				    </td>
				    <td style="text-align: right;">
					€ <?php echo ($v['QUANTITY'] * $v['ART_PRI_V']) ?>
				    </td>
				</tr>
			    <?php endforeach ?>
    			<tr>
    			    <td colspan="4" style="text-align: right; padding-top:15px;">
    				<b>Sub-Totaal:</b>
    			    </td>
    			    <td class="cartTotal" style="text-align: right; padding-top:15px;">
    				<b>€ <?php echo $subtotal ?></b>
    			    </td>
    			</tr>
			<?php else : ?>
    			<tr>
    			    <td colspan="5">Uw offertemandje is leeg</td>
    			</tr>
			<?php endif ?>
		    </tbody>
		</table>
		<h3>Stuur mij een persoonlijke offerte voor de producten in mijn offertemandje:</h3>
		<div id="contact-form">
		    <fieldset>
			<label class="companyname"><input type="text" name="txtCompanyname" id="txtCompanyname" style="width: 300px;" value="Uw bedrijfsnaam*: " /></label>
		    </fieldset>
		    <fieldset>
			<label class="contactpersoon"><input type="text" name="txtContact" id="txtContact" style="width: 300px;" value="Contactpersoon*: " /></label>
		    </fieldset>
		    <fieldset>
			<label class="customercode"><input type="text" name="txtCustomercode" id="txtCustomercode" style="width: 300px;" value="Klantnr Hilto (optioneel): " /></label>
		    </fieldset>
		    <fieldset>
			<label class="email"><input type="text" name="txtEmail" id="txtEmail" style="width: 300px;" value="Uw emailadres*: " /></label>
		    </fieldset>
		    <fieldset>
			<label class="comments"><textarea name="txtComments" id="txtComments" style="width: 350px; height:150px">Eventuele opmerkingen:&nbsp;</textarea></label>
		    </fieldset>
		</div>
		<input type="submit" name="submit" value="Verstuur"/>
	    </article>
	</div>
    </div>
</section>
<?php snippet('footer') ?>
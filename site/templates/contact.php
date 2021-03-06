<?php
$send = false;

if($_POST) {
    $data = array(
      'secret' => "6LetjtwZAAAAAEsIKs4-8tBhMb2mfj_v_MEGDwW8",
      'response' => $_POST['g-recaptcha-response']
    );

    $verify = curl_init();
    curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    $response = json_decode(curl_exec($verify), true);

    if (isset($_POST) && isset($_POST['g-recaptcha-response']) && $response['success'] === true) {
        $body = $_POST['txtCompanyname'] . "\n" .
    	    $_POST['txtContact'] . "\n" .
    	    $_POST['txtPhone'] . "\n" .
    	    $_POST['txtEmail'] . "\n" .
    	    $_POST['txtComments'];

        $email = New Email(array(
    		'to' => 'Michael Heerkens <michael.heerkens@gmail.com>',
    		'from' => 'No-Reply <michael.heerkens@allblue.nl>',
    		'subject' => 'Contactformulier ingevuld ' . time(),
    		'body' => $body,
    		'service' => c::get('email.use'),
    		'options' => array(
    		    'key' => c::get('email.postmark.key'),
    		)
    	    ));

        if (!$send = $email->send())
	         echo $email->error()->message();
         }
}
?>
<?php snippet('header') ?>
<script src="https://www.google.com/recaptcha/api.js"></script>
<?php snippet('menu') ?>
<section id="content">
    <div class="container_12">
	<div class="wrapper">
	    <article class="grid_5">
		<h2 class="ind2">Contact info</h2>

		<dl class="adress">
		    <?php echo $page->text()->kirbytext() ?>
		</dl>
		<span class="map_wrapper">
		    <iframe width="350" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=nl&amp;geocode=&amp;q=Van+Utrechtweg+29,+Krimpen+aan+den+IJssel,+Nederland&amp;aq=0&amp;oq=Van+Utrechtweg+29+k&amp;sll=37.0625,-95.677068&amp;sspn=36.999937,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Van+Utrechtweg+29,+2921+LN+Krimpen+aan+den+IJssel,+Zuid-Holland,+Nederland&amp;t=m&amp;z=14&amp;ll=51.907676,4.577942&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=nl&amp;geocode=&amp;q=Van+Utrechtweg+29,+Krimpen+aan+den+IJssel,+Nederland&amp;aq=0&amp;oq=Van+Utrechtweg+29+k&amp;sll=37.0625,-95.677068&amp;sspn=36.999937,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=Van+Utrechtweg+29,+2921+LN+Krimpen+aan+den+IJssel,+Zuid-Holland,+Nederland&amp;t=m&amp;z=14&amp;ll=51.907676,4.577942" style="color:#0000FF;text-align:left">Grotere kaart weergeven</a></small>
		</span>
	    </article>
	    <article class="grid_7">
		<h2 class="ind2">Neem contact op</h2>
		<?php if (!$send) : ?>
    		<form method="post" action="<?php echo url('contact') ?>" id="contactform">
    		    <div id="contact-form">
    			<fieldset>
    			    <label class="companyname"><input type="text" name="txtCompanyname" id="txtCompanyname" style="width: 300px;" value="Uw bedrijfsnaam*: " /></label>
    			</fieldset>
    			<fieldset>
    			    <label class="contactpersoon"><input type="text" name="txtContact" id="txtContact" style="width: 300px;" value="Contactpersoon*: " /></label>
    			</fieldset>
    			<fieldset>
    			    <label class="customercode"><input type="text" name="txtPhone" id="txtPhone" style="width: 300px;" value="Telefoon: " /></label>
    			</fieldset>
    			<fieldset>
    			    <label class="email"><input type="text" name="txtEmail" id="txtEmail" style="width: 300px;" value="Uw emailadres*: " /></label>
    			</fieldset>
    			<fieldset>
    			    <label class="comments"><textarea name="txtComments" id="txtComments" style="width: 350px; height:150px">Bericht:&nbsp;</textarea></label>
    			</fieldset>
        </div><br>
            <button class="g-recaptcha" data-sitekey="6LetjtwZAAAAAA8tuajqr4nowIIgyBSSgr0i5Jpc" data-callback='onSubmit' data-action='submit'>Verstuur nu</button>
    		</form>
		<?php else : ?>
    		<p>Wij hebben uw mail ontvangen en zullen spoedig contact opnemen.</p>
		<?php endif ?>
	    </article>
	</div>
    </div>
</section>
<script>
   function onSubmit(token) {
     document.getElementById("contactform").submit();
   }
 </script>
<?php snippet('footer') ?>

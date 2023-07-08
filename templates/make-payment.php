<?php
/*
	Template Name: Make Paymeny
*/

get_header();
?>
<?php wp_nonce_field('woocommerce-process_checkout'); ?>

<div class="payement-section">
	<div class="page-logo">
		<a href="/">
		<img src="https://frieda.health/wp-content/uploads/2023/01/logo-new-1.svg"/>
		</a>
	</div>
	<div class="container"> 
		<div class="payment-wrap">
			<div class="leftform-block">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/r-form.png"/>
				<h3>Registriere Dich und entdecke Deinen Kurs.</h3>
				<!-- <p>Empowerment through confidential support empowerment through confidential support </p> -->
			</div>
			<div class="payment-block">
				<h3 class="inner-title">Beginne deine Reise zu mehr<br>Wohlbefinden in den Wechseljahren.</h3>
				<span class="form-detail">
					<span class="r-name">Registrierung</span>
					<span class="p-name">Bezahlung</span>
				</span>
				<!-- <h4>Bezahlung</h4>
				<p>Gebe hier Deine Daten ein, um ein Benutzerkonto zu erstellen.</p> -->
				<?php
					/*
						if(isset($_GET['add-to-cart'])) {
							?>
							<div>
								<h2>Course Payment Peding Message</h2>
								<p>Showing when user payment not completed and user logged in again.</p>
								<hr>
							</div>
						<?php }
					*/
				?> 
				<div class="woocommerce-checkout">
				<!-- <p class="payment-info-block">Zahle die Kursgebühr und bekomme nach der<br> Kurs-absolvierung bis zu 100% der Kurskosten von deiner Krankenkasse erstattet.</p> -->
					<?= do_shortcode('[woocommerce_checkout]'); ?>
				</div>
			</div>	
		</div>
	</div> 
</div>

<?php get_footer(); ?>
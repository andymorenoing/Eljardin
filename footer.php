<?php

/**
 * The template for displaying the footer.
 *
 *
 * @package WordPress
 */
?>
	<footer class="woowContentFull footer">
		<div class="woowContent1600 pure-g footer_content">
			<div class="pure-u-1 pure-u-md-1-4">
				<img src="<?= IMGURL ?>footer.jpg" alt="">
			</div>
			<div class="pure-u-1-2 pure-u-md-1-4">
				<h4>CONTACTO</h4>
				<p><i class="icon-phone"></i>(+57) 322 363 0292</p>
				<p><i class="icon-envelop"></i>serandresm@gmail.com</p>
				<p><i class="icon-location2"></i>Bogotá, Colombia</p>
			</div>
			<div class="pure-u-1-2 pure-u-md-1-4">
				<h4>NOSOTROS</h4>
				<p>Somos una empresa de juguetes eróticos, que ofrece la oportunidad de explorar y disfrutar un poco má la sexualidad.</p>
			</div>
			<div class="pure-u-1 pure-u-md-1-4">
				<h4>MEDIOS DE PAGO</h4>
				<img src="<?= IMGURL ?>medios_pago.jpg" alt="" style="margin-left:0">
				<p class="footer_social">SIGUENOS EN 
					<a href=""><span><i class="icon-instagram"></i></span></a>
					<a href=""><span><i class="icon-facebook"></i></span></a>
					<a href=""><span><i class="icon-twitter"></i></span></a>
				</p>
			</div>
			<p class="footer_info_copy">Copyright 2020 © El Jardin - Colombia </p>
		</div>
	</footer>
	<!-- Woow Custom Scripts -->
	<script type='text/javascript' src='<?php echo JSURL ?>swiper.min.js?ver=<?php echo VCACHE ?>'></script>
	<!-- Woow Custom Scripts -->
	<script type='text/javascript' src='<?php echo JSURL ?>app.js?ver=<?php echo VCACHE ?>'></script>
	<?php wp_footer(); ?>
</body>
</html>
	<footer id="footer">
		<?php $maxim_footer_position = ot_get_option('footer_position') ? ot_get_option('footer_position') : 'footer-default'; ?>
		<p class="<?php echo $maxim_footer_position; ?>"><?php echo ot_get_option('footer'); ?></p>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
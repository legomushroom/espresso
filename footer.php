
			<?php get_template_part( '/templates/site-footer' ); ?>

		</div>
		<!-- End Site Wrapper -->

    <script type="text/javascript">
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-XXXXXXXX-X', 'auto');
      ga('send', 'pageview');
    </script>
		
		<!-- WP Footer -->
		<?php wp_footer(); ?>
		<!-- End WP Footer -->
    <script src="<?= get_bloginfo("template_url"); ?>/bower_components/tap/dist/tap.min.js"></script>

	</body>

</html>
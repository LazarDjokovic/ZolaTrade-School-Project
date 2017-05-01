<script>

  $(document).ready(function() {

	var docHeight = $(window).height(); //screen size
	var footerHeight = $('#footer').height(); //footer size
	var footerTop = $('#footer').position().top + footerHeight; 

	if (footerTop < docHeight) {
	$('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
	}
	
  });
  
</script>
<footer id="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2">
				<h6>Copyright &copy; 2017 <a href="http://lazardjokovic.com">Lazar Djokovic</a></h6>
			</div>
			<div class="col-sm-4">
				<h6>About us</h6>
				<p>ZolaTrade is the company that sells all sorts of video games. We have games for PC, Xbox, PS4 etc. Company was founded in 2002 by Lazar Djokovic.
				   Today company has more than 5000 employes  in more than 10 countries on 4 continents.
					</p>
			</div>
			<div class="col-sm-2">
				<h6>Navigation</h6>
					<ul class="unstyled">
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php?page=7">All Products</a></li>
						<li><a href="index.php?page=5">Contact</a></li>
						<li><a href="index.php?page=6">Author</a></li>
						<li><a href="documentation.pdf">Documentation</a></li>
					</ul>
			</div>
			<div class="col-sm-2">
				<h6>Follow us</h6>
					<ul class="unstyled">
						<li><a href='https://www.facebook.com/'>Facebook</a></li>
						<li><a href='https://www.twitter.com/'>Twitter</a></li>
						<li><a href='https://plus.google.com/'>Google+</a></li>
					</ul>
			</div>
			<div class="col-sm-2">
				<h6>Coded with <span class="glyphicon glyphicon-heart"></span> by <a href="http://lazardjokovic.com">Lazar Djokovic</a></h6>
			</div>
		</div>
	</div>
</footer>
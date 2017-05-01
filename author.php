<div class="container">
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
			<img src="images/author/LazarDjokovic.jpg" alt="Lazar Djokovic" class="img-rounded"/><br/><br/>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12">
			<p>My name is Lazar Djokovic. I am currently in the third year of studies at the  ICT College of Vocational Studies in Belgrade, majoring in Internet Technologies.
			   I’m applying for internship in your company because I want to improve my knowledge and learn new stuff. Looking forward to individual work and teamwork.</p><br/>
			<p><b>Email:</b><a href="mailto:lazar.djokovic.13.14@ict.edu.rs?subject=ZolaTade&body=Hi Lazar, " title="email"> lazar.djokovic.13.14@ict.edu.rs</a></p>
		</div>
		<div class="col-lg-4 col-md-offset-2 col-md-4 col-md-offset-2 col-sm-6 col-xs-8">
			
			
					<div class="panel panel-primary" id="poll">
						<div class="panel-heading">
							<h3 class="panel-title">
								<span class="glyphicon glyphicon-arrow-right"></span> Rate my website
							</h3>
						</div>
						<form id="pollForm" method="GET" action="">
							<div class="panel-body">
								<ul class="list-group">
									<li class="list-group-item">
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="radio1" value="1"/>
												Good
											</label>
											<span id="count1" class="spanCountVotes"></span>
										</div>
									</li>
									<li class="list-group-item">
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="radio2" value="2"/>
												Great
											</label>
											<span id="count2" class="spanCountVotes"></span>
										</div>
									</li>
									<li class="list-group-item">
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="radio3" value="3"/>
												Excellent
											</label>
											<span id="count3" class="spanCountVotes"></span>
										</div>
									</li>
									<li class="list-group-item">
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="radio4" value="4"/>
												Awesome
											</label>
											<span id="count4" class="spanCountVotes"></span>
										</div>
									</li>
									<li class="list-group-item">
										<div class="radio">
											<label>
												<input type="radio" name="optionsRadios" id="radio5" value="5"/>
												Best
											</label>
											<span id="count5" class="spanCountVotes"></span>
										</div>
									</li>
								</ul>
							</div>
							<div class="panel-footer">
								<button type="button" class="btn btn-primary btn-sm" onClick="ajaxPost();">
									Vote</button>
								<div id="status"></div>
								<script type="text/javascript">listNums();</script>
							</div>
						</form>
				</div>
		</div>
	</div>
</div>
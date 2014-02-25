<?php echo $this->load->view('partials/menu');?>
<div class="scrollbar">
	<div class="handle">
		<div class="mousearea"></div>
	</div>
</div>
<div class="scroll-container" style="position: fixed; left: 0; right: 0; top: 0; height: 100%">
	<div id="frame">
		<div id="content-wrapper">
			<div class="dynamic-content container" id="main-content">
				<div class="social-share top ">
					<ul>
						<li>
							<a href="https://facebook.com"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a href="https://twitter.com"><i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a href="https://google.com"><i class="fa fa-google-plus"></i></a>
						</li>
						<!--li>
							<a href="https://pinterest.com"><i class="fa fa-pinterest"></i></a>
						</li>
						<li>
							<a href="http://linkedin.com"><i class="fa fa-linkedin"></i></a>
						</li-->
					</ul>
				</div>
				<div class="arrow-nav hidden-sm hidden-md hidden-lg">
					<a href="restaurant.html">
						<i class="fa fa-share"></i>
					</a>
				</div>
				<div id="maximage">
					<div>
						<img src="<?php echo site_url('assets/frontend/img/400x300.gif');?>" alt="" class="current-slide" data-href=".slide1"/>
					</div>
					<div>
						<img src="http://placehold.it/2560x1440" alt="" data-href=".slide2"/>
					</div>
					<div>
						<img src="http://placehold.it/2560x1440" alt="" data-href=".slide3"/>
					</div>
					<div>
						<img src="http://placehold.it/2560x1440" alt="" data-href=".slide3"/>
					</div>
					<div>
						<img src="http://placehold.it/2560x1440" alt="" data-href=".slide5"/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="menu-bg"></div>
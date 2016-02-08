<?php include('header_info.php'); ?>
<body>
    <?php include('track/track.php'); ?>
	<!-- header-section-starts -->
	<div class="container">	
		<div class="news-paper">
		<?php include('header.php'); ?>
        <?php include('menu.php'); ?>
			<div class="clearfix"></div>
			<div class="main-content">		
				<div class="contact-section">
					<div class="contact-section-head">
						<h3>Contact us</h3>
					</div>
					<div class="map">
<script src="https://maps.googleapis.com/maps/api/js"></script>
 <script>
      function initialize() {
        var mapCanvas = document.getElementById('map-canvas');
        var mapOptions = {
          center: new google.maps.LatLng(-1.277926,36.815522),
          zoom: 18,
          mapTypeId: google.maps.MapTypeId.HYBRID
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<style>
  #map-canvas {
    margin-bottom: 20px;
    width: auto;
    height: 360px;
    background-color: #CCC;
  }
</style>
<div id="map-canvas"></div>
                        
					</div>
					<div class="contact-form-bottom">
						<div class="col-md-4 address">
							<address>
								<h5>Address:</h5>
								<p>WASP AFRICA</p>
								<p> Corporate Headquarters 5th Floor Longonot Place</p>
								<p> P.O. Box 73270-00200</p>
								<p class="bottom">Nairobi, Kenya.</p>
								<h5>Phone:</h5>
								<p>254 (0)20-343344</p>
								<p>+254727808266/5</p>
                                <h5>Email:</h5>
								<p>support [at] waspafrica.com</p>
								
                               


                                
                                
							</address>
						</div>
						<div class="col-md-4 contact-form">
						<form>
								<div class="contact-form-row">
									<div>
										<span>Name</span>
										<input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
									</div>
									<div>
										<span>Email</span>
										<input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
									</div>
									<div>
										<span>Phone</span>
										<input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
									</div>
									<input type="submit" value="Submit" />
									<div class="clearfix"> </div>
								</div>
						</form>
					</div>
					<div class="col-md-4 contact-form-row ccomments">
						<div>
							<span>Enter text</span>
							<textarea value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}"></textarea>
						</div>
						<div>
							<span>Security</span>
							<img src="images/security.jpg" class="code" alt="" />
							<input type="text" class="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
		</div>
			</div>
			<div class="footer text-center">
				<?php include('menu_footer.php'); ?>
                <?php include('copyright.php'); ?>
			</div>
		</div>
	</div>
</body>
</html>
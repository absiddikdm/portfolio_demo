
        <!--**********************************
            Footer start
        ***********************************-->
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="/deadlock/admin_asset/vendor/global/global.min.js"></script>
	<script src="/deadlock/admin_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="/deadlock/admin_asset/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/deadlock/admin_asset/js/custom.min.js"></script>
	<script src="/deadlock/admin_asset/js/deznav-init.js"></script>
	<script src="/deadlock/admin_asset/vendor/owl-carousel/owl.carousel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<!-- Chart piety plugin files -->
    <script src="/deadlock/admin_asset/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="/deadlock/admin_asset/vendor/apexchart/apexchart.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="/deadlock/admin_asset/js/dashboard/dashboard-1.js"></script>
	<script>
     


		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},	
					1200:{
						items:2
					},			
					
					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})			
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script>
</body>
</html>
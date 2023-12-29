</section>
  </div>
</body>
<script type = 'text/javascript' src = "<?php echo base_url(); ?>js/main.js"></script>
<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3jglgRAe6mwVwSNPF9siF43POgGi7jl4&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script><script src="<?php echo base_url(); ?>vendors/scripts/core.js"></script>
	<script src="<?php echo base_url(); ?>vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/scripts/process.js"></script>
	<script src="<?php echo base_url(); ?>vendors/scripts/layout-settings.js"></script>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/scripts/dashboard.js"></script>
<script>
    $(document).ready( function () {
		var id = $('.hist-id').attr('id');
			 $('#google-hist').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'ajax': {
	          'url':'<?=site_url()?>/ItemCRUD/view_table/' + id
	      	},
	      	'columns': [
						
	         	{ data: 'id' },
	         	{ data: 'title' },
	         	{ data: 'rating' },
	         	{ data: 'level' },
	         	{ data: 'review' },
	         	{ data: 'type' },
	         	{ data: 'location' },
	         	{ data: 'email' },
	         	// { data: 'payPerNight' },
	         	{ data: 'direction' },
	         	{ data: 'straight' },
	         	{ data: 'driving_time' },
	         	{ data: 'walking_time' },
	         	{ data: 'transit_time' },
	         	{ data: 'cycling_time' },
	         	{ data: 'latitude' },
	         	{ data: 'longitude' },
	         	{ data: 'photo' },
	         	{ data: 'website' },
	         	{ data: 'phonenumber' },
						 { data: 'zipcode' },
	         	{ data: 'housingContactEmail' },
	         	{ data: 'contactName' },
	         	{ data: 'additionalContact' },
	         	{ data: 'amenities' },
	         	{ data: 'details' },
	      	],
					select: {
            style:    'os',
            selector: 'td:first-child'
        },
	   	});
		} );
  let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
      arrow[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
        arrowParent.classList.toggle("showMenu");
      });
    }
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    console.log(sidebarBtn);
    /* sidebarBtn.addEventListener("click", () => {
      sidebar.classList.toggle("close");
    }); */
    $(function () {
      /* console.log("width: "+ document.body.clientWidth); */
      
      resizeScreen();
      $(window).resize(function(){
        resizeScreen();
      });
      $('.bx-menu').click(function(){

        // 點選選單按鈕時，大螢幕為新增或移除.close，小螢幕新增或移除.small-screen預設有.close，
        if(document.body.clientWidth > 400){
          $('.sidebar').toggleClass('close');
        }else{
          $('.sidebar').toggleClass('small-screen');
        }
      });
      
      function resizeScreen() {
        // 大螢幕.sidebar預設為沒有.close，小螢幕.sidebar預設為有.close
        if(document.body.clientWidth > 400){
          $('.sidebar').addClass('close');
        }else{
          $('.sidebar').removeClass('close');
        }
      }
    });
</script>
</html>

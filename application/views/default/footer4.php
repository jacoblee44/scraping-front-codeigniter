</section>
  </div>
</body>
<script type = 'text/javascript' src = "<?php echo base_url(); ?>js/main.js"></script>
<script type = 'text/javascript' src = "<?php echo base_url(); ?>js/count.js"></script>
<script src="<?php echo base_url(); ?>vendors/scripts/core.js"></script>
	<script src="<?php echo base_url(); ?>vendors/scripts/script.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/scripts/process.js"></script>
	<script src="<?php echo base_url(); ?>vendors/scripts/layout-settings.js"></script>
	<script src="<?php echo base_url(); ?>src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>vendors/scripts/dashboard.js"></script>
<script>
    $(document).ready( function () {
	   	dataTable = $('#history').DataTable({
			'processing': true,
			'serverSide': true,
			'serverMethod': 'post',
			'ajax': {
				'url':'<?=site_url()?>/ItemCRUD/westin_history'
				
			},
			'columns': [
				{ data: 'id' },
				{ data: 'title' },
				{ data: 'location' },
				{ data: 'category' },
				{ data: 'radius' },
				{ data: 'view' },
			],
			'columnDefs': [ {
				'targets': [5], // column index (start from 0)
				'orderable': true, // set orderable false for selected columns
			}]
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
	function checkcheckbox(){

		// Total checkboxes
		var length = $('.delete_check').length;

		// Total checked checkboxes
		var totalchecked = 0;
		$('.delete_check').each(function(){
		if($(this).is(':checked')){
			totalchecked+=1;
		}
		});

	}
	$('#btn-delete').click(function (e) {
		e.preventDefault();
		var deleteids_arr = [];

      // Read all checked checkboxes
		$("input:checkbox[class=delete_check]:checked").each(function () {
			deleteids_arr.push($(this).val());
		});

		// Check checkbox checked or not
		if(deleteids_arr.length > 0){

			// Confirm alert
			console.log(deleteids_arr)
			$.ajax({
				url: delete_url,
				type: 'post',
				data: {
					'deleteids_arr': deleteids_arr
				},
				success: function(response){
					dataTable.ajax.reload();
					toastr.success("Success Deleting Data!")
				}
			});
			
		}
	})
</script>
</html>

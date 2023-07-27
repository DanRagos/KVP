  <script src="../assets/js/plugins/jquery-3.6.1.js"></script>
  <script src='../assets/js/plugins/main.js'></script>
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
    <script src="../assets/js/plugins/dataTables.fixedColumns.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
   <script src="../assets/js/plugins/moment.js"></script>
  <script src="../assets/js/plugins/daterangepicker.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="../assets/js/plugins/dateTime.min.js"></script>
    <script src="../assets/js/plugins/sweetalert.min.js"></script>
	<script src="../assets/js/plugins/virtual-select.min.js"></script>
	<script src="../assets/js/plugins/tooltip.min.js"></script>
  <script>
		$("body").on("click",".logoutBtn", function(e){
		e.preventDefault();
		swal({
			title: "Log out??",
			text: "",
			icon: "warning",
			buttons: true,
			dangerMode: true,
			})
			.then((willDelete) => {
			if (willDelete) {
			$.ajax({
				url: '../php/logout.php',
				method: 'post',
				success: function(response){
					swal("Logged Out", {
					icon: "success",
			}).then(function() {
            window.location.href = "../index.php";
        });
				
				}
			});
			
			}
			});
		
	});
	</script>
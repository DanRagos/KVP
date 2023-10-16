  <script src="../assets/js/plugins/jquery-3.6.1.js"></script>
  <script src='../assets/js/plugins/main.js'></script>
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
    <script src="../assets/js/plugins/dataTables.fixedColumns.min.js"></script>
    <script src="../assets/js/plugins/datatable-ellipsis.js"></script>
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
		Swal.fire({
				icon: "warning",
                title: 'Do you want to logout?',
                showCancelButton: true,
                confirmButtonText: 'Confirm',
                denyButtonText: 'Cancel',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({
                        url: '../php/logout.php',
                        method: 'post',
                     
                        success: function(e) {
                            Swal.fire('Logged out!', '', 'success').then(function() {
            window.location.href = "../index.php";
        });
                          
                        }
                    });

                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
	});
	var source = new EventSource('../php/create_sse.php');
source.onmessage = function(event) {
    var count = parseInt(event.data); // Parse the plain text data to an integer
    if (!isNaN(count)&& count>0) {
        document.getElementById('notif_bell').textContent = count;
    }
    else {
        document.getElementById('notif_bell').textContent = "";
    }

};
$(document).on('click', '#notifications', function () {
    let user_id = <?php echo $id ; ?>;
   $.ajax({
     url: '../php/process.php',
     method: 'GET',
     data: {user_id:user_id, action:'getUserNotification'},
     success: function (response){
       $('.notifContent').html(response);
     }
   });
});
	

	</script>
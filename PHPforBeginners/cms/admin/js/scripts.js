$(function () {

	$('#selectAllPosts').click(function (){
		var check= this.checked;

		$('.checkBoxes').each(function () {
			this.checked = check;
		});		

	});

	$('#bulk_submit').on('submit', function (event) {

		if($('select[name="bulk_option"] :selected').val() === 'delete'){
			
			var conf = confirm('Are you sure you want to delete this(those) post(s)?!');
			
			if(!conf){
				event.preventDefault();
				return false;
			}
			
			return true;
		}
		

	});

	/**
	 * Ajax request to get online users.
	 * @return {[type]} [description]
	 */
	function loadUsersOnline () {

		$.ajax({
			method: 'POST',
			url: 'includes/users_functions.php',
			data: {
				online_users: 'true'
			},
			success: function (data) {
				$(".usersonline").text(data);
				console.log('s');
			},
			error: function (){
				console.log('error');
			}
		});


	}

	setInterval(function (){
		loadUsersOnline();
	}, 500);




});

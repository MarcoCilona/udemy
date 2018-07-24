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


});
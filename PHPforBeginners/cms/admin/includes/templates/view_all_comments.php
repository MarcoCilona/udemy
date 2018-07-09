<?php 

	delete_comment(); 
	change_status();
?>
<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>Author</th>
				<th>Content</th>
				<th>Date</th>
				<th>E-mail</th>
				<th>Status</th>
				<th>Related Post Title</th>
				<th>Approve</th>
				<th>Unapprove</th>
				
			</tr>
		</thead>
		<tbody>
			<?php show_comments(); ?>
		</tbody>
	</table>
</div>

<!-- Table responsive end -->		
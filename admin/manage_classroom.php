<?php
include '../db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM classroom_list where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<form action="" id="manage-classroom">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
		<div id="msg" class="form-group"></div>
		<div class="form-group">
			<label for="class_id" class="control-label">Class-ID</label>
			<input type="text" class="form-control form-control-sm" name="class_id" id="class_id" value="<?php echo isset($class_id) ? $class_id : '' ?>" required>
		</div>
		<div class="form-group">
			<label for="class_name" class="control-label">Class-Name</label>
			<input type="text" class="form-control form-control-sm" name="class_name" id="class_name" value="<?php echo isset($class_name) ? $class_name : '' ?>" required>
		</div>
		<div class="form-group">
			<label for="grade_level" class="control-label">Grade-Level</label>
			<input type="text" class="form-control form-control-sm" name="grade_level" id="grade_level" value="<?php echo isset($grade_level) ? $grade_level : '' ?>" required>
		</div>
		<div class="form-group">
			<label for="students" class="control-label">Students</label>
			<input type="text" class="form-control form-control-sm" name="students" id="students" value="<?php echo isset($students) ? $students : '' ?>" required>
		</div>
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#manage-classroom').submit(function(e){
			e.preventDefault();
			start_load()
			$('#msg').html('')
			$.ajax({
				url:'ajax.php?action=save_classroom',
				method:'POST',
				data:$(this).serialize(),
				success:function(resp){
					if(resp == 1){
						alert_toast("Data successfully saved.","success");
						setTimeout(function(){
							location.reload()	
						},1750)
					}else if(resp == 2){
						$('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Classroom Data already exist.</div>')
						end_load()
					}
				}
			})
		})
	})

</script>
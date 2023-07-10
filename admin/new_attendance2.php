<?php
date_default_timezone_set('Asia/Manila');

// include '../db_connect.php';
// if(isset($_POST['id'])){
// 	$qry = $conn->query("SELECT * FROM attendance_list where id={$_POST['id']}")->fetch_array();
// 	foreach($qry as $key => $value){
// 		$$key = $value;
// 	}
// }
?>

<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
			<form action="ajax.php?action=save_attendance" id="attendance_list">
				<div class="row">
					<div class="col-md-6 border-right">
					   <div class="form-group">
			               <label for="date" class="control-label">Date and Time:</label>
			               <input type="text" class="form-control form-control-sm" name="date" id="date" value="<?php echo date('Y-m-d h:i:s'); ?>" readonly>
	             	  </div>
					   <div class="form-group">
							<label for="firstname" class="control-label">First Name:</label>
							<input type="text" name="firstname" class="form-control form-control-sm" required value="<?php echo isset($firstname) ? $firstname : '' ?>">
						</div>
						<div class="form-group">
							<label for="lastname" class="control-label">Last Name:</label>
							<input type="text" name="lastname" class="form-control form-control-sm" required value="<?php echo isset($lastname) ? $lastname : '' ?>">
						</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
                        <label for="subject" class="control-label">Subject:</label>
                        <select name="subject" class="form-control form-control-sm" required>
                         <option value="<?php echo isset($subject) ? $subject : ''; ?>"><?php echo isset($subject) ? $subject : ''; ?></option>
                         <?php
                           $queryx = "SELECT subject FROM subject_list";
                           $resultx = mysqli_query($conn, $queryx);
                         if (mysqli_num_rows($resultx) > 0) {
                         while ($row = mysqli_fetch_assoc($resultx)) {
                          $selectedx = (isset($subjectx) && $subjectx === $row['subject']) ? 'selected' : '';
                         ?>
                          <option value="<?php echo $row['subject']; ?>" <?php echo $selectedx; ?>><?php echo $row['subject']; ?></option>
                          <?php
                           }}           
                         ?>
                        </select>
                    </div>
					<div class="form-group">
                         <?php $qry = $conn->query("SELECT *, CONCAT(class_id,'_',class_name,'_',grade_level) AS classData FROM classroom_list ORDER BY CONCAT(class_id,'_',class_name,'_',grade_level) ASC"); ?>
                            <label for="classroom" class="control-label">Classroom (Teaching-In):</label>
                         <select name="classroom" class="form-control form-control-sm" required>
                         <option value=""> </option>
                         <?php while ($row = $qry->fetch_assoc()): ?>
                         <option value="<?php echo trim($row['classData']); ?>" <?php echo (isset($classroom) && $classroom === trim($row['classData'])) ? 'selected' : ''; ?>>
                         <?php echo trim($row['classData']); ?>
                         </option>
                         <?php endwhile; ?>
                         </select>
                    </div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button type="submit" class="btn btn-primary mr-2">Check In</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=faculty_list'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- action -->
<script>
	$(document).ready(function(){
		$('#new_attendance').submit(function(e){
			e.preventDefault();
			start_load();
			$('#msg').html('');
			$.ajax({
				url:'ajax.php?action=save_attendance',
				method:'POST',
				data:$(this).serialize(),
				success:function(resp){
					if(resp == 1){
						alert_toast("Data successfully saved.","success");
						setTimeout(function(){
							location.reload();	
						}, 1750);
					}
				}
			})
		})
	})
</script>
<!-- <script>
	$(document).ready(function(){
		$('#new_attendance').submit(function(e){
			e.preventDefault();
			start_load();
			$('#msg').html('');
			$.ajax({
				url:'ajax.php?action=save_attendance',
				method:'POST',
				data:$(this).serialize(),
				success:function(resp){
					if(resp == 1){
						alert_toast("Data successfully saved.","success");
						setTimeout(function(){
							location.reload();	
						}, 1750);
					}else if(resp == 2){
						$('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Subject Code already exist.</div>')
						end_load()
					}
				}
			})
		})
	})
</script> -->

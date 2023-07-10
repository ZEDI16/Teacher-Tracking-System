<?php
date_default_timezone_set('Asia/Manila');

include '../db_connect.php';
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM attendance_list where id={$_GET['id']}")->fetch_array();
	foreach($qry as $k => $v){
		$$k = $v;
	}
}
?>
<div class="container-fluid">
	<form action="" id="new-attendance">
		<input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">
		<div id="msg" class="form-group"></div>
		<div class="form-group">
             <label for="date" class="control-label">Date and Time:</label>
                <?php
                   if ($date === null || $date === '') {
                    $date = $dataValue;
                   } else {
					$date = date('Y-m-d h:i:s');
                   } ?>
        <input type="text" class="form-control form-control-sm" name="date" id="date" value="<?php echo $date; ?>" readonly>
        </div>
		<div class="form-group">
			<label for="firstname" class="control-label">First Name:</label>
			<input type="text" class="form-control form-control-sm" name="firstname" id="firstname" value="<?php echo isset($firstname) ? $firstname : ''; ?>" required>
		</div>
		<div class="form-group">
			<label for="lastname" class="control-label">Last Name:</label>
			<input type="text" class="form-control form-control-sm" name="lastname" id="lastname" value="<?php echo isset($lastname) ? $lastname : ''; ?>" required>
		</div>
		<div class="form-group">
        <?php $qry = $conn->query("SELECT *, CONCAT(class_id,'_',class_name,'_',grade_level) AS classData FROM classroom_list ORDER BY CONCAT(class_id,'_',class_name,'_',grade_level) ASC"); ?>
            <label for="classroom" class="control-label">Classroom (Teach-In):</label>
        <select name="classroom" class="form-control form-control-sm" required>
            <option value=""> </option>
             <?php while ($row = $qry->fetch_assoc()): ?>
            <option value="<?php echo trim($row['classData']); ?>" <?php echo (isset($classroom) && $classroom === trim($row['classData'])) ? 'selected' : ''; ?>>
             <?php echo trim($row['classData']); ?>
            </option>
        <?php endwhile; ?>
        </select>
        </div>
		<div class="form-group">
             <label for="subject" class="control-label">Subject</label>
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



		<!-- <button type="submit" class="btn btn-primary">Save</button> -->
	</form>
</div>
<script>
	$(document).ready(function(){
		$('#new-attendance').submit(function(e){
			e.preventDefault();
			start_load();
			$('#msg').html('');
			$.ajax({
				url:'ajax.php?action=savex_attendance',
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

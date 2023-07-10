<?php include '../db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM faculty_list where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
}
?>
<div class="container-fluid">
	<div class="card card-widget widget-user shadow">
      <div class="widget-user-header bg-dark">
        <h3 class="widget-user-username"><?php echo ucwords($name) ?></h3>
        <h5 class="widget-user-desc"><?php echo $email ?></h5>
      </div>
      <div class="widget-user-image">
      	<?php if(empty($avatar) || (!empty($avatar) && !is_file('../assets/uploads/'.$avatar))): ?>
      	<span class="brand-image img-circle elevation-2 d-flex justify-content-center align-items-center bg-primary text-white font-weight-500" style="width: 90px;height:90px"><h4><?php echo strtoupper(substr($firstname, 0,1).substr($lastname, 0,1)) ?></h4></span>
      	<?php else: ?>
        <img class="img-circle elevation-2" src="assets/uploads/<?php echo $avatar ?>" alt="User Avatar"  style="width: 90px;height:90px;object-fit: cover">
      	<?php endif ?>
      </div>
      <div class="card-footer">
        <div class="container-fluid">
        	<dl>
			    <hr>
        		<dt>School ID</dt>
        		<dd><?php echo $school_id ?></dd>
			
				<dt>Subject</dt>
        		<dd><?php echo $subject ?></dd>
				<hr>
				<dt>Attendance Records</dt>
                 <?php
                  $firstname = isset($firstname) ? $firstname : ''; // Assuming $firstname is already defined
                  $query = "SELECT COUNT(*) AS count FROM attendance_list WHERE firstname = '$firstname'";
                  $result = $conn->query($query);
                    if ($result && $row = $result->fetch_assoc()) {
                     $count = $row['count'];
                     } else {
                     $count = 0;
                     }
                   ?>
                <dd><?php echo $count; ?></dd>

        	</dl>
        </div>
    </div>
	</div>
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
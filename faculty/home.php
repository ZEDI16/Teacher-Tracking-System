<?php include('db_connect.php');?>
<?php 
function ordinal_suffix1($num){
    $num = $num % 100; // protect against large numbers
    if($num < 11 || $num > 13){
         switch($num % 10){
            case 1: return $num.'st';
            case 2: return $num.'nd';
            case 3: return $num.'rd';
        }
    }
    return $num.'th';
}
// $astat = array("Not Yet Started","On-going","Closed");
 ?>
<?php
$fullname = $_SESSION['login_name'];
$lastSpacePos = strrpos($fullname, ' ');
$firstname = substr($fullname, 0, $lastSpacePos);
$lastname = substr($fullname, $lastSpacePos + 1);

$qry = $conn->query("SELECT id FROM faculty_list WHERE firstname = '$firstname' AND lastname = '$lastname'");
if ($qry->num_rows > 0) {
    while ($row = $qry->fetch_assoc()) {
        $id = $row['id'];

        $innerQry = $conn->query("SELECT *, CONCAT(firstname, ' ', lastname) AS name FROM faculty_list WHERE id = '$id'")->fetch_array();
        foreach ($innerQry as $k => $v) {
            $$k = $v;
        }
    }
}
?>




<div class="col-12">
    <div class="card">
      <div class="card-body">
      <h1><b>NNCHS - Teacher Panel</b> </h1>
        Welcome Teacher <?php echo $_SESSION['login_name'] ?>!
    </div>
</div>

<!-- <div class="container-fluid" style="padding-left: 20%; padding-right: 20%;"> -->
<div class="container-fluid">
	<!-- <div class="card card-widget widget-user shadow"  style="">
      <div class="widget-user-header bg-dark">
        <h3 class="widget-user-username"><?php echo ucwords($name) ?></h3>
        <h5 class="widget-user-desc"><?php echo $email ?></h5>
      </div> -->
      <div class="card-footer">
        <div class="container-fluid">
        	<dl>
			    <!-- <hr> -->
                <dt>Email</dt>
        		<dd><?php echo $email ?></dd>

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
<!-- <div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div> -->
<!-- <style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style> -->

<?php include('db_connect.php');
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
<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
	
            <div class="card-tools">
            <!-- <a class="btn btn-block btn-sm btn-default btn-flat border-primary new_attendance" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><i class="fa fa-plus"></i> Check In</a> -->

            </div>
            <!-- <div class="card-tools">
            <a class="btn btn-block btn-sm btn-default btn-flat border-primary new_attendancelog" href="javascript:void(0)"><i class="fa fa-plus"></i> Add Attendance</a>
            </div> -->
        </div>
        <div class="card-body">
            <table class="table tabe-hover table-bordered" id="list">
            <colgroup>
               <col width="5%">
               <col width="15%"> <!-- Adjusted width -->
               <col width="20%"> <!-- Adjusted width -->
               <col width="15%"> <!-- Adjusted width -->
               <col width="20%"> <!-- Adjusted width -->
               <col width="10%">
            </colgroup>
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Date And Time</th>
                        <th>Teacher</th>
                        <th>Classroom</th>
                        <th>Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
$i = 1;
$fullname = $_SESSION['login_name']; 

$lastSpacePos = strrpos($fullname, ' '); 
$firstname = substr($fullname, 0, $lastSpacePos); 
$lastname = substr($fullname, $lastSpacePos + 1); 

$qry = $conn->query("SELECT id FROM attendance_list WHERE firstname LIKE '%$firstname%' OR lastname LIKE '%$lastname%'");
if ($qry->num_rows > 0) {
    while ($row = $qry->fetch_assoc()) {
        $id = $row['id'];

     
        $qry_attendance = $conn->query("SELECT *, CONCAT(firstname, ' ', lastname) AS name FROM attendance_list WHERE id = '$id' ORDER BY id DESC");

        
        while ($row_attendance = $qry_attendance->fetch_assoc()):
            
            ?>
            <tr>
                <th class="text-center"><?php echo $i++ ?></th>
                <td><b><?php echo $row_attendance['date'] ?></b></td>
                <td><b><?php echo $row_attendance['name'] ?></b></td>
                <td><b><?php echo $row_attendance['classroom'] ?></b></td>
                <td><b><?php echo $row_attendance['subject'] ?></b></td>
                <td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
							<a class="dropdown-item new_attendance" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Attendance</a>
						</td>
            </tr>
            
            <?php
        endwhile;
    }
}
?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.new_attendance').click(function(){
        uni_modal("New attendance","<?php echo $_SESSION['login_view_folder'] ?>new_attendance.php?id="+$(this).attr('data-id'))
        })
        $('.manage_attendance').click(function(){
            uni_modal("Manage attendance","<?php echo $_SESSION['login_view_folder'] ?>manage_attendance.php?id="+$(this).attr('data-id'))
        })
        $('.delete_attendance').click(function(){
	_conf("Are you sure to delete this attendance?","delete_attendance",[$(this).attr('data-id')])
	})
		$('#list').dataTable()
	})
	function delete_attendance($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_attendance',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>



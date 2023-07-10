<?php include 'db_connect.php'; ?>
<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
	
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
               <!-- <col width="10%"> -->
               <col width="10%">
            </colgroup>
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Date And Time</th>
                        <th>Teacher</th>
                        <th>Classroom</th>
                        <th>Subject</th>
                        <!-- <th>Status</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
$i = 1;
$qry = $conn->query("SELECT * FROM attendance_list ORDER BY date DESC");
$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM attendance_list ORDER BY id DESC");
while ($row = $qry->fetch_assoc()):
?>
<tr>
    <th class="text-center"><?php echo $i++ ?></th>
    <td><b><?php echo $row['date'] ?></b></td>
    <td><b><?php echo $row['name'] ?></b></td>
    <td><b><?php echo $row['classroom'] ?></b></td>
    <td><b><?php echo $row['subject'] ?></b></td>
    <!-- <td class="text-center">
	<?php if($row['status'] == 0): ?>
		<span class="badge badge-1">Off Time</span>
	<?php elseif($row['status'] == 1): ?>
		<span class="badge badge-2">In Time</span>
	<?php elseif($row['status'] == 2): ?>
		<span class="badge badge-3">Early Time</span>
    <?php elseif($row['status'] == 3): ?>
		<span class="badge badge-4">Late Time</span>
	<?php endif; ?>
	</td> -->
    <td class="text-center">
        <div class="btn-group">
            <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat manage_attendance">
                <i class="fas fa-edit"></i>
            </a>
            <button type="button" class="btn btn-danger btn-flat delete_attendance" data-id="<?php echo $row['id'] ?>">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    </td>
</tr>
<?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.new_attendancelog').click(function(){
            uni_modal("New attendance","<?php echo $_SESSION['login_view_folder'] ?>manage_attendance.php")
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



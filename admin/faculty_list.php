<?php include 'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-success">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary" href="./index.php?page=new_faculty"><i class="fa fa-plus"></i> Add New Faculty</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
			<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="20%">
					<!-- <col width="20%"> -->
					<col width="25%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>School ID</th>
						<th>Subject</th>
						<!-- <th>Classroom</th> -->
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT *,concat(firstname,' ',lastname) as name FROM faculty_list order by concat(firstname,' ',lastname) asc");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo $row['school_id'] ?></b></td>
						<td><b><?php echo $row['subject'] ?></b></td>
		

						<td><b><?php echo ucwords($row['name']) ?></b></td>
						<td class="text-center">
							<button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
							<a class="dropdown-item new_attendance" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Attendance</a>
							  <!-- <a class="dropdown-item" href="./index.php?page=attendance&id=<?php echo $row['id'] ?>">Attendance</a> -->
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item view_faculty" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Evaluate</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_faculty&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_faculty" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
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
	// $('.new_attendance').click(function(){
    //         uni_modal("New attendance","<?php echo $_SESSION['login_view_folder'] ?>new_attendance.php?id="+$(this).attr('data-id'))
    //     })
	// $('.manage_attendance').click(function(){
    //         uni_modal("Manage attendance","<?php echo $_SESSION['login_view_folder'] ?>manage_attendance.php?id="+$(this).attr('data-id'))
    //     })
	$(document).ready(function(){
	$('.new_attendance').click(function(){
        uni_modal("New attendance","<?php echo $_SESSION['login_view_folder'] ?>new_attendance.php?id="+$(this).attr('data-id'))
    })
	$('.view_faculty').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> Teacher Evaluation","<?php echo $_SESSION['login_view_folder'] ?>view_faculty.php?id="+$(this).attr('data-id'))
	})
	$('.delete_faculty').click(function(){
	_conf("Are you sure to delete this faculty?","delete_faculty",[$(this).attr('data-id')])
	})
		$('#list').dataTable()
	})
	function delete_faculty($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_faculty',
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
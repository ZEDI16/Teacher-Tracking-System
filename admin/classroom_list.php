<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_classroom" href="javascript:void(0)"><i class="fa fa-plus"></i> Add Classroom</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="20%">
					<col width="20%">
					<col width="10%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Class-ID</th>
						<th>Class-Name</th>
						<th>Grade-Level</th>
						<th>Students</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM classroom_list ORDER BY class_id DESC");
					while ($row = $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo $row['class_id'] ?></b></td>
						<td><b><?php echo $row['class_name'] ?></b></td>
						<td><b><?php echo $row['grade_level'] ?></b></td>
						<td><b><?php echo $row['students'] ?></b></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat manage_classroom">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_classroom" data-id="<?php echo $row['id'] ?>">
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
		$('.new_classroom').click(function(){
			uni_modal("New classroom","<?php echo $_SESSION['login_view_folder'] ?>manage_classroom.php")
		})
		$('.manage_classroom').click(function(){
			uni_modal("manage classroom","<?php echo $_SESSION['login_view_folder'] ?>manage_classroom.php?id="+$(this).attr('data-id'))
		})
	$('.delete_classroom').click(function(){
	_conf("Are you sure to delete this classroom?","delete_classroom",[$(this).attr('data-id')])
	})
		$('#list').dataTable()
	})
	function delete_classroom($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_classroom',
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
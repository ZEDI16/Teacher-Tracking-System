  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="dropdown">
   	<!-- <a href="./" class="brand-link">
        <h3 class="text-center p-0 m-0"><b class="loginzxzx">Admin Panel</b></h3>
  
    </a> -->
    <center> <a href="https://nnchs.com/" target="_blank" rel="noopener"><img class="NNCHSLOGS" src="https://nnchs.com/wp-content/uploads/2021/12/cropped-nabunturannchs.png" style="margin-top: 40px; padding-bottom: 10px; width: 150px; opacity: 0.3;  filter: grayscale(100%); user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-drag: none; -webkit-user-select: none; -ms-user-select: none;" alt="logo" ></a></center>
      
    </div>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item dropdown">
            <a href="./" class="nav-link nav-home">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a href="./index.php?page=classroom_list" class="nav-link nav-classroom_list">
            <i class="nav-icon fas fa-list-alt"></i>
              <p>
               Classroom
              </p>
            </a>
          </li> 
          <li class="nav-item dropdown">
            <a href="./index.php?page=subject_list" class="nav-link nav-subject_list">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Subjects
              </p>
            </a>
          </li> 
          <li class="nav-item dropdown">
            <a href="./index.php?page=attendance_view" class="nav-link nav-attendance_view">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Attendance
              </p>
            </a>
          </li> 
          <!-- <li class="nav-item dropdown">
            <a href="./index.php?page=report" class="nav-link nav-report">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Evaluation
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_faculty">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Faculties
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="./index.php?page=attendance_list" class="nav-link nav-new_faculty tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Attendance</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="./index.php?page=new_faculty" class="nav-link nav-new_faculty tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php?page=faculty_list" class="nav-link nav-faculty_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item dropdown">
            <a href="./index.php?page=questionnaire" class="nav-link nav-questionnaire">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Logs
              </p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="#" class="nav-link nav-edit_user">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="./index.php?page=new_user" class="nav-link nav-new_user tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="./index.php?page=user_list" class="nav-link nav-user_list tree-item">
                  <i class="fas fa-angle-right nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
        <!-- <center> <a href="https://nnchs.com/" target="_blank" rel="noopener"><img class="NNCHSLOGS" src="https://nnchs.com/wp-content/uploads/2021/12/cropped-nabunturannchs.png" style="margin-top: 100px; width: 150px; opacity: 0.2;  filter: grayscale(100%); user-drag: none; user-select: none; -moz-user-select: none; -webkit-user-drag: none; -webkit-user-select: none; -ms-user-select: none;" alt="logo" ></a></center> -->
       
      </nav>
    </div>
  </aside>
  <script>
  	$(document).ready(function(){
      var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
  		var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
      if(s!='')
        page = page+'_'+s;
  		if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
  			if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
  				$('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
  			}
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

  		}
     
  	})
  </script>
<?php include('db_connect.php'); ?>
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
 ?>
<div class="col-12">
    <div class="card">
      <div class="card-body">
       
        <!-- <br> -->
        <!-- <div class="col-md-5"> -->
        <!-- <h1><b style="font-size: 60px;">NNCHS</b><b style="font-size: 60px;"> - CAPSTONE</b></h1> -->
        <h1><b>NNCHS</b> </h1>
          <!-- <div class="callout callout-info">
            <h6><b>Mohammad Del Nazz A. Ho</b></h6>
            <h6><b>Princess Ellein S. Ugay</b></h6>
            <h6><b>Diether M. Ramirez</b></h6>
            <h6><b>Yezzan Poliquit</b></h6>
            <h6><b>Trexie L. Gaudicos</b></h6>
            <h6><b>Vincent Jerald P. Cirunay</b></h6>
          </div> -->
        <!-- </div> -->
      </div>
    </div>
</div>

        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM faculty_list ")->num_rows; ?></h3>

                <p>Total Teachers</p>
              </div>
              <div class="icon">
                <i class="fa fa-user-friends"></i>
              </div>
            </div>
          </div>
           <!-- <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3></h3>

                <p>Total Students</p>
              </div>
              <div class="icon">
                <i class="fa ion-ios-people-outline"></i>
              </div>
            </div>
          </div> -->
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM users")->num_rows; ?></h3>

                <p>Total Users</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM classroom_list")->num_rows; ?></h3>

                <p>Total Classroom</p>
              </div>
              <div class="icon">
                <i class="fa fa-list-alt"></i>
              </div>
            </div>
          </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM subject_list")->num_rows; ?></h3>

                <p>Total Subjects</p>
              </div>
              <div class="icon">
                <i class="fas fa-th-list"></i>
              </div>
            </div>
          </div>
      </div>

      <!-- <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="col-md-5">
          <div class="callout callout-info">
        
             <h6><b></b></h6>
          </div>
        </div>
      </div>
    </div>
</div> -->

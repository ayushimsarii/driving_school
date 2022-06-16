<?php 
include_once 'connect.php';
$output3 ="";
$std="";
     $q4= "SELECT * FROM users where role='student'";
      $st4 = $connect->prepare($q4);
       $st4->execute();

 if($st4->rowCount() > 0)
     {
         $re4 = $st4->fetchAll();
       foreach($re4 as $row4)
         {
          $std.= '<option value="'.$row4['name'].'">'.$row4['name'].'</option>';
         }
     
     }
    
     
         

    
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Side Navbar</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- JavaScript Bundle with Popper -->
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> <script src="js/jquery_new.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="sidestyle.css">

  <script>
$(document).ready(function(){
  $('#course').on('change', function(){
  
    var countryID = $(this).val();
    
    console.log(countryID);
    if(countryID){
    
            $.ajax({
                type:'POST',
                url:'selec_std.php',
                data:'course='+countryID,
                success:function(html){
               
                  $('#state').html(html);
                    
                }
            }); 
        }
  });
});
</script>
</head>

<body id="bodynav">
<!--Message Modal-->
<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
        <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <center>
          <form>
            <label>Comment</label><br>
            <textarea></textarea><br>
            <label>Write Message</label><br>
            <textarea></textarea>
          </form>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send Message</button>
      </div>
    </div>
  </div>
</div>
<!--Main Navigation-->
          <header>
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="collapse d-sm-block sidebar collapse bg-white">
              <div class="position-sticky">
                <div class="list-group list-group-flush mx-2 mt-2">
                  <div class="list-group-item list-group-item-action py-1">
                    <i class="fas fa-circle-notch"></i>
                    <i type="button" data-toggle="modal" data-target="#message" class="fas fa-comment" style="margin-left: 90px;"></i>
                  </div>
                  <form class="form-control">
                     <div class="list-group-item list-group-item-action py-1">
                    <label class="form-label" for="student">Course Name</label>
                    <select type="text" id="course" class="form-control form-control-md">
                   <?php 
                   $query1 = "SELECT * FROM ctppage ORDER BY CTPid ASC";
                   $statement1 = $connect->prepare($query1);
                   $statement1->execute();
                  
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                      
                            foreach($result1 as $row1)
                        {?>
                            <option value="<?php echo $row1['course'] ?>"><?php echo $row1['course']?></option>
                        <?php }
         
                         } ?>
                    </select>
                  </div>
                  <div class="list-group-item list-group-item-action">
                    <label class="form-label" for="student">Student Name</label>
                    <select id="state" class="form-control form-control-md">
                    <option value="">Select course first</option>
                    </select>
                  </div>
                 
                </form>
                  <a href="maindashboard.php" class="list-group-item list-group-item-action py-1 ripple" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                  </a>
                  <a href="Home.php" class="list-group-item list-group-item-action py-1 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Start 0</span>
                  </a>
                  <!-- <a href="ctp.php" class="list-group-item list-group-item-action py-1 ripple"><i
                      class="fas fa-lock fa-fw me-3"></i><span>CTP Page</span></a> -->
                  <a href="usersinfo.php" class="list-group-item list-group-item-action py-1 ripple"><i
                      class="fas fa-chart-line fa-fw me-3"></i><span>Data Page</span></a>
                  <!-- <a href="Next-home.php" class="list-group-item list-group-item-action py-1 ripple">
                    <i class="fas fa-chart-pie fa-fw me-3"></i><span>Phase</span>
                  </a> -->
                </div>
              </div>
            </nav>
          </header>
         
</body>
</html>
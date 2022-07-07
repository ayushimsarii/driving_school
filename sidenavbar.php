<?php
include('connect.php');

     $output2="";
     $query2 = "SELECT * FROM ctppage  ORDER BY CTPid DESC";
     $statement2 = $connect->prepare($query2);
     $statement2->execute();
    
     if($statement2->rowCount() > 0)
         {
             $result2 = $statement2->fetchAll();
             
             foreach($result2 as $row2)
             {
              $output2 .= '<option value="'.$row2['CTPid'].'">'.$row2['course'].'</option>';
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
  //set value for first dropdown on page change
      var course = sessionStorage.getItem('id');
      $('#course').val(course);
      //set value of javascript to php variable
      
        //on change of course dropdown send value to selec_std.php and fetch value
        $('#course').on('change', function(){
          
          var countryID = $(this).val();
          
          if(countryID){
          
            $.ajax({
                      type:'POST',
                      url:'selec_std.php',
                      data:'course='+countryID,
                      success:function(html){
                        
                      sessionStorage.setItem('id',countryID);
                      document.cookie = "phpgetcourse = " + countryID;
                      document.cookie = "allstudent = " + html;
                      $('#state').html(html);
                        }
                  }); 
              }
            
        });

          //onchange of second dropdown select dynamic value from selec.php
            $('#state').on('change', function(){
          
              var studentname = $(this).val();
            //  console.log(studentname);   
                if(studentname){
                
                  sessionStorage.setItem('student',studentname);
                  document.cookie = "student = " + studentname;
                  }
            });
            //set value of selected student in javascript session
            var getstudent = sessionStorage.getItem('student');
            $('#state').val(getstudent);


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
                    <select type="text" id="course" class="form-control form-control-md" name="course">
                   <?php 
                   $query1 = "SELECT * FROM ctppage ORDER BY CTPid ASC";
                   $statement1 = $connect->prepare($query1);
                   $statement1->execute();
                  
                   if($statement1->rowCount() > 0)
                       {
                           $result1 = $statement1->fetchAll();
                      
                            foreach($result1 as $row1)
                        {?>
                            <option value="<?php echo $row1['CTPid'] ?>"><?php echo $row1['course']?></option>
                        <?php }
         
                         } ?>
                    </select>
                  </div>
                  <div class="list-group-item list-group-item-action">
                    <label class="form-label" for="student">Student Name</label>
                    <select id="state" class="form-control form-control-md" name="student">
                  <?php  echo $allstudent= $_COOKIE['allstudent']; ?>
                    </select>

                  </div>
                      <?php
                      $fetchname="";
                      $phpcourse="";
                      $student="";
                      $fetchid="";
                      $fetchphone="";
                      $fetchrole="";
                         //set selected value from both dropdown in php 
                        if(isset($_COOKIE['phpgetcourse']) && isset($_COOKIE['student'])){
                        $phpcourse= $_COOKIE['phpgetcourse'];
                        $student= $_COOKIE['student'];
                        $fetchname="";
                        $name= "SELECT * FROM users where id='$student'";
                                $stname2 = $connect->prepare($name);
                                $stname2->execute();
                              
                                if($stname2->rowCount() > 0)
                                    {
                                        $rename2 = $stname2->fetchAll();
                                        foreach($rename2 as $rowname2)
                                        {
                                        $fetchname =$rowname2['name'];
                                        $fetchid=$rowname2['studid'];                                 }
                                        $fetchrole=$rowname2['role'];
                                        $fetchphone=$rowname2['phone'];
                                        $fetchuser_id=$rowname2['id'];}
                                    }
                                    $cr_name= "SELECT * FROM ctppage where CTPid='$phpcourse'";
                                    $cr_st = $connect->prepare($cr_name);
                                    $cr_st->execute();
                        
                                    if($cr_st->rowCount() > 0)
                                        {
                                            $cr_result = $cr_st->fetchAll();
                                            foreach($cr_result as $row)
                                            {
                                           $std_course=$row['course'];
                                            }
                            
                            }
                      ?>
               
                  <button class="btn btn-danger btn-sm" type="submit" name="submit_Phase"><i class="fas fa-search"></i></button>
                </form>
                <div class="container" id="colorsidenavbar">
                  <a href="maindashboard.php" class="list-group-item list-group-item-action py-1 ripple" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                  </a>
                  <a href="Home.php" class="list-group-item list-group-item-action py-1 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Start 0</span>
                  </a>
                  <a href="usersinfo.php" class="list-group-item list-group-item-action py-1 ripple"><i
                      class="fas fa-chart-line fa-fw me-3"></i><span>Data Page</span></a>
                  <form action="Next-home.php" method="post">
                            <!-- <label class="list-group-item list-group-item-action py-1 ripple" for="student" name="ctp">Phase</label> -->
                            <select type="text" id="course" class="list-group-item list-group-item-action py-1 ripple" name="ctp" required>
                                <option selected disabled value="">Phase</option>
                                <?php echo $output2 ?>
                            </select>
                            <center>
                        <button class="btn btn-success" type="submit" name="submit_Phase"><i class="fas fa-share"></i></button>
                          </center>
                          </form>
                          </div>
            </nav>
                          </div>
                          </div>
          </header>
         
</body>
</html>
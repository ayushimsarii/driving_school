<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CTP Page</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<!-- JavaScript Bundle with Popper -->
	<script src="js/jquery.mim.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" type="text/css" href="sidestyle.css">
</head>
<body>
<?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo "<script>alert('$error');</script>";
                }?>
  
	<?php
	include_once 'header.php';
	?>
	<?php
	if($role =='super admin'){
	include_once 'sidenavbar.php';
	}
	?>
 
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-12 col-xl-9 h-100">
        <div class="card h-100" style="border-radius: 15px;">
          <div class="card-body">
      
            <h3 class="mb-4">Course Training Plan(CTP)</h3><br>
            <form action="ctpdata.php" method="post">

              <div class="row">
              <?php 
                if(isset($_REQUEST['error']))
                {
                $error=$_REQUEST['error'];
                echo $error;
                }?>

                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursename">Course</label>
                    <input type="text" id="course" name="course" class="form-control form-control-md" />
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursename">Class Size</label>
                    <input type="text" id="classsize" name="ClassSize" class="form-control form-control-md" />
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursename">Course Code</label>
                    <input type="text" id="coursecode" name="CourseCode" class="form-control form-control-md" />
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursenumber">Sponcors</label>
                    <input type="text" id="sponcors" name="Sponcors" class="form-control form-control-md" />
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursename">Location</label>
                    <input type="text" id="location" name="Location" class="form-control form-control-md" />
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="coursenumber">Course Aim</label>
                    <input type="text" id="courseaim" name="CourseAim" class="form-control form-control-md" />
                  </div>

                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12">

                  <div class="form-outline">
                    <label style="text-align:left;" class="form-label" for="coursenumber">Add Manual</label>
                    <input type="text" id="addmanual" name="manual" class="form-control form-control-md" />
                    <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#add_manual"><i class="fas fa-plus-square"></i></button>
                  </div>
                </div>

              </div>


              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Submit" name="submit" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Add more manual modal-->
<div class="modal fade" id="add_manual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document"> 
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add More Manual</h5>
                <button class="btn btn-warning" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
              </div>
              <div class="modal-body">
                <form class="insert-manual" id="manual" method="post" action=".php">
                  <div class="input-field">
                    <table class="table table-bordered" id="table-field-manual">
                        <tr>
                          <input type="hidden" name="manual" class="form-control">
                          <td style="text-align: center;"><input type="text" name="manual[]" class="form-control" placeholder="Enter Manual"></td>
                          <td><button type="button" name="add_manual" value="Add" id="add_manual" class="btn btn-warning"><i class="fas fa-plus"></i></button></td>
                          <!-- <td><input type="button" name="add_manual" value="Add" id="add_manual" class="btn btn-warning"><i class="fas fa-plus"></i></td> -->
                        </tr>
                      </table>
                    </div>
                    <center>
                      <button class="btn btn-success" type="submit" name="submit_manual">Save</button>
                    </center>
                </form> 
              </div>
            </div>
          </div>
        </div>
<?php
include_once 'footer.php';
?>

<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>  
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <!--add more manual-->
 <script type="text/javascript">
    $(document).ready(function()
    {
        var html = '<tr>\
                <input type="hidden" name="manual" class="form-control">\
                          <td style="text-align: center;"><input type="text" name="manual[]" class="form-control" placeholder="Enter Manual"></td>\
                          <td><button type="button" name="remove_manual" id="remove_manual" class="btn btn-danger"><i class="fas fa-times"></i></button></td>\
              </tr>'
          var max = 3;
        var b = 1;

        $("#add_manual").click(function()
        {
          if(b <= max)
          {
            $("#table-field-manual").append(html);
            b++;
          }
        });
        $("#table-field-manual").on('click','#remove_manual',function()
        {
          $(this).closest('tr').remove();
          b--;
        });
    });
 </script>
</body>
</html>
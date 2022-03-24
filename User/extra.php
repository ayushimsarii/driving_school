<!--Fetching data-->


 <?php
                    include_once 'database.php';
                    $result = mysqli_query($conn,"SELECT * FROM bank");
                    ?>
                    <!DOCTYPE html>
                    <html>
                     <head>
                       <title> Retrive data</title>
                       
                     </head>
                    <body>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                    
                        <table id="Table1" border="0" cellspacing="2" cellpadding="2"> 
                          <tr> 
                              <th> <font face="Arial"></font> Check </th>
                              <th> <font face="Arial"></font> ID </th>
                              <th> <font face="Arial"></font> Item </th>  
                              <th colspan="2"> <font face="Arial"></font> Operations </th> 
                              
                          </tr>
                          <?php
                          $i=0;
                          while($row = mysqli_fetch_array($result)) {
                          ?>
                        <tr>
                          <td><input type="checkbox" name="checkbox" value=""></td>
                          <td><?php echo $row["id"]; ?></td>
                          <td><?php echo $row["item"]; ?></td>
                          <td><a class="btn btn-primary" href="update.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-edit"></i></a></button></td>
                          <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row["id"]; ?>"><i class="fas fa-trash"></i></a></td>
                          </tr>
                          <?php
                          $i++;
                          }
                          ?>
                    </table>
                     <?php
                    }
                    else
                    {
                        echo "No result found";
                    }
                    ?>
<?php

$con = mysqli_connect("localhost","root","","test");
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM user";
$result = $con->query($sql);
if(!$sql){
  die(mysqli_error($con));
}


print '<table border="0" cellspacing="2" cellpadding="2"> 
      <tr> 
          <th> <font face="Arial"></font> ID </th>
          <th> <font face="Arial"></font> Item </th> 
          <th> <font face="Arial"></font> Radio </td> 
          <th> <font face="Arial"></font> Mainsub </th> 
          <th> <font face="Arial"></font> radiomain </th> 
          <th colspan="2"> <font face="Arial"></font> Operations </th> 
          
      </tr>';

if ($result->num_rows > 0) {
 
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $item = $row["item"];
        $radio = $row["radio"]; 
        $mainsub = $row["mainsub"];
        $radiomain = $row["radiomain"]; 
        // $Subitem = $row["Subitem"];
        // $radiosub = $row["radiosub"]; 

        print '<tr> 
                  <td>'.$id.'</td>
                  <td>'.$item.'</td> 
                  <td>'.$radio.'</td>
                  <td>'.$mainsub.'</td>
                  <td>'.$radiomain.'</td> 
                  <td><a href ="update.php?i=$item[item]&r=$radio[radio]&m=$mainsub[mainsub]&rm=$radiomain[radiomain]" type="submit" class="btn btn-success">Edit/Update</a></td>
                  <td><a href ="delete.php" type="submit" class="btn btn-success">Delete</a></td>
              </tr>';

    }

    $result->free();
} 
?>

<style type="text/css">
  td,
  th
  {
    border: 1px solid #ddd;
    padding: 8px;
    margin: 5px;
    
    text-align: center;
  }
  table
  {
    margin: auto;
    margin-top: 5px;
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }
  tr:nth-child(even)
  {
    background-color: #f2f2f2;
  }
  tr:hover 
  {
    background-color: #ddd;
  }
  th 
  {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #04AA6D;
    color: white;
  }
</style>
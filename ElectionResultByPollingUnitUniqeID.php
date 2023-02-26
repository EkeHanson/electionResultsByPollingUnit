<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <title>Abarahm</title>
</head>
<body>
    <h3>Path: http://localhost/bincom_test/resolved/ElectionResultByPollingUnitUniqeID.php</h3>
<?php
   $result_id = range(8,27,1)?>
 <form action="" method="post" autocomplete="on">
   <label >Choose an entry:</label>
   <select  name="fruit">
       <option value="">--Please select the Result Id--</option>
       <?php for($i =0; $i <count($result_id); $i++){?>
       <option name="<?php $id ?>"><?php echo $result_id["$i"];}?></option>
   </select>
   <br><br>
     <input class="btn btn-primary" type="submit" name="submit" value="View">
 </form>
</div>
<?php 
if(isset($_POST['submit'])){
$id = $_POST['fruit'];
$connection = mysqli_connect('localhost', 'root','', 'bincome');    
if(!$connection) {
     die("Database connection failed");
        } 
 $connection = mysqli_connect('localhost', 'root','', 'bincome');    
 if(!$connection) {
      die("Database connection failed");
         }

$query = "SELECT * FROM announced_pu_results WHERE polling_unit_uniqueid =$id";
$result = mysqli_query($connection, $query);?>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <td> For Polling Unit of Uniqe Id:<?php echo $id;  echo "<br>";?></td>
<?php 
while($row = mysqli_fetch_assoc($result)){?>
    <td> <?php $party_abbreviation = $row['party_abbreviation']; print_r($party_abbreviation);?>:</td>
    <td> <?php   $party_score = $row['party_score']; print_r($party_score);?></td>
    <?php echo "<br>";}}?>

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
    <h3>Path:http://localhost/bincom_test/Resolved/ResultByNO_OfEntries.php?fruit=115&submit=View</h3>
<?php
    $result_id = range(111,260,1)?>
  <form action="" method="get" autocomplete="on">
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
if(isset($_GET['submit'])){
 $id = $_GET['fruit'];
 $connection = mysqli_connect('localhost', 'root','', 'bincome');    
 if(!$connection) {
      die("Database connection failed");
         }

$query = "SELECT * FROM announced_pu_results WHERE result_id=$id";
$result = mysqli_query($connection, $query);

if(!$result){
    die('QUERY FAILED' . mysqli_error());
}?>
<table class="table">
        <tr>
            <th>RESULT ID</th>
            <th>Plling Unit Unique ID</th>
            <th>Party Score</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
<?php 
while($row = mysqli_fetch_assoc($result)){
    $result_id = $row['result_id'];?>
    <table class="table table-stripe"> 
    <tr>
        <td> <?php print_r($id);?></td>
        <td> <?php $party_abbreviation = $row['party_abbreviation']; print_r($party_abbreviation);?></td>
        <td> <?php   $party_score = $row['party_score']; print_r($party_score);?></td>
        <td></td>
    </tr>
</table>
<?php }
}?>
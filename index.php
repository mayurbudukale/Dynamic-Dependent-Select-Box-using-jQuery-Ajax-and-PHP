<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dynamic Selection</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
  
</body>
</html>

<?php
//Include the database configuration file
include 'dbConfig.php';

//Fetch all the country data
$query = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<div class="container-fluid"><h1>Dynamic Selection Based on City </h1></div>

<div class="container">
<div class="form-control">
<div class="row">
  <div class="col-6">
  <input type="text" class="form-control" placeholder="Enter Name here">
  <br></div>
<div class="col-6">
  <input type="email" class="form-control" placeholder="Enter email here">
  <br>
</div>
  </div>
  <div class="row">
  <div class="col-6">
    <input type="tel" class="form-control" placeholder="Enter phone here">
  <br></div>

  <div class="col-6">
<select id="country" class="form-control">
    <option value="">Select Country</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
        }
    }else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select></div>
<br></div>
<div class="row">
  <div class="col-6">
<select id="state" class="form-control">
    <option value="">Select country first</option>
</select>
<br>
  </div>
   <div class="col-6">
<select id="city" class="form-control">
    <option value="">Select state first</option>
</select></div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>'); 
                }
            }); 
        }else{
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
    
    $('#state').on('change',function(){
        var stateID = $(this).val();
        if(stateID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'state_id='+stateID,
                success:function(html){
                    $('#city').html(html);
                }
            }); 
        }else{
            $('#city').html('<option value="">Select state first</option>'); 
        }
    });
});
</script>
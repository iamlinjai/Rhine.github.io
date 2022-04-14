<?php

	session_start();

	include("header.php");
	include 'connection.php';
	include 'functions.php';

	$user_data = check_login($connect);

	function getitems($connect){
		$sql = "SELECT * FROM item WHERE userid !='" . $_SESSION['userid'] . "' AND item_status = 'Bidding' ";
		$result = mysqli_query($connect, $sql);
		return mysqli_fetch_all($result);
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="content">
        <br>
        <label id="header">Recent upload products</label>
        <br><br>

		<?php 
			$items = getitems($connect);				
			if(!empty($items)){
				for($i = 0; $i < count($items); $i++){ ?>
					
					<div class='col'>
						<div class='card'>
							<img src= ".\upload\<?php echo $items[$i][3]; ?>">
							<div class="card-body">
							
							</div>
							
						<a href="productinf-sel.php?view=<?php echo $items[$i][4]; ?>">
							<button type="button" id= <?php echo $items[$i][4]; ?>>
								<table id="selling-display">
									<tr>
										<td><img src= ".\upload\<?php echo $items[$i][3]; ?>" id="smallimg"></td>
									</tr>
							
									<tr>
										<td id="display-title"><b><?php echo $items[$i][0]; ?></b></td>
									</tr>

									<tr>
										<td id="display-price">$<?php echo $items[$i][2]; ?></td>
									</tr>
									
									<tr>
										<td>Seller: <?php echo $items[$i][9]; ?></td>
									</tr>
									
									<tr>
										<td>End: <?php echo $items[$i][5]; ?></td>
									</tr>
								</table>
							</button>
						</a>			
					
		<?php	} 
			}?>


    </div>
</body>

</html>
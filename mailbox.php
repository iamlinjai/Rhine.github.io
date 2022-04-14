<?php

	session_start();

	include 'header.php';
	include 'connection.php';
	include 'functions.php';

	$user_data = check_login($connect); //User without login will redirect to login.php

	function getmails($connect){
			$sql = "SELECT * FROM mail WHERE receiverid = '" . $_SESSION['userid'] . "' ORDER BY datetime DESC";
			$result = mysqli_query($connect, $sql);
			return mysqli_fetch_all($result);
		}
?>

<html>
	<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail Box</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	
	<body>
		<div class="content" >
			
			<?php
			$mail = getmails($connect);
			
			if(empty($mail))
				echo "<p class='font-monospace'><h1>There has no any mail yet...</h1></p>";
			
			
			for($i=0;$i<count($mail); $i++){ ?>
				
					<div class="card">
						<div class="card-header">
						From: 
					<?php	
						if($mail[$i][1] == 0)
							echo "System"; ?>							
						<br>
						Date: <?php echo $mail[$i][5]; ?>	
						<br>					
						Content: 
						</div>
					<div class="card-body">
						<p class="card-text"><?php echo $mail[$i][3]; ?></p>
						<br>
						 <a href='productinf-sel.php?view=<?php echo $mail[$i][4]; ?>' class="btn btn-primary">Go Item page</a>
					</div>	
					<br>	
					</div>
	<?php	} ?>
			
			</div>
		</div>
	</body>
</html>
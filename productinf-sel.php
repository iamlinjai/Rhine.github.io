<?php

session_start();
include 'header.php';
include 'connection.php';
include 'functions.php';


$itemid = intval($_GET['view']);
$sql = "SELECT * FROM item WHERE itemid ='$itemid'";
$result = mysqli_query($connect, $sql);

function changestatus($status, $id, $connect){
    $sql = "UPDATE item SET item_status = '$status' WHERE itemid = '$id'";
    $result = mysqli_query($connect, $sql);
	}



function updatebuyer($price, $buyerid){
		
	}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['sold'])){
        changestatus($_POST['sold'], $itemid, $connect);
        header("location: mypost.php");
        die();
    }
    elseif(isset($_POST['delete'])){
        changestatus($_POST['delete'], $itemid, $connect);
        header('Location: mypost.php');
        die();
    }
    elseif(isset($_POST['buy'])){
        changestatus($_POST['buy']);


    }
    
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Details</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <script>
        var countDownDate = new Date("<?php echo $row['end_date']; ?>").getTime();

		var x = setInterval(function() {

			var now = new Date().getTime();

			var distance = countDownDate - now;

			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			document.getElementById("timer").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

			if (distance < 0) {
				clearInterval(x);
				document.getElementById("timer").innerHTML = "EXPIRED";
			}
					
        }, 1000);
        </script>

        <body>
            <div class="content">
                <table id="table">

                    <!--Display item's photos-->
                    <tr>
                        <td colspan="3" id="blurred-bg">
                            <img src="upload/<?php echo $row['item_img'];?>" alt="<?php echo $row['item_title'];?>" id="productimg"></p>
                        </td>
                    </tr>


                    <!--Display Time left / End of date-->
                    <tr>
                        <td id="timeleft" colspan="3">Close date: <?php echo $row['end_date']; ?>
                            <p style="font-size:1em;" id="timer"></p>
                        </td>
                    </tr>

                    <!--Display Item title-->
                    <tr>

                        <td colspan="2" id="information-title"><?php echo $row['item_title']; ?></td>
                        
                        <td rowspan="4" id="status">
                            <label><H4>Seller:</h4><h3><?php echo $row['seller'];?></h3></label>

                            <br><br>
	
							<?php 
							if($_SESSION['userid'] == $row['userid']){ ?>
                               <form class="form-group" method = "POST">
                                    <button type="submit" id="soldbtn" name="sold" value="sold">Change to sold </button>
                                    <button type="submit" id="cancelbtn" name="delete" value="delete">Delete Post </button>
                                </form>
							<?php
							}else{ ?>

                                <form class="form-group" method = "POST">
                                    <div class="form-group mx-sm-3">
                                        <label for="offerprice" class="sr-only">Make an offer here.</label>
                                        <br>
                                        <input type="text" class="form-control"  name="offerprice"  placeholder="$HKD">
                                        <br>
                                        <input type="submit" class="btn btn-primary" id="soldbtn" value="buy" name="buy ">
                                    </div>                           
                                </form>

                                <?php
                            }
							?>
							
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" id="information-price">$<?php echo $row['price']; ?></td>
                    </tr>

                    <tr>
                        <td colspan="2"><h5>Item description:</h5><br><?php echo $row['item_desc']; ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $row['item_status']; ?></td>
                    </tr>

            <?php
        }
    } else {
        echo 'Not Found !';
    }
    //}
            ?>
            </Table>
        </div>
    </body>

</html>
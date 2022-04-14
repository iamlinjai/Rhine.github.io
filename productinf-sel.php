<?php

session_start();
include 'header.php';
include 'connection.php';
include 'functions.php';


$itemid = intval($_GET['view']);
$sql = "SELECT * FROM item WHERE itemid ='$itemid'";
$result = mysqli_query($connect, $sql);

<<<<<<< HEAD
$row =  mysqli_fetch_assoc($result);

=======
>>>>>>> b3f6c0a7d33db62749e5b19c5b6edca70bc8e7c7
function changestatus($status, $id, $connect){
    $sql = "UPDATE item SET item_status = '$status' WHERE itemid = '$id'";
    $result = mysqli_query($connect, $sql);
	}



function updatebuyer($offer_price, $id, $connect, $buyer_id){
<<<<<<< HEAD
    /*/$item_price = mysqli_query($connect, "SELECT price FROM item WHERE itemid ='$itemid'");
=======
    $item_price = mysqli_query($connect, "SELECT price FROM item WHERE itemid ='$itemid'");
>>>>>>> b3f6c0a7d33db62749e5b19c5b6edca70bc8e7c7
    if($offer_price > $item_price){
        $sql = "UPDATE item SET price = '$offerprice' buyerid = '$buyer_id' WHERE itemid ='$id'";
        $result = mysqli_query($connect, $sql);
    }else{
        $sql = "UPDATE item SET buyerid = '$buyer_id' WHERE itemid ='$id'";
        $result = mysqli_query($connect, $sql);
<<<<<<< HEAD
    }/*/
		$sql = "UPDATE item SET buyer_id = '$buyer_id' WHERE itemid = '$id'";
		mysqli_query($connect, $sql);
		$sql = "UPDATE item SET price = '$offer_price' WHERE itemid = '$id'";
		mysqli_query($connect, $sql);
	}

function sendmsg($id, $connect, $user_id, $content){
		$sql = "INSERT INTO mail(receiverid , content, itemid) VALUES('$user_id','$content','$id');";
		mysqli_query($connect, $sql);
}

function getphone($userid,$connect){
		$sql = "SELECT phone FROM user WHERE userid ='$userid'";
		mysqli_query($connect, $sql);
		$result = mysqli_query($connect, $sql);
		$row =  mysqli_fetch_assoc($result);
		return $row;
}

function getaddress($userid,$connect){
		$sql = "SELECT address FROM user WHERE userid ='$userid'";
		$result = mysqli_query($connect, $sql);
		$row =  mysqli_fetch_assoc($result);
		return $row;
}

function getusername($userid,$connect){
		$sql = "SELECT username FROM user WHERE userid ='$userid'";
		$result = mysqli_query($connect, $sql);
		$row =  mysqli_fetch_assoc($result);
		return $row;
}
=======
    }
	}

>>>>>>> b3f6c0a7d33db62749e5b19c5b6edca70bc8e7c7

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['sold'])){
        changestatus($_POST['sold'], $itemid, $connect);
<<<<<<< HEAD
		$msg = '';
		$msg = 'Cheers! Your item already sold for $ ' . $row["price"] . '! <br>Please check the item for more detail. ';
		sendmsg($itemid, $connect, $row['userid'], $msg);
		$msg = 'Congret! You successfully bid the item for $ ' . $row["price"] . '! <br>Please check the item for more detail.';
		sendmsg($itemid, $connect, $row['buyer_id'], $msg);		 
=======
>>>>>>> b3f6c0a7d33db62749e5b19c5b6edca70bc8e7c7
        header("location: mypost.php");
        die();
    }
    elseif(isset($_POST['delete'])){
        changestatus($_POST['delete'], $itemid, $connect);
        header('Location: mypost.php');
        die();
    }
    elseif(isset($_POST['buy'])){
<<<<<<< HEAD
		if($_POST['offerprice'] > $row['price']){
			$msg = '';			
			updatebuyer($_POST['offerprice'], $itemid, $connect, $_SESSION['userid']);
			$msg = 'Someone raise your item price to $ ' . $_POST['offerprice'] . '<br>Please check the item for more detail.';
			sendmsg($itemid, $connect, $row['userid'], $msg);
			header("Location: productinf-sel.php?view=$itemid");
			die();
		}	
    }
}

if (mysqli_num_rows($result) > 0) {
    //while ($row = mysqli_fetch_assoc($result)) {
=======
        updatebuyer($_POST['offerprice'], $itemid, $connect, $_SESSION['userid']);


    }
    
}

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
>>>>>>> b3f6c0a7d33db62749e5b19c5b6edca70bc8e7c7
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
<<<<<<< HEAD
	</head>
	<style>
		p {text-indent: 180px;}
	</style>
=======
    </head>
>>>>>>> b3f6c0a7d33db62749e5b19c5b6edca70bc8e7c7

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
<<<<<<< HEAD
							if(($_SESSION['userid'] == $row['userid'] and $row['buyer_id'] != 0) and !strcmp($row['item_status'],'Bidding')){ ?>
=======
							if($_SESSION['userid'] == $row['userid']){ ?>
>>>>>>> b3f6c0a7d33db62749e5b19c5b6edca70bc8e7c7
                               <form class="form-group" method = "POST">
                                    <button type="submit" id="soldbtn" name="sold" value="sold">Change to sold </button>
                                    <button type="submit" id="cancelbtn" name="delete" value="delete">Delete Post </button>
                                </form>
<<<<<<< HEAD
								<?php
								if($row['userid'] == 0) ?>
									
							<?php
							}
							elseif($_SESSION['userid'] == $row['userid'] and $row['buyer_id'] == 0){?>
								<form class="form-group" method = "POST">
									<button type="submit" id="cancelbtn" name="delete" value="delete">Delete Post </button>
								</form>
							<?php
							}elseif(!($row['item_status']=='Bidding')){ ?>
								<h3><b>Bid Closed</b></h3>
							<?php
							}else{ ?>
                                <form class="form-group" method = "POST">
                                    <div class="form-group mx-sm-3">
                                        <label for="offerprice" class="sr-only">Make an offer here.</label>
                                        <br>
                                        <input type="number" class="form-control"  name="offerprice"  placeholder="$HKD">
                                        <br>
                                        <input type="submit" class="btn btn-primary" id="soldbtn" value="buy" name="buy">
                                    </div>                           
                                </form>

=======
							<?php
							}else{ ?>

                                <form class="form-group" method = "POST">
                                    <div class="form-group mx-sm-3">
                                        <label for="offerprice" class="sr-only">Make an offer here.</label>
                                        <br>
                                        <input type="number" class="form-control"  name="offerprice"  placeholder="$HKD">
                                        <br>
                                        <input type="submit" class="btn btn-primary" id="soldbtn" value="buy" name="buy">
                                    </div>                           
                                </form>

>>>>>>> b3f6c0a7d33db62749e5b19c5b6edca70bc8e7c7
                                <?php
                            }
							?>
							
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" id="information-price">$<?php echo $row['price']; ?></td>
                    </tr>

                    <tr>
                        <td><h5>Item description:</h5><br><?php echo $row['item_desc']; ?></td>
                    </tr>	
				</Table>
				
								
				<?php			
					if(($_SESSION['userid'] == $row['userid']) OR ($_SESSION['userid'] == $row['buyer_id'])){ 
						if($row['item_status'] === 'sold'){?>
							<div class="card mb-5 mt-5">
							  <div class="card-header">
								Receipt
							  </div>
							  <div class="card-body">
								<h5 class="card-title">Buyer Information</h5>
								<p class="card-text">Username:<b><u> <?php echo getusername($row['buyer_id'],$connect)['username']; ?></u></b></p>
								<p class="card-text">Phone number:<b><u> <?php echo getphone($row['buyer_id'],$connect)['phone']; ?></u></b></p>
								<p class="card-text">Shipping Address (If any):<b><u> <?php echo getaddress($row['buyer_id'],$connect)['address']; ?></u></b></p>
								<h5 class="card-title">Seller Information</h5>
								<p class="card-text">Username:<b><u> <?php echo getusername($row['userid'],$connect)['username']; ?></u></b></p>
								<p class="card-text">Phone Number:<b><u> <?php echo getphone($row['userid'],$connect)['phone']; ?></u></b></p>
								<p class="card-text">Shipping Address (If any): <b><u> <?php echo getaddress($row['userid'],$connect)['address']; ?></u></b></p>
							  </div>
							</div>
			<?php		} 
					}?>
            </div>       


            <?php
        //}
    } else {
        echo 'Not Found !';
    }
    //}
            ?>
<<<<<<< HEAD
            
        
=======
            </Table>
        </div>
>>>>>>> b3f6c0a7d33db62749e5b19c5b6edca70bc8e7c7
    </body>

</html>
<?php

	define("TITLE", "Menu | Franklin's Fine Dining");
	include('includes/header.php');



	if(isset($_GET['item'])) {
		$menuItem =  $_GET['item'] ;
		$dish = $menuItems[$menuItem];
	}

	function suggestedTip($price, $tip) {
		$totalTip = $price * $tip;
    echo ceil($totalTip);
	}

?>

	<img src="img/hr.png"/>
	<div class="dish">
		 <h1><?php echo $dish['title'];?> <span style='float:right;' ><?php echo $dish['price'].'$'?></span></h1>
     <br>
     <p class="blurb"><?php echo $dish["blurb"]; ?></p>
     <br>
     <p><em>Suggested tip: <span><?php suggestedTip($dish["price"], 0.20); ?></span>$</em></p>
		<br>
    <img src="img/hr.png"/>
    <a href="menu.php" class="button-previous">&laquo; Back to Menu</a>

	</div>





<?php include('includes/footer.php'); ?>

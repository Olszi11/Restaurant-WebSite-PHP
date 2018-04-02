<?php
  define("TITLE", "Menu | Franklin's Restaurant");
  include('includes/header.php');
?>
  <div class="menu-items">
    <h1>Our Delicious Menu</h1>
    <img src="img/hr.png"/>
    <p>Our menu is very small like our team, but our dishes are best.</p>
    <p>Click any menu item to learn more about it</p>
    <img src="img/hr.png"/>
    <div class="dishes">
      <ul>
      <?php
        foreach($menuItems as $dish=>$item){
      ?>
        <h4><li class="dish-name" style='text-align: left;'><a href="dish.php?item=<?php echo $dish; ?>"><?php echo $item['title']?>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><span style='float:right;' ><?php echo $item['price'].'$'?></span></li></h4>
      <?php
        }
      ?>
      </ul>
    </div>
  </div>

<?php
  include('includes/footer.php');
?>

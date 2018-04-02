<?php
  define("TITLE", "Team | Franklin's Restaurant");
  include('includes/header.php');
?>
  <div class="team-members">
    <h1>Our Team at Franklin's</h1>
    <img src="img/hr.png">
    <p class='desc'>Franklin's Restaurant is a family-owned business, and we are proud of it.<br>
      When you get these three together, you never know what can happen.<br>
      But you can count on one thing:</p>
      <strong> Best food you have ever had. </strong>
    <img src="img/hr.png"/>
    <div class="members">
      <?php
        foreach($teamMembers as $member){
      ?>
          <div class="member">
            <img src="img/<?php echo $member['img'];?>.png" alt="<?php echo $member['name'];?>">
            <h2><?php echo $member['name']?></h2>
            <h4><?php echo $member['position']?></h4>
            <p style="font-size:12px"><?php echo $member['bio'] ?></p>
          </div>
      <?php
        }
      ?>
    </div>
  </div>

<?php
  include('includes/footer.php');
?>

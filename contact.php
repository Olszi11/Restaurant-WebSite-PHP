<?php
define("TITLE", "Contact Us | Franklin's Restaurant");
include('includes/header.php');


?>

  <div class="contact">

    <h1>Get in touch with us</h1>
    <img src="img/hr.png"/>
    <?php
      function has_header_injections($str){
        return preg_match('/[\r\n]/', $str);
      }
      if(isset($_POST['contact-submit'])){

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $emailB = filter_var($email,FILTER_SANITIZE_EMAIL);
        $msg = $_POST['message'];


        if(has_header_injections($name) || has_header_injections($email)){
          die();
        }

        if(!$name || !$email || !$msg){
          echo "<h4 class='err'>All fields required</h4><a class='button-previous' href='contact.php'>Back to Contact</a>";
        }else if(!preg_match('/^[a-zA-Z]*$/',$name)) {
          echo "<h4 class='err'> Name must contain only letters (without white spaces)!</h4><a class='button-previous' href='contact.php'>Back to Contact</a>";
        }else if(strlen($name)<3 || strlen($name)>20) {
          echo "<h4 class='err'> Name must have 3 - 20 signs!</h4><a class='button-previous' href='contact.php'>Back to Contact</a>";
        }else if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false)||($emailB!=$email)){
          echo "<h4 class='err'> Wrong email adress!</h4><a class='button-previous' href='contact.php'>Back to Contact</a>";
        }else if( (strlen($msg)<5)){
          echo "<h4 class='err'> Your message must have more than 5 signs!</h4><a class='button-previous' href='contact.php'>Back to Contact</a>";
        }else{
          echo "<h4 class='success'> Thanks for contacting with us!<br>Please allow 24 hours for response</h4>
          <a class='button-previous' href='index.php'>Back to Home</a>";


          $to = "krzysztof10i11@o2.pl";
          $subject = "$name sent you a message via your contact form";
          $message = "Name: $name <br>\r\n";
          $message .= "Email: $email <br>\r\n";
          $message .= "Message: $msg <br>\r\n";

          if(isset($_POST['subscribe']) && $_POST['subscribe']='Subscribe'){
            $message.="<br>\r\n\r\n Please add $email to the mailing list. \r\n";
          }

          $headers  = "MIME-Version: 1.0 ". "\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
          $headers .= "From: $name  <$email>" . "\r\n";
          $headers .= "X-Priority: 1". "\r\n";
          $headers .= "X-MSMail-Priority: Highs". "\r\n";

          mail($to, $subject, $message, $headers);
      }

    ?>


  <?php }else{ ?>
    <form method="post" action="" id="contact-form">
      <label for='name'>Your name</label>
      <input type='text' id='name' name='name'>

      <label for='email'>Your email</label>
      <input type='email' id='email' name='email'>

      <label for='message'>Your message</label>
      <textarea id='message' name='message'></textarea>

      <label class="subscribe" for='subscribe'>
      <input type='checkbox' id='subscribe' name='subscribe' value='Subscribe'>
      <?php echo strtoupper('Subscribe to newsletter')?></label>

      <input type='submit' class='submit' name='contact-submit' value='Send message'>
    </form>
   <?php }?>
   <img src="img/hr.png"/>
  </div>



<?php
include('includes/footer.php');
?>

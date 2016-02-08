<?php
      // display form if user has not clicked submit
      if (!isset($_POST["submit"])) {
      ?>

      <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" style="width:100%; margin: 0 auto;">
        <p>
          <label>Nome:</label>
          <input name="textName" type="text" size="30" />
          <label>Email:</label>
          <input name="textEmail" type="text" size="30" />
          <label>Assunto:</label>
          <input name="textTitle" type="text" size="30" />
          <label>O seu comentário:</label>
          <textarea name="textarea" cols="5" rows="5"></textarea>
          <br />
          <input class="button" type="submit" value="Enviar"/>
        </p>
      </form>

      <?php 
      } 
      else 
      {    // the user has submitted the form
      // Check if the "from" input field is filled out
        if (isset($_POST["textEmail"])) {
            $from = $_POST["textEmail"]; // sender
            $subject = $_POST["textTitle"];
            $message = $_POST["textarea"];
            // message lines should not exceed 70 characters (PHP rule), so wrap it
            $message = wordwrap($message, 70);
            // send mail
            mail("bellarmine16@gmail.com",$subject,$message,"From: $from\n");
            echo "Thank you for sending us feedback";
  }
}
?>
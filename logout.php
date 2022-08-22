
<?php
   session_start();
   
   if(session_destroy()) {
      ?>
         <script>
            alert('Logout Successfull!');
         </script>
      <?php
      header("refresh:0; url=index.php");
   }
?>
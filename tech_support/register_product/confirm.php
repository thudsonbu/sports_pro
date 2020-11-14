<?php 
require '../model/sessionConfig.php';

require '../view/header.php';

makeHeader('Register Index');

?>

<!-- RESPONSIVE NAVBAR -->
<?php
    require '../view/nav.php'
?>

<!-- PAGE TITLE -->
<div class='pageTitleContainer'>
    <div class='pageTitle'>
        Register
    </div>
</div>

<!-- PAGE CONTENT -->
<div class='sectionContainer'>
   <?php 
   if (!empty($_GET['message'])) {
       
       $message = $_GET['message'];
       
       require "../errors/successMessage.php";
       
       successMessage($message);
       
   } 
   
   if (!empty($_GET['error'])) {
       
       $error = $_GET['error'];
       
       require "../errors/errorMessage.php";
       
       customErrorMessage($error);
       
   }
   
   //session_destroy();
   
   ?>
</div>

<?php 

require '../view/footer.php';

?>
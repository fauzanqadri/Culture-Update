<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
echo $this->scope["message"];?>

 <?php echo info();?>

<?php echo $this->scope["message"];
 /* end template body */
return $this->buffer . ob_get_clean();
?>
<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>HAsahsa

<?php echo $this->scope["template"]["body"];
 /* end template body */
return $this->buffer . ob_get_clean();
?>
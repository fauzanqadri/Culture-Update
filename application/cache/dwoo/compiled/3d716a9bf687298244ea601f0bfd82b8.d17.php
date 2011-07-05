<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
echo $this->scope["message:asuh"];?>

<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
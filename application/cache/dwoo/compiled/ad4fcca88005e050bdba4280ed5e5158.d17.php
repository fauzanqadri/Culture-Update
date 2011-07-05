<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ;
echo $this->scope["foo"]["asuh"];
 /* end template body */
return $this->buffer . ob_get_clean();
?>
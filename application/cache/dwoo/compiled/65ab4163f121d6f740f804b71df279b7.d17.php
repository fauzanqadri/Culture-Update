<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined variable: foo</p>
<p>Filename: views/test.php</p>
<p>Line Number: 1</p>

</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
<?php
$_SESSION=array();
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),'',time()-1,'/');
}
session_destroy();
echo '<script>window.location="form.html"</script>';
?>
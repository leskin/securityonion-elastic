<?php

require_once '.inc/functions.php';
require_once '.inc/session.php';
require_once '.inc/config.php';

// If we see a filename parameter, we know the request came from Snorby/Squert
// and if so we can just query the event table since they just have NIDS alerts.
// Otherwise, query elk by default.
if (isset($_REQUEST['filename'])) { 
    $event = " checked";
} else {
    $elk  = " checked";
}

// Default to the "auto" tcpflow/bro transcript option
$auto = " checked";

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>
capME!
</title>
<style type="text/css" media="screen">@import ".css/capme.css";</style>
<script type="text/javascript" src=".js/jq.js"></script>
<script type="text/javascript" src=".js/elk.js"></script>
</head>
<body class=capme_body>
<div class=top>
<div id=t_usr class=user data-c_usr=<?php echo $sUser;?>>WELCOME&nbsp;&nbsp;<b><?php echo $sUser;?></b>&nbsp;&nbsp;|<span id=logout class=logout>LOGOUT</span></div>
<br>

<table class=capme_div align=center cellpadding=0 cellspacing=0>
<tr>
<td colspan=2 class=capme_logo>
<h2><span class=capme_l1>cap</span><span class=capme_l2>ME!</span></h2>
</td>
</tr>
<form name=capme_form>

<tr>
<td class=capme_left>ID:</td>
<td class=capme_right>
<input type=text maxlength=20 id=esid class=capme_selb value="<?php echo $esid;?>" /> 
</td>
</tr>

<tr>
<td class=capme_left>Max Xscript Bytes:</td>
<td class=capme_right><input type=text maxlength=32 id=maxtx class=capme_selb value="<?php echo $maxtx;?>" />
</td>
</tr>

<tr>
<td class=capme_left>Sid Source:</td>
<td class=capme_right>
<input type=radio name=sidsrc class=capme_rad value="sancp"<?php echo $sancp;?>>sancp
<input type=radio name=sidsrc class=capme_rad value="event"<?php echo $event;?>>event
<input type=radio name=sidsrc class=capme_rad value="elk"<?php echo $elk;?>>elk
</td>
</tr>

<tr>
<td class=capme_left>Output:</td>
<td class=capme_right>
<input type=radio name=xscript class=capme_rad value="auto"<?php echo $auto;?>>auto
<input type=radio name=xscript class=capme_rad value="tcpflow"<?php echo $tcpflow;?>>tcpflow
<input type=radio name=xscript class=capme_rad value="bro"<?php echo $bro;?>>bro
<input type=radio name=xscript class=capme_rad value="pcap"<?php echo $pcap;?>>pcap
</td>
</tr>

<tr>
<td colspan=2 class=capme_msg_cont>
<span class=capme_msg></span>
</td>
</tr>

<tr>
<td colspan=2 class=capme_button>
<div class=capme_submit>submit</div>
<input id=formargs type=hidden value="<?php echo $s;?>" />
</td>
</tr>

</form>
</table>
</body>
</html>

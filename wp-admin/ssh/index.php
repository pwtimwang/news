<?php
/** WordPress Administration Bootstrap */
require_once( '../admin.php' );


        $rootid   = "xqguo1986@163.com";
        $rootpw   = "@!Wtm98077";
        $outnic   = "eth1";
        $iptables = "/sbin/iptables";
        $action   = $_POST["action"];
        $remoteip = getenv("REMOTE_ADDR");
        
        function checkipaddres ($ipaddres) {
$preg="/\A((([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\.){3}(([0-9]?[0-9])|(1[0-9]{2})|(2[0-4][0-9])|(25[0-5]))\Z/";
if(preg_match($preg,$ipaddres))return true;
return false;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" >
<html lang="zh-TW">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
        <meta name="Author" content="VBird, ³¾­򠞾
        <title></title>
        

</head>
<body style="margin:0; padding:0">
<center>


<table summary="xxxxxxxxxxxxx" style="width:750px; 
        background-color: #FFFFFF;
        background-attachment:fixed;" border="2" cellspacing="0" cellpadding="0">
<tr><td>

<br>


<?php
        if ( $action == "login" )
        {
             $yourid = $_POST["yourid"];
             $yourpw = $_POST["yourpw"];
             $ip     = $_POST["ip"];
             if ( $yourid != $rootid or $yourpw != $rootpw or !checkipaddres($ip))
             { 
?>
                  <hr><span class="text_h1"></span><br>
                  <div class=block1>
                  <center><?php echo $yourid; ?>@@<?php echo $yourpw; ?>@@<?php echo $ip; ?><br /><br />
                  <a href="">yyyyyyyyyyy</a><br /><br /></center>
                  </div>
<?php        }
             else
             {
                 $fp     = fopen ( "temp/iptables.ssh.sh", "w" );
                 if ( !$fp ) 
                 {
?>
                     <hr><span class="text_h1">3333333</span><br>
                     <div class=block1>
                     <center>
                     44444444<br /><br />
                     <a href="">4444</a><br /><br /></center>
                     </div>
<?php             }
                  else 
                  { 
                     $outstr = $iptables . "  -I INPUT -i  " . $outnic . "  -p tcp -s  " . $ip .
                               "  --dport 22 -j ACCEPT \n"; 
                     fwrite ( $fp, $outstr );
                     fclose ( $fp );
                     $fp     = fopen ( "temp/ip.new" , "w" );
                     $outstr = "yes\n";
                     fwrite ( $fp, $outstr );
                     fclose ( $fp ); 
                   }
?>
               <hr><span class="text_h1">OK</span><br>
               <div class=block1>
               <center>6666666666666<br /><br />
               <a href=""></a><br /><br /></center>
               </div>
<?php       }
        }
        else
        {
?>
             <hr><br>
             <div class=block1>
             <form action="index.php" method="post">
             <table border=1 cellspacing=0 cellpadding=5 width=80% align=center>
             <tr><td align=center><font size=+1 color="darkblue">xxxxxxxxxxx</font>
             <input type=hidden name=action value="login">
             </td></tr>
             <tr><td align=center><font face="aaaa">
                             <input type=text     name="yourid" value="<?php echo $yourid; ?>"><br>
                             <input type=password name="yourpw" value="<?php echo $yourpw; ?>"><br>
                             <input type=text name="ip"         value="<?php echo $remoteip ; ?>"><br>
                             </font>
                     <tr><td align=center><input type="submit" value="zzzz"></td></tr>
             </table>
             </form>
             </div>

<?php   } 
?>

    </td>
</table>

</div>
</div>
</center>
</body>
</html>


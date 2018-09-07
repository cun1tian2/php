<?php
### various define
error_reporting(E_ALL); ini_set("display_errors",1);
mb_language("ja"); mb_internal_encoding("UTF-8"); mb_http_output("UTF-8");
require_once("Mail.php");					# PEAR::Mail
$prvpath="http://hana.k1.xrea.com/txd/";			#諺ランダム
$prvfile= ["prvb1.txt","prvb12.txt","prvb2.txt"][rand(0,2)];
date_default_timezone_set("Asia/Tokyo");

$sdmlparamfile="sdmlparams.txt";	 		// mode:600
$smtpary=unserialize(file_get_contents($sdmlparamfile));

### pre-process(smtparray, subject, body)
date_default_timezone_set("Asia/Tokyo");
$datetime=date("Y.n.j H:i(TP)");
$prvbfile= ["prvb1.txt","prvb12.txt","prvb2.txt"][rand(0,2)];		    //prvbfiles
if(! $tmpprv=file_get_contents("http://hana.k1.xrea.com/txd/".$prvbfile)){  //file_get URL
  die("prvbfile not find"); }
$getprvb=$tmpary[rand(0,count($tmpary=explode("\n",$tmpprv))-1)] ;

$smtpary["rcpt"].=",tmrtso@hotmail.com"; $smtpary["rcpt"].=",tmr445tmr445tmr@docomo.ne.jp";
$smtpary["headers"]["To"]=$smtpary["rcpt"];	###
$smtpary["headers"]["From"]="maximDeliverer";	// need same mailServer domain, or none. 
$smtpary["headers"]["Subject"]="Dayly maxim ".$datetime;
$smtpary["body"]="maxim/proverb $getprvb";

### require Mail::factory & send ###
$mailObject=Mail::factory("smtp",$smtpary["params"]);
  if(PEAR::isError($mailObject)){ die($mailObject->getMessage()); }
$resp=$mailObject->send($smtpary["rcpt"],$smtpary["headers"],$smtpary["body"]);
  if(PEAR::isError($resp)){ die($resp->getMessage()); }
echo "mail sent to ".$smtpary["rcpt"].$datetime;
echo var_dump($resp),"----",var_dump($smtpary);		### Debug

/*
### SMTP array makeFile & restore
$smtpary=array(
params=>array(host=>"k1.xrea.com",port=>587,auth=>true,username=>"hana@k1.xrea.com",password=>"MsuBHHIHxWYH"),
headers=>array(To=>"hoge@foo.bar.com",From=>"maximDeliverer",Subject=>"sabujekuto"),
rcpt=>"tmrkti@gmail.com", body=>"--nobodei--" );

$sdmlparamfile="sdmlparams.txt";
file_put_contents( $sdmlparamfile,serialize($smtpary) );
$smtpary=unserialize(file_get_contents($sdmlparamfile));

180829 debug done.
 pendings: junk to hotmail, install otherPhpSites, add form(to bcc from).
*/
?>
<script>
document.write("<div align=right>lastModified "+document.lastModified.substr(0,10)+", created 2018.8.29<div>");
</script>

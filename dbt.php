<html>
<head><meta http-equiv=Content-Type content=text/html;charset=UTF-8></head>
<body>
<?php
$ckbxenotc=$_POST["enotice"]; $ckbxhtmlent=$_POST["htmlent"];	$ckbxwrt=$_POST["write"];
$note="'".$_POST["note"]."'"; $cmdl="'".$_POST["cmdl"]."'";	$cmda="'".$_POST["cmda"]."'";
if($ckbxenotc){ error_reporting(E_ALL & ~E_NOTICE); }
ini_set('display_errors',1);

print <<<EOF
<form method=POST action=$_SERVER[SCRIPT_NAME]>
dbt.php　[<a href=help.htm target=_blank>help.htm</a>],
 <input type=checkbox name=enotice value=checked $ckbxenotc>E.noticeOff,
 <input type=checkbox name=htmlent value=checked $ckbxhtmlent>htmlEntity"eval()",
 <input type=checkbox name=write value=checked $ckbxwrt>write cmda"tmp.txt",
　Exe<a href=tmp.php target=_blank>"tmp.php"</a>
<pre>
　　note<textarea name=note cols=80 rows=2 style=overflow:auto;>$_POST[note]</textarea>
<input type=submit value="Go">cmdl<input type=text name=cmdl size=105 value=$cmdl>\n
EOF;

if ($ckbxwrt && $cmda) file_put_contents("tmp.txt",$_POST["cmdl"]);

function htmlent($string){
 global $ckbxhtmlent;
 return ($ckbxhtmlent ? htmlspecialchars($string) : $string);
}

echo "cmdl:\n".$_POST["cmdl"]."\n",htmlent(eval($_POST["cmdl"]." ;")),"\n";
echo "cmda<textarea name=cmda cols=80 rows=8 style=overflow:auto; value=$cmdl>".$_POST["cmda"]."</textarea></form>\n";
echo "cmda:\n".$_POST["cmda"]."\n",htmlent(eval($_POST["cmda"]." ;")),"\n";
?>
----pop.Func.： bool rename(old,new),  str file_get_contents(URL), 〃_put_(file,str) --------

180813 script(file_put/get_), ☑write Err bad</pre>
<script>
document.write("<div align=right>lastModified "+document.lastModified.substr(0,10)+", revised 180811, created 170828</div>");
</script>
</body></html>

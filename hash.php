<?php /* DECODED */
@ini_set('output_buffering',0); 
@ini_set('display_errors', 0);
$text = $_POST['code'];
?>
<title>Encode - Decode Tools</title>
<STYLE>
body,td,th {font-family: Verdana;font-size: 12px;color: #00FF00;font-weight: bold;}
.jaya{ font-family:Vivaldi;font-size:50px;color: #00FF00;}
input {BORDER-RIGHT:#00FF00 1px solid;BORDER-TOP:#00FF00 1px solid;BORDER-LEFT:#00FF00 1px solid;BORDER-BOTTOM: #00FF00 1px solid;BACKGROUND-COLOR: #111111;COLOR: #00FF00;font: 8pt Verdana;}
select {BORDER-RIGHT:#00FF00 1px solid;BORDER-TOP:#00FF00 1px solid;BORDER-LEFT:#00FF00 1px solid;BORDER-BOTTOM: #00FF00 1px solid;BACKGROUND-COLOR: #111111;COLOR: #00FF00;font: 8pt Verdana;}
submit {BORDER-RIGHT:buttonhighlight 2px outset;BORDER-TOP:buttonhighlight 2px outset;BORDER-LEFT:buttonhighlight 2px outset;BORDER-BOTTOM: buttonhighlight 2px outset;BACKGROUND-COLOR: #000099;COLOR: #FFFF00;width: 30%;}
textarea {BORDER-RIGHT:#00FF00 1px solid;BORDER-TOP:#00FF00 1px solid;BORDER-LEFT:#00FF00 1px solid;BORDER-BOTTOM: #00FF00 1px solid;BACKGROUND-COLOR: #111111;COLOR: #00FF00;font: Fixedsys bold;}
BODY {margin-top: 1px;margin-right: 1px;margin-bottom: 1px;margin-left: 1px;SCROLLBAR-FACE-COLOR: #111111; SCROLLBAR-HIGHLIGHT-COLOR: #111111;SCROLLBAR-ARROW-COLOR: #c5c5c5;SCROLLBAR-BASE-COLOR: #253546;BACKGROUND-COLOR: #000000;}
</STYLE>
<center>
<div class="jaya">Encode - Decode Tools</div>
<form method="post"><br>
<textarea class='inputz' cols=80 rows=10 name="code"></textarea><br><br>
<select class='inputz' size="1" name="ope">
<option value="urlencode">url</option>
<option value="base64">Base64</option>
<option value="ur">convert_uu</option>
<option value="json">json</option>
<option value="gzinflates">gzinflate - base64</option>
<option value="str2">str_rot13 - base64</option>
<option value="gzinflate">str_rot13 - gzinflate - base64</option>
<option value="gzinflater">gzinflate - str_rot13 - base64</option>
<option value="gzinflatex">gzinflate - str_rot13 - gzinflate - base64</option>
<option value="gzinflatew">str_rot13 - convert_uu - url - gzinflate - str_rot13 - base64 - convert_uu - gzinflate - url - str_rot13 - gzinflate - base64</option>
<option value="str">str_rot13 - gzinflate - str_rot13 - base64</option>
<option value="url">base64 - gzinflate - str_rot13 - convert_uu - gzinflate - base64</option>
</select>&nbsp;<br><br><input class='inputzbut' type='submit' name='submit' value='Encode'>
<input class='inputzbut' type='submit' name='submits' value='Decode'>
</form>

<?php 
$submit = $_POST['submit'];
if (isset($submit)){
$op = $_POST["ope"];
switch ($op) {case 'base64': $codi=base64_encode($text);
break;case 'str' : $codi=(base64_encode(str_rot13(gzdeflate(str_rot13($text)))));
break;case 'json' : $codi=json_encode(utf8_encode($text));
break;case 'gzinflate' : $codi=base64_encode(gzdeflate(str_rot13($text)));
break;case 'gzinflater' : $codi=base64_encode(str_rot13(gzdeflate($text)));
break;case 'gzinflatex' : $codi=base64_encode(gzdeflate(str_rot13(gzdeflate($text))));
break;case 'gzinflatew' : $codi=base64_encode(gzdeflate(str_rot13(rawurlencode(gzdeflate(convert_uuencode(base64_encode(str_rot13(gzdeflate(convert_uuencode(rawurldecode(str_rot13($text))))))))))));
break;case 'gzinflates' : $codi=base64_encode(gzdeflate($text));
break;case 'str2' : $codi=base64_encode(str_rot13($text));
break;case 'urlencode' : $codi=rawurlencode($text);
break;case 'ur' : $codi=convert_uuencode($text);
break;case 'url' : $codi=base64_encode(gzdeflate(convert_uuencode(str_rot13(gzdeflate(base64_encode($text))))));
break;default:break;}}

$submit = $_POST['submits'];
if (isset($submit)){
$op = $_POST["ope"];
switch ($op) {case 'base64': $codi=base64_decode($text);
break;case 'str' : $codi=str_rot13(gzinflate(str_rot13(base64_decode(($text)))));
break;case 'json' : $codi=utf8_dencode(json_dencode($text));
break;case 'gzinflate' : $codi=str_rot13(gzinflate(base64_decode($text)));
break;case 'gzinflater' : $codi=gzinflate(str_rot13(base64_decode($text)));
break;case 'gzinflatex' : $codi=gzinflate(str_rot13(gzinflate(base64_decode($text))));
break;case 'gzinflatew' : $codi=str_rot13(rawurldecode(convert_uudecode(gzinflate(str_rot13(base64_decode(convert_uudecode(gzinflate(rawurldecode(str_rot13(gzinflate(base64_decode($text))))))))))));
break;case 'gzinflates' : $codi=gzinflate(base64_decode($text));
break;case 'str2' : $codi=str_rot13(base64_decode($text));
break;case 'urlencode' : $codi=rawurldecode($text);
break;case 'ur' : $codi=convert_uudecode($text);
break;case 'url' : $codi=base64_decode(gzinflate(str_rot13(convert_uudecode(gzinflate(base64_decode(($text)))))));
break;default:break;}}
$html = htmlentities(stripslashes($codi));
echo "<from><center><h3>HASIL</h3></center><textarea cols=80 rows=10 class='inputz' readonly>".$html."</textarea><BR/><BR/></center></from>";
?>

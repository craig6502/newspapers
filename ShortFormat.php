<html>
<head>
</head>
<body>
<p>This web form will automatically format one innings of your match result into the abridged media-ready format and allow you to email it to me.  Suitable for 2nd and lower grades.
</p>
<p>
<form name = "form1" action="ShortFormat.php" method="post">
Grade <select name = "gradeSEL">
<option value="">Select...</option>
<option value="First Grade">1st grade</option>
<option value="Second Grade">2nd grade</option> 
<option value="Third Grade">3rd grade</option> 
<option value="Fourth Grade">4th grade</option> 
<option value="U17">Under 17</option> 
<option value="U15">Under 15</option> 
</select>
</p>
<p>Round <input type="text" name="roundSEL" /></p>
<p>
Day <select name = "daySEL">
<option value="">Select...</option>
<option value="Day 1">Day 1</option>
<option value="Day 2">Day 2</option> 
</select>
</p>
<p>
First Team/Winning Team <select name = "winCLUB">
<option value="">Select...</option>
<option value="Bayswater-Morley">BM</option>
<option value="Claremont-Nedlands">CN</option> 
<option value="Fremantle">FR</option> 
<option value="Gosnells">GO</option> 
<option value="Joondalup">JO</option> 
<option value="Melville">ME</option> 
<option value="Midland-Guildford">MG</option> 
<option value="Mount Lawley">ML</option> 
<option value="Perth">PE</option> 
<option value="Rockingham-Mandurah">RM</option> 
<option value="Scarborough">SC</option> 
<option value="Subiaco-Floreat">SF</option>
<option value="South Perth">SP</option> 
<option value="University">UNI</option> 
<option value="Wanneroo">WA</option> 
<option value="Willetton">WI</option> 
</select>
</p>
<p>
First Innings score <input type="text" name="WTscore" />
</p>
<p>
Best Batsman 1 name <input type="text" name="WTB1name" value="<?php echo isset($_POST['WTB1name']) ? $_POST['WTB1name'] : ''; ?>"/>
Runs <input type="text" name="WTB1runs" /></p>
<p>
Best Batsman 2 name <input type="text" name="WTB2name" value="<?php echo isset($_POST['WTB2name']) ? $_POST['WTB2name'] : ''; ?>"/>
Runs <input type="text" name="WTB2runs" value="<?php echo isset($_POST['WTB2runs']) ? $_POST['WTB2runs'] : ''; ?>"/>
</p>
<p>
Best Bowler 1 name <input type="text" name="WTBo1name" value="<?php echo isset($_POST['WTBo1name']) ? $_POST['WTBo1name'] : ''; ?>"/>
Wickets <input type="text" name="WTBo1wick" />
Runs <input type="text" name="WTBo1runs" />
</p>
<p>
Best Bowler 2 name <input type="text" name="WTBo2name" />
Wickets <input type="text" name="WTBo2wick" />
Runs <input type="text" name="WTBo2runs" />
</p>
<p>
Other Team
<select name = "loseCLUB">
<option value="">Select...</option>
<option value="">Select...</option>
<option value="Bayswater-Morley">BM</option>
<option value="Claremont-Nedlands">CN</option> 
<option value="Fremantle">FR</option> 
<option value="Gosnells">GO</option> 
<option value="Joondalup">JO</option> 
<option value="Melville">ME</option> 
<option value="Midland-Guildford">MG</option> 
<option value="Mount Lawley">ML</option> 
<option value="Perth">PE</option> 
<option value="Rockingham-Mandurah">RM</option> 
<option value="Scarborough">SC</option> 
<option value="Subiaco-Floreat">SF</option>
<option value="South Perth">SP</option> 
<option value="University">UNI</option> 
<option value="Wanneroo">WA</option> 
<option value="Willetton">WI</option> 
</select>
</p>
<p>Losing Team score: <input type="text" name="LTscore" /></p>
<p>
<p>
Best Batsman 1 name <input type="text" name="LTB1name" />
Runs <input type="text" name="LTB1runs" /></p>
<p>
Best Batsman 2 name <input type="text" name="LTB2name" />
Runs <input type="text" name="LTB2runs" />
</p>
<p>
Best Bowler 1 name <input type="text" name="LTBo1name" />
Wickets <input type="text" name="LTBo1wick" />
Runs <input type="text" name="LTBo1runs" />
</p>
<p>
Best Bowler 2 name <input type="text" name="LTBo2name" />
Wickets <input type="text" name="LTBo2wick" />
Runs <input type="text" name="LTBo2runs" />
</p>
<p><input type="text" Name = "Comments" size="80" maxlength="400" value="additional comments (if any)" />
<input type="submit" name="submitForm" value="Submit & Email">
</p>
</form>

<?php
$day=$_POST['daySEL'];
$grade=$_POST['gradeSEL'];
$round=$_POST['roundSEL'];
$winclub= $_POST['winCLUB'];
$loseclub= $_POST['loseCLUB'];
$wtscore= $_POST['WTscore'];
$wtb1=$_POST['WTB1name'];
$wtb1run=$_POST['WTB1runs'];
$wtbo1=$_POST['WTBo1name'];
$wtbo1run=$_POST['WTBo1runs'];
$wtbo1wick=$_POST['WTBo1wick'];
$wtbo2=$_POST['WTBo2name'];
$wtbo2run=$_POST['WTBo2runs'];
$wtbo2wick=$_POST['WTBo2wick'];
$LTscore= $_POST['LTscore'];
$ltb1=$_POST['LTB1name'];
$ltb1run=$_POST['LTB1runs'];
$ltbo1=$_POST['LTBo1name'];
$ltbo1run=$_POST['LTBo1runs'];
$ltbo1wick=$_POST['LTBo1wick'];
$ltbo2=$_POST['LTBo2name'];
$ltbo2run=$_POST['LTBo2runs'];
$ltbo2wick=$_POST['LTBo2wick'];


if(!empty($_REQUEST['submitForm']))
{
$result="WACA ".$grade.", Round ".$round.", ".$day.": ".$winclub." ".$wtscore." (".$wtb1." ".$wtb1run.", ".$WTB2name." ".$WTB2runs.";  ".$wtbo1." ".$wtbo1wick."-".$wtbo1run.", ".$wtbo2." ".$wtbo2wick."-".$wtbo2run.") b ".$loseclub. " ".$LTscore. " (".$ltb1." ".$ltb1run.", ".$LTB2name." ".$LTB2runs.";  ".$ltbo1." ".$ltbo1wick."-".$ltbo1run.", ".$ltbo2." ".$ltbo2wick."-".$ltbo2run.");";
print $result;

$from = "WACAscores@webserver";
$headers = "From: $from";
//$strEmail = "scores@waca.com.au";
$strEmail = "craig.duncan@westnet.com.au";
$strSubject = "Scores";
$strMessage = $result;
$strComment=$_POST['Comments'];
mail($strEmail,$strSubject,$strMessage,$headers);
echo "<p>Mail Sent.  :)</p>";
}
?>
</body>
</html>

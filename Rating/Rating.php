<html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/select.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<script type="text/javascript">
	function callfunction_ratio(value)
	{
		$.get("Ratio/Ratio_1.php?url="+value,function(text)
		{
			$('#subselect_ratio').html(text);
		});
	}
</script>
<?php
//include('../Simple_php/simple_html_dom.php');
$html = file_get_html('http://nemo.sonarqube.org/drilldown/measures/219971?metric=sqale_rating');
$names = array();
$percentages = array();
$names1 = array();
foreach ($html->find('table[class="spaced"]') as $languages)
{
	foreach ($languages->find('tr') as $row) 
	{
		foreach ($row->find('td') as $td1)
		 {
			foreach ($td1->find('a') as $a1)
			 {
			 	$names[] = $a1;
			 	$names1[] = $a1->getAttribute('href');
			 }
		 }
		 foreach($row->find('td[class="text-right"]') as $td2)
		 {
		 	$percentages[] = $td2;
		 }

	}
}
echo "<div style=\"padding-left:165px;\" class=\"row\">";
echo "<div class=\"col-md-12\">";

echo "<select  style=\"color:white;
	background-image:(down.png);
	background-color:#5377ac;
	border-radius:20px;
	border-radius:20px;
	border-radius:20px;
	padding-left:110px;
	font-family:sans-serif;
	font-size:20px;
	font-weight:bold;
	width:500px;
	height:45px;\" onchange = \"callfunction_ratio(this.value)\">";
echo "<option  style=\"display:none\">";
echo "All Projects Rating";
echo "</option>";
for($i=0,$j=0;$i<400,$j<200;$i+=2,$j++)
{
	$k=$i+1;
	echo "<option value='http://nemo.sonarqube.org$names1[$i]'>";
	echo $names[$k];
	echo $percentages[$j];
	echo "</option>";
}
echo "</select>";
echo "</div>";
echo "</div>";
?>
<br/><br/><br/><br/>
<div id="subselect_ratio"></div>
</div>
</body>
</html>
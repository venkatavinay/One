<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
	function callfunction_linesofcode(value)
	{
		$.get("Lines_Of_Code/Lines_Of_Code_1.php?url="+value,function(text)
		{
			$('#subselect_linesofcode').html(text);
		});
	}
</script>
<?php
//include('../Simple_php/simple_html_dom.php');
$html = file_get_html('http://nemo.sonarqube.org/drilldown/measures/219971?metric=ncloc');
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

echo "<select  style=\"color:white;
	background-image:(down.png);
	background-color:green;
	border-radius:20px;
	border-radius:20px;
	border-radius:20px;
	padding-left:70px;
	width:500px;
	height:30px;\" onchange = \"callfunction_linesofcode(this.value)\">";
for($i=0,$j=0;$i<400,$j<200;$i+=2,$j++)
{
	$k=$i+1;
	echo "<option value='http://nemo.sonarqube.org$names1[$i]'>";
	echo $names[$k];
	echo $percentages[$j];
	echo "</option>";
}
echo "</select>";
?>
<br/><br/><br/><br/>
<div id="subselect_linesofcode"></div>
</html>
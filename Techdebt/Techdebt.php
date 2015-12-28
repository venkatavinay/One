<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
	function callfunction_techdebt(value)
	{
		$.get("Techdebt/Techdebt_1.php?url="+value,function(text)
		{
			$('#subselect_techdebt').html(text);
		});
	}
</script>
<?php
//include('../Simple_php/simple_html_dom.php');
$html = file_get_html('http://nemo.sonarqube.org/drilldown/measures/219971?metric=sqale_index');
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
	background-color:#99ccff;
	border-radius:20px;
	border-radius:20px;
	border-radius:20px;
	padding-left:0px;
	font-family:sans-serif;
	font-size:20px;
	font-weight:bold;
	width:500px;
	height:45px;\" onchange = \"callfunction_techdebt(this.value)\">";
echo "<option  style=\"display:none\">";
echo "All Projects Techdebt";
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
?>
<br/><br/><br/><br/>
<div id="subselect_techdebt"></div>
</html>
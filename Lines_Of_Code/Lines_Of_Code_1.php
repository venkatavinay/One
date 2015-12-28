<html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<?php
include("../Simple_php/simple_html_dom.php");
$lan = file_get_html($_GET["url"]);
$sub_directory = array();
$sub_directory_percentages = array();
$sub_directory_files = array();
$sub_directory_files_percentages = array();
$sub_directory_files_1 = array();
$sub_directory_files_1_percentages = array();

foreach($lan->find('div[id="col_0"]')as $td1)
{
	foreach ($td1->find('table[class="spaced"]')as $table2) 
	{
		foreach($table2->find('tr') as $row1)
		{
			foreach($row1->find('td')as $td11)
			{
				foreach($td11->find('a') as $a2)
				{
					$sub_directory[] = $a2;
				}
			}
			foreach($row1->find('td[class="text-right"]') as $td2)
			{
				$sub_directory_percentages[] = $td2;
			}
		}
	}
}
foreach($lan->find('td[class="spacer-left"]')as $tr1)
{
	foreach($tr1->find('div[id="col_1"]')as $td1)
	{
		foreach ($td1->find('table[class="spaced"]')as $table2) 
		{
			foreach($table2->find('tr') as $row1)
			{
				foreach($row1->find('td')as $td11)
				{
					foreach($td11->find('a') as $a2)
					{
						$sub_directory_files[] = $a2;
					}
				}
				foreach($row1->find('td[class="text-right"]') as $td2)
				{
					$sub_directory_files_percentages[] = $td2;
				}
			}
		}
	}
	foreach($tr1->find('div[id="col_2"]')as $td1)
	{
		foreach ($td1->find('table[class="spaced"]')as $table2) 
		{
			foreach($table2->find('tr') as $row1)
			{
				foreach($row1->find('td')as $td11)
				{
					foreach($td11->find('a') as $a2)
					{
						$sub_directory_files_1[] = $a2;
					}
				}
				foreach($row1->find('td[class="text-right"]') as $td2)
				{
					$sub_directory_files_percentages_1[] = $td2;
				}
			}
		}
	}
}

echo "<div style=\"width:900px;\" class=\"row\">";
echo "<div class=\"col-md-4\">";

echo "<select style=\"color:white;
	background-image:(down.png);
	background-color:green;
	border-radius:20px;
	border-radius:20px;
	border-radius:20px;
	padding-left:0px;
	width:200px;
	height:45px;\">";
echo "<option  style=\"display:none\">";
echo "Sub-Directory1";
echo "</option>";
for($l=1,$m=0;$l<=(count($sub_directory_percentages)-1)/2,$m<=count($sub_directory_percentages)-1;$l+=2,$m++)
{
	echo "<option>";
	echo $sub_directory[$l];
	echo "--------";
	echo $sub_directory_percentages[$m];
	echo "</option>";
}
echo "</select>";
echo "</div>";
echo "<div class=\"col-md-4\">";
echo "<select style=\"color:white;
	background-image:(down.png);
	background-color:green;
	border-radius:20px;
	border-radius:20px;
	border-radius:20px;
	padding-left:0px;
	width:200px;
	height:45px;\">";
echo "<option  style=\"display:none\">";
echo "Sub-Directory2";
echo "</option>";
for($l=1,$m=0;$l<=(count($sub_directory_files_percentages)-1)/2,$m<=count($sub_directory_files_percentages)-1;$l+=2,$m++)
{
	echo "<option>";
	echo $sub_directory_files[$l];
	echo "--------";
	echo $sub_directory_files_percentages[$m];
	echo "</option>";
}
echo "</select>";
echo "</div>";
echo "<div class=\"col-md-4\">";
echo "<select style=\"color:white;
	background-image:(down.png);
	background-color:green;
	border-radius:20px;
	border-radius:20px;
	border-radius:20px;
	padding-left:0px;
	width:200px;
	height:45px;\">";
echo "<option  style=\"display:none\">";
echo "Sub-Directory3";
echo "</option>";
for($l=1,$m=0;$l<=(count($sub_directory_files_percentages_1)-1)/2,$m<=count($sub_directory_files_percentages_1)-1;$l+=2,$m++)
{
	echo "<option>";
	echo $sub_directory_files_1[$l];
	echo "--------";
	echo $sub_directory_files_percentages_1[$m];
	echo "</option>";
}
echo "</select>";
echo "</div>";
echo "</div>"
?>
</div>
</body>
</html>

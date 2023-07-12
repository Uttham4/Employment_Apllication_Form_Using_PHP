<!DOCTYPE html>
<html>
	<head>
		<title>PHP Form</title>
		<meta charset="utf-8">
		<style>
		.error{
			color: red;
		}
		</style>
	</head>
	
<body>
<?php
$name=$website=$position=$experience=$estatus=$comments="";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
	if (empty($_POST["name"])){
			echo "<span class=\"error\">Error: First Name Required</span>";
		}elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])){
			echo "<span class=\"error\">Error: Name can only contain letters</span>";
		}elseif (empty($_POST["website"])){
			echo "<span class=\"error\">Error: Website is Required</span>";
		}elseif (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+4\/=?~_\!:,.;]*[-a-z0-9+4\/=~_|]/i",$_POST["website"])){
			echo "<span class=\"error\">Error: Website is in wrong format</span>";
		}else {

			$name=val($_POST["name"]);
			$website=val($_POST["website"]);
			$position=val($_POST["position"]);
			$experience=val($_POST["experience"]);
			$estatus=val($_POST["estatus"]);
			$comments=val($_POST["comments"]);
	}
}
function val($data){
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}

?>
<form name="Employment" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<table width="600" borde="0" cellspacing="1" cellpadding="1">
		<tr>
			<td><h2>Employment Apllication</h2></td>
			<td></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" maxlength="50" /></td>
		</tr>
		<tr>
			<td>Website</td>
			<td><input type="text" name="website" maxlength="50" /></td>
		</tr>
		<tr>
			<td>Position</td>
			<td>
				<select name="position">
					<option value="Accountant">Accountant</option>
					<option value="Receptionist">Receptionist</option>
					<option value="Administrator">Administrator</option>
					<option value="Supervisor">Supervisor</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Experience Level</td>
			<td>
				<select name="experience">
					<option value="Entry level">Entry Level</option>
					<option value="Some Experiance">Some Experiance</option>
					<option value="Entry level">Very Experienced</option>
				</select>
			</td>
		<tr>
		<tr>
			<td>Employment Status</td>
			<td>
				<input type="radio" name="estatus" value="Employed" checked />Employed
				<input type="radio" name="estatus" value="Unemployed">Unemployed
				<input type="radio" name="estatus" value="Student">Student
			</td>
		</tr>
		<tr>
			<td>Additional Comments</td>
			<td>
			<textarea name="comments" cols="45" rows="5"></textarea>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" name="submit" value="submit" />
			<input type="reset" name="reset" value="reset" />
			</td>
		</tr>
	</table>
</form>
<?php
	echo "<h2>User Input Details:</h2>";
	echo "Name : " . $name;
	echo "<br>";
	echo "Website : " . $website;
	echo "<br>";
	echo "Position : " . $position;
	echo "<br>";
	echo "Experience : " . $experience;
	echo "<br>";
	echo "Employment Status : " . $estatus;
	echo "<br>";
	echo "Comments : " . $comments;
	echo "<br>";

?>
</body>
</html>
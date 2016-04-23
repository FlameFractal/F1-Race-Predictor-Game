<html>
<head>

	<title>Predict the Winner</title>
	<link type="text/css" rel="stylesheet" href="../css/prediction_style.css"/>
</head>

<body>
	<div id="practice_sessions">
		<ul>
			<li>
				<button id="btn1" onclick="f(event)">
					Leaderboard
				</button>
			</li>
			<li>
				<button id="btn2" onclick="f(event)">
					Scores of all games
				</button>
			</li>
		</ul>
	</div> 
	

	<?php
	session_start();
	$user_name = $_SESSION['user_name'];
	if(!$user_name) {
		header("Location:index.php");
	}
	$server="localhost";
	$username="root";
	$password="tiger";
	$database="dbms";
	
	$conn=mysqli_connect($server,$username,$password,$database);

	$query1='select `user_name` ,  `total_points` from users order by total_points desc;';
	$query2='select p.user_name, g.gp_name, p.points from gp g inner join points p on p.gp_id=g.gp_id order by `gp_name`;';


	$res1=mysqli_query($conn,$query1);
	$res2=mysqli_query($conn,$query2);

	echo '<div id="leaderboard" style="visibility:hidden"> <div id="practice_table">';
	echo "<table id=\"p1\"> <thead>
	<th>UserName</th>
	<th>Total Points</th>
</thead>";

while ($data=$res1->fetch_assoc()) {
	echo "<tbody>
	<tr>
		<td>".$data['user_name']."</td>
		<td>".$data['total_points']."</td>
	</tr>";
}	
echo "
</tbody>
</table> </div> </div>";




echo '<div id="scores" style="visibility:hidden"> <div id="practice_table">';
echo "<table id=\"p1\"> <thead>
<th>UserName</th>
<th>GP Name</th>
<th>Points</th>
</thead>";

while ($data2=$res2->fetch_assoc()) {
	echo "<tbody>
	<tr>
		<td>".$data2['user_name']."</td>
		<td>".$data2['gp_name']."</td>
		<td>".$data2['points']."</td>
	</tr>";
}	
echo "
</tbody>
</table> </div> </div>";







?>






<script type="text/javascript">
	function f(event) {
		var e = document.getElementsByTagName("button");

		if (Object.is(event.target,e[0])) {
			document.getElementById("leaderboard").style.visibility="visible";
			document.getElementById("scores").style.visibility="hidden";
			document.getElementById("btn1").style.backgroundColor="black";
			document.getElementById("btn2").style.backgroundColor="transparent";
		}
		else if(Object.is(event.target,e[1])){
			document.getElementById("leaderboard").style.visibility="hidden";
			document.getElementById("scores").style.visibility="visible";	
			document.getElementById("btn1").style.backgroundColor="transparent";
			document.getElementById("btn2").style.backgroundColor="black";
		}
	}
</script>


</body>
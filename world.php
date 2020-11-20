<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = (isset($_GET['country']) ? $_GET['country']:null);
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if (isset($country)==true && isset($_GET['context'])==false){
	$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

	echo "<table><tr><th>Name</th><th>Continent</th><th>Independence</th><th>Head of State</th></tr>";
	  
	foreach ($results as $row){

		echo "<tr><td>" .$row['name']."</td><td>".$row['continent']."</td><td>".$row['independence_year']."</td><td>".$row['head_of_state']."</td></tr>";
		 	} 
		 echo "</table>";

	}elseif(isset($country)==true && isset($_GET['context'])==true){

		$stmt= $conn->query("SELECT c.name as city, c.district, c.population FROM cities c JOIN countries cs ON c.country_code=cs.code WHERE cs.name LIKE '%$country%'");
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

				echo "<table><tr><th>Name</th><th>District</th><th>Population</th></tr>";

	foreach ($results as $row){
		echo "<tr><td>".$row['city']."</td><td>".$row['district']."</td><td>".$row['population']."</td></tr>";
	}

	echo "</table";
}

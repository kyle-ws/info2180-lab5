
<?php

header('Access-Control-Allow-Origin: *');

$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$country= trim(filter_var($_GET['country'], FILTER_SANITIZE_STRING));
$city= trim(filter_var($_GET['lookup'], FILTER_SANITIZE_STRING));
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");

$cities=$conn->query("SELECT cities.name, cities.district,cities.population FROM countries LEFT JOIN cities ON countries.code = cities.country_code WHERE countries.name LIKE '%$country%'");

$cityResults =$cities->fetchAll(PDO::FETCH_ASSOC);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>




<?php if (isset($country)&&($city=="")): ?>
    <table>
      <tr>
        <th> Name</th>
        <th> Continent</th>
        <th> Independence Year</th>
        <th> Head of State</th>
      </tr>
  
      <tbody>
      <?php foreach ($results as $location): ?>
        <tr>
          <td> <?= $location["name"]; ?></td>
          <td> <?= $location["continent"]; ?></td>
          <td> <?= $location["independence_year"]; ?></td>
          <td> <?= $location["head_of_state"]; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>

    <?php if(($city!= "")): ?>
      <table>
        <tr>
        <th> Name</th>
        <th> District</th>
        <th> Population</th>
        
      </tr>

      <tbody>
        <?php foreach ($cityResults as $area): ?>
          <tr>
            <td> <?= $area['name']; ?></td>
            <td> <?= $area['district']; ?></td>
            <td> <?= $area['population']; ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
<?php endif ?><?php
$host = 'localhost';
$username = 'lab5_user';
$password = '';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>

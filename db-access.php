<?php
function connectToDB(string $db): PDO
{
  $host = 'db';
  $charset = 'utf8mb4';
  $user = 'root';
  $pass = 'password';

  $dataSourceName = "mysql:host=$host;dbname=$db;charset=$charset";

  $options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
  ];

  try {
    $dbConnection = new PDO($dataSourceName, $user, $pass, $options);
  } catch (PDOException $excptn) {
    throw new PDOException($excptn->getMessage(), (int)$excptn->getCode());
  }

  return $dbConnection;
}

/**
* @param PDO $dbConnection The database connection.
* @param string $sql An SQL statement.
* @param array|null $params [Optional] An associative array of parameters to
*                           be bound to named parameters.
* @return array Rows from the database.
**/

function fetchAll(PDO $dbConnection, string $sql, array $params = null): array
{
  $query = $dbConnection->prepare($sql);

  $query->execute($params);

  return $query->fetchAll();
}

function runSQL(PDO $dbConnection, string $sql, array $params = null): void
{
  $query = $dbConnection->prepare($sql);

  $query->execute($params);
}

function fetchAllWines(PDO $dbConnection): array
{
  $sql = 'SELECT `wines`.`id`, `wines`.`name`, `wines`.`blurb`, `wines`.`producer`, `wines`.`image`, `colour`.`colour`, `grape`.`grape`, `region_country`.`region`, `region_country`.`country`
  FROM `wines`
       JOIN `junc_colour`
       ON `wines`.`id` = `junc_colour`.`wines_id`
       JOIN `colour`
       ON `junc_colour`.`colour_id` = `colour`.`id`
       JOIN `junc_grape`
       ON `wines`.`id` = `junc_grape`.`wines_id`
       JOIN `grape`
       ON `junc_grape`.`grape_id` = `grape`.`id`
       JOIN `junc_region`
       ON `wines`.`id` = `junc_region`.`wines_id`
       JOIN `region_country`
       ON `junc_region`.`region_id` = `region_country`.`id`
       ORDER BY `wines`.`id`;';

  return fetchAll($dbConnection, $sql);
}

?>
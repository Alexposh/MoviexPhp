<?php 
header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json; charset=UTF-8"); 
include 'db_connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'GET') { 
    // $query = "SELECT * FROM movie LIMIT 10"; 
    // $result = $conn->query($query); 
    // $data = array(); 
    // while ($row = $result->fetch_assoc()) { 
    //     $data[] = $row; 
    //     } 
    //    echo json_encode($data); 
       $amount = isset($_GET['amount']) ? $_GET['amount'] : '';
       $table = isset($_GET['table']) ? $_GET['table'] : '';
       $table1 = isset($_GET['table1']) ? $_GET['table1'] : '';
       $table2 = isset($_GET['table2']) ? $_GET['table2'] : '';
       $criteria = isset($_GET['criteria']) ? $_GET['criteria'] : '';


    //    echo ($numberOfMovies);
       
    function getData($conn, $table, $amount) {     
        $query = "SELECT * FROM {$table} LIMIT {$amount}";
        $result = $conn->query($query); 
        $data = array(); 
        while ($row = $result->fetch_assoc()) { 
            $data[] = $row;
        } 
    return $data; 
    } 

    function getDataPdo($pdo, $table, $amount) {
        $stmt = $pdo->query("SELECT * FROM {$table} LIMIT {$amount}"); 
        $data = array(); 
        while ($row = $stmt->fetch()) { 
            $data[] = $row;
        } 
        return $data;
    }

    function getJoinedTables($pdo, $table1, $table2, $criteria, $amount) {
        $stmt = $pdo->query("SELECT * FROM {$table1} join {$table2} on {$table1}.{$criteria} = {$table2}.{$criteria} limit {$amount};");
        $data = array(); 
        while ($row = $stmt->fetch()) { 
            $data[] = $row;
        } 
        return $data;
    }
    // $stmt = $pdo->query("SELECT * FROM {$table} LIMIT {$amount}");  
    // while ($row = $stmt->fetch()) {                                                 
    //     echo $row['column_name'] . "\n"; 
    // }
       
    // $movies = getDataPdo($pdo, $table, $amount); join {$table2} on {$table1}.{$criteria} = {$table2}.{$criteria};
    if (isset($_GET['table'])) {
        $data = getDataPdo($pdo, $table, $amount);
    } 
    if (isset($_GET['table1']) && isset($_GET['table2']) && isset($_GET['criteria'])) { 
        $data = getJoinedTables($pdo, $table1, $table2, $criteria, $amount);
    }
    // $roles = getJoinedTables($pdo, $table1, $table2, $criteria, $amount);

    // echo json_encode($roles); 
    // echo (isset($_GET['table']));
    // $conn->close();
    echo json_encode($data);
} 
?>
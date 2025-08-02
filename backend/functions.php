<?php
function connect() {
    $host = "localhost";
    $db   = "wine_webshop";
    $user = "root";
    $pass = "";
    $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,  // hibakezelés kivétellel
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,        // lekérdezésekhez asszociatív tömb
        PDO::ATTR_EMULATE_PREPARES   => false,                   // natív prepared statementek használata
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        error_log("Adatbázis hiba: " . $e->getMessage());
        echo "Hiba történt az adatbáziskapcsolat során.";
        exit;
    }
}


function get_product_data($productID, $field) {
    $allowed = ['productID','product_name','vintage','alcohol_content','size','country','wine_region','sweetness','type','color','variety','image','description','stock','price'];

    if (!in_array($field, $allowed)) {
        throw new InvalidArgumentException("Invalid field: $field");
    }

    $db = connect();
    $stmt = $db->prepare("SELECT `$field` FROM products WHERE productID = ?");
    $stmt->execute([$productID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row[$field] ?? null;
}

?>
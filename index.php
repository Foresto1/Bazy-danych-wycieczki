<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "egzamin";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Zapytanie SQL
$sql = "SELECT dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = 1";
$result = $conn->query($sql);

 "<!DOCTYPE html>
<html lang='pl'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Wycieczki</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Dostępne wycieczki</h1>";

if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>Data Wyjazdu</th>
                    <th>Cel</th>
                    <th>Cena (PLN)</th>
                </tr>
            </thead>
            <tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['dataWyjazdu']) . "</td>
                <td>" . htmlspecialchars($row['cel']) . "</td>
                <td>" . htmlspecialchars($row['cena']) . "</td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>Brak dostępnych wycieczek.</p>";
}

echo "</body>
</html>";

$conn->close();
?>

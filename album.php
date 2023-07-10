


<?php
// Veritabanı bağlantısı için gerekli bilgileri girin
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Veritabanı bağlantısını oluştur
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız oldu: " . $conn->connect_error);
}

// Fotoğrafları veritabanından sorgula
$sql = "SELECT * FROM album";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Fotoğraf Albümü</title>
</head>
<body>
    <h2>Album sayfasına hosgeldiniz</h2><br><hr>

    <?php
    // Fotoğrafları döngüleyerek listeleyin
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // $photoName = $row["name"];
            // $photoDescription = $row["description"];
            $photoFilePath = $row["img_url"];

            // echo "<h2>$photoName</h2>";
            // echo "<p>$photoDescription</p>";
            echo "<div>";
            echo "<img src='$photoFilePath' alt='$photoFilePath'>";
            echo "</div>";
        }
    } else {
        echo "Fotoğraf bulunamadı.";
    }

    // Veritabanı bağlantısını kapat
    $conn->close();
    ?>

</body>
</html>

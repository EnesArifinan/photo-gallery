

<title>Admin</title>
<body>
    <style>
        body {
            box-sizing: border-box;
        }
        #form-img {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            justify-content: center;
            border: 2px solid rgb(0, 0, 0);
            padding: 60px;
            border-radius: 10px;
        }
        form,
        div {
            margin-top: 20px;
            padding: 10px;
        }
        #ilk{
            border: 2px solid black;
            border-radius: 5px;
            margin-left: 5px;
            padding: 5px;
        }
        

    </style>
    <h2>Admin panele hoşgeldiniz</h2><br><hr>
    <div align="center" id="form-img">
        <p>Hoşgeldiniz Galeriye yüklemek istediğiniz fotğrafı ve alakali olduğu secenegi seçin!</p>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="photo">
            <input type="submit" value="Gönder">
            <!-- <div class="btn btn-primary">
                <label for="imageUpload">Fotğrafı seç:</label>
                <input type="file" name="photo" id="imageUpload">
            </div>
            <div class="btn btn-primary">
                <label for="postTitle">Post Title</label>
                <input id="ilk" type="text">
            </div>
            <div class="btn btn-primary">
                <label for="selectOption">Alanı seç:</label>
                <select name="first-one" id="ilk">
                    <option value="test">test 1</option>
                    <option value="test">test 2</option>
                    <option value="test">test 3</option>
                    <option value="test">test 4</option>
                    <option value="test">test 5</option>
                </select>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="Upload">
            </div> -->

        </form>
        
    </div> 
</body>
<script>
    // fotoraflrın gönderildiği adına geri bildirim
    document.getElementById("form-img").addEventListener("submit", () =>{
        alert("Başarıyla gönderildi.")
    })
</script>

</html>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_FILES["photo"])) {
            $photo = $_FILES["photo"];
            
            // Fotoğrafın geçici yükleme adresi
            $tempFilePath = $photo["tmp_name"];
        
            // Fotoğrafın orijinal adı
            $orijinalFileName = $photo["name"];
        
            // Fotoğrafın kaydedileceği dizin
            $targetDirectory = "uploads/";
        
            $newFileName = uniqid() . "_THE_ENES_" . $orijinalFileName;
        
            // Hedef dizine taşı ve yeni dosya adıyla kaydet
            $targetFilePath = $targetDirectory.$newFileName;
            move_uploaded_file($tempFilePath, $targetFilePath);
        
            // ? Fotoğraf başarıyla yüklendi
        
            // ! DATABASE
        
            // Veritabanı bağlantısı için gerekli bilgiler
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";
        
            $connection = new mysqli($servername, $username, $password, $dbname);
        
            if ($connection->connect_error) {
                die("Veritabanı bağlantısı başarısız: " . $connection->connect_error);
            }
        
            // SQL ifadesini hazırla ve parametreli bir sorgu kullanarak
            $sql = "INSERT INTO album (img_url) VALUES (?)";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("s", $targetFilePath); // "s" bir dize parametresini gösterir
        
            // Hazırlanan ifadeyi çalıştır
            if ($stmt->execute()) {
                // Veri başarıyla eklendi
            } else {
                // Veri eklenirken hata oluştu
            }
        
            // Hazırlanan ifadeyi ve veritabanı bağlantısını kapat
            $stmt->close();
            $connection->close();
        }
        


        // Tekrardan aynı sayfaya yönlendirme
        header("Location: admin.php");
        exit();
        
    }
?>
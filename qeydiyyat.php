<?php
include 'db.php';

if(isset($_POST['ad'])){
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $email = $_POST['email'];
    $tedbir_id = $_POST['tedbir_id'];

    // 1. Tələbəni əlavə edirik
    $stmt = $conn->prepare("INSERT INTO istirakchilar (ad, soyad, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $ad, $soyad, $email);

    if($stmt->execute()) {
        $yeni_id = $stmt->insert_id; 

        // 2. Tələbəni tədbirə bağlayırıq
        $stmt2 = $conn->prepare("INSERT INTO qeydiyyat (tedbir_id, istirakchi_id) VALUES (?, ?)");
        $stmt2->bind_param("ii", $tedbir_id, $yeni_id);

        if($stmt2->execute()) {
            echo "<h2 style='color:green; text-align:center; font-family:sans-serif; margin-top:50px;'>Təbriklər! Qeydiyyat uğurla tamamlandı!</h2>";
            echo "<div style='text-align:center; margin-top:20px;'><a href='index.html' style='padding:10px 20px; background:#0056b3; color:white; text-decoration:none; border-radius:5px; font-family:sans-serif;'>Ana səhifəyə qayıt</a></div>";
        } else {
            echo "Xəta: " . $conn->error;
        }
        $stmt2->close();
    } else {
        echo "<h3 style='color:red; text-align:center; font-family:sans-serif; margin-top:50px;'>Xəta: Bu email artıq qeydiyyatdan keçib!</h3>";
    }
    $stmt->close();
}
$conn->close();
?>
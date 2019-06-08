<?php

    $targ_dir = "upload/";
    
    $extensions_arr = array("jpg","jpeg","png");
    
    $all_files = count($_FILES['files']['tmp_name']);

    for ($i = 0; $i < $all_files; $i++) {
        $targ_file = $targ_dir . basename($_FILES['files']['name'][$i]);
        $imgType = strtolower(pathinfo($targ_file,PATHINFO_EXTENSION));

        if (in_array($imgType, $extensions_arr)) {
            $img_base64 = base64_encode(file_get_contents($_FILES['files']['tmp_name'][$i]));
            $img = 'data:image/'.$imgType.';base64,'.$img_base64;
            try {
                $sql = "INSERT INTO img (image, userId) VALUES (:img, :userId)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':img' => $img,
                    ':userId' => $_SESSION['id']
                ]);
            } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            header("Location: " . WWW_ROOT . "/pages/photo.php");
            // move_uploaded_file($_FILES['files']['tmp_name'][$i], $targ_file);
        }
    }  
?>
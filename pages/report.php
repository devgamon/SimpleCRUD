<?php include('../conn.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Studies | Relatórios</title>
    <link rel="stylesheet" href="../styles/report.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <div class="card-container">
        <div class="title-box">
            <h2 class="title">Usuários Registrados</h2>
        </div>

        <?php

            $sql = "SELECT * FROM tb_usuario";
            $stmt = $pdo->prepare($sql);

            try {
                $stmt->execute();
                $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Erro na consulta: " . $e->getMessage();
                die();
            }

            foreach ($users as $user) {
                echo '
                <div class="card">
                    <div class="card-header">
                        <h2>Registro</h2>
                        <h2 id="cd">' . $user['cd_usuario'] . '</h2>
                    </div>
                    <div class="card-data">
                        <p>' . $user['nm_usuario'] . '</p>
                        <p>' . $user['em_usuario'] . '</p>
                    </div>
                    <div class="card-action">
                        <button class="btn-action" id="btn-edit"><i class="uil uil-edit-alt"></i></button>
                        <button class="btn-action" id="btn-delete"><i class="uil uil-trash-alt"></i></button>
                    </div>
                </div>
                ';
            }
            
        ?>
    
    </div>
</body>
</html>
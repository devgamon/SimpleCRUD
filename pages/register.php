<?php include("../conn.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDO Studies | Cadastrar</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../styles/register.css">
</head>
<body>
    <main class="container">
        <form method="POST"> 
            <div class="title-box">
                <h2 class="title">Cadastrar Usuários</h2>
            </div>
            <div class="input-container">
                <div class="input-box">
                    <label for="nm_usuario">Nome do Usuário</label>
                    <input type="text" name="nm_usuario" id="nm_usuario" placeholder="ex: Neymar Junior">
                </div>
                <div class="input-box">
                    <label for="em_usuario">Email do Usuário</label>
                    <input type="email" name="em_usuario" id="em_usuario" placeholder="ex: neymarjr@gmail.com">
                </div>                
            </div>

            <div class="btn-box">
                <button name="submit" class="btn">Enviar</button>
            </div>
        </form>
    </main>
</body>
</html>

<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $nm_usuario = $_POST['nm_usuario'];
        $em_usuario = $_POST['em_usuario'];

        if (empty($nm_usuario) || empty($em_usuario)) {
            echo "<script>
                    const mensagem = 'Nenhum dado foi inserido, tente novamente.';
                    alert(mensagem);
                    history.back();
                </script>";
            exit();
        }

        try {
            $sql = "INSERT INTO tb_usuario (nm_usuario, em_usuario) VALUES (:nm_usuario, :em_usuario)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nm_usuario', $nm_usuario);
            $stmt->bindParam(':em_usuario', $em_usuario);
            $stmt->execute();

            echo "<script>
                    const cadastrarNovamente = confirm('Cadastro realizado com sucesso! Deseja realizar outro cadastro?');
                    if (cadastrarNovamente) {
                        location.href = 'register.php';
                    } else {
                        location.href = '../index.html';
                    }
                </script>";
            exit();
        } catch (PDOException $e) {
            echo "Erro no cadastro: " . $e->getMessage();
        }
    }

?>
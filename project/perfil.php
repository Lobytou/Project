<?php
    include_once('connect.php');
    session_start();
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $nome = mysqli_query($conn,"SELECT * FROM registo WHERE email = '$email' and senha = md5('$senha')");
    $linha = mysqli_fetch_assoc($nome);
    
    $_SESSION['nome'] = $linha['nome'];
    //$nome = $conn->mysqli_query($selectnome);
    
    
    //$query = sprintf("SELECT nome,sobrenome FROM registo WHERE email = '$email' and senha = '$senha'");
    //$dados = mysqli_query($query, $conn) or die(mysqli_error());
    //$linha = mysqli_fetch_assoc($dados);
    //$_SESSION['nome'] = $linha['nome'];
    //print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        header('Location:login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, rgb(0, 150, 200), rgb(0, 255, 255));
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>
<body>
    <header class="has-background-primary" style="padding: 1rem;">
        <div class="container">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <a href="principal.php">
                        <h1 class="title is-1 has-text-white">Rental Car</h1>
                        </a>
                    </div>
                </div>
                <div class="level-left">
                    <div class="level-item">
                        <nav class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    <a href="alugar.php" class="button is-light">Alugar carro</a>
                                </div>
                                <div class="level-item">
                                    <a href="reservas.php" class="button is-light">Minhas reservas</a>
                                </div>
                                <div class="level-item">
                                    <a href="perfil.php" class="button is-light">Perfil</a>
                                </div>
                                <div class="level-item">
                                </div>
                                <div class="level-item">
                                </div>
                            </div>
                            <div class="level-right">
                                <div class="level-item">
                                    <a href="login.php" class="button is-light">Sair</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Meu perfil, <?php echo $linha['nome']; ?>!
                </h1>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="content has-text-centered">
            <p>&copy; 2024 - Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
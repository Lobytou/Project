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
    if(isset($_POST['submit']) && !empty($_POST['pickupTime']) && !empty($_POST['dropoffTime'])){
        $pDate = $_POST['pickupDate'];
        $pTime = $_POST['pickupTime'];
        $dDate = $_POST['dropoffDate'];
        $dTime = $_POST['dropoffTime'];
        $veiculo = $_POST['veiculo'];
        echo"<br>";
        print_r($_POST['pickupDate' ]);
        print_r($_POST['pickupTime']);
        echo"<br>";
        print_r($_POST['dropoffDate' ]);
        print_r($_POST['dropoffTime']);
        $result = mysqli_query($conn, "INSERT INTO reserva(email,veiculo,pickupDate,pickupTime,dropoffDate,dropoffTime) VALUES ('$email','$veiculo','$pDate','$pTime','$dDate','$dTime')");
        header('Location:reservas.php');
        //exit();
    }
?>
<script>
</script>
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
        .abc{
            background-color: rgba(0, 0, 0, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
        input{
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
        }
        button{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            
        }
        button:hover{
            background-color: deepskyblue;
            cursor: pointer;
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
                <div class="abc">
                    <form action="" method="POST">
                        <h1 style="font-size: 30px;">Reservar</h1><br>
                        <label for="veiculo">Modelo do veiculo:</label><br>
                        <select name="veiculo" id="veiculo" aria-label="Modelo do veiculo">
                            <option value="czinger" data-key="czinger">Czinger 21C</option>
                            <option value="drako" data-key="drako">Drako GTE</option>
                            <option value="tomaso" data-key="tomaso">Tomaso P72</option>
                            <option value="ferrari" data-key="ferrari">Ferrari LaFerrari</option>
                            <option value="pagani" data-key="pagani">Pagani Huayra</option>
                            <option value="mclaren" data-key="mclaren">McLaren Elva</option>
                        <select><br><br>
                        <label for="pickupDate">Data de levantamento:</label><br>
                        <input type="date" name="pickupDate" id="pickupDate" required><br>
                        <select name="pickupTime" id="pickupTime" aria-label="Hora de Levantamento">
                            <option value="00:00" data-key="00:00">00:00</option>
                            <option value="00:30" data-key="00:30">00:30</option>
                            <option value="01:00" data-key="01:00">01:00</option>
                            <option value="01:30" data-key="01:30">01:30</option>
                            <option value="02:00" data-key="02:00">02:00</option>
                            <option value="02:30" data-key="02:30">02:30</option>
                            <option value="03:00" data-key="03:00">03:00</option>
                            <option value="03:30" data-key="03:30">03:30</option>
                            <option value="04:00" data-key="04:00">04:00</option>
                            <option value="04:30" data-key="04:30">04:30</option>
                            <option value="05:00" data-key="05:00">05:00</option>
                            <option value="05:30" data-key="05:30">05:30</option>
                            <option value="06:00" data-key="06:00">06:00</option>
                            <option value="06:30" data-key="06:30">06:30</option>
                            <option value="07:00" data-key="07:00">07:00</option>
                            <option value="07:30" data-key="07:30">07:30</option>
                            <option value="08:00" data-key="08:00">08:00</option>
                            <option value="08:30" data-key="08:30">08:30</option>
                            <option value="09:00" data-key="09:00">09:00</option>
                            <option value="09:30" data-key="09:30">09:30</option>
                            <option value="10:00" data-key="10:00">10:00</option>
                            <option value="10:30" data-key="10:30">10:30</option>
                            <option value="11:00" data-key="11:00">11:00</option>
                            <option value="11:30" data-key="11:30">11:30</option>
                            <option value="12:00" data-key="12:00">12:00</option>
                            <option value="12:30" data-key="12:30">12:30</option>
                            <option value="13:00" data-key="13:00">13:00</option>
                            <option value="13:30" data-key="13:30">13:30</option>
                            <option value="14:00" data-key="14:00">14:00</option>
                            <option value="14:30" data-key="14:30">14:30</option>
                            <option value="15:00" data-key="15:00">15:00</option>
                            <option value="15:30" data-key="15:30">15:30</option>
                            <option value="16:00" data-key="16:00">16:00</option>
                            <option value="16:30" data-key="16:30">16:30</option>
                            <option value="17:00" data-key="17:00">17:00</option>
                            <option value="17:30" data-key="17:30">17:30</option>
                            <option value="18:00" data-key="18:00">18:00</option>
                            <option value="18:30" data-key="18:30">18:30</option>
                            <option value="19:00" data-key="19:00">19:00</option>
                            <option value="19:30" data-key="19:30">19:30</option>
                            <option value="20:00" data-key="20:00">20:00</option>
                            <option value="20:30" data-key="20:30">20:30</option>
                            <option value="21:00" data-key="21:00">21:00</option>
                            <option value="21:30" data-key="21:30">21:30</option>
                            <option value="22:00" data-key="22:00">22:00</option>
                            <option value="22:30" data-key="22:30">22:30</option>
                            <option value="23:00" data-key="23:00">23:00</option>
                            <option value="23:30" data-key="23:30">23:30</option>
                        </select>
                        <br><br>
                        <label for="dropoffDate">Data de devolvimento:</label><br>
                        <input type="date" name="dropoffDate" id="dropoffDate" required><br>
                        <select name="dropoffTime" id="dropoffTime" aria-label="Hora de Devolvimento">
                            <option value="00:00" data-key="00:00">00:00</option>
                            <option value="00:30" data-key="00:30">00:30</option>
                            <option value="01:00" data-key="01:00">01:00</option>
                            <option value="01:30" data-key="01:30">01:30</option>
                            <option value="02:00" data-key="02:00">02:00</option>
                            <option value="02:30" data-key="02:30">02:30</option>
                            <option value="03:00" data-key="03:00">03:00</option>
                            <option value="03:30" data-key="03:30">03:30</option>
                            <option value="04:00" data-key="04:00">04:00</option>
                            <option value="04:30" data-key="04:30">04:30</option>
                            <option value="05:00" data-key="05:00">05:00</option>
                            <option value="05:30" data-key="05:30">05:30</option>
                            <option value="06:00" data-key="06:00">06:00</option>
                            <option value="06:30" data-key="06:30">06:30</option>
                            <option value="07:00" data-key="07:00">07:00</option>
                            <option value="07:30" data-key="07:30">07:30</option>
                            <option value="08:00" data-key="08:00">08:00</option>
                            <option value="08:30" data-key="08:30">08:30</option>
                            <option value="09:00" data-key="09:00">09:00</option>
                            <option value="09:30" data-key="09:30">09:30</option>
                            <option value="10:00" data-key="10:00">10:00</option>
                            <option value="10:30" data-key="10:30">10:30</option>
                            <option value="11:00" data-key="11:00">11:00</option>
                            <option value="11:30" data-key="11:30">11:30</option>
                            <option value="12:00" data-key="12:00">12:00</option>
                            <option value="12:30" data-key="12:30">12:30</option>
                            <option value="13:00" data-key="13:00">13:00</option>
                            <option value="13:30" data-key="13:30">13:30</option>
                            <option value="14:00" data-key="14:00">14:00</option>
                            <option value="14:30" data-key="14:30">14:30</option>
                            <option value="15:00" data-key="15:00">15:00</option>
                            <option value="15:30" data-key="15:30">15:30</option>
                            <option value="16:00" data-key="16:00">16:00</option>
                            <option value="16:30" data-key="16:30">16:30</option>
                            <option value="17:00" data-key="17:00">17:00</option>
                            <option value="17:30" data-key="17:30">17:30</option>
                            <option value="18:00" data-key="18:00">18:00</option>
                            <option value="18:30" data-key="18:30">18:30</option>
                            <option value="19:00" data-key="19:00">19:00</option>
                            <option value="19:30" data-key="19:30">19:30</option>
                            <option value="20:00" data-key="20:00">20:00</option>
                            <option value="20:30" data-key="20:30">20:30</option>
                            <option value="21:00" data-key="21:00">21:00</option>
                            <option value="21:30" data-key="21:30">21:30</option>
                            <option value="22:00" data-key="22:00">22:00</option>
                            <option value="22:30" data-key="22:30">22:30</option>
                            <option value="23:00" data-key="23:00">23:00</option>
                            <option value="23:30" data-key="23:30">23:30</option>
                        </select>
                        <br><br>
                        <button type="submit" name="submit" id="submit">Enviar</button>
                    </form>
                </div>
            </div>
            <div>
                
            </div>
        </div>
        
    </section>
    <div>
        <footer style="size: 10px;" class="footer">
            <div class="content has-text-centered">
                <p>&copy; 2024 - Todos os direitos reservados.</p>
            </div>
        </footer>
    </div>
</body>
</html>
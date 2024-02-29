<?php
    include_once('connect.php');
    if(isset($_SESSION)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
    }
    
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nome = mysqli_query($conn,"SELECT * FROM registo WHERE email = '$email' and senha = md5('$senha')");
        $linha = mysqli_fetch_assoc($nome);
        print($linha);
        if(isset($_POST['submit']) && !empty($linha))
        {
            
            session_start();
                
            //echo"<br>";
            //print_r($_POST['email']);
            //echo"<br>";
            //print_r($_POST['senha']);
                
            $email = $_POST['email'];
            $senha = $_POST['senha'];
                
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;

            $sql = "SELECT * FROM registo WHERE email = '$email' and senha = md5('$senha')";
            $result = $conn->query($sql);

            //print_r($sql);
            //print_r($result);
            header('Location:principal.php');
        }else{
            header('Location:login.php');
            $msg_erro = "pass inválida";
        }
    }
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg, rgb(0, 150, 200), rgb(0, 255, 255));
        }
        div{
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
</head>
<body>
    <div>
		<form action="" method="POST">
            <?php 
            if(isset($msg_erro))
                echo "<center><h4 id='alerta' style='color:red'>$msg_erro</h4>"
            ?>
            <h1>Login</h1></center>
            <input type="text" name="email" id="email" placeholder="Email"required>
            <label for="email"></label>
            <br><br>
            <input type="password" name="senha" id="senha" placeholder="Senha"required>
            <label for="senha"></label>
            <br><br>
            <button type="submit" name="submit" id="submit">Enviar</button>
        </form>
        <center><p> Não tem conta registada?<p></center>
        <a href="registo.php"><button>Registar-se</button></a>
    </div>
    <script src="script.js"></script>
</body>
</html>
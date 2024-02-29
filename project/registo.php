<?php
    if(isset($_SESSION)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
    }
	if(isset($_POST['submit']))
	{
        /*
        echo "<p>sucesso<p><br>";
		print_r($_POST['nome']);
        echo"<br>";
		print_r($_POST['sobrenome']);
        echo"<br>";
		print_r($_POST['email']);
        echo"<br>";
		print_r($_POST['senha']);
        */
        
        include_once('connect.php');
        session_start();
        
        
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        
        $result = mysqli_query($conn, "INSERT INTO registo(nome,sobrenome,email,senha) VALUES ('$nome','$sobrenome','$email',md5('$senha'))");
        header('location:principal.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de registo</title>
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
		<form action="registo.php" method="POST">
            <h1>Registo</h1>
            <input type="text" name="nome" id="nome" placeholder="nome"required>
            <label for="nome"></label>
            <br><br>
            <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome"required>
            <label for="sobrenome"></label>
            <br><br>
            <input type="text" name="email" id="email" placeholder="Email"required>
            <label for="email"></label>
            <br><br>
            <input type="password" name="senha" id="senha" placeholder="Senha"required>
            <label for="senha"></label>
            <br><br>
            <button type="submit" name="submit" id="submit">Registar</button>
		</form>
        <center><p> Já tem conta registada?<p></center>
        <a href="login.php"><button>Login</button></a>
    </div>
</body>
</html>
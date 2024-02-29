<?php
    include_once('connect.php');
    session_start();
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];
    $nome = mysqli_query($conn,"SELECT * FROM registo WHERE email = '$email' and senha = md5('$senha')");
    $linha = mysqli_fetch_assoc($nome);
    if($linha['id'] != 16){
        header('Location:principal.php');
    }
    $reserva = mysqli_query($conn,"SELECT * FROM reserva");
    $row = mysqli_fetch_assoc($reserva);

    // execução da query
    $stmt = mysqli_query($conn,"SELECT * FROM reserva");
    $clients   = mysqli_fetch_assoc($stmt);

    // montagem do html da tabela
    
    $table  = '<table border="1"  style="color:white;">';
    $table .= '<thead>';
    $table .= '<tr bgcolor="Black">';
    $table .= '<td>Selecionar </td>';
    $table .= '<td></td>';
    $table .= '<td>Email </td>';
    $table .= '<td></td>';
    $table .= '<td>Veiculo </td>';
    $table .= '<td></td>';
    $table .= '<td>Data Levantamento </td>';
    $table .= '<td></td>';
    $table .= '<td>Hora Levantamento </td>';
    $table .= '<td></td>';
    $table .= '<td>Data Devolvimento </td>';
    $table .= '<td></td>';
    $table .= '<td>Hora Devolvimento </td>';
    $table .= '<td></td>';
    $table .= '<td>Editar</td>';
    $table .= '<td></td>';
    $table .= '<td>Excluir</td>';
    $table .= '</tr>';
    $table .= '</thead>';
    $table .= '<tbody>';

    function deletar(){
        $id = $_POST['idcarro'];
        $deleta = mysqli_query($conn,"DELETE * FROM reserva WHERE id = $id");
    }
    // laço de repetição para inclusão dos dados na tabela
    foreach($stmt as $client){
        $table .= '<form action="edit.php" method="POST"><tr>';
            $table .= "<td style='height:10px;'><center><input type='checkbox' style='margin-top: 4px;' value='".$client['id']."'></center></td>";
            $table .= '<td></td>';
            $table .= "<td >".$client['email']." </td>";
            $table .= '<td></td>';
            $table .= "<td >".$client['veiculo']." </td>";
            $table .= '<td></td>';
            $table .= "<td >".$client['pickupDate']." </td>";
            $table .= '<td></td>';
            $table .= "<td >".$client['pickupTime']." </td>";
            $table .= '<td></td>';
            $table .= "<td >".$client['dropoffDate']." </td>";
            $table .= '<td></td>';
            $table .= "<td >".$client['dropoffTime']." </td>";
            $table .= '<td></td>';
            $table .= "<td ><input type='hidden' name='id' value='$client[id]'></input><input type='submit' value='editar'></input></td>";
            $table .= '<td></td>';
            $table .= "<td ><a class='bnt btn-info' onclick='deletar()' ".$client['id']."'>Excluir</a></td>";
        $table .= '</tr></form>';
    }

    // fecahamento do html
    $table .= '</tbody>';
    $table .= '</table>';

    // exibição na tela
    


    $_SESSION['nome'] = $linha['nome'];
    //$nome = $conn->mysqli_query($selectnome);
    
    //LISTA JAVASCRIPT: https://www.youtube.com/watch?v=pRwxgtqImZQ

    
    //$query = sprintf("SELECT nome,sobrenome FROM registo WHERE email = '$email' and senha = '$senha'");
    //$dados = mysqli_query($query, $conn) or die(mysqli_error());
    //$linha = mysqli_fetch_assoc($dados);
    //$_SESSION['nome'] = $linha['nome'];
    //print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
        header('Location:login.php');
        exit();
    }
    if(isset($_POST['submit']) && !empty($_POST['pickup-time']) && !empty($_POST['dropoff-time'])){
        //$pDate = $_POST['pickup-date'];
        //$pTime = $_POST['pickup-time'];
        //$dDate = $_POST['dropoff-date'];
        //$dTime = $_POST['dropoff-time'];
        //echo"<br>";
        //print_r($_POST['pickup-date']);
        //print_r($_POST['pickup-time']);
        //echo"<br>";
        //print_r($_POST['dropoff-date']);
        //print_r($_POST['dropoff-time']);
        //$result = mysqli_query($conn, "INSERT INTO reserva(pickupDate,pickupTime,dropoffDate,dropoffTime) VALUES ('$pDate','$pTime','$dDate','$dTime')");
        //exit();
    }
?>
<script>
$(document).ready(function() {
    // Evento de clique no botão de edição
    $('.btnEditar').click(function() {
        var idElemento = $(this).data('id'); // Obtém o ID do elemento
        // Realiza uma solicitação AJAX para carregar a tela de edição
        $.ajax({
            url: 'tela_edicao.php?id=' + idElemento, // URL da página de edição com o ID do elemento
            success: function(data) {
                // Exibe a resposta (a tela de edição) em um modal, por exemplo
                // Aqui você pode usar uma biblioteca como Bootstrap Modal ou outra solução de modal
                $('#modalEditar').html(data); // Exemplo: exibindo o conteúdo em um modal com ID "modalEditar"
            },
            error: function() {
                // Lidar com erros de carregamento da tela de edição
                alert('Ocorreu um erro ao carregar a tela de edição.');
            }
        });
    });
});
</script>
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
                    <h1 style="font-size: 30px;">Reservas</h1>
                    <?php echo $table; ?>
                </div>
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
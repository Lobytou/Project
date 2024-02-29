<?php
include 'connect.php'; // Inclui o arquivo connect.php para estabelecer a conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o ID do elemento a ser editado foi fornecido
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $novoNome = $_POST['veiculo'];
        $pickupDate = $_POST['pickupDate'];
        $pickupTime = $_POST['pickupTime'];
        $dropoffDate = $_POST['dropoffDate'];
        $dropoffTime = $_POST['dropoffTime'];


        // Query para atualizar os elementos da tabela reserva com base no ID fornecido
        $query = "UPDATE reserva SET veiculo = $veiculo pickupDate = $pickupDate pickupTime = $pickupTime dropoffDate = $dropoffDate dropoffTime = $dropoffTime WHERE id = $id";

        if ($conn->query($query) === TRUE) {
            echo "Registro atualizado com sucesso.";
        } else {
            echo "Erro ao atualizar registro: " . $conn->error;
        }
    } else {
        // Se o ID do elemento não foi fornecido, exiba uma mensagem de erro
        echo "Erro: ID do elemento não fornecido.";
    }
}
$conn->close(); // Fecha a conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Elemento</title>
</head>

<body>
    <h1>Editar Elemento</h1>

    <!-- Formulário para editar os detalhes do elemento -->
    <form id="formEditarElemento" method="POST" action="">
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
    </form>
</body>

</html>
<form action="" method="POST">

    <button type="submit" name="submit" id="submit">Enviar</button>
</form>
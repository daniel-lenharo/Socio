<?php
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO cadastro_pendentes (nome, email, telefone, cpf, rg, data_nascimento, sexo, foto, nome_mae, nome_pai, cep, endereco, numero, complemento, bairro, cidade, estado, estado_civil, escolaridade, profissao, comando, responsavel, cpf_responsavel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssssssssssss",
        $_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['cpf'], $_POST['rg'], $_POST['data_nascimento'], $_POST['sexo'], $_POST['foto'], $_POST['nome_mae'], $_POST['nome_pai'], $_POST['cep'], $_POST['endereco'], $_POST['numero'], $_POST['complemento'], $_POST['bairro'], $_POST['cidade'], $_POST['estado'], $_POST['estado_civil'], $_POST['escolaridade'], $_POST['profissao'], $_POST['comando'], $_POST['responsavel'], $_POST['cpf_responsavel']
    );
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo "Cadastro enviado com sucesso!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Sócio</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form method="POST" class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
        <h2 class="text-2xl font-bold mb-6">Cadastro de Sócio</h2>
        <input type="text" name="nome" placeholder="Nome Completo" class="w-full p-2 border rounded mb-4" required>
        <input type="email" name="email" placeholder="E-mail" class="w-full p-2 border rounded mb-4" required>
        <input type="text" name="telefone" placeholder="Telefone" class="w-full p-2 border rounded mb-4">
        <input type="text" name="cpf" placeholder="CPF" class="w-full p-2 border rounded mb-4" required>
        <input type="text" name="rg" placeholder="RG" class="w-full p-2 border rounded mb-4">
        <input type="date" name="data_nascimento" class="w-full p-2 border rounded mb-4" required>
        <select name="sexo" class="w-full p-2 border rounded mb-4">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
            <option value="Outro">Outro</option>
        </select>
        <input type="text" name="cep" placeholder="CEP" class="w-full p-2 border rounded mb-4">
        <input type="text" name="endereco" placeholder="Endereço" class="w-full p-2 border rounded mb-4">
        <input type="text" name="numero" placeholder="Número" class="w-full p-2 border rounded mb-4">
        <input type="text" name="complemento" placeholder="Complemento" class="w-full p-2 border rounded mb-4">
        <input type="text" name="bairro" placeholder="Bairro" class="w-full p-2 border rounded mb-4">
        <input type="text" name="cidade" placeholder="Cidade" class="w-full p-2 border rounded mb-4">
        <input type="text" name="estado" placeholder="Estado" class="w-full p-2 border rounded mb-4">
        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Cadastrar</button>
    </form>
</body>
</html>

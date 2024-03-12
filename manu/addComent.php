<?php
require_once 'init.php';
// pega os dados do formuário
$coment = isset($_POST['coment']) ? $_POST['coment'] : null;
$tipo_id = isset($_POST['selectTipo']) ? $_POST['selectTipo'] : null;


// validação (bem simples, só pra evitar dados vazios)
if (empty($descricao) || empty($tipo_id) || empty($status))
{
    echo "Volte e preencha todos os campos";
    exit;
}
// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO comentario(comentario, tipo_id) VALUES(:coment, :tipo_id)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':coment', $coment);
$stmt->bindParam(':tipo_id', $tipo_id);

if ($stmt->execute())
{
    header('Location: msgSucesso.html');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}
?>
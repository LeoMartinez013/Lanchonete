<?php
$mysqli = new mysqli("localhost", "root", "", "atec");

if(isset($_POST['editar'])){
    $id = $_POST['codigo'];
    $cliente = $_POST['cliente'];
    $item = $_POST['item'];
    $valor = $_POST['valor'];
    $sql = "
        UPDATE
            pedidos
        SET
            cliente = '$cliente',
            item = '$item',
            valor = '$valor'
        WHERE
            id = $id
    ";
    $result = $mysqli->query($sql);

    header('Location: /projeto/');//mandar o usuário para o index após o POST
}

$sql = "
SELECT
    *
FROM
    pedidos
WHERE
    id = {$_GET['codigo']}
";

$result = $mysqli->query($sql);
$rows = $result->fetch_all(MYSQLI_ASSOC);

$row = $rows[0];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Lanchonete</title>
    <link rel="stylesheet" href="./style/reset.css" />
    <link rel="stylesheet" href="./style/style.css" />
</head>
<body>
    <div id="nav">
        Lanchonete
    </div>
    <section id="table">
        <form method="POST" action="/projeto/editar.php">
            <div id="input-data">
                <input name="cliente" class="input-text" value="<?php echo $row['cliente']?>" placeholder="Cliente" type="text"/>
                <input name="item" class="input-text" value="<?php echo $row['item']?>" placeholder="Item" type="text"/>
                <input name="valor" class="input-text" value="<?php echo $row['valor']?>" placeholder="Valor" type="number" step="0.01" />
                <input name="codigo" type="hidden" value="<?php echo $_GET['codigo']?>"><!--Puxar o código, para mandar pro $id-->
                <input type="hidden" name="editar"/>
                <input class="input-btn" type="submit" value="Enviar" />
            </div>
        </form>
    </section>
</body>
</html>
<?php
$mysqli = new mysqli("localhost", "root", "", "atec");

if(isset($_POST['inserir'])){
    $novoCliente = $_POST['cliente'];
    $novoItem = $_POST['item'];
    $novoValor = $_POST['valor'];
    $sql = "
        INSERT INTO pedidos (cliente, item, valor)
        VALUES ('$novoCliente', '$novoItem', '$novoValor')  
    ";
    $result = $mysqli->query($sql);
}

if(isset($_GET['excluir'])){
    $id = $_GET['excluir'];
    $sql = "
        DELETE FROM pedidos
        WHERE id = $id
    ";
    $result = $mysqli->query($sql);
}

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
        Lanchonetes
    </div>
    <section id="table">
        <form method="POST" action="/projeto/index.php">
            <div id="input-data">
                <input name="cliente" class="input-text" placeholder="Cliente" type="text" required />
                <input name="item" class="input-text" placeholder="Item" type="text" required />
                <input name="valor" class="input-text" placeholder="Valor" type="number" step="0.01" required />
                <input name="inserir" type="hidden">
                <input class="input-btn" type="submit" value="Enviar" />
            </div>
        </form>
        <table id="myTable">
            <tr id="0">
                <th></th>
                <th>ID</th>
                <th>Cliente</th>
                <th>Item</th>
                <th>Valor</th>
                <th></th>
            </tr>
            <!-- Para cada um dos registros -->
            <?php?>
            <?php?>
            <?php 
                $sql = "
                    SELECT
                        *
                    FROM
                        pedidos
                ";
                
                $result = $mysqli->query($sql);
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                //inserir as <tr>'s de cada cliente.
                foreach($rows as $row){?>
                <tr id="<?php $row['id'];?>">
                    <!--UPDATE-->    
                    <td><a href="/projeto/editar.php?codigo=<?php echo $row['id']; ?>">Editar</a></td>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['cliente'];?></td>
                    <td><?php echo $row['item'];?></td>
                    <td><?php echo $row['valor'];?></td>
                    <!--DELETE-->
                    <td><a href="/projeto/index.php?excluir=<?php echo $row['id'];?>">Excluir</a></td>
                    
                </tr>

            <?php }?>
        </table>
    </section>
</body>
</html>
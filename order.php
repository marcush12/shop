<?php
include 'inc/header.php';
?>
<?php
$login = Session::get("cuslogin");//attention: get
if ($login == false) {
    header("Location:login.php");//se já logado vai direto p order.php
}
?>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="notfound">
                <h2><span>Detalhed do Pedido</span></h2>
                <table class="tblone">
                    <tr>
                        <th>Nº Série</th>
                        <th>Produto</th>
                        <th>Imagem</th>
                        <th>Quantidade</th>
                        <th>Total R$</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                    <?php
                    $cmrId = Session::get("cmrId");//cmrId é o id do comprador
                    $getOrder = $ct->getOrderProduct($cmrId);
                    if ($getOrder) {
                        $i = 0;
                        while ($result = $getOrder->fetch_assoc()) {
                            $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $result['productName']; ?></td>
                            <td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
                            <td>R$ <?php echo $result['quantity']; ?></td>

                            <td>R$
                             <?php
                             $total = $result['price'] * $result['quantity'];
                             echo $total;
                             ?></td>
                             <td><?php echo $fm->formatDate($result['date']); ?></td>
                             <td><?php
                                    if ($result['status'] == '0') {
                                        echo "Pendente";
                                    } else {
                                        echo "Entregue";
                                    }
                                    ?>

                            </td>
                            <?php
                            if ($result['status'] == '1') { ?>
                                <td><a onclick="return confirm('Tem certeza que quer remover o ítem?');" href="">X</a></td>
                            <?php
                            } else { ?>
                                <td>aguardando</td>
                            <?php
                            }
                            ?>

                        </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>

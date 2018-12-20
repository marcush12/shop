<?php
include 'inc/header.php';
?>
<?php
$login = Session::get("cuslogin");//attention: get
if ($login == false) {
    header("Location:login.php");//se já logado vai direto p order.php
}
?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
    $cmrId = Session::get("cmrId");
    $insertOrder = $ct->orderProduct($cmrId);
    $delDate = $ct->delCustomerCart();
    header('Location: success.php');
}
?>
<style>
    .division {width: 50%; float: left;}
    .tblone {width: 480px; margin:0 auto; border: 2px solid #ddd; font-size: 11px;}
    .tblone tr td {text-align: justify;}
    .tbltwo {float:right; text-align:left;  border: 2px solid #ddd; margin-right: 14px; margin-top: 12px;}
    .tbltwo tr td {text-align: justify; padding: 5px 10px;}
    .ordernow {}
    .ordernow a{width: 150px; margin: 5px auto; padding: 7px 0; text-align: center; display: block; background: #555; border: 1px solid #333; color: #fff; border-radius: 3px; font-size: 25px; margin-bottom: 40px;}
</style>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="division">
                <table class="tblone">
                    <tr>
                        <td>Serial Nº</td>
                        <td>Produto</td>
                        <td>Preço</td>
                        <td>Quantidade</td>
                        <td>Total Price</td>
                    </tr>
                    <?php
                    $getPro = $ct->getCartProduct();
                    if ($getPro) {
                        $i = 0;
                        $sum = 0;
                        $qty = 0;
                        while ($result = $getPro->fetch_assoc()) {
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $result['productName']; ?></td>
                        <td>R$ <?php echo $result['price']; ?></td>
                        <td><?php echo $result['quantity']; ?></td>
                        <td>R$
                         <?php
                         $total = $result['price'] * $result['quantity'];
                         echo $total;
                         ?></td>
                    </tr>
                    <?php
                    $qty = $qty + $result['quantity'];
                    $sum = $sum + $total;
                    ?>
                    <?php
                        }
                    }
                    ?>

                </table>
                <div class="clear"></div>
                <table class='tbltwo'>
                    <tr>
                        <th>Sub Total : </th>
                        <td>R$ <?php echo $sum; ?></td>
                    </tr>
                    <tr>
                        <th>VAT : </th>
                            <td>
                                10% (<?php echo $vat= $sum * 0.1; ?>)
                            </td>
                    </tr>
                    <tr>
                        <th>Total Final:</th>
                        <td>R$
                        <?php
                        $vat = $sum * 0.1;
                        $gtotal = $sum + $vat;
                        echo $gtotal;
                        ?>
                        </td>
                    </tr>
                    <tr>
                            <th>Quantity :</th>
                            <td><?php echo $qty; ?></td>
                    </tr>
                </table>
            </div>
            <div class="division">
                <?php
                $id = Session::get("cmrId");
                $getData = $cmr->getCustomerData($id);
                if ($getData) {
                    while ($result = $getData->fetch_assoc()) {
                ?>
                    <table class="tblone">
                        <tr>
                            <td colspan='3'><h2>Seu Perfil</h2></td>
                        </tr>
                        <tr>
                            <td width='20%'>Name</td>
                            <td width='5%'>:</td>
                            <td><?php echo $result['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Telefone</td>
                            <td>:</td>
                            <td><?php echo $result['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $result['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Endereço</td>
                            <td>:</td>
                            <td><?php echo $result['address']; ?></td>
                        </tr>
                        <tr>
                            <td>Cidade</td>
                            <td>:</td>
                            <td><?php echo $result['city']; ?></td>
                        </tr>
                        <tr>
                            <td>CEP</td>
                            <td>:</td>
                            <td><?php echo $result['zip']; ?></td>
                        </tr>
                        <tr>
                            <td>País</td>
                            <td>:</td>
                            <td><?php echo $result['country']; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><a href="editprofile.php">Atualizar Perfil</a></td>
                        </tr>
                    </table>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <div class='ordernow'><a href="?orderid=order">Comprar</a></div>
</div>
<?php include 'inc/footer.php'; ?>

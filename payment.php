<?php
include 'inc/header.php';
?>
<?php
$login = Session::get("cuslogin");//attention: get
if ($login == false) {
    header("Location:login.php");//se já logado vai direto p order.php
}
?>
<style>
    .payment{width: 500px; min-height: 200px; text-align: center; border: 1px solid #ddd; margin: 0 auto; padding: 50px;}
    .payment h2{border-bottom: 1px solid #ddd; margin-bottom: 40px; padding-bottom: 10px;}
    .payment  a{background: #ff0000 none repeat scroll 0 0; border-radius: 3px; color:#fff; font-size: 25px; padding: 5px 30px;}
    .back a{width: 150px; margin: 5px auto; padding: 7px 0; text-align: center; display: block; background: #555; border: 1px solid #333; color: #fff; border-radius: 3px; font-size: 25px;}
</style>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="payment">
                <h2>Escolha a Opção de Pagamento</h2>
                <a href="offline.php">Offline</a> |
                <a href="online.php">Online</a>
            </div>
            <div class="back">
                <a href="cart.php">Voltar</a>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>

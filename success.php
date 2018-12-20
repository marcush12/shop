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
    .payment p {line-height: 25px;}
</style>

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="payment">
                <h2>Compra Efetuada com sucesso!</h2>
                <p>Obrigado por comprar conosco. Entraremos em contato para os detalhes da entrega de seu pedido. Confira <a href="order.php">aqui</a> os detalhes do seu pedido.</p>

            </div>

        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>

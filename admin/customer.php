<?php
include 'inc/header.php';
include 'inc/sidebar.php';?>
<?php
$filepath = realpath(dirname(__FILE__));//realpath é o endereço do diretório onde está este arquivo
include_once ($filepath.'/../classes/User.php');


if (!isset($_GET['custId']) || $_GET['custId'] == NULL) {
    echo "<script> window.location = 'mainorder.php'; </script>";
} else {
    $id = $_GET['custId'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "<script> window.location = 'mainorder.php'; </script>";
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Detalhes do Cliente</h2>
               <div class="block copyblock">
                <?php
                $cus = new User();
                $getCust = $cus->getCustomerData($id);
                if ($getCust) {
                    while ($result = $getCust->fetch_assoc()) {
                ?>
                        <form action="" method='post'>
                            <table class="form">
                                <tr>
                                    <td>Cliente</td>
                                    <td>
                                        <input type="text" readonly="readonly" value="<?php echo $result['name']; ?>" class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Endereço</td>
                                    <td>
                                        <input type="text" readonly="readonly" value="<?php echo $result['address']; ?>" class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cidade</td>
                                    <td>
                                        <input type="text" readonly="readonly" value="<?php echo $result['city']; ?>" class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>País</td>
                                    <td>
                                        <input type="text" readonly="readonly" value="<?php echo $result['country']; ?>" class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>CEP</td>
                                    <td>
                                        <input type="text" readonly="readonly" value="<?php echo $result['zip']; ?>" class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Telefone</td>
                                    <td>
                                        <input type="text" readonly="readonly" value="<?php echo $result['phone']; ?>" class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        <input type="text" readonly="readonly" value="<?php echo $result['email']; ?>" class="medium" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" name="submit" Value="OK" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                <?php
                    }
                }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>

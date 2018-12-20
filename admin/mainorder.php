<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$filepath = realpath(dirname(__FILE__));//realpath é o endereço do diretório onde está este arquivo
include_once ($filepath.'/../classes/Cart.php');
$ct = new Cart();
$fm = new Format();
?>

<?php
if (isset($_GET['shiftid'])) {
    $id = $_GET['shiftid'];
    $price= $_GET['price'];
    $time= $_GET['time'];
    $shift = $ct->productShifted($id, $time, $price);
}
?>

<?php
if (isset($_GET['delproid'])) {
    $id = $_GET['delproid'];
    $price= $_GET['price'];
    $time= $_GET['time'];
    $delOrder = $ct->delproductShifted($id, $time, $price);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Pedidos dos Clientes</h2>
                <?php
                if (isset($shift)) {
                    echo $shift;
                }
                if (isset($delOrder)) {
                    echo $delOrder;
                }
                ?>
                <div class="block">
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Data</th>
							<th>Produto</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>ID Cliente</th>
                            <th>Endereço</th>
                            <th>Ação</th>
						</tr>
					</thead>
					<tbody>
                        <?php
                        $getOrder = $ct->getAllOrderProduct();
                        if ($getOrder) {
                            while($result = $getOrder->fetch_assoc()) {

                        ?>
						<tr class="odd gradeX">
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $fm->formatDate($result['date']); ?></td>
                            <td><?php echo $result['productName']; ?></td>
                            <td><?php echo $result['quantity']; ?></td>
                            <td><?php echo $result['price']; ?></td>
                            <td><?php echo $result['cmrId']; ?></td>
                            <td><a href="customer.php?custId=<?php echo $result['cmrId']; ?>">Ver Endereço</a></td>

                            <?php
                            if ($result['status'] == '0') { ?>
                                <td><a href="?shiftid=<?php echo $result['cmrId']; ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date']; ?>">Entregue</a></td>
                            <?php
                            } else { ?>
                                <td><a href="?delproid=<?php echo $result['cmrId']; ?>&price=<?php echo $result['price']; ?>&time=<?php echo $result['date']; ?>">Remover</a></td>
                            <?php
                            }
                            ?>



						</tr>
                        <?php
                           }
                        }
                        ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>

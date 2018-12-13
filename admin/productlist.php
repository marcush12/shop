<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php'; ?>
<?php include_once '../helpers/Format.php'; ?>

<?php
$pd = new Product();
$fm = new Format();
?>
<?php
 if (isset($_GET['delpro'])) {
 	$id = $_GET['delpro'];
 	$delPro = $pd->delProById($id);
 }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Produtos: Lista</h2>
        <div class="block">
			<?php if (isset($delPro)) {echo $delPro;} ?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Serial Nº</th>
					<th>Product Name</th>
					<th>Categoria</th>
					<th>Marca</th>
					<th>Descrição</th>
					<th>Preço</th>
					<th>Descrição</th>
					<th>Imagem</th>
					<th>Tipo</th>
				</tr>
			</thead>
			<tbody>
				<?php $getPd = $pd->getAllProduct();
				if ($getPd) {
					$i = 0;
					while ($result = $getPd->fetch_assoc()) {
						$i++;
				?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $fm->textShorten($result['productName'], 20); ?></td>
							<td><?php echo $result['catName']; ?></td>
							<td><?php echo $result['brandName']; ?></td>
							<td><?php echo $fm->textShorten($result['body'], 30); ?></td>
							<td><?php echo $result['price']; ?></td>
							<td><img src="<?php echo $result['image']; ?>" height="40px;" width="60px;"></td>
							<td><?php

							if ($result['type'] == 0) {
								echo "Com Recursos";
							} else {
								echo "Genérico";
							}
							?>
							</td>
							<td><a href="productedit.php?proid=<?php echo $result['productId']; ?>">Editar</a> || <a onclick="return confirm('Tem certeza que quer remover a categoria?')" href="?delpro=<?php echo $result['productId']; ?>">Remover</a></td>
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

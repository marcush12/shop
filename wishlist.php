<?php
include 'inc/header.php';
?>
<?php
if (isset($_GET['delwlistid'])) {
	$productId = $_GET['delwlistid'];
	$delWlist = $pd->delWlistData($cmrId, $productId);
}
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">
			<div class="cartpage">
			    	<h2>Wish List</h2>

						<table class="tblone">
							<tr>
								<th width="5%">Serial Nº</th>
								<th width="30%">Produto</th>
								<th width="10%">Imagem</th>
								<th width="15%">Preço</th>

								<th width="10%">Action</th>
							</tr>
							<?php
							$getPd = $pd->checkWlistData($cmrId);
							if ($getPd) {
								$i = 0;
								while ($result = $getPd->fetch_assoc()) {
									$i++;
							?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $result['productName']; ?></td>
									<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
									<td>R$ <?php echo $result['price']; ?></td>

									<td><a href="preview.php?proid=<?php echo $result['productId']; ?>">Ver</a>
										|| <a href="?delwlistid=<?php echo $result['productId']; ?>">Remover</a>
									</td>
								</tr>

							<?php
								}
							}
							?>
						</table>

					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>

					</div>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
</div>
   <?php include 'inc/footer.php'; ?>

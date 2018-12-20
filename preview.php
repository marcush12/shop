<?php include 'inc/header.php'; ?>
<?php
if (isset($_GET['proid'])) {
    $id = $_GET['proid'];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];

    $addCart = $ct->addToCart($quantity, $id);
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
	$productId = $_POST['productId'];
    $insertCom = $pd->insertCompareData($productId, $cmrId);

}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])) {
    $saveWlist = $pd->saveWishListData($id, $cmrId);

}
?>

<style>
.mybutton {width: 120px; float: left; margin-right: 50px;}
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">
					<?php
					$getPd = $pd->getSingleProduct($id);//dont forget $id GET
					if ($getPd) {
						while ($result = $getPd->fetch_assoc()) {

					?>
						<div class="grid images_3_of_2">
							<img src="admin/<?php echo $result['image']; ?>" alt="" />
						</div>
						<div class="desc span_3_of_2">
							<h2><?php echo $result['productName']; ?></h2>
							<p><?php echo $fm->textShorten($result['body'], 200); ?></p>
							<div class="price">
								<p>Preço: <span>R$<?php echo $result['price']; ?></span></p>
								<p>Categoria: <span><?php echo utf8_encode($result['catName']); ?></span></p>
								<p>Marca:<span><?php echo $result['brandName']; ?></span></p>
							</div>
							<div class="add-cart">
								<form action="" method="post">
									<input type="number" class="buyfield" name="quantity" value="1"/>
									<input type="submit" class="buysubmit" name="submit" value="Adicionar ao Carrinho"/>
								</form>
							</div>
							<span style='color:red; font-size: 18px;'>
								<?php
								if (isset($addCart)) {
									echo $addCart;
								}
								?>
							</span>
							<?php
								if (isset($insertCom)) {
									echo $insertCom;
								}
								if (isset($saveWlist)) {
									echo $saveWlist;
								}
							?>
							<?php
      						$login = Session::get("cuslogin");
      						if ($login) { ?>
							<div class="add-cart">
								<div class="mybutton">
									<form action="" method="post">
										<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId']; ?>"/>
										<input type="submit" class="buysubmit" name="compare" value="Adicionar a Comparar"/>
									</form>
								</div>
								<div class="mybutton">
									<form action="" method="post">
										<input type="submit" class="buysubmit" name="wlist" value="Wish List"/>
									</form>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="product-desc">
						<h2>Produto: Detalhes</h2>
						<p><?php echo $result['body']; ?></p>
				    	</div>
					<?php
						}
					}
					?>

	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIAS</h2>
					<ul>
						<?php
						$getCat = $cat->getAllCat();
						if ($getCat) {
							while ($result = $getCat->fetch_assoc()) {

						?>
				      			<li><a href="productbycat.php?catId=<?php echo $result['catId'];?>"><?php echo $result['catName'];?></a></li>
				      	<?php
							}
						}
						?>
				      <!-- <li><a href="productbycat.html">Desktop</a></li>
				      <li><a href="productbycat.html">Laptop</a></li>
				      <li><a href="productbycat.html">Accessories</a></li>
				      <li><a href="productbycat.html#">Software</a></li>
					   <li><a href="productbycat.html">Sports & Fitness</a></li>
					   <li><a href="productbycat.html">Footwear</a></li>
					   <li><a href="productbycat.html">Jewellery</a></li>
					   <li><a href="productbycat.html">Clothing</a></li>
					   <li><a href="productbycat.html">Home Decor & Kitchen</a></li>
					   <li><a href="productbycat.html">Beauty & Healthcare</a></li>
					   <li><a href="productbycat.html">Toys, Kids & Babies</a></li> -->
    				</ul>

 				</div>
 		</div>
 	</div>
	</div>
   <?php include 'inc/footer.php'; ?>

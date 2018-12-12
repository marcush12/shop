<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/Brand.php';
 $brand = new Brand();

 if (isset($_GET['delbrand'])) {
 	$id = $_GET['delbrand'];
 	$delBrand = $brand->delBrandById($id);
 }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Marcas Lista</h2>
                <div class="block">
                	<?php if (isset($delBrand)) {echo $delBrand;} ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Marca Nome</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$getBrand = $brand->getAllBrand();
						If ($getBrand) {
							$i = 0;
							while ($result = $getBrand->fetch_assoc()) {
								$i++;
						?>
								<tr class="odd gradeX">
									<td><?php echo $i; ?></td>
									<td><?php echo $result['brandName']; ?></td>
									<td><a href="brandedit.php?brandid=<?php echo $result['brandId']; ?>">Editar</a> || <a onclick="return confirm('Tem certeza que quer remover a Marca?')" href="?delbrand=<?php echo $result['brandId']; ?>">Remover</a></td>
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


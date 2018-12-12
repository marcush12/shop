<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/Category.php';
 $cat = new Category();
 if (isset($_GET['delcat'])) {
 	$id = $_GET['delcat'];
 	$delCat = $cat->delCatById($id);
 }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                	<?php if (isset($delCat)) {echo $delCat;} ?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Categoria Nome</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$getCat = $cat->getAllCat();
						If ($getCat) {
							$i = 0;
							while ($result = $getCat->fetch_assoc()) {
								$i++;
						?>
								<tr class="odd gradeX">
									<td><?php echo $i; ?></td>
									<td><?php echo $result['catName']; ?></td>
									<td><a href="catedit.php?catid=<?php echo $result['catId']; ?>">Editar</a> || <a onclick="return confirm('Tem certeza que quer remover a categoria?')" href="?delcat=<?php echo $result['catId']; ?>">Remover</a></td>
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


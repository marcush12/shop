<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php include '../classes/Brand.php'; ?>

<?php
$pd =new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $insertProduct = $pd->productInsert($_POST, $_FILES);//for images $_files

}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Adicionar Novo Produto</h2>
        <div class="block">
         <?php if (isset($insertProduct)) { echo $insertProduct; } ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">

                <tr>
                    <td>
                        <label>Nome</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Entre o Nome do Produto..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Categoria</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Selecione: Categoria</option>
                            <?php
                            $cat = new Category();
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                                while ($result = $getCat->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Marca</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Selecione: Marca</option>
                            <?php
                            $brand = new Brand();
                            $getBrand = $brand->getAllBrand();
                            if ($getBrand) {
                                while ($result = $getBrand->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>

				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Descrição</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Preço</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Upload Imagem</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>

				<tr>
                    <td>
                        <label>Produto Tipo</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Tipo</option>
                            <option value="0">Com Recursos</option>
                            <option value="1">Genérico</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>



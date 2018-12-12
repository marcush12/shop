﻿<?php
include 'inc/header.php';
include 'inc/sidebar.php';
include '../classes/Category.php';

$cat =new Category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];

    $insertCat = $cat->catInsert($catName);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inserir nova categoria</h2>
               <div class="block copyblock">
                <?php if (isset($insertCat)) {echo $insertCat; } ?>
                 <form action="" method='post'>
                    <table class="form">
                        <tr>
                            <td>
                                <input type="text" name="catName" placeholder="Enter o nome da Categoria..." class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>

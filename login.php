<?php include 'inc/header.php'; ?>
<?php
$login = Session::get("cuslogin");//attention: get
if ($login == true) {
    header("Location:order.php");//se já logado vai direto p order.php
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $customLogin = $cmr->customerLogin($_POST);

}
?>
 <div class="main">
    <div class="content">
    	<div class="login_panel">
        <?php
        if (isset($customLogin)) {
            echo $customLogin;
        }
        ?>
        	<h3>Já tem conta?</h3>
        	<p>Entre aqui abaixo</p>
        	<form action="" method="post">
            	<input name="email" placeholder="insira seu email" type="text" >
                <input name="pass" placeholder="insira sua senha" type="password" >
                <div class="buttons"><div><button class="grey" name='login'>Entrar</button></div></div>
            </form>

        </div>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
            $customerReg = $cmr->customerRegistration($_POST);//for images $_files

        }
        ?>
        <?php
        if (isset($customerReg)) {
            echo $customerReg;
        }
        ?>
    	<div class="register_account">
    		<h3>Registrar Nova Conta</h3>
    		<form action="" method="POST">
		   		<table>
		   			<tbody>
						<tr>
    						<td>
    							<div>
    							<input type="text" name="name" placeholder="Seu Nome" />
    							</div>

    							<div>
    							   <input type="text" name="city" placeholder="Seu city" />
    							</div>

    							<div>
    								<input type="text" name="zip" placeholder="Seu cep" />
    							</div>
    							<div>
    								<input type="text" name="email" placeholder="Seu email" />
    							</div>
    		    			 </td>
    		    			<td>
        						<div>
        							<input type="text" name="address" placeholder="Seu endereço" />
        						</div>
                                <div>
                                    <input type="text" name="country" placeholder="Seu país" />
                                </div>
                                <div>
                                    <input type="text" name="phone" placeholder="Seu telefone" />
                                </div>
                                <div>
                                    <input type="text" name="pass" placeholder="Sua senha" >
                                </div>
		    	            </td>
		                </tr>
		            </tbody>
                </table>
    		    <div class="search"><div><button class="grey" name="register">Criar Conta</button></div></div>
    		      <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
    		    <div class="clear"></div>
		    </form>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
</div>
  <?php include 'inc/footer.php'; ?>

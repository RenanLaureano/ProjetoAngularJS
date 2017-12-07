<?php
    session_start();

    $erro_username = isset($_GET['erro_username']) ? $_GET['erro_username'] : 0;
    $erro_email = isset($_GET['erro_email']) ? $_GET['erro_email'] : 0;
?>
<body>
<section>
	<div class="container">
    	<div class="row">
    		<div class="col-md-4">
    			<h3>Cadastre-se</h3>
    			<form action="valida-cadastro.php" method="post">
			        <div class="form-group">
			        	<label for="nome">Nome<a class="a">*</a></label>
			           	<input type="text" name="nome" class="form-control" id="nome" placeholder="Digite seu nome completo">
			        </div>
			        <div class="form-group">
			            <label for="username">Username<a class="a">*</a></label>
			            <input type="text" name="username" class="form-control" id="username" placeholder="Digite o username que desejar">
			            <?php
	                        if($erro_username){
	                            echo '<font color="#FF0000">Usuário já existe</font>';
	                        }
	                    ?>
			        </div>
 					<div class="form-group">
				        <label>Digite um e-mail válido<a class="a">*</a></label>
		                <div class="input-group">
		                    <span class="input-group-addon">@</span>
		                    <input type="e-mail" class="form-control" name="email_name" placeholder="Digite seu email" required="requiored">
		                </div>
		                <?php
		                    if($erro_email){
		                        echo '<font color="#FF0000">E-mail já existe</font>';
		                    }
		                ?>
				    </div>
				    <div class="form-group">
				        <label for="senha">Senha<a class="a">*</a></label>
				        <input type="password" name="senha" class="form-control" id="senha" placeholder="Digite uma senha">
				    </div>    
       				<p class="help-block">(<a class="a">*</a>) Itens obrigatórios</p>
				    <button type="submit" class="btn btn-info"  name="cadastrar" value="Cadastrar">Cadastrar Usuário</button>
          		</form>
        	</div>
        </div>
    </div>
</section>
<div class="col-md-8"></div>
</body>
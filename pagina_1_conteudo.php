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
			            <label for="pais">País<a class="a">*</a></label>
			            <input type="text" name="pais" class="form-control" id="pais" placeholder="Digite o nome do seu país, ex: Brasil">
			        </div>			            	
			        <div class="form-group">
			            <label for="estado">Estado<a class="a">*</a></label>
			            <input type="text" name="estado" class="form-control" id="estado" placeholder="Digite o seu estado, ex: Paraná">
			        </div>
			        <div class="form-group">
			            <label for="cidade">Cidade<a class="a">*</a></label>
			            <input type="text" name="cidade" class="form-control" id="cidade" placeholder="Digite o nome da sua cidade, ex: Cornélio Procópio">
			        </div>
			        <div class="form-group">
			            <label for="bairro">Bairro<a class="a">*</a></label>
			            <input type="text" name="bairro" class="form-control" id="bairro" placeholder="Digite o nome do seu bairro, ex: Centro">
			        </div>
			        <div class="form-group">
			            <label for="rua">Rua<a class="a">*</a></label>
			            <input type="text" name="rua" class="form-control" id="rua" placeholder="Digite o nome da sua rua/avenida/viela, ex: Av. Ayrton Senna">
			        </div>
			        <div class="form-group">
			            <label for="numero">Número<a class="a">*</a></label>
			            <input type="text" name="numero" class="form-control" id="numero" placeholder="Digite o número da sua residência, ex: 456">
			        </div>
			        <div class="form-group">
			            <label for="complemento">Complemento</label>
			            <input type="text" name="complemento" class="form-control" id="complemento" placeholder="Digite o complemento da sua residência, ex: casa dos fundos">
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
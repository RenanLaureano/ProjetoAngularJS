<?php
    session_start();

    $erro = isset($_GET['erro']) ? $_GET['erro']: 0;
?>
<section>
	<div class="container">
      	<div class="row">
				<div class="col-md-4">
			        <h3>Logar</h3>
			        <form method="post" action="valida-acesso.php" id="formLogin">
			            <div class="form-group">
			              	<div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="e-mail" name="username_login" class="form-control" id="email" placeholder="Digite seu email ou username">
                            </div>
			            </div>
			            <div class="form-group">
			              	<input type="password" name="senha_login" class="form-control" id="senha" placeholder="Digite sua senha">
			            </div>
			            <?php
							if($erro == 1){
								echo '<font color="#FF0000">Usuário e/ou senha incorreto(s)</font>';
							}
						?>
						<div class="form-group">
			              	<div class="input-group">
			            		<button type="submit" class="btn btn-primary">Logar</button>
					        </div>
					    </div>
			        </form>
			</div>
		</div>
	</div>
</section>
<div class="col-md-8"></div>
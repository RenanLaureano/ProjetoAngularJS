<!DOCTYPE html>
<html>
	<head>
		<title>Teste</title>
		<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

		<style type="text/css">
			.lazy{
				width: 50%;
				margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<img class="lazy" src="imagens/Angular/1.png" data-src="1.png"><br>
		<img class="lazy" src="imagens/Angular/2.jpg" data-src="2.jpg"><br>
		<img class="lazy" src="imagens/Angular/3.jpg" data-src="3.jpg"><br>
		<img class="lazy" src="imagens/Angular/4.jpg" data-src="4.jpg"><br>
		<img class="lazy" src="imagens/Angular/5.jpg" data-src="5.jpg"><br>
		<img class="lazy" src="imagens/Angular/6.jpg" data-src="6.jpg"><br>
		<img class="lazy" src="imagens/Angular/7.jpg" data-src="7.jpg"><br>
		<img class="lazy" src="imagens/Angular/8.png" data-src="8.png"><br>


		<script type="text/javascript">
			lazyload();

			window.onscroll = function(ev){
				lazyload();
			};

			function lazyload(){
				var lazyimage = document.getElementByClassName('lazy');
				for(var i = 0; i < lazyimage.lenght; i++){
					if(elementInViewport(lazyimage[i])){
						lazyimage[i].setAttribute('src',lazyimage[i].getAttribute('data-src'));
					}
				}
			}
		</script>
	</body>
</html>	
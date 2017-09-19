## TweetViews - Tutorial:

https://github.com/jvictormello/tweetsnews

Para correta utilização do software e configuração, será necessário ter um servidor Apache instalado no Sistema Operacional, PHP 7.1.*. e banco de dados MySQL.

1- Realizar download do código fonte disponível em: https://github.com/jvictormello/tweetsnews, salvá-lo num único diretório, renomeá-lo como "tweetsnews" e colocá-lo dentro da pasta de publicação do servidor

![alt text](https://github.com/jvictormello/hello-world/blob/master/TweetsNews%2001.PNG)

2- Acessar o SGBD utilizado para configuração do MySQL e criar um Schema com os seguintes dados:
	* Nome da Base de Dados - tweetsnews
	* Agrupamento (Collation) - utf8_bin
*OBS.: Muito importante não realizar a criação de nenhuma tabela, pois esse procedimento será realizado via artisan

![alt text](https://github.com/jvictormello/hello-world/blob/master/TweetsNews%2002.PNG)

3- Agora é necessário acessar o diretório com o código que está no servidor e abrir o arquivo ".env", que deve ter os seguintes dados editados para que a conexão com o BD ocorra:
	* DB_CONNECTION=mysql
	* DB_HOST= Colocar o somente IP de conexão ao banco ou deixar "127.0.0.1" se for localhost
	* DB_PORT=3306 
	* DB_DATABASE=tweetsnews
	* DB_USERNAME= Colocar somente a o usuário de acesso à base (se for root, colocar root)
	* DB_PASSWORD= Colocar somente a senha de acesso à base (deixar em branco se não tiver senha)
	
![alt text](https://github.com/jvictormello/hello-world/blob/master/TweetsNews%2003.PNG)

4- Após a criação da Base de Dados "tweetsnews" acessar via terminal o diretório raiz do sistema "tweetsnews" o seguinte comando "composer dump-autoload"

![alt text](https://github.com/jvictormello/hello-world/blob/master/TweetsNews%2004.PNG)

5- Em seguida e ainda através do terminal, rodar o comando "php artisan migrate" que criará tabelas na Base de Dados

![alt text](https://github.com/jvictormello/hello-world/blob/master/TweetsNews%2005.PNG)

6- Ainda dentro da raiz do sistema "tweetsnews" via terminal, deve-se rodar o comando "composer install", para garantir que todas as dependências sejam instaladas (mesmo a pasta Vendor estando versionada junto com o código);

![alt text](https://github.com/jvictormello/hello-world/blob/master/TweetsNews%2006.PNG)

7- Terminando a execução do comando anterior, deve-se rodar o seguinte comando "composer update" para que alguma dependências novas sejam instaladas ou as atuais sejam atualizadas;

![alt text](https://github.com/jvictormello/hello-world/blob/master/TweetsNews%2007.PNG)

8- Reiniciar o servidor onde o projeto "tweetsnews" está hospedado e acessar pelo navegador fornecendo o IP "http://IP_SERVIDOR/tweetsnews/public".
Caso esteja utilizando localmente, subir o servidor apache e acessar pelo navegador como "http://localhost/tweetsnews/public".

![alt text](https://github.com/jvictormello/hello-world/blob/master/TweetsNews%2008.PNG)

![alt text](https://github.com/jvictormello/hello-world/blob/master/TweetsNews%2009.PNG)

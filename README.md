<p align="center"></p>
<h3 align="left">

# StockWise Doce Mania
  O objetivo principal do projeto é criar uma ferramenta para a organização de estoque de uma loja, separando-o em categorias, datas de validade, quantidades e faltas.

##### Ferramentas e linguagens de programação utilizadas: 
* Laravel 8;
* JSON PHP Extension + Database (MySQL, SQLite) + Web server (Apache) - recomendado: baixe o ambiente de desenvolvimento utilizadno Xampp.
* Configuração de variáveis de ambiente na máquina (composer, npm, mysql e php).
Composer
* PHP: * Version >= 8.2.6
* OpenSSL PHP Extension 
* PDO PHP Extension 
* Composer.
* Node.

##### Passo a Passo:
1. Clone o repositório em seu computador;
2. Dentro da pasta principal do projeto, crie o arquivo .env;
3. Edite o arquivo .env com as informações corretas do banco de dados e das configurações de e-mail para os dados locais (o e-mail pode ser utilizado através do Mailtrap para testes, uma ferramenta altamente recomendada);
4. Acesse o caminho do repositório no terminal e execute: composer install;
5. Execute o comando composer dump-autoload;
6. Ainda no terminal, gere a chave da aplicação executando o comando: php artisan key:generate;
7. Em seguida, rode as migrações usando: php artisan migrate --seed (a flag --seed executa o seeder do banco de dados do Laravel. Neste projeto, foi utilizada para gerar o perfil de usuário João ("email" => joao@gmail.com, "password" => "12345678") e 5 tarefas para auxiliar na execução de testes manuais).
8. Execute o Node na aplicação: rode os comandos npm install, depois npm run dev.
9. Para executar os testes automatizados, use o comando php artisan test, que testará os métodos get e store para os usuários e as requisições de tarefas.
10. Por fim, para executar o projeto, rode o comando php artisan serve e acesse a URL exibida no terminal.

* Para rodar os testes, utilize o comando php artisan test
#### Desenvolvido por Larissa Rezende Fazza ####

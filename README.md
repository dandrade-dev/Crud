# Crud

Realizado a utilização do Layout com base do adminLte : 

https://github.com/dmstr/yii2-adminlte-asset

Realizado a utilização da dependencia select2 no composer assim como _form do funcionario

https://demos.krajee.com/widget-details/select2#installation

Realizado a utilização da dependencia yii2-many-to-many do usuario arogachev para realização do relacionamento entre tabelas

https://github.com/arogachev/yii2-many-to-many


Realizado a alteração do httpd_vhosts para utilização de uma url amigavel

#crud
 <VirtualHost *:80>
        ServerName crud.localhost
        DocumentRoot "C:\xampp\htdocs\crud\frontend\web"
           
        <Directory "C:\xampp\htdocs\crud\frontend\web">
            # Utilize o mod_rewrite para suporte a URL amigável
            RewriteEngine on
            # Se um diretório ou arquivo existe, usa a requisição diretamente
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Caso contrário, encaminha a requisição para index.php
            RewriteRule . index.php

            # usar index.php com arquivo index
            DirectoryIndex index.php

            # ...outras configurações...
        </Directory>
    </VirtualHost>
       
    <VirtualHost *:80>
        ServerName admincrud.localhost
        DocumentRoot "C:\xampp\htdocs\crud\backend\web"
           
        <Directory "C:\xampp\htdocs\crud\backend\web">
            # Utilize o mod_rewrite para suporte a URL amigável
            RewriteEngine on
            # Se um diretório ou arquivo existe, usa a requisição diretamente
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Caso contrário, encaminha a requisição para index.php
            RewriteRule . index.php

            # usar index.php com arquivo index
            DirectoryIndex index.php

            # ...outras configurações...
        </Directory>
    </VirtualHost>


Observaçôes :
O projeto foi desenvolvido na parte backend do administrador, onde foi criado um usuario onde ao realizar a migrations ele adiciona automanticamente no banco
user: admin  senha: admin.
O crud foi desenvolvido em ambas as classes Funcionarios e Cargo e foi criado uma tabela relacional para melhor funcionamento, a parte front end para usuario não foi desenvolvida,
mas a proposta do desafio foi realizada.
Infelizmente existe apenas no index do Funcionarios, não consegui trazer o nome ou o id do cargo, não consegui encontrar uma forma dentro da GridView.

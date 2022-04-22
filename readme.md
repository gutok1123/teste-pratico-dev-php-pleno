# Teste prático - Desenvolvedor(a) PHP Pleno

O objetivo desta avaliação é medir o nível de conhecimento do candidato nas áreas em que a vaga será exigida.

## Escopo

Criar uma aplicação, para forncer API's de login, cadastro e listagem de dados. Deve ser utilizado o framework Symfony em sua versão mais recente (https://symfony.com/).

Todas APi's devem ser acessadas utilizando o método **JWT**.

## Cenário

Criação de uma plataforma para ensino online. Nesta plataforma, os usuários terão a possibilidade de cadastrar cursos e realizar a matrícula de alunos. Esta aplicação será construída em React, por isso é necessário um backend headless.

## Requisitos

* Um aluno pode ser matriculado em mais de um curso.
* Não pode permitir matriculas em cursos em andamento ou encerrados.
* Não pode permitir matricula de alunos inativos.
* Não pode permitir cadastro de alunos menores de 16 anos.
* É limitado a 10 alunos por curso.
* Somente usuários administradores terão acesso ao sistema. Não é necessário prever acesso de alunos.

### Cursos

Deve ser possível inserir, editar, deletar, visualizar e listar os cursos, sendo que por padrão devem ser listados primeiro os cursos em andamento ou que serão iniciados.

**Atributos**
* Id
* Título
* Descrição
* Data de início
* Data de fim

### Alunos

Deve ser possível inserir, editar, deletar, visualizar e listar os alunos. 

**Atributos**
* Id
* Nome
* E-mail
* Data de nascimento
* Status

### Matrículas

Deve ser possível inserir, editar, deletar, visualizar e listar as mutrículas.

**Atributos**
* Id
* Id Curso
* Id Aluno
* Id Usuário
* Data da matrícula

### Usuários

Deve ser possível inserir, editar, deletar, visualizar e listar as usuários.

**Atributos**
* Id
* Nome
* E-mail
* Status

---

## Instruções
* Deve ser utilizado o MySQL como banco de dados.
* Deve ser utilizado o Composer para gerenciar as dependências da aplicação.
* Crie um README com orientações para a instalação e execução de comandos.
* Usar migrations
* Disponibilizar dados iniciais
* Usar um ambiente com Docker e disponibilizar um Dockerfile ou docker-compose.yml

## Não é obrigatório, mas seria interessante se você:
* Programar em inglês
* Criar testes unitários
* Utilizar as melhores práticas da Orientação a Objetos

Antes De começarmos o debug queria fazer umas considerações.
	Neste Crud foquei em usar o padrão SOLID e explorar a orientação a objetos, você que irá debugar por favor leia o e-mail que mandarei com o link
	que la irei explicar tudo mais formalmente para o readme não ficar gigante :)!.

Como utilizar : 
Para iniciar : Insira sudo docker-compose -d --build
               sudo docker exec -it api bash
               composer install
               chmod -R 777 bin/console
               bin/console doctrine:migrations:migrate
               composer require symfony/apache-pack
Cursos:
	Route:http://seuIp:8000/api/course/create
        {
	"title" : "Curso de Js Ruby",
	"description": "Esse é o curso",
	"initial_date": "30/01/2022",
	"final_date": "20/05/2022"
         }
         {
	"title" : "Curso de Java",
	"description": "Esse é o curso",
	"initial_date": "20/04/2022",
	"final_date": "30/05/2022"
         }
         {
	"title" : "Curso de C",
	"description": "Esse é o curso",
	"initial_date": "30/11/2022",
	"final_date": "20/12/2022"
         }
         {
	"title" : "Curso de Js Ruby",
	"description": "Esse é o curso",
	"initial_date": "30/11/2022",
	"final_date": "20/01/2023"
         }
      Route:http://seuIp:8000/api/course/list
	Listará todos os cursos
      Route:http://seuIp:8000/api/course/visualization/{id}
       Trará um unico registro pelo id
      Route:http://seuIp:8000/api/course/update/{id}
       Editará aquele dado em específico
     Route:http://seuIp:8000/api/course/delete/{id}

Estudantes:
        Route:http://seuIp:8000/api/student/create
	{
	"name" : "Carlos",
	"email": "carlos@gmail.com",
        "status": "Ativo"
	"birthday": "30/01/1999",
         }
         {
	"name" : "Jose",
	"email": "jose@gmail.com",
	"status": "Ativo"
	"birthday": "30/01/1999",
         }
         {
	"name" : "Everton",
	"email": "everton@gmail.com",
	"status": "Ativo"
	"birthday": "30/01/1999",
         }
         {
	"name" : "Sandro",
	"email": "sandro@gmail.com",
	"status": "Ativo"
	"birthday": "30/01/1999",
         }
        {
	"name" : "Fausto",
	"email": "fausto@gmail.com",
	"status": "Ativo"
	"birthday": "1999",
         }
         {
	"name" : "Alex",
	"email": "alex@gmail.com",
	"status": "Ativo"
	"birthday": "30/01/1999",
         }
         {
	"name" : "Junio",
	"email": "junior@gmail.com",
	"status": "Ativo"
	"birthday": "30/01/1999",
         }
         {
	"name" : "Aldair",
	"email": "aldair@gmail.com",
	"status": "Ativo"
	"birthday": "30/01/1999",        
         }
         {
	"name" : "Lauro",
	"email": "lauro@gmail.com",
	 "status": "Ativo"
	"birthday": "30/01/1999",
         }
         {
	"name" : "Fernando",
	"email": "fernando@gmail.com",
	 "status": "Ativo"
	"birthday": "30/01/1999",
         }  
      Route:http://seuIp:8000/api/student/list
	Listará todos os cursos
      Route:http://seuIp:8000/api/student/visualization/{id}
       Trará um unico registro pelo id
      Route:http://seuIp:8000/api/student/update/{id}
       Editará aquele dado em específico
     Route:http://seuIp:8000/api/student/delete/{id}    
	

     Teste de estudante menor de 16 ano
       {
	"name" : "Joao",
	"email": "joao@gmail.com",
	"status": "Ativo"
	"birthday": "30/01/2022",
        }

     Faça o update em um dos status para inativo para o teste em cadastro de matrícula
     Pegue o id de Aldair cadastrado anteriormente por exemplo e passe o json { "status" : "Inativo"}

Contas Dos Estudantes:
	 Route:http://seuIp:8000/api/student/create
	{
	"name" : "Carlos",
	"email": "carlos@gmail.com",
        "status": "Ativo"
         }
         {
	"name" : "Jose",
	"email": "jose@gmail.com",
	"status": "Ativo"
         }
         {
	"name" : "Everton",
	"email": "everton@gmail.com",
	"status": "Ativo"
         }
         {
	"name" : "Sandro",
	"email": "sandro@gmail.com",
	"status": "Ativo"
         }
        {
	"name" : "Fausto",
	"email": "fausto@gmail.com",
	"status": "Ativo"
         }
         {
	"name" : "Alex",
	"email": "alex@gmail.com",
	"status": "Ativo"
         }
         {
	"name" : "Junio",
	"email": "junior@gmail.com",
	"status": "Ativo"
         }
         {
	"name" : "Aldair",
	"email": "aldair@gmail.com",
	"status": "Ativo"      
         }
         {
	"name" : "Lauro",
	"email": "lauro@gmail.com",
	 "status": "Ativo"
         }
         {
	"name" : "Fernando",
	"email": "fernando@gmail.com",
	 "status": "Ativo"
	  }  
      Route:http://seuIp:8000/api/student/account/list
	Listará todos os cursos
      Route:http://seuIp:8000/api/student/account/visualization/{id}
       Trará um unico registro pelo id
      Route:http://seuIp:8000/api/student/account/update/{id}
       Editará aquele dado em específico
     Route:http://seuIp:8000/api/student/account/delete/{id}    
Matriculas:
	Contas Dos Estudantes:
	 Route:http://seuIp:8000/api/register/create
	{
	"student_id" : "1",
	"student_account_id": "1",
        "course_id": "4"
         }
         
	{
	"student_id" : "2",
	"student_account_id": "2",
        "course_id": "4"
         }
         
	{
	"student_id" : "3",
	"student_account_id": "3",
        "course_id": "4"
         }
         
	{
	"student_id" : "4",
	"student_account_id": "4",
        "course_id": "4"
         }
        
	{
	"student_id" : "5",
	"student_account_id": "5",
        "course_id": "1"
         }
         
	{
	"student_id" : "6",
	"student_account_id": "6",
        "course_id": "4"
         }
         
	{
	"student_id" : "7",
	"student_account_id": "7",
        "course_id": "4"
         }
         
	{
	"student_id" : "8",
	"student_account_id": "8",
        "course_id": "4"
         }
         
	{
	"student_id" : "9",
	"student_account_id": "9",
        "course_id": "4"
         }
         
	{
	"student_id" : "10",
	"student_account_id": "10",
        "course_id": "4"
         }  
      Route:http://seuIp:8000/api/register/list
	Listará todos os cursos
      Route:http://seuIp:8000/api/register/visualization/{id}
       Trará um unico registro pelo id
      Route:http://seuIp:8000/api/register/update/{id}
       Editará aquele dado em específico
     Route:http://seuIp:8000/api/register/delete/{id}   

Testes De registro de matrícula : 
  Criar uma conta para o estudante
 Route:http://seuIp:8000/api/student/create
	{
	"name" : "Marcelo",
	"email": "marcelo@gmail.com",
        "status": "Ativo"
         }
Criar uma novo aluno que terá aquela conta
Route:http://seuIp:8000/api/student/create
	{
	"name" : "Marcelo",
	"email": "marcelo@gmail.com",
        "status": "Ativo"
	"birthday": "30/01/1999",
         }
  	
 Vai retornar que o curso ja atinigiu o limite máximo
      Route:http://seuIp:8000/api/register/create
	{
	"student_id" : "idMarcelo",
	"student_account_id": "idMarcelo",
        "course_id": "4"
         }


Vai retornar que o curso ja está em andamentou ou encerrou, não é possível mais o cadastro
      Route:http://seuIp:8000/api/register/create
	{
	"student_id" : "idMarcelo",
	"student_account_id": "idMarcelo",
        "course_id": "1"
         }

Vai retornar que o Aluno ja esta cadastrado neste curso atual
      Route:http://seuIp:8000/api/register/create
	{
	"student_id" : "idAldair",
	"student_account_id": "idAldair",
        "course_id": "4"
         }

Vai Retornar que o Aluno está inativo e não pode mais particiar do curso
	Route:http://seuIp:8000/api/student/update/{idAldair}
	{status: "Inativo"}

	Route:http://seuIp:8000/api/student/account/update/{idAldair}
	{status: "Inativo"}
	
	Route:http://seuIp:8000/api/register/create
	{
	"student_id" : "idAldair",
	"student_account_id": "idAldair",
        "course_id": "5"
         }

Vai Retornar que o Aluno Foi cadastrado em outro Curso
	Route:http://seuIp:8000/api/student/update/{idAldair}
	{status: "Ativo"}

	Route:http://seuIp:8000/api/student/account/update/{idAldair}
	{status: "Ativo"}
	
	Route:http://seuIp:8000/api/register/create
	{
	"student_id" : "idAldair",
	"student_account_id": "idAldair",
        "course_id": "5"
         }




 
       

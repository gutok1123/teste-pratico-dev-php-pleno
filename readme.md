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

## Como utilizar

### Para iniciar

```bash
sudo docker-compose -d --build
sudo docker exec -it api bash
composer install
chmod -R 777 bin/console
bin/console doctrine:migrations:migrate
composer require symfony/apache-pack
```

### Cursos

Route POST: http://localhost:8000/api/course/create - Essa rota cria um novo curso

```json
{
"title" : "Curso de Js Ruby",
"description": "Esse é o curso",
"initial_date": "30/01/2022",
"final_date": "20/05/2022"
}
```

```json
{
"title" : "Curso de Java",
"description": "Esse é o curso",
"initial_date": "20/04/2022",
"final_date": "30/05/2022"
}
```

```json

{
"title" : "Curso de C",
"description": "Esse é o curso",
"initial_date": "30/11/2022",
"final_date": "20/12/2022"
}
```

```json
{
"title" : "Curso de Js Ruby",
"description": "Esse é o curso",
"initial_date": "30/11/2022",
"final_date": "20/01/2023"
 }
```

Route GET: http://localhost:8000/api/course/list - Listará todos os cursos
	
Route GET: http://localhost:8000/api/course/visualization/{id} - Trará um unico registro pelo id do curso
       
Route PUT:http://localhost:8000/api/course/update/{id} - Editará aquele dado em específico pelo id do curso
       
Route DELETE:http://localhost:8000/api/course/delete/{id} - Deletara um curso em específico pelo id do curso


### Estudantes
      
 Route POST :http://seuIp:8000/api/student/create - Esta Rota criara um novo Aluno
 
 
```json
{
"name" : "Carlos",
"email": "carlos@gmail.com",
"status": "Ativo"
"birthday": "30/01/1999",
}
```


```json
{
"name" : "Jose",
"email": "jose@gmail.com",
"status": "Ativo"
"birthday": "30/01/1999",
}
```


```json
{
"name" : "Everton",
"email": "everton@gmail.com",
"status": "Ativo"
"birthday": "30/01/1999",
}
```


```json
{
"name" : "Sandro",
"email": "sandro@gmail.com",
"status": "Ativo"
"birthday": "30/01/1999",
}
```


```json
{
"name" : "Fausto",
"email": "fausto@gmail.com",
"status": "Ativo"
"birthday": "1999",
}
```


```json
	 
{
"name" : "Alex",
"email": "alex@gmail.com",
"status": "Ativo"
"birthday": "30/01/1999",
}
```


```json
{
"name" : "Junio",
"email": "junior@gmail.com",
"status": "Ativo"
"birthday": "30/01/1999",
}
```

```json
{
"name" : "Aldair",
"email": "aldair@gmail.com",
"status": "Ativo"
"birthday": "30/01/1999",        
}
```

```json
{
"name" : "Lauro",
"email": "lauro@gmail.com",
"status": "Ativo"
"birthday": "30/01/1999",
}
```


```json
{
"name" : "Fernando",
"email": "fernando@gmail.com",
"status": "Ativo"
"birthday": "30/01/1999",
}  
```

Route GET:http://localhost:8000/api/student/list - Listará todos os cursos
	
Route GET:http://localhost:8000/api/student/visualization/{id} -  Trará um unico registro pelo id do estudante
      
Route PUT:http://localhost:8000/api/student/update/{id} -  Editará aquele dado em específico pelo id do estudante
      
Route DELETE:http://localhost:8000/api/student/delete/{id}  - Esta rota deletar um dado específico pelo id  estudante
	

### Teste  estudante menor de 16 ano

```json
{
"name" : "Joao",
"email": "joao@gmail.com",
"status": "Ativo"
"birthday": "30/01/2022",
}
```

### Retorno
 * Vai retornar que o estudante não pode se cadastrar , pois, tem menos de 16 anos

## Observações Importantes :
- Faça o update em um dos status para inativo para o teste em cadastro de matrícula
    
- Pegue o id de Aldair cadastrado anteriormente por exemplo e passe o json { "status" : "Inativo"}

### Contas Dos Estudantes 

 Route POST:http://localhost:8000/api/student/create - Essa rota cria uma nova conta para o estudante

```json
{
"name" : "Carlos",
"email": "carlos@gmail.com",
"status": "Ativo"
}
```

```json
{
"name" : "Jose",
"email": "jose@gmail.com",
"status": "Ativo"
}
```

```json
{
"name" : "Everton",
"email": "everton@gmail.com",
"status": "Ativo"
}
```

```json
{
"name" : "Sandro",
"email": "sandro@gmail.com",
"status": "Ativo"
}
```

```json
{
"name" : "Fausto",
"email": "fausto@gmail.com",
"status": "Ativo"
}
```

```json
{
"name" : "Alex",
"email": "alex@gmail.com",
"status": "Ativo"
}
```

```json
{
"name" : "Junio",
"email": "junior@gmail.com",
"status": "Ativo"
}
```

```json
{
"name" : "Aldair",
"email": "aldair@gmail.com",
"status": "Ativo"      
}
```

```json
{
"name" : "Lauro",
"email": "lauro@gmail.com",
"status": "Ativo"
}
```

```json
{
"name" : "Fernando",
"email": "fernando@gmail.com",
"status": "Ativo"
}  
```
Route GET:http://localhost:8000/api/student/account/list - Listará todos os cursos
	
Route GET:http://localhost:8000/api/student/account/visualization/{id} -  Trará um unico registro específico relacionado a conta do estudante pelo seu id
      
Route PUT:http://localhost:8000/api/student/account/update/{id} -  Editará aquele dado em específico relacionado a conta do estudante pelo seu id
      
Route DELETE:http://localhost:8000/api/student/account/delete/{id}  - Deletará um registro específico relacionado a conta do estudante pelo seu id

### Matriculas

Route POST:http://localhost:8000/api/register/create - Essa rota cria uma nova matrícula para o estudante com seus registro enquanto aluno e com sua conta 
```json
{
"student_id" : "1",
"student_account_id": "1",
"course_id": "4"
}
```

```json
         
{
"student_id" : "2",
"student_account_id": "2",
"course_id": "4"
}
```

```json
         
{
"student_id" : "3",
"student_account_id": "3",
"course_id": "4"
}
```

```json
         
{
"student_id" : "4",
"student_account_id": "4",
"course_id": "4"
}
```

```json
        
{
"student_id" : "5",
"student_account_id": "5",
"course_id": "1"
}
```

```json
         
{
"student_id" : "6",
"student_account_id": "6",
"course_id": "4"
}
```

```json
         
{
"student_id" : "7",
"student_account_id": "7",
"course_id": "4"
}
```

```json
         
{
"student_id" : "8",
"student_account_id": "8",
"course_id": "4"
}
```

```json        
{
"student_id" : "9",
"student_account_id": "9",
"course_id": "4"
}
```

```json       
{
"student_id" : "10",
"student_account_id": "10",
"course_id": "4"
}  
```
     
Route:http://localhost:8000/api/register/list -Listará todos os cursos
	
Route:http://localhost:8000/api/register/visualization/{id} - Trará um unico registro pelo id da matrícula
       
Route:http://localhost:8000/api/register/update/{id} -  Editará aquele dado em específico pelo id da matrícula
     
Route:http://localhost:8000/api/register/delete/{id} - Deletará aquele dado em específico pelo id da matrícula

### Testes De registro de matrícula  

### Passo 1 : Criar uma conta para o estudante 

Route POST:http://localhost:8000/api/student/create

```json
{
"name" : "Marcelo",
"email": "marcelo@gmail.com",
"status": "Ativo"
}
```

### Passo 2 : Criar uma novo aluno que terá aquela conta

Route POST:http://localhost:8000/api/student/create

```json
{
"name" : "Marcelo",
"email": "marcelo@gmail.com",
"status": "Ativo"
"birthday": "30/01/1999",
}
```

### Passo 3 : Matricular este aluno no curso 4 que anteriormente teve 10 matrículas nele

Route POST :http://localhost:8000/api/register/create

```json
{
"student_id" : "idMarcelo",
"student_account_id": "idMarcelo",
"course_id": "4"
}
```
### Retorno Teste de Registro de Matrícula

 * Vai retornar que o curso ja atinigiu o limite máximo

	

### Teste Para curso em andamento ou finalizado


Route POST:http://localhost:8000/api/register/create

```json
{
"student_id" : "idMarcelo",
"student_account_id": "idMarcelo",
"course_id": "1"
}
```

### Retorno do Teste Para curso em andamento ou finalizado
 * Vai retornar que o curso ja está em andamentou ou encerrou, não é possível mais o cadastro


### Teste Para Aluno Cadastrado no curso que ele ja foi cadastrado anteriormente

Route POST:http://localhost:8000/api/register/create
```json
{
"student_id" : "idAldair",
"student_account_id": "idAldair",
"course_id": "4"
}
```
### Retorno

* Vai retornar que o Aluno ja esta cadastrado neste curso atual


### Teste Para Aluno Inativo

### PASSO 1 : Faça um Update em Student passando seu Id para "Inativo"

Route PUT:http://localhost:8000/api/student/update/{idAldair}

```json
{
"status": "Inativo"
}
```
### PASSO 2 : Faça um Update em StudentAccount passando seu Id para "Inativo"

Route PUT:http://localhost:8000/api/student/account/update/{idAldair}

```json
{
"status": "Inativo"
}
```
### PASSO 3 : Registre o Aluno	

Route POST:http://localhost:8000/api/register/create

```json
{
"student_id" : "idAldair",
"student_account_id": "idAldair",
"course_id": "5"
}
```
	 
### Retorno do Teste Para Aluno Inativo

* Vai Retornar que o Aluno está inativo e não pode mais particiar do curso
	
	
### Teste Para Aluno Cadastrado em curso  se cadastrando em outro curso que ainda não começou e tem menos de 10 pessoas

### PASSO 1 : Acesse Update Student e mude o status para "Ativo" ja que editou este usuário no teste anterior

Route PUT:http://localhost:8000/api/student/update/{idAldair}

```json
{
"status": "Ativo"
}
```

### PASSO 2 :  Acesse Update StudentAccount e mude o status para "Ativo" ja que editou este usuário no teste anterior

Route PUT:http://localhost:8000/api/student/account/update/{idAldair}

```json
{
"status": "Ativo"
}
```

### PASSO 3 : Registre o Usúario

Route POST:http://localhosy:8000/api/register/create

```json
{
"student_id" : "idAldair",
"student_account_id": "idAldair",
"course_id": "5"
}
```
	 
### Retorno

- Vai Retornar que o Aluno Foi cadastrado em outro Curso




 
       

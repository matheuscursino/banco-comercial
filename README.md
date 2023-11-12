# banco-comercial

🏟️ | CRUD de um banco comercial feito em PHP para as aulas de PWII E BD

![img](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![img](https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E)
![img](https://img.shields.io/badge/Bulma-00D1B2?style=for-the-badge&logo=Bulma&logoColor=white)
![img](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![img](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![img](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![img](https://img.shields.io/badge/Apache-D22128?style=for-the-badge&logo=Apache&logoColor=white)

---

## Tabela de conteúdos

- [Arquitetura](#arquitetura)
- [Features](#features)
- [Como executar o projeto](#como-executar-o-projeto)

<a name="arquitetura"></a>

### Arquitetura

Utilizei nesse projeto o padrão de arquitetura MVC como podemos ver no exemplo abaixo:

![mvc](https://github.com/matheuscursino/sistema-autenticacao/assets/142545274/29bba093-9edf-47a3-822b-36cc49535583)

Dessa maneira, separamos a aplicação em 3 camadas (model, view e controller). <br>
A camada **model** é responsável por acessar o banco de dados e realizar as operações básicas (incluir, listar, deletar, consultar). É nessa camada que se encontra os DAOs do projeto. <br>
A camada **view** é responsável por possuir todos os arquivos que o usuário irá ver/interagir. <br>
A camada **controller** é responsável por receber as requisições da camada **view** e posteriormente chamar a camada **model** para realizar as operações no BD.

<a name="features"></a>

### Features

Nesse projeto você conta com 5 principais funções:

- **Criar**
- **Deletar**
- **Atualizar**
- **Listar**
- **Consultar**

Todas entidades possuem cada uma dessas funções.

<a name="como-executar-o-projeto"></a>

### Como executar o projeto

Primeiramente, crie uma cópia local do repositório na sua máquina.

`git clone https://github.com/matheuscursino/sistema-autenticacao.git`

Em seguida, crie um banco de dados MySql e importe o arquivo `bancorm.sql`.

Após isso, mova a pasta do repositório até o diretório em que o servidor APACHE esteja rodando.

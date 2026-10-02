# 🔧 **API - Controle de Chamados de Manutenção**

## 📌 Sobre o projeto

Este projeto consiste em uma **API desenvolvida em PHP** para controlar chamados de manutenção de equipamentos de uma empresa.

A API permite **cadastrar, consultar, atualizar e excluir chamados**, facilitando o acompanhamento dos problemas e dos serviços de manutenção.

Os dados são enviados e recebidos no formato **JSON**.



---

## 🛠️ Tecnologias utilizadas

* **PHP**
* **MySQL**
* **PDO**
* **JSON**
* **Apache**
* **Postman** para testar a API

---

## 📂 Estrutura do projeto

```text
📁 API-Manutencao
│
├── 📄 conexao.php
├── 📄 produtos.php
└── 📄 README.md
```

### `produtos.php`

É o arquivo principal da API. Ele identifica o método HTTP utilizado e realiza a operação correspondente.

### `conexao.php`

Responsável pela conexão do PHP com o banco de dados MySQL.

---

## 🗄️ Banco de dados

O banco de dados utilizado no projeto é:

```sql
manutencao
```

A tabela utilizada possui os seguintes campos:

| Campo         | Descrição                                |
| ------------- | ---------------------------------------- |
| `id`          | Identificador do chamado                 |
| `equipamento` | Equipamento que apresenta o problema     |
| `setor`       | Setor onde o equipamento está localizado |
| `descricao`   | Descrição do problema                    |
| `prioridade`  | Prioridade do chamado                    |
| `status`      | Situação atual do chamado                |

---

## 🚨 Prioridades

A API aceita apenas três tipos de prioridade:

```text
baixa
media
alta
```

Caso seja enviada uma prioridade diferente, a API retorna uma mensagem de erro.

Exemplo:

```json
{
    "erro": "Prioridade inválida. Use: baixa, media ou alta."
}
```

---

## 📋 Status

Os status permitidos são:

```text
aberto
em andamento
concluido
```

Caso seja enviado um status diferente, a API retorna uma mensagem de erro.

Exemplo:

```json
{
    "erro": "Status inválido. Use: aberto, em andamento ou concluido."
}
```

---

# 🔵 Métodos da API

## POST - Cadastrar chamado

O método `POST` é utilizado para cadastrar um novo chamado.

### Exemplo de JSON

```json
{
    "equipamento": "Computador",
    "setor": "Financeiro",
    "descricao": "Computador não liga",
    "prioridade": "alta",
    "status": "aberto"
}
```

### Resposta

```json
{
    "Mensagem": "Chamado cadastrado com sucesso!"
}
```

---

## 🟢 GET - Consultar chamados

O método `GET` é utilizado para consultar os chamados cadastrados.

### Exemplo de resposta

```json
[
    {
        "id": "1",
        "equipamento": "Computador",
        "setor": "Financeiro",
        "descricao": "Computador não liga",
        "prioridade": "alta",
        "status": "aberto"
    }
]
```

Os chamados são organizados pelo `id`.

---

## 🟡 PUT - Atualizar chamado

O método `PUT` é utilizado para atualizar um chamado existente.

### Exemplo de JSON

```json
{
    "id": 1,
    "equipamento": "Computador",
    "setor": "Financeiro",
    "descricao": "Computador com problema na fonte",
    "prioridade": "media",
    "status": "em andamento"
}
```

### Resposta

```json
{
    "Mensagem": "Chamado atualizado com sucesso"
}
```

---

## 🔴 DELETE - Excluir chamado

O método `DELETE` é utilizado para excluir um chamado pelo seu `id`.

### Exemplo de JSON

```json
{
    "id": 1
}
```

### Resposta

```json
{
    "Mensagem": "Chamado excluído com sucesso"
}
```

---

# 🧪 Testando no Postman

A API pode ser testada utilizando o **Postman**.

Para as requisições `POST`, `PUT` e `DELETE`, o corpo da requisição deve ser enviado no formato:

```text
raw → JSON
```

Exemplo de endereço:

```text
http://localhost/seu-projeto/index.php
```

Os métodos utilizados são:

```text
POST
GET
PUT
DELETE
```

---

# 🔐 Validação

Antes de cadastrar ou atualizar um chamado, a API verifica se:

* A prioridade é `baixa`, `media` ou `alta`;
* O status é `aberto`, `em andamento` ou `concluido`.

Isso evita que valores diferentes dos permitidos sejam armazenados no banco de dados.

---

# 📚 Conceitos utilizados

Neste projeto foram utilizados conceitos de:

* API REST;
* Métodos HTTP;
* PHP;
* MySQL;
* PDO;
* JSON;
* `$_SERVER`;
* `file_get_contents()`;
* `json_decode()`;
* `json_encode()`;
* `prepare()`;
* `execute()`;
* `fetchAll()`;
* CRUD.

---

## 🔄 CRUD

A API implementa as quatro operações principais:

| Operação  | Método | Função             |
| --------- | ------ | ------------------ |
| Criar     | POST   | Cadastrar chamado  |
| Ler       | GET    | Consultar chamados |
| Atualizar | PUT    | Alterar chamado    |
| Excluir   | DELETE | Excluir chamado    |

---

## 👨‍💻 Autor

Projeto desenvolvido como atividade prática de desenvolvimento de APIs em PHP.

Esse formato já está pronto para você **copiar e colar no `README.md` do GitHub**.

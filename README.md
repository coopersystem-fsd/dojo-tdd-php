# Dojo TDD PHP

Dojo sobre TDD utilizando PHP.

## Todo

- [x] Utilizar Laravel na versão 6.2
- [x] Utilizar Eloquent como ORM para persistir dados
- [x] Utilizar Docker para trabalhar com stack da aplicação
- [x] Disponibilizar banco postgres
- [x] Criar Feature Test
    ```sh
       php artisan make:test ProdutoTest
    ```
  - [x] Rodar o Test da Feature dentro do container 
  ```sh
    vendor/bin/phpunit tests/Feature/NomeDaSuaClasseTest.php
  ```
  - [x] Rodar o Test de um método específico
    ```sh
      vendor/bin/phpunit tests/Feature/NomeDaSuaClasseTest.php --filter=testNomeDoSeuMetodo
    ```
  - [x] Criar entidade Produto através do framework Laravel
    - id
    - nome
    - quantidade
    - valor
    - created_at
    - updated_at
  - [x] Definir rota utilizando verbos HTTP
  - [ ] Testar requisição utilizando Laravel
    - [x] Verificar Status
    - [x] Tipo de retorno : JSON
  - [x] Testar Cadastro do produto
    - [x] Verificar se o produto foi armazenado no banco de dados
  - [x] Testar consulta de muitos produto
  - [x] Testar atualizar um produto
  - [x] Testar remoção de um produto
  - [ ] Testar consulta de um produto

### Todo : Plus

- [ ] Criar teste unitário para

## Participantes

- Alan Oliveira [ [@sfelix-martins](https://github.com/sfelix-martins) ]
- Samuel Martins [ [@sfelix-martins](https://github.com/sfelix-martins) ]
- Marcus Felipe [ [@mfelipec](https://github.com/mfelipec) ]
- Odilon Garcez [ [@bc05](https://github.com/bc05) ]
- Vinicius Feitosa [ [@vinnyfs89](https://github.com/vinnyfs89) ]

## Licença

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Referências

- [TDD](https://www.devmedia.com.br/test-driven-development-tdd-simples-e-pratico/18533)

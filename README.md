gerenciar os recursos de uma biblioteca. O sistema permite o cadastro e gerenciamento de autores, incluindo nome, data de nascimento e nacionalidade. As categorias de livros também podem ser cadastradas e gerenciadas, com informações como nome e descrição.

O cadastro de livros inclui título, descrição, ISBN, preço, autor e categoria. Para garantir a segurança da aplicação, implementei autenticação JWT, permitindo que apenas usuários autorizados acessem os recursos da API.

Além disso, o sistema possui um modelo de cliente, com nome, email, telefone e endereço, e um modelo de venda para registrar as transações, incluindo cliente, livro, quantidade e valor total.

Para automatizar tarefas, configurei um job agendado que aumenta o preço dos livros em 10% diariamente. Todos os modelos possuem endpoints para as operações CRUD (Criar, Ler, Atualizar e Excluir), permitindo a gestão completa dos dados da biblioteca.

Contem uma collection do postman para realizar testes.

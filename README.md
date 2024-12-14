<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Logo do Laravel"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Status da Build"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total de Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Última Versão Estável"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="Licença"></a>
</p>

## Sobre o Laravel

Laravel é um framework para aplicações web com uma sintaxe expressiva e elegante. Acreditamos que o desenvolvimento deve ser uma experiência agradável e criativa para ser verdadeiramente satisfatório. O Laravel elimina as dificuldades do desenvolvimento ao simplificar tarefas comuns usadas em muitos projetos web, como:

- [Motor de roteamento simples e rápido](https://laravel.com/docs/routing).
- [Container de injeção de dependência poderoso](https://laravel.com/docs/container).
- Suporte a múltiplos back-ends para [sessão](https://laravel.com/docs/session) e armazenamento de [cache](https://laravel.com/docs/cache).
- [ORM de banco de dados](https://laravel.com/docs/eloquent) expressivo e intuitivo.
- [Migrações de esquema](https://laravel.com/docs/migrations) independentes de banco de dados.
- [Processamento robusto de tarefas em segundo plano](https://laravel.com/docs/queues).
- [Transmissão de eventos em tempo real](https://laravel.com/docs/broadcasting).

Laravel é acessível, poderoso e fornece ferramentas necessárias para aplicações grandes e robustas.

## Aprendendo Laravel

Laravel possui a [documentação](https://laravel.com/docs) mais extensa e completa, além de uma biblioteca de tutoriais em vídeo, entre todos os frameworks modernos para aplicações web, tornando fácil começar a usar o framework.

Você também pode experimentar o [Laravel Bootcamp](https://bootcamp.laravel.com), onde será guiado na construção de uma aplicação moderna com Laravel do zero.

Se você não gosta de ler, o [Laracasts](https://laracasts.com) pode ajudar. O Laracasts contém milhares de tutoriais em vídeo sobre uma variedade de tópicos, incluindo Laravel, PHP moderno, testes unitários e JavaScript. Melhore suas habilidades explorando nossa biblioteca de vídeos abrangente.

## Patrocinadores do Laravel

Gostaríamos de estender nossos agradecimentos aos seguintes patrocinadores por financiarem o desenvolvimento do Laravel. Se você estiver interessado em se tornar um patrocinador, visite o [programa de parceiros do Laravel](https://partners.laravel.com).

## Contribuindo

Obrigado por considerar contribuir com o framework Laravel! O guia de contribuição pode ser encontrado na [documentação do Laravel](https://laravel.com/docs/contributions).

## Código de Conduta

Para garantir que a comunidade Laravel seja acolhedora para todos, revise e siga o [Código de Conduta](https://laravel.com/docs/contributions#code-of-conduct).

## Vulnerabilidades de Segurança

Se você descobrir uma vulnerabilidade de segurança no Laravel, envie um e-mail para Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). Todas as vulnerabilidades de segurança serão tratadas prontamente.

## Licença

O framework Laravel é um software de código aberto licenciado sob a [licença MIT](https://opensource.org/licenses/MIT).

---

## Configurando ou Baixando um Arquivo `.env`

O arquivo `.env` é essencial para configurar variáveis de ambiente no Laravel, como conexões de banco de dados, chaves de API e outras configurações sensíveis. Aqui estão algumas dicas para configurar ou baixar um modelo do arquivo `.env`:

1. **Baixando o Modelo do Arquivo `.env`:**
   - O Laravel geralmente inclui um arquivo chamado `.env.example` no repositório do projeto. Você pode copiá-lo e renomeá-lo para `.env`:
     ```bash
     cp .env.example .env
     ```

2. **Editando o Arquivo `.env`:**
   - Abra o arquivo `.env` em um editor de texto e configure as variáveis conforme necessário. Por exemplo:
     ```env
     APP_NAME=Laravel
     APP_ENV=local
     APP_KEY=base64:chave_gerada_aqui
     APP_DEBUG=true
     APP_URL=http://localhost

     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=nome_do_banco
     DB_USERNAME=usuario
     DB_PASSWORD=senha
     ```

3. **Gerando a Chave da Aplicação:**
   - Após configurar o arquivo `.env`, você deve gerar a chave da aplicação usando o Artisan:
     ```bash
     php artisan key:generate
     ```

4. **Certifique-se de Não Compartilhar o Arquivo `.env`:**
   - O arquivo `.env` contém informações sensíveis e não deve ser compartilhado ou incluído no controle de versão (como Git). O arquivo `.gitignore` do Laravel já está configurado para ignorar o `.env`.

Seguindo essas etapas, você pode configurar corretamente o arquivo `.env` para o seu projeto Laravel.

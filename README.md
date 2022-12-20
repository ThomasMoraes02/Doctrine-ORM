## Criar base de dados via orm
php bin/doctrine.php orm:schema-tool:create

## Executar via cli
php bin/doctrine.php dbal:run-sql "SELECT * FROM Student"
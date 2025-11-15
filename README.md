# Test_Task_Weather

Example of clean code

Details:
The `/app/src/Application/Config/AppConfig.php` file stores runtime settings, including database connection parameters.

There is also an archive with a database, a table and test data taken from the links you provided (now stored under `schema/`).

To test the UI part, open `app/public/index.html` – it is served as the main page in the Docker environment, while API requests still go through `index.php`.

## Dockerized development

The project ships with an Nginx + PHP-FPM + MariaDB stack defined in `docker-compose.yml`.

1. Build and start the stack from the project root:
   ```bash
   docker compose up --build -d
   ```
2. Open `http://localhost:8080/` – `public/index.html` (now the homepage) is bundled with the application code inside `/app`, and requests such as `/city/search` proxy to PHP-FPM.

MariaDB (running on the recommended `mariadb:12.0` image) is automatically seeded via `schema/schema.sql` on the first start. You can customize the database credentials by overriding the `DB_HOST`, `DB_NAME`, `DB_USER`, and `DB_PASSWORD` environment variables on the `php` service in the compose file; sensible defaults are already provided.

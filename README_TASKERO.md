Taskero - Personal Task Manager

Setup (MySQL required):

1. Copy `.env.example` to `.env` and set DB credentials.
2. Install dependencies: `composer install`
3. Generate app key: `php artisan key:generate`
4. If switching to MySQL, update `.env` with your MySQL creds (DB_CONNECTION=mysql).
5. Run migrations: `php artisan migrate`
6. Serve: `php artisan serve`

Auth: simple register/login implemented.
Tasks: CRUD + toggle status (Pending/Completed).

View database table (MySQL):

1. Ensure MySQL is running and your `.env` DB settings are correct.
2. From project root, you can run a query with `php artisan tinker`:

```bash
php artisan tinker
>>> DB::table('tasks')->get();
```

3. Or use the MySQL client (replace values from your `.env`):

```bash
mysql -u DB_USERNAME -p -h DB_HOST -P DB_PORT DB_DATABASE
-- then run:
SELECT * FROM tasks LIMIT 50;
```

4. Or run a one-liner (replace values):

```bash
mysql -u DB_USERNAME -p'PASSWORD' -h DB_HOST -P DB_PORT DB_DATABASE -e "SELECT * FROM tasks LIMIT 50;"
```

5. If you prefer GUI, use TablePlus, Sequel Pro, or phpMyAdmin and connect using `.env` credentials.

Windows users (Command Prompt):

```bat
REM interactive
mysql -u DB_USERNAME -p -h DB_HOST -P DB_PORT DB_DATABASE
REM one-liner (will prompt for password unless included)
mysql -u DB_USERNAME -p"PASSWORD" -h DB_HOST -P DB_PORT DB_DATABASE -e "SELECT * FROM tasks LIMIT 50;"
```

If `mysql` is not available and your system uses MariaDB client, replace `mysql` with `mariadb` in the commands above.


# Installation

## Prerequisites
1. Install [PHP](https://www.php.net/downloads) (version 7.4 or higher) and ensure the **php-mysql** extension is enabled/installed
2. Install [MariaDB](https://mariadb.org/download/) or any other MySQL database server (ex, [MySQL](https://dev.mysql.com/downloads/))
3. Set up a local server environment (ex, [XAMPP](https://www.apachefriends.org/))

## Installation Steps
1. **Clone the Repository**:
   ```
   git clone https://github.com/itsYali/task-tracker-project.git
   cd task-tracker-project
3. **Set Up the Database**:
   - Create a new database in MariaDB called `task_tracker`
   - Import `database_setup.sql` file into the database you created

4. **Configure the Project**:
   - Open the `database.php` file in web > config folder
   - Update the database credentials if needed (user is `root` and no password by default):
   ```php
   $host = 'localhost';
   $dbname = 'task_tracker';
   $username = '<your_username>';
   $password = '<your_password>';
5. **Start the Server**:
   - Use PHP’s built-in server:
     php -S localhost:8000
   - Or start your local server (e.g., XAMPP)

6. **Access the Webpage**:
   - Open your browser and navigate to the server address from step 4

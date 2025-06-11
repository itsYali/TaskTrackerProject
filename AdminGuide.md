# Admin Guide

*to be completed*

**Configure the Project**:
   - Open the `database.php` file located in the `web/config` folder using a text editor like `nano`:
     ```bash
     nano web/config/database.php
     ```
   - Update the database credentials if needed (default user is `root` with no password):
     ```php
     $host = 'localhost';
     $dbname = 'task_tracker';
     $username = 'root';
     $password = '';
     ```

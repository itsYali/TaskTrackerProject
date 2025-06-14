# Installation

## Prerequisites
1. Set up an SSH/Serial connection to your Raspberry Pi using [PuTTY](https://www.putty.org/)
2. Make sure your Raspberry Pi is connected to your local network and has internet access
3. Install [PHP](https://www.php.net/downloads) (version 7.4 or higher) on your Raspberry Pi and ensure the **php-mysql** extension is enabled/installed
   - Use the following command to install PHP and required extensions:
     ```bash
     sudo apt update
     sudo apt install php php-mysql
     ```
4. Install [MariaDB](https://mariadb.org/download/)
   - Use the following command to install MariaDB:
     ```bash
     sudo apt install mariadb-server
     ```
5. Install [Git](https://git-scm.com/downloads) (to clone this repository)
   - Use the following command to install Git:
     ```bash
     sudo apt install git
     ```

---

## Installation Steps
1. **Clone the Repository**:
   - Run the following commands to clone the repository:
     ```bash
     git clone https://github.com/itsYali/task-tracker-project.git
     cd task-tracker-project
     ```

2. **Set Up the Database**:
   - Log in to MariaDB:
     ```bash
     sudo mysql -u root
     ```
   - Create a new database called `task_tracker`:
     ```sql
     CREATE DATABASE task_tracker;
     ```
   - Exit MariaDB:
     ```sql
     EXIT;
     ```
   - Import the `database_setup.sql` file into the database:
     ```bash
     mysql -u root task_tracker < web/database_setup.sql
     ```

3. **Start the Server**:
   - *If you don't know your device's IP address, you can find it by running:*
     ```bash
     hostname -I
     ```
   - Use PHP’s built-in server to start the application:
     ```bash
     php -S <raspberry-pi-ip>:8000 -t web
     ```
   - Replace `<raspberry-pi-ip>` with the actual IP address of your Raspberry Pi
   - This will make the application accessible on your Raspberry Pi’s IP address (e.g., `http://<raspberry-pi-ip>:8000`)
   

5. **Access the Webpage**:
   - Open your browser on your local machine and navigate to:
     ```
     http://<raspberry-pi-ip>:8000
     ```
   - Replace `<raspberry-pi-ip>` with the actual IP address of your Raspberry Pi. 

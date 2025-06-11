# Task Tracker - Project Specifications

## 1. Demo Scenario Overview

### What specific features will you present?

**Core Features to Demonstrate:**
- **User Authentication System**: Complete registration and login functionality with session management
- **Task Management**: Add new tasks with names and target dates
- **Task Status Tracking**: Mark tasks as complete/incomplete 
- **Task Filtering**: Filter tasks by status (all, completed, incomplete, overdue, upcoming)
- **Personal Dashboard**: User-specific task lists
- **Data Validation**: Form validation for user input and for handling errors

### What user actions will be shown?

**Demonstration Flow:**
1. **New User Registration**: Create account with username, email, and password
2. **User Login**: Authenticate existing user and establish session
3. **Add Multiple Tasks**: Create tasks with different target dates (past, present, future)
4. **Task Completion**: Mark several tasks as completed to show status changes
5. **Filter Demonstration**: Show all filter options (completed, incomplete, overdue, upcoming)
6. **Session Management**: Demonstrate logout and login persistence

### What parts of the application will be functional?

**Fully Functional Components:**
- Complete user registration and authentication system
- Session-based user management
- Full CRUD operations for tasks (Create, Read, Update status)
- Dynamic content generation based on user data
- Real-time filtering with database queries
- Form validation and error handling
- Responsive navigation based on authentication status

**Pseudo/Limited Implementation:**
- Basic styling (functional but not polished)
- Task editing/deletion (not implemented for demo scope)
- Advanced user profile management

## 2. Planned URL Endpoints

| URL Path | HTTP Method(s) | Expected Variables | Session Variables | Database Operations |
|----------|----------------|-------------------|-------------------|-------------------|
| `/index.php` | GET | None | `user_id`, `username` (optional) | None |
| `/register.php` | GET, POST | POST: `username`, `password`, `confirm_password` | None initially | INSERT into `users` table |
| `/login.php` | GET, POST | POST: `username`, `password` | Sets `user_id`, `username` | SELECT from `users` table |
| `/dashboard.php` | GET | GET: `filter` (optional) | Requires `user_id`, `username` | SELECT from `tasks` table with filters |
| `/add_task.php` | GET, POST | POST: `task_name`, `target_date` | Requires `user_id` | INSERT into `tasks` table |
| `/filter_tasks.php` | POST | POST: `task_id`, `action` | Requires `user_id` | UPDATE `tasks` table (completion status) |
| `/logout.php` | GET | None | Destroys all session variables | None |

## 3. Database Design

### a. Entity-Relationship Diagram (ERD)

*to be added*


**Relationship:** One user can have many tasks, but tasks only belong to their respective user.

## b. Relational Model

### USERS Table
| Column Name | Data Type | Constraints |r
|-------------|-----------|-------------|
| user_id | INT | AUTO_INCREMENT PRIMARY KEY |
| username | VARCHAR(50) | UNIQUE NOT NULL |
| email | VARCHAR(100) | UNIQUE NOT NULL |
| password_hash | VARCHAR(255) | NOT NULL |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP |

### TASKS Table
| Column Name | Data Type | Constraints |
|-------------|-----------|-------------|
| task_id | INT | AUTO_INCREMENT PRIMARY KEY |
| user_id | INT | NOT NULL, FOREIGN KEY |
| task_name | VARCHAR(255) | NOT NULL |
| target_date | DATE | NOT NULL |
| is_completed | BOOLEAN | DEFAULT FALSE |
| completed_date | DATE | NULL |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP |

## c. Normalization

### Third Normal Form (3NF) Compliance

*to be added*

### Design Decisions for Data Integrity

1. **Entity Separation**: User and task data are stored in separate tables to eliminate redundancy. User information is stored once and referenced by tasks through foreign key relationships.

2. **Proper Data Types**:
   - `target_date` and `completed_date` use DATE type for accurate date handling
   - `is_completed` uses BOOLEAN for clear binary status

3. **Referential Integrity**:
   - Foreign key constraint with CASCADE DELETE ensures orphaned tasks are removed when users are deleted
   - Maintains data consistency across related tables

4. **Redundancy Elimination**:
   - Task completion status uses boolean field rather than string
   - Automatic timestamp management prevents manual date entry errors

5. **Null Handling**:
   - `completed_date` allows NULL values for incomplete tasks
   - Prevents storage of meaningless placeholder dates

This design helps the PHP app to process user authentication, task management logic, and generate dynamic content while maintaining data integrity in MariaDB.



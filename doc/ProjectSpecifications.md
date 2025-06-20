# Task Tracker - Project Specifications

## 1. Demo Scenario Overview

### What specific features will you present?

**Core Features to Demonstrate:**
- **User Authentication System**: Complete registration and login functionality with session management
- **Task Management**: Add new tasks with names and target dates
- **Task Status Tracking**: Mark tasks as complete
- **Task Filtering**: Filter tasks by status (all, completed, incomplete)
- **Personal Dashboard**: User-specific task lists
- **Data Validation**: Form validation for user input and for handling errors

### What user actions will be shown?

**Demonstration Flow:**
1. **New User Registration**: Create account with username and password
2. **User Login**: Authenticate existing user and establish session
3. **Add Multiple Tasks**: Create tasks with different target dates (past, present, future)
4. **Task Completion**: Mark several tasks as completed to show status changes
5. **Filter Demonstration**: Show all filter options (completed, incomplete)
6. **Session Management**: Demonstrate logout and login persistence

### What parts of the application will be functional?

**Fully Functional Components:**
- User registration and login system
- Session-based user management
- Real-time filtering with database queries
- Form validation and error handling
- Responsive navigation based on authentication status

**Pseudo/Limited Implementation:**
- Basic styling (functional but not polished)
- Task editing/deletion (not implemented yet)
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
```mermaid
erDiagram
direction lr
    users {
      INT user_id PK
      VARCHAR username
      VARCHAR password_hash
    }
    tasks {
      INT task_id PK
      INT user_id FK
      VARCHAR task_name
      DATE target_date
      BOOLEAN is_completed
      DATE completed_date
      TIMESTAMP created_at
    }
    users ||--o{ tasks : "has"
```

**Relationship:** 
   - users have a 1 to Many relationship with tasks
   - tasks have a Many to 1 relationship with users

### b. Relational Model

#### USERS Table
| Column Name | Data Type | Constraints |
|-------------|-----------|-------------|
| user_id | INT | AUTO_INCREMENT PRIMARY KEY |
| username | VARCHAR(50) | UNIQUE NOT NULL |
| password_hash | VARCHAR(255) | NOT NULL |

#### TASKS Table
| Column Name | Data Type | Constraints |
|-------------|-----------|-------------|
| task_id | INT | AUTO_INCREMENT PRIMARY KEY |
| user_id | INT | NOT NULL, FOREIGN KEY |
| task_name | VARCHAR(255) | NOT NULL |
| target_date | DATE | NOT NULL |
| is_completed | BOOLEAN | DEFAULT FALSE |
| completed_date | DATE | NULL |
| created_at | TIMESTAMP | DEFAULT CURRENT_TIMESTAMP |

### c. Normalization

#### Third Normal Form (3NF) Compliance

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
   - Task completion status uses boolean rather than string
   - Automatic timestamp management prevents manual date entry errors

This design helps the PHP app to process user authentication, task management logic, and generate dynamic content while maintaining data integrity in MariaDB.



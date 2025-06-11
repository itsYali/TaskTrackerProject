# Project Goal

## Project Title **Task Tracker**

## High-Level Functionalities
- Users can add tasks, set target dates, and mark tasks as completed
- Tasks can be filtered by status (e.g., complete/incomplete)
- User registration and login system for managing a personal list of tasks

## Example Scenarios

### Scenario: A User Wants to Track a New Task
1. **Message Request**:
   - The user wants to add a new task to the list, including a name and a target date

2. **How It’s Processed**:
   - The user enters the task name and selects a target date in an "Add Task" form
   - PHP receives the form data, checks that all required fields are filled, and validates the input
   - If valid, PHP saves the new task to the database

3. **How the System Responds**:
   - If the task is added successfully, the system shows a confirmation message and updates the task list to include the new task
   - If there is an error (such as missing information), the system displays an error message and asks the user to correct it

### Scenario: A User Wants to Filter Their Tasks by Status
1. **Message request**:
   - The user wants to view certain tasks by filtering the list (for example by completed, incomplete)
  
2. **How it’s processed**:
   - The user selects a filter option (by clicking a button or choosing from a dropdown menu)
   - PHP receives the selected filter and queries the database for tasks that match the chosen status
      
3. **How the system responds**:
   - The system displays an updated list of tasks that meet the filter criteria
   - If no tasks match the filter, the system shows a message like “No tasks found.”

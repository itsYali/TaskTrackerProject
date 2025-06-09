1. Demo Scenario Overview
Describe what your final demo will include.

What specific features will you present? [high-level descriptions]

What user actions will be shown? [the triggers of the functional flows]

What parts of the application will be functional (even if other parts are not yet finished)? [the functional flows, may include some pseudo implementations]

2. Planned URL Endpoints
List all the web pages or API endpoints your application will support for the demo.

For each endpoint, provide:

URL path (e.g., /login.php, /submit_form.php)

Supported HTTP method(s) (GET, POST)

Expected HTTP variables (from form or query string)

Session variables that are used or required

Database tables/operations involved (e.g., fetch user info, insert new record)

You may organize this as a table for clarity.

3. Database Design
a. Entity-Relationship Diagram (ERD)
Draw an ERD that represents the entities and their relationships involved in your application.

b. Relational Model
Translate your ERD into relational tables, including:

Table names

Column names and data types

Primary keys and foreign keys

c. Normalization
Briefly explain how your relational model meets Third Normal Form (3NF).

Identify any design decisions you made to remove redundancy or ensure data integrity.

💡 Notes:
You do not need to implement these pages or the database yet.

You are not required to design the full application. Just focus on what’s needed to support your demo.

The goal is to show that your demo:

Requires PHP to process logic (e.g., user input, decision-making)

Uses MariaDB to read/write meaningful data

Produces dynamic content on the webpage

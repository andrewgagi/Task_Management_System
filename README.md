# Lumen Task Management API

This is a simple task RESTful API built with Lumen,

## Setup Instructions

### 1. Clone the Project

First, clone the repository to your local machine:

```bash
git clone https://github.com/andrewgagi/Task_Management_System
cd Task_Management_System

2. Install Dependencies
Install the required PHP dependencies using Composer:

bash
Copy code
composer install
3. Configure the Environment
Create a copy of the .env.example file and name it .env:

bash
Copy code
cp .env.example .env
Open the .env file and update the database configuration to match your local setup. For PostgreSQL, the configuration should look like this:

env
Copy code
APP_NAME=Task_Management_System
APP_ENV=local
APP_KEY=SomeRandomKey
APP_DEBUG=true
APP_URL=http://localhost
APP_TIMEZONE=UTC

LOG_CHANNEL=stack

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=task_manager
DB_USERNAME=postgres
DB_PASSWORD=your_password_here

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
Replace your_password_here with your actual PostgreSQL password.


4. Run Database Migrations
Run the database migrations to set up the necessary tables in your database:

bash
Copy code
php artisan migrate
6. Start the Development Server
You can start the Lumen development server to test the API:

bash
Copy code
php -S localhost:8000 -t public
7. Test the API Endpoints
Here are some example API requests to test the endpoints:

Create a Task
Create a new task with the following request:

bash
Copy code
curl -X POST http://localhost:8000/api/v1/tasks \
     -H "Content-Type: application/json" \
     -d '{"title": "Sample Task", "due_date": "2024-10-01", "description": "A sample task description"}'
Get All Tasks
Retrieve a list of all tasks and add the following params for filtering page, due_date_start, search and due_date_end:

bash
Copy code
curl -X GET http://localhost:8000/api/v1/tasks
Get a Single Task
Get details of a specific task by ID:

bash
Copy code
curl -X GET http://localhost:8000/api/v1/tasks/{id}
Replace {id} with the actual task ID.

Update a Task
Update an existing task:

bash
Copy code
curl -X PUT http://localhost:8000/api/v1/tasks/{id} \
     -H "Content-Type: application/json" \
     -d '{"title": "Updated Task Title", "due_date": "2024-10-02", "description": "Updated description"}'
Delete a Task
Delete a specific task by ID:

bash
Copy code
curl -X DELETE http://localhost:8000/api/v1/tasks/{id}

8. Additional Information
Ensure PostgreSQL is Running: Make sure your PostgreSQL server is running and accessible.
Verify Database Credentials: Double-check your .env file for correct database credentials.
```

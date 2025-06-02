# 🗒️ Personal Task Management API

A lightweight and secure Laravel API for managing your personal to-do list.  
Keep track of tasks, set priorities, manage deadlines, and stay productive — all via a simple, RESTful interface.

---

## 🚀 Features

- 📝 **Create & Manage Tasks**  
  Add, edit, delete tasks with titles, details, and due dates.

- 🚦 **Set Task Priorities**  
  Organize your workflow using low, medium, and high priority levels.

- ✅ **Mark Tasks as Done**  
  Toggle completion status and keep your list up to date.

- 🔍 **Filter & Sort**  
  View tasks by priority, due date, or completion status.

- 🔐 **User Authentication**  
  Personal login with API token-based security via Laravel Sanctum or Passport.

- 📦 **Built with Laravel 10+**  
  Clean code, scalable structure, and ready to integrate with any frontend.

---

## 🛠️ Tech Stack

- 🔧 **Backend**: Laravel 10.x  
- 🗃️ **Database**: MySQL / SQLite / PostgreSQL  
- 🔐 **Auth**: Sanctum / Passport (token-based)  
- 📡 **API Format**: REST (JSON)

---

## 📦 Installation
- Bash:
- git clone [https://github.com/yourusername/task-management-api.git](https://github.com/0AhmedElHawary0/TaskManager.git)
- cd task-management-api
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- ✏️ Make sure to configure your database in .env before migrating.

---

## 📡 API Endpoints (Sample)
| Method | Endpoint                  | Description                           |
|--------|---------------------------|-------------------------------------  |
| POST   | `/api/register`           | Register a new user                   |
| POST   | `/api/login`              | Login and receive an auth token       |
| POST   | `/api/logout`             | Logout (requires authentication)      |

> The following routes require a valid Bearer token (`Authorization` header).

| Method | Endpoint                  | Description                           |
|--------|---------------------------|---------------------------------------|
| GET    | `/api/user/{userId}/profile` | Retrieve user profile              |
| GET    | `/api/user/{userId}/tasks`   | List tasks belonging to the user   |
| POST   | `/api/tasks`              | Create a new task                     |
| PUT    | `/api/tasks/{taskId}`     | Update an existing task               |
| DELETE | `/api/tasks/{taskId}`     | Delete a task                         |
| GET    | `/api/tasks/orderedTasks` | Get tasks ordered by priority         |

---

## 🤝 Contributing
- Feel free to fork this repo and submit a pull request!
- If you find bugs or have feature ideas, open an issue.

<div align="center">

# 🎓 Search-For-College — College Search & Discovery Portal

**A web-based system for searching colleges by course and city, browsing detailed college profiles, and managing listings**

[![PHP](https://img.shields.io/badge/PHP-Server--Side-777BB4?style=flat-square&logo=php)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=flat-square&logo=mysql)](https://www.mysql.com/)
[![HTML5](https://img.shields.io/badge/HTML5-Structure-E34F26?style=flat-square&logo=html5)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-Styling-1572B6?style=flat-square&logo=css3)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-Validation-F7DF1E?style=flat-square&logo=javascript)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![XAMPP](https://img.shields.io/badge/XAMPP-Local%20Server-FB7A24?style=flat-square)](https://www.apachefriends.org/)

</div>

---

## 📋 Table of Contents

1. [What is this Project?](#-what-is-this-project)
2. [Key Features](#-key-features)
3. [How it Works — End-to-End Flow](#-how-it-works--end-to-end-flow)
4. [Architecture Overview](#-architecture-overview)
5. [Project Structure](#-project-structure)
6. [Database Design](#-database-design)
7. [Page / Endpoint Reference](#-page--endpoint-reference)
8. [Installation & Running](#-installation--running)
9. [Tech Stack Summary](#-tech-stack-summary)
10. [User Roles](#-user-roles)
11. [Limitations](#-limitations)
12. [Future Scope](#-future-scope)
13. [Credits](#-credits)

---

## 🎯 What is this Project?

**Search For College** is a dynamic, web-based application that simplifies how students and parents discover higher-education options. Traditionally, college research means scattered websites, brochures, and manual comparison, which is slow and confusing. This system brings everything into one centralized, easy-to-use portal where users can filter colleges by **course** and **city**, then view fees, ranking, contact details, website, and facilities in one place.

The system has two clearly separated sides:

- 🧍 **Student / Visitor side**: search colleges by course and city, browse all listings, filter by category (Top 10, Affordable, Engineering), and send queries through a contact form.
- 🛠️ **Admin side**: log in securely and manage college listings (add, update, delete) from a dashboard.

Built with **PHP** on the backend and **MySQL** (via **XAMPP**) for data and server support, with an **HTML/CSS/JavaScript** frontend.

---

## ✨ Key Features

| Feature | Details |
|---|---|
| 🔐 **Admin Authentication** | Admin login through `login.html` → `login.php`, session-protected dashboard, and `logout.php` to end the session |
| 🔎 **College Search** | Search by course name (e.g., BBA, BCA, MBA, BTech) plus one or more cities (Delhi, Mumbai, Chennai, Kolkata, Chandigarh, Jaipur, Indore, Varanasi) via `search.php` |
| ✅ **Input Validation** | Client-side JavaScript blocks empty course names and no-city selections before the form is submitted |
| 🏛️ **College Profiles** | Each listing shows image, location, fees, ranking, contact number, official website, and facilities |
| 🗂️ **Category Tabs** | `colleges.php` provides **All Colleges**, **Top 10**, **Affordable**, and **Engineering** tabs |
| 📬 **Contact Form** | `contact.php` collects name, email, subject, and message with required-field and email checks, and output sanitised with `htmlspecialchars()` |
| 🛠️ **Admin Dashboard** | Cards to **Add**, **Update**, and **Delete** colleges, with access restricted to logged-in admins |
| 🎨 **Card-Based UI** | Dark, card-style layout with hover animations and a responsive grid for college listings |

---

## 🔄 How it Works — End-to-End Flow

```
Visitor opens index.html
        │
        ▼
Enters course name + selects city(ies)  ──►  JS validation (validateSearch)
        │
        ▼
search.php?course=BCA&city[]=Delhi
        │   • reads and normalises GET parameters
        │   • matches() checks course list + city for every college
        ▼
Matching college cards displayed  (or "no colleges found")
        │
        ▼
Visitor browses colleges.php (tabs) / sends a query via contact.php
```

**Admin flow**

```
login.html ──► login.php ──► $_SESSION['admin_logged_in'] = true ──► dashboard.php
                                                                  │
                          Add College / Update College / Delete College
                                                                  │
                                                           logout.php (session destroyed)
```

---

## 🏗️ Architecture Overview

```
┌──────────────────────────┐      HTTP       ┌──────────────────────────┐
│        Browser           │ ◄─────────────► │   Apache (XAMPP)         │
│  HTML + CSS + JavaScript │                 │   PHP scripts            │
└──────────────────────────┘                 └────────────┬─────────────┘
                                                          │ mysqli (db.php)
                                                          ▼
                                             ┌──────────────────────────┐
                                             │  MySQL  →  college_db    │
                                             │  (managed via phpMyAdmin)│
                                             └──────────────────────────┘
```

The project is split into modules for separation of concerns and easy maintenance:

| Module | Responsibility |
|---|---|
| **Authentication** | Admin login, session handling, logout |
| **College Module** | Listing and viewing college details (location, course, fees, ranking, image) |
| **Search Module** | Filters colleges by course and city based on user input |
| **Admin Module** | Add, update, and delete college data |
| **Contact Module** | Receives user queries through the contact form |
| **UI Module** | Responsive, user-friendly interface and navigation |

---

## 📁 Project Structure

```
Search-For-College/
├── index.html        # Home page: search form, featured college cards, JS validation
├── colleges.php      # All colleges with tabs (All / Top 10 / Affordable / Engineering)
├── search.php        # Search results by course + city
├── contact.php       # Contact form
├── login.html        # Admin login form
├── login.php         # Admin authentication + session start
├── dashboard.php     # Admin dashboard (session protected)
├── logout.php        # Destroys the session and redirects to login
├── db.php            # MySQL connection (mysqli) to college_db
├── style.php         # Shared stylesheet rules
├── add-college.php   # Linked from dashboard: add a college
├── update-college.php# Linked from dashboard: edit a college
└── delete-college.php# Linked from dashboard: remove a college
```

---

## 🗄️ Database Design

Database name: **`college_db`** (connection settings in `db.php`).

| Table | Purpose | Key Fields |
|---|---|---|
| `users` | Login data for registered users | `id`, `username`, `password` |
| `admins` | Admin login data | `id`, `username`, `password` |
| `colleges` | Colleges listed on the platform | `id`, `name`, `location`, `course`, `image` |
| `contacts` | Messages submitted via the contact form | `id`, `name`, `email`, `message` |

**Data dictionary**

| Attribute | Type | Description | Example |
|---|---|---|---|
| `id` | INT (Primary Key) | Unique ID used across tables | `1` |
| `username` | VARCHAR(50) | Login username (UNIQUE) | `john_doe` |
| `password` | VARCHAR(50) | Password for authentication | — |
| `name` | VARCHAR(255) | College or person name | `IIT Delhi` |
| `location` | VARCHAR(255) | Physical location | `New Delhi` |
| `course` | VARCHAR(255) | Course offered | `B.Tech Computer Science` |
| `image` | VARCHAR(255) | Image filename | `iit_delhi.jpg` |
| `email` | VARCHAR(100) | Contact form email | `example@email.com` |
| `message` | TEXT | Contact form message | `I want more information about IIT Delhi` |

**Integrity & constraints:** primary keys on all major tables, `NOT NULL` on required fields, `UNIQUE` on usernames, and input sanitisation / validation on forms.

---

## 📄 Page / Endpoint Reference

| Page | Method | Access | Description |
|---|---|---|---|
| `index.html` | GET | Public | Home page with search form and featured colleges |
| `search.php` | GET | Public | Params: `course` (text), `city[]` (one or more). Returns matching colleges |
| `colleges.php` | GET | Public | Lists colleges with category tabs |
| `contact.php` | GET / POST | Public | Contact form (`name`, `email`, `subject`, `message`) |
| `login.html` | GET | Public | Admin login form |
| `login.php` | POST | Public | Verifies admin credentials, sets `admin_logged_in` session flag |
| `dashboard.php` | GET | Admin only | Add / Update / Delete college cards |
| `logout.php` | GET | Admin | Ends the session |

**Tab logic in `colleges.php`**

- **Top 10**: ranking ≤ 10
- **Affordable**: fees below ₹30,000 per year
- **Engineering**: college name contains IIT, DTU, NSUT, or IIIT

---

## 🚀 Installation & Running

**Prerequisites:** [XAMPP](https://www.apachefriends.org/) (Apache + MySQL + PHP) and a modern browser (Chrome, Firefox, Edge).

```bash
# 1. Clone the repository
git clone https://github.com/<your-username>/Search-For-College.git

# 2. Copy the project folder into XAMPP's web root
#    Windows:  C:\xampp\htdocs\Search-For-College
#    Linux:    /opt/lampp/htdocs/Search-For-College
```

3. Open the **XAMPP Control Panel** and start **Apache** and **MySQL**.
4. Open **phpMyAdmin** (`http://localhost/phpmyadmin`) and create a database named **`college_db`**, then create the tables from the [Database Design](#-database-design) section.
5. Check `db.php` and adjust if needed:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "college_db";
```

6. Visit **`http://localhost/Search-For-College/index.html`** in your browser.
7. For the admin panel, open **`http://localhost/Search-For-College/login.html`**.

> ⚠️ The admin credentials in `login.php` are hardcoded for demo purposes. Change them before using this anywhere beyond local testing.

---

## 🧰 Tech Stack Summary

| Layer | Technology |
|---|---|
| Frontend | HTML5, CSS3, JavaScript |
| Backend | PHP |
| Database | MySQL (phpMyAdmin for management) |
| Server | Apache via XAMPP |
| Browser | Chrome / Firefox / any modern browser |

---

## 👥 User Roles

| Role | Capabilities |
|---|---|
| **Student / Visitor** | Search colleges by course and city, browse listings and category tabs, view college details, send messages through the contact form |
| **Admin** | Log in, access the dashboard, add / update / delete college listings |

---

## ⚠️ Limitations

- **No role-based access control**: only a single admin login exists.
- **Hardcoded admin account**: no dynamic registration, role management, or credential change.
- **Basic validation**: mostly client-side; server-side validation and sanitisation are minimal.
- **Plain-text passwords**: no password hashing.
- **No notifications**: no email or SMS alerts.
- **Static data**: pages update only on reload (no AJAX / WebSocket updates).
- **No file-type validation** for uploads.
- **Limited analytics**: no dashboards, downloadable reports, or insights.
- **Not fully responsive**: not optimised for mobile and tablet screens.
- **Contact messages are not persisted yet**: the database insert / email code in `contact.php` is commented out.

---

## 🔭 Future Scope

- **Role-Based Access Control**: Admin, College Representative, and Student roles with separate permissions
- **Advanced Analytics**: most-searched colleges, popular courses, city-wise trends
- **Admission Status & Calendar Integration**: deadlines, application tracking, reminders for exams and counselling rounds
- **Fee Structure & Scholarship Modules**: tuition and hostel breakdowns, eligibility checks
- **Secure Authentication**: password hashing, email verification, multi-factor authentication
- **Mobile App Companion**: Android / iOS app for searching and notifications
- **Real-Time Notifications**: email / SMS alerts for new colleges, courses, and admission openings
- **Cloud Deployment**: AWS / Azure hosting for scalability and availability
- **Prepared statements and server-side validation** across all database queries

---

## 🙏 Credits

**Project:** Search For College
**Developed by:** Lakshya Kansal

---

<div align="center">

Made with ❤️ using PHP, MySQL, HTML, CSS & JavaScript

</div>

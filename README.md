# 🐚 The Shell Store | NSBM E-Commerce Platform

A fully functional, database-driven e-commerce web application designed for the **NSBM Green University** community. This project facilitates the digital sale of decorative and rare seashells through a secure, dual-interface system.

---

## 🚀 Key Features

### 🛠️ Administrative Suite (Backend)
* **CRUD Operations:** Full management of products and categories (Create, Read, Update, Delete).
* **Media Handling:** Automated image upload system that synchronizes file storage with MySQL records.
* **Access Control:** Secured via PHP Sessions to prevent unauthorized URL bypass.

### 🛒 Customer Experience (Frontend)
* **Dynamic Discovery:** Real-time product fetching and keyword-based search functionality.
* **Shopping Cart:** Session-persistent cart allowing quantity updates and automatic total calculation.
* **User Profile:** Personal dashboard for students/staff to track order history and invoice details.

---

## 💻 Tech Stack
* **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5.
* **Backend:** PHP (Modular architecture).
* **Database:** MySQL (Relational schema with Foreign Key constraints).
* **Server:** XAMPP / Apache.

---

## 📂 Architecture & File Structure
The project follows a modular structure for scalability and security:
- `/admin_area`: Management dashboard and CRUD logic.
- `/functions`: Centralized `common_function.php` library.
- `/includes`: Database connection and UI components.
- `/product_images`: Server-side storage for inventory media.

---

## 🔧 Installation & Setup
1. Clone the repository to your `htdocs` folder.
2. Import the provided `.sql` file into your **phpMyAdmin**.
3. Configure `includes/db.php` with your database credentials.
4. Access via `localhost/the_shell_store`.



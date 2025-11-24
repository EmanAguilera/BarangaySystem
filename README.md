# BarangaySystem: Digital Resident Record Management

<p align="center">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white"/>
  <img alt="MySQL" src="https://img.shields.io/badge/MySQL-%234479A1.svg?style=for-the-badge&logo=mysql&logoColor=white"/>
  <img alt="Bootstrap" src="https://img.shields.io/badge/Bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white"/>
  <img alt="JavaScript" src="https://img.shields.io/badge/JavaScript-%23F7DF1E.svg?style=for-the-badge&logo=javascript&logoColor=black"/>
</p>

**BarangaySystem** is a dedicated web-based information system designed to modernize the administrative operations of **Barangay 52 Zone 4**. It serves as a centralized database that transitions the barangay from manual pen-and-paper filing to a secure, searchable, and efficient digital record-keeping system.

The application is architected to assist the **Barangay Secretary and Chairman** in managing population data, generating reports, and ensuring data integrity within the local government unit. It features a clean, professional interface built with **Bootstrap 5** to ensure responsiveness and usability on official barangay computers.

---

## Key Features

The platform focuses on administrative efficiency and data security, featuring a streamlined portal for officials:

### 🏛️ Administrative Portal (Secretary & Chairman)
- **Secure Access Control:** Implements role-based authentication using **password hashing (`password_hash`)** and strict session management to prevent unauthorized access to sensitive resident data.
- **Resident Enrollment (Fill-Out Form):** A modern, responsive intake form for registering new residents, capturing essential demographics (Age, Gender, Civil Status), socio-economic data, and health records (Vaccine Brand).
- **Advanced Data Management (CRUD):** Full capability to **Create, Read, Update, and Delete** resident records via a centralized dashboard.
- **Smart Search & Filtering:** A robust search engine capable of filtering residents by Name, Address, Status (Senior, PWD, Solo Parent), or specific keywords instantly.
- **Dynamic Pagination:** Handles large datasets efficiently by splitting records into navigable pages with customizable entry limits (10/50/100).
- **Data Privacy Compliance:** The system structure is designed with privacy in mind, ensuring critical contact details are managed securely within the local environment.

---

## 🛠️ Technology Stack

| Stack Component | Technologies Used |
|---|---|
| **Frontend** | HTML5, CSS3, **Bootstrap 5**, JavaScript |
| **Backend** | Native **PHP** (Structured & Modular) |
| **Database** | **MySQL** (Relational Database) |
| **Environment** | XAMPP (Apache Server) |

---

## ⚙️ Local Installation Guide

To set up and run this project locally, execute the following steps:

1.  **Prerequisites:** Ensure **XAMPP** is installed and operational.

2.  **Clone the repository:**
    ```bash
    git clone https://github.com/EmanAguilera/BarangaySystem.git
    ```

3.  **File Placement:** Place the cloned `BarangaySystem` folder within the XAMPP `htdocs` directory.

4.  **Start Services:** Initiate the **Apache** and **MySQL** modules via the XAMPP Control Panel.

5.  **Database Setup:**
    - Access phpMyAdmin by clicking the **Admin** button for MySQL.
    - Create a new database named `php_connection` (matches the project config).
    - Select the database and navigate to the **Import** tab.
    - Select the `.sql` file located in the project's `/database` folder.
    - Click **Import** to populate the necessary tables and data.

6.  **Project Execution:** Open a web browser and navigate to:
    ```
    http://localhost/BarangaySystem/views/login.php
    ```
    *Note: Accessing the system requires starting from the Login page to initialize the secure session.*

---

## 📸 Project Gallery

<details>
<summary><strong>🔐 Authentication & Security</strong></summary>
<br>

**Secure Login Portal**
> Entry point for Barangay Officials protected by session validation.
<img width="100%" alt="Login Interface" src="https://github.com/user-attachments/assets/50b8095a-dc36-4b46-bf14-e0877a0cc99a" />

<br>

**Admin Registration**
> Account creation interface for authorized personnel.
<img width="100%" alt="Register Interface" src="https://github.com/user-attachments/assets/59259657-c50e-4c3a-a301-0290d070d37c" />
</details>

<details>
<summary><strong>📝 Resident Registration Interface</strong></summary>
<br>

**Digital Intake Form**
> A streamlined, Bootstrap-styled form for encoding new resident demographics and health data.
<img width="100%" alt="Data Entry Form" src="https://github.com/user-attachments/assets/ab41b107-3c51-44d3-9fae-93aeaa8a79f4" />
</details>

<details>
<summary><strong>📊 Data Management & Operations</strong></summary>
<br>

**Central Records Dashboard**
> The main view for the Secretary/Chairman featuring search, filtering, and pagination.
<img width="1832" height="1324" alt="image" src="https://github.com/user-attachments/assets/5dce65eb-1f2b-4392-876c-8fab3d4d3f2a" />


<br>

**Record Maintenance (Edit Mode)**
> Interface for updating existing resident information with pre-filled data.
<img width="1832" height="1324" alt="image" src="https://github.com/user-attachments/assets/5bf9b681-74ce-4de3-9ecf-234ba63cbc13" />
</details>

---
**Developed by Eman Ryan L. Aguilera**
*Academic Coursework: Content Management Systems & Database Configuration*

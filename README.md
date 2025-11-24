# BarangaySystem: Digital Resident Record Management

<p align="center">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white"/>
  <img alt="MySQL" src="https://img.shields.io/badge/MySQL-%234479A1.svg?style=for-the-badge&logo=mysql&logoColor=white"/>
  <img alt="Bootstrap" src="https://img.shields.io/badge/Bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white"/>
  <img alt="JavaScript" src="https://img.shields.io/badge/JavaScript-%23F7DF1E.svg?style=for-the-badge&logo=javascript&logoColor=black"/>
</p>

**BarangaySystem** is an informatics platform that is a specialized web-based system designed to modernize administrative processes of the **Barangay 52 Zone 4**. It can also serve as a centralized database, facilitating the replacement of manual pen and paper archival methods with a safe, searchable and effective digital record keeping system.

The architecture of the system is to assist the **Barangay Secretary and Chairman** in the administration of the demographic information, creation of administrative reports, and data integrity in the local governing body. Its user interface is built on **Bootstrap 5**, which also ensures responsiveness and usability on official barangay computing systems by giving it a clean and professional look.

---

## Key Features

The platform focuses on administrative efficiency and data security, featuring a streamlined portal for officials:

### 🏛️ Administrative Portal (Secretary & Chairman)
- **Secure Access Control:** Applies role based authentication through **password hashing (password hash)** along with a strict system of session control to avoid involvement of unauthorized access to the sensitive resident information.
- **Resident Enrollment (Fill-Out Form):** The new responsive digital intake form of registering new residents, including demographics (Age, Gender, Civil Status), socio-economic and health information (Vaccine Brand).
- **Advanced Data Management (CRUD):** Complete access to **Create**, **Read**, **Update**, and **Delete** resident records through an easy to use centralized dashboard.
- **Smart Search & Filtering:** A powerful search engine that allows to filter residents by Name, Address, Status (Senior, PWD, Solo Parent) or specific keywords immediately.
- **Dynamic Pagination:** It is an efficient way to work with large datasets, managing records into navigable pages with adjustable entry points (10/50/100).
- **Data Privacy Compliance:** The system is architected with privacy concerns, and critical contact information is kept securely in the local surrounding.

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

To achieve this and implement this project in this area, do the following:

1.  **Prerequisites:** Make XAMPP installed and running.

2.  **Clone the repository:**
    ```bash
    git clone https://github.com/EmanAguilera/BarangaySystem.git
    ```

3.  **File Placement:** Move the BarangaySystem folder that was cloned to the XAMPP htdocs folder.

4.  **Start Services:** **Apache** and **MySQL** modules start using the XAMPP Control Panel.

5.  **Database Setup:**
    - MySQL phpMyAdmin Click the **Admin** button and access phpMyAdmin.
    - The new database will be called php-connection (this is suitable to the project setup).
    - Open the database and choose the tab **Import**.
    - Choose the.sql file in the project/database folder.
    - Click **Import** to fill the required tables and data.

6.  **Project Execution:** Open a web browser and navigate to:
    ```
    http://localhost/BarangaySystem/views/login.php
    ```
    *Note: In order to access the system, one has to begin with the login page to initialize the secure session.*

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

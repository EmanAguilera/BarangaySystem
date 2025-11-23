-- phpMyAdmin SQL Dump
-- Generation Time: Nov 25, 2025 at 09:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_connection`
--

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `residentno` int(5) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `age` int(2) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `civilstatus` varchar(25) NOT NULL,
  `educbackground` varchar(75) NOT NULL,
  `occupation` varchar(75) NOT NULL,
  `vaccine` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`residentno`, `lastname`, `firstname`, `middlename`, `address`, `relationship`, `age`, `birthday`, `gender`, `civilstatus`, `educbackground`, `occupation`, `vaccine`, `status`, `contact`) VALUES
(1, 'Santos', 'Juan', 'Dela Cruz', 'Block 1 Lot 5 Mabini St.', 'Head', 45, '1979-05-12', 'Male', 'Married', 'College Graduate', 'Driver', 'Pfizer', 'None', '09171234567'),
(2, 'Santos', 'Maria', 'Reyes', 'Block 1 Lot 5 Mabini St.', 'Wife', 42, '1982-08-20', 'Female', 'Married', 'College Graduate', 'Teacher', 'Sinovac', 'None', '09177654321'),
(3, 'Santos', 'Miguel', 'Reyes', 'Block 1 Lot 5 Mabini St.', 'Child', 18, '2006-02-15', 'Male', 'Single', 'High School', 'Student', 'Pfizer', 'None', '09171112222'),
(4, 'Garcia', 'Ricardo', 'Mendoza', '123 Rizal Avenue', 'Head', 65, '1959-11-30', 'Male', 'Widowed', 'High School Graduate', 'Retired', 'Moderna', 'Senior', '09223334444'),
(5, 'Garcia', 'Lita', 'Mendoza', '123 Rizal Avenue', 'Child', 35, '1989-04-10', 'Female', 'Single', 'College Graduate', 'Call Center Agent', 'AstraZeneca', 'None', '09225556666'),
(6, 'Dizon', 'Pedro', 'Lim', '45 Luna St.', 'Head', 50, '1974-01-01', 'Male', 'Married', 'Vocational', 'Mechanic', 'Janssen', 'None', '09189998888'),
(7, 'Dizon', 'Elena', 'Tan', '45 Luna St.', 'Wife', 48, '1976-03-15', 'Female', 'Married', 'High School Graduate', 'Housewife', 'Sinovac', 'None', '09187776666'),
(8, 'Dizon', 'Carla', 'Tan', '45 Luna St.', 'Child', 22, '2002-07-07', 'Female', 'Single', 'College Undergraduate', 'Service Crew', 'Pfizer', 'None', '09185554444'),
(9, 'Bautista', 'Jose', 'Cruz', '789 Bonifacio St.', 'Head', 29, '1995-09-09', 'Male', 'Single', 'College Graduate', 'IT Specialist', 'Moderna', 'None', '09998887777'),
(10, 'Reyes', 'Ana', 'Santos', '101 del Pilar St.', 'Head', 32, '1992-12-25', 'Female', 'Separated', 'College Graduate', 'Nurse', 'Pfizer', 'Solo Parent', '09170001111'),
(11, 'Reyes', 'Joshua', 'Santos', '101 del Pilar St.', 'Child', 5, '2019-06-01', 'Male', 'Single', 'N/A', 'None', 'None', 'None', 'N/A'),
(12, 'Tan', 'Wei', 'Go', '888 Ongpin St.', 'Head', 60, '1964-05-05', 'Male', 'Married', 'College Graduate', 'Businessman', 'Sinovac', 'Senior', '09178888888'),
(13, 'Tan', 'Grace', 'Sy', '888 Ongpin St.', 'Wife', 58, '1966-10-10', 'Female', 'Married', 'College Graduate', 'Businesswoman', 'Sinovac', 'None', '09179999999'),
(14, 'Lopez', 'Antonio', 'Garcia', '55 Aguinaldo Highway', 'Head', 40, '1984-02-14', 'Male', 'Married', 'High School Graduate', 'Construction Worker', 'AstraZeneca', 'None', '09201231234'),
(15, 'Lopez', 'Maricel', 'Torres', '55 Aguinaldo Highway', 'Wife', 38, '1986-06-20', 'Female', 'Married', 'High School Graduate', 'Vendor', 'Sinovac', 'None', '09204321432'),
(16, 'Lopez', 'Junior', 'Torres', '55 Aguinaldo Highway', 'Child', 12, '2012-01-01', 'Male', 'Single', 'Elementary', 'Student', 'Pfizer', 'None', 'N/A'),
(17, 'Mercado', 'Sofia', 'Villar', '22 Quezon Blvd.', 'Head', 27, '1997-03-03', 'Female', 'Single', 'College Graduate', 'Freelancer', 'Moderna', 'PWD', '09151112233'),
(18, 'Villanueva', 'Mark', 'Delos Reyes', '67 Taft Ave.', 'Head', 33, '1991-11-11', 'Male', 'Married', 'Vocational', 'Electrician', 'Johnson & Johnson', 'None', '09456667777'),
(19, 'Villanueva', 'Jenny', 'Perez', '67 Taft Ave.', 'Wife', 30, '1994-04-04', 'Female', 'Married', 'College Undergraduate', 'Cashier', 'Sinovac', 'None', '09458889999'),
(20, 'Aquino', 'Benigno', 'Cojuangco', '500 Edsa', 'Head', 55, '1969-08-21', 'Male', 'Widowed', 'College Graduate', 'Public Servant', 'Pfizer', 'None', '09181234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`residentno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `residentno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
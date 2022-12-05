-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql202.epizy.com
-- Generation Time: Jul 19, 2022 at 01:41 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_32182808_examinationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `exam_time_in_minutes` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_category`
--

INSERT INTO `exam_category` (`id`, `category`, `exam_time_in_minutes`) VALUES
(2, 'PHP Assessment', '20'),
(4, 'Content Delivery Network', '20'),
(5, 'Science', '30'),
(10, 'Math', '8'),
(11, 'Filipino', '25'),
(12, 'English', '10'),
(14, 'Database Management', '40');

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `exam_type` varchar(250) NOT NULL,
  `total_question` varchar(250) NOT NULL,
  `correct_answer` varchar(250) NOT NULL,
  `wrong_answer` varchar(250) NOT NULL,
  `exam_time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_results`
--

INSERT INTO `exam_results` (`id`, `username`, `exam_type`, `total_question`, `correct_answer`, `wrong_answer`, `exam_time`) VALUES
(2, 'Kuruto', 'Science', '5', '2', '3', '2022-07-14'),
(8, 'Carlo', 'Science', '5', '2', '3', '2022-07-15'),
(12, 'Kuruto', 'Science', '5', '0', '5', '2022-07-16'),
(13, 'Kuruto', 'Science', '5', '3', '2', '2022-07-17'),
(14, 'elisha', 'Science', '5', '3', '2', '2022-07-17'),
(16, 'Carlo', 'Filipino', '8', '3', '5', '2022-07-17'),
(18, 'Elisha', 'Math', '6', '5', '1', '2022-07-17'),
(19, 'Kenny', 'English', '8', '4', '4', '2022-07-17'),
(20, 'Usagi', 'Filipino', '8', '8', '0', '2022-07-17'),
(22, 'Kuruto', 'Math', '6', '2', '4', '2022-07-17'),
(23, 'Carlo', 'English', '8', '4', '4', '2022-07-18'),
(24, 'Carlo', 'Filipino', '8', '7', '1', '2022-07-18'),
(27, 'Ken123', 'English', '8', '4', '4', '2022-07-19'),
(28, 'piperific', 'English', '8', '5', '3', '2022-07-19'),
(29, 'piperific', 'Filipino', '8', '8', '0', '2022-07-19'),
(30, 'piperific', 'Science', '5', '3', '2', '2022-07-19'),
(31, 'piperific', 'Math', '6', '6', '0', '2022-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `AdminID` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`AdminID`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE `tbl_questions` (
  `id` int(11) NOT NULL,
  `question_no` varchar(500) NOT NULL,
  `question` varchar(250) NOT NULL,
  `opt1` varchar(250) NOT NULL,
  `opt2` varchar(250) NOT NULL,
  `opt3` varchar(250) NOT NULL,
  `opt4` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`id`, `question_no`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `category`) VALUES
(2, '1', 'What is the best-selling video game?', 'Grand Theft Auto V', 'Minecraft', 'Tetris (EA)', 'Wii Sports', 'Minecraft', 'Content Delivery Network'),
(3, '2', 'What is the best-selling game console?', 'PlayStation 2', 'Game Boy & Game Boy Color', 'PlayStation 4', 'Nintendo DS', 'PlayStation 2', 'Content Delivery Network'),
(6, '1', 'Brass gets discoloured in air because of the presence of which of the following gases in air?', 'Oxygen', 'Carbon dioxide', 'Hydrogen sulphide', 'Nitrogen', 'Hydrogen sulphide', 'Science'),
(7, '2', 'Which of the following is a non-metal that remains liquid at room temperature?', 'Phosphorous', 'Bromine', 'Chlorine', '	Helium', 'Bromine', 'Science'),
(8, '3', 'Chlorophyll is a naturally occurring chelate compound in which central metal is', 'copper', 'magnesium', 'iron', 'calcium', 'magnesium', 'Science'),
(9, '4', 'Which of the following is used in pencils?', 'Graphite', 'Silicon', 'Charcoal', 'Phosphorous', 'Graphite', 'Science'),
(10, '5', 'Which of the following metals forms an amalgam with other metals?', 'Tin', 'Mercury', 'Lead', 'Zinc', 'Mercury', 'Science'),
(14, '1', '9 + 10 = ?', '19', '21', '18', '22', '19', 'Math'),
(15, '1', 'Who said this immortal words â€œA Filipino is worth dying forâ€ ?', 'Corazon Aquino', 'Gloria Macapagal Arroyo', 'Rodrigo Duterte', 'Ninoy Aquino', 'Ninoy Aquino', 'Filipino'),
(16, '2', 'What are the provinces that consist the acronym CALABARZON (Name them)', 'Cavite, Laguna, Batangas, Rizal, Quezon', 'Cavite, Laguna, Rizal', 'Cavite, La Union, Bicol, Rizal, Quezon', 'Cavite', 'Cavite, Laguna, Batangas, Rizal, Quezon', 'Filipino'),
(17, '3', 'The Bataan Death March took place in what year?', '1890', '1950', '1942', '1560', '1942', 'Filipino'),
(18, '1', 'correct spelling ', 'adjust', 'addjust', 'ad-just', 'adjast', 'adjust', 'English'),
(19, '4', 'Which city is known as the \"Walled City?\"', 'Makati', 'Intramuros', 'Malolos', 'Cebu', 'Intramuros', 'Filipino'),
(20, '2', '10 + 15 = ?', '10', '20', '25', '30', '25', 'Math'),
(21, '5', 'Which country occupied the Philippines during World War II?', 'German', 'Japan', 'America', 'India', 'Japan', 'Filipino'),
(22, '3', '12 Ã— 2 = ?', '20', '22', '24', '25', '24', 'Math'),
(23, '6', 'Mayon Volcano is located in which province?', 'Cagayan', 'Manila', 'Albay', 'Quezon', 'Albay', 'Filipino'),
(24, '4', '6 - 5 = ?', '4', '11', '1', '2', '1', 'Math'),
(25, '7', 'What pen name did Marcelo H del Pilar use in his writings?', 'Mongol', 'Plaridel', 'MarceH', 'Pilar', 'Plaridel', 'Filipino'),
(26, '2', 'sound of a cat', 'roar', 'aw aw', 'meow', 'sssss', 'meow', 'English'),
(27, '8', 'What is the original name of Luneta park?', 'Rizal Park', 'Pook Pasyalan', 'Bagumbayan', 'LunetaPark', 'Bagumbayan', 'Filipino'),
(28, '5', '20 / 4 = ?', '5', '10', '15', '20', '5', 'Math'),
(29, '6', '7 + 7 = ?', '20', '14', '15', '18', '14', 'Math'),
(30, '3', 'Choose the correct spelling', 'Sabstrate', 'Substrate ', 'Sabstreyt', 'Sabsthrate', 'Substrate ', 'English'),
(31, '4', 'Choose the correct spelling', 'Sabstrate', 'Substrate ', 'Sabstreyt', 'Sabsthrate', 'Substrate ', 'English'),
(32, '5', 'Choose the correct spelling ', 'Beach', 'Bich', 'Bhich', 'Baech', 'Beach', 'English'),
(33, '6', 'Choose the correct spelling ', 'Controller ', 'Chontroller ', 'Controler', 'Countroller', 'Controller', 'English'),
(34, '7', 'Choose the correct spelling ', 'Forgte', 'Porge', 'Fourge', 'Forge', 'Forge', 'English'),
(35, '8', 'Choose the correct spelling ', 'Mechanical ', 'Mekanikall', 'Michanecal', 'Mechanicall', 'Mechanical ', 'English'),
(36, '1', 'adda', 'asd', 'dsa', 'asd', 'asddds', 'dsa', 'CIT'),
(37, '1', 'In a database, the object  used to enter data in a table.', 'Form', 'Information', 'Objects', 'Primary', 'Form', 'Database Management');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `StudentID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `age` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`StudentID`, `name`, `email`, `age`, `address`, `username`, `contact`, `password`) VALUES
(1, 'Kurt', 'kurtdenzel51@gmail.com', '20', 'Valenzuela City', 'Kuruto', '09173857651', 'Password'),
(2, 'Carlo', 'carlo@gmail.com', '20', 'Valenzuela City', 'Carlo', '09874615341', 'Password'),
(3, 'Elisha', 'elisha@gmail.com', '20', 'Caloocan City', 'elisha', '09873976876', '12341234'),
(5, 'Aronn Duran', 'duran.aronnmarc@gmail.com', '20', 'Caloocan City', 'Aronn', '09254768121', '12341234'),
(12, 'Jerricke', 'magsinojerricke@gmail.com', '19', 'Maypajo City', 'Aesalt', '09126548765', '12341234'),
(14, 'Testing', 'testing@gmail.com', '22', 'Makati City', 'testing', '09126548567', '12341234'),
(16, 'Rex', 'esmeraldarex@gmail.com', '23', 'Taguig City', 'esmeralda', '09857143562', 'esmeralda'),
(18, 'Elisha ', 'lazaga.elishachristine@ue.edu.ph', '20', 'Caloocan City', 'Elisha', '09218653270', 'elisha123'),
(19, 'Bayani', 'bayani010@gmail.com', '20', 'Caloocan City', 'Bayani123', '09164364921', 'Bayani123'),
(20, 'Merill', 'mmerill@gmail.com', '20', 'Blk 19 lot 24 quintanar st., Sta. Maria Bulacan', 'Usagi', '09123456789', 'ayatow_08'),
(22, 'KenKeannu', 'KenKean@gmail.com', '21', 'Malabon City', 'KenKeannu', '09786678887', 'Ken12345'),
(23, 'Piper Vause', 'forlightsum2021@gmail.com', '17', 'Valenzuela City ', 'piperific', '09494848427', 'maemaganda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`StudentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 11:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `analytics_id` int(11) NOT NULL,
  `report_id` int(11) NOT NULL,
  `passenger_count` int(11) DEFAULT NULL,
  `occupancy_rate` decimal(5,2) DEFAULT NULL,
  `trip_count` int(11) DEFAULT NULL,
  `average_speed` decimal(5,2) DEFAULT NULL,
  `analysis_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `analytics`
--

INSERT INTO `analytics` (`analytics_id`, `report_id`, `passenger_count`, `occupancy_rate`, `trip_count`, `average_speed`, `analysis_date`) VALUES
(1, 1, 150, 75.00, 20, 45.50, '2024-10-27 18:10:35'),
(2, 2, 200, 85.00, 25, 50.00, '2024-10-27 18:10:35'),
(3, 3, 120, 60.00, 15, 40.00, '2024-10-27 18:10:35'),
(4, 4, 180, 90.00, 30, 55.00, '2024-10-27 18:10:35'),
(5, 5, 220, 80.00, 28, 48.00, '2024-10-27 18:10:35'),
(6, 1, 160, 78.00, 22, 46.00, '2024-10-27 18:10:35'),
(7, 2, 210, 82.00, 27, 52.00, '2024-10-27 18:10:35'),
(8, 3, 130, 62.00, 17, 42.00, '2024-10-27 18:10:35'),
(9, 4, 190, 88.00, 32, 57.00, '2024-10-27 18:10:35'),
(10, 5, 230, 84.00, 29, 49.00, '2024-10-27 18:10:35'),
(11, 1, 170, 80.00, 23, 47.00, '2024-10-27 18:10:35'),
(12, 2, 220, 86.00, 26, 53.00, '2024-10-27 18:10:35'),
(13, 3, 140, 64.00, 18, 41.00, '2024-10-27 18:10:35'),
(14, 4, 200, 89.00, 31, 58.00, '2024-10-27 18:10:35'),
(15, 5, 240, 87.00, 30, 50.00, '2024-10-27 18:10:35'),
(16, 1, 180, 82.00, 24, 48.00, '2024-10-27 18:10:35'),
(17, 2, 230, 84.00, 28, 54.00, '2024-10-27 18:10:35'),
(18, 3, 150, 66.00, 19, 43.00, '2024-10-27 18:10:35'),
(19, 4, 210, 90.00, 33, 59.00, '2024-10-27 18:10:35'),
(20, 5, 250, 85.00, 29, 51.00, '2024-10-27 18:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `purchase_date` date NOT NULL,
  `depreciation_rate` decimal(5,2) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_id`, `name`, `value`, `purchase_date`, `depreciation_rate`, `category`, `location`) VALUES
(1, 'Bus A', 100000.00, '2020-05-10', 10.00, 'Bus', 'Main Depot'),
(2, 'Bus B', 95000.00, '2021-03-15', 10.00, 'Bus', 'Main Depot'),
(3, 'Spare Tires', 500.00, '2022-06-25', 20.00, 'Spare Part', 'Garage'),
(4, 'Engine Oil', 100.00, '2023-01-05', 15.00, 'Consumable', 'Warehouse'),
(5, 'Brake Pads Set', 200.00, '2022-04-17', 20.00, 'Spare Part', 'Garage'),
(6, 'Air Conditioning Unit', 1200.00, '2020-08-08', 7.00, 'Equipment', 'Depot Maintenance'),
(7, 'Fuel Reserve - 1000 Liters', 1500.00, '2022-09-15', 5.00, 'Fuel', 'Fuel Station'),
(8, 'Cleaning Kit', 50.00, '2023-02-10', 5.00, 'Consumable', 'Garage'),
(9, 'Battery Pack', 300.00, '2021-07-19', 8.00, 'Spare Part', 'Warehouse'),
(10, 'Transmission Fluid', 75.00, '2022-12-12', 15.00, 'Consumable', 'Depot Storage'),
(11, 'Steering Wheel', 150.00, '2022-10-01', 8.00, 'Spare Part', 'Garage'),
(12, 'GPS Tracker', 250.00, '2021-05-10', 12.00, 'Equipment', 'Main Depot'),
(13, 'Bus C', 105000.00, '2019-11-22', 10.00, 'Bus', 'Main Depot'),
(14, 'Fuel Pump', 600.00, '2020-04-10', 7.00, 'Equipment', 'Garage'),
(15, 'Headlight Set', 100.00, '2022-05-17', 10.00, 'Spare Part', 'Depot Maintenance'),
(16, 'Rearview Mirrors', 80.00, '2023-06-01', 12.00, 'Spare Part', 'Garage'),
(17, 'Engine Coolant', 40.00, '2022-07-07', 15.00, 'Consumable', 'Depot Storage'),
(18, 'First Aid Kit', 20.00, '2023-01-01', 5.00, 'Safety Equipment', 'Main Depot'),
(19, 'Seat Covers Set', 200.00, '2021-09-14', 8.00, 'Spare Part', 'Warehouse'),
(20, 'Bus Maintenance Tools', 500.00, '2022-02-10', 12.00, 'Equipment', 'Maintenance Room');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `seat_number` int(11) NOT NULL,
  `route` varchar(100) NOT NULL,
  `booking_date` date NOT NULL,
  `ticket_price` decimal(10,2) NOT NULL,
  `status` enum('confirmed','pending','cancelled') DEFAULT 'confirmed',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `bus_id` int(11) NOT NULL,
  `bus_number` varchar(20) NOT NULL,
  `route` varchar(100) DEFAULT NULL,
  `capacity` int(11) NOT NULL,
  `model` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `price` int(11) NOT NULL DEFAULT 0,
  `estimated_time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`bus_id`, `bus_number`, `route`, `capacity`, `model`, `year`, `status`, `price`, `estimated_time`) VALUES
(1, 'Bus 101', 'Kampala - Entebbe', 50, 'Mercedes-Benz', 2018, 'active', 5000, 1),
(2, 'Bus 102', 'Kampala - Jinja', 40, 'Volvo', 2020, 'active', 10000, 2),
(3, 'Bus 103', 'Kampala - Mbarara', 60, 'Scania', 2019, 'active', 15000, 4),
(4, 'Bus 104', 'Kampala - Mbale', 35, 'Toyota', 2017, 'inactive', 5000, 1),
(5, 'Bus 105', 'Kampala - Gulu', 55, 'Isuzu', 2021, 'active', 10000, 2),
(6, 'Bus 106', 'Kampala - Arua', 45, 'MAN', 2016, 'inactive', 5000, 1),
(7, 'Bus 107', 'Kampala - Fort Portal', 50, 'Iveco', 2020, 'active', 15000, 3),
(8, 'Bus 108', 'Kampala - Lira', 30, 'Hyundai', 2018, 'active', 5000, 1),
(9, 'Bus 109', 'Kampala - Kisoro', 70, 'King Long', 2022, 'active', 15000, 4),
(10, 'Bus 110', 'Kampala - Masaka', 40, 'Daewoo', 2019, 'inactive', 5000, 1),
(11, 'Bus 111', 'Kampala - Hoima', 60, 'Nissan', 2021, 'active', 10000, 3),
(12, 'Bus 112', 'Kampala - Kabale', 50, 'Kia', 2019, 'active', 10000, 2),
(13, 'Bus 113', 'Kampala - Jinja Road', 45, 'Hino', 2018, 'inactive', 5000, 1),
(14, 'Bus 114', 'Kampala - Nakasongola', 35, 'Renault', 2017, 'active', 5000, 1),
(15, 'Bus 115', 'Kampala - Rukungiri', 55, 'Ford', 2022, 'active', 15000, 4),
(16, 'Bus 116', 'Kampala - Mityana', 40, 'Chevrolet', 2020, 'inactive', 5000, 1),
(17, 'Bus 117', 'Kampala - Iganga', 65, 'Mitsubishi', 2021, 'active', 15000, 4),
(18, 'Bus 118', 'Kampala - Kabarole', 55, 'Volvo', 2022, 'active', 10000, 2),
(19, 'Bus 119', 'Kampala - Soroti', 75, 'Benz', 2019, 'active', 15000, 5),
(20, 'Bus 120', 'Kampala - Kayunga', 40, 'Peugeot', 2020, 'inactive', 10000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FeedbackID` int(11) NOT NULL,
  `FeedbackContent` text NOT NULL,
  `FeedbackDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FeedbackID`, `FeedbackContent`, `FeedbackDate`) VALUES
(1, 'The bus service is great, but could be faster in the mornings.', '2024-11-08 07:17:52'),
(2, 'I had a wonderful experience on the bus, keep it up!', '2024-11-08 07:17:52'),
(3, 'The staff is very friendly, but the buses could be cleaner.', '2024-11-08 07:17:52'),
(4, 'I had a long wait, but the ride was smooth and comfortable.', '2024-11-08 07:17:52'),
(5, 'The app is useful, but it could be more user-friendly.', '2024-11-08 07:17:52'),
(6, 'Buses are on time, but more routes would be helpful.', '2024-11-08 07:17:52'),
(7, 'I appreciate the punctuality of the service, but sometimes the buses are crowded.', '2024-11-08 07:17:52'),
(8, 'The schedule needs to be more reliable, I missed my bus today.', '2024-11-08 07:17:52'),
(9, 'There should be more seating on the buses, especially during rush hours.', '2024-11-08 07:17:52'),
(10, 'The drivers are very courteous, but the buses should be better maintained.', '2024-11-08 07:17:52'),
(11, 'The routes are good, but there is not enough service in the evenings.', '2024-11-08 07:17:52'),
(12, 'It would be nice if the buses had free Wi-Fi on board.', '2024-11-08 07:17:52'),
(13, 'Overall a good experience, but I wish the buses had air conditioning.', '2024-11-08 07:17:52'),
(14, 'The buses could be cleaner, especially in the seats area.', '2024-11-08 07:17:52'),
(15, 'I like the tracking system, but it could be more accurate.', '2024-11-08 07:17:52'),
(16, 'It would be great if there were more bus stops in my area.', '2024-11-08 07:17:52'),
(17, 'The customer service is excellent, but the buses sometimes break down.', '2024-11-08 07:17:52'),
(18, 'I love the punctuality, but I wish there were more frequent services.', '2024-11-08 07:17:52'),
(19, 'More information on the website about routes would be appreciated.', '2024-11-08 07:17:52'),
(20, 'The bus drivers need better training on handling traffic situations.', '2024-11-08 07:17:52'),
(21, 'Great service overall, but the ticket prices are a bit high.', '2024-11-08 07:17:52'),
(22, 'The buses are always late in the evening, causing inconvenience.', '2024-11-08 07:17:52'),
(23, 'I am happy with the service, but the online booking system could be improved.', '2024-11-08 07:17:52'),
(24, 'The bus network is good, but it doesn\'t cover all the necessary areas.', '2024-11-08 07:17:52'),
(25, 'Buses need to be cleaner, especially during peak hours.', '2024-11-08 07:17:52'),
(26, 'The drivers are polite, but they should drive slower for safety.', '2024-11-08 07:17:52'),
(27, 'I wish the buses were more spacious and had more room for luggage.', '2024-11-08 07:17:52'),
(28, 'The buses are comfortable, but the air conditioning is not always working.', '2024-11-08 07:17:52'),
(29, 'The website is hard to navigate; it could be more user-friendly.', '2024-11-08 07:17:52'),
(30, 'I would like to see more eco-friendly buses in the fleet.', '2024-11-08 07:17:52'),
(31, 'gjvhbkl,', '2024-11-08 07:36:30'),
(32, 'fxcghvjk', '2024-11-08 07:39:01'),
(33, 'bv n', '2024-11-08 07:50:59'),
(34, '. ,/;po09u87uyhg', '2024-11-09 01:44:56'),
(35, 'm ,', '2024-11-09 01:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `help_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`help_id`, `question`, `answer`, `category`, `created_at`) VALUES
(1, 'How do I create a new bus schedule?', 'Go to the Asset Management page and click on \"Create New Schedule.\" Fill in the required details, and click \"Save\" to create a new schedule.', 'Scheduling', '2024-10-27 18:21:08'),
(2, 'How do I track a bus in real-time?', 'Visit the Real-Time Bus Tracking page, and enter the bus ID or route number in the search bar to see the live location of the bus.', 'Tracking', '2024-10-27 18:21:08'),
(3, 'How do I manage passenger details?', 'You can manage all passenger details on the Passenger Management page, where you can view, add, or update passenger records.', 'Passenger Management', '2024-10-27 18:21:08'),
(4, 'What do I do if a bus is delayed?', 'If a bus is delayed, the system will automatically notify you through the Notifications & Alerts page. You can also set up alerts to receive updates in real-time.', 'Notifications', '2024-10-27 18:21:08'),
(5, 'How do I cancel a bus service?', 'To cancel a bus service, go to the Asset Management page, select the bus, and click on \"Cancel Service\". Follow the prompts to confirm the cancellation.', 'Service Management', '2024-10-27 18:21:08'),
(6, 'Where can I view bus maintenance records?', 'Bus maintenance records can be accessed on the Asset Management page under the \"Maintenance Records\" section.', 'Maintenance', '2024-10-27 18:21:08'),
(7, 'How do I generate a report?', 'Navigate to the Reports & Analytics page, select the type of report you want to generate, and click \"Generate Report\".', 'Reporting', '2024-10-27 18:21:08'),
(8, 'How can I reset my password?', 'Click on \"Forgot Password?\" on the login page and follow the instructions to reset your password.', 'Account Management', '2024-10-27 18:21:08'),
(9, 'What should I do if I forget my username?', 'Contact support through the Help page to retrieve your username.', 'Account Management', '2024-10-27 18:21:08'),
(10, 'How do I contact support?', 'You can contact support via email at support@busmanagement.com or through the live chat option on the Help page.', 'Support', '2024-10-27 18:21:08'),
(11, 'What is the purpose of real-time tracking?', 'Real-time tracking allows you to monitor bus locations, ensuring efficient route management and timely arrivals.', 'Tracking', '2024-10-27 18:21:08'),
(12, 'How can I set up notifications for bus delays?', 'Go to the Notifications & Alerts page and select the types of notifications you want to receive, then save your preferences.', 'Notifications', '2024-10-27 18:21:08'),
(13, 'What types of alerts can I receive?', 'You can receive alerts for bus delays, route changes, cancellations, and maintenance updates.', 'Alerts', '2024-10-27 18:21:08'),
(14, 'How do I update a passenger record?', 'Go to the Passenger Management page, select the passenger record, and click \"Edit\" to make changes.', 'Passenger Management', '2024-10-27 18:21:08'),
(15, 'How do I handle passenger feedback?', 'Navigate to the Feedback Management page to view and respond to passenger feedback.', 'Feedback Management', '2024-10-27 18:21:08'),
(16, 'What do I do if I encounter a technical issue?', 'Check the Help page for troubleshooting tips or contact support if the issue persists.', 'Support', '2024-10-27 18:21:08'),
(17, 'How can I view bus routes?', 'Bus routes can be viewed on the Route Management page, where you can see all active routes.', 'Route Management', '2024-10-27 18:21:08'),
(18, 'Can I edit existing bus schedules?', 'Yes, you can edit existing bus schedules on the Asset Management page by selecting the schedule and clicking \"Edit\".', 'Scheduling', '2024-10-27 18:21:08'),
(19, 'What is the purpose of the notifications system?', 'The notifications system keeps you informed about important updates and changes within the bus management system.', 'Notifications', '2024-10-27 18:21:08'),
(20, 'How can I delete a bus record?', 'To delete a bus record, go to the Asset Management page, select the bus, and click \"Delete\". Confirm your action to remove the record.', 'Service Management', '2024-10-27 18:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `bus_id` varchar(20) DEFAULT NULL,
  `route_id` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `notification_type` enum('delay','route_change','cancellation','maintenance') NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `bus_id`, `route_id`, `message`, `notification_type`, `created_at`) VALUES
(1, 'BUS1001', NULL, 'Delay of 10 minutes due to heavy traffic.', 'delay', '2024-10-27 18:17:19'),
(2, 'BUS1002', 'A1', 'Bus #1002 has been rerouted due to road construction.', 'route_change', '2024-10-27 18:17:19'),
(3, 'BUS1003', NULL, 'Maintenance scheduled for Bus #1003 on 2024-10-30.', 'maintenance', '2024-10-27 18:17:19'),
(4, 'BUS1004', NULL, 'Bus #1004 canceled due to unforeseen circumstances.', 'cancellation', '2024-10-27 18:17:19'),
(5, 'BUS1005', 'B2', 'Delay of 5 minutes at Stop #4.', 'delay', '2024-10-27 18:17:19'),
(6, 'BUS1006', 'A3', 'Route A3 will have a temporary detour starting tomorrow.', 'route_change', '2024-10-27 18:17:19'),
(7, 'BUS1007', NULL, 'Bus #1007 has been inspected and is in service.', 'maintenance', '2024-10-27 18:17:19'),
(8, 'BUS1008', NULL, 'Bus #1008 is currently out of service.', 'cancellation', '2024-10-27 18:17:19'),
(9, 'BUS1009', 'B1', 'Delay of 15 minutes due to an accident on the route.', 'delay', '2024-10-27 18:17:19'),
(10, 'BUS1010', 'C1', 'Route C1 experiencing delays due to weather conditions.', 'delay', '2024-10-27 18:17:19'),
(11, 'BUS1011', NULL, 'Bus #1011 scheduled for maintenance on 2024-11-01.', 'maintenance', '2024-10-27 18:17:19'),
(12, 'BUS1012', 'A2', 'Bus #1012 canceled due to driver unavailability.', 'cancellation', '2024-10-27 18:17:19'),
(13, 'BUS1013', NULL, 'Bus #1013 delayed by 20 minutes.', 'delay', '2024-10-27 18:17:19'),
(14, 'BUS1014', 'B3', 'Route B3 is temporarily closed for repairs.', 'route_change', '2024-10-27 18:17:19'),
(15, 'BUS1015', NULL, 'Bus #1015 is now available for service.', 'maintenance', '2024-10-27 18:17:19'),
(16, 'BUS1016', 'C2', 'Bus #1016 experiencing delays due to road works.', 'delay', '2024-10-27 18:17:19'),
(17, 'BUS1017', 'A1', 'Route A1 will have additional stops next week.', 'route_change', '2024-10-27 18:17:19'),
(18, 'BUS1018', NULL, 'Bus #1018 canceled due to mechanical failure.', 'cancellation', '2024-10-27 18:17:19'),
(19, 'BUS1019', NULL, 'Delay of 12 minutes for Bus #1019.', 'delay', '2024-10-27 18:17:19'),
(20, 'BUS1020', 'B4', 'Route B4 is modified until further notice.', 'route_change', '2024-10-27 18:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `passenger_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`passenger_id`, `name`, `email`, `phone`, `gender`, `password_hash`, `address`) VALUES
(2, 'Jane Assimwe', 'janeassimwe@example.com', '0777898898', 'female', 'JanA$$2023#', NULL),
(4, 'Alice Muwanguzi', 'alicemuwanguzi@example.com', '0776543210', 'female', 'Alice#Bus789!', NULL),
(5, 'Michael Okello', 'michaelokello@example.com', '0778901234', 'male', 'Micha3l!#456', NULL),
(6, 'Grace Nansubuga', 'gracenansubuga@example.com', '0787654321', 'female', 'Grac3@#$321', NULL),
(7, 'Sam Kizza', 'samkizza@example.com', '0771239876', 'male', 'Sam@Ki998!', NULL),
(8, 'Rose Nakawunde', 'rosenakawunde@example.com', '0785432109', 'female', 'Ros3#Bus$456', NULL),
(9, 'Henry Mugisha', 'henrymugisha@example.com', '0779876543', 'male', 'HenrY!2345', NULL),
(10, 'Patricia Amani', 'patriciaamani@example.com', '0783214567', 'female', 'P@tAm7890#', NULL),
(11, 'David Ssenyonga', 'davidsenyonga@example.com', '0778765432', 'male', 'Dav3#Sen$88', NULL),
(12, 'Linda Nabukalu', 'lindanabukalu@example.com', '0781231234', 'female', 'Linda!@12345', NULL),
(13, 'Joseph Kato', 'josephkato@example.com', '0774567890', 'male', 'Joe$Kato#98', NULL),
(14, 'Esther Nanyonjo', 'esthernanyonjo@example.com', '0786543210', 'female', 'Esther@N99!', NULL),
(15, 'Ben Muwanga', 'benmuwanga@example.com', '0773216789', 'male', 'BenMu#9876', NULL),
(16, 'Sophie Kisaakye', 'sophiekisaakye@example.com', '0789876543', 'female', 'Sophie!K123#', NULL),
(17, 'James Kizito', 'jameskizito@example.com', '0779871234', 'male', 'Jam3s!$45', NULL),
(18, 'Nina Nankinga', 'ninanankinga@example.com', '0785432167', 'female', 'Nina@#King22', NULL),
(19, 'Samuel Nsubuga', 'samuelnsubuga@example.com', '0771234567', 'male', 'SamNu@!888', NULL),
(20, 'Sarah Mbabazi', 'sarahmbabazi@example.com', '0787654321', 'female', 'Sarah#Mba$321', NULL),
(21, 'Tina', 'tina@gmail.com', '', 'male', '$2y$10$K0/ko9l.zsesrmf4uwpWhO/Ufkuxy.9PqBKXiK4PzTx/nW4L0ADjG', NULL),
(22, 'Trish', 'trish@gmail.com', '0709940060', 'female', '$2y$10$Ilm51mIuFrYhTZWtDu87leFEgQFeIiIgjiSrUjfXkj8e3f6jzaU8i', 'kampala'),
(23, 'Namatovu Chrsitine', 'chri@gmail', '0753931683', 'female', '$2y$10$PTiEdHTOeIaQsEk5WkiTQe/DXgvFKpOV2M5XRNhFhsWxdEb.XaPu2', 'Mbarara'),
(24, 'Namatovu Chrsitine', 'christ@gmail', '0753931683', 'female', '$2y$10$/7IJ7mb6hj8n3YVvKtKdrOyaQ/T6G2SYjgLRlGZ5SFoXlVtXPFmsi', 'Mbarara'),
(25, 'Namatovu Chrsitine', 'chrisss@gmail', '0753931683', 'female', '$2y$10$2oxGDA6lG3rsx7wKOgmbLemKcKx6pCRWOOnZ7rOTt3BvX1G/4U8iG', 'Mbarara'),
(26, 'Namatovu Chrsitine', 'chriss@gmail', '0753931683', 'female', '$2y$10$WbjixZVGGLhpS7zn273XcuJXgTKh7QwjOuF36z8muexa3mM7VP4ge', 'Mbarara'),
(27, 'arinda', 'rinda@gmail', '077897895', 'female', '$2y$10$BP9BMd30Hz4daACD1EGy5OLqcCWSV7G9haGDGlWGwhPupXo252KG.', 'kampala'),
(28, 'arind', 'inda@gmail', '0709940060', 'female', '$2y$10$u7jA9yAiLA7ldCGH6.ONwuhRCVzY0qwnVw4podAzFiuR1YJqAQKKW', 'kampala'),
(29, 'arin', 'ida@gmail', '0709940060', 'female', '$2y$10$PKuVfcovmV9FbSdqTXq6R.94locimtsXZ0RiFlkowcAmGKqHBtfIa', 'kampala'),
(30, 'ari', 'ia@gmail', '0709940060', 'female', '$2y$10$1pv65lQIqwBIyIopd3rEhu8pMImY6NsIDFmqlcTNoWtVFqvqjCITS', 'kampala'),
(31, 'ari', 'baa@gmail', '0709940060', 'female', '$2y$10$hsqzEEEM7E1IrcVDNGDL8.W.0pUbDTBlaIkUzYDsxl6nbkzvhJkj.', 'kampala'),
(32, 'ari', 'ba@gmail', '0709940060', 'female', '$2y$10$sCBxmLCMoZ3mZ1xfGm2KeOEaZUDsXWX2P6T2A20Sk5BtCR8bCHAoa', 'kampala'),
(33, 'KIIRA', 'kirra12@gmail.com', '0777349349', 'female', '$2y$10$VIPFQTm9yoJjMwkgxmNaBOmleqSOqKbv5UOS1wijNV8.wRj0zQGue', 'Mbarara');

-- --------------------------------------------------------

--
-- Table structure for table `real_time_tracking`
--

CREATE TABLE `real_time_tracking` (
  `tracking_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `speed` decimal(5,2) DEFAULT NULL,
  `direction` varchar(10) DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `real_time_tracking`
--

INSERT INTO `real_time_tracking` (`tracking_id`, `bus_id`, `latitude`, `longitude`, `speed`, `direction`, `timestamp`) VALUES
(1, 1, 0.34759601, 32.58251932, 45.00, 'N', '2024-10-27 18:08:37'),
(2, 2, 0.34770301, 32.58362012, 50.00, 'E', '2024-10-27 18:08:37'),
(3, 3, 0.34789702, 32.58473012, 38.50, 'S', '2024-10-27 18:08:37'),
(4, 4, 0.34805601, 32.58584732, 40.00, 'W', '2024-10-27 18:08:37'),
(5, 5, 0.34821402, 32.58695601, 55.00, 'N', '2024-10-27 18:08:37'),
(6, 6, 0.34838912, 32.58806241, 42.00, 'E', '2024-10-27 18:08:37'),
(7, 7, 0.34858032, 32.58917281, 36.00, 'S', '2024-10-27 18:08:37'),
(8, 8, 0.34876321, 32.59028602, 60.00, 'W', '2024-10-27 18:08:37'),
(9, 9, 0.34892122, 32.59139620, 48.00, 'N', '2024-10-27 18:08:37'),
(10, 10, 0.34911232, 32.59250243, 50.00, 'E', '2024-10-27 18:08:37'),
(11, 11, 0.34929841, 32.59361152, 55.50, 'S', '2024-10-27 18:08:37'),
(12, 12, 0.34948920, 32.59472532, 40.50, 'W', '2024-10-27 18:08:37'),
(13, 13, 0.34967561, 32.59583610, 52.00, 'N', '2024-10-27 18:08:37'),
(14, 14, 0.34986041, 32.59694392, 46.00, 'E', '2024-10-27 18:08:37'),
(15, 15, 0.35005212, 32.59805211, 53.00, 'S', '2024-10-27 18:08:37'),
(16, 16, 0.35024501, 32.59916211, 49.00, 'W', '2024-10-27 18:08:37'),
(17, 17, 0.35043112, 32.60027112, 57.00, 'N', '2024-10-27 18:08:37'),
(18, 18, 0.35061841, 32.60138412, 44.00, 'E', '2024-10-27 18:08:37'),
(19, 19, 0.35081020, 32.60249311, 51.00, 'S', '2024-10-27 18:08:37'),
(20, 20, 0.35100101, 32.60360420, 39.00, 'W', '2024-10-27 18:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `report_type` varchar(50) NOT NULL,
  `generated_date` datetime DEFAULT current_timestamp(),
  `report_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `report_type`, `generated_date`, `report_data`) VALUES
(1, 'Trip Report', '2024-10-27 18:10:25', 'Details about trips taken on 2024-01-01.'),
(2, 'Passenger Report', '2024-10-27 18:10:25', 'Summary of passenger counts for January 2024.'),
(3, 'Occupancy Report', '2024-10-27 18:10:25', 'Analysis of bus occupancy rates for January 2024.'),
(4, 'Performance Metrics', '2024-10-27 18:10:25', 'Performance overview of bus service for January 2024.'),
(5, 'Trends and Patterns', '2024-10-27 18:10:25', 'Patterns observed in bus operations during Q1 2024.'),
(6, 'Trip Report', '2024-10-27 18:10:25', 'Details about trips taken on 2024-01-02.'),
(7, 'Passenger Report', '2024-10-27 18:10:25', 'Summary of passenger counts for February 2024.'),
(8, 'Occupancy Report', '2024-10-27 18:10:25', 'Analysis of bus occupancy rates for February 2024.'),
(9, 'Performance Metrics', '2024-10-27 18:10:25', 'Performance overview of bus service for February 2024.'),
(10, 'Trends and Patterns', '2024-10-27 18:10:25', 'Patterns observed in bus operations during Q2 2024.'),
(11, 'Trip Report', '2024-10-27 18:10:25', 'Details about trips taken on 2024-01-03.'),
(12, 'Passenger Report', '2024-10-27 18:10:25', 'Summary of passenger counts for March 2024.'),
(13, 'Occupancy Report', '2024-10-27 18:10:25', 'Analysis of bus occupancy rates for March 2024.'),
(14, 'Performance Metrics', '2024-10-27 18:10:25', 'Performance overview of bus service for March 2024.'),
(15, 'Trends and Patterns', '2024-10-27 18:10:25', 'Patterns observed in bus operations during Q3 2024.'),
(16, 'Trip Report', '2024-10-27 18:10:25', 'Details about trips taken on 2024-01-04.'),
(17, 'Passenger Report', '2024-10-27 18:10:25', 'Summary of passenger counts for April 2024.'),
(18, 'Occupancy Report', '2024-10-27 18:10:25', 'Analysis of bus occupancy rates for April 2024.'),
(19, 'Performance Metrics', '2024-10-27 18:10:25', 'Performance overview of bus service for April 2024.'),
(20, 'Trends and Patterns', '2024-10-27 18:10:25', 'Patterns observed in bus operations during Q4 2024.');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(15) DEFAULT NULL,
  `Role` enum('Driver','Conductor','Administrator','Maintenance') NOT NULL,
  `Address` varchar(150) DEFAULT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `Email`, `PhoneNumber`, `Role`, `Address`, `PasswordHash`, `Name`) VALUES
(1, 'amina.nabwire@example.com', '0701234567', 'Driver', 'Kampala, Uganda', 'Amina123', 'Amina Nabwire'),
(2, 'juma.kato@example.com', '0712345678', 'Conductor', 'Entebbe, Uganda', 'Juma456', 'Juma Kato'),
(3, 'namuli.nakato@example.com', '0771234567', 'Administrator', 'Mukono, Uganda', 'Namuli789', 'Namuli Nakato'),
(4, 'kizza.lukwago@example.com', '0781234567', 'Maintenance', 'Jinja, Uganda', 'Kizza321', 'Kizza Lukwago'),
(5, 'maria.nakitende@example.com', '0702234567', 'Conductor', 'Wakiso, Uganda', 'Maria654', 'Maria Nakitende'),
(6, 'david.mulumba@example.com', '0712345789', 'Driver', 'Masaka, Uganda', 'David987', 'David Mulumba'),
(7, 'betty.nabunya@example.com', '0752234568', 'Administrator', 'Mbale, Uganda', 'Betty123', 'Betty Nabunya'),
(8, 'james.ssemanda@example.com', '0782234569', 'Driver', 'Fort Portal, Uganda', 'James456', 'James Ssemanda'),
(9, 'sarah.kagoya@example.com', '0702234570', 'Conductor', 'Mbarara, Uganda', 'Sarah789', 'Sarah Kagoya'),
(10, 'ahmed.mugerwa@example.com', '0722234571', 'Maintenance', 'Soroti, Uganda', 'Ahmed321', 'Ahmed Mugerwa'),
(11, 'grace.nalwanga@example.com', '0732234572', 'Driver', 'Gulu, Uganda', 'Grace654', 'Grace Nalwanga'),
(12, 'robert.mukasa@example.com', '0762234573', 'Administrator', 'Arua, Uganda', 'Robert987', 'Robert Mukasa'),
(13, 'hope.namayanja@example.com', '0782234574', 'Conductor', 'Iganga, Uganda', 'Hope123', 'Hope Namayanja'),
(14, 'joseph.kiggundu@example.com', '0703234575', 'Driver', 'Kasese, Uganda', 'Joseph456', 'Joseph Kiggundu'),
(15, 'anna.namono@example.com', '0773234576', 'Maintenance', 'Lira, Uganda', 'Anna789', 'Anna Namono'),
(16, 'isaac.mulindwa@example.com', '0783234577', 'Driver', 'Tororo, Uganda', 'Isaac321', 'Isaac Mulindwa'),
(17, 'rebecca.najjuma@example.com', '0713234578', 'Conductor', 'Hoima, Uganda', 'Rebecca654', 'Rebecca Najjuma'),
(18, 'simon.kintu@example.com', '0793234579', 'Administrator', 'Kabale, Uganda', 'Simon987', 'Simon Kintu'),
(19, 'lydia.nabaggala@example.com', '0743234580', 'Driver', 'Ntungamo, Uganda', 'Lydia123', 'Lydia Nabaggala'),
(20, 'moses.nsubuga@example.com', '0704234581', 'Maintenance', 'Masindi, Uganda', 'Moses456', 'Moses Nsubuga'),
(21, 'christinenamatovu972@gmail.com', '0753931683', '', 'mbarara', '$2y$10$7ptttGSELELwPGaqR9esCOqsaanXcAdHms0Hbdouwp7Ny5IZTEq/e', 'christine'),
(28, 'tinah@gmail.com', NULL, 'Driver', NULL, '$2y$10$eTGg9Qj2dblIOBUNTuEKHOGvpqrouz2VKmgAKw3FYGnAGYG75efcq', 'NAMATOVU CHRISTINE'),
(29, 'namatovuchristine185@gmail.com', NULL, 'Driver', NULL, '$2y$10$mULHf2DDYJYlar8gB0ZBBOHuFpeVkcE4MmcWCc.PrLQPYHiLQWTgq', 'Christine'),
(30, 'chris@gmail.com', NULL, 'Driver', NULL, '$2y$10$gvuCoHuuMBqbRCmFkpKkOO.PUyzKfZRjlo/Xyb.IYgJBpBqUdv27K', 'chris'),
(31, 'jakandwanaho2@gmail.com', NULL, 'Driver', NULL, '$2y$10$y.0DogqRRCLw43S.cK5lwOCITefHkfUv/8mkNvzoaTxUxqTxwMG.u', 'chris'),
(32, 'betty@gmail.com', '0777930357', 'Administrator', 'Mpigi', '$2y$10$ZdGbFRGQqsq0FQJro9FpxOVeEFOWpw3eW9RA9F5anVmtfSVDD7T4a', 'NAMATOVU CHRISTINE'),
(33, 'micheal@gmail.com', '0777777777', 'Conductor', 'kampala', '$2y$10$vZolbAVuBwYtwu.5xMVDEei.oxpTvHS6VGeXwcX786gND108sJi.e', 'Micheal'),
(34, 'faith@gmail', '0777349349', 'Driver', 'kampala', '$2y$10$9AcGyzaclXqeA3w0iGEzMORHmy2vxhXk0rG8F9wTNFE7w9Pe4X.W6', 'Faith'),
(35, 'mayiga@gmail.com', '0708397985', 'Administrator', 'kampala', '$2y$10$fy0i4cIirFERu32lB5Ymy.5q4wg.nIvSbaYqYyvz7QUpIarr2OZRi', 'Trinah Mayiga'),
(36, 'faith@gmail.com', '0708937985', 'Administrator', 'Mityana', '$2y$10$jH02d0Prgjsb23FDt7/dOOEB9SpMSLs5W0ZMKr6wcPe8oLF2o8Q.S', 'Faith'),
(37, 'arinda@gmail.com', '0708937985', 'Administrator', 'Mityana', '$2y$10$NpJoZ7ChVADiUdMVMjsIMuX9m5kNwA.kQ/.WXp51vYrpBxCpvo1K.', 'Rose Arinda'),
(38, 'arinda@gmail.co', '0708937985', 'Administrator', 'Mityana', '$2y$10$1MfEoPy/mfoxPlHikR.bJ.UKMancgon4DZzJ384lkjMjcuxubyONW', 'Rose Arinda'),
(39, 'christine@gmail', '0753931683', 'Conductor', 'Mbarara', '$2y$10$rHmgc8RFrOp2iVPF4G/GFeUjjH0iY3cdzhCsV8Pmw18dZtDH2C7F2', 'Namatovu Chrsitine'),
(40, 'faih@gmail.com', '0708937985', 'Administrator', 'arind@gmail.com', '$2y$10$sINlKMCOeILSspfOIwE7Tu0m4ONOgHHv9AWV/aub9MuG0KvKHregi', 'Faith'),
(41, 'namatovutina@gmail.com', '0708937985', 'Administrator', 'Lira', '$2y$10$67gP7d8iHtBbgDRWkGhi6uSTaONSLl54vOUyh1LQ40dufB995h7ie', 'Tina');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `trip_date` datetime NOT NULL,
  `destination` varchar(255) NOT NULL,
  `status` enum('active','completed','cancelled') NOT NULL,
  `bus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `passenger_id`, `trip_date`, `destination`, `status`, `bus_id`) VALUES
(1, 22, '2024-11-08 08:06:00', 'Mbarara', 'active', 1),
(2, 22, '2024-11-08 08:06:00', 'Mbarara', 'active', 1),
(3, 22, '2024-11-08 08:06:00', 'Mbarara', 'active', 1),
(4, 22, '2024-11-08 08:06:00', 'Mbarara', 'active', 1),
(5, 22, '2024-11-08 08:06:00', 'Mbarara', 'active', 1),
(6, 22, '2024-11-08 08:06:00', 'Mbarara', 'active', 1),
(7, 22, '2024-11-08 08:06:00', 'Mbarara', 'active', 1),
(8, 22, '2024-11-08 08:06:00', 'Mbarara', 'active', 1),
(9, 22, '2024-11-08 08:06:00', 'Mbarara', 'active', 1),
(10, 22, '2024-11-08 08:06:00', 'Mbarara', 'active', 1),
(11, 28, '2024-11-09 05:23:00', 'kampala-entebbe', 'active', 109),
(12, 28, '2024-11-09 05:23:00', 'kampala-entebbe', 'active', 109),
(13, 28, '2024-11-09 05:23:00', 'kampala-entebbe', 'active', 109),
(14, 28, '2024-11-09 05:31:00', 'kampala-entebbe', 'active', 109),
(15, 28, '2024-11-09 05:31:00', 'kampala-entebbe', 'cancelled', 109),
(16, 28, '2024-11-09 06:06:00', 'kampala-entebbe', 'active', 107),
(17, 28, '2024-11-09 06:06:00', 'kampala-entebbe', 'active', 107),
(18, 28, '2024-11-09 06:06:00', 'kampala-entebbe', 'active', 107),
(19, 28, '2024-11-09 06:06:00', 'kampala-entebbe', 'active', 107),
(20, 28, '2024-11-09 06:06:00', 'kampala-entebbe', 'active', 107),
(21, 28, '2024-11-09 06:06:00', 'kampala-entebbe', 'active', 107),
(22, 28, '2024-11-09 06:31:00', 'kampala-entebbe', 'active', 107);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `trip_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `trip_date` datetime NOT NULL,
  `destination` varchar(255) NOT NULL,
  `departure_location` varchar(255) NOT NULL,
  `status` enum('upcoming','completed','cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `verification_log`
--

CREATE TABLE `verification_log` (
  `verification_id` int(11) NOT NULL,
  `entity_type` enum('bus','conductor','passenger') NOT NULL,
  `entity_id` varchar(50) NOT NULL,
  `verification_time` datetime DEFAULT current_timestamp(),
  `result` enum('successful','failed') NOT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verification_log`
--

INSERT INTO `verification_log` (`verification_id`, `entity_type`, `entity_id`, `verification_time`, `result`, `details`) VALUES
(1, 'bus', 'BUS001', '2024-10-27 18:15:07', 'successful', 'Bus ID BUS001 was verified successfully.'),
(2, 'bus', 'BUS002', '2024-10-27 18:15:07', 'successful', 'Bus ID BUS002 was verified successfully.'),
(3, 'bus', 'BUS003', '2024-10-27 18:15:07', 'failed', 'Bus ID BUS003 does not exist.'),
(4, 'bus', 'BUS004', '2024-10-27 18:15:07', 'successful', 'Bus ID BUS004 was verified successfully.'),
(5, 'bus', 'BUS005', '2024-10-27 18:15:07', 'failed', 'Bus ID BUS005 does not exist.'),
(6, 'bus', 'BUS006', '2024-10-27 18:15:07', 'successful', 'Bus ID BUS006 was verified successfully.'),
(7, 'bus', 'BUS007', '2024-10-27 18:15:07', 'successful', 'Bus ID BUS007 was verified successfully.'),
(8, 'bus', 'BUS008', '2024-10-27 18:15:07', 'failed', 'Bus ID BUS008 does not exist.'),
(9, 'bus', 'BUS009', '2024-10-27 18:15:07', 'successful', 'Bus ID BUS009 was verified successfully.'),
(10, 'bus', 'BUS010', '2024-10-27 18:15:07', 'successful', 'Bus ID BUS010 was verified successfully.'),
(11, 'conductor', 'CON001', '2024-10-27 18:15:07', 'successful', 'Conductor ID CON001 was verified successfully.'),
(12, 'conductor', 'CON002', '2024-10-27 18:15:07', 'failed', 'Conductor ID CON002 does not exist.'),
(13, 'conductor', 'CON003', '2024-10-27 18:15:07', 'successful', 'Conductor ID CON003 was verified successfully.'),
(14, 'conductor', 'CON004', '2024-10-27 18:15:07', 'failed', 'Conductor ID CON004 does not exist.'),
(15, 'passenger', 'PASS001', '2024-10-27 18:15:07', 'successful', 'Passenger ID PASS001 verified successfully.'),
(16, 'passenger', 'PASS002', '2024-10-27 18:15:07', 'failed', 'Passenger ID PASS002 does not exist.'),
(17, 'passenger', 'PASS003', '2024-10-27 18:15:07', 'successful', 'Passenger ID PASS003 verified successfully.'),
(18, 'passenger', 'PASS004', '2024-10-27 18:15:07', 'successful', 'Passenger ID PASS004 verified successfully.'),
(19, 'passenger', 'PASS005', '2024-10-27 18:15:07', 'failed', 'Passenger ID PASS005 does not exist.'),
(20, 'passenger', 'PASS006', '2024-10-27 18:15:07', 'successful', 'Passenger ID PASS006 verified successfully.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`analytics_id`),
  ADD KEY `report_id` (`report_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`bus_id`),
  ADD UNIQUE KEY `bus_number` (`bus_number`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FeedbackID`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passenger_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `real_time_tracking`
--
ALTER TABLE `real_time_tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`trip_id`),
  ADD KEY `passenger_id` (`passenger_id`);

--
-- Indexes for table `verification_log`
--
ALTER TABLE `verification_log`
  ADD PRIMARY KEY (`verification_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `analytics_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FeedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `help_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `real_time_tracking`
--
ALTER TABLE `real_time_tracking`
  MODIFY `tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verification_log`
--
ALTER TABLE `verification_log`
  MODIFY `verification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analytics`
--
ALTER TABLE `analytics`
  ADD CONSTRAINT `analytics_ibfk_1` FOREIGN KEY (`report_id`) REFERENCES `reports` (`report_id`) ON DELETE CASCADE;

--
-- Constraints for table `real_time_tracking`
--
ALTER TABLE `real_time_tracking`
  ADD CONSTRAINT `real_time_tracking_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`bus_id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `passengers` (`passenger_id`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `passengers` (`passenger_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

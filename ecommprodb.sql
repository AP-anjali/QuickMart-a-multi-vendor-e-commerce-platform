-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2025 at 05:32 PM
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
-- Database: `ecommprodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `a_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_email_verification`
--

CREATE TABLE `admin_email_verification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `varification_code` varchar(255) NOT NULL,
  `varification_code_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `varification_code_expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_email_verification`
--

INSERT INTO `admin_email_verification` (`id`, `admin_id`, `varification_code`, `varification_code_created_at`, `varification_code_expires_at`) VALUES
(1, 1, 'w9PVD7nXMUgP0vdWGMX8Enl97d', '2024-03-23 06:52:23', '2024-04-11 22:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories_info`
--

CREATE TABLE `categories_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_info`
--

INSERT INTO `categories_info` (`id`, `admin_id`, `catagory_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mobiles & Tablets', '2024-03-11 02:59:27', '2024-03-11 02:59:27'),
(2, 1, 'Fashion', '2024-03-11 02:59:33', '2024-03-11 02:59:33'),
(3, 1, 'Beauty Picks', '2024-03-11 02:59:39', '2024-03-11 02:59:39'),
(4, 1, 'TV & Electronics', '2024-03-11 02:59:45', '2024-03-11 02:59:45'),
(5, 1, 'Furniture', '2024-03-11 02:59:55', '2024-03-11 02:59:55'),
(6, 1, 'Grocery', '2024-03-11 03:00:03', '2024-03-11 03:00:03'),
(7, 1, 'Home & Kitchen', '2024-03-11 03:00:10', '2024-03-11 03:00:10'),
(8, 1, 'Stationery', '2024-03-11 03:00:40', '2024-03-11 03:00:40'),
(9, 1, 'Clothes', '2024-03-11 03:00:48', '2024-03-11 03:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `cotp`
--

CREATE TABLE `cotp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `otp` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp_expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers_address`
--

CREATE TABLE `customers_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area_or_village` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `full_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers_address`
--

INSERT INTO `customers_address` (`id`, `customer_id`, `country`, `state`, `city`, `area_or_village`, `pincode`, `landmark`, `full_address`, `created_at`, `updated_at`) VALUES
(1, 2, 'India', 'gujarat', 'Gandhinagar', 'pethapur chokdi', '382610', 'kuber complex', 'pethapur, cross road, behing khodal pan parlour, pethapur, gandhinagar, gujarat', '2024-03-11 03:06:37', '2024-03-11 03:06:37'),
(2, 4, 'India', 'gujarat', 'gandhinagar', 'pethapur chokdi', '382610', 'kuber complex', 'pethapur cross-road, behind khodal pan parlour, pethapur, gandhinagar', '2024-04-11 22:31:55', '2024-04-11 22:31:55'),
(3, 5, 'India', 'gujarat', 'gandhinagar', 'pethapur chokdi', '382610', 'kuber complex', 'pethapur cross-road, behind khodal pan parlour, pethapur, gandhinagar', '2024-06-19 03:18:55', '2024-06-19 03:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `customers_feedbacks`
--

CREATE TABLE `customers_feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers_feedbacks`
--

INSERT INTO `customers_feedbacks` (`id`, `customer_id`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 'The QUICKMART is the BEST and user-friendly multi-vendor e-commerce website', '2024-03-24 06:03:21', '2024-03-24 06:03:21'),
(2, 2, 4, 'It is the best e-commerce website for ours, and it\'s service is really good', '2024-03-24 06:04:59', '2024-03-24 06:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `customers_info`
--

CREATE TABLE `customers_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT '0',
  `profile_pic` varchar(255) NOT NULL DEFAULT 'img/default_profile_pic.png',
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers_info`
--

INSERT INTO `customers_info` (`id`, `name`, `email`, `phone_no`, `address`, `user_type`, `profile_pic`, `registration_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Anjali Patel', 'anjalipatel3074@gmail.com', '+917046106554', 'pethapur, cross road, behing khodal pan parlour, pethapur, gandhinagar, gujarat', '1', 'img/default_profile_pic.png', '2024-03-11 08:26:30', '1', '2024-03-11 02:56:30', '2024-03-11 02:56:30'),
(2, 'Ramesh Patel', 'ramesh.inst1@gmail.com', '+918140732865', 'pethapur, cross road, behing khodal pan parlour, pethapur, gandhinagar, gujarat', '0', 'img/pic-3_1712856251.png', '2024-03-11 08:27:30', '1', '2024-03-11 02:57:30', '2024-04-11 11:54:11'),
(4, 'Akash', 'akash.goswami03@gmail.com', '+918320187622', 'ahmedabad', '0', 'img/default_profile_pic.png', '2024-04-12 03:58:50', '1', '2024-04-11 22:28:50', '2024-04-11 22:28:50'),
(5, 'Anjali Patel', 'nidhipatelnp1111@gmail.com', '+911231231231', 'pethapur cross-road, behind khodal pan parlour, pethapur, gandhinagar', '0', 'img/default_profile_pic.png', '2024-06-19 07:49:12', '1', '2024-06-19 02:19:12', '2024-06-19 02:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `customers_otp`
--

CREATE TABLE `customers_otp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `otp` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp_expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers_otp`
--

INSERT INTO `customers_otp` (`id`, `c_id`, `otp`, `created_at`, `otp_expires_at`) VALUES
(1, 1, '898749', '2024-03-11 08:27:50', '2024-04-11 22:42:49'),
(2, 2, '546535', '2024-03-11 08:32:08', '2024-05-07 12:29:02'),
(4, 4, '541850', '2024-04-12 03:59:14', '2024-04-11 22:30:15'),
(5, 5, '680060', '2024-06-19 07:50:25', '2024-06-19 02:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `customers_otp_for_delivery_verification`
--

CREATE TABLE `customers_otp_for_delivery_verification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `otp` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp_expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers_otp_for_delivery_verification`
--

INSERT INTO `customers_otp_for_delivery_verification` (`id`, `customer_id`, `otp`, `created_at`, `otp_expires_at`) VALUES
(1, 2, '317539', '2024-03-11 15:37:41', '2024-04-11 22:55:46');

-- --------------------------------------------------------

--
-- Table structure for table `customer_cart`
--

CREATE TABLE `customer_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_quantity_ordered_by_customer` int(11) NOT NULL,
  `total_price_of_product_with_all_quantities_without_discount` decimal(10,2) NOT NULL,
  `total_price_of_product_with_all_quantities_with_discount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_cart`
--

INSERT INTO `customer_cart` (`id`, `customer_id`, `seller_id`, `product_id`, `product_quantity_ordered_by_customer`, `total_price_of_product_with_all_quantities_without_discount`, `total_price_of_product_with_all_quantities_with_discount`, `created_at`, `updated_at`) VALUES
(18, 2, 1, 9, 1, 600.00, 550.00, '2024-04-11 11:55:07', '2024-04-11 11:55:07'),
(19, 2, 1, 10, 2, 998.00, 700.00, '2024-04-11 11:55:23', '2024-04-11 11:55:23'),
(22, 5, 1, 1, 2, 600.00, 400.00, '2024-06-19 02:23:30', '2024-06-19 02:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_team_application_info`
--

CREATE TABLE `delivery_team_application_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `date_of_birth` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `Aadharcard` varchar(255) NOT NULL,
  `vehicle_rc_book` varchar(255) NOT NULL,
  `vehicle_puc` varchar(255) NOT NULL,
  `vehicle_licence` varchar(255) NOT NULL,
  `vehicle_insurance` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `bank_ifsc_code` varchar(255) NOT NULL,
  `bank_micr_code` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `proof_of_bank_account_ownership` varchar(255) NOT NULL,
  `experience_job` varchar(255) DEFAULT NULL,
  `experience_job_workplace` varchar(255) DEFAULT NULL,
  `experience_job_duration` varchar(255) DEFAULT NULL,
  `proof_of_experience` varchar(255) DEFAULT NULL,
  `experience_description` text DEFAULT NULL,
  `tc` tinyint(1) NOT NULL,
  `is_confirmed_from_employee_first` tinyint(1) NOT NULL DEFAULT 0,
  `employee_id_first` varchar(255) DEFAULT NULL,
  `is_confirmed_from_admin_first` tinyint(1) NOT NULL DEFAULT 0,
  `admin_id_first` varchar(255) DEFAULT NULL,
  `is_contacted` tinyint(1) NOT NULL DEFAULT 0,
  `employee_id_who_contacted` varchar(255) DEFAULT NULL,
  `proof_of_test_document` varchar(255) DEFAULT NULL,
  `employee_id_who_upload_proof_of_test_document` varchar(255) DEFAULT NULL,
  `is_confirmed_from_employee_second` tinyint(1) NOT NULL DEFAULT 0,
  `employee_id_second` varchar(255) DEFAULT NULL,
  `is_confirmed_from_admin_second` tinyint(1) NOT NULL DEFAULT 0,
  `admin_id_second` varchar(255) DEFAULT NULL,
  `confirmation_code` varchar(255) DEFAULT NULL,
  `is_joined` tinyint(1) NOT NULL DEFAULT 0,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `confirm_password` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'img/default_profile_pic.png',
  `is_active` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_team_application_info`
--

INSERT INTO `delivery_team_application_info` (`id`, `user_type`, `name`, `email`, `phone_no`, `address`, `gender`, `date_of_birth`, `photo`, `Aadharcard`, `vehicle_rc_book`, `vehicle_puc`, `vehicle_licence`, `vehicle_insurance`, `bank_name`, `bank_branch`, `bank_ifsc_code`, `bank_micr_code`, `account_holder_name`, `account_number`, `account_type`, `proof_of_bank_account_ownership`, `experience_job`, `experience_job_workplace`, `experience_job_duration`, `proof_of_experience`, `experience_description`, `tc`, `is_confirmed_from_employee_first`, `employee_id_first`, `is_confirmed_from_admin_first`, `admin_id_first`, `is_contacted`, `employee_id_who_contacted`, `proof_of_test_document`, `employee_id_who_upload_proof_of_test_document`, `is_confirmed_from_employee_second`, `employee_id_second`, `is_confirmed_from_admin_second`, `admin_id_second`, `confirmation_code`, `is_joined`, `username`, `password`, `confirm_password`, `profile_pic`, `is_active`, `created_at`, `updated_at`) VALUES
(4, 0, 'Anjali Patel', 'anjalipatel3074@gmail.com', '+917046106554', 'pethapur cross-road, behind khodal pan parlour, pethapur, gandhinagar', 'Female', '2004-09-16', 'delivery_team_application_photos/S6xDOGEAsDXc8l42MhulHsyYSRM9mVNp4juyWttb.jpg', 'delivery_team_aadharcards/hZ6zn3ZxQjIx1UfhPTBguRk65OUwGpkGX1cjrlNK.pdf', 'delivery_team_application_vehicle_rc_book_document/RB9W1Cd9BnZBIPCOtJPmKGjLyNqznSmDNXHUCJJF.pdf', 'delivery_team_application_vehicle_puc_document/Ee30yIhUdpsQC5KjQcN00QsDX6zcOmHHQt2ODLCs.pdf', 'delivery_team_application_vehicle_licence_document/YWifH4wYT8pbKni4a84YV6BQbV5gmEzySYB8Kkje.pdf', 'delivery_team_application_vehicle_insurance_document/TjSStZG3SSe1OBGWJF5PMignuYK5nptMGaB37JXv.pdf', 'SBI', 'pethapur', '1234abcd911', '987654321', 'Anjali Patel', '12234567890', 'Savings Account', 'delivery_team_application_proof_of_bank_account_ownership/16H1fwo7mT7FjDZJmU71Jdp2yiKshGMQ8W8lsXdu.pdf', NULL, NULL, NULL, NULL, NULL, 1, 1, '1', 1, '1', 1, '1', 'delivery_team_proof_of_test_documents/zwBD4gSWkgop3F9flWIznI311H0Phc2NOKhL4eeK.pdf', '1', 1, '1', 1, '1', 'KAfeMZ52agM8IuchJa7PSN85ufMkWc', 1, 'anjalipatel3074', '$2y$12$EgIES2jLuPmHhzCqeOgLzetJpMXJOLu6FcQrJOLgNtJMFvjXqGSC6', 'jaykhodal', 'img/default_profile_pic.png', '1', '2024-04-11 11:30:43', '2024-04-11 11:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_team_members_feedbacks`
--

CREATE TABLE `delivery_team_members_feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_team_member_email_verification`
--

CREATE TABLE `delivery_team_member_email_verification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `varification_code` varchar(255) NOT NULL,
  `varification_code_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `varification_code_expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_team_member_otp`
--

CREATE TABLE `delivery_team_member_otp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `otp` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp_expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_team_member_otp`
--

INSERT INTO `delivery_team_member_otp` (`id`, `d_id`, `otp`, `created_at`, `otp_expires_at`) VALUES
(3, 4, '805454', '2024-04-11 17:14:59', '2024-04-11 22:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `employees_feedbacks`
--

CREATE TABLE `employees_feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees_feedbacks`
--

INSERT INTO `employees_feedbacks` (`id`, `employee_id`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'The \"QUICKMART\" platform is really good for employeement, it is very benificial for me', '2024-04-02 03:49:09', '2024-04-02 03:49:09'),
(2, 1, 5, 'The \"QUICKMART\" platform is really good for employeement, it is very beneficial for me', '2024-04-02 03:51:39', '2024-04-02 03:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `employee_application_info`
--

CREATE TABLE `employee_application_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `date_of_birth` date NOT NULL,
  `photo` varchar(255) NOT NULL,
  `Aadharcard` varchar(255) NOT NULL,
  `percentage_of_twelve` int(11) NOT NULL,
  `proof_of_percentage_of_twelve` varchar(255) NOT NULL,
  `other_educational_details` text DEFAULT NULL,
  `confirmation_of_computer_knowlege` tinyint(1) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `bank_ifsc_code` varchar(255) NOT NULL,
  `bank_micr_code` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `proof_of_bank_account_ownership` varchar(255) NOT NULL,
  `experience_job` varchar(255) DEFAULT NULL,
  `experience_job_workplace` varchar(255) DEFAULT NULL,
  `experience_job_duration` varchar(255) DEFAULT NULL,
  `proof_of_experience` varchar(255) DEFAULT NULL,
  `experience_description` text DEFAULT NULL,
  `tc` tinyint(1) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `confirmation_code` varchar(255) DEFAULT NULL,
  `is_joined` tinyint(1) NOT NULL DEFAULT 0,
  `employee_username` varchar(255) DEFAULT NULL,
  `employee_password` varchar(255) DEFAULT NULL,
  `employee_confirm_password` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'img/default_profile_pic.png',
  `is_active` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_application_info`
--

INSERT INTO `employee_application_info` (`id`, `user_type`, `name`, `email`, `phone_no`, `address`, `gender`, `date_of_birth`, `photo`, `Aadharcard`, `percentage_of_twelve`, `proof_of_percentage_of_twelve`, `other_educational_details`, `confirmation_of_computer_knowlege`, `bank_name`, `bank_branch`, `bank_ifsc_code`, `bank_micr_code`, `account_holder_name`, `account_number`, `account_type`, `proof_of_bank_account_ownership`, `experience_job`, `experience_job_workplace`, `experience_job_duration`, `proof_of_experience`, `experience_description`, `tc`, `is_confirmed`, `confirmation_code`, `is_joined`, `employee_username`, `employee_password`, `employee_confirm_password`, `profile_pic`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 0, 'Anjali Patel', 'anjalipatel3074@gmail.com', '+917046106554', 'pethapur, cross road, behing khodal pan parlour, pethapur, gandhinagar, gujarat', 'Female', '2004-09-16', 'employee_application_photos/NB7PbYwefYw7XgdphPFd8KKwtr25CMUOtQChyR9x.jpg', 'employee_application_aadharcards/J1dJXLsZZ3pEBWK7d6daQ79BQ2fd12Oqo1j0vo5o.pdf', 90, 'employee_application_marksheet_proof/FYLGLNTM4r6L3WPIjlIKL2YzkdKfQk4UllEmm4kj.pdf', NULL, 1, 'SBI', 'pethapur', '1234abcd911', '987654321', 'anjali patel', '12234567890', 'Savings Account', 'employee_application_proof_of_bank_account_ownership/ODynpXOf4dw3DG04qQEtvqQZHztAkWsYU9onw01R.pdf', NULL, NULL, NULL, NULL, NULL, 1, 1, 'kLvZzT4YBuCg0LvLmjlVhQgVMBE4Iv', 1, 'anjalipatel3074', '$2y$12$sfyMvXJiOEayd8tB0aX6vuA8FiCJkWXUBDdjfIFsAaTjG5qAegdKS', 'jaykhodal', 'img/pic-6_1710343387.png', '1', '2024-03-11 03:20:34', '2024-03-13 10:35:45'),
(3, 0, 'abc', 'akash.goswami03@gmail.com', '+918320187622', 'ahmedabad', 'Male', '1983-06-08', 'employee_application_photos/PrDPpfIJ0l8cdMvSfQCpKb9dOzXK40Wi5HLLDGC5.jpg', 'employee_application_aadharcards/FSU2X4j7gpE0HGbw9DOfD83Iq4ZFJCBXuRUjbelS.pdf', 87, 'employee_application_marksheet_proof/gX1stRmQx2ANorgX74XvUCEsSojdZ3GrUh8kePvZ.pdf', NULL, 1, 'SBI', 'Gandhinagar', '1234abcd912', '987654329', 'Anjali Patel', '09876543217654', 'Checking Account', 'employee_application_proof_of_bank_account_ownership/4xyILSu69bsYCWxyMGPcFUPEBPoMhydFGfTqwQjV.pdf', NULL, NULL, NULL, NULL, NULL, 1, 1, 'UVn5jT6i2tbNIiyPwStXiBAa2isPmv', 0, NULL, NULL, NULL, 'img/default_profile_pic.png', '1', '2024-04-11 22:42:12', '2024-04-11 22:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `employee_email_verification`
--

CREATE TABLE `employee_email_verification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `varification_code` varchar(255) NOT NULL,
  `varification_code_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `varification_code_expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_email_verification`
--

INSERT INTO `employee_email_verification` (`id`, `employee_id`, `varification_code`, `varification_code_created_at`, `varification_code_expires_at`) VALUES
(1, 1, 'R2wsrIkSUHzhfLbzUGMFQwyGPr', '2024-03-13 15:59:39', '2024-03-13 10:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `employee_otp`
--

CREATE TABLE `employee_otp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `e_id` bigint(20) UNSIGNED NOT NULL,
  `otp` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp_expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_otp`
--

INSERT INTO `employee_otp` (`id`, `e_id`, `otp`, `created_at`, `otp_expires_at`) VALUES
(1, 1, '335114', '2024-03-11 09:19:11', '2024-04-11 11:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2023_12_13_123037_create_customers_table', 2),
(9, '2023_12_13_130932_create_cotp_table', 2),
(10, '2023_12_13_132902_create_cotp_table', 3),
(11, '2023_12_14_170659_create_sellers_table', 4),
(12, '2023_12_14_171233_create_sotp_table', 5),
(17, '2023_12_14_175918_create_seller_un_ps_table', 7),
(20, '2023_12_31_044649_create_sellers_info_table', 10),
(28, '2024_01_09_160342_create_products_info_table', 17),
(29, '2024_01_10_102146_create_products_info_table', 18),
(107, '2024_01_03_074814_create_system_administartion_table', 19),
(573, '2024_01_18_094028_create_confirmed_employee_application_info_table', 20),
(672, '2014_10_12_000000_create_users_table', 21),
(673, '2014_10_12_100000_create_password_reset_tokens_table', 21),
(674, '2014_10_12_200000_add_two_factor_columns_to_users_table', 21),
(675, '2019_08_19_000000_create_failed_jobs_table', 21),
(676, '2019_12_14_000001_create_personal_access_tokens_table', 21),
(677, '2023_12_12_122937_create_sessions_table', 21),
(678, '2023_12_14_173611_create_customers_table', 21),
(679, '2023_12_14_173624_create_cotp_table', 21),
(680, '2023_12_14_173636_create_sellers_table', 21),
(681, '2023_12_14_173649_create_sotp_table', 21),
(682, '2023_12_14_184149_create_seller_un_ps_table', 21),
(683, '2023_12_16_150019_create_admin_table', 21),
(684, '2023_12_31_052958_create_sellers_info_table', 21),
(685, '2023_12_31_122611_create_sellers_otp_table', 21),
(686, '2024_01_03_070552_create_customers_info_table', 21),
(687, '2024_01_03_071251_create_customers_otp_table', 21),
(688, '2024_01_16_082622_create_system_administration_table', 21),
(689, '2024_01_16_085859_create_categories_info_table', 21),
(690, '2024_01_16_085922_create_sections_info_table', 21),
(691, '2024_01_16_091613_create_products_info_table', 21),
(692, '2024_01_17_180603_create_employee_application_info_table', 21),
(693, '2024_01_20_175949_create_employee_otp_table', 21),
(694, '2024_02_03_033150_create_delivery_team_application_info_table', 21),
(695, '2024_02_04_224442_create_delivery_team_member_otp_table', 21),
(696, '2024_02_05_092924_create_customer_cart_table', 21),
(697, '2024_03_01_044451_create_seller_email_verification_table', 21),
(698, '2024_03_01_104143_create_customers_address_table', 21),
(699, '2024_03_04_173118_create_orders_table', 21),
(700, '2024_03_04_174810_create_order_information_table', 21),
(701, '2024_03_11_151516_create_customers_otp_for_delivery_verification_table', 22),
(702, '2024_03_13_134747_create_delivery_team_member_email_verification_table', 23),
(703, '2024_03_13_154959_create_employee_email_verification_table', 24),
(704, '2024_03_23_063652_create_admin_email_verification_table', 25),
(705, '2024_03_24_111644_create_customers_feedbacks_table', 26),
(706, '2024_04_02_085241_create_sellers_feedbacks_table', 27),
(707, '2024_04_02_091303_create_employees_feedbacks_table', 28),
(708, '2024_04_02_093915_create_delivery_team_members_feedbacks_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `payment_info` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_amount`, `transaction_id`, `payment_id`, `payment_status`, `payment_info`, `created_at`, `updated_at`) VALUES
(17, 2, '7500', 'pay_NxOg29Oz4JoiaW', 'pay_NxOg29Oz4JoiaW', 'authorized', '{\"id\":\"pay_NxOg29Oz4JoiaW\",\"entity\":\"payment\",\"amount\":7500,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"card\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"An online shopping platform\",\"card_id\":\"card_NxOg2E5fFC6xhs\",\"card\":{\"id\":\"card_NxOg2E5fFC6xhs\",\"entity\":\"card\",\"name\":\"\",\"last4\":\"1111\",\"network\":\"Visa\",\"type\":\"debit\",\"issuer\":null,\"international\":false,\"emi\":false,\"sub_type\":\"consumer\",\"token_iin\":null},\"bank\":null,\"wallet\":null,\"vpa\":null,\"email\":\"anjalipatel3074@gmail.com\",\"contact\":\"+917046106554\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"auth_code\":\"324869\"},\"created_at\":1712856363}', '2024-04-11 11:56:20', '2024-04-11 11:56:20'),
(18, 2, '248000', 'pay_NxOhOfaWKadyp3', 'pay_NxOhOfaWKadyp3', 'authorized', '{\"id\":\"pay_NxOhOfaWKadyp3\",\"entity\":\"payment\",\"amount\":248000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"card\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"An online shopping platform\",\"card_id\":\"card_NxOhOkVKO85rDp\",\"card\":{\"id\":\"card_NxOhOkVKO85rDp\",\"entity\":\"card\",\"name\":\"\",\"last4\":\"1111\",\"network\":\"Visa\",\"type\":\"debit\",\"issuer\":null,\"international\":false,\"emi\":false,\"sub_type\":\"consumer\",\"token_iin\":null},\"bank\":null,\"wallet\":null,\"vpa\":null,\"email\":\"anjalipatel3074@gmail.com\",\"contact\":\"+917046106554\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"auth_code\":\"751707\"},\"created_at\":1712856441}', '2024-04-11 11:57:35', '2024-04-11 11:57:35'),
(19, 4, '3000', 'pay_NxZWQ8bDNRIKDm', 'pay_NxZWQ8bDNRIKDm', 'authorized', '{\"id\":\"pay_NxZWQ8bDNRIKDm\",\"entity\":\"payment\",\"amount\":3000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"card\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"An online shopping platform\",\"card_id\":\"card_NxZWQDUWTjNUOs\",\"card\":{\"id\":\"card_NxZWQDUWTjNUOs\",\"entity\":\"card\",\"name\":\"\",\"last4\":\"1111\",\"network\":\"Visa\",\"type\":\"debit\",\"issuer\":null,\"international\":false,\"emi\":false,\"sub_type\":\"consumer\",\"token_iin\":null},\"bank\":null,\"wallet\":null,\"vpa\":null,\"email\":\"anjalipatel3074@gmail.com\",\"contact\":\"+917046106554\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"auth_code\":\"850265\"},\"created_at\":1712894555}', '2024-04-11 22:32:53', '2024-04-11 22:32:53'),
(20, 5, '40000', 'pay_OOYu7qSp8ZeD86', 'pay_OOYu7qSp8ZeD86', 'authorized', '{\"id\":\"pay_OOYu7qSp8ZeD86\",\"entity\":\"payment\",\"amount\":40000,\"currency\":\"INR\",\"status\":\"authorized\",\"order_id\":null,\"invoice_id\":null,\"international\":false,\"method\":\"card\",\"amount_refunded\":0,\"refund_status\":null,\"captured\":false,\"description\":\"An online shopping platform\",\"card_id\":\"card_OOYu7vnWK9cl3B\",\"card\":{\"id\":\"card_OOYu7vnWK9cl3B\",\"entity\":\"card\",\"name\":\"\",\"last4\":\"1111\",\"network\":\"Visa\",\"type\":\"prepaid\",\"issuer\":null,\"international\":false,\"emi\":false,\"sub_type\":\"consumer\",\"token_iin\":null},\"bank\":null,\"wallet\":null,\"vpa\":null,\"email\":\"anjalipatel3074@gmail.com\",\"contact\":\"+917046106554\",\"notes\":[],\"fee\":null,\"tax\":null,\"error_code\":null,\"error_description\":null,\"error_source\":null,\"error_step\":null,\"error_reason\":null,\"acquirer_data\":{\"auth_code\":\"541097\"},\"created_at\":1718787563}', '2024-06-19 03:29:41', '2024-06-19 03:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_information`
--

CREATE TABLE `order_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_address_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `is_order_placed` varchar(255) DEFAULT NULL,
  `order_placed_date` varchar(255) DEFAULT NULL,
  `is_order_cancelled` varchar(255) DEFAULT NULL,
  `order_cancelled_date` varchar(255) DEFAULT NULL,
  `is_order_accepted` varchar(255) DEFAULT NULL,
  `order_accepted_date` varchar(255) DEFAULT NULL,
  `is_order_packed` varchar(255) DEFAULT NULL,
  `order_packed_date` varchar(255) DEFAULT NULL,
  `is_delivery_allocated` varchar(255) DEFAULT NULL,
  `id_of_delivery_team_member` varchar(255) DEFAULT NULL,
  `delivery_allocated_date` varchar(255) DEFAULT NULL,
  `is_order_shipped` varchar(255) DEFAULT NULL,
  `order_shipped_date` varchar(255) DEFAULT NULL,
  `is_order_delivered` varchar(255) DEFAULT NULL,
  `order_delivered_date` varchar(255) DEFAULT NULL,
  `is_requested_for_exchange` varchar(255) DEFAULT NULL,
  `requested_for_exchange_date` varchar(255) DEFAULT NULL,
  `is_requested_for_return` varchar(255) DEFAULT NULL,
  `requested_for_return_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_information`
--

INSERT INTO `order_information` (`id`, `order_id`, `customer_id`, `customer_address_id`, `product_id`, `seller_id`, `product_quantity`, `product_price`, `is_order_placed`, `order_placed_date`, `is_order_cancelled`, `order_cancelled_date`, `is_order_accepted`, `order_accepted_date`, `is_order_packed`, `order_packed_date`, `is_delivery_allocated`, `id_of_delivery_team_member`, `delivery_allocated_date`, `is_order_shipped`, `order_shipped_date`, `is_order_delivered`, `order_delivered_date`, `is_requested_for_exchange`, `requested_for_exchange_date`, `is_requested_for_return`, `requested_for_return_date`, `created_at`, `updated_at`) VALUES
(17, 17, 2, 1, 2, 1, '5', '7500', '1', '11/04/24 10:56:20 PM', NULL, NULL, '1', '12/04/24 09:52:17 AM', '1', '12/04/24 09:52:39 AM', '1', '4', '12/04/24 09:54:29 AM', '1', '12/04/24 09:54:46 AM', '1', '12/04/24 09:55:46 AM', NULL, NULL, NULL, NULL, '2024-04-11 11:56:20', '2024-04-11 22:55:46'),
(18, 18, 2, 1, 5, 1, '2', '248000', '1', '11/04/24 10:57:35 PM', '1', '12/04/24 09:57:18 AM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-11 11:57:35', '2024-04-11 22:57:18'),
(19, 19, 4, 2, 2, 1, '2', '3000', '1', '12/04/24 09:32:53 AM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-11 22:32:53', '2024-04-11 22:32:53'),
(20, 20, 5, 3, 1, 1, '2', '40000', '1', '19/06/24 02:29:41 PM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-19 03:29:41', '2024-06-19 03:29:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_info`
--

CREATE TABLE `products_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_brand` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `selected_category_name` varchar(255) NOT NULL,
  `selected_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_keywords` text NOT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_weight` varchar(255) DEFAULT NULL,
  `product_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `selected_section_name` varchar(255) NOT NULL,
  `selected_section_id` bigint(20) UNSIGNED NOT NULL,
  `product_main_image` varchar(255) NOT NULL,
  `product_other_images` text DEFAULT NULL,
  `tc` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_info`
--

INSERT INTO `products_info` (`id`, `seller_id`, `product_name`, `product_brand`, `product_title`, `product_description`, `product_price`, `discount_price`, `product_quantity`, `selected_category_name`, `selected_category_id`, `product_keywords`, `product_color`, `product_size`, `product_weight`, `product_status`, `selected_section_name`, `selected_section_id`, `product_main_image`, `product_other_images`, `tc`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shirt', 'Raymond Shirts', 'Men\'s white shirts', 'This is the white color shirt for men\'s with the cotton fabric', 200.00, 300.00, 100, 'Fashion', 2, 'shirts, shirt, men\'s shirt, white shirt, stylist shirt, new shirt', 'White', 'XL', '200', 'active', 'Men', 1, 'product_main_images/zxg5LsoaVwlaH6cPJ2bf5lRfXUjzP8pzD0E9wgEd.jpg', '[\"product_other_images\\/vNzWyjru5ioEeSyDUKqIGdO2S8Cn5uGQQ2DiUI6C.jpg\",\"product_other_images\\/iZUAXnhFftJDN2hueZyFvsgKWIANiS1dj5v6T3nM.jpg\",\"product_other_images\\/KJJtRThelctcuPgVxBJXOkqISNvnENEqUP6sYRZe.jpg\"]', 1, '2024-03-11 03:05:26', '2024-03-11 03:05:26'),
(2, 1, 'pen', 'saino trio', 'Blue Wrting pens', 'This is the blue pen with thinner point and for smooth wrting', 15.00, 20.00, 200, 'Stationery', 8, 'pen, ball pen, blue pen, saino, saino trio, stationary', NULL, NULL, NULL, 'active', 'No Matters...', 3, 'product_main_images/aLDuHf24Y3HQakP4rBYMx3ptxaoX2CpiCNe3gdlc.jpg', '[\"product_other_images\\/z9SrUvZjsubYXVQE1iJJeuasLgOAoI0esJfLT7Fb.jpg\",\"product_other_images\\/HM0fqzmJwDqGPE8sNwu4Hi7viBWc4Odm0dhi6pCW.jpg\",\"product_other_images\\/XmcgNA3C4z4OCpbpGXsnNYjAxP1lLhftzKGUDJkx.png\",\"product_other_images\\/f5kqL29xabtQFEGO2VnEnbQdz3KZZGfDbIFNMmv7.jpg\"]', 1, '2024-03-11 12:00:25', '2024-03-11 12:00:25'),
(3, 1, 'Nail Polish', 'Blue Heaven', 'Blue Heaven Nail Polish', 'Best Blue Heaven Nail Polish without any camical', 380.00, 450.00, 290, 'Fashion', 2, 'All beauty products', 'Red', NULL, NULL, 'active', 'Women', 2, 'product_main_images/EVqeobFgkaT0TOdL50ZHTq27zCKecND2rQQBTh6u.jpg', '[\"product_other_images\\/oJnQBeKdnD1HHsID5GUB53vuv2tKkQO2yzs1yWMb.jpg\",\"product_other_images\\/f5sNB6LGVlzGTUSXbnOP6u5JVfUMuPtAmnn3ilZP.jpg\",\"product_other_images\\/LGZ7wdpTNi21ozmxa1X4onGdv7MJw8hvfP7pGaec.jpg\",\"product_other_images\\/iEwGdUBzvQqDZY4T3ZMbpqAszo41blfXHpdSX7HD.jpg\"]', 1, '2024-03-11 12:01:38', '2024-03-11 12:01:38'),
(4, 1, 'Hoodies', 'Raymonds', 'Mens Hoodies', 'Best material hoodies and sweatshirt for men', 630.00, 700.00, 800, 'Clothes', 9, 'shirts, shirt, men\'s shirt, white shirt, stylist shirt, new shirt', 'White', 'XL', '150', 'active', 'Men', 1, 'product_main_images/ue5Gkk6Sfx3TviIMQHENNmDup4ZA4Mo2iuELgebI.jpg', '[\"product_other_images\\/bBVVWlFN7xQH2f1JxySImU0sdrXAC8SBD7XewOqF.jpg\",\"product_other_images\\/iS66lS7IzMY7OsBXgDGNWIfA2Vncj3Q5wZVKQdh6.jpg\"]', 1, '2024-03-11 12:04:43', '2024-03-11 12:04:43'),
(5, 1, 'headphone', 'BOAT', 'boat headphones', 'headphones of BOAT in black color, which shuit in your daily life', 1240.00, 1400.00, 200, 'Fashion', 2, 'Boat, head phones, black head phones', 'black', NULL, NULL, 'active', 'No Matters...', 3, 'product_main_images/ht5mDbN3gUYpy6DEsZohlgdkmldIfq1kgbT46tFC.jpg', '[\"product_other_images\\/XAPZ3pwnsk0oxU4shI1v8lQfHe55uWbumJNKBQUc.jpg\",\"product_other_images\\/BsOnHNu0XckuJeFYjwO0rc5DGARUnFd4eH6T31zD.jpg\",\"product_other_images\\/BBAndQiondlgxC8Ws45vrYJLLYNVMAF0C3wEl5Ke.jpg\"]', 1, '2024-03-11 12:06:34', '2024-03-11 12:06:34'),
(6, 2, 'Nail Polish', 'Blue Heaven', 'Blue Heaven Nail Polish', 'Best Blue Heaven Nail Polish without any camical', 200.00, 300.00, 100, 'Fashion', 2, 'All beauty products', 'White', 'XL', '12', 'active', 'Women', 2, 'product_main_images/Ux69efUEoQJv55NNdG4IszYWPfnkpsnq0NrmiPWu.jpg', '[\"product_other_images\\/3kE2x8m12Df0zlxl2cpzKq8zzJNzwR5UkmHjiBxn.jpg\",\"product_other_images\\/oyIY7mTebFh3QXLGkfrGkDX8dlIhZqQw3SpntA2R.jpg\",\"product_other_images\\/DA01jXuJuXR3kgaK8kD3lpezGiC4MKlGTZt58xi1.jpg\",\"product_other_images\\/4324GxwijZV4W72DoFmIWu17hBpsbS6lRQnx5EjE.jpg\"]', 1, '2024-04-11 07:01:31', '2024-04-11 07:01:31'),
(7, 1, 'Smart Phone', 'APPLE | I PHONE', 'I phone 13 pro max', 'The iPhone is a line of smartphones produced by Apple Inc. that use Apple\'s own iOS mobile operating system.', 90000.00, 99000.00, 400, 'Mobiles & Tablets', 1, 'i phone, smart phone, i phone 13 pro max', 'purple', NULL, NULL, 'active', 'No Matters...', 3, 'product_main_images/UdZRlKjlJh4iksNhvnk8fNoG2prBaTJNYPxDWVBC.jpg', '[\"product_other_images\\/1VITR50dSvwaTVFuORogPF8qNn6oCiTl5Q0Zy35H.jpg\",\"product_other_images\\/rbSEa6IjPUGijAK4mvQv4YEUSEWtTlpA01t6mFx7.jpg\",\"product_other_images\\/UENNIsgKOYpurociFLGbiL3mLK6pGBrSE1ieUCQY.jpg\",\"product_other_images\\/vWx5jHN2AffhdzUqeEWl4p5CbxCgjOGXkTb8bIIQ.jpg\"]', 1, '2024-04-11 10:21:58', '2024-04-11 10:21:58'),
(9, 1, 'smart watch', 'APPLE', 'Smart watch for smart youngsters', 'A smartwatch is a portable and wearable computer device in a form of a watch; modern smartwatches provide a local touchscreen interface for daily use', 550.00, 600.00, 2322, 'Fashion', 2, 'watch, smart watch, apple, apple watch, mens', 'black', NULL, NULL, 'active', 'No Matters...', 3, 'product_main_images/oteka67gq3ZfMVeG4EUzyPfmxsG1btlhvjj2tGiU.jpg', '[\"product_other_images\\/IVkzWYtvqMUbjFPPaW2wkvhHUmAS4TtLhVTyFtOd.jpg\",\"product_other_images\\/liMiEwHuNQkjAwwbmfDikPQepbkolohfx9mAxHwe.jpg\",\"product_other_images\\/kOfZGhOdBWtfvspjwPoE60eL80Zzjf7zuGpjKAg6.jpg\"]', 1, '2024-04-11 11:00:01', '2024-04-11 11:00:01'),
(10, 1, 'school / college bag', 'BTS', 'BTS school / college bags', 'BTS Army Bomb Large Clear Backpack | 16 1/2” Unisex Clear Kpop Backpack | K Pop Bangtan Army Fandom', 350.00, 499.00, 200, 'Stationery', 8, 'bag, school bag, college bag, new bag, bts, bts bag', 'black', NULL, NULL, 'active', 'No Matters...', 3, 'product_main_images/1iPQqJPvKESzgp2kxtkvObILruiwibWsnXBcsP1F.jpg', '[\"product_other_images\\/o8LvUJJhCsjCYF2I7ypSdI2PT2zopnuEvbv0KCvm.jpg\",\"product_other_images\\/VwvmlYx6vytyBLQh4NRmwlyvxsW1YFHimuWwGTfa.jpg\",\"product_other_images\\/f60gAeNoz367f1gHjwlnlv4qVKwBESGl4MqW75iq.jpg\"]', 1, '2024-04-11 11:06:28', '2024-04-11 11:06:28'),
(11, 1, 'Lipstick', 'Lakme', 'Lakme Red Lipstick', 'Ingredients. Pentaerythrityl Tetraisostearate, Polyethylene, Polybutene, Olive Oil, Shea butter.', 180.00, 250.00, 3400, 'Fashion', 2, 'lipstic, red lipstic, makeup', 'red', 'Not specified', '00', 'active', 'Women', 2, 'product_main_images/0iROWhaWmJ9m9g2mQpqenC74sGv8O7AH9cE7WT99.jpg', '[\"product_other_images\\/VQYSrfBK1NP74XiRWL1ha2lWpeB8IfCD0gBXWrIZ.jpg\",\"product_other_images\\/2foRiv5dbYfD3mukbtqQ3qV6cGOYDXfXzyTPBn1e.jpg\",\"product_other_images\\/84BQ7EAKwiHQKg7AdQ1pj9Jmd55AqHIsNUYW5BFy.jpg\",\"product_other_images\\/MfIbiTstrW7BDYpvNNiEqnU7bszeXg1rUyUhXfEd.jpg\"]', 1, '2024-04-11 11:12:25', '2024-04-11 11:14:10'),
(12, 1, 'snacks food', 'kurkure', 'kurkure masala snacks food', 'The Masala Munch is a classic Kurkure flavour with a great combination of spice and crunch', 20.00, 30.00, 726232, 'Grocery', 6, 'kurkure, snacks, kurkure masala munch', NULL, NULL, '250', 'active', 'No Matters...', 3, 'product_main_images/LpWFz99FToM5hCSk9I94lRBNA7ePQkaBtzFnrymX.jpg', '[\"product_other_images\\/VTzkY5QGdltc0xRsQu3Cf8ZzDcEE0io234xo3jG0.jpg\",\"product_other_images\\/hLlz0tSd92SSmUehZA4e9uH73m2OHLFuu21W261t.jpg\",\"product_other_images\\/6p8cMn6rorRAcGEMazjioV9jfXwc5iGulqXggmVX.png\"]', 1, '2024-04-11 11:22:38', '2024-04-11 11:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `sections_info`
--

CREATE TABLE `sections_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections_info`
--

INSERT INTO `sections_info` (`id`, `admin_id`, `section_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Men', '2024-03-11 02:58:45', '2024-03-11 02:58:45'),
(2, 1, 'Women', '2024-03-11 02:58:51', '2024-03-11 02:58:51'),
(3, 1, 'No Matters...', '2024-03-11 02:58:57', '2024-03-11 02:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers_feedbacks`
--

CREATE TABLE `sellers_feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers_feedbacks`
--

INSERT INTO `sellers_feedbacks` (`id`, `seller_id`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'The \"QUICKMART\" platform is really very very nice for selling my goods, it is really best !', '2024-04-02 03:27:12', '2024-04-02 03:27:12'),
(2, 1, 5, 'The \"QUICKMART\" platform is really very very nice for selling my goods, it is really best !', '2024-04-02 03:28:28', '2024-04-02 03:28:28'),
(3, 1, 4, 'The \"QUICKMART\" platform is really very very nice for selling my goods, it is really best !', '2024-04-02 03:28:45', '2024-04-02 03:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `sellers_info`
--

CREATE TABLE `sellers_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'img/default_profile_pic.png',
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `password_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `business_name` varchar(255) NOT NULL,
  `business_type` varchar(255) NOT NULL,
  `business_strength` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `gst_number` varchar(255) NOT NULL,
  `business_description` text NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `bank_ifsc_code` varchar(255) NOT NULL,
  `bank_micr_code` varchar(255) NOT NULL,
  `account_holder_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `proof_of_bank_account_ownership_file_name` varchar(255) NOT NULL,
  `proof_of_bank_account_ownership_file_path` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers_info`
--

INSERT INTO `sellers_info` (`id`, `user_type`, `name`, `email`, `phone_no`, `address`, `profile_pic`, `registration_date`, `username`, `password`, `confirm_password`, `password_created_at`, `business_name`, `business_type`, `business_strength`, `product_category`, `gst_number`, `business_description`, `bank_name`, `bank_branch`, `bank_ifsc_code`, `bank_micr_code`, `account_holder_name`, `account_number`, `account_type`, `proof_of_bank_account_ownership_file_name`, `proof_of_bank_account_ownership_file_path`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '0', 'Anjali Patel', 'anjalipatel3074@gmail.com', '+917046106554', 'pethapur, cross road, behing khodal pan parlour, pethapur, gandhinagar, gujarat', 'img/pic-2_1710340054.png', '2024-03-11 08:33:34', 'anjalipatel3074', '$2y$12$UA/xxTR40hj3xN/ADigdV.ZHoj3mYKCbzUl6QrENAzz7.pxbfLCMy', 'jaykhodal', '2024-03-11 08:33:34', 'khodal manufacturing', 'retail', 'Individual Seller', 'Multiple Products', '1234Anjali5678', 'this is the wide camical manafacuring company in gandhinagar pethapur', 'SBI', 'pethapur', 'HDFC0000001', '987654321', 'anjali patel', '11234567890', 'Savings Account', '4th_page_of_main_content.pdf', 'proof_of_bank_account_ownership/KH9Fr03RtwTQI2aUjIsrkJNYqY7C3Q1GSOLokHEq.pdf', '1', '2024-03-11 03:03:34', '2024-03-13 08:57:34'),
(2, '0', 'Nidhi Patel', 'nidhipatelnp1111@gmail.com', '+919999999999', 'pethapur cross-road, behind khodal pan parlour, pethapur, gandhinagar', 'img/default_profile_pic.png', '2024-04-11 12:28:11', 'nidhipatel123', '$2y$12$.1.ysdVvNEMKbsVA7mZCYeJPCAJ55T47aSxIvAtobdfBAHi1R492u', 'nidhipatel123', '2024-04-11 12:28:11', 'abc', 'wholesale', 'Partnership', 'Clothes', '12345678', 'abc', 'SBI', 'pethapur', '1234abcd912', '987654323', 'Anjali Patel', '09090909090909', 'Savings Account', 'JAVA_APPLET_PROGRAM.pdf', 'proof_of_bank_account_ownership/ztfY1wIkVzdrUBRuLLdP68u4nxLjizCWCNk2giob.pdf', '1', '2024-04-11 06:58:11', '2024-04-11 06:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `sellers_otp`
--

CREATE TABLE `sellers_otp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_id` bigint(20) UNSIGNED NOT NULL,
  `otp` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp_expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers_otp`
--

INSERT INTO `sellers_otp` (`id`, `s_id`, `otp`, `created_at`, `otp_expires_at`) VALUES
(1, 1, '253193', '2024-03-11 08:33:39', '2024-04-11 22:51:35'),
(2, 2, '615793', '2024-04-11 12:28:22', '2024-04-11 06:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `seller_email_verification`
--

CREATE TABLE `seller_email_verification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `varification_code` varchar(255) NOT NULL,
  `varification_code_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `varification_code_expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seller_email_verification`
--

INSERT INTO `seller_email_verification` (`id`, `seller_id`, `varification_code`, `varification_code_created_at`, `varification_code_expires_at`) VALUES
(1, 1, 'u8m5AwaPS4IxA8aSHhXZHzmzSy', '2024-03-13 14:27:03', '2024-03-13 08:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `seller_un_ps`
--

CREATE TABLE `seller_un_ps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0u3XyQ6VHWje99DkRc4O3o1Kcg1AAjk51OYi2xDc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVnY1alVQMUhKN3h5NFlaUlJXMWtEUEpQTmU0WmxSVWFtNzQ1ZFpucyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWxsZXJfcmVnaXN0cmF0aW9uX3BhZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1719392637),
('1H8o2Amtd2C60XovhaucyFOHwLUBwTW6SJOOt3Pb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRVNtRm5PWGVsMXYxdkZKcnlGbHdERjlYWXZqU1c5NVlyME91NlljRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1719331941),
('3JC5Rtg4fAr3APKYjp27lAH3Rb1cXI3XGYOcRX25', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY3FsVExvVjB3Rmd4RGpVUGF1TkJaZ0hTcmdPcXZXY0tWZ25USzdyeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZV9hcHBsaWNhdGlvbl9wYWdlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1720241176),
('qoD5M0sRuxIvwQm4OaKmQ3UobSPJQMqXE1CTw9Ib', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRDN1amdvallJaXNIV0JuZmJTVThlZk9xczA5MWhTcXNDazM5YW42ZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1716720024),
('QuZcFd4YgmWbqvINAFSrObbbVkvShiwuQMHZSvOo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTFhzdzhxTGhkM2tXblNPZlFNTlVrcElmblBQNzVuZmlWY1M2cmFyeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lcl9jYXJ0X3BhZ2UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE2OiJjdXN0b21lcl9zZXNzaW9uIjtPOjMxOiJBcHBcTW9kZWxzXGN1c3RvbWVyc19pbmZvX3RhYmxlIjozMTp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo1OiJ0YWJsZSI7czoxNDoiY3VzdG9tZXJzX2luZm8iO3M6MTM6IgAqAHByaW1hcnlLZXkiO3M6MjoiaWQiO3M6MTA6IgAqAGtleVR5cGUiO3M6MzoiaW50IjtzOjEyOiJpbmNyZW1lbnRpbmciO2I6MTtzOjc6IgAqAHdpdGgiO2E6MDp7fXM6MTI6IgAqAHdpdGhDb3VudCI7YTowOnt9czoxOToicHJldmVudHNMYXp5TG9hZGluZyI7YjowO3M6MTA6IgAqAHBlclBhZ2UiO2k6MTU7czo2OiJleGlzdHMiO2I6MTtzOjE4OiJ3YXNSZWNlbnRseUNyZWF0ZWQiO2I6MDtzOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YToxMTp7czoyOiJpZCI7aTo1O3M6NDoibmFtZSI7czoxMjoiQW5qYWxpIFBhdGVsIjtzOjU6ImVtYWlsIjtzOjI2OiJuaWRoaXBhdGVsbnAxMTExQGdtYWlsLmNvbSI7czo4OiJwaG9uZV9ubyI7czoxMzoiKzkxMTIzMTIzMTIzMSI7czo3OiJhZGRyZXNzIjtzOjY5OiJwZXRoYXB1ciBjcm9zcy1yb2FkLCBiZWhpbmQga2hvZGFsIHBhbiBwYXJsb3VyLCBwZXRoYXB1ciwgZ2FuZGhpbmFnYXIiO3M6OToidXNlcl90eXBlIjtzOjE6IjAiO3M6MTE6InByb2ZpbGVfcGljIjtzOjI3OiJpbWcvZGVmYXVsdF9wcm9maWxlX3BpYy5wbmciO3M6MTc6InJlZ2lzdHJhdGlvbl9kYXRlIjtzOjE5OiIyMDI0LTA2LTE5IDEzOjE5OjEyIjtzOjk6ImlzX2FjdGl2ZSI7czoxOiIxIjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI0LTA2LTE5IDA3OjQ5OjEyIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI0LTA2LTE5IDA3OjQ5OjEyIjt9czoxMToiACoAb3JpZ2luYWwiO2E6MTE6e3M6MjoiaWQiO2k6NTtzOjQ6Im5hbWUiO3M6MTI6IkFuamFsaSBQYXRlbCI7czo1OiJlbWFpbCI7czoyNjoibmlkaGlwYXRlbG5wMTExMUBnbWFpbC5jb20iO3M6ODoicGhvbmVfbm8iO3M6MTM6Iis5MTEyMzEyMzEyMzEiO3M6NzoiYWRkcmVzcyI7czo2OToicGV0aGFwdXIgY3Jvc3Mtcm9hZCwgYmVoaW5kIGtob2RhbCBwYW4gcGFybG91ciwgcGV0aGFwdXIsIGdhbmRoaW5hZ2FyIjtzOjk6InVzZXJfdHlwZSI7czoxOiIwIjtzOjExOiJwcm9maWxlX3BpYyI7czoyNzoiaW1nL2RlZmF1bHRfcHJvZmlsZV9waWMucG5nIjtzOjE3OiJyZWdpc3RyYXRpb25fZGF0ZSI7czoxOToiMjAyNC0wNi0xOSAxMzoxOToxMiI7czo5OiJpc19hY3RpdmUiO3M6MToiMSI7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNC0wNi0xOSAwNzo0OToxMiI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNC0wNi0xOSAwNzo0OToxMiI7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6ODoiACoAY2FzdHMiO2E6MDp7fXM6MTc6IgAqAGNsYXNzQ2FzdENhY2hlIjthOjA6e31zOjIxOiIAKgBhdHRyaWJ1dGVDYXN0Q2FjaGUiO2E6MDp7fXM6MTM6IgAqAGRhdGVGb3JtYXQiO047czoxMDoiACoAYXBwZW5kcyI7YTowOnt9czoxOToiACoAZGlzcGF0Y2hlc0V2ZW50cyI7YTowOnt9czoxNDoiACoAb2JzZXJ2YWJsZXMiO2E6MDp7fXM6MTI6IgAqAHJlbGF0aW9ucyI7YTowOnt9czoxMDoiACoAdG91Y2hlcyI7YTowOnt9czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6NDp7aTowO3M6NDoibmFtZSI7aToxO3M6NToiZW1haWwiO2k6MjtzOjg6InBob25lX25vIjtpOjM7czo3OiJhZGRyZXNzIjt9czoxMDoiACoAZ3VhcmRlZCI7YToxOntpOjA7czoxOiIqIjt9czoxMDoicHJpbWFyeWtleSI7czoyOiJpZCI7fXM6MTI6InByZXZpb3VzX3VybCI7czoyMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwLyI7fQ==', 1718787591);

-- --------------------------------------------------------

--
-- Table structure for table `sotp`
--

CREATE TABLE `sotp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_id` bigint(20) UNSIGNED NOT NULL,
  `otp` varchar(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp_expires_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `system_administration`
--

CREATE TABLE `system_administration` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT '1',
  `admin_phone_no` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `secret_password` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'img/default_profile_pic.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_administration`
--

INSERT INTO `system_administration` (`id`, `admin_id`, `admin_name`, `user_type`, `admin_phone_no`, `admin_email`, `admin_address`, `username`, `secret_password`, `password`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 1, 'Anjali Patel', '1', '+917046106554', 'anjalipatel3074@gmail.com', 'pethapur | 382610 | gandhinagar | gujarat', 'Anjali_Patel_Admin', '$2y$12$irs3IzjfZEDPoNlGt3SM/OVE7SwLwTq9ratWinyjldSLPYfRV9gmi', 'Anjali_Patel_Admin', 'img/pic-6_1711177230.png', '2024-03-11 02:57:07', '2024-03-23 01:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_a_id_foreign` (`a_id`);

--
-- Indexes for table `admin_email_verification`
--
ALTER TABLE `admin_email_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_email_verification_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `categories_info`
--
ALTER TABLE `categories_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_info_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `cotp`
--
ALTER TABLE `cotp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cotp_c_id_foreign` (`c_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_address`
--
ALTER TABLE `customers_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_address_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customers_feedbacks`
--
ALTER TABLE `customers_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_feedbacks_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customers_info`
--
ALTER TABLE `customers_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_otp`
--
ALTER TABLE `customers_otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_otp_c_id_foreign` (`c_id`);

--
-- Indexes for table `customers_otp_for_delivery_verification`
--
ALTER TABLE `customers_otp_for_delivery_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_otp_for_delivery_verification_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `customer_cart`
--
ALTER TABLE `customer_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_cart_customer_id_foreign` (`customer_id`),
  ADD KEY `customer_cart_seller_id_foreign` (`seller_id`),
  ADD KEY `customer_cart_product_id_foreign` (`product_id`);

--
-- Indexes for table `delivery_team_application_info`
--
ALTER TABLE `delivery_team_application_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_team_members_feedbacks`
--
ALTER TABLE `delivery_team_members_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_team_members_feedbacks_d_id_foreign` (`d_id`);

--
-- Indexes for table `delivery_team_member_email_verification`
--
ALTER TABLE `delivery_team_member_email_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_team_member_email_verification_d_id_foreign` (`d_id`);

--
-- Indexes for table `delivery_team_member_otp`
--
ALTER TABLE `delivery_team_member_otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_team_member_otp_d_id_foreign` (`d_id`);

--
-- Indexes for table `employees_feedbacks`
--
ALTER TABLE `employees_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_feedbacks_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_application_info`
--
ALTER TABLE `employee_application_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_email_verification`
--
ALTER TABLE `employee_email_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_email_verification_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_otp`
--
ALTER TABLE `employee_otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_otp_e_id_foreign` (`e_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_information`
--
ALTER TABLE `order_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_information_order_id_foreign` (`order_id`),
  ADD KEY `order_information_customer_id_foreign` (`customer_id`),
  ADD KEY `order_information_customer_address_id_foreign` (`customer_address_id`),
  ADD KEY `order_information_product_id_foreign` (`product_id`),
  ADD KEY `order_information_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products_info`
--
ALTER TABLE `products_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_info_seller_id_foreign` (`seller_id`),
  ADD KEY `products_info_selected_category_id_foreign` (`selected_category_id`),
  ADD KEY `products_info_selected_section_id_foreign` (`selected_section_id`);

--
-- Indexes for table `sections_info`
--
ALTER TABLE `sections_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_info_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers_feedbacks`
--
ALTER TABLE `sellers_feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sellers_feedbacks_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `sellers_info`
--
ALTER TABLE `sellers_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers_otp`
--
ALTER TABLE `sellers_otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sellers_otp_s_id_foreign` (`s_id`);

--
-- Indexes for table `seller_email_verification`
--
ALTER TABLE `seller_email_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_email_verification_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `seller_un_ps`
--
ALTER TABLE `seller_un_ps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_un_ps_s_id_foreign` (`s_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sotp`
--
ALTER TABLE `sotp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sotp_s_id_foreign` (`s_id`);

--
-- Indexes for table `system_administration`
--
ALTER TABLE `system_administration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `system_administration_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_email_verification`
--
ALTER TABLE `admin_email_verification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories_info`
--
ALTER TABLE `categories_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cotp`
--
ALTER TABLE `cotp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers_address`
--
ALTER TABLE `customers_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers_feedbacks`
--
ALTER TABLE `customers_feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers_info`
--
ALTER TABLE `customers_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers_otp`
--
ALTER TABLE `customers_otp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers_otp_for_delivery_verification`
--
ALTER TABLE `customers_otp_for_delivery_verification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_cart`
--
ALTER TABLE `customer_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `delivery_team_application_info`
--
ALTER TABLE `delivery_team_application_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery_team_members_feedbacks`
--
ALTER TABLE `delivery_team_members_feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_team_member_email_verification`
--
ALTER TABLE `delivery_team_member_email_verification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_team_member_otp`
--
ALTER TABLE `delivery_team_member_otp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees_feedbacks`
--
ALTER TABLE `employees_feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_application_info`
--
ALTER TABLE `employee_application_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_email_verification`
--
ALTER TABLE `employee_email_verification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_otp`
--
ALTER TABLE `employee_otp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=709;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_information`
--
ALTER TABLE `order_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_info`
--
ALTER TABLE `products_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sections_info`
--
ALTER TABLE `sections_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers_feedbacks`
--
ALTER TABLE `sellers_feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sellers_info`
--
ALTER TABLE `sellers_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sellers_otp`
--
ALTER TABLE `sellers_otp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller_email_verification`
--
ALTER TABLE `seller_email_verification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seller_un_ps`
--
ALTER TABLE `seller_un_ps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sotp`
--
ALTER TABLE `sotp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_administration`
--
ALTER TABLE `system_administration`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_a_id_foreign` FOREIGN KEY (`a_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `admin_email_verification`
--
ALTER TABLE `admin_email_verification`
  ADD CONSTRAINT `admin_email_verification_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `system_administration` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories_info`
--
ALTER TABLE `categories_info`
  ADD CONSTRAINT `categories_info_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `system_administration` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cotp`
--
ALTER TABLE `cotp`
  ADD CONSTRAINT `cotp_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `customers_address`
--
ALTER TABLE `customers_address`
  ADD CONSTRAINT `customers_address_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers_feedbacks`
--
ALTER TABLE `customers_feedbacks`
  ADD CONSTRAINT `customers_feedbacks_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers_otp`
--
ALTER TABLE `customers_otp`
  ADD CONSTRAINT `customers_otp_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `customers_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customers_otp_for_delivery_verification`
--
ALTER TABLE `customers_otp_for_delivery_verification`
  ADD CONSTRAINT `customers_otp_for_delivery_verification_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `customer_cart`
--
ALTER TABLE `customer_cart`
  ADD CONSTRAINT `customer_cart_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customer_cart_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `delivery_team_members_feedbacks`
--
ALTER TABLE `delivery_team_members_feedbacks`
  ADD CONSTRAINT `delivery_team_members_feedbacks_d_id_foreign` FOREIGN KEY (`d_id`) REFERENCES `delivery_team_application_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `delivery_team_member_email_verification`
--
ALTER TABLE `delivery_team_member_email_verification`
  ADD CONSTRAINT `delivery_team_member_email_verification_d_id_foreign` FOREIGN KEY (`d_id`) REFERENCES `delivery_team_application_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `delivery_team_member_otp`
--
ALTER TABLE `delivery_team_member_otp`
  ADD CONSTRAINT `delivery_team_member_otp_d_id_foreign` FOREIGN KEY (`d_id`) REFERENCES `delivery_team_application_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees_feedbacks`
--
ALTER TABLE `employees_feedbacks`
  ADD CONSTRAINT `employees_feedbacks_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employee_application_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_email_verification`
--
ALTER TABLE `employee_email_verification`
  ADD CONSTRAINT `employee_email_verification_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employee_application_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_otp`
--
ALTER TABLE `employee_otp`
  ADD CONSTRAINT `employee_otp_e_id_foreign` FOREIGN KEY (`e_id`) REFERENCES `employee_application_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_information`
--
ALTER TABLE `order_information`
  ADD CONSTRAINT `order_information_customer_address_id_foreign` FOREIGN KEY (`customer_address_id`) REFERENCES `customers_address` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_information_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_information_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_information_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products_info` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_information_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_info`
--
ALTER TABLE `products_info`
  ADD CONSTRAINT `products_info_selected_category_id_foreign` FOREIGN KEY (`selected_category_id`) REFERENCES `categories_info` (`id`),
  ADD CONSTRAINT `products_info_selected_section_id_foreign` FOREIGN KEY (`selected_section_id`) REFERENCES `sections_info` (`id`),
  ADD CONSTRAINT `products_info_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections_info`
--
ALTER TABLE `sections_info`
  ADD CONSTRAINT `sections_info_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `system_administration` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sellers_feedbacks`
--
ALTER TABLE `sellers_feedbacks`
  ADD CONSTRAINT `sellers_feedbacks_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sellers_otp`
--
ALTER TABLE `sellers_otp`
  ADD CONSTRAINT `sellers_otp_s_id_foreign` FOREIGN KEY (`s_id`) REFERENCES `sellers_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seller_email_verification`
--
ALTER TABLE `seller_email_verification`
  ADD CONSTRAINT `seller_email_verification_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seller_un_ps`
--
ALTER TABLE `seller_un_ps`
  ADD CONSTRAINT `seller_un_ps_s_id_foreign` FOREIGN KEY (`s_id`) REFERENCES `sellers` (`id`);

--
-- Constraints for table `sotp`
--
ALTER TABLE `sotp`
  ADD CONSTRAINT `sotp_s_id_foreign` FOREIGN KEY (`s_id`) REFERENCES `sellers` (`id`);

--
-- Constraints for table `system_administration`
--
ALTER TABLE `system_administration`
  ADD CONSTRAINT `system_administration_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `customers_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

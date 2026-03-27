-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2026 at 08:13 AM
-- Server version: 5.7.44
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gracelending_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `action_type` varchar(50) NOT NULL,
  `entity_type` varchar(50) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `description` text,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `application_fees`
--

CREATE TABLE `application_fees` (
  `application_fee_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `fee_reference` varchar(50) NOT NULL,
  `fee_date` date NOT NULL,
  `total_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `income_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `vat_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(50) DEFAULT 'Cash',
  `notes` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` int(11) NOT NULL,
  `asset_number` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `description` text,
  `serial_number` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `assigned_user` varchar(100) DEFAULT NULL,
  `acquisition_date` date NOT NULL,
  `acquisition_value` decimal(15,2) NOT NULL,
  `supplier` varchar(200) DEFAULT NULL,
  `additions` decimal(15,2) DEFAULT '0.00',
  `lifespan_years` int(11) NOT NULL,
  `depreciation_rate` decimal(5,2) NOT NULL,
  `asset_condition` varchar(1000) DEFAULT NULL,
  `monthly_depreciation` decimal(15,2) DEFAULT NULL,
  `daily_depreciation` decimal(15,2) DEFAULT NULL,
  `accumulated_depreciation` decimal(15,2) DEFAULT '0.00',
  `reporting_date` date DEFAULT NULL,
  `disposal_date` date DEFAULT NULL,
  `disposal_value` decimal(15,2) DEFAULT NULL,
  `disposal_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assets`
--


-- --------------------------------------------------------

--
-- Table structure for table `chart_of_accounts`
--

CREATE TABLE `chart_of_accounts` (
  `account_id` int(11) NOT NULL,
  `class` varchar(50) NOT NULL,
  `account_code` varchar(10) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `sub_type` varchar(50) DEFAULT NULL,
  `normal_balance` varchar(10) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chart_of_accounts`
--

INSERT INTO `chart_of_accounts` (`account_id`, `class`, `account_code`, `account_name`, `account_type`, `sub_type`, `normal_balance`, `is_active`, `created_at`, `updated_at`) VALUES
(19, 'Balance Sheet', '1250', 'Loan Offset Control Account', 'Asset', 'Current Asset', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(20, 'Balance Sheet', '1301', 'Prepaid Interest Receivable', 'Asset', 'Current Asset', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(21, 'Balance Sheet', '1302', 'Prepaid Monitoring Fees', 'Asset', 'Current Asset', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(22, 'Balance Sheet', '1303', 'Prepaid Monitoring Fees VAT', 'Asset', 'Current Asset', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(23, 'Balance Sheet', '1304', 'Prepaid Rent', 'Asset', 'Current Asset', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(24, 'Balance Sheet', '1305', 'Prepaid Insurance', 'Asset', 'Current Asset', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(25, 'Balance Sheet', '1306', 'Due from Shareholders', 'Asset', 'Current Asset', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(26, 'Balance Sheet', '1401', 'Office Furniture', 'Asset', 'Fixed Asset', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(29, 'Balance Sheet', '1404', 'Motor Vehicle', 'Asset', 'Fixed Asset', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(30, 'Balance Sheet', '1405', 'Accumulated Depreciation', 'Asset', 'Fixed Asset', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(31, 'Balance Sheet', '2101', 'Accounts Payable', 'Liability', 'Current Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(33, 'Balance Sheet', '2103', 'Accrued Salaries', 'Liability', 'Current Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(34, 'Balance Sheet', '2104', 'Accrued Withholding Tax Payable', 'Liability', 'Current Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(37, 'Balance Sheet', '2107', 'Acrrued Pension', 'Liability', 'Current Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(38, 'Balance Sheet', '2108', 'Accrued Maternity Leave', 'Liability', 'Current Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(39, 'Balance Sheet', '2109', 'Accrued Mutuel', 'Liability', 'Current Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(40, 'Balance Sheet', '2201', 'Loan Payable – Banks', 'Liability', 'Long-term Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(41, 'Balance Sheet', '2202', 'Loan Payable – Other Institutions', 'Liability', 'Long-term Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(45, 'Balance Sheet', '2402', 'Deferred Monitoring Fees', 'Liability', 'Current Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(46, 'Balance Sheet', '2403', 'Deferred VAT', 'Liability', 'Current Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(50, 'Balance Sheet', '2408', 'Loan Overpayment Liability', 'Liability', 'Current Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(51, 'Balance Sheet', '2409', 'Refunds Payable', 'Liability', 'Current Liability', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(54, 'Balance Sheet', '3103', 'Current Year Earnings/Loss', 'Equity', 'Retained Earnings', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(55, 'Balance Sheet', '3104', 'Capital Reserve', 'Equity', 'Other Equity', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(56, 'Income Statement', '4101', 'Interest Income', 'Revenue', 'Operating Revenue', 'Credit', 1, '2026-01-08 11:30:22', '2026-03-18 10:18:51'),
(58, 'Income Statement', '4201', 'Management Fee Income', 'Revenue', 'Operating Revenue', 'Credit', 1, '2026-01-08 11:30:22', '2026-03-18 10:18:51'),
(61, 'Income Statement', '4204', 'Application Fees', 'Revenue', 'Operating Revenue', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(62, 'Income Statement', '4205', 'Penalty Charges', 'Revenue', 'Operating Revenue', 'Credit', 1, '2026-01-08 11:30:22', '2026-03-18 10:18:51'),
(63, 'Income Statement', '4301', 'Impairment Recovery (Provision Reversal Income)', 'Revenue', 'Operating Revenue', 'Credit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(64, 'Income Statement', '5101', 'Salaries & Wages', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(65, 'Income Statement', '5102', 'Staff Training & Development', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(66, 'Income Statement', '5103', 'Transport & Travel', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(67, 'Income Statement', '5104', 'Rent', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(70, 'Income Statement', '5107', 'Communication (Internet, Phone)', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(71, 'Income Statement', '5108', 'Insurance', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(77, 'Income Statement', '5202', 'Consulting Services', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(78, 'Income Statement', '5203', 'Audit & Accounting Services', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(79, 'Income Statement', '5250', 'IT and Communication', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(80, 'Income Statement', '5261', 'Office Equipment Repairs', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(81, 'Income Statement', '5262', 'Building Maintenance', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(82, 'Income Statement', '5263', 'Vehicle Maintenance', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(83, 'Income Statement', '5264', 'Office Partition', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(84, 'Income Statement', '5265', 'Office Branding', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(85, 'Income Statement', '5270', 'Marketing & Advertising Expense', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(86, 'Income Statement', '5275', 'Branding and Design Expenses', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(87, 'Income Statement', '5301', 'Loan Interest Expense', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(88, 'Income Statement', '5302', 'Bank Charges', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(90, 'Income Statement', '5401', 'Depreciation – Furniture', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(91, 'Income Statement', '5402', 'Depreciation – Equipment', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(92, 'Income Statement', '5403', 'Loan Loss Provision Expense', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(93, 'Income Statement', '5501', 'Loan Loss Expense – Principal', 'Expense', 'Operating Expense', 'Debit', 1, '2026-01-08 11:30:22', '2026-01-08 11:30:22'),
(108, 'Balance Sheet', '1101', 'Cash on hand', 'Asset', 'Current Asset', 'Debit', 1, '2026-02-25 12:38:28', '2026-03-04 11:02:01'),
(109, 'Balance Sheet', '1102', 'Bank Account', 'Asset', 'Current Asset', 'Debit', 1, '2026-03-03 16:02:51', '2026-03-04 11:02:17'),
(110, 'Income Statement', '5976', 'Refreshment', 'Expense', 'Operating Expense', 'Debit', 1, '2026-03-03 17:01:16', '2026-03-03 17:01:16'),
(111, 'Income Statement', '5500', 'Office Supplies Expense', 'Expense', 'Operating Expense', 'Debit', 1, '2026-03-04 10:28:31', '2026-03-04 10:28:31'),
(112, 'Income Statement', '5510', 'Utilities Expense', 'Expense', 'Operating Expense', 'Debit', 1, '2026-03-04 12:53:04', '2026-03-04 12:53:04'),
(113, 'Income Statement', '5001', 'Cleaning & Sanitation Expense', 'Expense', 'Operating Expense', 'Debit', 1, '2026-03-04 13:04:06', '2026-03-04 13:04:06'),
(114, 'Income Statement', '5002', 'Security Expense', 'Expense', 'Operating Expense', 'Debit', 1, '2026-03-04 13:18:30', '2026-03-04 13:18:30'),
(115, 'Balance Sheet', '3001', 'Capital', 'Equity', 'Capital Stock', 'Credit', 1, '2026-03-05 11:21:42', '2026-03-05 11:21:42'),
(116, 'Income Statement', '5003', 'Internet Expence', 'Expense', 'Administrative Expense', 'Debit', 1, '2026-03-09 09:07:43', '2026-03-09 09:07:43'),
(117, 'Income Statement', '5004', 'fee Charges', 'Expense', 'Non-operating Expense', 'Debit', 1, '2026-03-09 12:55:54', '2026-03-09 12:55:54'),
(118, 'Income Statement', '5005', 'Office Equipment Maintenance', 'Expense', 'Operating Expense', 'Debit', 1, '2026-03-10 09:55:39', '2026-03-10 09:55:39'),
(119, 'Income Statement', '5006', 'Relocation expenses', 'Expense', 'Operating Expense', 'Debit', 1, '2026-03-11 09:27:20', '2026-03-11 09:27:20'),
(120, 'Income Statement', '5007', 'Recovery Expense', 'Expense', 'Operating Expense', 'Debit', 1, '2026-03-12 08:21:11', '2026-03-12 08:21:11'),
(121, 'Income Statement', '5008', 'Board of Directors Allowances', 'Expense', 'Operating Expense', 'Debit', 1, '2026-03-16 09:07:50', '2026-03-16 09:07:50'),
(122, 'Income Statement', '5009', 'Board Meeting Expenses', 'Expense', 'Operating Expense', 'Debit', 1, '2026-03-16 09:23:53', '2026-03-16 09:23:53'),
(123, 'Income Statement', '5010', 'Software Development Expense', 'Expense', 'Operating Expense', 'Debit', 1, '2026-03-17 10:24:45', '2026-03-17 10:24:45'),
(124, 'Balance Sheet', '1103', 'Mobile Money Account', 'Asset', 'Current Asset', 'Debit', 1, '2026-03-18 10:08:12', '2026-03-18 10:08:12'),
(125, 'Balance Sheet', '1201', 'Loans to Customers', 'Asset', 'Current Asset', 'Debit', 1, '2026-03-23 20:29:51', '2026-03-23 20:29:51');
-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_place` text COLLATE utf8mb4_unicode_ci,
  `id_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci DEFAULT 'Male',
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT 'gracelending',
  `father_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marriage_type` enum('Single','Married','Divorced') COLLATE utf8mb4_unicode_ci DEFAULT 'Single',
  `spouse` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `location` text COLLATE utf8mb4_unicode_ci,
  `project` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_location` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caution_location` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requested_amount` decimal(15,2) DEFAULT '0.00',
  `loan_duration` int(11) DEFAULT '0',
  `province` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,

  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'admin',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT '1',
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Approved',
  `doc_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'National ID Path',
  `doc_contract` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Work Contract Path',
  `doc_statement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Bank Statement Path',
  `doc_payslip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payslip Path',
  `doc_marital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Marital Status Cert Path',
  `doc_rdb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'RDB Certificate Path',
  `has_guarantor` enum('Yes','No') COLLATE utf8mb4_unicode_ci DEFAULT 'No',
  `guarantor_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantor_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantor_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guarantor_occupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `risk_rating` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_balance` decimal(15,2) DEFAULT '0.00',
  `total_loans` decimal(15,2) DEFAULT '0.00',
  `total_paid` decimal(15,2) DEFAULT '0.00',
  `rejection_reason` text COLLATE utf8mb4_unicode_ci,
  `correction_fields` text COLLATE utf8mb4_unicode_ci,
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `client_resubmitted` tinyint(1) DEFAULT '0',
  `resubmitted_fields` text COLLATE utf8mb4_unicode_ci,
  `total_disbursed` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_outstanding` decimal(15,2) NOT NULL DEFAULT '0.00',
  `last_loan_date` date DEFAULT NULL,
  `record_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--


-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(11) NOT NULL,
  `expense_reference` varchar(50) NOT NULL,
  `expense_date` date NOT NULL,
  `account_code` varchar(20) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `expense_amount` decimal(15,2) NOT NULL,
  `payment_type` enum('cash','bank') DEFAULT 'bank',
  `description` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--


-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `ledger_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `class` varchar(50) NOT NULL,
  `account_code` varchar(10) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `voucher_number` varchar(50) DEFAULT NULL,
  `narration` text,
  `beginning_balance` decimal(15,2) DEFAULT '0.00',
  `debit_amount` decimal(15,2) DEFAULT '0.00',
  `credit_amount` decimal(15,2) DEFAULT '0.00',
  `movement` decimal(15,2) DEFAULT '0.00',
  `ending_balance` decimal(15,2) DEFAULT '0.00',
  `reference_type` varchar(50) DEFAULT NULL,
  `reference_id` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sequence_number` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ledger`
--


-- --------------------------------------------------------

--
-- Table structure for table `loan_application_fees`
--

CREATE TABLE `loan_application_fees` (
  `id` int(11) NOT NULL,
  `loan_number` varchar(50) DEFAULT NULL,
  `applicant_name` varchar(255) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `fee_amount` decimal(15,2) DEFAULT NULL,
  `payment_status` enum('Paid','Pending','Refunded') DEFAULT 'Pending',
  `payment_date` date DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `reference_number` varchar(100) DEFAULT NULL,
  `notes` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_instalments`
--

CREATE TABLE `loan_instalments` (
  `instalment_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `loan_number` varchar(50) NOT NULL,
  `instalment_number` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `payment_date` date DEFAULT NULL,
  `opening_balance` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Principal balance at start of period',
  `closing_balance` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Principal balance at end of period',
  `principal_amount` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Principal portion of payment',
  `interest_amount` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Interest portion of payment',
  `management_fee` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Management fee for this instalment',
  `total_payment` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Total payment required (principal + interest + mgmt fee)',
  `paid_amount` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Amount actually paid',
  `principal_paid` decimal(15,2) NOT NULL DEFAULT '0.00',
  `interest_paid` decimal(15,2) NOT NULL DEFAULT '0.00',
  `management_fee_paid` decimal(15,2) NOT NULL DEFAULT '0.00',
  `balance_remaining` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Unpaid portion of this instalment',
  `days_overdue` int(11) NOT NULL DEFAULT '0',
  `penalty_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `penalty_paid` decimal(15,2) NOT NULL DEFAULT '0.00',
  `status` enum('Pending','Partially Paid','Fully Paid','Overdue') NOT NULL DEFAULT 'Pending',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `overdue_ledger_recorded` tinyint(1) DEFAULT '0',
  `ninety_day_recorded` tinyint(1) DEFAULT '0',
  `monitoring_fee_net` decimal(15,2) DEFAULT '0.00',
  `monitoring_fee_vat` decimal(15,2) DEFAULT '0.00',
  `monitoring_fee_total` decimal(15,2) DEFAULT '0.00',
  `provision_calculated` tinyint(1) DEFAULT '0',
  `provision_amount` decimal(15,2) DEFAULT '0.00',
  `provision_date` date DEFAULT NULL,
  `suspension_recorded` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_instalments`
--


-- --------------------------------------------------------

--
-- Table structure for table `loan_payments`
--

CREATE TABLE `loan_payments` (
  `payment_id` int(11) NOT NULL,
  `loan_instalment_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `month_paid` varchar(200) DEFAULT NULL,
  `payment_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `beginning_balance` decimal(15,2) DEFAULT '0.00',
  `payment_amount` decimal(15,2) NOT NULL,
  `interest_amount` decimal(15,2) DEFAULT '0.00',
  `principal_amount` decimal(15,2) DEFAULT '0.00',
  `monitoring_fee` decimal(15,2) DEFAULT '0.00',
  `days_overdue` int(11) DEFAULT '0',
  `penalties` decimal(15,2) DEFAULT '0.00',
  `final_payment` decimal(15,2) DEFAULT '0.00',
  `payment_method` varchar(50) DEFAULT NULL,
  `reference_number` varchar(100) DEFAULT NULL,
  `notes` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adjustment_id` int(40) DEFAULT NULL,
  `payment_evidence` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `loan_payment_adjustments`
--

CREATE TABLE `loan_payment_adjustments` (
  `adjustment_id` bigint(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `instalment_id` int(11) NOT NULL,
  `instalment_number` int(11) NOT NULL,
  `record_date` date NOT NULL,
  `adjustment_amount` decimal(15,2) NOT NULL,
  `adjustment_type` varchar(100) NOT NULL DEFAULT 'ADJUSTMENT',
  `status` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_payment_variance`
--

CREATE TABLE `loan_payment_variance` (
  `variance_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `loan_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instalment_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `expected_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `actual_amount_paid` decimal(15,2) NOT NULL DEFAULT '0.00',
  `variance_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `variance_type` enum('overpayment','underpayment','prepayment','exact_payment') COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal_expected` decimal(15,2) DEFAULT '0.00',
  `principal_paid` decimal(15,2) DEFAULT '0.00',
  `principal_variance` decimal(15,2) DEFAULT '0.00',
  `interest_expected` decimal(15,2) DEFAULT '0.00',
  `interest_paid` decimal(15,2) DEFAULT '0.00',
  `interest_variance` decimal(15,2) DEFAULT '0.00',
  `monitoring_fee_expected` decimal(15,2) DEFAULT '0.00',
  `monitoring_fee_paid` decimal(15,2) DEFAULT '0.00',
  `monitoring_fee_variance` decimal(15,2) DEFAULT '0.00',
  `penalty_expected` decimal(15,2) DEFAULT '0.00',
  `penalty_paid` decimal(15,2) DEFAULT '0.00',
  `penalty_variance` decimal(15,2) DEFAULT '0.00',
  `unallocated_balance` decimal(15,2) DEFAULT '0.00',
  `allocated_balance` decimal(15,2) DEFAULT '0.00',
  `is_prepayment` tinyint(1) DEFAULT '0',
  `instalments_covered` int(11) DEFAULT '0',
  `prepayment_discount` decimal(15,2) DEFAULT '0.00',
  `status` enum('pending','allocated','partially_allocated','refunded','carried_forward') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `allocation_notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_portfolio`
--

CREATE TABLE `loan_portfolio` (
  `loan_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `loan_number` varchar(50) NOT NULL,
  `loan_amount` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Principal amount given to customer',
  `management_fee_rate` decimal(5,2) NOT NULL DEFAULT '5.50' COMMENT 'Management fee percentage (5.5%)',
  `management_fee_amount` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Management fee (5.5% of loan amount)',
  `total_disbursed` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Loan amount + Management fee',
  `interest_rate` decimal(5,2) NOT NULL COMMENT 'Monthly interest rate percentage',
  `number_of_instalments` int(11) NOT NULL,
  `disbursement_date` date NOT NULL,
  `maturity_date` date NOT NULL,
  `total_interest` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Sum of all interest payments',
  `total_management_fees` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Total management fees across all instalments',
  `total_payment` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Total to be paid (principal + interest + mgmt fees)',
  `monthly_payment` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Fixed monthly payment amount (after 1st instalment)',
  `principal_outstanding` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Remaining principal balance',
  `interest_outstanding` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Remaining interest to be paid',
  `total_outstanding` decimal(15,2) NOT NULL DEFAULT '0.00' COMMENT 'Total remaining balance',
  `total_paid` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_principal_paid` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_interest_paid` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_management_fees_paid` decimal(15,2) NOT NULL DEFAULT '0.00',
  `accrued_interest` decimal(15,2) NOT NULL DEFAULT '0.00',
  `accrued_days` int(11) NOT NULL DEFAULT '0',
  `accrued_management_fees` decimal(15,2) NOT NULL DEFAULT '0.00',
  `deferred_management_fees` decimal(15,2) NOT NULL DEFAULT '0.00',
  `days_overdue` int(11) NOT NULL DEFAULT '0',
  `penalties` decimal(15,2) NOT NULL DEFAULT '0.00',
  `cash_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `bank_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `collateral_type` varchar(50) DEFAULT NULL,
  `collateral_description` text,
  `collateral_value` decimal(15,2) DEFAULT '0.00',
  `collateral_net_value` decimal(15,2) DEFAULT '0.00',
  `provisional_rate` decimal(5,2) NOT NULL DEFAULT '1.00',
  `general_provision` decimal(15,2) NOT NULL DEFAULT '0.00',
  `net_book_value` decimal(15,2) NOT NULL DEFAULT '0.00',
  `loan_status` varchar(100) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_provision_date` date DEFAULT NULL,
  `record_date` date DEFAULT NULL,
  `deduct_fee_from_disbursed` decimal(50,6) DEFAULT NULL,
  `is_topup` tinyint(1) NOT NULL DEFAULT '0',
  `topup_type` enum('increasing','decreasing') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_portfolio`
--


-- --------------------------------------------------------

--
-- Table structure for table `loan_transactions`
--

CREATE TABLE `loan_transactions` (
  `transaction_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `loan_number` varchar(50) NOT NULL,
  `transaction_type` enum('Disbursement','Payment','Fee','Adjustment','Write-off','Recovery') NOT NULL,
  `transaction_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `description` text,
  `reference_number` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loan_transactions`
--


-- --------------------------------------------------------

--
-- Table structure for table `pending_approvals`
--

CREATE TABLE `pending_approvals` (
  `approval_id` int(11) NOT NULL,
  `action_type` varchar(20) NOT NULL,
  `entity_type` varchar(30) NOT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `action_data` longtext NOT NULL,
  `description` varchar(255) NOT NULL,
  `submitted_by` varchar(100) NOT NULL,
  `submitted_by_role` varchar(50) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `reviewed_by` varchar(100) DEFAULT NULL,
  `reviewed_at` datetime DEFAULT NULL,
  `review_notes` text,
  `submitted_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pending_approvals`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`, `full_name`, `email`, `is_active`, `created_at`) VALUES
(1, 'director', '$2y$10$7H4M5WL6tCFnmOqhoYq.iesWfQKZDZl6RvVvntLduz13CwmOYftIC', 'Director', 'Company Director', 'director@gracelending.rw', 1, '2026-03-10 09:53:36'),
(2, 'md', '$2y$12$ecP129QBOikbBaZEp/.swup3kbd1FT9FEvRErygvJTPagr1Rka1kq', 'MD', 'Managing Director', 'md@gracelending.rw', 1, '2026-03-10 09:53:36'),
(3, 'accountant', '$2y$12$ecP129QBOikbBaZEp/.swup3kbd1FT9FEvRErygvJTPagr1Rka1kq', 'Accountant', 'Senior Accountant', 'accountant@gracelending.rw', 1, '2026-03-10 09:53:36'),
(4, 'secretary', '$2y$12$ecP129QBOikbBaZEp/.swup3kbd1FT9FEvRErygvJTPagr1Rka1kq', 'Secretary', 'Company Secretary', 'secretary@gracelending.rw', 1, '2026-03-10 09:53:36'),
(5, 'developerwilly', '$2y$12$AVnPsQrdA0pn.L23zMejWOgx1QoOj383bISQj067yHPpqG7m7iAZe', 'Developer', 'Willy Developer', 'willy@gracelending.rw', 1, '2026-03-10 11:42:13'),
(6, 'developerghis', '$2y$12$AVnPsQrdA0pn.L23zMejWOgx1QoOj383bISQj067yHPpqG7m7iAZe', 'Developer', 'Ghislain Developer', 'ghis@gracelending.rw', 1, '2026-03-10 11:42:13');



--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `action_type` (`action_type`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `application_fees`
--
ALTER TABLE `application_fees`
  ADD PRIMARY KEY (`application_fee_id`),
  ADD UNIQUE KEY `fee_reference` (`fee_reference`),
  ADD KEY `idx_customer` (`customer_id`),
  ADD KEY `idx_fee_date` (`fee_date`),
  ADD KEY `idx_reference` (`fee_reference`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`),
  ADD UNIQUE KEY `asset_number` (`asset_number`);

--
-- Indexes for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_code` (`account_code`),
  ADD KEY `idx_account_code` (`account_code`),
  ADD KEY `idx_account_type` (`account_type`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `uq_customer_code` (`customer_code`),
  ADD KEY `idx_id_number` (`id_number`),
  ADD KEY `idx_customer_code` (`customer_code`),
  ADD KEY `idx_phone` (`phone`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`),
  ADD UNIQUE KEY `expense_reference` (`expense_reference`),
  ADD KEY `idx_expense_date` (`expense_date`),
  ADD KEY `idx_account_code` (`account_code`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`ledger_id`),
  ADD KEY `idx_transaction_date` (`transaction_date`),
  ADD KEY `idx_account_code` (`account_code`),
  ADD KEY `idx_voucher_number` (`voucher_number`),
  ADD KEY `idx_reference` (`reference_type`,`reference_id`),
  ADD KEY `idx_ledger_sequence` (`account_code`,`transaction_date`,`sequence_number`);

--
-- Indexes for table `loan_application_fees`
--
ALTER TABLE `loan_application_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_instalments`
--
ALTER TABLE `loan_instalments`
  ADD PRIMARY KEY (`instalment_id`),
  ADD KEY `loan_id` (`loan_id`),
  ADD KEY `loan_number` (`loan_number`),
  ADD KEY `instalment_number` (`instalment_number`),
  ADD KEY `due_date` (`due_date`),
  ADD KEY `status` (`status`),
  ADD KEY `idx_instalment_dates` (`due_date`,`payment_date`),
  ADD KEY `idx_instalment_status` (`loan_id`,`status`);

--
-- Indexes for table `loan_payments`
--
ALTER TABLE `loan_payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `loan_instalment_id` (`loan_instalment_id`),
  ADD KEY `idx_loan_id` (`loan_id`),
  ADD KEY `idx_payment_date` (`payment_date`);

--
-- Indexes for table `loan_payment_adjustments`
--
ALTER TABLE `loan_payment_adjustments`
  ADD PRIMARY KEY (`adjustment_id`),
  ADD KEY `fk_loan` (`loan_id`),
  ADD KEY `idx_customer_loan` (`customer_id`,`loan_id`),
  ADD KEY `idx_instalment` (`instalment_id`),
  ADD KEY `idx_record_date` (`record_date`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `loan_payment_variance`
--
ALTER TABLE `loan_payment_variance`
  ADD PRIMARY KEY (`variance_id`),
  ADD KEY `idx_payment_id` (`payment_id`),
  ADD KEY `idx_loan_id` (`loan_id`),
  ADD KEY `idx_instalment_id` (`instalment_id`),
  ADD KEY `idx_customer_id` (`customer_id`),
  ADD KEY `idx_variance_type` (`variance_type`),
  ADD KEY `idx_unallocated_balance` (`unallocated_balance`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `loan_portfolio`
--
ALTER TABLE `loan_portfolio`
  ADD PRIMARY KEY (`loan_id`),
  ADD UNIQUE KEY `loan_number` (`loan_number`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `loan_status` (`loan_status`),
  ADD KEY `disbursement_date` (`disbursement_date`),
  ADD KEY `idx_loan_customer` (`customer_id`,`loan_status`),
  ADD KEY `idx_loan_dates` (`disbursement_date`,`maturity_date`);

--
-- Indexes for table `loan_transactions`
--
ALTER TABLE `loan_transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `idx_loan_id` (`loan_id`),
  ADD KEY `idx_transaction_date` (`transaction_date`),
  ADD KEY `idx_transaction_type` (`transaction_type`);

--
-- Indexes for table `pending_approvals`
--
ALTER TABLE `pending_approvals`
  ADD PRIMARY KEY (`approval_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- AUTO_INCREMENT for table `application_fees`
--
ALTER TABLE `application_fees`
  MODIFY `application_fee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `chart_of_accounts`
--
ALTER TABLE `chart_of_accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `ledger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16420;

--
-- AUTO_INCREMENT for table `loan_application_fees`
--
ALTER TABLE `loan_application_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_instalments`
--
ALTER TABLE `loan_instalments`
  MODIFY `instalment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1332;

--
-- AUTO_INCREMENT for table `loan_payments`
--
ALTER TABLE `loan_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `loan_payment_adjustments`
--
ALTER TABLE `loan_payment_adjustments`
  MODIFY `adjustment_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_payment_variance`
--
ALTER TABLE `loan_payment_variance`
  MODIFY `variance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_portfolio`
--
ALTER TABLE `loan_portfolio`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- AUTO_INCREMENT for table `loan_transactions`
--
ALTER TABLE `loan_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=678;

--
-- AUTO_INCREMENT for table `pending_approvals`
--
ALTER TABLE `pending_approvals`
  MODIFY `approval_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loan_instalments`
--
ALTER TABLE `loan_instalments`
  ADD CONSTRAINT `loan_instalments_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loan_portfolio` (`loan_id`) ON DELETE CASCADE;

--
-- Constraints for table `loan_payments`
--
ALTER TABLE `loan_payments`
  ADD CONSTRAINT `loan_payments_ibfk_1` FOREIGN KEY (`loan_instalment_id`) REFERENCES `loan_instalments` (`instalment_id`),
  ADD CONSTRAINT `loan_payments_ibfk_2` FOREIGN KEY (`loan_id`) REFERENCES `loan_portfolio` (`loan_id`);

--
-- Constraints for table `loan_payment_adjustments`
--
ALTER TABLE `loan_payment_adjustments`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_instalment` FOREIGN KEY (`instalment_id`) REFERENCES `loan_instalments` (`instalment_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_loan` FOREIGN KEY (`loan_id`) REFERENCES `loan_portfolio` (`loan_id`) ON UPDATE CASCADE;

--
-- Constraints for table `loan_transactions`
--
ALTER TABLE `loan_transactions`
  ADD CONSTRAINT `loan_transactions_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loan_portfolio` (`loan_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

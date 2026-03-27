# Accounting and Loan Management System - Documentation

Welcome to the comprehensive documentation for the **Accounting and Loan Management System**. This document outlines the core modules, features, and workflows available to users. It is designed to serve as an end-user guide and a reference for AI assistants (like Claude) to understand the full capabilities and logic of the software.

---

## 🔐 1. Authentication
### `/login`
The secure entry point into the system. Access is strictly controlled via Role-Based Access Control (RBAC).
* **Roles included:** Director, Managing Director (MD), Accountant, Secretary.
* **Functionality:** Authenticates users and redirects them to their specialized dashboard based on permissions.

---

## 📊 2. Main Dashboard
### `/index`
The central command center providing a high-level overview of the company's financial and operational health.
* **Key Metrics Displayed:** Total Active Loans, Total Outstanding Principal, Total Revenue (Interest + Fees), Total Cash/Bank Balances.
* **Visuals:** Charts tracking loan disbursements vs. repayments, and monthly expense summaries.
* **Recent Activity Feed:** Real-time log of system events (payments received, customers approved, new expenses).

---

## 🏦 3. Financial & Accounting Modules

### General Ledger (`/index?page=ledger`)
The heart of the accounting system where all financial transactions are recorded in chronological order.
* **General Ledger Table:** View all automated double-entry postings (Debits and Credits) with running ending balances. Filterable by date, account, and voucher number.
* **Manual Journal Entry Form:** Allows Accountants to perform manual interventions (e.g., fund transfers between Mobile Money and Bank Accounts, depreciation postings, or corrections). Ensures Debits strictly equal Credits before saving.

### Chart of Accounts (`/index?page=chart_of_accounts`)
The foundation of the financial structure.
* **Functionality:** Create, edit, and categorize accounts into *1000s (Assets), 2000s (Liabilities), 3000s (Equity), 4000s (Revenue), and 5000s (Expenses)*.
* Defines the "Normal Balance" (Debit or Credit) for each account to maintain strict accounting principles.

### Expenses (`/index?page=expenses`)
Module for recording day-to-day company expenditures.
* **Functionality:** Record operating expenses (Salaries, Rent, Internet, etc.) directly against Cash or Bank accounts.
* **Automation:** Automatically instantly posts the correct Debit to the Expense account and Credit to the Asset account in the General Ledger.

### Fixed Assets (`/index?page=assets`)
Tracks the company’s physical property (e.g., Computers, Vehicles, Furniture).
* **Functionality:** Records acquisition value, lifespan, and location.
* Computes and tracks accumulated depreciation over time.

---

## 📈 4. Financial Reports
### `/index?page=financial_report`
The central hub for generating strictly balanced accounting statements across custom date ranges.

* **Trial Balance (`&type=trial_balance`)** 
  * Displays the total Debit and Credit balances of every active account. Used to strictly prove that the ledger equations balance at any given time.
* **Balance Sheet (`&type=balance_sheet`)**
  * A snapshot of the company's financial position. Proves the accounting equation: `Assets = Liabilities + Owner's Equity`.
* **Income Statement (`&type=income_statement`)**
  * The Profit and Loss (P&L) report. Subtracts total Operating Expenses from total Operating Revenue (Interest + Fees) to output the Net Income for the period.
* **Income Analysis (`&type=income_analysis`)**
  * A deeply granular breakdown of revenue strictly grouped by Customer. Shows exactly how much Application Fee, Management Fee, Interest, and Penalties were extracted from each borrower.

---

## 👥 5. Customer Lifecycle & Underwriting

### Pending Customers (`/index?page=pending_customers`)
The KYC (Know Your Customer) pipeline.
* **Functionality:** Holds new loan applications awaiting document verification.
* Staff review uploaded documents (National ID, Work Contract, Bank Statements) and Guarantor details before passing them to approval.

### Approved Customers (`/index?page=customers`)
The active client directory.
* **Functionality:** View customer demographic data, contact info, total loans taken, and historical repayment behavior.

### Rejected Customers (`/index?page=rejected_customers`)
The archive for declined applications.
* **Functionality:** Stores applicants who failed risk assessment. Includes notes on *why* they were rejected, preventing them from repeatedly applying without resolving the issue.

---

## 💸 6. Loan Portfolio Management

### Active Loans (`/index?page=loans`)
The core operational portfolio tracking money disbursed to borrowers.
* **Functionality:** View all active loans, original principal, and outstanding balances.
* **Record Payment:** The gateway to process borrower repayments. Routes payments directly to Cash, Bank, or Mobile Money and intelligently splits the payment into Principal, Interest, Management Fees, VAT, and Penalties—automatically pushing the complex double-entry journals into the Ledger.

### Overdue & Collections (`/index?page=overdue`)
Critical risk-management dashboard focused strictly on defaulted payments.
* **Functionality:** Highlights loans that have missed an instalment date.
* Calculates **Days Past Due (DPD)** and automatically accrues late penalties based on system configuration.

---

## ⚙️ 7. System Administration & Auditing

### General Reports (`/index?page=reports`)
Operational reporting outside of strictly financial statements.
* Generate PDFs/Excel exports of Loan Disbursement Logs, Daily Collection Summaries, and User Activity statistics.

### Pending Approvals (`/index?page=approvals`)
The multi-level authorization queue.
* Captures sensitive actions (like large disbursements or manual journal entries) and holds them until a Director or MD visually reviews and clicks "Approve" or "Reject".

### Notifications (`/index?page=notifications`)
The internal alert system.
* Pings relevant staff when actions are required (e.g., "New customer awaits KYC", "Loan Application approved and awaiting disbursement", "Customer XYZ is 5 days overdue").

# Fullstack Development Questions For Perfect Configuration

Welcome to the system onboarding phase. To ensure the financial software is perfectly tailored to your institution's specific logic, workflows, and accounting principles, please provide detailed answers to the following configuration requirements.

---

## 1. 🏛️ Accounting & General Ledger (Chart of Accounts)
*This section ensures the system's core accounting structure flawlessly matches your current books and reporting standards.*

- **Financial Accounts Setup:**
  - What are the exact names of all your physical bank accounts? (e.g., Bank of Kigali, Equity Bank, I&M Bank)
  - Do you use specific Mobile Money or Payment Gateway merchant codes? (e.g., MomoPay, Airtel Money)
- **Expense Tracking:**
  - What are your primary monthly operating expense categories? (e.g., Rent, Salaries, Communication, Internet, Board Allowances, Marketing)
  - Are there any specific non-operating expenses you consistently track?
- **Starting Balances (Data Migration):**
  - What is the current opening balance for your Cash on Hand, Bank Accounts, Mobile Money, and Capital/Equity? (This is required to record the initial Manual Journal Entry and balance the books).
- **Chart of Accounts Structure:**
  - Do you use specific numerical account codes (e.g., 1000s for Assets, 2000s for Liabilities)? If yes, please provide your current Chart of Accounts exported from your previous system.

---

## 2. 💰 Loan Products & Financial Math
*This section configures the core calculation engine for interest, penalties, and service deductions.*

- **Interest Configuration:**
  - What is your standard interest rate calculation? Is it flat, reducing balance, monthly, or annualized?
- **Processing & Management Fees:**
  - What is your standard Management or Processing Fee for a loan? Is it a flat numerical amount or a percentage of the total loan amount? (e.g., 5.50%)
- **Application Charges:**
  - Do you charge a non-refundable Application Fee before an assessment is done? If yes, how much is it?
- **Overdue Penalty Structure:**
  - Exactly how are late payments penalized? Is it a fixed fee per day overdue, or a percentage of the unpaid instalment? 
- **Taxation (VAT):**
  - Do your supplementary fees (such as Monitoring or Management Fees) include an 18% VAT that the system needs to segregate and track automatically?

---

## 3. 👥 Customer Onboarding & KYC (Know Your Customer)
*This captures the mandatory compliance and risk-assessment data required for a borrower.*

- **Mandatory Documentation:**
  - Which documents are strictly required to be uploaded before a loan application can be submitted?
    - *(Current system defaults: National ID, Working Contract, Bank Statement, Payslip, Marital Status Certificate, RDB Certificate)*. Are there any items to add or remove?
- **Guarantor Compliance:**
  - Do you mandate Guarantors for your specific loan products?
  - If yes, what exact details must be captured from the Guarantor? (e.g., ID Number, Occupation, Phone Number)

---

## 4. 🏢 Users & Administrative Roles
*This designates staff permissions, access controls, and workflow hierarchies.*

- **Staff Accounts List:**
  - Please provide the First Name, Last Name, and Email Address for every staff member who requires access to the system.
- **Roles & Permissions:**
  - Which staff members belong to which roles?
    - *(Available Roles: Director, Managing Director, Accountant, Secretary)*
- **Approval Hierarchy:**
  - What is the exact chain of command for loan approvals? Who has the final authority to click "Approve" and push a loan to the disbursement stage?

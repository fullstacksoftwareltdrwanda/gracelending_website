# Chart of Accounts Review & Configuration Guide (All 69 Accounts)

Below is the complete list of all 69 system accounts currently configured and tracked by the Accounting and Loan Management System. Please review this list and indicate which accounts you wish to **keep, remove, rename, or update**.

> **Note to Clients:** Accounts designated as *(System Critical)* are strictly required by the system to process specific automated transactions (such as loan disbursements or repayments) and should **not** be deleted, though their names can be customized.

---

### 🏛️ Assets (1000s) - What the company owns
| Code | Account Name | Type | Balance | Description in System |
| :--- | :--- | :--- | :--- | :--- |
| `1101` | Cash on hand | Asset | Debit | *(System Critical)* Default destination for all internal cash transactions and physical cash loan repayments. |
| `1102` | Bank Account | Asset | Debit | *(System Critical)* Default destination for all bank transfer repayments and disbursements. |
| `1201` | Loans to Customers | Asset | Debit | *(System Critical)* Represents the total outstanding principal of all borrower loans (The Loan Portfolio). |
| `1250` | Loan Offset Control Account | Asset | Debit | Temporary holding account for balancing complex loan adjustments. |
| `1301` | Prepaid Interest Receivable | Asset | Debit | Tracks interest that is billed but not yet technically collected. |
| `1302` | Prepaid Monitoring Fees | Asset | Debit | Tracks monitoring fees that are billed but not yet collected. |
| `1303` | Prepaid Monitoring Fees VAT | Asset | Debit | Tracks the VAT portion of the uncollected monitoring fees. |
| `1304` | Prepaid Rent | Asset | Debit | Advance payments made by the company for office space. |
| `1305` | Prepaid Insurance | Asset | Debit | Advance payments made by the company for company insurance. |
| `1306` | Due from Shareholders | Asset | Debit | Capital owed to the business by shareholders. |
| `1401` | Office Furniture | Asset | Debit | Fixed asset tracking for physical office property. |
| `1404` | Motor Vehicle | Asset | Debit | Fixed asset tracking for company transport vehicles. |
| `1405` | Accumulated Depreciation | Asset | Credit | Negative asset tracking the loss of value of fixed equipment over time. |
| `1103` | Mobile Money Account | Asset | Debit | *(System Critical)* Default destination for all Mobile Money loan repayments. |

### 📉 Liabilities (2000s) - What the company owes
| Code | Account Name | Type | Balance | Description in System |
| :--- | :--- | :--- | :--- | :--- |
| `2101` | Accounts Payable | Liability | Credit | General account for money owed to suppliers or vendors. |
| `2103` | Accrued Salaries | Liability | Credit | Salaries owed to staff but not yet physically paid out. |
| `2104` | Accrued Withholding Tax Payable| Liability | Credit | Taxes withheld from payroll/suppliers that must be remitted to RRA. |
| `2107` | Acrrued Pension | Liability | Credit | Staff pension contributions owed but not yet deposited. |
| `2108` | Accrued Maternity Leave | Liability | Credit | Leave funds withheld but not yet paid to authorities. |
| `2109` | Accrued Mutuel | Liability | Credit | Community-based health insurance withholding. |
| `2201` | Loan Payable – Banks | Liability | Credit | Money the institution has borrowed from larger commercial banks. |
| `2202` | Loan Payable – Other Inst. | Liability | Credit | Money the institution has borrowed from non-bank institutions. |
| `2402` | Deferred Monitoring Fees | Liability | Credit | Monitoring fee revenue collected in advance (unearned). |
| `2403` | Deferred VAT | Liability | Credit | VAT collected on fees that must be remitted to the revenue authority. |
| `2408` | Loan Overpayment Liability | Liability | Credit | *(System Critical)* Tracks excess money paid by customers beyond their total loan balance (Refunds owed). |
| `2409` | Refunds Payable | Liability | Credit | Holds approved customer overpayment refunds pending actual cash payout. |

### ⚖️ Equity (3000s) - Owner's capital & retained earnings
| Code | Account Name | Type | Balance | Description in System |
| :--- | :--- | :--- | :--- | :--- |
| `3001` | Capital | Equity | Credit | The main opening investment capital of the institution. |
| `3103` | Current Year Earnings/Loss | Equity | Credit | Automated calculation of the Net Income extracted from the Income Statement. |
| `3104` | Capital Reserve | Equity | Credit | Funds set aside by the institution for specific long-term purposes. |

### 💵 Revenue (4000s) - Income generated
| Code | Account Name | Type | Balance | Description in System |
| :--- | :--- | :--- | :--- | :--- |
| `4101` | Interest Income | Revenue | Credit | *(System Critical)* Automatically credited with the interest portion of every loan repayment. |
| `4201` | Management Fee Income | Revenue | Credit | *(System Critical)* Automatically credited with the upfront or monthly loan processing/management fees. |
| `4204` | Application Fees | Revenue | Credit | Revenue from upfront, non-refundable customer application charges. |
| `4205` | Penalty Charges | Revenue | Credit | *(System Critical)* Automatically credited when late payment penalty fees are collected. |
| `4301` | Impairment Recovery | Revenue | Credit | Revenue recognized when a previously written-off or provisioned loan is successfully recovered. |

### 🧾 Expenses (5000s) - Operating costs
| Code | Account Name | Type | Balance | Description in System |
| :--- | :--- | :--- | :--- | :--- |
| `5001` | Cleaning & Sanitation Expense| Expense | Debit | Costs for office upkeep and hygiene. |
| `5002` | Security Expense | Expense | Debit | Payments made to security firms or guards. |
| `5003` | Internet Expence | Expense | Debit | Periodic costs for office connectivity. |
| `5004` | fee Charges | Expense | Debit | Miscellaneous institutional fee records. |
| `5005` | Office Equipment Maint. | Expense | Debit | Maintenance specific to hardware or printers. |
| `5006` | Relocation expenses | Expense | Debit | Moving and transport of office during relocations. |
| `5007` | Recovery Expense | Expense | Debit | Money spent strictly on chasing defaulted loans (e.g. bailiffs). |
| `5008` | Board of Directors Allow. | Expense | Debit | Sitting allowances for board members. |
| `5009` | Board Meeting Expenses | Expense | Debit | Event/venue or transport costs for board members. |
| `5010` | Software Development Ex. | Expense | Debit | Costs associated with IT expansion or freelance dev work. |
| `5101` | Salaries & Wages | Expense | Debit | General monthly payroll costs for staff. |
| `5102` | Staff Training & Dev. | Expense | Debit | Educational costs and workshops for staff. |
| `5103` | Transport & Travel | Expense | Debit | Field visit fuel or travel reimbursement. |
| `5104` | Rent | Expense | Debit | Monthly office space leasing costs. |
| `5107` | Communication (Int/Phone)| Expense | Debit | Phone credit, minutes, and communication items. |
| `5108` | Insurance | Expense | Debit | Monthly allocation of paid insurance policies. |
| `5202` | Consulting Services | Expense | Debit | Third-party professional consulting fees. |
| `5203` | Audit & Accounting Serv. | Expense | Debit | Fees for external audits. |
| `5250` | IT and Communication | Expense | Debit | General IT overhead software licensing. |
| `5261` | Office Equipment Repairs | Expense | Debit | Out-of-warranty repair costs. |
| `5262` | Building Maintenance | Expense | Debit | Physical structure upkeep for leased/owned building. |
| `5263` | Vehicle Maintenance | Expense | Debit | Mechanic bills and repairs for company fleet. |
| `5264` | Office Partition | Expense | Debit | Specialized costs for interior structural changes. |
| `5265` | Office Branding | Expense | Debit | Physical signboards, paint, and visual identity. |
| `5270` | Marketing & Advertising | Expense | Debit | Radio, print, or social media outreach costs. |
| `5275` | Branding and Design Exp. | Expense | Debit | Graphic design or digital asset costs. |
| `5301` | Loan Interest Expense | Expense | Debit | Total interest paid outward on `Account 2201`. |
| `5302` | Bank Charges | Expense | Debit | Routine banking fees and transaction/transfer costs. |
| `5401` | Depreciation – Furniture | Expense | Debit | Monthly recorded value loss of physical furniture. |
| `5402` | Depreciation – Equipment | Expense | Debit | Monthly recorded value loss of hardware items. |
| `5403` | Loan Loss Provision Exp. | Expense | Debit | Calculated loss expense for estimated future loan defaults. |
| `5500` | Office Supplies Expense | Expense | Debit | Paper, pens, and general consumable assets. |
| `5501` | Loan Loss Exp. – Principal | Expense | Debit | Principal completely written off as unrecoverable. |
| `5510` | Utilities Expense | Expense | Debit | Water, electricity, or other municipal bills. |
| `5976` | Refreshment | Expense | Debit | Office water, tea, snacks, or client meals. |

---
**Review Output Request:** Please duplicate this table or provide a list detailing any codes you wish to change, delete, or add before we deploy the final database.

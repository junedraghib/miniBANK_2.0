# miniBANK_2.0
a virtual bank application having all the bank features such as unique account generation based on user choice/transfer  money/withdraw money/deposit money/message alert /unique transaction id generating/user dashboard/admin dashboard/transaction statics of last 10 days for admin/data tables /edit/delete user info/sign in /sign up
 
 ## Initial Screen for miniBank Project
![initial screen](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2022-28-11.png)

# User Control
there are plenty of things that a user can do, a new user may **register** for his/ her account by simple filling up their informations or existing user can **sign in** to their account and take advantage various features offered:
## New User Registration Page
![User registration page](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2022-28-40.png)

##User Sign In Page
![user sign in](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2022-28-48.png)


## Initial User Dashboard
Widgets on Right Side of Page shows:
 * Users Account Number used for Fund Transfer, Prefix of User Account Number tells about Customer Type and Account Type
   * Customer Type:
     * DPTR : Customer who Deposit Money in miniBank
     * ADTR : Customer who takes loan from miniBank (not yet implemented)
   * Account Type:
     * SD : Saving Deposit
     * FD : Fixed Deposit
     * CD : Current Deposit
     * RD : Recuring Deposit
 
 * User Customer Identification Number user for identification with in the database from two diffrent type of Customer(Depositor and AdvancerTaker)
 
 * Total Amount Present in user account, Recent Debit Transaction & Recent Credit Transaction. 
 
 ![initial user dashboard](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2022-29-43.png)



## User Transaction History 
  * sorted with most recent transaction being tracked by unique transaction Id assigned to each transaction, 
  * Prefix of each Transaction Id tellS about the type of transactions (Transfer: TXNMNT, Withdrawal: TXNWDL, Deposit: TXNDPT)

![user transaction history](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2022-31-04.png)


## User Money Transfer Interface
* User can transfer money using other user's miniBank Account Number or using his miniBank username
* When user click **Proceed**, system uses ***Ajax*** to search for Payee's information in the database and render it for verification purpose.
* by clicking **Pay Now** system uses ***Ajax*** to perform money transfer conserving the **ACID PROPERTIES** i.e. either the complete transaction ***(subtracting amount from Payer and adding amount to payee account)*** will occur or everything will roll back to initial state thus making each transaction safe.
* Payer will recive a message alert regarding debit of amount from his/ her account
* Payer will recive a message alert regarding credit of amount to his/ her account

![money tarnsfer interface](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2022-31-28.png)


## Money Withdraw/ Deposit Interface
* User can select their account, enter amount to be withdraw and click **Proceed** to withdraw money from there account.
* System will check if current balance after debition of amount during transaction is atleast Rs. 1000, otherwise transaction will not occur.
* User will recive a proper message alert regarding withdrawal/ deposition of amount into there account.
* using similar interface user can deposit monet into there account
* all transaction will be preserving **ACID PROPERTIES** of database at any point in time.

![withdrawal money interface](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2022-31-59.png)


## User Messages & Notifications
* All the message alert messages will be shown here.
* User may recive various notifications from admin in this section.
* Also user can write a message to Admin in this section (currently not working)

![Messages and Notifications](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2023-44-45.png)


# Admin Control
miniBank admin will **sign in** to their account first, and can perform various actions:

![admin login](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2023-47-13.png)

## Initial Admin Dashboard
* First widget shows **number of users** having **Saving, Fixed, Current & Recurring Deposit Account** in miniBank at point in time.
* Second widget shows **total number of users** registered in minibank.
* Third widget gives insight about the **total amount** present in all the accounts of minibank.
* Pie Chart gives insight about the amount present in diffrent type of Accounts.
* Line and Bar Chart gives insight about the diffrent type transaction(Money Transfer, Withdrawal & Deposit) performed by all the users in last 100 days(it doesn't actually shows the last 100 days from present day but from some fixed day fixed at the time of deployment of this project due to the fact to due less usage of minibank by its user so chart might be flat due to unavalibility of past data)  

![initial admin dashboard](https://github.com/junedraghib/miniBANK_2.0/blob/master/ScreenShots/Screenshot%20from%202018-10-19%2023-56-37.png)


























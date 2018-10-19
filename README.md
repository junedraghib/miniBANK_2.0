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


## User Details Available to miniBank Admin only!
All the users are classified based on the type of account they are holding, and their details are available to admin in a very convenient manner

![user details](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2023-57-16.png)

## User Tables
These are the tables from database directly visible to the admin from a web interface.

### User Detail Table(named as user in miniBank database)
this table is the initial table in the miniBank database, when a new user registers for account in miniBank therir information are stored in this table, as a new entery is made in this table (i.e new user register) following two **Triggers: generateAccountInfo is fired updating ***userID table*** with two 4 digit b/w 1234 & 8766 random arbitrary number which aren't present in the table previously as an cust_id and acc_id and cust_type, acc_type from initial user table.
```sql

delimiter //
create trigger generateAccountInfo
after insert on user
for each row
begin
     if new.username is not null then
       insert into userID(username,cust_id,acc_id,cust_type,acc_type)
          values(new.username,
                 (SELECT random_num
                                               FROM (
                                                       SELECT FLOOR(RAND() * 8766)+1234 AS random_num 
                                                    ) AS numbers_mst_plus_2
                                               WHERE `random_num` NOT IN (SELECT cust_id FROM (select * from userID) as userID1)
                                               LIMIT 1),
                 (SELECT random_num
                                               FROM (
                                                       SELECT FLOOR(RAND() * 8766)+1234 AS random_num 
                                                    ) AS numbers_mst_plus_2
                                               WHERE `random_num` NOT IN (SELECT acc_id FROM (select * from userID) as userID2)
                                               LIMIT 1),
               new.cust_type,
               new.account_type
               );
      end if;
end //
delimiter ;  

```

![user details table](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2023-58-01.png)

### userID Table
This table contains customer id, and account id generated randomly corrosponding to each entry in initial ***user table*** and plays an essential role in generation of unique account number and unique CIN for each user, as new entry occur into this table a **trigger: generateUserCIN** is fired updating cin in two tables **depositor & advance_taker** depending upon the customer type. 
CIN is generated by concatination of cust_id generated earlier and the cust_type taken fron initial user type as choosen by user.
```sql
delimiter //
create trigger generateUserCIN
after insert on userID
for each row
begin
     if new.username is not null then
          case
               when new.cust_type = "DPTR" then
                    insert into 
                    depositor(username,cin,cust_type,account_type)
                    values(
                              new.username,
                              cast(concat(new.cust_type,cast((select cust_id from (select * from userID) as userID6 where cust_id=new.cust_id  
                              ) as char))as char),new.cust_type,new.acc_type
                          );
               when new.cust_type = "ADTR" then
                    insert into 
                    advance_taker(username,cin,cust_type,account_type)
                    values(
                              new.username,
                              cast(concat(new.cust_type,cast((select cust_id from (select * from userID) as userID6 where cust_id=new.cust_id  
                              ) as char))as char),new.cust_type,new.acc_type
                         );
          end case;
     end if;
end //
delimiter ;
```

![userID table](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2023-58-09.png)

## Depositor & Advance Taker Tables
The idea behind the Customer Identification Number(CIN) is to uniquely identify the user among those who deposit money in miniBank and those who take loan from miniBank, since loan feature isn't yet implemented so a user who chose customer type as ADTR his CIN is generated but account number isn't generated.

![depositor and advancetaker table](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2023-58-23.png)

if the insertion happen into advance_taker table based on user cust_type choice the system doen't perform any further task.
but if user cust_type id DPTR i.e Depositor then furthur account generation occurs based on users account_type.
**Account is generated by concatibntion of cust_type, acc_type, cust_id and acc_id generated in userID table**
__generateAccountNo Trriger is fired updating diffrent account tables based on user account type choice__
```sql
delimiter //
create trigger generateAccountNo
after insert on account
for each row
begin
     if new.username is not null then
          case
               when new.acc_type = "SD" then
                    insert into 
                    saving_dept(username,cin,account_no,opening_date)
                    values(
                              new.username,
                              new.cin,
                              cast(concat(new.cust_type,new.acc_type,cast((select cust_id from (select * from userID) as userID6 where username=new.username  
                              ) as char),cast((select acc_id from (select * from userID) as userID7 where username=new.username)  
                              as char))as char),
                              new.opening_date
                         );
                 when new.acc_type = "CD" then
                    insert into 
                    current_dept(username,cin,account_no,opening_date)
                    values(
                              new.username,
                              new.cin,
                              cast(concat(new.cust_type,new.acc_type,cast((select cust_id from (select * from userID) as userID6 where username=new.username  
                              ) as char),cast((select acc_id from (select * from userID) as userID7 where username=new.username)  
                              as char))as char),
                              new.opening_date
                         );    
                 when new.acc_type = "RD" then
                    insert into 
                    recurring_dept(username,cin,account_no,opening_date)
                    values(
                              new.username,
                              new.cin,
                              cast(concat(new.cust_type,new.acc_type,cast((select cust_id from (select * from userID) as userID6 where username=new.username  
                              ) as char),cast((select acc_id from (select * from userID) as userID7 where username=new.username)  
                              as char))as char),
                              new.opening_date
                         );
                when new.acc_type = "FD" then
                    insert into 
                    fixed_dept(username,cin,account_no,opening_date)
                    values(
                              new.username,
                              new.cin,
                              cast(concat(new.cust_type,new.acc_type,cast((select cust_id from (select * from userID) as userID6 where username=new.username  
                              ) as char),cast((select acc_id from (select * from userID) as userID7 where username=new.username)  
                              as char))as char),
                              new.opening_date
                         );                 
          end case;          
     end if;     
end//
delimiter ;
```
![saving deposit, reccuring deposit etc tables ](https://github.com/junedraghib/miniBANK_2.0/blob/master/ScreenShots/Screenshot%20from%202018-10-19%2023-58-34.png)


![saving deposit, reccuring deposit etc tables ](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2023-58-37.png)

## Transaction Tables
these tables hold the information about all the transaction occuring within the minibank, all transaction may tracked using a unique id assigned to each transaction

### All Transactions
this table hold the information for each transaction such as date & time of transaction, type of transaction whether Credit or Debit

![all transaction table](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2023-58-47.png)

### Deposit Money Transaction
this table holds information for all the deposit transaction for all the user.

![deposit money](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2023-58-51.png)

### Withdrawal Money Transaction
this table holds information for the withdrawal by all the user.

![withdrawal money](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-19%2023-58-54.png)

### Transfer Money Transaction
this table holds information about the payee and payer account number along with other informations.

![transfer money](https://github.com/junedraghib/miniBANK_2.0/blob/master/ScreenShots/Screenshot%20from%202018-10-19%2023-58-56.png)

## Message from User Interface
this interface includes shows all the messages from users and equip with replying mechanism
![message from user](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-20%2000-00-00.png)


## Message Alert and Notification Table
this table includes all the messages that are generated by the different type of transactions that were made by all the users.

![messages](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-20%2000-00-24.png)

## Notification to User and Message from User Tables
these tables holds the message sent by the user to admin(not working at the moment) and the automated notification generated when a admin sent message to users

![notification](https://raw.githubusercontent.com/junedraghib/miniBANK_2.0/master/ScreenShots/Screenshot%20from%202018-10-20%2000-03-09.png)

















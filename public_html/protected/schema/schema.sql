CREATE TABLE User (
id int(32) auto_increment NOT NULL,
username varchar(128) NOT NULL,
password varchar(128) NOT NULL,
email varchar(128) NOT NULL,
profile text,
active tinyint(4) NOT NULL,
lastModified datetime,
primary key(`id`)
);

CREATE TABLE UserExtended (
id int(32) auto_increment NOT NULL,
uId int(32) NOT NULL,
currentBusinessId int(32) NOT NULL,
timeOffset varchar(5) NOT NULL,
lastModified datetime,
primary key(`id`)
);

CREATE TABLE Business (
id int(32) auto_increment NOT NULL,
businessName varchar(255) NOT NULL,
AssetPath varchar(255) NOT NULL,
gstEnabled tinyint(4) NOT NULL,
gstRate decimal(5,2),
timeOffset varchar(5) NOT NULL,
created datetime,
lastModified datetime,
lastUpdatedBy int(32) NOT NULL,
active tinyint(4) NOT NULL,
primary key(`id`)
);

CREATE TABLE UserToBusiness (
UserId int(32) NOT NULL,
BusinessId int(32) NOT NULL
);

CREATE TABLE Client (
id int(32) auto_increment NOT NULL,
name varchar(255) NOT NULL,
businessId int(32) NOT NULL,
active tinyint(4) NOT NULL,
created datetime,
lastModified datetime,
lastUpdatedBy int(32) NOT NULL,
primary key(`id`)
);

CREATE TABLE Creditor (
id int(32) auto_increment NOT NULL,
name varchar(255) NOT NULL,
businessId int(32) NOT NULL,
active tinyint(4) NOT NULL,
created datetime,
lastModified datetime,
lastUpdatedBy int(32) NOT NULL,
primary key(`id`)
);

CREATE TABLE ContactInfo (
id int(32) auto_increment NOT NULL,
pId int(32) NOT NULL,
address1 varchar(255) NOT NULL,
address2 varchar(255) NOT NULL,
city varchar(100) NOT NULL,
state varchar(100) NOT NULL,
postcode varchar(5) NOT NULL,
mailAddress1 varchar(255) NOT NULL,
MailAddress2 varchar(255) NOT NULL,
mailCity varchar(100) NOT NULL,
mailState varchar(100) NOT NULL,
mailPostcode varchar(5) NOT NULL,
abn varchar(20) NOT NULL,
contactName varchar(255) NOT NULL,
contactNumber varchar(25) NOT NULL,
contactMobile varchar(25) NOT NULL,
contactFax varchar(25) NOT NULL,
contactEmail varchar(100) NOT NULL,
accountEmail varchar(100) NOT NULL,
notes text,
created datetime,
lastModified datetime,
lastUpdatedBy int(32) NOT NULL,primary key(`id`)
);

CREATE TABLE Invoice (
id int(32) auto_increment NOT NULL,
clientId int(32) NOT NULL,
invoiceDate date,
dueDate date,
invoiceTotal decimal(9,2) NOT NULL,
clientNotes text,
invoiceNotes text,
status tinyint(4) NOT NULL DEFAULT '0',
active tinyint(4) NOT NULL DEFAULT '1',
created datetime,
lastModified datetime,
lastUpdatedBy int(32) NOT NULL,
primary key(`id`)
);

ALTER TABLE Invoice AUTO_INCREMENT=1001;

CREATE TABLE InvoicePayment (
id int(32) NOT NULL auto_increment,
invoiceId int(32) NOT NULL,
amount decimal(9,2) NOT NULL,
paymentMethod tinyint(4) NOT NULL,
paymentDate date,
notes text,
active tinyint(4) NOT NULL DEFAULT '1',
created datetime,
lastModified datetime,
lastUpdatedBy int(32) NOT NULL,
primary key(`id`)
);

CREATE TABLE PaymentMethod (
id int(32) NOT NULL AUTO_INCREMENT,
name varchar(50) NOT NULL,
active tinyint(4) NOT NULL DEFAULT '1',
primary key(`id`)
);

INSERT INTO PaymentMethod VALUES ('','Cash','1');
INSERT INTO PaymentMethod VALUES ('','Direct Deposit','1');
INSERT INTO PaymentMethod VALUES ('','Cheque','1');

CREATE TABLE InvoiceSent (
id int(32) NOT NULL auto_increment,
invoiceId int(32) NOT NULL,
method varchar(20) NOT NULL,
sentTime datetime,
sentTo varchar(255),
notes text,
active tinyint(4) NOT NULL DEFAULT '1',
primary key(`id`)
);

CREATE TABLE JobType (
id int(32) auto_increment NOT NULL,
businessId int(32) NOT NULL,
jobName varchar(100) NOT NULL,
jobDescription text,
jobRate decimal(9,2) NOT NULL,
jobCode varchar(10) NOT NULL,
active tinyint(4) NOT NULL DEFAULT '1',
created datetime,
lastModified datetime,
lastUpdatedBy int(32) NOT NULL,
primary key(`id`)
);

CREATE TABLE Job (
id int(32) auto_increment NOT NULL,
invoiceId int(32) NOT NULL,
jobName varchar(100) NOT NULL,
jobDescription varchar(255) NOT NULL,
jobTypeId int(32) NOT NULL,
jobRate decimal(9,2) NOT NULL,
jobQuantity decimal(9,2) NOT NULL,
jobNotes text,
active tinyint(4) NOT NULL DEFAULT '1',
created datetime,
lastModified datetime,
lastUpdatedBy int(32) NOT NULL,
primary key(`id`)
);

CREATE TABLE ExpenseType (
id int(32) auto_increment NOT NULL,
businessId int(32) NOT NULL,
expenseName varchar(100) NOT NULL,
expenseDescription text,
expenseCode varchar(10) NOT NULL,
reportableExpense TINYINT(4) NOT NULL DEFAULT '0',
created datetime,
lastModified datetime,
lastUpdatedBy int(32) NOT NULL,
active tinyint(4) NOT NULL DEFAULT '1',
primary key(`id`)
);

CREATE TABLE Expense (
id int(32) auto_increment NOT NULL,
creditorId int(32) NOT NULL,
expenseName varchar(100) NOT NULL,
expenseDescription text,
expenseType int(32) NOT NULL,
expenseTotal decimal(9,2) NOT NULL DEFAULT '0.00',
expensePaid tinyint(4) NOT NULL DEFAULT '0',
expensePaidDate date NOT NULL,
subjectGST tinyint(4) DEFAULT '0',
capitalPurchase tinyint(4) NOT NULL DEFAULT '0',
created datetime,
lastModified datetime,
lastUpdatedBy int(32) NOT NULL,
active tinyint(4) NOT NULL DEFAULT '1',
primary key(`id`)
);

CREATE TABLE BasPeriod (
id int(32) NOT NULL AUTO_INCREMENT,
title varchar(50) NOT NULL,
periodStart date,
periodEnd date,
primary key(`id`)
);

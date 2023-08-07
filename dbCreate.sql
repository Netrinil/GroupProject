Create Database If Not exists NomNomDB;
use nomnomdb;


create table if not exists Users(
 id int not null AUTO_INCREMENT PRIMARY KEY,
 First_Name varchar(25) Not null,
 Last_Name varchar(25) Not null,
 UserId varchar(25),
 Pswd varchar(25),
 isAdmin int,
 isActive int
);


create table if not exists Pages(
 id int not null AUTO_INCREMENT PRIMARY KEY,
 Title varchar(25) Not null,
 -- Category varchar(25),
 Header1 varchar(25),
 Text1 varchar(225),
 ParentPage int DEFAULT 0,
 isActive int
);

-- Sample data
INSERT INTO Users ( id, First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
VALUES    (1, 'uFirstName', 'uLastName', 'myuser', 'a', 0, 1)
ON DUPLICATE KEY UPDATE
First_Name = 'uFirstName', Last_Name = 'uLastName', UserId = 'myuser', Pswd = 'a', isAdmin = 0, isActive = 1;

INSERT INTO Users ( id, First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
VALUES    (2, 'aFirstName', 'aLastName', 'myadmin', 'a', 1, 1)
ON DUPLICATE KEY UPDATE
First_Name = 'aFirstName', Last_Name = 'aLastName', UserId = 'myadmin', Pswd = 'a', isAdmin = 1, isActive = 1;

INSERT INTO Users ( id, First_Name, Last_Name, UserId, Pswd, isAdmin, isActive)
VALUES    (2, 'aFirstName', 'aLastName', 'myadmin', 'a', 1, 1)
ON DUPLICATE KEY UPDATE
First_Name = 'aFirstName', Last_Name = 'aLastName', UserId = 'myadmin', Pswd = 'a', isAdmin = 1, isActive = 1;

-- --------------------------------------
-- Main links/pages
INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (1, 'Nomnom', 'Home', 'Welcome to our website. Grab a bite and enjoy.', null, 1)
ON DUPLICATE KEY UPDATE
Title = 'Home', Header1 = 'Home', Text1 = 'Welcome to our website. Grab a bite and enjoy.', ParentPage = null, isActive = 1;

INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (2, 'About', 'About', 'Zero score and 1 month ago, we were set upon by the reality of PHP. Now, our foe lies beneath us, broken and beaten, and lo, here we stand today to say “Let’s get this bread.”', null, 1)
ON DUPLICATE KEY UPDATE
Title = 'About', Header1 = 'About', Text1 = 'Zero score and 1 month ago, we were set upon by the reality of PHP. Now, our foe lies beneath us, broken and beaten, and lo, here we stand today to say “Let’s get this bread.”', ParentPage = null, isActive = 1;

INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (3, 'Contact Us', 'Contact Us', 'support@nom.nom<br />800-366-4484<br />178 S Rio Grande St, Salt Lake City, UT 84101', null, 1)
ON DUPLICATE KEY UPDATE
Title = 'Contact Us', Header1 = 'Contact Us', Text1 = 'support@nom.nom<br />800-366-4484<br />178 S Rio Grande St, Salt Lake City, UT 84101', ParentPage = null, isActive = 1;

-- Category Pages
INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (4, 'Breakfast', 'Breakfast', 'My text, asfaf af af af a sag asf saf', null, 1)
ON DUPLICATE KEY UPDATE
Title = 'Breakfast', Header1 = 'Breakfast', Text1 = 'My text, asfaf af af af a sag asf saf', ParentPage = null, isActive = 1;

-- ---------------------
-- Sub pages
-- Note Parent Id points to the record with id=1
INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (5, 'Home', 'Home', 'Welcome to our website. Grab a bite and enjoy.', null, 1)
ON DUPLICATE KEY UPDATE
Title = 'Home 1', Header1 = 'Sub Header number 1', Text1 = 'My text, asfaf af af af a sag asf saf', ParentPage = null, SortOrder = 3, isActive = 1;

INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (6, 'Home 2', 'Sub Header number 2', 'My text, asfaf af af af a sag asf saf', 1, 4, 1)
ON DUPLICATE KEY UPDATE
Title = 'Home 2', Header1 = 'Sub Header number 2', Text1 = 'My text, asfaf af af af a sag asf saf', ParentPage = null, SortOrder = 4, isActive = 1;

-- Note Parent Id points to the record with id=2
INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (7, 'Something 1', 'Sub Header number 1', 'My text, asfaf af af af a sag asf saf', 2, 3, 1)
ON DUPLICATE KEY UPDATE
Title = 'Something 1', Header1 = 'Sub Header number 1', Text1 = 'My text, asfaf af af af a sag asf saf', ParentPage = 2, SortOrder = 3, isActive = 1;

INSERT INTO Pages ( id, Title, Header1, Text1, ParentPage, isActive)
VALUES    (8, 'Something 2', 'Sub Header number 2', 'My text, asfaf af af af a sag asf saf', 2, 4, 1)
ON DUPLICATE KEY UPDATE
Title = 'Something 2', Header1 = 'Sub Header number 2', Text1 = 'My text, asfaf af af af a sag asf saf', ParentPage = 2, SortOrder = 4, isActive = 1;


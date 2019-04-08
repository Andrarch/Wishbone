drop table if exists experience;
drop table if exists feeds;

drop table if exists artprofile;
drop table if exists artist_interest;
drop table if exists interests;
drop table if exists artist_artform;
drop table if exists artforms;
drop table if exists artists;
drop table if exists connected_friends;
drop table if exists messages;
drop table if exists contact;
drop table if exists address;
-- drop table if exists authentication;  -- Use this for old table take out the remark
drop table if exists users;
drop table if exists authentication; -- Remark this out for old table

/*
Table for Authentication - may later be moved so it is only table on server directly exposed
*/
CREATE TABLE authentication (
    authid int not null auto_increment,
    email varchar(50) unique,
    pass varchar(50),

    primary key (authid)
);

/*
User table - generic user for service - without gigs or artist connect functionality
*/
CREATE TABLE users (
    userid int not null auto_increment,
    authid int not null,
    firstname varchar(50),
    lastname varchar(50),
    imagelocation varchar(100),
    FOREIGN KEY (authid) REFERENCES authentication(authid),
    PRIMARY KEY (userid)
); 


/*
Address information of a user
*/
CREATE TABLE address (
    addressid int not null auto_increment,
    city varchar(50),
    province varchar(50),
    country varchar(50),
    userid int not null,
    publicaddress boolean,
    
    primary key (addressid),
    FOREIGN KEY (userid) REFERENCES users(userid)
);
/*
contact information
*/
CREATE TABLE contact (
contactid int not null auto_increment,
email varchar(50),
phonenumber varchar(25),
userid int,
publicemail boolean,
publicphone boolean,

primary key (contactid),
FOREIGN KEY (userid) REFERENCES users(userid)
);
/*
send text messages to other users
*/
Create Table messages(
messageid int not null auto_increment,
senderid int not null,
receiverid int not null,
messagecontent varchar(2000),
hasread boolean,
primary key (messageid),
FOREIGN KEY (senderid) REFERENCES users(userid),
FOREIGN KEY (receiverid) REFERENCES users(userid)
);
/*
link friends for mynetwork, and as contacts list for messages
*/
create table connected_friends(
leftid int not null, -- initiating user
rightid int not null, -- selected user
confirmright boolean, -- selected user must confirm
FOREIGN KEY (leftid) REFERENCES users(userid),
FOREIGN KEY (rightid) REFERENCES users(userid)

);
/*
Parent of artist social networking site
*/
create table artists(
artistid int not null auto_increment,
userid int not null,
primary key (artistid),
FOREIGN KEY (userid) REFERENCES users(userid)
);
/*
Types of artforms for artists
*/
create table artforms(
artformid int not null auto_increment,
formname varchar(50) unique,
primary key (artformid)
);
/*
link artists to artforms
*/
create table artist_artform(
artformid int not null,
artistid int not null,
FOREIGN KEY (artformid) REFERENCES artforms(artformid),
FOREIGN KEY (artistid) REFERENCES artists(artistid),
primary key (artformid,artistid)
);
/*
types of interests
*/
create table interests(
interestid int not null auto_increment,
interestname varchar(50) unique,
primary key (interestid)
);
/*
connect artists to interests
*/
create table artist_interest(
interestid int not null,
artistid int not null,
FOREIGN KEY (interestid) REFERENCES interests(interestid),
FOREIGN KEY (artistid) REFERENCES artists(artistid),
primary key (interestid,artistid)
);
/*
Artists visible profile data
*/
create table artprofile(
profileid int not null auto_increment,
artistid int not null,
text1 varchar(500),
text2 varchar(500),
text3 varchar(500),
text4 varchar(500),
 `socialid` varchar(25) DEFAULT NULL,
  `shareurl` varchar(50) DEFAULT "",
  `bio` varchar(200) NOT NULL DEFAULT "enter bio",
  `urldes` varchar(200) NOT NULL Default "enter description",
primary key (profileid),
FOREIGN KEY (artistid) REFERENCES artists(artistid)
);

CREATE TABLE `experience` (
  `experienceid` int(11) NOT NULL auto_increment,
  `experiencetitle` varchar(30) NOT NULL,
  `experiencedes` text NOT NULL,
  `experiencetime` varchar(20) NOT NULL,
  `profileid` int(11) NOT NULL,
  primary key (experienceid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `experience`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
 
  ADD KEY `profileID` (`profileid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `experienceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experiencepk` FOREIGN KEY (`profileid`) REFERENCES `artprofile` (`profileid`);
  
  create table feeds(
userid int(11),
feedtext longtext, 
feeddate timestamp default current_timestamp);



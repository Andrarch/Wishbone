
insert into artforms (formname) values ('musician');
SELECT @art_musician := LAST_INSERT_ID( );
insert into artforms (formname) values ('dancer');
SELECT @art_dancer := LAST_INSERT_ID( );
insert into artforms (formname) values ('painter');
SELECT @art_painter := LAST_INSERT_ID( );
insert into artforms (formname) values ('actor');
SELECT @art_actor := LAST_INSERT_ID( );
insert into artforms (formname) values ('model');
SELECT @art_model := LAST_INSERT_ID( );
insert into artforms (formname) values ('singer');
SELECT @art_singer := LAST_INSERT_ID( );
insert into artforms (formname) values ('photographer');
SELECT @art_photographer := LAST_INSERT_ID( );
insert into artforms (formname) values ('blogger');
SELECT @art_blogger := LAST_INSERT_ID( );


insert into interests (interestname) values ('event');
SELECT @int_event := LAST_INSERT_ID( );
insert into interests (interestname)values ('music');
SELECT @int_music := LAST_INSERT_ID( );
insert into interests (interestname) values ('concert');
SELECT @int_concert := LAST_INSERT_ID( );
insert into interests (interestname) values ('festival');
SELECT @int_festival := LAST_INSERT_ID( );
insert into interests (interestname)values ('party');
SELECT @int_party := LAST_INSERT_ID( );




insert into authentication (email,pass) values ('andrew@archibald.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'Andrew','Archibald','assets/img/profile/M1.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('Andrew@archibald.com','613-000-0000',@user_id,true,false);
set @receive:=@user_id-1;
-- insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'Hello Andrew',false);
-- insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_event,@art_id);
insert into artist_artform (artformid,artistid) values (@art_dancer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'edwardtarte', 'i am a foodie', ' \r\n				test2		');


insert into authentication (email,pass) values ('mike@smith.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'Mike','Smith','assets/img/profile/M2.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('mike@smith.com','613-100-0001',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'I do not know him. Who is he?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_festival,@art_id);
insert into artist_artform (artformid,artistid) values (@art_photographer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'davie504', 'i am a foodie', ' \r\n				test2		');


insert into authentication (email,pass) values ('oksana@shapoval.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'Oksana','Shapoval','assets/img/profile/pro-photo.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('oksana@shapoval.com','613-100-8090',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'How are you today?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_concert,@art_id);
insert into artist_artform (artformid,artistid) values (@art_dancer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'BobRossInc', 'i am a foodie', ' \r\n				test2		');


insert into authentication (email,pass) values ('svetlana@netchaeva.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'Svetlana','Netchaeva','assets/img/profile/F1.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Toronto','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('svetlana@netchaeva.com','613-100-8330',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'We have a nice database design?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_concert,@art_id);
insert into artist_artform (artformid,artistid) values (@art_musician,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'davie504', 'i am a foodie', ' \r\n				test2		');


insert into authentication (email,pass) values ('zeyang@hu.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'Zyang','Hu','assets/img/profile/M3.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('London','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('zeyang@hu.com','613-100-5550',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,' !',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_event,@art_id);
insert into artist_artform (artformid,artistid) values (@art_singer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'davie504', 'i am a foodie', ' \r\n				test2		');


insert into authentication (email,pass) values ('minyi@yang.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'Minyi','Yang','assets/img/profile/M4.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('minyi@yang.com','613-145-8090',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'Hi!',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_festival,@art_id);
insert into artist_artform (artformid,artistid) values (@art_dancer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'BobRossInc', 'i am a foodie', ' \r\n				test2		');


insert into authentication (email,pass) values ('ksenia@lopukhina.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'Ksenia','Lopukhina','assets/img/profile/F3.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Montreal','Quebec','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('ksenia@lopukhina.com','613-900-8090',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'what about tomorrow?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_party,@art_id);
insert into artist_artform (artformid,artistid) values (@art_actor,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'BobRossInc', 'i am a foodie', ' \r\n				test2		');



insert into authentication (email,pass) values ('John@Logan.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'John','Logan','assets/img/profile/M5.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Montreal','Quebec','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('name@name.com','613-510-1123',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'what about tomorrow?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_party,@art_id);
insert into artist_artform (artformid,artistid) values (@art_actor,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', '', 'i am a foodie', ' \r\n				test2		');


insert into authentication (email,pass) values ('Marty@McFly.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'Marty','McFly','assets/img/profile/M6.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Montreal','Quebec','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('Marty@McFly.com','613-510-1123',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'what 1about tomorrow?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_party,@art_id);
insert into artist_artform (artformid,artistid) values (@art_actor,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', ' ', 'i am a foodie', ' \r\n				test2		');


insert into authentication (email,pass) values ('Mary@Ross.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'Mary','Ross','assets/img/profile/F6.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Montreal','Quebec','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('Mary@Ross.com','613-510-1123',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'what about tomorrow?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_party,@art_id);
insert into artist_artform (artformid,artistid) values (@art_actor,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', ' ', 'i am a foodie', ' \r\n				test2		');


insert into authentication (email,pass) values ('Tommy@Roland.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'Tommy','Roland','assets/img/profile/M7.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Montreal','Quebec','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('Tommy@Roland.com','613-510-1123',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'what about tomorrow?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_party,@art_id);
insert into artist_artform (artformid,artistid) values (@art_actor,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', ' ', 'i am a foodie', ' \r\n				test2		');


insert into authentication (email,pass) values ('Rocky@Johnson.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname,imagelocation) values (@auth_id,'Rocky','Johnson','assets/img/profile/M9.jpg');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('Rocky@Johnson.com','613-145-8090',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'Hi!',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_festival,@art_id);
insert into artist_artform (artformid,artistid) values (@art_dancer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', ' ', 'i am a foodie', ' \r\n				test2		');

Insert into connected_friends (leftid, rightid, confirmright) values (5,1,0);
Insert into connected_friends (leftid, rightid, confirmright) values (1,3,0);
Insert into connected_friends (leftid, rightid, confirmright) values (4,1,1);
Insert into connected_friends (leftid, rightid, confirmright) values (6,1,1);
Insert into connected_friends (leftid, rightid, confirmright) values (1,7,0);
Insert into connected_friends (leftid, rightid, confirmright) values (8,1,1);


INSERT INTO `experience` (`experienceid`, `experiencetitle`, `experiencedes`, `experiencetime`, `profileid`) VALUES
(1, 'designer', 'Graphic design work, particulary things', '2018.09-now', 1),
(2, 'dancer', 'Dance is a performing art form consisting of purposefully selected sequences of human movement. ', '', 2),
(8, 'student', 'Studied as an art student', '2015-2019', 1),
(9, 'student', 'Studied as an art student', '2015-2019', 2),
(10, 'student', 'Studied as an art student', '2015-2019', 3),
(11, 'student', 'Studied as an art student', '2015-2019', 4),
(12, 'student', 'Studied as an art student', '2015-2019', 5),
(13, 'student', 'Studied as an art student', '2015-2019', 6),
(14, 'student', 'Studied as an art student', '2015-2019', 7);

insert into feeds values(1, 'Working on a new project',current_time());
insert into feeds values(2, ' not too busy ',current_time());
insert into feeds values(3, ' Working hard, or hardly working?',current_time());
insert into feeds values(4, ' Looking for work ',current_time());
insert into feeds values(5, ' Finally a day off ',current_time());
insert into feeds values(6, '  Anyone else think cats are strange?  ',current_time());
insert into feeds values(7, "Is space real if you can't see it? ",current_time());
insert into feeds values(7, 'Ksenia is a pro in GitHub',current_time()); 
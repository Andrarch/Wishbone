use wishbone;
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

use wishbone;
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



use wishbone;
insert into authentication (email,pass) values ('andrew@archibald.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'Andrew','Archibald');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('Andrew@archibald.come','613-000-0000',@user_id,true,false);
set @receive:=@user_id-1;
-- insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'Hello Andrew',false);
-- insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_event,@art_id);
insert into artist_artform (artformid,artistid) values (@art_dancer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');

use wishbone;
insert into authentication (email,pass) values ('mike@smith.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'Mike','Smith');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('mike@smith.come','613-100-0001',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'I do not know him. Who is he?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_festival,@art_id);
insert into artist_artform (artformid,artistid) values (@art_photographer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');

use wishbone;
insert into authentication (email,pass) values ('oksana@shapoval.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'Oksana','Shapoval');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('oksana@shapoval.come','613-100-8090',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'How are you today?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_concert,@art_id);
insert into artist_artform (artformid,artistid) values (@art_dancer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');

use wishbone;
insert into authentication (email,pass) values ('svetlana@netchaeva.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'Svetlana','Netchaeva');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Toronto','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('svetlana@netchaeva.come','613-100-8330',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'We have a nice database design?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_concert,@art_id);
insert into artist_artform (artformid,artistid) values (@art_musician,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');

use wishbone;
insert into authentication (email,pass) values ('zeyang@hu.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'Zyang','Hu');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('London','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('zeyang@hu.come','613-100-5550',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'Hello world!',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_event,@art_id);
insert into artist_artform (artformid,artistid) values (@art_singer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');

use wishbone;
insert into authentication (email,pass) values ('minyi@yang.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'Minyi','Yang');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('minyi@yang.come','613-145-8090',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'Hi!',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_festival,@art_id);
insert into artist_artform (artformid,artistid) values (@art_dancer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');

use wishbone;
insert into authentication (email,pass) values ('ksenia@lopukhina.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'Ksenia','Lopukhina');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Montreal','Quebec','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('ksenia@lopukhina.come','613-900-8090',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'what about tomorrow?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_party,@art_id);
insert into artist_artform (artformid,artistid) values (@art_actor,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');


use wishbone;
insert into authentication (email,pass) values ('name1@nam1.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'name','name1');
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
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');

use wishbone;
insert into authentication (email,pass) values ('name11@n1am1.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'nam1e','name11');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Montreal','Quebec','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('name1@nam1e.com','613-510-1123',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'what 1about tomorrow?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_party,@art_id);
insert into artist_artform (artformid,artistid) values (@art_actor,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');

use wishbone;
insert into authentication (email,pass) values ('na5me1@na5m1.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'nam1e','nam1e1');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Montreal','Quebec','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('na23me@na1me.com','613-510-1123',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'what about tomorrow?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_party,@art_id);
insert into artist_artform (artformid,artistid) values (@art_actor,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');

use wishbone;
insert into authentication (email,pass) values ('na123me1@nam211.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'na221me','na23me1');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Montreal','Quebec','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('na12me@na21me.com','613-510-1123',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'what about tomorrow?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_party,@art_id);
insert into artist_artform (artformid,artistid) values (@art_actor,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');

use wishbone;
insert into authentication (email,pass) values ('test@test.com','password');
SELECT @auth_id := last_insert_id();
insert into users (authid,firstname,lastname) values (@auth_id,'Test','test');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('minyi@yang.come','613-145-8090',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'Hi!',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_festival,@art_id);
insert into artist_artform (artformid,artistid) values (@art_dancer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4,`socialid`, `shareurl`, `bio`, `urldes`) values (@art_id,'Hobby','Hockey','Swimming','Skating','Hobby', 'https://www.youtube.com/watch?v=gTCrKJZyAh0&list=RD8GmYYyzT_Rs&index=12', 'i am a foodie', ' \r\n				test2		');

Insert into connected_friends (leftid, rightid, confirmright) values (5,1,0);
Insert into connected_friends (leftid, rightid, confirmright) values (1,3,0);
Insert into connected_friends (leftid, rightid, confirmright) values (4,1,1);
Insert into connected_friends (leftid, rightid, confirmright) values (6,1,1);
Insert into connected_friends (leftid, rightid, confirmright) values (1,7,0);
Insert into connected_friends (leftid, rightid, confirmright) values (8,1,1);


INSERT INTO `experience` (`experienceid`, `experiencetitle`, `experiencedes`, `experiencetime`, `profileid`) VALUES
(1, 'designer', ' test\r\n						', '2018.09-now', 1),
(2, 'dancer', 'Dance is a performing art form consisting of purposefully selected sequences of human movement. ', '', 2),
(8, 'hahaha', 'hahahatest1', 'hahahatest1', 1),
(9, 'hahaha', 'hahahatest1', 'hahahatest1', 2),
(10, 'hahaha', 'hahahatest1', 'hahahatest1', 3),
(11, 'hahaha', 'hahahatest1', 'hahahatest1', 4),
(12, 'hahaha', 'hahahatest1', 'hahahatest1', 5),
(13, 'hahaha', 'hahahatest1', 'hahahatest1', 6),
(14, 'hahaha', 'hahahatest1', 'hahahatest1', 7);

insert into feeds values(1, 'Hello world',current_time());
insert into feeds values(2, 'Hello world hello world',current_time());
insert into feeds values(3, 'Hello world hello world hello world',current_time());
insert into feeds values(4, 'Hello world hello world hello world hello world hello world',current_time());
insert into feeds values(5, 'Hello world hello world hello world hello world hello world hello world hello world',current_time());
insert into feeds values(6, 'Hello world hello world hello world hello world hello world hello world hello world hello world',current_time());
insert into feeds values(7, 'Hello world hello world hello world hello world hello world hello world hello world hello world hello world',current_time());
insert into feeds values(7, 'Ksenia is a pro in GitHub',current_time()); 
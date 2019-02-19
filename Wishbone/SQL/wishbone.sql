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
insert into users (firstname,lastname) values ('Andrew','Archibald');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into authentication (userid,email,pass) values (@user_id,'andrew@archibald.com','password');
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('Andrew@archibald.come','613-000-0000',@user_id,true,false);
set @receive:=@user_id-1;
-- insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'Hello Andrew',false);
-- insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_event,@art_id);
insert into artist_artform (artformid,artistid) values (@art_dancer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4) values (@art_id,'Hobby','Hockey','Swimming','Skating');

use wishbone;
insert into users (firstname,lastname) values ('Mike','Smith');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into authentication (userid,email,pass) values (@user_id,'mike@smith.com','password');
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('mike@smith.come','613-100-0001',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'I do not know him. Who is he?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_festival,@art_id);
insert into artist_artform (artformid,artistid) values (@art_photographer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4) values (@art_id,'Someone','Somewhere','Something','Somehere');

use wishbone;
insert into users (firstname,lastname) values ('Oksana','Shapoval');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into authentication (userid,email,pass) values (@user_id,'oksana@shapoval.com','password');
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('oksana@shapoval.come','613-100-8090',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'How are you today?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_concert,@art_id);
insert into artist_artform (artformid,artistid) values (@art_dancer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4) values (@art_id,'Cat','Dog','Elephant','Snake');

use wishbone;
insert into users (firstname,lastname) values ('Svetlana','Netchaeva');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into authentication (userid,email,pass) values (@user_id,'svetlana@netchaeva.com','password');
insert into address (city,province,country,userid,publicaddress) values ('Toronto','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('svetlana@netchaeva.come','613-100-8330',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'We have a nice database design?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_concert,@art_id);
insert into artist_artform (artformid,artistid) values (@art_musician,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4) values (@art_id,'Smart','Beautiful','Kind','Happy');

use wishbone;
insert into users (firstname,lastname) values ('Zyang','Hu');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into authentication (userid,email,pass) values (@user_id,'zeyang@hu.com','password');
insert into address (city,province,country,userid,publicaddress) values ('London','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('zeyang@hu.come','613-100-5550',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'Hello world!',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_event,@art_id);
insert into artist_artform (artformid,artistid) values (@art_singer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4) values (@art_id,'Kid','Kids','Wife','Study hard');

use wishbone;
insert into users (firstname,lastname) values ('Minyi','Yang');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into authentication (userid,email,pass) values (@user_id,'minyi@yang.com','password');
insert into address (city,province,country,userid,publicaddress) values ('Ottawa','Ontario','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('minyi@yang.come','613-145-8090',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'Hi!',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_festival,@art_id);
insert into artist_artform (artformid,artistid) values (@art_dancer,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4) values (@art_id,'PHP','Java','Python','JavaScript');

use wishbone;
insert into users (firstname,lastname) values ('Ksenia','Lopukhina');
SELECT @user_id := LAST_INSERT_ID( ); -- gives us user id from the insert above
insert into authentication (userid,email,pass) values (@user_id,'ksenia@lopukhina.com','password');
insert into address (city,province,country,userid,publicaddress) values ('Montreal','Quebec','Canada',@user_id,true);
insert into contact (email, phonenumber, userid, publicemail, publicphone) values ('ksenia@lopukhina.come','613-900-8090',@user_id,true,false);
set @receive:=@user_id-1;
insert into messages (senderid, receiverid, messagecontent, hasread) values (@user_id,@receive,'what about tomorrow?',false);
insert into connected_friends (leftid, rightid,confirmright) values (@user_id,@receive,true);
insert into artists (userid) values(@user_id);
SELECT @art_id := LAST_INSERT_ID( ); 
insert into artist_interest (interestid,artistid) values (@int_party,@art_id);
insert into artist_artform (artformid,artistid) values (@art_actor,@art_id);
insert into artprofile (artistid, text1,text2,text3,text4) values (@art_id,'White','Black','Yellow','Orange');


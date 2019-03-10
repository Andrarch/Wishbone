CREATE VIEW User_Profile_view AS

SELECT users.lastname, users.firstname, users.userid, artprofile.text1, artprofile.text2, artprofile.text3, artprofile.text4,contact.email, contact.phonenumber,
address.city, address.province, address.country
FROM artists
    INNER JOIN artprofile
        ON artists.artistid = artprofile.artistid
    INNER JOIN users 
        ON artists.userid = users.userid
	INNER JOIN contact
        ON contact.userid = users.userid
    INNER JOIN address 
        ON address.userid = address.userid;
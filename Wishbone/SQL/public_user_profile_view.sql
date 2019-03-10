CREATE VIEW Public_User_Profile_view AS

SELECT DISTINCT users.userid, users.lastname, users.firstname, 

	CASE WHEN contact.publicemail = true 
			THEN contact.email 
	ELSE '' END AS email,
    
	CASE WHEN contact.publicphone = true 
			THEN contact.phonenumber 
	ELSE '' END AS phonenumber,
    
	CASE WHEN address.publicaddress = true 
			THEN address.city
	ELSE '' END AS city,
    
	CASE WHEN address.publicaddress = true 
			THEN address.province
	ELSE '' END AS province,
    
	CASE WHEN address.publicaddress = true 
			THEN address.country
	ELSE '' END AS country
     
    
FROM ((contact
    INNER JOIN users
        ON contact.userid = users.userid )
    INNER JOIN address 
        ON address.userid = address.userid);
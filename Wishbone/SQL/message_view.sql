
CREATE VIEW message_view AS
SELECT  
u1.userid AS senderid,
u1.firstname AS sender_first_name,
u1.lastname AS sender_last_name, 
m.messagecontent, 
m.hasread,
m.receiverid,
u2.firstname AS receiver_first_name, 
u2.lastname AS receiver_last_name
FROM messages AS m
INNER JOIN users AS u1 ON u1.userid = m.senderid
LEFT JOIN users AS u2 ON m.receiverid = u2.userid;






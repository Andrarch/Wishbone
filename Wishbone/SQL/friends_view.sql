
CREATE VIEW friends_view AS
select 
u1.userid AS left_friendid, 
u1.firstname AS left_friend_first_name,
u1.lastname AS left_friend_last_name, 
cf.rightid AS right_friendid, 
u2.firstname AS right_friend_first_name, 
u2.lastname AS right_friend_last_name
FROM connected_friends AS cf
INNER JOIN users AS u1 ON u1.userid = cf.leftid
LEFT JOIN users AS u2 ON cf.rightid = u2.userid;







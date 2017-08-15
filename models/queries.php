<?php


//:::::SELECT
// $SELECT_USERS_DATA = "SELECT users.username, users.pass, users.stat, attempts.times FROM users INNER JOIN attempts ON users.username = attempts.username WHERE users.username= ?;";
$SELECT_CHECKUSER= "SELECT user, password, rol FROM users WHERE user=?;"; //Chek if the user already exist

$SELECT_USER = "SELECT user, password, rol, active FROM users WHERE user=? AND password = ?;";

$SELECT_USER_ROL = "SELECT name as rol FROM users INNER JOIN roles ON users.rol = roles.id_Rol WHERE users.user=?;";

$SELECT_USERS = "SELECT * FROM users;";

$SELECT_USERS_ACTIVES = "SELECT * FROM users WHERE active = 1;";

$SELECT_ROLES = "SELECT * FROM roles;";

$SELECT_TRANSPORT = "SELECT * FROM tranportdetails;";

$SELECT_LINES = "SELECT * FROM transport_line;";

$SELECT_TYPES = "SELECT * FROM transport_type;";

$SELECT_RESPONSABLES = "SELECT * FROM users;";

$SELECT_REPORT1 = "SELECT * FROM tranportdetails WHERE linea = ?;";

$SELECT_REPORT2 = "SELECT * FROM tranportdetails WHERE enter_date >= ?;";

//:::::UPDATES

$DEACTIVE_USER = "UPDATE users SET active = 0 WHERE id_Users = ?;";

$UPDATE_USERNAME = "UPDATE users SET user = ? WHERE id_Users = ?;";

$UPDATE_PASSWORD = "UPDATE users SET password = ? WHERE id_Users = ?;";

$UPDATE_ROLE = "UPDATE users SET rol = ? WHERE id_Users = ?;";

$UPDATE_STATUS = "UPDATE users SET active = ? WHERE id_Users = ?;";

$UPDATE_START_TRANSPORT = "UPDATE transport SET enter_date = NOW() WHERE idtransport = ?;";

$UPDATE_END_TRANSPORT = "UPDATE transport SET exit_date = NOW() WHERE idtransport = ?;";

//:::::INSERTS

$INSERT_USER = "INSERT INTO users VALUES (null,?,?,?,1);";

$INSERT_TRANSPORT = "INSERT INTO transport VALUES (NULL,?, ?, ?, ?, ?, ?, ?, NOW(),NULL);";


?>

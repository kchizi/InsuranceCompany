CREATE TABLE IF NOT EXISTS t_user (
	id INT(11) NOT NULL AUTO_INCREMENT,
	login VARCHAR(50) DEFAULT NULL,
	password VARCHAR(50) DEFAULT NULL,
	profil VARCHAR(50) DEFAULT NULL,
	status INT(12) DEFAULT NULL,
	created DATETIME DEFAULT NULL,
	createdBy VARCHAR(50) DEFAULT NULL,
	updated DATETIME DEFAULT NULL,
	updatedBy VARCHAR(50) DEFAULT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
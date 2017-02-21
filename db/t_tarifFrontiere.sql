CREATE TABLE IF NOT EXISTS t_tariffrontiere (
	id INT(11) NOT NULL AUTO_INCREMENT,
	codeCompagnie INT(10) DEFAULT NULL,
	codeClasse VARCHAR(10) DEFAULT NULL,
	codeSousClasse INT(12) DEFAULT NULL,
	designation VARCHAR(255) DEFAULT NULL,
	periode INT(10) DEFAULT NULL,
	typePeriode VARCHAR(20) DEFAULT NULL,
	primeRC DECIMAL(12,2) DEFAULT NULL,
	taxe DECIMAL(12,2) DEFAULT NULL,
	primeDR DECIMAL(12,2) DEFAULT NULL,
	taxeDR DECIMAL(12,2) DEFAULT NULL,
	timbre DECIMAL(12,2) DEFAULT NULL,
	tauxMajoration DECIMAL(12,2) DEFAULT NULL,
	taxeRemorque DECIMAL(12,2) DEFAULT NULL,
	tauxCommission DECIMAL(12,2) DEFAULT NULL,
	tauxTPS DECIMAL(12,2) DEFAULT NULL,
	created DATETIME DEFAULT NULL,
	createdBy VARCHAR(50) DEFAULT NULL,
	updated DATETIME DEFAULT NULL,
	updatedBy VARCHAR(50) DEFAULT NULL,
	PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
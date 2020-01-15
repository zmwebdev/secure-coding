/* https://mariadb.com/kb/en/library/documentation/ */
/* databasea sortu */
CREATE DATABASE IF NOT EXISTS sql_injection;

use sql_injection;

CREATE TABLE IF NOT EXISTS users (
    user VARCHAR(50) NOT NULL PRIMARY KEY,
    pass VARCHAR(250),
    admin INT
);

CREATE TABLE IF NOT EXISTS salary (
    user VARCHAR(50) NOT NULL PRIMARY KEY,
    amount INT
);


/* insert */
/* koxme: p1 */
INSERT INTO users (user, pass, admin) VALUES ('koxme', 'p1', 0);
INSERT INTO users (user, pass, admin) VALUES ('admin', 'p1', 1);

INSERT INTO salary (user, amount) VALUES ('koxme', 2000); 
INSERT INTO salary (user, amount) VALUES ('admin', 5000); 

/* https://mariadb.com/kb/en/library/documentation/ */
/* databasea sortu */
CREATE DATABASE IF NOT EXISTS sql_injection;

use sql_injection;

CREATE TABLE IF NOT EXISTS users (
    user VARCHAR(50) NOT NULL PRIMARY KEY,
    pass VARCHAR(250)
);

/* insert */
/* koxme: p1 */
INSERT INTO users (user, pass)
VALUES ('koxme', 'p1'); 
INSERT INTO users (user, pass)
VALUES ('admin', 'p2'); 
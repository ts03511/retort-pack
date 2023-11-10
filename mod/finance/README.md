# retort_signage
## Operations

### Setting Database.
 - connect to MySQL / MariaDB
 - create database (Any name).
 - grant all privileges on DATABASE_NAME.* to 'USER_NAME'@'%' identigied by 'PASSWORD';

### Restore Database
 - mysql -u USER_NAME -p DATABASE_NAME < retort_signage_dump.sql

### Edit Credential
 - You have to Copy From 'html/batch/credential.php.sample' To 'path/to/credential.php' and Move anywhere.
 - move to anywhere. You can ignore DocumentRoot.
 - You have to Edit 'html/batch/connect_to_db.php'. Be careful, Your Base Directory is 'html'.

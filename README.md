# retort-pack
simple web application series.

## How to initialize
exec below scrips in `tools/`

- 01_initialize_retort-pack.sh
- 02_retort.dump
- 03_initialize.sql

operations
- `cd tools/`
- `./01_initialize_retort-pack.sh`
- `mysql -u root -p`
- `create database retort;`
- `mysql -u [user_name] -p retort < 02_retort.dump`
- `mysql -u [user_name] -p retort < 03_initialize.sql`


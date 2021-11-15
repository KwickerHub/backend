# backend
The ACES software aid backend repo

# SET-UP
To set-up, import the sql file into your local database system(like PHPMYADMIN).

# Info
Every table has a unique folder that controls it's manipulation. But not all folders represent tables.
Every Folder representing a table has different kinds of functions that can help you select from the Database.

The 'the_connector' Folder contains login details to the Database. It contains the Database name, username and password.

The 'hashing' Folder contains functions that can help you in hashing strings or user data. We will be using BCRYPT on the user password after salting it.

The 'generator' Folder contains functions that can generate different kinds of strings or integers. The generated string or integer is mean't to be unique and will be used in the user verification.
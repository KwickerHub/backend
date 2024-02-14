# backend
The ACES software aid backend repo
To reduce the stress of having to understand everything, please watch this video before you contribute to this project: https://youtu.be/zBRju-UY83U
It is also proper that you clone the frontend Repository of this organisation for you to have a better visual understanding of your Backend lines of code.

# Quick-Start Guide
## Step 1: Create a folder called 'KwickerHub'
In your file system, create a folder called ```KwickerHub```. This will house the frontend and backend of the project.
## Step 2: Clone the frontend 
- In Git Bash navigate to the frontend folder (replace ... with absolute file path)
  ```
  cd .../KwickerHub
  ```
- Then, run git clone to clone the frontend locally
  ```
  git clone https://github.com/KwickerHub/WebCraftifyAI
  ```
  Once done, there should be a ```WebCraftifyAI``` folder which now houses the frontend.
## Step 2: Clone the backend 
- In Git Bash navigate to the backend folder (replace ... with absolute file path)
  ```
  cd .../KwickerHub/backend
  ```
- Then, run git clone to clone the backend locally
  ```
  git clone https://github.com/KwickerHub/backend
  ```
  Once done, there should be a 'backend' folder which now houses the frontend.
## Step 3: Create a database using PHPMyAdmin (can be done in a different SQL manager)
- Create a new database with the name of ACES_DB
- Navigate to .../backend/set_up/ACES_DB to find the SQL source file for your database.
- Import the content in ACES_DB into your database. 
## Step 4: Connect your database to the backend
- In the ```KwickerHub``` Directory, create a file named ```localhost_db_details.php```.
- In that file, copy the following code
  ```
  <?php
  function make_local_connect(){
  $host_name = 'localhost';
  $database = 'Aces_DB';
  $user_name = 'root';
  $password= '';

  $connect = mysqli_connect($host_name, $user_name, $password, $database);
  }
  ?>
  ```
- Replace the values with relevant ones.
## Step 5: Connect to the web application
- Type ```localhost``` into your browser, and the app should be running.
# Info
Every table has a unique folder that controls it's manipulation. But not all folders represent tables.
Every Folder representing a table has different kinds of functions that can help you select from the Database.

The 'the_connector' Folder contains login details to the Database. It contains the Database name, username and password.

The 'hashing' Folder contains functions that can help you in hashing strings or user data. We will be using BCRYPT on the user password after salting it.

The 'generator' Folder contains functions that can generate different kinds of strings or integers. The generated string or integer is mean't to be unique and will be used in the user verification.

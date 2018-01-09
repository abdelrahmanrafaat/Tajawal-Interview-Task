# Tajawal-Interview-Task
Cli app to (filter, sort and display filtered) hotels from an api

Using the app:

1-Clone the repository

    $ git clone https://github.com/abdelrahmanrafaat/Tajawal-Interview-Task.git .

2-Install the app dependencies(php and composer are required to run this)
  
    $ composer install

-The app entry point is a file named **tajawal**
  this files includes the autoloading and app bootstraping

3-the command to start the application

    $ php tajawal find:hotels
  
  the command acceptes an optional -s flag for sorting criteria (sorting by price **or** name)
  
    $ php tajawal find:hotels -s price

4-once you run the command you will be asked to enter the search keys you want to filter by
  
  **name city price availability** 
  
  at least one or more seperated by **,** 
  
  $ name,city,price,availability

5-for every search key you selected you will be asked to enter it\`s values  
  
   -for example: hotel names can be (multiple names seperated by a comma ",")
  
       $ rotana,helton
  
  -hotel cities can be (multiple cities seperated by a comma ",")
 
       $ cairo,dubai
  
  -hotel price can be (numeric_number:numerice_number) only one range is accepted
  
       $ 50:200
  
  -hotel avaialbilites can be dates Ranges seperated by Comma, Dates should be on the format **d-m-Y** 
  
       $ 1-10-2018:10-10-2018,1-5-2018:10-5-2018
    
At the end the matching hotels will be displayed with it\`s price
 
 

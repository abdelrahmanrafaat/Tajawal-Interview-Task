# Tajawal-Interview-Task
Cli app to (filter, sort and display filtered) hotels from an api

## Technical Details:

### Packages used
1. Symfony-console for reading user input and displaying output
2. Guzzle for making Http requests
3. Carbon for dates parsing and manipulation
4. php-unit for unit testing purposes  

### Coding Standards
1. Psr-4 autoloading
2. Psr-2 coding style

## Using the app:

1. Clone the repository

       $ git clone https://github.com/abdelrahmanrafaat/Tajawal-Interview-Task.git .

2. Install the app dependencies(php and composer are required to run this)
  
       $ composer install

-The app entry point is a file named **tajawal**
  this files includes the autoloading and app bootstraping

3. the command to start the application

       $ php tajawal find:hotels
  
  the command acceptes an optional -s flag for sorting criteria (sorting by price **or** name)
  
       $ php tajawal find:hotels -s price

4. once you run the command you will be asked to enter the search keys you want to filter by
  
     **name city price availability** at least one or more seperated by **,** 
  
       $ name,city,price,availability

5. for every search key you selected you will be asked to enter it\`s values  
  
   -for example: hotel names can be (multiple names seperated by a comma ",")
  
       $ rotana,helton
  
  -hotel cities can be (multiple cities seperated by a comma ",")
 
       $ cairo,dubai
  
  -hotel price can be (numeric_number:numerice_number) only one range is accepted
  
       $ 50:200
  
  -hotel avaialbilites can be dates Ranges seperated by Comma, Dates should be on the format **d-m-Y** 
  
       $ 1-10-2018:10-10-2018,1-5-2018:10-5-2018
    
At the end the matching hotels will be displayed with it\`s price
 
 
 ## Running Unit tests:
       $ ./vendor/bin/phpunit

## Improvments:
1. Instead of using general exceptions, create custom exceptions classes

## Optimizations For large dataset:
1. Large data-set should be paginated
2. Adding a Caching layer that can be updated by a scheduled job to save request time while the user is using the app
3. Normalizing the data returned from the api for example: remove word Hotel from Rotana Hotel to be Rotana
4. benchmarking/profiling filtering and sorting algorthims and Implementing a more effiecient ones

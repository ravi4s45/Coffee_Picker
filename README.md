1. **Database and reporting -** we have provided you with a sample dataset( of order and order tracking information received from various systems. These databases are saved in a MySQL database via Laravel controllers on a regular basis. Analyse the strutures and suggest the best way to create the following reports: 
2. 
    1. All orders with last current status (order_status>current_status) is any of [Pending pickup, pickup queued, pickup exception] and order date (Orders>order_date) > 2 days
    
    2. List of all open orders (table.Order_number) with sub-orders (Orders>order_id) which does not have status(order_status > Current_tatus) of completed
   
 Solution::
 
    I have used laravel for this task 
    My method looks like this 

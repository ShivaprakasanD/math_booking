Laravel Version => 9.52.16
PHP Version  => 8.0.30

Extract the zip 
then go to project root direftory 

Please execute the following commands.

##composer install

##php artisan migrate

##php artisan make:seeder DatabaseSeeder


testing url in localhost(Xammp)

1.http://localhost:8000/api/classes

	Method = get

2.http://localhost:8000/api/book

  Method = post
  Request payload
		{"classroom":"Classroom A","slot":"2024-05-29 08:02:03"} 		

3.http://localhost:8000/api/cancel
  Method = post
  Request payload
  {"classroom":"Classroom A"}
  
 		

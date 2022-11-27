#Composer File
composer require apel/rexoit

#this is first task work

#Arisan commad page is Command> Salary.php,
plz this file is copy to app->Console>Commands folder

Update your composer.json File
"autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/",
	          "Apel\\Rexoit\\": "vendor/apel\rexoit/src/"
        }
    },
    
 Update config> app.php file in providers
 Apel\Rexoit\TaskServiceProvider::class,
 
 
 

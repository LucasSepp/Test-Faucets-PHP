To run the code running the native php server, enter the teste-sepp folder and run the command: php -S localhost:8000

To run the code with different types of faucets or people in the queue, you can manipulate the seeds.php file, it contains a list generator of objects of the type person and one for the type faucet.

Faucet and Person classes have constructors, as follows:

new Faucet(<<mililiters per second>)<br>
new Person(<bottle size (mililiters)>)

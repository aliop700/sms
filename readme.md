
## SMS

### Installation Steps

 1. composer install

### Commands

 - php sms send [provider] [number] [message]
 - php sms list
 
 

### adding new provider

 1. implement sms provider sms in ac lass name [providername]Provider.php
 2. add the providername in Provider.php enum
 
 unfortuanely this is just a POC because I could not find a free ms api gateway but it works fine and its extinsible (you can add as many providers as yiu want) 

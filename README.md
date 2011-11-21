# GSIS WSNP PHP Client

gsis-wsnp-php is a simple PHP client for accessing the web service for legal entities' details offered by Greece's Ministry of Finance General Secretariat of Information Systems.

The user provides the script with the legal entity's VAT Number, and it returns the details offered by the web service, like the company's name, its address, date of registration e.t.c.

As it was made for illustrative purposes, it doesn't pay any attention in formatting the output, or checking for the VAT Number's validity. Nevertheless, it implements some error handling, showing the error if it occurs.

For more information about the WSNP specifications please visit: [http://www.gsis.gr/wsnp.html](http://www.gsis.gr/wsnp.html).

To see the code in action please visit [http://www.appnoesis.com/gsis/wsnp/sample.php](http://www.appnoesis.com/gsis/wsnp/sample.php).

## JSON Web Service

If you want to access the data using a JSON web service, you can call 

[http://www.appnoesis.com/gsis/wsnp/json/entities/094422282](http://www.appnoesis.com/gsis/wsnp/json/entities/094422282)

by replacing 094422282 with the VAT Number of the legal entity you are interested in.

## License

Copyright 2011 Yannis Lianeris

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

   http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
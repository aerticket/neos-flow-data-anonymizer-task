# Scheduler task for anonymization

Use ttree/scheduler task for automatic anonymization.

Please note: As soon as you install this package and execute the `./flow scheduler:run` command
(e.g. via crontab), anonymization takes place automatically once per hour. Please make sure 
you have your models annotated correctly and test your configuration before anonymizing 
production data.

For more details, please have a look at the data anonymizer package:
https://github.com/aerticket/neos-flow-data-anonymizer

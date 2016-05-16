# GasPedaal Contact Application
### Simple yet functional contact application built upon PHP, jQuery, and Bootstrap.

Main Features:
- CRUD (Create, Read, Update, Delete) function for contact management
- Search contacts function (by name, phone number, notes, date)
- Login & Registration system with authentication and protection, such as password hashing
- "Forgot password" functionality
- Download contact details as a PDF document
- Send contact details through email as an attachment.
- Responsive design (Tested on 13" laptop, all iPhone variants, and Samsung Galaxy s6)

#### Created by Aditya Astono from May 14th to May 16th 2016.
Account for testing: admin@admin.com with "admin" as the password. You can also register yourself through the application.

######Notes
- ConnectDB.php connects to a localhost server with "root" as username. If you do have different credentials to your server, please change it accordingly.
- ONLY IF the "Send as Attachment" is not working, configure your php.ini file and change "exclude_globals" property to "On". Do not change if the function is working properly. Changing this property will result in malfunction of your server, to fix it revert that property back to "Off".

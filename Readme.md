PassCrypter: Online Password Manager
By Mouhammed El Zaart and Ahmad Moussa

How To Deploy:
https://docs.microsoft.com/en-us/azure/app-service-web/web-sites-php-sql-database-deploy-use-git

Frontend:
Bootstrap, Jquery and AJAX

Backend:
PHP and SQL database

Security Model:
The master password is hashed twice before being stored on the server.

The password is hashed on the client side to prevent the access to the original password in case of sniffing. The password is first hashed using PBKD becuase other hasing algorithms such as SHA256 and MD5 are too fast which makes them vulnerable to a bruteforce attack.

Then the password is hashed again on the server using SHA256 so that if the database gets compromised, the attacker won't be able to simply send the stolen hash to the sever and log in.

The credentials are encrypted on the client side. This serves two purposes. The first is that if the database gets compromised, the attacker won't have access to the user's accounts credentials. The other is to achieve Host Proof Hosting. Even if I, the owner of the app and the database, wanted to view the credentials that the users saved on my app I won't be able to.

The encryption algorithm used is AES-GCM. The GCM variation of the AES algorithm is used because other variations are vulnerable to Padding Oracle Attacks.

1. buka htpp://localhost/phpmyadmin . 
2. import db/proyek_sibuk.sql
3. atur password dan user phpmyadmin.
4. periksa file C:\xampp\apache\conf\htttpd.conf
**(* hapus tanda "#" jika ada)**

before
#Include conf/extra/httpd-vhosts.conf
After
Include conf/extra/httpd-vhosts.conf
* C:\Windows\System32\drivers\etc\hosts.
127.0.0.1        sibukeles.id

5.buka C:\xampp\apache\conf\extra\httpd-vhosts.conf
edit dengan isi berikut ini
NameVirtualHost *:80
<VirtualHost *:80>
DocumentRoot "C:/xampp/htdocs"
ServerName localhost
<Directory "C:/xampp/htdocs">
AllowOverride All
Require local
</Directory>
</VirtualHost>
<VirtualHost *:80>
DocumentRoot "C:/Users/iwan/Dropbox/sibuk"
ServerName sibukeles.id
<Directory "C:/Users/iwan/Dropbox/sibuk">
AllowOverride All
Require local
</Directory>
</VirtualHost>
````
**Catatan** Sesuaikan directory letak dropbox yang anda install. dan port server apache. contoh diatas
buka dibrowser http://sibukeles.id


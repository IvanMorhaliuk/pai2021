# DailyRepo

This is the application for creating and storing personal blogs, notebooks or simply notes.
The application was developed with PHP,JavaScript,HTML5,CSS3 and Postrgesql.

## How to build and start
Requirement: You need Docker installed on your computer <br />

1.cd to pai2021 <br />
2.docker-compose build <br />
3.docker-compose up <br />

## URLs
/ - routes to login page <br />
/register - routes to registration page <br />
/login - verification after login, routes to main page(profile) <br />
/profile - main page,info about user and his private books. (access only for logined users) <br />
/search - search page,ability to search and read through all books on the website. (access only for logined users) <br />
/shelf - shelf page, all user's books with ability to read,delete,and edit as well as add books. (access only for logined users) <br />
/statistics - statistics page, statistic info about user's activity. (access only for logined users) <br />
/settings - settings page, ability to delete current user account, edit profile. (access only for logined users) <br />
/logout - finishes current session and routes to login page (access only for logined users) <br />

## API
/addbook - page for adding book for current user (access only for logined users) <br />
/getallbooks - returns all books on a website in json (access only for logined users) <br />
/getalluserbooks - returns all books for current user in json (access only for logined users) <br />
/searchbook - returns all books in json that match provided string (access only for logined users) <br />
/updatecontent - updates edited book content and redirects to shelf page (access only for logined users) <br />

## Screens
### login
![image](https://user-images.githubusercontent.com/76161100/152301936-9c6ba16c-561e-49ea-a2b6-3cd3a71fbcd0.png)
### register
![image](https://user-images.githubusercontent.com/76161100/152302038-594238ef-3a8f-4947-9b38-03f1499e8a18.png)
### profile
![image](https://user-images.githubusercontent.com/76161100/152301520-65d335f6-6a04-4975-a4d6-cd7802afe64a.png)
### search
![image](https://user-images.githubusercontent.com/76161100/152301653-c809ac66-8119-4081-b98f-c279800bff06.png)
### shelf
![image](https://user-images.githubusercontent.com/76161100/152301706-1acb1e43-9ebb-4bdb-a96b-d505f9b96937.png)
### statistics
![image](https://user-images.githubusercontent.com/76161100/152301765-8ec35f96-e09a-4a8b-8646-681a71af6bbf.png)
### settings
![image](https://user-images.githubusercontent.com/76161100/152301824-e25fde68-6672-45ea-804b-948b3a0f3185.png)

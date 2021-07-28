<br />

<p align="center">
  
<a href="https://raw.githubusercontent.com/NorahMAlmutairi/Laravel_Project_Norah_News/main/Assets/logo.png.png">
<img src="https://raw.githubusercontent.com/NorahMAlmutairi/Laravel_Project_Norah_News/main/Assets/logo.png" alt="Logo" width="350" height="200">
</a>

<h3 align="center">
A Laravel-Powered Project
<br />
<a href="http://norahnews.com"><strong>View Live »</strong></a>
    <br />
    <br />
  </h3>
</p>

![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/aqua.png)

</br></br>

![Homepage](https://raw.githubusercontent.com/NorahMAlmutairi/Laravel_Project_Norah_News/main/Assets/HomePage.png)

</br>

# Description
Norah News is an open-source news management system that enables a news agency to seamlessly publish, manage comments, search for articles, and much more! With Norah News, publishing news in a digitally-driven world has never been easier and more fluent, giving you the time to focus on what matters, and leaving the rest for us:muscle:!
The news management system is composed of two main parts. The frist part contains the public news landing page, which in itself consists of the latest 10 news articles that administrators have published. This first part also includes advanced search features, allowing users to search for articles by their titles, contents, or authors, as well as restricting the results for certain categories and date ranges. Finally, the first part includes an *About* page and a *Contact us* page that users can use to send messages and feedback to system administrators.
The second part of the system focuses on administrative tasks. These include adding, editing and removing news categories, news articles, and comments. It also contains a dashboard that provides general site statistics and charts. Administrators can also read and delete messages and feedback sent by guests in the *Contact us* form. Finally, administrators can approve or reject comments posted by guests before they get public.

![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/aqua.png)

# Features
* 🔒 Administrative authentication
* 📝 Publishing news articles with styled HTML elements
* 🖼️ Adding images to news articles
* 📹 Adding videos to news articles
* ✍️ Editing previously published news articles
* ❌ Deleting published news articles
* 📊 Administrative dashboards with charts and statistics
* 🔍 Advanced searching facilities for new articles and categories 
* :telephone_receiver: About and contact pages to send messages to administrators
* 💭 Guests can share their thoughts by writing comments in news articles 
* :unlock: Administrative comments screening and approving process
* :pencil2: Modifying and editing comments by administrators
* :no_entry_sign: Hiding and deleting comments by administartors
* :walking: Visitors count on each news article

![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/aqua.png)

# Technology Stack
<a href="https://www.w3.org/TR/html5/" title="HTML5"><img src="https://github.com/get-icon/geticon/raw/master/icons/html-5.svg" alt="HTML5" width="21px" height="21px"></a> <strong>HTML5</strong>

<a href="https://www.w3.org/TR/CSS/" title="CSS3"><img src="https://github.com/get-icon/geticon/raw/master/icons/css-3.svg" alt="CSS3" width="21px" height="21px"></a> <strong>CSS3</strong>

<a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" title="JavaScript"><img src="https://github.com/get-icon/geticon/raw/master/icons/javascript.svg" alt="JavaScript" width="21px" height="21px"></a> <strong>JavaScript</strong>

<a href="https://php.net/" title="PHP"><img src="https://github.com/get-icon/geticon/raw/master/icons/php.svg" alt="PHP" width="21px" height="21px"></a> <strong>PHP</strong>

<a href="https://laravel.com/" title="Laravel"><img src="https://github.com/get-icon/geticon/raw/master/icons/laravel.svg" alt="Laravel" width="21px" height="21px"></a> <strong>Laravel</strong>

<a href="https://getcomposer.org/" title="Composer"><img src="https://github.com/get-icon/geticon/raw/master/icons/composer.svg" alt="Composer" width="21px" height="21px"></a> <strong>Composer</strong>

<a href="https://nodejs.org/" title="Node.js"><img src="https://github.com/get-icon/geticon/raw/master/icons/nodejs-icon.svg" alt="Node.js" width="21px" height="21px"></a> <strong>Node.js</strong>

<a href="https://tailwindcss.com/" title="Tailwind CSS"><img src="https://github.com/get-icon/geticon/raw/master/icons/tailwindcss-icon.svg" alt="Tailwind CSS" width="21px" height="21px"></a> <strong>Tailwind</strong>

<a href="https://www.apachefriends.org/" title="XAMPP"><img src="https://github.com/get-icon/geticon/raw/master/icons/xampp.svg" alt="XAMPP" width="21px" height="21px"></a> <strong>XAMPP</strong> (For local development)

<a href="https://www.nginx.com/" title="Nginx"><img src="https://github.com/get-icon/geticon/raw/master/icons/nginx-icon.svg" alt="Nginx" width="21px" height="21px"></a> <strong>Nginx</strong>

<a href="https://aws.amazon.com/" title="AWS"><img src="https://github.com/get-icon/geticon/raw/master/icons/aws.svg" alt="AWS" width="21px" height="21px"></a> <strong>AWS</strong>

<a href="https://dev.mysql.com/" title="MySQL"><img src="https://github.com/get-icon/geticon/raw/master/icons/mysql.svg" alt="MySQL" width="21px" height="21px"></a> <strong>MySQL</strong>

![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/aqua.png)

# Entity-Relation Diagram

<div align="center">
<img src="https://raw.githubusercontent.com/NorahMAlmutairi/Laravel_Project_Norah_News/main/Assets/News_ER_diagram.png" alt="ERDiagram" width="600px">
</div>

![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/aqua.png)

# Development Prerequisites
* PHP >= 7.4
* Composer >=  2.1
* XAMPP => 7.4
* Node => 14.17
* MySQL => 8.0

![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/aqua.png)

# Installation
After cloning the repo, make sure you edit the `.env` file (see `.env.example`) to accomodate your database name and credentials, and be sure to create the database in advance. Then, install all composer dependencies, followed by npm dependencies installation and building.
   ```sh
   ### 1- Install composer dependencies   
   composer install
   ### 2- Install npm dependencies
   npm install
   ### 3- Build for a development environment
   npm run dev
   ### 4- Make the database migrations and start seeding
   php artisan migrate --seed
   ### 5- Make the file uploads storage folder publicly accessable
   php artisan storage:link
   ### 6- Start serving the project locally :)
   php artisan serve
   ```
![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/aqua.png)

# Demo





https://user-images.githubusercontent.com/82478306/127321193-b494114c-9e94-4311-a6b4-65404fbb693b.mp4



![-----------------------------------------------------](https://raw.githubusercontent.com/andreasbm/readme/master/assets/lines/aqua.png)

# Developer
Norah Almutairi 
* Github : [NorahMAlmutairi](https://github.com/NorahMAlmutairi) 

# News Agency
## Requirements:
A news agency wants to implement a website for posting news articles. Using the system, the readers from all over the world can browse through the categories and read about the most recent events.
The agency covers the most important news categories like economy, politics, culture, science and sport from all over the world.
The news articles will be uploaded by writers, and afterwards validated by editors before being posted on the site.
The news is sorted by the time of upload, world region, and topic.
## Specifications:
The website will be hosted on an Apache HTTP Server, using a MySQL database and the main programming language is PHP.
General description:
Website for News agency on which writers from all over the world can upload their articles, that after being reviewed by editors are posted to be read by anyone.
### Users:
- readers - any visitor on the website, they don’t require logging in
- writers - register on the Registration page, upload the articles
- editors - are created by the admin, they validate the articles of the writers
- administrator - website developer
### Homepage (for all)
Lists from the database the title and excerpt from the latest articles.
### Categories Page (for all)
List the articles belonging to a category (e.g. economy).
### Add article (for writers)
To add a new article a writer must provide a title, the content, featured image and categories. After adding the article will be in the pending 	queue till reviewed by an editor
### Pending Articles (for editors)
The editors can approve pending articles or reject them. After being approved the articles will be posted on the site for all to read.
### Registration page (for all)
A user can register by correctly proving a name, username, email address, short description and password.
### Login page (for all)
If a user inputs the correct credentials (username) and password, they will be redirected to the backend.

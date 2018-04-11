# Tix4Flix: Online Movie Ticketing Service
[![License](https://img.shields.io/badge/License-Apache%202.0-blue.svg)](https://opensource.org/licenses/Apache-2.0)
## Background
This project was built to develop a database that can be used to support an Online Movie Ticket Service (OMTS), which is an application for the advance purchase of movie tickets from any local theatre. Customers use the service to find out information about movies currently playing in various complexes and to order advance tickets for specific showings of the movies. 

The project was intended to give me an opportunity to participate in all phases of the development of a database application including:
1. ER modeling techniques
2. Relational modeling techniques
3. SQL
4. Web Development (XAMP Stack)
5. Accessing a database via web application

## Requirements

### Data Requirements

1. The are multiple theatre complexes in the city. Each theatre complex contains some number of theatres and has a name, address and a phone number. Each theatre in a theatre complex has a theatre number, a maximum number of seats and a screen size (small, medium or large).  You must have at least 3 theatre complexes represented in your project.
2. Each current movie has a title, a running time, a rating (G, PG, AA, 14A, R, etc), a plot synopsis, a list of main actors, a director, a production company, the name of the supplier and the start and end dates for the movie's run at the theatre complex. The movie has one or more daily showings at the theatre complex specified by a start time. Each showing has the number of the theatre for the showing, the start time and the number of seats still available. 
3. A movie supplier has a company name, a company address, a phone number and the name of the contact person at the company.
4. Movie information remains in the database even if the movie is no longer playing at any theatres.
5. Each OMTS customer must register with the service.  Once they have done so, they use the account number and password created to conduct transactions with the service. Each customer has a name, address, phone number, email address, account number, password, credit card number and credit card expiry date.
6. Customers make reservations with the service (ie. they purchase movie tickets).   Each reservation contains an account number, a showing, the number of tickets reserved. Assume that reservation records will be retained in the database for later analysis of customer movie viewing patterns.
7. Customer reviews for movies.

### Functional Requirements

#### Members
1. Make an account including a login id and password
2. Browse movies playing at the various theatre complexes.
3. Purchase some number of tickets for one or more movies showing at one or more theatres
4. View their purchases
5. Cancel a purchase
6. Update their personal details -- ie. modify their profile
7. Browse their past rentals.
8. Add a review for a movie.

#### Administrators
1. List all the members
2. Remove a member
3. Add or update the information for a theatre complex/theatre
4. Add movies to the database
5. Update where/when movies are showing
6. For a particular customer, show their rental history (including current tickets held)
7. Find the movie that is the most popular (ie. has sold the most tickets across all theatres).
8. Find the theatre complex that is most popular (ie. has sold the most tickets across all movies)

## Database Design

![alt](https://i.imgur.com/bcOuxXj.png "Entity Relationship Diagram")

## Implementation
Click [here](https://www.scribd.com/document/376067934/Post-Development-Report "Post-Development Report") for Post-Development Report which includes:
1) Entity Relation Diagram 
2) Assumptions 
3) Cardinality Legend for ER Diagram 
4) Problems Encountered During Development 
5) Design and Implementation Decisions 
6) Technologies and Tools Used 
7) Features to be Added 
8) User Manual

## Try it yourself

1. Download and install [XAMPP](https://www.apachefriends.org/index.html) (Apache Server)
2. Locate and enter the `/volumes/root/htdocs` folder within the application (Through `/home/.bitnami` on OSX, and application folder on Windows). This folder is essentially a **PHP "engine"** which allows PHP files to run on the Apache Server
3. Create a folder and initialize your repository
  * `mkdir longtitleproject && cd $_`
  * `git init`
4. Add remote repository for local repository to point to
  * `git remote add origin https://github.com/chrismaltais/Tix4Flix.git`
5. Pull remote files to your local repository to use!
  * `git pull origin master`
6. Open PHPMyAdmin via XAMPP, query the database DDL `complexdb.sql`: It creates and populates tables with dummy data!
7. Run `pages/index.html`

### Member Credentials
**Email:** user@demo.com

**Password:** password

### Admin Credentials
**Email:** admin@demo.com

**Password:** password

## Feature Backlog

- [ ] Add security (password hashing, etc.)
- [ ] Re-factor code (codebase is definitely not DRY - functions can be created)

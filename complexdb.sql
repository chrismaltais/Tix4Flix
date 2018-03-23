create database complexdb;

CREATE TABLE Theatre_Complex (
    name VARCHAR(40) NOT NULL,
    street_name	VARCHAR(30)	NOT NULL,
    street_number INTEGER NOT NULL,
    postal_code	VARCHAR(7) NOT NULL,
    phone_number VARCHAR(17) NOT NULL,
    PRIMARY KEY (name)
);

CREATE TABLE Theatre (
    name VARCHAR(40) NOT NULL,
    screen_id INTEGER NOT NULL,
    max_seats INTEGER NOT NULL,
    screen_size	VARCHAR(6) NOT NULL,
    PRIMARY KEY(name, screen_id),
    FOREIGN KEY(name) REFERENCES Theatre_Complex(name)
);

CREATE TABLE User_Account (
    email VARCHAR(40) NOT NULL,
    _password VARCHAR(40) NOT NULL,
    fname VARCHAR(25) NOT NULL,
    lname VARCHAR(25) NOT NULL,
    street_name VARCHAR(30) NOT NULL,
    street_num INTEGER NOT NULL,
    postal_code VARCHAR(7) NOT NULL,
    phone_number VARCHAR(10) NOT NULL,
    PRIMARY KEY (email)
); 

CREATE TABLE Admin (
    admin_id INTEGER NOT NULL,
    email VARCHAR(40) NOT NULL,
    PRIMARY KEY (admin_id, email),
    FOREIGN KEY (email) REFERENCES User_Account(email)
);

CREATE TABLE Member (
    member_id INTEGER NOT NULL,
    email VARCHAR(40) NOT NULL,
    card_number decimal(16, 0) NOT NULL,
    card_expiry decimal(4, 0) NOT NULL,
    PRIMARY KEY (member_id, email),
    FOREIGN KEY (email) REFERENCES User_Account(email) ON DELETE CASCADE
);

CREATE TABLE Supplier (
    company_name VARCHAR(50) NOT NULL,
    street_name	VARCHAR(30)	NOT NULL,
    street_number INTEGER NOT NULL,
    postal_code	VARCHAR(7) NOT NULL,
    phone_number VARCHAR(17) NOT NULL,
    contact VARCHAR(30) NOT NULL,
    PRIMARY KEY (company_name)
);

CREATE TABLE Movie (
    title VARCHAR(50) NOT NULL,
    run_time INTEGER NOT NULL,
    rating VARCHAR(3) NOT NULL,
    plot_synopsis VARCHAR(500) NOT NULL,
    trailer_link VARCHAR(100) NOT NULL,
    director VARCHAR(50) NOT NULL,
    production_company VARCHAR(50) NOT NULL,
    supplier VARCHAR(50) NOT NULL,
    start_date decimal(8, 0) NOT NULL,
    end_date decimal(8, 0) NOT NULL,
    PRIMARY KEY(title),
    FOREIGN KEY(supplier) REFERENCES Supplier(company_name)
);


CREATE TABLE Movie_Actors (
    title VARCHAR(50) NOT NULL,
    main_actor VARCHAR(50) NOT NULL,
    PRIMARY KEY(title, main_actor),
    FOREIGN KEY(title) REFERENCES Movie(title)
);

CREATE TABLE Opinion (
    member_id INTEGER NOT NULL,
    title VARCHAR(50) NOT NULL,
    review VARCHAR(500) NOT NULL,
    PRIMARY KEY (member_id, title),
    FOREIGN KEY (member_id) REFERENCES Member(member_id) ON DELETE CASCADE,
    FOREIGN KEY (title) REFERENCES Movie(title)
);

CREATE TABLE Showing (
    showing_id INTEGER NOT NULL,
    start_time VARCHAR(15) NOT NULL,
    num_seats INTEGER NOT NULL,
    screen_id INTEGER NOT NULL,
    name VARCHAR(40) NOT NULL,
    date_played VARCHAR(40) NULL,
    title VARCHAR(50) NOT NULL,
    PRIMARY KEY(showing_id),
    FOREIGN KEY(title) REFERENCES Movie(title),
    FOREIGN KEY(name, screen_id) REFERENCES Theatre(name, screen_id) 
    /*FOREIGN KEY(screen_id) REFERENCES Theatre(screen_id) */
);

CREATE TABLE Reservations (
    reservation_id INTEGER NOT NULL,
    num_tickets INTEGER NOT NULL,
    account_num INTEGER NOT NULL,
    showing_id INTEGER NOT NULL,
    PRIMARY KEY(reservation_id),
    FOREIGN KEY(showing_id) REFERENCES Showing(showing_id),
    FOREIGN KEY(account_num) REFERENCES Member(member_id) ON DELETE CASCADE
);

#Change phone number to 10 digits



insert into Theatre_Complex (name, street_name, street_number, postal_code, phone_number) values 
('Cineplex Odeon','Brock St','293','K4J2N1','6139372819'),
('Cineplex Tron','Johnson St','102','K1P8N3','6137392837'),
('Cineplex Infinity','Division St','400','K3R6B4','6138264730');

insert into Supplier (company_name, street_name, street_number, postal_code, phone_number, contact) values
('WeRthePlugSupplier', 'Laughter Lane', 32, 'H9W3V5', '8326483718', 'Dale Jambo'),
('MoneymakesMoneySupplier', 'Xlyophone Place', 902, 'U2B4K1', '7219385743', 'Gertrude Smithers'),
('SuperDuperSupplier', 'Ukelele Cres', 1234, 'Z7B4J1', '8734621923', 'Milton Mollywop');

insert into Movie (title, run_time, rating, plot_synopsis, trailer_link, director, production_company, supplier, start_date, end_date) values 
('Man of Steel', 332,'R','Chris Maltais, one of the last of an extinguished race disguised as an unremarkable human, is forced to reveal his identity when Earth is invaded by an army of survivors who threaten to bring the planet to the brink of destruction.', 'https://www.youtube.com/watch?v=T6DJcgm3wNY', 'Zack Snyder', 'SuperheroAnon', 'SuperDuperSupplier',20180121,20160406),
('The Wolf of Wall Street', 170,'14A','Based on the true story of James Weiss, from his rise to a wealthy stock-broker living the high life to his fall involving crime, corruption and the federal government.', 'https://www.youtube.com/watch?v=iszwuX1AK6A', 'Martin Scorsese', 'The Weinstein Company', 'MoneymakesMoneySupplier',20170824,20171108),
('Harry Potter',220,'14A','A young student finds himself competing in a hazardous tournament between rival schools of engineering, but he is distracted by recurring homework problems.', 'https://www.youtube.com/watch?v=3EGojp4Hh6I&t=39s','Mike Newell', 'Fraternity Bros', 'WeRthePlugSupplier',20171225,20180121);

insert into Theatre (name, screen_id, max_seats, screen_size) values
('Cineplex Odeon',1, 150, 'small'),
('Cineplex Odeon',2, 200, 'medium'),
('Cineplex Odeon',3, 250, 'large'),
('Cineplex Tron',1,150, 'small'),
('Cineplex Tron',2, 200, 'medium'),
('Cineplex Tron',3, 250, 'large'),
('Cineplex Infinity',1, 250, 'large'),
('Cineplex Infinity',2, 250,'large'),
('Cineplex Infinity',3, 250,'large');

insert into User_Account (email, _password, fname, lname, street_name, street_num, postal_code, phone_number) values
('Alice@Amail.com','12345','Alice', 'Anderson','Tupac Lane',23,'H2I4X3', '3728546378'),
('Theodore@Tmail.com','23456','Theodore', 'Roosevelt','Error Place',45,'U73N4I', '8346920457'),
('Joy@Jmail.com','34567','Joy', 'Ahoy', 'Chicken Dinner Road',92,'O8QB3M', '9374816284'),
('Abner@Amail.com','45678','Abner', 'Alakazam', 'Frying Pan Road',72, 'P1N7WB', '7219035715'),
('Michael@Mmail.com','56789','Michael','Bloomberg', 'Suncastle Bay',995,'E7V2N8', '7219472534'),
('Alice2@Amail.com','67890','Alice', 'Applegate', 'GOA Way',2238,'Z8WT3K', '7210984632'),
('Elizabeth@Email.com','78901','Elizabeth','Smith','English Avenue',01,'P1N5X3', '7354637182'),
('user@demo.com','password','Chris','Maltais','English Avenue',01,'P1N5X3', '7354637182'),
('admin@demo.com','password','Chris','Maltais','English Avenue',01,'P1N5X3', '7354637182');

insert into Admin (admin_id, email) values
(1,'Alice@Amail.com'),
(2,'Theodore@Tmail.com'),
(3,'admin@demo.com');

insert into Member (member_id, email, card_number, card_expiry) values
(1,'Joy@Jmail.com', 1234567891234567, 2011),
(2,'Abner@Amail.com', 1234567898765432,2003 ),
(3,'Michael@Mmail.com', 9876543212345678, 2204 ),
(4,'Alice2@Amail.com', 9876543210987654, 2401),
(5,'Elizabeth@Email.com', 0192837465019283,1908),
(6,'user@demo.com', 0192837465019283,1908);

insert into Movie_Actors (title, main_actor) values
('Man of Steel', 'James Weiss'),
('Man of Steel', 'Jennifer Aniston'),
('The Wolf of Wall Street', 'Leonardo DiCaprio'),
('The Wolf of Wall Street', 'Margot Robbie'),
('Harry Potter', 'Kobe Bryant'),
('Harry Potter', 'Morgan Freeman');

insert into Opinion (member_id, title, review) values
(1, 'Man of Steel', 'Watched with the family, incredible! I loved the part where Chris
becomes super. Great character development, better plot'),
(3, 'Harry Potter', 'Slightly terrifying! Be cautious, around
the half-way mark something scary happens. My drinkn flew out of my hand! Would
definitely see again.'),
(4, 'The Wolf of Wall Street', 'Absolutely terrific. Sheds light on the corruption of capitalism,
and what happens when greed and glory cross paths');
/* (2, 'Man of Steel', 'This man is not made of steel! Fake news!'),
(5, 'Harry Potter', 'Harry has really grown up these past few years :('),
(1, 'The Wolf of Wall Street', 'Did not like. I thought this movie was about a wolf!'); */

insert into Showing (showing_id, start_time, num_seats, screen_id, name, date_played, title) values
('1','12:00pm', 100, 1,'Cineplex Odeon', '2018-03-20', 'Harry Potter'),
('2','2:00pm', 150, 3,'Cineplex Tron', '2018-03-25', 'Man of Steel'),
('3','4:00pm', 130, 3,'Cineplex Infinity', '2018-03-26', 'The Wolf of Wall Street'),
('4','11:00am', 120, 2,'Cineplex Odeon', '2018-03-26', 'Harry Potter'),
('5','9:00am', 160, 3,'Cineplex Tron', '2018-03-26', 'The Wolf of Wall Street'),
('6','12:00am', 170, 1,'Cineplex Infinity', '2018-03-26', 'Man of Steel'),
('7','1:00pm', 180, 3,'Cineplex Odeon', '2018-03-26', 'Man of Steel'),
('8','3:00pm', 140, 1,'Cineplex Tron', '2018-03-20', 'The Wolf of Wall Street'),
('9','5:00pm', 150, 2,'Cineplex Infinity', '2018-03-20', 'Harry Potter'),
('10','10:00pm', 145, 1,'Cineplex Odeon', '2018-03-20', 'The Wolf of Wall Street'),
('11','9:00pm', 120, 2,'Cineplex Tron', '2018-03-20', 'Man of Steel'),
('12','6:00pm', 110, 1,'Cineplex Infinity', '2018-03-26', 'Harry Potter'),
('13','8:00pm', 180, 3,'Cineplex Odeon', '2018-03-20', 'The Wolf of Wall Street'),
('14','11:00pm', 175, 3,'Cineplex Tron', '2018-03-26', 'Harry Potter'),
('15','2:00pm', 150, 2,'Cineplex Tron', '2018-03-26', 'Man of Steel'),
('16','7:00pm', 4, 2,'Cineplex Tron', '2018-03-26', 'Man of Steel'),
('17','7:00pm', 150, 3,'Cineplex Tron', '2018-03-27', 'Harry Potter');

insert into Reservations (reservation_id, num_tickets, account_num, showing_id) values
('12345', 2, 1, '2'),
('12346', 3, 2, '4'),
('12347', 4, 3, '7'),
('12348', 1, 4, '11'),
('12349', 2, 5, '14'),
('12350', 1, 6, '15'),
('12351', 2, 6, '17'),
('12352', 2, 6, '8');



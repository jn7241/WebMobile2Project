-- USERS TABLE

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    name TEXT,
    email TEXT,
    password VARCHAR(255),
	PRIMARY KEY(id)
);

-- BOOKINGS TABLE

CREATE TABLE bookings (
  id INT NOT NULL AUTO_INCREMENT,
  name TEXT NOT NULL,
  title VARCHAR(255) NOT NULL,
  theater VARCHAR(255) NOT NULL,
  start_time DATETIME NOT NULL,
  end_time DATETIME NOT NULL,
  price DECIMAL(6,2) NOT NULL,
  location VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);


-- CINEMA LOCATIONS TABLE

CREATE TABLE cinema_locations (
  location VARCHAR(255) NOT NULL,
  PRIMARY KEY (location)
);


-- Insert some cities

INSERT INTO cinema_locations (location) VALUES
('Prishtina'),
('Prizren');

-- FILMS TABLE


CREATE TABLE films (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  director VARCHAR(255) NOT NULL,
  release_year YEAR NOT NULL,
  genre VARCHAR(255) NOT NULL,
  rating FLOAT(2,1) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (title)
);


-- Insert some films
INSERT INTO films (title, director, release_year, genre, rating) VALUES
('The Godfather', 'Francis Ford Coppola', 1972, 'Crime', 9.2),
('The Shawshank Redemption', 'Frank Darabont', 1994, 'Drama', 9.3),
('The Dark Knight', 'Christopher Nolan', 2008, 'Action', 9.0),
('Pulp Fiction', 'Quentin Tarantino', 1994, 'Crime', 8.9),
('Forrest Gump', 'Robert Zemeckis', 1994, 'Drama', 8.8),
('The Matrix', 'Lana Wachowski, Lilly Wachowski', 1999, 'Action', 8.7),
('Titanic', 'James Cameron', 1997, 'Romance', 8.5);

-- SHOWTIMES TABLE

CREATE TABLE showtimes (
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(255) NOT NULL,
  theater VARCHAR(255) NOT NULL,
  start_time DATETIME NOT NULL,
  end_time DATETIME NOT NULL,
  price DECIMAL(6,2) NOT NULL,
  location VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (title) REFERENCES films(title),
  FOREIGN KEY (location) REFERENCES cinema_locations(location)
);

-- INSERTING AN ADMIN (STAFF), since no registering for them was needed
INSERT INTO users(id,name,email,password) VALUES (1, 'admin', 'admin@starcinema.com', 'cinest/Ar_12');
-- Insert some showtimes for The Godfather
INSERT INTO showtimes (title, location, theater, start_time, end_time, price) VALUES
('The Godfather', 'Prishtina', 'Main Theater', '2023-05-01 19:00:00', '2023-05-01 22:00:00', 12.99),
('The Godfather', 'Prishtina', 'Main Theater', '2023-05-01 22:30:00', '2023-05-02 01:30:00', 12.99),
('The Godfather', 'Prizren', 'Main Theater', '2023-05-02 13:00:00', '2023-05-02 16:00:00', 10.99),
('The Godfather', 'Prizren', 'Side Theater', '2023-05-02 19:00:00', '2023-05-02 22:00:00', 9.99),
('The Godfather', 'Prizren', 'Side Theater', '2023-05-03 19:00:00', '2023-05-03 22:00:00', 9.99);


-- Insert some showtimes for The Shawshank Redemption
INSERT INTO showtimes (title, location, theater, start_time, end_time, price) VALUES
('The Shawshank Redemption', 'Prishtina', 'Main Theater', '2023-05-01 16:30:00', '2023-05-01 19:30:00', 11.99),
('The Shawshank Redemption', 'Prishtina', 'Main Theater', '2023-05-02 10:30:00', '2023-05-02 13:30:00', 10.99),
('The Shawshank Redemption', 'Prizren', 'Main Theater', '2023-05-02 16:00:00', '2023-05-02 19:00:00', 10.99),
('The Shawshank Redemption', 'Prizren', 'Side Theater', '2023-05-03 16:00:00', '2023-05-03 19:00:00', 8.99),
('The Shawshank Redemption', 'Prizren', 'Side Theater', '2023-05-03 22:30:00', '2023-05-04 01:30:00', 12.99);

-- Insert some showtimes for The Dark Knight
INSERT INTO showtimes (title, location, theater, start_time, end_time, price) VALUES
('The Dark Knight', 'Prishtina', 'Main Theater', '2023-05-01 22:00:00', '2023-05-02 01:00:00', 11.99),
('The Dark Knight', 'Prishtina', 'Main Theater', '2023-05-02 19:30:00', '2023-05-02 22:30:00', 11.99),
('The Dark Knight', 'Prizren', 'Main Theater', '2023-05-03 13:00:00', '2023-05-03 16:00:00', 9.99),
('The Dark Knight', 'Prizren', 'Side Theater', '2023-05-04 16:00:00', '2023-05-04 19:00:00', 8.99),
('The Dark Knight', 'Prizren', 'Side Theater', '2023-05-04 22:00:00', '2023-05-05 01:00:00', 12.99);

-- Insert some showtimes for Pulp Fiction
INSERT INTO showtimes (title, location, theater, start_time, end_time, price) VALUES
('Pulp Fiction', 'Prishtina', 'Main Theater', '2023-05-01 13:30:00', '2023-05-01 16:30:00', 10.99),
('Pulp Fiction', 'Prishtina', 'Main Theater', '2023-05-01 22:00:00', '2023-05-02 01:00:00', 12.99),
('Pulp Fiction', 'Prizren', 'Main Theater', '2023-05-02 19:00:00', '2023-05-02 22:00:00', 10.99),
('Pulp Fiction', 'Prizren', 'Side Theater', '2023-05-03 16:30:00', '2023-05-03 19:30:00', 8.99),
('Pulp Fiction', 'Prizren', 'Side Theater', '2023-05-04 22:30:00', '2023-05-05 01:30:00', 12.99);

-- Insert some showtimes for Forrest Gump
INSERT INTO showtimes (title, location, theater, start_time, end_time, price) VALUES
('Forrest Gump', 'Prishtina', 'Main Theater', '2023-05-02 10:00:00', '2023-05-02 13:00:00', 9.99),
('Forrest Gump', 'Prishtina', 'Main Theater', '2023-05-02 16:30:00', '2023-05-02 19:30:00', 10.99),
('Forrest Gump', 'Prizren', 'Main Theater', '2023-05-03 22:00:00', '2023-05-04 01:00:00', 12.99),
('Forrest Gump', 'Prizren', 'Side Theater', '2023-05-04 16:00:00', '2023-05-04 19:00:00', 8.99),
('Forrest Gump', 'Prizren', 'Side Theater', '2023-05-05 22:30:00', '2023-05-06 01:30:00', 12.99);

-- Insert some showtimes for The Matrix
INSERT INTO showtimes (title, location, theater, start_time, end_time, price) VALUES
('The Matrix', 'Prishtina', 'Main Theater', '2023-05-02 13:30:00', '2023-05-02 16:30:00', 10.99),
('The Matrix', 'Prishtina', 'Main Theater', '2023-05-03 19:00:00', '2023-05-03 22:00:00', 10.99),
('The Matrix', 'Prizren', 'Main Theater', '2023-05-04 10:30:00', '2023-05-04 13:30:00', 9.99),
('The Matrix', 'Prizren', 'Side Theater', '2023-05-05 16:30:00', '2023-05-05 19:30:00', 8.99),
('The Matrix', 'Prizren', 'Side Theater', '2023-05-06 22:00:00', '2023-05-07 01:00:00', 12.99);

-- Insert some showtimes for Titanic
INSERT INTO showtimes (title, location, theater, start_time, end_time, price) VALUES
('Titanic', 'Prishtina', 'Main Theater', '2023-05-03 13:00:00', '2023-05-03 16:00:00', 9.99),
('Titanic', 'Prishtina', 'Main Theater', '2023-05-03 22:30:00', '2023-05-04 01:30:00', 12.99),
('Titanic', 'Prizren', 'Main Theater', '2023-05-04 19:00:00', '2023-05-04 22:00:00', 10.99),
('Titanic', 'Prizren', 'Side Theater', '2023-05-05 16:00:00', '2023-05-05 19:00:00', 8.99),
('Titanic', 'Prizren', 'Side Theater', '2023-05-06 22:30:00', '2023-05-07 01:30:00', 12.99);


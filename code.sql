-- Create Users table
CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(10),
    PasswordHash VARCHAR(255),
    Email VARCHAR(100),
    UserType ENUM('Admin', 'User') DEFAULT 'User'
);

-- Create Categories table
CREATE TABLE Categories (
    CategoryID INT AUTO_INCREMENT PRIMARY KEY,
    CategoryName VARCHAR(20)
);

-- Create Cities table
CREATE TABLE Cities (
    CityID INT AUTO_INCREMENT PRIMARY KEY,
    CityName VARCHAR(20),
    Country VARCHAR(20),
    Description TEXT
);

-- Create Places table
CREATE TABLE Places (
    PlaceID INT AUTO_INCREMENT PRIMARY KEY,
    PlaceName VARCHAR(20),
    Description TEXT,
    Address VARCHAR(255),
    Latitude DECIMAL(10, 8),
    Longitude DECIMAL(11, 8),
    CategoryID INT,
    CityID INT,
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID),
    FOREIGN KEY (CityID) REFERENCES Cities(CityID)
);

-- Create PlaceAdvantages table
CREATE TABLE PlaceAdvantages (
    AdvantageID INT AUTO_INCREMENT PRIMARY KEY,
    PlaceID INT,
    Advantage TEXT,
    FOREIGN KEY (PlaceID) REFERENCES Places(PlaceID)
);

-- Create Images table
CREATE TABLE Images (
    ImageID INT AUTO_INCREMENT PRIMARY KEY,
    PlaceID INT,
    ImageURL VARCHAR(255),
    PhotoType ENUM('Official', 'Gallery') NOT NULL DEFAULT 'Gallery',
    FOREIGN KEY (PlaceID) REFERENCES Places(PlaceID)
);

-- Create SavedPlaces table
CREATE TABLE SavedPlaces (
    UserID INT,
    PlaceID INT,
    PRIMARY KEY (UserID, PlaceID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (PlaceID) REFERENCES Places(PlaceID)
);

-- Create Comments table
CREATE TABLE Comments (
    CommentID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    PlaceID INT,
    Comment TEXT,
    Timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (PlaceID) REFERENCES Places(PlaceID)
);

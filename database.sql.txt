--create driver feedback table
CREATE TABLE DriverFeedback (
  License_Plate_No VARCHAR(20) NOT NULL,
  Vehicle VARCHAR(50) NOT NULL,
  Driver_Name VARCHAR(50),
  Rating INT NOT NULL,
  category ENUM('Drunk', 'Good', 'Overspeeding', 'Reckless Driving','other') NOT NULL,
  Description TEXT,
  PRIMARY KEY (License_Plate_No)
);

--create accident report
CREATE TABLE AccidentReports (
  ReportID INT AUTO_INCREMENT PRIMARY KEY,
  ReportDateTime DATETIME NOT NULL,
  Location VARCHAR(100) NOT NULL,
  Description TEXT,
  VehicleLicensePlate VARCHAR(20) NOT NULL,
  VehicleType VARCHAR(50) NOT NULL,
  VehicleColor VARCHAR(50),
  DriverName VARCHAR(50) NOT NULL,
  DriverContact VARCHAR(50),
  DriverLicense VARCHAR(50),
  WitnessName VARCHAR(50),
  WitnessContact VARCHAR(50),
  Injuries TEXT,
  Damages TEXT,
  Photos VARCHAR(255),
  PoliceReportNumber VARCHAR(50),
  AdditionalComments TEXT
);

-- Create the Users table
CREATE TABLE Users (
  UserID INT AUTO_INCREMENT PRIMARY KEY,
  Username VARCHAR(50) NOT NULL UNIQUE,
  Password VARCHAR(255) NOT NULL,
  Email VARCHAR(100) NOT NULL UNIQUE
);

-- Create the Sessions table
CREATE TABLE Sessions (
  SessionID INT AUTO_INCREMENT PRIMARY KEY,
  UserID INT NOT NULL,
  SessionToken VARCHAR(255) NOT NULL,
  ExpirationTime DATETIME NOT NULL,
  FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

--user update road condition
CREATE TABLE RoadConditionUpdates (
  UpdateID INT AUTO_INCREMENT PRIMARY KEY,
  User VARCHAR(50) NOT NULL,
  Timestamp DATETIME NOT NULL,
  Location VARCHAR(100) NOT NULL,
  Description TEXT NOT NULL,
  Source ENUM('User', 'Server') NOT NULL,
  Picture VARCHAR(255)
);

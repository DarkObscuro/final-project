-- Create the raid_planner database
DROP DATABASE IF EXISTS raid_planner;
CREATE DATABASE raid_planner;
USE raid_planner;  -- MySQL command

-- create the tables
CREATE TABLE team (
  teamID       INT(11)        NOT NULL   AUTO_INCREMENT,
  teamName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (teamID)
);

CREATE TABLE raid (
  raidID        INT(11)        NOT NULL   AUTO_INCREMENT,
  teamID        INT(11),
  raidName      VARCHAR(255)   NOT NULL,
  raidDay       VARCHAR(255)   NOT NULL,
  raidStart     TIME           NOT NULL,
  raidEnd       TIME           NOT NULL,
  PRIMARY KEY (raidID),
  FOREIGN KEY (teamID) references team(teamID)
);

CREATE TABLE difficulty (
  difficultyID    INT(11)        NOT NULL   AUTO_INCREMENT,
  difficultyName  VARCHAR(255)   NOT NULL,
  PRIMARY KEY (difficultyID)
);

CREATE TABLE boss (
  bossID          INT(11)      NOT NULL   AUTO_INCREMENT,
  difficultyID    INT(11)      NOT NULL,
  bossName        VARCHAR(255) NOT NULL,
  bossHP          INT,
  bossScale       INT,
  PRIMARY KEY (bossID),
  FOREIGN KEY (difficultyID) references difficulty(difficultyID)
);

CREATE TABLE player (
  playerID        INT(11)        NOT NULL   AUTO_INCREMENT,
  teamID          INT(11),
  playerPseudo    VARCHAR(255)   NOT NULL,
  playerJob       VARCHAR(255)   NOT NULL,
  jobColor        VARCHAR(7)     NOT NULL,
  playerRole      VARCHAR(255)   NOT NULL,
  roleColor       VARCHAR(7)     NOT NULL,
  playerTitle     VARCHAR(255),
  playerFC        VARCHAR(255),
  PRIMARY KEY (playerID),
  FOREIGN KEY (teamID) references team(teamID)
);

CREATE TABLE raid_boss (
  raidID        INT(11),
  bossID        INT(11)        NOT NULL,
  FOREIGN KEY (raidID) references raid(raidID),
  FOREIGN KEY (bossID) references boss(bossID),
  PRIMARY KEY CLUSTERED (raidID, bossID)
);

-- insert data into the database
INSERT INTO difficulty VALUES
(1, 'Normal'),
(2, 'Hard'),
(3, 'Extreme'),
(4, 'Unreal'),
(5, 'Savage'),
(6, 'Ultimate');

INSERT INTO boss (difficultyID, bossName) VALUES
(1, 'Alphascape V1'),
(1, 'Alphascape V2'),
(1, 'Alphascape V3'),
(1, 'Alphascape V4'),
(5, 'Alphascape V1'),
(5, 'Alphascape V2'),
(5, 'Alphascape V3'),
(5, 'Alphascape V4'),
(6, 'The Unending Coil of Bahamut'),
(6, "The Weapon's Refrain"),
(6, 'The Epic of Alexander'),
(6, 'Dragonsong Reprise'),
(4, 'Containment Bay S1T7'),
(1, 'The Navel'),
(2, 'The Bowl of Embers'),
(3, 'The Seat of Sacrifice');
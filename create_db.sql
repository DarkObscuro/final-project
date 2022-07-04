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
  teamID        INT(11)        NOT NULL,
  raidDate      DATETIME       NOT NULL,
  PRIMARY KEY (raidID)
);

CREATE TABLE difficulty (
  difficultyID    INT(11)        NOT NULL   AUTO_INCREMENT,
  difficultyName  VARCHAR(255)   NOT NULL,
  PRIMARY KEY (difficultyID)
);

CREATE TABLE boss (
  bossID          INT(11)      NOT NULL   AUTO_INCREMENT,
  difficultyID    INT(11)      NOT NULL,
  raidID          INT(11),
  bossName        VARCHAR(255) NOT NULL,
  bossHP          INT,
  bossScale       INT,
  PRIMARY KEY (bossID)
);

CREATE TABLE player (
  playerID        INT(11)        NOT NULL   AUTO_INCREMENT,
  teamID          INT(11),
  playerPseudo    VARCHAR(255)   NOT NULL,
  playerJob       VARCHAR(255)   NOT NULL,
  playerTitle     VARCHAR(255),
  playerFC        VARCHAR(255),
  PRIMARY KEY (playerID)
);

-- Foreign keys
ALTER TABLE boss ADD CONSTRAINT boss_difficulty FOREIGN KEY (difficultyID) references difficulty(difficultyID);
ALTER TABLE raid ADD CONSTRAINT raid_team FOREIGN KEY (teamID) references team(teamID);
ALTER TABLE player ADD CONSTRAINT player_team FOREIGN KEY (teamID) references team(teamID);
ALTER TABLE boss ADD CONSTRAINT raid_boss FOREIGN KEY (raidID) references raid(raidID);

-- insert data into the database
INSERT INTO difficulty VALUES
(1, 'Normal'),
(2, 'Hard'),
(3, 'Extreme'),
(4, 'Unreal'),
(5, 'Savage'),
(6, 'Ultimate');

INSERT INTO boss (bossID, difficultyID, bossName) VALUES
(1, 5, 'Alphascape V4'),
(2, 6, 'Dragonsong Reprise'),
(3, 4, 'Containment Bay S1T7'),
(4, 1, 'The Navel'),
(5, 2, 'The Bowl of Embers'),
(6, 3, 'The Seat of Sacrifice');
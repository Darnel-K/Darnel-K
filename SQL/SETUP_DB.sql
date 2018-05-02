TRUNCATE TABLE `Darnel-K`.`Contact_Submissions`;

DROP TABLE `Darnel-K`.`Contact_Submissions`;

DROP DATABASE `Darnel-K`;

CREATE DATABASE `Darnel-K` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

CREATE TABLE `Darnel-K`.`Contact_Submissions` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `Full_Name` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(256) NOT NULL,
  `Subject` VARCHAR(64) NULL,
  `MSG` TEXT NOT NULL,
  `Slack_Sent` TINYINT NOT NULL DEFAULT 0,
  `Date_Added` DATE NOT NULL,
  PRIMARY KEY (`ID`),
  INDEX `CS_Email_FK` (`Email` ASC),
  INDEX `CS_Slack_Sent_FK` (`Slack_Sent` ASC),
  INDEX `CS_Date_Added_FK` (`Date_Added` ASC))
ENGINE = InnoDB
ROW_FORMAT = COMPRESSED;

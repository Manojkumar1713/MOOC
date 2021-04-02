SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--  Praveen
CREATE TABLE Staff (
  StaffID varchar(255) PRIMARY KEY, 
  Name varchar(255) NOT NULL,
  Password varchar(255) NOT NULL,
  Dept  varchar(255) NOT NULL,
  Email  varchar(255) NOT NULL,
  PhoneNo  varchar(255) NOT NULL 

);

-- Shibin
CREATE TABLE Course (
  CourseID varchar(255)  PRIMARY KEY, 
  Name varchar(255) NOT NULL,
  Dept  text NOT NULL,
  StaffID varchar(255),
  Duration  varchar(255) NOT NULL,
  ExpiryDate DATE,
  CompilerRequired boolean NOT NULL,
  CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID)
);

-- Karthik
CREATE TABLE Student (
 RegNo varchar(255) PRIMARY KEY,
  Password varchar(255) NOT NULL,
  Name varchar(255) NOT NULL,
  Dept  varchar(255) NOT NULL,
  Email  varchar(255) NOT NULL,
  CourseID varchar(255),
  PhoneNo  varchar(255) NOT NULL,
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID)
);

CREATE TABLE RegisteredCourse(
  id int PRIMARY KEY  AUTO_INCREMENT,
   CourseID varchar(255),
    RegNo varchar(255),
   CONSTRAINT FK_RegNo  FOREIGN KEY (RegNo) REFERENCES Students(RegNo),
   CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID)
);

CREATE TABLE StaffRegisteredCourse(
   CourseID varchar(255),
    StaffID varchar(255),
   CONSTRAINT FK_RegNo  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID),
   CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID)
);

CREATE TABLE Resources(
  ResourceID int PRIMARY KEY AUTO_INCREMENT,
  FilePath varchar(255),
  Unit varchar(255),
  VideoLink text,
  Topic text,
  CourseID varchar(255),
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID)
);

-- Changed
CREATE TABLE Quiz (       
  Qid int PRIMARY KEY  AUTO_INCREMENT,
  Unit varchar(255) NOT NULL,
  Topic varchar(255) NOT NULL,
  FilePath varchar(255),
  Qname text NOT NULL,
  opA text NOT NULL,
  opB text NOT NULL,
  opC text NOT NULL,
  opD text NOT NULL,
  correct text NOT NULL,
  correct2 text,
  correct3 text,
  QuestionType varchar(255),
  CourseID varchar(255),
  StaffID varchar(255),
  CONSTRAINT FK_RegNo  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID),
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID)
);

CREATE TABLE Chat (
   id int PRIMARY KEY AUTO_INCREMENT,
  CourseID varchar(255), 
  StaffID varchar(255),
  RegNo varchar(255),
  ques text NOT NULL,
  date1 Timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
  CONSTRAINT FK_RegNo  FOREIGN KEY (RegNo) REFERENCES Students(RegNo),
  CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID) 
);
-- Changed
CREATE TABLE TrueFalse (
   id int PRIMARY KEY AUTO_INCREMENT,
  CourseID varchar(255), 
  StaffID varchar(255),
  unit varchar(255),
  Topic varchar(255) NOT NULL,
  ques text NOT NULL,
  opA varchar(255) NOT NULL,
  opB varchar(255) NOT NULL,
  ans varchar(255) NOT NULL,
  QuestionType varchar(255),
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
  CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID)
);
-- Changed


CREATE TABLE ShortAns (
   id int PRIMARY KEY AUTO_INCREMENT,
  CourseID varchar(255), 
  StaffID varchar(255),
  unit varchar(255),
  Topic varchar(255) NOT NULL,
  ques text NOT NULL,
  Ans varchar(255) NOT NULL,
  QuestionType varchar(255),
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
  CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID)
);
-- Changed


CREATE TABLE FileTypeQuestion (
   id int PRIMARY KEY AUTO_INCREMENT,
  CourseID varchar(255), 
  StaffID varchar(255),
  unit varchar(255),
  Topic varchar(255) NOT NULL,
  ques text NOT NULL,
  QuestionType varchar(255),
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
  CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID)
);

CREATE TABLE question (
  id int PRIMARY KEY AUTO_INCREMENT,
  input varchar(100) NOT NULL,
  output varchar(100) NOT NULL,
  format text NOT NULL,
  t1in varchar(100) NOT NULL,
  t1out varchar(1000) NOT NULL,
  t2in varchar(100) NOT NULL,
  t2out varchar(100) NOT NULL,
  ques varchar(500) NOT NULL,
  title varchar(100) NOT NULL,
  Number varchar(100) NOT NULL,
  language varchar(255) NOT NULL,
  StaffID varchar(255),
  CourseID varchar(255), 
  StartTime Bigint,
  ExpiryTime Bigint,
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
  CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID)
);

CREATE TABLE AssignmentQuiz (       
  Qid int PRIMARY KEY  AUTO_INCREMENT,
  Topic varchar(255) NOT NULL,
  FilePath varchar(255),
  Qname text NOT NULL,
  opA text NOT NULL,
  opB text NOT NULL,
  opC text NOT NULL,
  opD text NOT NULL,
  correct text NOT NULL,
  correct2 text,
  correct3 text,
  QuestionType varchar(255),
  CourseID varchar(255),
  StaffID varchar(255),
  CONSTRAINT FK_RegNo  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID),
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID)
  
);

CREATE TABLE AssignmentTrueFalse (
   id int PRIMARY KEY AUTO_INCREMENT,
  CourseID varchar(255), 
  StaffID varchar(255),
  topic varchar(255),
  ques text NOT NULL,
  opA varchar(255) NOT NULL,
  opB varchar(255) NOT NULL,
  ans varchar(255) NOT NULL,
  QuestionType varchar(255),
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
  CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID)
);
-- Changed


CREATE TABLE AssignmentShortAns (
  id int PRIMARY KEY AUTO_INCREMENT,
  CourseID varchar(255), 
  StaffID varchar(255),
  topic varchar(255),
  ques text NOT NULL,
  Ans varchar(255) NOT NULL,
  QuestionType varchar(255),
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
  CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID)
);
-- Changed


CREATE TABLE AssignmentFileTypeQuestion (
  id int PRIMARY KEY AUTO_INCREMENT,
  CourseID varchar(255), 
  StaffID varchar(255),
  topic varchar(255),
  ques text NOT NULL,
  QuestionType varchar(255),
  CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
  CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID)
);
CREATE TABLE StudentMark (
studentMarkId int PRIMARY KEY AUTO_INCREMENT,
CourseID varchar(255), 
StaffID varchar(255),
RegNo varchar(255),
questionid int NOT NULL,
Mark int NOT NULL,
CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
CONSTRAINT FK_RegNo  FOREIGN KEY (RegNo) REFERENCES Students(RegNo),
CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID)
);
CREATE TABLE Topic (
TopicID int PRIMARY KEY AUTO_INCREMENT,
CourseID varchar(255), 
StaffID varchar(255),
unit varchar(255),
topic varchar(255),
QuestionType varchar(255),
StartTime Bigint,
ExpiryTime Bigint,
CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID)
);

CREATE TABLE AssignTopic (
TopicID int PRIMARY KEY AUTO_INCREMENT,
CourseID varchar(255), 
StaffID varchar(255),
unit varchar(255),
topic varchar(255),
QuestionType varchar(255),
StartTime Bigint,
ExpiryTime Bigint,
CONSTRAINT FK_CourseID  FOREIGN KEY (CourseID) REFERENCES Courses(CourseID),
CONSTRAINT FK_StaffID  FOREIGN KEY (StaffID) REFERENCES Staffs(StaffID)
);


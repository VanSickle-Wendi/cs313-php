CREATE TABLE speaker (
   id SERIAL PRIMARY KEY,
   name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE conference (
   id SERIAL PRIMARY KEY,
   month VARCHAR(10) NOT NULL,
   year INT NOT NULL,
   session VARCHAR(20) NOT NULL
);

CREATE TABLE username (
   id SERIAL PRIMARY KEY,
   name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE talk (
   id SERIAL PRIMARY KEY,
   title VARCHAR (50) NOT NULL,
   speaker_id INT NOT NULL REFERENCES speaker(id),
   conference_id INT NOT NULL REFERENCES conference(id)
);

CREATE TABLE note (
   id SERIAL PRIMARY KEY,
   comment TEXT NOT NULL,
   username_id INT NOT NULL REFERENCES username(id),
   talk_id INT NOT NULL REFERENCES talk(id)
);

INSERT INTO speaker (name)
   VALUES ('M. Russell Ballard'),
   ('Dieter F. Uchtdorf'),
   ('Jean B. Bingham');

INSERT INTO conference (month, year, session)
   VALUES ('April', 2019, 'Sunday Morning'),
   ('October', 2018, 'Saturday Afternoon'),
   ('April', 2018, 'Sunday Morning');

INSERT INTO username (name)
   VALUES ('Mary'),
   ('Jim'),
   ('Crystal');

INSERT INTO talk (title, speaker_id, conference_id)
   VALUES ('The True, Pure, and Simple Gospel of Jesus Christ', 1, 1),
   ('Believe, Love, Do', 2, 2),
   ('Ministering as the Savior Does', 3, 3);

INSERT INTO note (comment, username_id, talk_id)
   VALUES ('I loved this talk!', 1, 1),
   ('He is my favorite!', 2, 2),
   ('This helped me greatly', 3, 3);

SELECT note.comment, talk.title, speaker.name, username.name 
FROM note LEFT JOIN talk ON note.talk_id = talk.id
   LEFT JOIN speaker ON talk.speaker_id = speaker.id
   LEFT JOIN username ON note.username_id = username.id
   WHERE talk.id = 1;
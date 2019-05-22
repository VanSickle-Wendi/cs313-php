CREATE TABLE speaker (
   id SERIAL PRIMARY KEY,
   name VARCHAR(50) NOT NULL UNIQUE,
   title VARCHAR(50) NOT NULL
);

CREATE TABLE conference (
   id SERIAL PRIMARY KEY,
   month VARCHAR(10) NOT NULL,
   year INT NOT NULL,
   speaker_id INT NOT NULL REFERENCES speaker(id)
);

CREATE TABLE note (
   id SERIAL PRIMARY KEY,
   username VARCHAR(50) NOT NULL,
   comment TEXT NOT NULL,
   speaker_id INT NOT NULL REFERENCES speaker(id),
   conference_id INT NOT NULL REFERENCES conference(id)
);

INSERT INTO speaker (name, title)
   VALUES ('M. Russell Ballard', 'The True, Pure, and Simple Gospel of Jesus Christ'),
   ('Dieter F. Uchtdorf', 'Believe, Love, Do'),
   ('Jean B. Bingham', 'Ministering as the Savior Does');

INSERT INTO conference (month, year, speaker_id)
   VALUES ('April', 2019, 1),
   ('October', 2018, 2),
   ('April', 2018, 3);
   
INSERT INTO note (username, comment, speaker_id, conference_id)
   VALUES ('Mary', 'I loved this talk!', 1, 1),
   ('Jim', 'He is my favorite!', 2, 2),
   ('Crystal', 'This helped me greatly', 3, 3);

SELECT * FROM speaker
   JOIN conference ON conference.speaker_id = speaker.id
   JOIN note ON note.speaker_id = speaker.id;

SELECT name, title FROM speaker
   JOIN conference ON conference.speaker_id = speaker.id
   JOIN note ON note.speaker_id = speaker.id;

SELECT * FROM speaker
   LEFT OUTER JOIN conference ON (conference.speaker_id = speaker.id)
   LEFT OUTER JOIN note ON (note.speaker_id = speaker.id);
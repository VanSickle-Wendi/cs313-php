CREATE TABLE scriptures (
   id SERIAL PRIMARY KEY,
   book VARCHAR(50) NOT NULL,
   chapter INT NOT NULL,
   verse INT NOT NULL,
   content TEXT
);

CREATE TABLE topic (
   id SERIAL PRIMARY KEY,
   name VARCHAR(50) NOT NULL
);

INSERT INTO topic (name)
   VALUES ('Faith'), ('Sacrifice'), ('Charity');

CREATE TABLE scriptures_topic (
   scriptures_id INT REFERENCES scriptures(id),
   topic_id INT REFERENCES topic(id)
);

INSERT INTO scriptures_topic (scriptures_id, topic_id)
   VALUES (1,1),
          (2,3),
          (3,1),
          (4,2);

SELECT * FROM scriptures 
   JOIN scriptures_topic ON scriptures.id = scriptures_topic.scriptures_id
   JOIN topic ON topic.id = scriptures_topic.topic_id WHERE topic.id = 1;

INSERT INTO scriptures (book, chapter, verse, content) 
   VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO scriptures (book, chapter, verse, content) 
   VALUES ('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO scriptures (book, chapter, verse, content)
   VALUES ('Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

INSERT INTO scriptures (book, chapter, verse, content)
   VALUES ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

SELECT book, chapter, verse, content FROM scriptures;
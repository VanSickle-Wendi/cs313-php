CREATE TYPE TEMPO_TYPE AS ENUM('slow', 'medium', 'fast');
CREATE TYPE GENRE_TYPE AS ENUM('folk', '40s', '50s', '60s', 'country', 'old country', 'rock', 'religious');
CREATE TYPE BACKGROUND_TYPE AS ENUM('guitar', 'karaoke');
CREATE TYPE PART_TYPE AS ENUM('second_alto', 'alto', 'soprano', 'all');

CREATE TABLE singer (
   id SERIAL PRIMARY KEY,
   singer_name VARCHAR(50) NOT NULL UNIQUE,
   part PART_TYPE NOT NULL,
   fav_song VARCHAR(50) NOT NULL,
   experience TEXT NOT NULL
);

CREATE TABLE song (
   id SERIAL PRIMARY KEY,
   title VARCHAR(50) NOT NULL UNIQUE,
   tempo TEMPO_TYPE NOT NULL,
   genre GENRE_TYPE,
   background BACKGROUND_TYPE,
   orig_artist VARCHAR(50),
   release_date DATE,
   lead_singer INT REFERENCES singer(id)
);

CREATE TABLE venue (
   id SERIAL PRIMARY KEY,
   venue_name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE performance (
   id SERIAL PRIMARY KEY,
   date DATE NOT NULL,
   time TIME NOT NULL,
   venue_id INT REFERENCES venue(id),
   booked BOOLEAN NOT NULL
);

CREATE TABLE songSuggest (
   id SERIAL PRIMARY KEY,
   song_title VARCHAR(50) NOT NULL,
   artist VARCHAR(50) NOT NULL   
);


INSERT INTO songSuggest (song_title, artist)
   VALUES ('Let It Be Me', 'The Everly Brothers');

SELECT * FROM performance AS p JOIN venue AS v ON p.venue_id = v.id;

INSERT INTO venue (venue_name)
     VALUES ('Meridian SC'),
            ('Affinity'),
            ('Mallard Pointe'),
            ('Creekside'),
            ('Touchmark'),
            ('Prestige'),
            ('Nampa FM');

INSERT INTO performance (date, time, venue_id, booked)
     VALUES ('5/7/2019', '11:00', 1, 'yes'),
            ('5/14/2019', '05:00', 2, 'yes'),
            ('5/24/2019', '01:00', 3, 'yes'),
            ('5/30/2019', '03:00', 4, 'yes');


SELECT * FROM song AS s JOIN singer AS si ON s.lead_singer = si.id ORDER BY title;

INSERT INTO song(title, tempo, genre, background, lead_singer)
     VALUES ('American Dream', 'medium', 'country', 'guitar', 3),
            ('Blue to the Bone', 'medium', 'country', 'guitar', 4),
            ('Bye Bye Baby Blues', 'medium', 'country', 'guitar', 4),
            ('Feelin'' Kinda Lonely', 'medium', 'country', 'guitar', 2),
            ('For Baby', 'slow', 'country', 'guitar', 4),
            ('Heartbreak Hill', 'fast', 'country', 'guitar', 4),
            ('I''ll Fly Away', 'medium', 'old country', 'guitar', 4),
            ('Jambalaya', 'fast', 'old country', 'guitar', 4),
            ('Just in Case', 'fast', 'country', 'guitar', 4),
            ('Little Green Valley', 'medium', 'old country', 'guitar', 1),
            ('Place in the Choir', 'fast', 'country', 'guitar', 4),
            ('Sentimental Old You', 'medium', 'country', 'guitar', 4),
            ('Silver Haired Daddy', 'slow', 'old country', 'guitar', 4),
            ('Sweetest Gift', 'medium', 'country', 'guitar', 3),
            ('The Happy Wanderer', 'medium', 'old country', 'guitar', 4),
            ('Those Memories', 'medium', 'country', 'guitar', 3);



INSERT INTO song(title, tempo, genre, background, lead_singer)
     VALUES ('All I Have to Do Is Dream', 'slow', 'old country', 'karaoke', 4),
            ('Amazed', 'slow', 'country', 'karaoke', 3),
            ('At Last', 'slow', 'country', 'karaoke', 3),
            ('Best of My Love', 'slow', 'rock', 'karaoke', 2),
            ('Blue', 'slow', 'country', 'karaoke', 3),
            ('Crazy', 'slow', 'old country', 'karaoke', 2),
            ('Devoted to You', 'slow', 'old country', 'karaoke', 1),
            ('Dream a Little Dream', 'slow', '60s', 'karaoke', 1),
            ('Eddie My Love', 'slow', '50s', 'karaoke', 2),
            ('Fernando', 'slow', 'rock', 'karaoke', 4),
            ('From This Moment', 'slow', 'country', 'karaoke', 4),
            ('Grandpa', 'slow', 'country', 'karaoke', 4),
            ('Good Night Sweetheart', 'slow', '40s', 'karaoke', 4),
            ('Hallelujah', 'slow', 'rock', 'karaoke', 4),
            ('I Fall to Pieces', 'slow', 'old country', 'karaoke', 2),
            ('I Fell In Love Again Last Night', 'slow', 'country', 'karaoke', 1),
            ('I''d Choose You Again', 'slow', 'country', 'karaoke', 3),
            ('Leaving on Your Mind', 'slow', 'country', 'karaoke', 2),
            ('Sincerely', 'slow', '40s', 'karaoke', 3),
            ('Under the Boardwalk', 'slow', '60s', 'karaoke', 3),
            ('Walkin'' After Midnight', 'slow', 'old country', 'karaoke', 2),
            ('Waltz Across Texas', 'slow', 'old country', 'karaoke', 3),
            ('Wayfaring Stranger', 'slow', 'religious', 'karaoke', 4);

INSERT INTO song(title, tempo, genre, background, lead_singer)
     VALUES ('Blame it on Your Heart', 'medium', 'country', 'karaoke', 2),
            ('Blue Moon of Kentucky', 'medium', 'old country', 'karaoke', 2),
            ('Bye Bye Love', 'medium', '50s', 'karaoke', 4),
            ('Drift Away', 'medium', 'rock', 'karaoke', 2),
            ('I Can Help', 'medium', 'rock', 'karaoke', 3),
            ('Keep on the Sunnyside', 'medium', 'old country', 'karaoke', 1),
            ('Let Your Love Flow', 'medium', 'rock', 'karaoke', 2),
            ('My Next Broken Heart', 'medium', 'country', 'karaoke', 3),
            ('No One Needs to Know', 'medium', 'country', 'karaoke', 3),
            ('Past the Point of Rescue', 'medium', 'country', 'karaoke', 2),
            ('Pontoon', 'medium', 'country', 'karaoke', 2),
            ('Singing the Blues', 'medium', 'old country', 'karaoke', 3),
            ('Till I Kissed You', 'medium', '50s', 'karaoke', 2),
            ('Turn It Loose', 'medium', 'country', 'karaoke', 2),
            ('Walk Right Back', 'medium', 'country', 'karaoke', 4),
            ('When Will I Be Loved', 'medium', 'country', 'karaoke', 3),
            ('You''re So Fine', 'medium', '50s', 'karaoke', 2);

INSERT INTO song(title, tempo, genre, background, lead_singer)
     VALUES ('Boot Scootin'' Boogie', 'fast', 'country', 'karaoke', 2),
            ('Cotton Fields', 'fast', '60s', 'karaoke', 2),
            ('Down at the Twist and Shout', 'fast', 'country', 'karaoke', 3),
            ('Down on the Corner', 'fast', '60s', 'karaoke', 2),
            ('Have Mercy', 'fast', 'country', 'karaoke', 4),
            ('I Fought the Law', 'fast', '60s', 'karaoke', 2),
            ('I Saw Him Standing There', 'fast', '60s', 'karaoke', 3),
            ('Johnny B. Good', 'fast', '50s', 'karaoke', 4),
            ('Let''s Dance', 'fast', '60s', 'karaoke', 2),
            ('Oh Lonesome Me', 'fast', 'country', 'karaoke', 3),
            ('Queen of Hearts', 'fast', 'country', 'karaoke', 2),
            ('Race is On, The', 'fast', 'old country', 'karaoke', 3),
            ('Rock This Town', 'fast', 'rock', 'karaoke', 2),
            ('Rockytop', 'fast', 'old country', 'karaoke', 4),
            ('Timber', 'fast', 'country', 'karaoke', 4),
            ('Twist, The', 'fast', '60s', 'karaoke', 3),
            ('You Never Can Tell', 'fast', '60s', 'karaoke', 4);


INSERT INTO singer(singer_name, part, fav_song, experience)
     VALUES ('Beverly', 'second_alto', 'You Never Can Tell', 'Beverly grew up singing with her twin sister. She sang in a group with several women performing oldies. Beverly taught her twin daughters to sing and performs with them today.'),
            ('Shannon', 'alto', 'You''re So Fine', 'Shannon grew up singing with her twin sister and their mom. She has been singing in a dance band for more than 29 years. Today, she performs most often with her mom and twin sister.'),
            ('Wendi', 'soprano', 'No One Needs to Know', 'Wendi grew up singing with her twin sister and their mom. She has been singing in a dance band for more than 29 years. Today, she performs most often with her mom and twin sister. Does this sound familiar?'),
            ('All', 'all', 'All of them', 'The group currently performs about once per week.');


SELECT *
    FROM song LEFT JOIN singer ON song.lead_singer = singer.id;

UPDATE song SET orig_artist = 'The Everly Brothers', release_date = '4/01/1958' WHERE id = 17;
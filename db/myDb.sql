CREATE TYPE TEMPO_TYPE AS ENUM('slow', 'medium', 'fast');
CREATE TYPE GENRE_TYPE AS ENUM('folk', '40s', '50s', '60s', 'country', 'old country', 'rock', 'religious');
CREATE TYPE BACKGROUND_TYPE AS ENUM('guitar', 'karaoke');

CREATE TABLE song (
   id SERIAL PRIMARY KEY,
   title VARCHAR(50) NOT NULL UNIQUE,
   tempo TEMPO_TYPE NOT NULL,
   genre GENRE_TYPE NOT NULL,
   background BACKGROUND_TYPE NOT NULL,
   first_chord VARCHAR(20),
   song_key VARCHAR(5)
);

CREATE TYPE PART_TYPE AS ENUM('second alto', 'alto', 'soprano');

CREATE TABLE singer (
   id SERIAL PRIMARY KEY,
   singer_name VARCHAR(50) NOT NULL UNIQUE,
   part PART_TYPE NOT NULL,
   experience TEXT NOT NULL,
   fav_song INT REFERENCES song(id),
   lead_singer INT REFERENCES song(id)
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

insert into song(title, tempo, genre, background, first_chord)
     values ('American Dream', 'medium', 'country', 'guitar', 'D'),
            ('Blue to the Bone', 'medium', 'country', 'guitar', 'D'),
            ('Bye Bye Baby Blues', 'medium', 'country', 'guitar', 'D'),
            ('Feelin'' Kinda Lonely', 'medium', 'country', 'guitar', 'A Capo 1st Fret'),
            ('For Baby', 'slow', 'country', 'guitar', 'D'),
            ('Heartbreak Hill', 'fast', 'country', 'guitar', 'D'),
            ('I''ll Fly Away', 'medium', 'old country', 'guitar', 'D'),
            ('Jambalaya', 'fast', 'old country', 'guitar', 'G'),
            ('Just in Case', 'fast', 'country', 'guitar', 'D Capo 1st Fret'),
            ('Little Green Valley', 'medium', 'old country', 'guitar', 'A'),
            ('Place in the Choir', 'fast', 'country', 'guitar', 'A Capo 3rd Fret'),
            ('Sentimental Old You', 'medium', 'country', 'guitar', 'A'),
            ('Silver Haired Daddy', 'slow', 'old country', 'guitar', 'A'),
            ('Sweetest Gift', 'medium', 'country', 'guitar', 'A'),
            ('The Happy Wanderer', 'medium', 'old country', 'guitar', 'A'),
            ('Those Memories', 'medium', 'country', 'guitar', 'A Capo 1st Fret');


insert into song(title, tempo, genre, background)
     values ('All I Have to Do Is Dream', 'slow', 'old country', 'karaoke'),
            ('Amazed', 'slow', 'country', 'karaoke'),
            ('At Last', 'slow', 'country', 'karaoke'),
            ('Best of My Love', 'slow', 'rock', 'karaoke'),
            ('Blue', 'slow', 'country', 'karaoke'),
            ('Crazy', 'slow', 'old country', 'karaoke'),
            ('Devoted to You', 'slow', 'old country', 'karaoke'),
            ('Dream a Little Dream', 'slow', '60s', 'karaoke'),
            ('Eddie My Love', 'slow', '50s', 'karaoke'),
            ('Fernando', 'slow', 'rock', 'karaoke'),
            ('From This Moment', 'slow', 'country', 'karaoke'),
            ('Grandpa', 'slow', 'country', 'karaoke'),
            ('Good Night Sweetheart', 'slow', '40s', 'karaoke'),
            ('Hallelujah', 'slow', 'rock', 'karaoke'),
            ('I Fall to Pieces', 'slow', 'old country', 'karaoke'),
            ('I Fell In Love Again Last Night', 'slow', 'country', 'karaoke'),
            ('I''d Choose You Again', 'slow', 'country', 'karaoke'),
            ('Leaving on Your Mind', 'slow', 'country', 'karaoke'),
            ('Sincerely', 'slow', '40s', 'karaoke'),
            ('Under the Boardwalk', 'slow', '60s', 'karaoke'),
            ('Walkin'' After Midnight', 'slow', 'old country', 'karaoke'),
            ('Waltz Across Texas', 'slow', 'old country', 'karaoke'),
            ('Wayfaring Stranger', 'slow', 'religious', 'karaoke');

insert into song(title, tempo, genre, background)
     values ('Blame it on Your Heart', 'medium', 'country', 'karaoke'),
            ('Blue Moon of Kentucky', 'medium', 'old country', 'karaoke'),
            ('Bye Bye Love', 'medium', '50s', 'karaoke'),
            ('Drift Away', 'medium', 'rock', 'karaoke'),
            ('I Can Help', 'medium', 'rock', 'karaoke'),
            ('Keep on the Sunnyside', 'medium', 'old country', 'karaoke'),
            ('Let Your Love Flow', 'medium', 'rock', 'karaoke'),
            ('My Next Broken Heart', 'medium', 'country', 'karaoke'),
            ('No One Needs to Know', 'medium', 'country', 'karaoke'),
            ('Past the Point of Rescue', 'medium', 'country', 'karaoke'),
            ('Pontoon', 'medium', 'country', 'karaoke'),
            ('Singing the Blues Sweetheart', 'medium', 'old country', 'karaoke'),
            ('Till I Kissed You', 'medium', '50s', 'karaoke'),
            ('Turn It Loose', 'medium', 'country', 'karaoke'),
            ('Walk Right Back', 'medium', 'country', 'karaoke'),
            ('When Will I Be Loved', 'medium', 'country', 'karaoke'),
            ('You''re So Fine', 'medium', '50s', 'karaoke');

insert into song(title, tempo, genre, background)
     values ('Boot Scootin'' Boogie', 'fast', 'country', 'karaoke'),
            ('Cotton Fields', 'fast', '60s', 'karaoke'),
            ('Down at the Twist and Shout', 'fast', 'country', 'karaoke'),
            ('Down on the Corner', 'fast', '60s', 'karaoke'),
            ('Have Mercy', 'fast', 'country', 'karaoke'),
            ('I Fought the Law', 'fast', '60s', 'karaoke'),
            ('I Saw Him Standing There', 'fast', '60s', 'karaoke'),
            ('Johnny B. Good', 'fast', '50s', 'karaoke'),
            ('Let''s Dance', 'fast', '60s', 'karaoke'),
            ('Oh Lonesome Me', 'fast', 'country', 'karaoke'),
            ('Queen of Hearts', 'fast', 'country', 'karaoke'),
            ('Race is On, The', 'fast', 'old country', 'karaoke'),
            ('Rock This Town', 'fast', 'rock', 'karaoke'),
            ('Rockytop', 'fast', 'old country', 'karaoke'),
            ('Timber', 'fast', 'country', 'karaoke'),
            ('Twist, The', 'fast', '60s', 'karaoke'),
            ('You Never Can Tell', 'fast', '60s', 'karaoke');






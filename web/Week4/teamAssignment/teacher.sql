CREATE TABLE users
(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL
);

CREATE TABLE public.speaker
(
	id SERIAL NOT NULL PRIMARY KEY,
	name VARCHAR(100) NOT NULL
);

CREATE TABLE public.conference
(
	id SERIAL NOT NULL PRIMARY KEY,
	year SMALLINT NOT NULL,
	is_spring BOOLEAN NOT NULL
);

CREATE TABLE public.notes
(
	id SERIAL NOT NULL PRIMARY KEY,
	users_id INT NOT NULL REFERENCES public.users(id),
	speaker_id INT NOT NULL REFERENCES public.speaker(id),
	conference_id INT NOT NULL REFERENCES public.conference(id),
	notes_text TEXT NOT NULL
);
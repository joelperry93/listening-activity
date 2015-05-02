CREATE TABLE artist(
    id INTEGER PRIMARY KEY,  
    name TEXT NOT NULL, 
    date_added DATE DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE weekly_listening_activity( 
    artist_id INTEGER NOT NULL,  
    plays INTEGER NOT NULL, 
    date DATE, 

    FOREIGN KEY (artist_id) REFERENCES Artist(id)
);
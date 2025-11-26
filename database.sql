CREATE TABLE judges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE scores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judge_id INT,
    group_number INT,
    criteria1 INT,
    criteria2 INT,
    criteria3 INT,
    criteria4 INT,
    total INT,
    comments TEXT
);

CREATE TABLE group_averages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    group_number INT,
    avg_score FLOAT,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS students (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128),
    birth_date DATE
);

CREATE TABLE IF NOT EXISTS phones (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    area_code CHAR(2),
    number CHAR(9),
    student_id INTEGER,
    FOREIGN KEY(student_id) REFERENCES students(id)
);

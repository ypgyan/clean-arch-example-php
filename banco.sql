CREATE TABLE students cpf TEXT PRIMARY_KEY, name TEXT, email TEXT;

CREATE TABLE phones (ddd TEXT, number TEXT, student_cpf TEXT, PRIMARY KEY(ddd,number), FOREIGN KEY(student_cpf) REFERENCES students(cpf));

CREATE TABLE recommendations(
    recommender_cpf TEXT,
    recommended_cpf TEXT,
    recommendation_date TEXT,
    PRIMARY KEY
(
    recommender_cpf,
    recommended_cpf
)
    );
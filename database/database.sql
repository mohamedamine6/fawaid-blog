CREATE DATABASE fawaid_blog;
USE fawaid_blog;

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

INSERT INTO categories (name)
VALUES
('الفواكه'),
('الأعشاب'),
('التغذية'),


CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    image VARCHAR(255),
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (category_id)
    REFERENCES categories(id)
);

INSERT INTO posts (title, content, image, category)
VALUES
('فوائد الموز', 'الموز يحتوي على فيتامينات مهمة للجسم...', 'banane.jpg', 'الفواكه'),
('فوائد الثوم', 'الثوم يقوي المناعة ويقتل البكتيريا...', 'garlic.jpg', 'الأعشاب'),
('فوائد العسل', 'العسل مصدر طبيعي للطاقة...', 'honey.jpg', 'التغذية');

SHOW CREATE TABLE posts;
ALTER DATABASE fawaid_blog CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
ALTER TABLE posts CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    password VARCHAR(255)
);

INSERT INTO admins (email, password)
VALUES ('admin@gmail.com', 'admin');


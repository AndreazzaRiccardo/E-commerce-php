CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
);

-- Inserimento delle categories
INSERT INTO categories (name) VALUES
('Giochi'),
('Cibo'),
('Casa');

-- Creazione della tabella prodotti
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10, 2),
    description TEXT,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Inserimento dei products con valori Faker
INSERT INTO products (name, price, description, category_id) VALUES
('Pallone da calcio', RAND()*100, 'Pallone professionale per il calcio', 1),
('Monopoli', RAND()*100, 'Gioco da tavolo classico', 1),
('Pasta', RAND()*10, 'Pasta italiana di alta qualità', 2),
('Carne', RAND()*20, 'Carne fresca di manzo', 2),
('Sedia', RAND()*50, 'Sedia ergonomica per ufficio', 3),
('Tavolo', RAND()*100, 'Tavolo da pranzo in legno massiccio', 3),
('Libro', RAND()*30, 'Romanzo bestseller del New York Times', 1),
('Lampada', RAND()*50, 'Lampada da tavolo moderna', 3),
('Cuscino', RAND()*20, 'Cuscino decorativo per divano', 3),
('Sapone', RAND()*5, 'Sapone liquido idratante', 3);
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
);

-- Inserimento delle categories
INSERT INTO categories (name) VALUES
('Giochi'),
('Cibo'),
('Casa');

-- Creazione della tabella prodotti con campo per il percorso delle immagini
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10, 2),
    description TEXT,
    category_id INT,
    image_path VARCHAR(255), -- Nuovo campo per il percorso delle immagini
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

-- Inserimento dei prodotti con i percorsi delle immagini impostati su NULL
INSERT INTO products (name, price, description, category_id, image_path) VALUES
('Pallone da calcio', RAND()*100, "Pallone professionale per il calcio, realizzato con materiali di alta qualità e testato per resistere alle sfide del gioco. Ideale per gli appassionati del calcio che cercano un tocco professionale durante le partite.", 1, "public/imgs/pallone.jpg"),
('Monopoli', RAND()*100, "Il classico gioco da tavolo Monopoli, con grafica vivace e componenti di alta qualità. Promette ore di divertimento senza fine per giocatori di tutte le età, con la possibilità di costruire il proprio impero immobiliare e diventare il magnate più ricco della città.", 1, "public/imgs/monopoli.jpg"),
('Pasta', RAND()*10, "Selezione di pasta italiana di prima qualità, realizzata con semola di grano duro e lavorata secondo tradizioni secolari. Perfetta per preparare piatti tradizionali italiani o creare ricette innovative, offre un'esperienza culinaria autentica e appagante.", 2, "public/imgs/pasta.jpg"),
('Carne', RAND()*20, 'Carne di manzo fresca e selezionata, tagliata con cura dai migliori tagli e ricca di sapore e succosità. Ideale per grigliate estive, arrosti invernali o piatti tradizionali, soddisferà anche i palati più esigenti e appassionati di cucina.', 2, "public/imgs/carne.jpg"),
('Sedia', RAND()*50, 'Sedia ergonomica per ufficio, progettata con cura per promuovere una postura corretta e prevenire affaticamento e tensioni. Offre un comfort ottimale durante lunghe sessioni di lavoro, con materiali di alta qualità e un design elegante.', 3, "public/imgs/sedia.jpg"),
('Tavolo', RAND()*100, 'Tavolo da pranzo in legno massiccio, realizzato con maestria artigianale e materiali pregiati. Aggiunge un tocco di calore e bellezza a qualsiasi sala da pranzo, pronto ad accogliere cene indimenticabili e momenti condivisi per anni a venire.', 3, "public/imgs/tavolo.jpg"),
('Libro', RAND()*30, 'Romanzo bestseller del New York Times, con una trama avvincente, personaggi indimenticabili e colpi di scena mozzafiato. Perfetto per gli amanti della lettura in cerca di un nuovo mondo da esplorare e avventure epiche.', 1, "public/imgs/libro.jpg"),
('Lampada', RAND()*50, "Lampada da tavolo contemporanea, con un design elegante e minimalista. Illumina ogni spazio con una luce calda e diffusa, perfetta per creare un'atmosfera accogliente e rilassante in soggiorni, camere da letto o studi.", 3, "public/imgs/lampada.jpg"),
('Cuscino', RAND()*20, 'Cuscino decorativo per divano, realizzato con tessuti di alta qualità e riempito con materiale soffice e soffice. Offre un sostegno ottimale e un aspetto accattivante, ideale per abbellire qualsiasi ambiente e rendere ogni momento di relax ancora più piacevole.', 3, "public/imgs/cuscino.jpg"),
('Sapone', RAND()*5, 'Sapone liquido idratante, arricchito con ingredienti nutrienti e oli essenziali. Deterge delicatamente mentre idrata e lenisce la pelle, adatto a un uso quotidiano per una pelle morbida e radiosa.', 3, "public/imgs/sapone.jpg");


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
('Sapone', RAND()*5, 'Sapone liquido idratante, arricchito con ingredienti nutrienti e oli essenziali. Deterge delicatamente mentre idrata e lenisce la pelle, adatto a un uso quotidiano per una pelle morbida e radiosa.', 3, "public/imgs/sapone.jpg"),
('Set da campeggio', RAND()*150, "Set completo per il campeggio, include tenda, sacco a pelo, fornello portatile e altri accessori essenziali. Ideale per avventure all'aperto e notti sotto le stelle con amici e familiari.", 3, 'public/imgs/set_campeggio.jpg'),
('Parrucchiere per bambini', RAND()*50, 'Parrucchiere giocattolo realistico per bambini, include asciugacapelli, pettini, forbici giocattolo e altri accessori. Perfetto per i piccoli che amano immaginare di essere parrucchieri!', 1, 'public/imgs/parrucchiere_bambini.jpg'),
('Kit da giardinaggio', RAND()*80, 'Kit completo da giardinaggio per principianti, include attrezzi da giardinaggio essenziali come pala, forca, rastrello e guanti protettivi. Perfetto per avviare il tuo giardino domestico!', 3, 'public/imgs/kit_giardinaggio.jpg'),
('Kit per la costruzione di aeroplani', RAND()*100, "Kit di modellismo per la costruzione di aeroplani, include pezzi prefabbricati, colla e vernici. Ideale per gli amanti dell'aviazione e del modellismo.", 1, 'public/imgs/kit_aeroplani.jpg'),
('Set di penne colorate', RAND()*20, 'Set di penne colorate a punta fine, ideale per disegnare, scrivere e prendere appunti. Include una varietà di colori brillanti per esprimere la tua creatività!', 1, 'public/imgs/penne_colorate.jpg'),
('Album fotografico', RAND()*30, 'Album fotografico elegante e resistente, perfetto per conservare i tuoi ricordi più preziosi. Può contenere un gran numero di foto e include pagine protettive per preservarle nel tempo.', 3, 'public/imgs/album_fotografico.jpg'),
('Set di pittura ad olio', RAND()*50, "Set di pittura ad olio completo con colori, pennelli e tele. Perfetto per gli artisti principianti e professionisti che amano dipingere con l'olio.", 1, 'public/imgs/set_pittura_olio.jpg'),
('Telecomando universale', RAND()*20, "Telecomando universale per controllare tutti i tuoi dispositivi elettronici da un'unica unità. Compatibile con TV, lettori DVD, impianti stereo e altro ancora!", 3, 'public/imgs/telecomando.jpg'),
('Kit per la costruzione di robot', RAND()*80, 'Kit educativo per la costruzione di robot, include componenti elettronici, motori e istruzioni dettagliate. Perfetto per insegnare ai bambini principi di ingegneria e programmazione.', 1, 'public/imgs/kit_robot.jpg'),
('Puzzle 3D', RAND()*40, 'Puzzle tridimensionale con pezzi in plastica da assemblare per creare un modello dettagliato. Ideale per appassionati di puzzle e modellismo.', 1, 'public/imgs/puzzle_3d.jpg'),
('Set da cucina per bambini', RAND()*30, 'Set da cucina giocattolo realistico per bambini, include pentole, padelle, utensili e cibo finto. Perfetto per i piccoli chef in erba!', 3, 'public/imgs/set_cucina_bambini.jpg'),
('Bicicletta per bambini', RAND()*120, "Bicicletta colorata per bambini con ruote di supporto rimovibili, perfetta per imparare a pedalare. Robusta e sicura, è ideale per avventure all'aria aperta!", 1, 'public/imgs/bicicletta_bambini.jpg'),
('Set per la costruzione di castelli di sabbia', RAND()*20, 'Set per la costruzione di castelli di sabbia sulla spiaggia, include pale, secchielli e stampi per creare castelli e forme fantasiose.', 3, 'public/imgs/set_castelli_sabbia.jpg'),
('Kit per la costruzione di navi in bottiglia', RAND()*50, "Kit per la costruzione di navi in bottiglia, include materiali e istruzioni dettagliate per creare modelli di navi miniature all'interno di bottiglie di vetro. Un passatempo unico e affascinante!", 1, 'public/imgs/kit_navi_bottiglia.jpg'),
('Set di adesivi per pareti', RAND()*15, "Set di adesivi decorativi per pareti, ideali per aggiungere un tocco personale e creativo a qualsiasi stanza. Facili da applicare e rimuovere, trasformano istantaneamente l'aspetto di un ambiente.", 3, 'public/imgs/set_adesivi_pareti.jpg'),
('Casetta per bambini', RAND()*200, "Casetta da giardino in legno per bambini, con porte e finestre apribili e spazio interno per giocare. Perfetta per ispirare l'immaginazione e il gioco all'aria aperta!", 1, 'public/imgs/casetta_bambini.jpg'),
('Kit di macchine da corsa radiocomandate', RAND()*100, 'Kit di macchine da corsa radiocomandate, include auto e telecomando per sfide emozionanti e divertenti. Perfetto per gli amanti delle corse e dei giochi radiocomandati!', 1, 'public/imgs/kit_macchine_radiocomandate.jpg'),
('Set per la costruzione di modelli di dinosauri', RAND()*30, 'Set per la costruzione di modelli di dinosauri, include pezzi in plastica da assemblare per creare modelli dettagliati di dinosauri preistorici. Perfetto per gli appassionati di dinosauri e di modellismo.', 1, 'public/imgs/kit_dinosauri.jpg'),
('Set di utensili per barbecue', RAND()*50, 'Set completo di utensili per barbecue, include pinze, spatole, pennelli e forchette per preparare grigliate perfette. Realizzati in acciaio inossidabile resistente, sono essenziali per ogni maestro della griglia!', 3, 'public/imgs/set_utensili_barbecue.jpg'),
('Kit per la costruzione di modelli di razzi', RAND()*60, 'Kit per la costruzione di modelli di razzi spaziali, include pezzi in plastica da assemblare per creare modelli dettagliati di razzi e veicoli spaziali. Perfetto per gli aspiranti astronauti e gli appassionati di spazio!', 1, 'public/imgs/kit_razzi_spaziali.jpg'),
('Tavolino da gioco per bambini', RAND()*40, "Tavolino da gioco per bambini con superficie reversibile, una parte per il gioco del treno e l'altra per il gioco dei blocchi. Include cassetto integrato per riporre i giocattoli.", 3, 'public/imgs/tavolino_gioco_bambini.jpg'),
('Set per la costruzione di modelli di treni', RAND()*80, 'Set per la costruzione di modelli di treni, include locomotive, vagoni e binari per creare un layout ferroviario dettagliato e realistico. Perfetto per gli appassionati di treni e modellismo ferroviario!', 1, 'public/imgs/kit_treni.jpg'),
('Kit per la costruzione di modelli di navi da guerra', RAND()*70, 'Kit per la costruzione di modelli di navi da guerra, include pezzi in plastica da assemblare per creare modelli dettagliati di navi militari storiche. Perfetto per gli appassionati di storia militare e di modellismo navale.', 1, 'public/imgs/kit_navi_guerra.jpg'),
('Puzzle magnetico', RAND()*20, 'Puzzle magnetico con pezzi magnetici per assemblare e creare disegni e forme diverse. Perfetto per i bambini che amano giocare e imparare con la fisica dei magneti!', 1, 'public/imgs/puzzle_magnetico.jpg'),
('Set per la costruzione di modelli di elicotteri', RAND()*60, 'Kit per la costruzione di modelli di elicotteri, include pezzi in plastica da assemblare per creare modelli dettagliati di elicotteri e velivoli a rotore. Perfetto per gli appassionati di aviazione e modellismo!', 1, 'public/imgs/kit_elicotteri.jpg'),
('Set di strumenti musicali giocattolo', RAND()*30, 'Set di strumenti musicali giocattolo per bambini, include chitarra, tamburo, maracas e altri strumenti per avviare i piccoli alla musica. Perfetto per sviluppare il senso del ritmo e la creatività!', 3, 'public/imgs/set_strumenti_musicali.jpg'),
('Macchina fotografica per bambini', RAND()*40, 'Macchina fotografica giocattolo per bambini con funzioni realistiche, come schermo LCD e flash. Perfetta per i piccoli fotografi in erba!', 1, 'public/imgs/macchina_fotografica_bambini.jpg'),
("Set per la costruzione di modelli di auto d'epoca", RAND()*80, "Kit per la costruzione di modelli di auto d'epoca, include pezzi in plastica da assemblare per creare modelli dettagliati di auto storiche e classiche. Perfetto per gli appassionati di motori e di modellismo!", 1, 'public/imgs/kit_auto_epoca.jpg'),
('Kit per la costruzione di modelli di stazioni spaziali', RAND()*100, 'Kit per la costruzione di modelli di stazioni spaziali, include pezzi in plastica da assemblare per creare modelli dettagliati di stazioni spaziali e habitat umani nello spazio. Perfetto per gli appassionati di esplorazione spaziale!', 1, 'public/imgs/kit_stazioni_spaziali.jpg'),
('Tappeto puzzle per bambini', RAND()*30, "Tappeto puzzle per bambini con pezzi colorati e sicuri, ideale per giocare e imparare. Offre un'area sicura e confortevole per i bambini mentre giocano!", 3, 'public/imgs/tappeto_puzzle.jpg'),
('Set per la costruzione di modelli di draghi', RAND()*50, 'Kit per la costruzione di modelli di draghi, include pezzi in plastica da assemblare per creare modelli dettagliati di creature mitiche e fantastiche. Perfetto per gli appassionati di fantasy e di modellismo!', 1, 'public/imgs/kit_draghi.jpg'),
('Set di trucchi giocattolo per bambini', RAND()*20, 'Set di trucchi giocattolo per bambini, include trucchi semplici e divertenti per imparare e intrattenere. Perfetto per i piccoli maghi in erba!', 3, 'public/imgs/set_trucchi.jpg');

CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id VARCHAR(50)
);

CREATE TABLE cart_product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cart_id INT,
    product_id INT,
    quantity INT,
    FOREIGN KEY (cart_id) REFERENCES cart(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE user_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
);

INSERT INTO user_type (id, name) VALUES
(1, 'Administrator'),
(2, 'Regular');

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255),
    password VARCHAR(255),
    user_type_id INT,
    FOREIGN KEY (user_type_id) REFERENCES user_type(id)
);

INSERT INTO users (email, password, user_type_id) VALUES
('admin@gmail.com', md5('ciao'), 1),
('mario.rossi@gmail.com', md5('ciao'), 2);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(30),
    total_amount DECIMAL(10, 2),
    cart_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (cart_id) REFERENCES cart(id)
);

CREATE TABLE user_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    address VARCHAR(255),
    phone VARCHAR(30),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);



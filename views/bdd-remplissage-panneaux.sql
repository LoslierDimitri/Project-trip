USE projet_trip;

CREATE TABLE `regions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `noms` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `specialities` (
  `idspecialities` int NOT NULL AUTO_INCREMENT,
  `noms` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `idregions` int NOT NULL,
  PRIMARY KEY (`idspecialities`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `visits` (
  `idvisits` int NOT NULL AUTO_INCREMENT,
  `noms` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `descriptions` varchar(255) NOT NULL,
  `idregions` int NOT NULL,
  PRIMARY KEY (`idvisits`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


truncate projet_trip.regions;
truncate projet_trip.specialities;
truncate projet_trip.visits;

insert into projet_trip.regions(noms, images, descriptions, prix) values("Grand-Est", "grand-est.jpg", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Nouvelle-Aquitaine", "", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Auvergne-Rhône-Alpes", "", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Bourgogne-Franche-Comté", "", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Centre-Val de Loire", "", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Corse", "", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Occitanie", "", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Île-de-France", "", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Hauts-de-France", "", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Normandie", "", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Pays de la Loire", "", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Provences-Alpes-Côte d'Azur", "", "", "");
insert into projet_trip.regions(noms, images, descriptions, prix) values("Bretagne", "", "", "");

insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La choucroute", "choucroute.jpg", "Plat à base de charcuterie, servie avec du chou fermenté et des pommes de terre. Accompagnée généralement d'une bonne bière.", 1);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La flammekueche", "flammekueche.jpg", "Tarte fine flambée, garnit de crème fraîche, de lardons et d'oignons pour la recette classique.", 1);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("L'andouillette de Troyes", "andouillette.jpg", "Une charcuterie artisanale en forme de saucisse faite à partir d'abats.", 1);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le kougelhopf", "kougelhopf.jpg", "Sans doute le plaisir sucré le plus connu du Grand-Est. Une brioche aux fruits secs(généralement des raisins) et amandes.", 1);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le fromage de chèvre", "fromage-chevre.jpg", "Fromage emblématique de la région Poitou Charentes.", 2);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Les cannelés", "Canneles.jpg", "Petite patisserie Bordelaise à la vanille.", 2);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le Magret de canard", "Magret.jpg", "Bien que Gersois, le magret reste très consommé dans les Landes et le Pays Basque.", 2);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le vin de Bordeaux", "Vin.jpg", "Le mythic vin de Bordeaux célèbre dans le monde entier.", 2);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La Tartiflette", "Tartiflette.jpg", "Tout le monde connaît ce plat emblématique du pays Savoyard, mais rien ne vaut de le déguster chez lui avec vue sur les Montagnes. Parfait en hiver.", 3);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La Truffade", "Truffade.jpg", 'La concurrente Auvergnate de la Tartiflette car les recettes se resemble mais la préparation est la cuisson est différente. À "taster" !', 3);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Les quenelles sauce Nantua", "Nantua.jpg", "Recette de quenelle Lyonnaise arrosée d'une sauce onctueuse à la bisque de homard.", 3);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La crème de marrons", "Creme-marrons.jpg", "Dégustez cette délicieuse pâte de chataîgnes glacées venant d'Ardèche. En gâteau, sur des tartines ou même à la cuillère, cette friandise vous fera fondre.", 3);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le bœuf bourguignon", "boeuf_bourgignon.jpg", "Voilà un fameux plat traditionnel apprécié des grands comme des petits !", 4);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("L'escargot de Bourgogne", "escargot.jpg", 'Egalement appelé "Gros blanc", est un mets consommé depuis toujours.', 4);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le coq au vin jaune", "coq-au-vin-jaune.jpg", "Le coq au vin jaune est l'une des spécialités culinaires les plus célèbres du Jura, c'est même un fleuron de la gastronomie française !", 4);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("la potée franc-comtoise", "potee-franc-comtoise.jpeg", "A l'origine, la potée était cuisinée dans un pot, ce qui a donné son nom aux différents plats dégustés dans toute la France.", 4);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La Beuchelle", "Beuchelle.jpg", "Pâte feuilletée à base de ris et de rognons de veau dans une sauce crèmeuse aux champignons.", 5);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Les fouées", "fouees.jpg", "Ce sont de petits pains ronds farcies. La recette originale est farcie de mogettes (sortes de gros haricots blancs) et de viande de porc.", 5);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Les rillettes de Tours", "Rillettes_Tours.jpg", "Vous connaissez sans doute les rillettes du Mans mais c'est bien en Touraine qu'elles sont nées. Moins grasses et moins hachées vous allez vous régaler.", 5);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La tarte Tatin", "Tarte_tatin.jpg", "La fameuse tarte créée à partir d'une erreur de recette, cette tarte aux pommes inversée est originaire de Sologne. Avec une boule de glace vanille, un régal.", 5);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Les beignets au brocciu", "beignet_brocciu.jpeg", "Fromage frais de brebis, le brocciu est fabriqué de début novembre à fin juin et peut se manger aussi bien salé ou saupoudré d’un peu de sucre.", 6);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("L’aziminu", "aziminu.jpg", "L’aziminu est une version corse de la bouillabaisse : composée de poissons de roche issus des eaux de l’île.", 6);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le civet de sanglier", "Civet_sanglier.jpg", "L’ingrédient principal du civet de sanglier, c’est, contre toute attente… l’oignon ! Ce plat tient en effet son nom du latin caepa ou de l’occitan çeba, qui désignent la plante herbacée à la base du délicieux ragoût.", 6);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le veau aux olives", "saute-de-veau.jpg", "Outre le veau, choisi d’une excellente qualité et de préférence corse, l’ingrédient phare de cette recette typique et ancestrale est l’olive verte.", 6);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le cassoulet de Castelnaudary", "cassoulet-castelnaudary.jpg", "Un ragoût de haricots blancs accompagné au minimum de Saucisse de Toulouse et canard confit et parfois d'autres viandes.", 7);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("L'Aligot", "Aligot.jpg", "Découvrez ou redecouvrez cette savoureuse purée à la crème, ail et du fromage (généralement de la tomme d'Auvergne). Un délice !", 7);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La brandade de Morue", "brandade.jpg", "La brandade est une purée de chair de morue émulsionnée à l'huile d'olive et au lait. La morue à souvent mauvaise réputation mais il s'agit de cabillaud séché et salé.", 7);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La garbure des Midi-Pyrénées", "Garbure.jpg", "Typique et authentique, cette soupe montagnarde, à base de choux, de pommes de terre, de haricots et de viandes qui réhaussent sa saveur, est parfaite pour réchauffer vos hivers.", 7);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Soupe gratinée à l'oignon", "gratinee.jpeg", "Découvrez ce grand classique de la gastronomie française à déguster bien chaud.", 8);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("la gibelotte de lapin", "gibelote.jpg", "C'est un ragoût de lapin traditionnellement cuisiné avec du vin blanc mais qui fonctionne tout aussi bien avec du vin rouge.", 8);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le potage Saint-Germain", "potage.jpg", "Le potage Saint-Germain est donc un fin mélange des trésors locaux où pois et lard se marient à merveille !", 8);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Bouchées à la Reine", "bouchees.jpeg", "C’est le plat des fêtes de fin d’année par excellence ! Mais on peut en réalité les déguster en toutes saisons, accompagnées d'une bonne salade verte.", 8);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le Welsh", "welsh.jpg", "Le welsh est une spécialité du nord : pain, jambon, moutarde, fromage fondu dans la bière, accompagné de frites bien sûr.", 9);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La flamiche au Maroilles", "flamiche-au-maroilles.jpg", "Il s'agit d'une tarte avec du beurre, de la crème, de l'œuf et bien sûr du Maroilles.", 9);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La ficelle picarde", "ficelle-picarde.jpg", "La ficelle picarde est une crêpe garnie de jambon, de champignons de Paris, d'échalotes, d'oignons, de crème fraîche, de noix de muscade et de gruyère râpé. Elle est ensuite cuite au four.", 9);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La carbonade flamande", "carbonade-flamande.jpg", "Le boeuf Bourguignon du Nord, bœuf braisé à l'étouffé avec de la bière belge ou bière du Nord-Pas-de-Calais. Encore une fois servi avec des frites.", 9);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Escalope normande", "Escalope.jpg", "De dinde, de poulet ou de veau, les escalopes de viande sont un plat traditionnel normand mêlant plusieurs produits du terroir incontournables de la région.", 10);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La Teurgoule traditionnelle", "Teurgoule.jpg", "Généreux, ce dessert est souvent servi dans un grand plat (terrine ou jatte à bec) pour être partagé en famille ou entre amis.", 10);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Tripes à la mode de Caen", "tripes.jpg", "Les tripes à la mode de Caen sont une préparation culinaire normande réalisée avec les quatre parties de l'estomac d'un ruminant (panse, feuillet, bonnet et la caillette) et un pied de bœuf.", 10);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La confiture de lait", "confiture.jpg", "Savoureux mélange de lait de ferme et de sucre, la confiture de lait est originaire de Normandie.", 10);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("L'Alose mariné", "alose-marinee.jpg", "L’alose est un poisson à la chair grasse et fine, qui se cuisine simplement. L'alose marinée est un plat français typique de la région du Pays de la Loire, mais on la cuisine également dans le Sud-Ouest.", 11);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le cul de veau aux morilles", "cul-de-veau.jpg", "Le cul de veau est en fait le haut de la cuisse de l’animal, que l’on nomme plus communément le « quasi » de veau. Servit avec du riz, il sera dégusté avec la sauce au vin blanc et à la crème.", 11);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La chaudrée Vendéenne", "chaudree.jpg", "La chaudrée est la soupe de poissons traditionnelle du littoral saintongeais et vendéen, élaborée avec du muscadet.", 11);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le petit beurre", "petit-beurre.jpg", "On ne pouvait pas finir la liste des spécialités des Pays de la Loire sans parler du biscuit Nantais le plus connu de France. Petit biscuit sec qui fait retomber en enfance.", 11);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La bouillabaisse", "bouillabaisse.jpg", "La célèbre bouillabaisse, incontournable spécialité Marseillaise. C'est un plat servi en deux temps : une soupe de poisson accompagnée de croutons à l’ail, puis des poissons entiers et des pommes de terre.", 12);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Les beignets de fleurs de courgette", "beignets-fleurs-courgette.jpg", "Cette spécialité de la cuisine provençale est délicieuse et très simple : il s’agit de fleurs de courgettes enveloppées de pâte à frire.", 12);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("L'anchoïade", "Anchoiade.jpg", "L'anchoïade est ce que l'on sert le plus souvent lors d'un apéritif pour une mise en bouche légère et fraîche. C'est en réalité une crème d'anchois dans laquelle on trempe des morceaux de légumes crus ou du pain", 12);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La glace à la lavande", "glace-a-la-lavande.jpg", "Réconfortante et rafraîchissante, laissez vous tenter et découvrez la surprenante glace à la lavande, originaire de Provence.", 12);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("La crêpe bretonne", "la-crepe.jpg", "En Bretagne, toutes les occasions sont bonnes pour manger des crêpes ! Cuites sur une billig (grande plaque en fonte d’acier), la crêpe (froment ou blé noir) doit être fine et croustillante, accompagnée d’un verre de Chouchen ! ", 13);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le Kig-ha-Farz", "kig-ha-farz.jpg", "Le Kig-ha-Farz est composé de 2 farz que l’on fait cuire dans des sacs en toile : le far noir et le far blanc. On l’accompagne également d’une sauce appelée « Lipig » à base d’oignons ou d’échalotes et de beurre.", 13);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le Kouign-Amann", "Kouign-Amann.jpg", "Le seul, l’unique, l’incontournable Kouign-Amann ! Réalisé à partir d’une pâte à pain, généreusement beurrée et sucrée puis pliée à la manière d’une pâte feuilletée. ", 13);
insert into projet_trip.specialities(noms, images, descriptions, idregions) values ("Le Chouchen", "Kouign-Amann.jpg", "Cette boisson historique de Bretagne est une boisson liquoreuse alcoolisée à base de miel.", 13);





insert into projet_trip.visits(noms, images, descriptions, idregions) values ("La vieille ville de Colmar", "Colmar.jpg", "Petite ville pittoresque, très agréable avec ses maisons colorées et sa rivière la traversant.", 1);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le Sundgau", "Sundgau.jpg", "Parcourez ce magnifique petit coin de nature sauvage et visitez ses villages tous authentiques.", 1);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Les champs de bataille de Verdun", "Verdun.jpg", "Mettez un peu d'histoire dans votre voyage et venez visiter ce lieu qui aura marqué la France.", 1);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le château du Haut-Koenigsbourg", "Chateau-du-Haut-Koenigsbourg.jpg", "Plongez en plein Moyen-Âge avec le seul château fort entièrement reconstitué en France.", 1);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le Marais Poitevin", "Marais-Poitevin.jpg", "Faites une virée en barque à travers cette jolie rivière appellée aussi la Venise verte.", 2);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("La Dune du Pilat", "Pilat.jpg", "Magnifique Dune de sable donnant accès à une vue magnifique sur l'Océan. Préparez vos mollets.", 2);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le lac d'Hossegor", "Lac-Hossegor.jpg", "Venez vous balader ou faire des activités sportives autour de ce magnifique lac.", 2);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Les gorges de Kakuetta", "Kakuetta.jpg", "Une bonne dose de nature sauvages en ce lieu, randonnée légère, cascades et grotte au programme.", 2);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("L'Aiguille du Midi", "Aiguille-midi.jpg", "Si vous aimez la randonnée en montagne ce lieu est fait pour vous. Vous y trouverez un spectacle à couper le souffle.", 3);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le lac Léman", "Lac-leman.jpg", "Visitez le plus grand lac de France (et d'Europe). Il traverse également la Suisse. Vous pourrez vous promener, vous baigner et même naviguer.", 3);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le palais du Facteur Cheval", "Palais-facteur-cheval.jpg", "Un facteur, M.Cheval, ramassait durant ses tournée des pierres afin de construire de ses mains un palais à l'architecture étonnante.", 3);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le Puy-de-Dôme et ses volcans", "Puy-de-dome.jpg", "Le Puy-de-Dôme est composé de plus de 80 volcans, ils sont tous endormis donc il est très facile de venir visiter cet endroit spectaculaire.", 3);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("L'abbaye de Fontenay", "abbaye.jpg", "Fondée en 1118 par saint Bernard, l’abbaye de Fontenay est l’un des plus anciens monastères cisterciens de France.", 4);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Basilique et colline de Vézelay", "colline.jpg", "Fondé au IXe siècle, le monastère bénédictin acquiert les reliques de sainte Marie-Madeleine et devient un haut-lieu de pèlerinage.", 4);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("La Roche de Solutré", "roche.jpg", "Culminant à 495 mètres, la Roche de Solutré se situe au coeur du Grand Site de France, constitué de Solutré, Pouilly et Vergisson.", 4);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le MuséoParc Alésia", "musee.jpg", "De loin, le MuséoParc Alésia apparaît comme un ovni posé au milieu des paysages vallonnés de l’Auxois. Sa configuration circulaire se veut un clin d’œil à l’encerclement des Gaulois par les Romains.", 4);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Visite des châteaux de Touraine", "chateaux_touraine.jpg", "Vous pourrez visiter les magnifiques châteaux de Touraine comme le château de Chambord ou d'Azay-le-Rideau.", 5);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le zoo de Beauval", "zoo_beauval.jpg", "Le plus beau parc animalier de France et le 4e plus beau du monde, ce séjour unique plaira autant aux petits qu'aux grands.", 5);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Les sites troglodytiques", "troglodytes.jpg", "Visitez les vestiges d'une vie qui est aujourd'hui bien lointaine avec ses maisons construite directement dans le tuffeau ainsi que les grottes.", 5);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le parc naturel de la Brenne", "brenne.jpg", "Un parc naturel composé de plusieurs étangs artificiels s'étandant sur plusieurs héctares. Il n'est pas rare d'y voir des animaux sauvages.", 5);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Calvi et sa citadelle", "calvi.jpg", "Au pied de la citadelle, le port de plaisance de Calvi figure parmi les escales les plus appréciées et fréquentées de Corse.", 6);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Les falaises de Bonifacio", "bonifacio.jpg", "Bonifacio s’accroche toujours à ses spectaculaires falaises de calcaire blanc.", 6);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Îles Sanguinaires et pointe de la Parata", "iles_sanguinaires.jpg", "À quelques kilomètres du centre d’Ajaccio, les 4 îlots protégés qui ponctuent la pointe de la Parata doivent leur nom à la couleur rouge de la roche qui les compose.", 6);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("La réserve de Scandola", "scandola.jpg", "Inscrite par l’Unesco sur la Liste du patrimoine mondial de l’humanité, en même temps que les calanques de Piana et le site de Girolata.", 6);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Les Cévennes", "cevennes.jpg", "Immense chaîne de montagnes du Massif central, cette vaste étendue de nature est parfaite pour la randonnée.", 7);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le pont du Gard", "pont-du-gard.jpg", "Vous pourrez visiter ce magnifique pont, le musée sur l'histoire romaine, vous promenez dans les espaces naturels autour et même vous baigner.", 7);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Carcassonne et citadelles du vertige", "carcassone.jpg", "Carcassonne est célèbre pour sa citadelle médiévale et sa Cité, avec ses nombreuses tours de guet et sa double enceinte bâtie à l'époque gallo-romaine.", 7);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("La cité de l'espace", "cite-espace.jpg", "Située à Toulouse, la Cité de l'espace est un centre de culture scientifique orienté vers l'espace et la conquête spatiale, consacré autant à l'astronomie qu'à l'astronautique.", 7);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Musée du Louvre", "Pyramide.jpg", "Ancien palais des rois, le Louvre épouse l’histoire de France depuis huit siècles. Conçu dès sa création en 1793 comme un musée universel, ses collections, qui figurent parmi les plus belles au monde.", 8);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le Centre Pompidou", "pompidou.jpg", "Le Centre Pompidou est une merveille d’architecture du XXe siècle, reconnaissable à ses escalators extérieurs et à ses énormes tuyaux colorés. Il abrite le musée national d’Art moderne.", 8);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Musée d’orsay", "Musee-Orsay.jpg", "Connu dans le monde entier pour sa riche collection d'art impressionniste, le musée d'Orsay est aussi le musée de toute la création artistique du monde occidental de 1848 à 1914.", 8);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le Panthéon", "Pantheon.jpg", "Depuis 1885, date de l’entrée au Panthéon de Victor Hugo, l’édifice est devenu le lieu où reposent les grands Hommes de la patrie : Voltaire, Rousseau, Zola, Pierre et Marie Curie… et depuis le 1er Juillet 2018, Simone Veil.", 8);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le beffroi de Calais", "beffroi-calais.jpg", "Véritable symbole régional, les beffrois sont l'une des fiertés d'architecture du Nord-Pas-de-Calais. Le beffroi servait de tour de guet pour prévenir les attaques ennemies et était surmonté d'un carillon et d'une pirouette.", 9);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("La fosse n°9-9 bis", "fosse_9-9b.jpg", "La fosse n°9-9 bis est un vestige de l'âge industriel. Il s'agit d'un ancien site minier. Venez découvrir la vie des mineurs de charbon.", 9);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le carnaval de Dunkerque", "carnaval_dunkerque.jpg", "Si vous êtes en vacances dans la région aux alentours de mardi gras, vous aurez l'occasion de faire un tour au célèbre carnaval de Dunkerque.", 9);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Nausicaá", "Nausicaá.jpg", "Nausicaá, le centre national de la mer, est un centre de découverte de l'environnement marin, visitez l'aquarium et ses nombreuses espèces et apprenez de nouvelles choses sur le monde marin.", 9);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le Mont-Saint-Michel", "Mont-Saint-Michel.jpg", "Le Mont-Saint-Michel a la particularité d’être érigé sur un îlot rocheux, entouré d’une magnifique baie, théâtre des plus grandes marées d’Europe continentale.", 10);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Les Falaises D'Étretat", "falaises.jpg", "Si ses falaises font partie des sites naturels les plus impressionnants en Europe, le patrimoine artistique et historique de la petite cité maritime vous réservera des surprises.", 10);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("La Tapisserie de Bayeux", "tapisserie-de-bayeux.jpg", "Abriter l’une des plus impressionnantes œuvres de l’histoire dans un cadre authentique est un art. Bayeux le fait avec respect, forte d’un patrimoine varié, étonnant et préservé.", 10);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Deauville", "ville-deauville.jpg", "Créée au 19ème siècle par le Duc de Morny pour être le « royaume de l’élégance » proche de Paris, Deauville a su garder toute sa splendeur et son élégance : architecture de villégiature typique, plage de sable fin…", 10);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Terra Botanica", "terra-botanica.jpg", "Unique en Europe, le parc d’attraction Terra Botanica invite, du côté d’Angers, à appréhender l’univers du végétal via une myriade d’attractions sur les secrets et l'histoire des plantes.", 11);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Lactopôle", "lactopole.jpg", "Découvrir comment se fabrique un camembert, pénétrer une laiterie d’antan reconstituée grandeur nature, observer des objets de collection étonnants… Étendu sur plus de 5000 mètres carrés, Lactopôle est un musée vraiment pas comme les autres.", 11);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("La mine bleue", "mine-bleue.jpg", "La Mine Bleue plonge le visiteur dans les entrailles de la Terre, à la découverte du quotidien des mineurs d’ardoise du début du XXème siècle. Une escapade époustouflante à 126m sous terre.", 11);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Le palais-musée Robert Tatin", "musee-robert-tatin.jpg", "S’agit-il d’un temple asiatique ? D’un palais maya ? D’une forteresse maorie ? En plein bocage mayennais, à Cossé-le-Vivien, se niche l’extraordinaire et monumental palais-musée de l’artiste Robert Tatin.", 11);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Les Îles d'or", "ile_dor.jpg", "Ce sont les joyaux à visiter en Provence. Ce sont des concentrés de Méditerranée en miniature avec leurs sentiers qui serpentent à travers les pins, leurs criques cachées aux eaux turquoises et des fonds marins incroyables.", 12);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Les calanques de Cassis", "calanques-cassis.jpg", "S’il n’y avait qu’une portion de littoral à voir en Provence, ce serait celle-ci ! Les falaises maritimes y sont parmi les plus hautes d’Europe et la couleur de l’eau est encore plus belle que dans les rêves.", 12);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Aix-en-Provence", "aix.jpg", "Son architecture rappelle l’Italie, tout comme ses places ornées de jolies fontaines dont l’eau rafraîchit le visiteur. Vous pouvez commencer votre exploration par la vieille ville avec les façades baroques des hôtels particuliers du quartier Mazarin.", 12);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Les gorges du Verdon", "gorges-verdon.jpg", "Parfois qualifiées de gorges les plus imposantes d’Europe, elles courent sur 21 kilomètres avec des falaises de 300 à 600 mètres de haut. L’eau est couleur turquoise, une oasis de fraîcheur bienvenue surtout sous le soleil brûlant de l’été.", 12);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("Les Alignements de Carnac", "carnac.jpg", "La ville recèle 3 sites en 1 ! Il y a bien sûr les célébrissimes champs de mégalithes, à admirer dans la lumière rasante du matin ou de la fin de journée.", 13);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("la Côte de Granit rose", "cotegranitrose.jpg", "Au nord de Lannion, la Côte de Granit rose est célèbre pour ses rochers colorés aux formes poétiques. Paradis des oiseaux et des promeneurs, elle sculpte le littoral de mille et une trouvailles minérales.", 13);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("La forêt de Brocéliande", "foret-Broceliande.jpg", "Qui n’a jamais entendu parler de la légende du roi Arthur ? C’est dans la magnifique forêt de Brocéliande, entre landes et étangs, qu’elle prend sa source dans ce site magique à découvrir lors de belles randonnées.", 13);
insert into projet_trip.visits(noms, images, descriptions, idregions) values ("La presqu’île de Quiberon ", "quiberon.jpg", "Une côte sauvage spectaculaire à l’ouest, de belles plages de sable fin à l’est, la presqu’île de Quiberon offre sur 14 kilomètres une variété de paysages qui séduit immédiatement.", 13);


select * from projet_trip.visits;
/*select distinct images from projet_trip.regions inner join projet_trip.specialities where id = idregions;*/
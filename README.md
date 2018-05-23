# perfect-site-g15

## Le marketing du site

### Le contexte

### Benchmark

#### Liens sites
* http://www.euphoriamagazinevoyage.com/
* https://www.voyageursdumonde.fr/voyage-sur-mesure/magazine-voyage
* http://www.voyagerluxe.com/
* https://travel-magazine.be/?lang=fr
* http://www.thetravelmagazine.net/
* http://www.routard.com/
* https://www.travel-almanac.com/
* https://foodandtravel.com/
* http://www.vacationsmag.com/
* https://www.plumevoyage.fr/
* https://www.wanderlust.co.uk/
* http://www.travelandleisure.com/
* http://meetandtravelmag.com/
* https://www.timeless-travels.co.uk/
* https://www.afar.com/
* http://www.luxurytravelmag.com.au/
* https://suitcasemag.com/
* https://drifttravel.com/


#### Benchmark graphique

* Design multipages
* Beaucoup de formes rectangulaires
* Fond blanc
* Une couleur d'accent uni (pas de dégradé)
* Menu toujours dispo en header
* Articles catégorisés
* Ne suit pas les tendances actuelles du design
* Peu luxueux

#### Benchmark fonctionnel
* Filtres pour catégories
* Formulaire de contact
* Inscription newsletter
* Utilisation de l'API google map pour localiser certain lieux


#### Benchmark contenu
* Possibilité de voir les couvertures des précédentes éditions
* Exemples d'articles du magazine


### SMART

#### objectif 
 
* concevoir et créer un site en complément du mook sur le voyage (top 100 pas dans le mook, boîte à image, bons plans aériens).

* sortir un mook tous les ans en ligne / kiosque / librairie

* avant les vacances d'été



#### Cibles

* Coeur de cible / 
    Des personnes âgées de 35 à 45 ans ou plus ayant une situation financière aisé / Classe noble / Interessée par le voyage en petit ou grands commité, en famille ou amical etc...
    Les CSP+ (catégories socio-professionnelles), c'est à dire les chefs d'entreprises, ou bien encore les cadres.


* Cible principale / 
    Des partenaires comme :
    - Les compagnies aériennes (Air France, Sahara Airlines, Fly Emirates ...).
    - Les fabricants de materiels photographiques numériques ou optiques et analogiques (Fujifilm, Nikon, Olympus, Canon ...).  
    
* Cible secondaire /
    Des personnes âgées de 25 à 35 ans ayant une situation financière plus ou moins corrects / Classe moyenne / Interessée par le voyage de manière occasionnelle etc...



### Persona
Jean-Richard HONNORÉ
- 40 ans
- Paris / Citadin
- Directeur général de Nesprefoo (une entreprise de vente de café international) 
- Chiffre d’affaires de + de 1 000 000 euros
- +de 500 salariés au sein de l’entreprise 
- Marié et deux enfants à charges


#### Socio-styles
- Prescripteurs (esprit collectif et idées nouvelles)

#### Histoire/Profil
Mr. HONNORÉ est un parisien qui est né en France. Il décide de fonder sa propre entreprise en 2012 avec deux actionnaire proposant un site web e-commerce spécialisé dans la vente de produits "le café". 

#### Motivation 
Mr. HONNORÉ détient une grosse fortune et envisage de voyager à travers le globe afin d'y produire un qualité de meilleure qualité.
Ce qui lui permettrait de mieux se démarquer du marché et ainsi attirer un maximum de clientèle. 
#### Frustration
Craint de ne pas trouver ce qu'il recherche et risque de se faire balayer du marché..

#### Attentes
Il recherche donc un site ou un magazine consacré aux voyages / Propose de différents lieu déjà découvert, conseillés destiner à y trouver ce qui lui correspondrait le mieux pour ses recherches de café. 

## Data Structure

### Admin
* name
* password

### Articles
* category -> ArticlesCategories(name)
* author
* title
* subtitle
* imgSrc
* imgAlt
* imgTitle
* content
* publishedDate
* signature
* logoSrc
* logoAlt
* logoTitle

### ArticlesCategories
* name -> Articles(category)

### Partners
* name
* logoSrc
* logoAlt
* logoTitle

### Airline Companies
* name
* twitterAccount

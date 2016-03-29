# MAH-Lunch-API

Ett enkelt API för att hämta ut dagens eller veckans lunch från några restauranger när Malmö Högskola (Niagara). Följande restauranger finns just nu med:

- [Restaurang Niagara](http://restaurangniagara.se/)
- [La Bonne Vie](http://labonnevie.se/)
- [MiaMarias](http://restaurangniagara.se/)
- [Välfärden](http://valfarden.nu/)
- [Lilla Köket](http://lillakoket.com/)

## Anrop

Följande GET-anrop kan göras:

**Hämta ut veckans meny för restaurangerna ovan**
/
**Hämta ut dagens meny för restaturangerna ovan**
/today

**Hämta ut veckans meny för angiven restaurang**
/:restaurant

**Hämta ut dagens meny för angiven restaurang**
/:restaurant/today

**Hämta ut restaurangerna som finns tillgängliga**
/restaurants

### Exemepelanrop

På URL: [http://mahlunch.antontibblin.se/](http://mahlunch.antontibblin.se/) finns API:t upplagt.

**Hämta ut veckans meny för restaurangerna ovan**
[http://mahlunch.antontibblin.se/](http://mahlunch.antontibblin.se/)

**Hämta ut dagens meny för restaturangerna ovan**
[http://mahlunch.antontibblin.se/today](http://mahlunch.antontibblin.se/today)

**Hämta ut veckans meny för angiven restaurang**
[http://mahlunch.antontibblin.se/Niagara](http://mahlunch.antontibblin.se/Niagara)
[http://mahlunch.antontibblin.se/Labonnevie](http://mahlunch.antontibblin.se/Labonnevie)
[http://mahlunch.antontibblin.se/Miamaria](http://mahlunch.antontibblin.se/Miamaria)
[http://mahlunch.antontibblin.se/Lillakoket](http://mahlunch.antontibblin.se/Lillakoket)
[http://mahlunch.antontibblin.se/Valfarden](http://mahlunch.antontibblin.se/Valfarden)

**Hämta ut dagens meny för angiven restaurang**
[http://mahlunch.antontibblin.se/Niagara/today](http://mahlunch.antontibblin.se/Niagara/today)
[http://mahlunch.antontibblin.se/Labonnevie/today](http://mahlunch.antontibblin.se/Labonnevie/today)
[http://mahlunch.antontibblin.se/Miamaria/today](http://mahlunch.antontibblin.se/Miamaria/today)
[http://mahlunch.antontibblin.se/Lillakoket/today](http://mahlunch.antontibblin.se/Lillakoket/today)
[http://mahlunch.antontibblin.se/Valfarden/today](http://mahlunch.antontibblin.se/Valfarden/today)

**Hämta ut de tillgänglia restaurangerna**
[http://mahlunch.antontibblin.se/restaurants](http://mahlunch.antontibblin.se/restaurants)

### Exempelsvar

#### Veckans meny

'''json
{
    "Restaurang Niagara":{
        "Tuesday":{
            "Local":{
                "title":"Köttfärslimpa med pressgurka, rotfrukter, löksås och gelé (L) Meatloaf with pickled cucumber, root vegetables, onion sauce and jelly",
                "price":"85-"
            },
            "Green":{
                "title":"Risotto med rödbeta, spenat, valnötter och rostad svartkål (L) Beetroot risotto with spinach, walnuts & roasted black cabbage",
                "price":"85-"
            },
            "Green'n Sea":{
                "title":"Green och dagens fångst Green and catch of the day",
                "price":"110-"
            },
            "Asia Ichi":{
                "title":"Stekt ris med tofu, purjolök, tofu och pocherat ägg Fried rice with tofu, leek, and poached egg",
                "price":"78-"
            },
            "Asia Yee":{
                "title":"“Spicy beef” med nudelsallad, koriander, kinakål och böngroddar “Spicy beef” with doodle salad, cilantro, cabbage & beansprouts",
                "price":"90-"
            },
            "Soup and salad":{
                "title":"Rostad tomatsoppa med vitlöksbröd och fänkålssallad Roasted toamato soup, garlic bread & fennel salad",
                "price":"85-"
            },
            "Salad":{
                "title":"Pastasallad med fänkålsalami med pesto, soltorkade tomater och rostad paprika (G) Pasta salad with fennel salami, sun dried tomatoes and peppers ",
                "price":"85-"
            },
            "Övrigt":{
                "title":"Kaffe på maten / Coffee",
                "price":"10-"
            }
        },
        "Wednesday":{
            "Local":{
                "title":"Stekt panerad spätta med remoulade, gröna ärtor, fänkål & äpple (G) Fried plaice with remoulade sauce, green peas, fennel & apple",
                "price":"85-"
            },
            "Green":{
                "title":"Gnocchi med rostad pumpa, ruccola och grana padano (G) Gnocchi with roasted pumpkin, rocket salad & grana padano cheese",
                "price":"85-"
            },
            "Asian Ichi":{
                "title":"Stekt ris med tofu, purjolök, tofu och pocherat ägg Fried rice with tofu, leek, and poached egg",
                "price":"78-"
            },
            "Asia Yee":{
                "title":"“Spicy beef” med nudelsallad, koriander, kinakål och böngroddar “Spicy beef” with doodle salad, cilantro, cabbage & beansprouts",
                "price":"90-"
            },
            "Soup and salad":{
                "title":"Rostad tomatsoppa med vitlöksbröd och fänkålssallad Roasted toamato soup, garlic bread & fennel salad",
                "price":"85-"
            },
            "Salad":{
                "title":"Pastasallad med fänkålsalami med pesto, soltorkade tomater och rostad paprika (G) Pasta salad with fennel salami, sun dried tomatoes and peppers ",
                "price":"85-"
            },
            "Övrigt":{
                "title":"Kaffe på maten / Coffee",
                "price":"10-"
            }
        },
        "Thursday":{
            "Local":{
                "title":"Kyckling i rödvin med morot, lök, rökt fläsk, champinjoner och potatismos (L) Chicken in red wine sauce, carrots, bacon, mushrooms & baby onions",
                "price":"85-"
            },
            "Green":{
                "title":"Savoykålsdolme med potatis, fänkål, äpple och lingonvinaigrette Stuffed Savoy cabbage with potatoes, fennel, apple & lingonberry vinaigrette ",
                "price":"85-"
            },
            "Green'n Sea":{
                "title":"Green och dagens fångst Green and catch of the day",
                "price":"110-"
            },
            "Asian Ichi":{
                "title":"Stekt ris med tofu, purjolök, tofu och pocherat ägg Fried rice with tofu, leek, and poached egg",
                "price":"78-"
            },
            "Asia Yee":{
                "title":"“Spicy beef” med nudelsallad, koriander, kinakål och böngroddar “Spicy beef” with doodle salad, cilantro, cabbage & beansprouts",
                "price":"90-"
            },
            "Soup´n salad":{
                "title":"Rostad tomatsoppa med vitlöksbröd och fänkålssallad Roasted toamato soup, garlic bread & fennel salad",
                "price":"85-"
            },
            "Salad":{
                "title":"Pastasallad med fänkålsalami med pesto, soltorkade tomater och rostad paprika (G) Pasta salad with fennel salami, sun dried tomatoes and peppers ",
                "price":"85-"
            },
            "Övrigt":{
                "title":"Kaffe på maten / Coffee",
                "price":"10-"
            }
        }
    },
    "Mia Maria":{
        "Monday":{
            "Fisk":{
                "title":"Påskstängt ",
                "price":""
            },
            "Kött":{
                "title":"Påskstängt ",
                "price":""
            },
            "Vegetarisk":{
                "title":"Påskstängt ",
                "price":""
            }
        },
        "Tuesday":{
            "Fisk":{
                "title":"Panerad sej. Serveras med klyftpotatis och aioli.",
                "price":"95-"
            },
            "Kött":{
                "title":"Dovhjortsgryta med champinjoner, enbär och rotfrukter. Serveras med rostad potatis.",
                "price":"90-"
            },
            "Vegetarisk":{
                "title":"Potatis- och prästostbiffar med basilikayoghurt.",
                "price":"82-"
            }
        },
        "Wednesday":{
            "Fisk":{
                "title":"Ugnsbakad lax med gnocchi, färsk oregano och spenat. ",
                "price":"95-"
            },
            "Kött":{
                "title":"Wallenbergare. Serveras med potatismos, skirat smör och ärtor. ",
                "price":"90-"
            },
            "Vegetarisk":{
                "title":"Grillad pumpaburgare med broccolipesto. ",
                "price":"82-"
            }
        },
        "Thursday":{
            "Fisk":{
                "title":"Torsk med hel, bakad rotselleri och vispat vitlökssmör.",
                "price":"95-"
            },
            "Kött":{
                "title":"Het kycklingchilli med bönor och ost-quesedillas.",
                "price":"90-"
            },
            "Vegetarisk":{
                "title":"Cannelloni fylld med svamp och örtkräm.",
                "price":"82-"
            },
            "Torsdagens soppa":{
                "title":"Ärtsoppa med eller utan fläsk. Pannkakor med sylt och grädde.",
                "price":"70-"
            }
        },
        "Friday":{
            "Fisk":{
                "title":"Ångad kummel med blomkålsmos, grana padano och rostade solroskärnor.",
                "price":"95-"
            },
            "Kött":{
                "title":"Ryggbiff med bearnaisesås och potatisgratäng.",
                "price":"90-"
            },
            "Vegetarisk":{
                "title":"Vietnamesiska pannkakor med svampfyllning och chilidippsås.",
                "price":"82-"
            }
        }
    },
    "Välfärden":{
        "Monday":{
            "1":{
                "title":"Stängt.",
                "price":"95"
            }
        },
        "Tuesday":{
            "1":{
                "title":" Deluxe-sallad med varmrökt lax från Vägga rökeri, färskpotatissallad med gröna bönor, fänkål och broccoli, senap och citron samt pepparrotsmajonnäs",
                "price":"95"
            },
            "2":{
                "title":"Spenatpannkaka med rökig tofu, bakad lök, broccoli- och mandelsallad samt rårörda lingon",
                "price":"95"
            }
        },
        "Wednesday":{
            "1":{
                "title":" Indiska kycklingfärsbiffar med äppel- och gurkraita, mandel- och kardemummaris samt spenatsallad med mynta",
                "price":"95"
            },
            "2":{
                "title":"Ratatouille på rostade grönsaker med krämig prästostpolenta och färsk basilikasallad",
                "price":"95"
            }
        },
        "Thursday":{
            "1":{
                "title":"Långbakad ingefärsglacerad karré på Olinge utegris med lime- och gurksallad, färsk koriander och puré på rostad sötpotatis och morot",
                "price":"95"
            },
            "2":{
                "title":"Spenat- och svamplasagne med långlagrad prästost, krämig bechamel och vårsallad med buntlök och fänkål",
                "price":"95"
            }
        },
        "Friday":{
            "1":{
                "title":" Välfärdens goda fiskgryta med atlanttorsk och fjordlax, vitt vin och grönsaker samt saffransaioli",
                "price":"95"
            },
            "2":{
                "title":"Kryddiga kikärtsbiffar med mangosalsa, kokosris med svarta bönor samt ört- och limesallad",
                "price":"95"
            }
        }
    },
    "Lilla Köket":{
        "Monday":{
            "1":{
                "title":"1. Biff a’la Lindström m. smörgåsgurka, brunsås, stekt ägg",
                "price":""
            },
            "2":{
                "title":" 2. Skånsk kalops m. rödbetor",
                "price":""
            },
            "3":{
                "title":" 3. Småländsk isterband m. persiljestuvad potatis, rödbetor",
                "price":""
            }
        },
        "Tuesday":{
            "1":{
                "title":"1. Bruna bönor m. stekt fläsk och korv",
                "price":""
            },
            "2":{
                "title":" 2. Schnitzel m. brunsås, citron, ärtor, stekt potatis",
                "price":""
            },
            "3":{
                "title":" 3. Småländsk isterband m. persiljestuvad potatis, rödbetor",
                "price":""
            }
        },
        "Wednesday":{
            "1":{
                "title":"1. Hackad grönpepparbiff m. Cognacsås, råstekt potatis, gröna bönor",
                "price":""
            },
            "2":{
                "title":" 2. Stekt strömmingsfile m. potatismos, röd lök, skirat smör",
                "price":""
            },
            "3":{
                "title":" 3. Småländsk isterband m. persiljestuvad potatis, rödbetor",
                "price":""
            }
        },
        "Thursday":{
            "1":{
                "title":"1. Tysk ärtsoppa samt pannkakor och sylt",
                "price":""
            },
            "2":{
                "title":" 2. Marinerad helstekt fläskfile m. pepparsås",
                "price":""
            },
            "3":{
                "title":" 3. Stuvade makaroner m. falukorv",
                "price":""
            }
        },
        "Friday":{
            "1":{
                "title":"1. Marinerad kycklingsfile m. apelsinsås, saffranris",
                "price":""
            },
            "2":{
                "title":" 2. Viltfärsbiff m. enbärsgräddsås, rönnbärsgele, honungsstekt brysselkål",
                "price":""
            },
            "3":{
                "title":" 3. Två bratwurste m. lök och baconbrynt potatis, tysk senap",
                "price":""
            }
        }
    },
    "La Bonne Vie":{
        "Monday":{
            "Dagens rätt":{
                "title":" Schnitzel med ärtor, sardeller och pommes frites.",
                "price":"95"
            },
            "Veckans fisk":{
                "title":" Fish and chips med remouladsås",
                "price":"129"
            },
            "Veckans soppa":{
                "title":" Blomkålssoppa",
                "price":"85"
            }
        },
        "Tuesday":{
            "Dagens rätt":{
                "title":" Schnitzel med ärtor, sardeller och pommes frites.",
                "price":"95"
            },
            "Veckans fisk":{
                "title":" Fish and chips med remouladsås",
                "price":"129"
            },
            "Veckans soppa":{
                "title":" Blomkålssoppa",
                "price":"85"
            }
        },
        "Wednesday":{
            "Dagens rätt":{
                "title":" Schnitzel med ärtor, sardeller och pommes frites.",
                "price":"95"
            },
            "Veckans fisk":{
                "title":" Fish and chips med remouladsås",
                "price":"129"
            },
            "Veckans soppa":{
                "title":" Blomkålssoppa",
                "price":"85"
            }
        },
        "Thursday":{
            "Dagens rätt":{
                "title":" Schnitzel med ärtor, sardeller och pommes frites.",
                "price":"95"
            },
            "Veckans fisk":{
                "title":" Fish and chips med remouladsås",
                "price":"129"
            },
            "Veckans soppa":{
                "title":" Blomkålssoppa",
                "price":"85"
            }
        },
        "Friday":{
            "Dagens rätt":{
                "title":" Schnitzel med ärtor, sardeller och pommes frites.",
                "price":"95"
            },
            "Veckans fisk":{
                "title":" Fish and chips med remouladsås",
                "price":"129"
            },
            "Veckans soppa":{
                "title":" Blomkålssoppa",
                "price":"85"
            }
        }
    }

}'''

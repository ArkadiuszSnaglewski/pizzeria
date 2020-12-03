<?php

return [
    'buttons' => [
        'cancel' => 'Anuluj',
        'create' => 'Dodaj',
        'edit' => 'Edytuj',
        'update' => 'Aktualizuj',
        'delete' => 'Usuń'
    ],
    'columns' => [
        'actions' => 'akcje',
        'created_at' => 'utworzono',
        'updated_at' => 'zaktualizowano',
        'deleted_at' => 'usunięto'
    ],
    /*
    */
    'clients' => [
        'columns' => [
            'id' => 'id',
            'Imie' => 'Imie',
            'Nazwisko' => 'Nazwisko',
            'NumerTelefonu'=>'NumerTelefonu'
            
        ],
        'index' => [
            'title' => 'Klienci',
            'buttons' => [
                'create' => 'Dodaj klienta'
            ],
        ],
        'show' => [
            'title' => 'Szczegółowe informacje o klientach',
            'buttons' => [
                'clients' => 'Lista klientów',
                'client'=> 'Klient'
            ]
        ],
        'create' => [
            'title' => 'Dodawanie Klienta',
            'messages' => [
                'success' => 'Dodano klient',
                'error' => 'Błąd podczas dodawania klienta',
                'duplicate_entry' => 'klienti o tej nazwie już istnieje'
            ]
        ],
        'edit' => [
            'title' => 'Edycja klienta',
            'messages' => [
                'success' => 'Zaktualizowano klienta',
                'error' => 'Błąd podczas aktualizacji klientów',
                'duplicate_entry' => 'klienti o tej nazwie już istnieje'
            ]
        ],
        'destroy' => [
            'messages' => [
                'success' => 'Usunięto klienta'
            ]
        ]
    ],
    /*
    */

    'ingredients' => [
        'columns' => [
            'id' => 'id',
            'Nazwa' => 'nazwa',
            'Cena' => 'cena'
            
        ],
        'index' => [
            'title' => 'Składniki',
            'buttons' => [
                'create' => 'Dodaj Składnik'
            ],
        ],
        'show' => [
            'title' => 'Szczegółowe informacje o Składnikach',
            'buttons' => [
                'ingredients' => 'Lista Składników',
                'client'=> 'Klient'
            ]
        ],
        'create' => [
            'title' => 'Dodawanie Składnika',
            'messages' => [
                'success' => 'Dodano Skladnik',
                'error' => 'Błąd podczas dodawania Składniku',
                'duplicate_entry' => 'Składnik o tej nazwie już istnieje'
            ]
        ],
        'edit' => [
            'title' => 'Edycja Składnika',
            'messages' => [
                'success' => 'Zaktualizowano Składnik',
                'error' => 'Błąd podczas aktualizacji składnika',
                'duplicate_entry' => 'Skaładnik o tej nazwie już istnieje'
            ]
        ],
        'destroy' => [
            'messages' => [
                'success' => 'Usunięto Składnik'
            ]
        ]

        ],
            'ingredients' => [
        'columns' => [
            'id' => 'id',
            'Nazwa' => 'nazwa',
            'Cena' => 'cena'
            
        ],
        'index' => [
            'title' => 'Składniki',
            'buttons' => [
                'create' => 'Dodaj Składnik'
            ],
        ],
        'show' => [
            'title' => 'Szczegółowe informacje o Składniku',
            'buttons' => [
                'ingredients' => 'Lista składnika',
                'client'=> 'Klient'
            ]
        ],
        'create' => [
            'title' => 'Dodawanie Składnika',
            'messages' => [
                'success' => 'Dodano Składnik',
                'error' => 'Błąd podczas dodawania Składnika',
                'duplicate_entry' => 'Składnik o tej nazwie już istnieje'
            ]
        ],
        'edit' => [
            'title' => 'Edycja Składników',
            'messages' => [
                'success' => 'Zaktualizowano kładniki',
                'error' => 'Błąd podczas aktualizacji Składników',
                'duplicate_entry' => 'Skladnik o tej nazwie już istnieje'
            ]
        ],
        'destroy' => [
            'messages' => [
                'success' => 'Usunięto Składnik'
            ]
        ]

    ],
    'pizzas' => [
        'columns' => [
            'id' => 'id',
            'NazwaPizza' => 'NazwaPizza',
            'CenaBazowa' => 'CenaBazowa',
            'IdSkladniki'=> 'IdSkladniki'
            
        ],
        'index' => [
            'title' => 'Pizza',
            'buttons' => [
                'create' => 'Dodaj Pizza'
            ],
        ],
        'show' => [
            'title' => 'Szczegółowe informacje o pizzach',
            'buttons' => [
                'ingredients' => 'Lista Składników',
                'client'=> 'Klient'
            ]
        ],
        'create' => [
            'title' => 'Dodawanie Pizzy',
            'messages' => [
                'success' => 'Dodano Pizzę',
                'error' => 'Błąd podczas dodawania Pizzy',
                'duplicate_entry' => 'Pizzy o tej nazwie już istnieje'
            ]
        ],
        'edit' => [
            'title' => 'Edycja Pizzy',
            'messages' => [
                'success' => 'Zaktualizowano Pizzę',
                'error' => 'Błąd podczas aktualizacji Pizzy',
                'duplicate_entry' => 'Pizza o tej nazwie już istnieje'
            ]
        ],
        'destroy' => [
            'messages' => [
                'success' => 'Usunięto Pizzę'
            ]
        ]

    ],
    'ingredients_pizzas' => [
        'columns' => [
            'id' => 'id',
            'NazwaPizza' => 'NazwaPizza',
            'CenaBazowa' => 'CenaBazowa'
            
        ],
        'index' => [
            'title' => 'Pizza',
            'buttons' => [
                'create' => 'Dodaj klient'
            ],
        ],
        'show' => [
            'title' => 'Szczegółowe informacje o klientach',
            'buttons' => [
                'ingredients' => 'Lista klientów',
                'client'=> 'Klient'
            ]
        ],
        'create' => [
            'title' => 'Dodawanie klienta',
            'messages' => [
                'success' => 'Dodano klient',
                'error' => 'Błąd podczas dodawania klienta',
                'duplicate_entry' => 'klienti o tej nazwie już istnieje'
            ]
        ],
        'edit' => [
            'title' => 'Edycja klienta',
            'messages' => [
                'success' => 'Zaktualizowano klienti',
                'error' => 'Błąd podczas aktualizacji klientów',
                'duplicate_entry' => 'klienti o tej nazwie już istnieje'
            ]
        ],
        'destroy' => [
            'messages' => [
                'success' => 'Usunięto klienti'
            ]
        ]

    ]
];

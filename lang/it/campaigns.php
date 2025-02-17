<?php

return [
    'actions'                           => [
        'boost' => 'Potenzia :name',
    ],
    'create'                            => [
        'description'           => 'Crea una nuova campagna',
        'helper'                => [
            'title'     => 'Un benvenuto a :name!',
            'welcome'   => <<<'TEXT'
Prima di proseguire, devi scegliere un nome per la tua campagna. Questo è il nome del tuo mondo. Se non hai ancora un buon nome da scegliere, non preoccuparti: potrai sempre cambiarlo in un secondo momento, o creare altre campagne.

Grazie per esserti unito a Kanka, e benvenuto nella nostra florida community!
TEXT
,
        ],
        'success'               => 'Campagna creata.',
        'success_first_time'    => 'La tua campagna è stata creata! Siccome si tratta della tua prima campagna abbiamo provveduto a creare alcune cose per aiutarti ad iniziare e speriamo che ti possa dare un po\' di ispirazione per quello che potrai fare.',
        'title'                 => 'Nuova campagna',
    ],
    'destroy'                           => [
        'action'            => 'Elimina campagna',
        'confirm'           => 'Sei sicuro di eliminare :campaign? Questa azione è permanente e non può essere recuperata.',
        'confirm-button'    => 'Elimina permanentemente la campagna.',
        'helper-v2'         => 'Questa campagna non può essere eliminata mentre ci sono altri membri all\'interno. Rimuovi prima gli altri membri e prova di nuovo.',
        'hint'              => 'Per favore, scrivi :code nella casella sottostante.',
        'success'           => 'Campagna eliminata.',
        'title'             => 'Elimina la campagna',
    ],
    'edit'                              => [
        'success'   => 'Campagna aggiornata.',
        'title'     => 'Modifica la campagna :campaign',
    ],
    'entity_personality_visibilities'   => [
        'private'   => 'I nuovi personaggi hanno la loro personalità privata in maniera predefinita.',
    ],
    'entity_visibilities'               => [
        'private'   => 'Le nuove entità sono private',
    ],
    'errors'                            => [
        'access'        => 'Non hai accesso a questa campagna.',
        'superboosted'  => 'Questa funzione è disponibile solo per campagne superpotenziate.',
        'unknown_id'    => 'Campagna sconosciuta.',
    ],
    'export'                            => [],
    'fields'                            => [
        'boosted'                           => 'Potenziata da',
        'character_personality_visibility'  => 'Visibilità della personalità del personaggio predefinita',
        'connections'                       => 'Mostra le connessioni dell\'entità in modo predefinito (invece dell\'esploratore delle relazioni per le campagne potenziate)',
        'css'                               => 'CSS',
        'description'                       => 'Descrizione',
        'entity_count'                      => 'Numero di Entità',
        'entity_privacy'                    => 'Privacy predefinita per nuova entità',
        'entry'                             => 'Descrizione della campagna',
        'excerpt'                           => 'Estratto',
        'featured'                          => 'Campagna in Primo Piano',
        'followers'                         => 'Followers',
        'header_image'                      => 'Immagine di copertina',
        'image'                             => 'Immagine',
        'locale'                            => 'Lingua',
        'name'                              => 'Nome',
        'nested'                            => 'Liste dell\'entità annidate in modo predefinito, quando possibile',
        'past_featured'                     => 'Campagna precedentemente in Primo Piano',
        'post_collapsed'                    => 'I nuovi post sulle entità sono ripiegati in modo predefinito.',
        'public'                            => 'Visibilità della campagna',
        'public_campaign_filters'           => 'Filtri Campagna Pubblica',
        'related_visibility'                => 'Visibilità degli Elementi Correlati',
        'rpg_system'                        => 'Sistema RPG',
        'superboosted'                      => 'Superpotenziato da',
        'system'                            => 'Sistema',
        'theme'                             => 'Tema',
        'visibility'                        => 'Visibilità',
    ],
    'following'                         => 'Che Segui',
    'helpers'                           => [
        'boost_required'                    => 'Questa funzione richiede che la campagna sia potenziata. Puoi trovare maggiori informazioni sulla pagina :settings.',
        'boost_required_multi'              => 'Queste funzioni richiedono che la campagna sia potenziata. Puoi trovare maggiori informazioni sulla pagina :settings.',
        'boosted'                           => 'Alcune caratteristiche sono sbloccate perché questa campagna è stata potenziata. Scopri di più nella pagina :settings.',
        'character_personality_visibility'  => 'Quando crei un nuovo personaggio come amministratore, seleziona l\'impostazione predefinita della privacy per i tratti della personalità.',
        'css'                               => 'Scrivi i tuoi CSS che saranno caricati all\'interno della pagina della tua campagna. Considera che qualsiasi abuso di questa funzionalità può portare alla rimozione dei tuoi CSS personalizzati.',
        'dashboard'                         => 'Per personalizzare la visualizzazione del widget della dashboard della campagna, compila i seguenti campi.',
        'entity_count_infinity'             => 'Questa campagna non ha limiti al numero delle entità.',
        'entity_count_v2'                   => 'Questo numero è ricalcolato ogni sei ore e ignora i tags.',
        'entity_privacy'                    => 'Quando crei una nuova entità come amministratore, seleziona l\'impostazione predefinita della privacy per la nuova entità.',
        'excerpt'                           => 'L\'estratto della campagna sarà mostrato sulla dashboard, quindi scrivi una breve introduzione al tuo mondo. Mantienila breve per un miglior risultato. Se questo campo rimane vuoto, verranno utilizzati i primi 1000 caratteri della descrizione della campagna.',
        'header_image'                      => 'Immagine visualizzata come sfondo nel widget dell\'intestazione della campagna.',
        'locale'                            => 'La lingua in cui la tua campagna è scritta. Questa specificazione è sfruttata per generare contenuti e raggruppare le campagne pubbliche.',
        'name'                              => 'La tua campagna/mondo può avere qualsiasi nome, a patto che che contenga almeno 4 lettere o numeri.',
        'public_campaign_filters'           => 'Aiuta altre persone a trovare la campagna tra altre campagne pubbliche fornendo le seguenti informazioni.',
        'system'                            => 'Se la tua campagna è visibile pubblicamente, il sistema sarà visualizzato nella pagina :link.',
        'systems'                           => 'Per evitare di confondere gli utenti con una sovrabbondanza di opzioni, alcune di esse sono disponibili solamente per specifici sistemi RPG (per esempio il blocco delle statistiche dei mostri di D&D 5e). Aggiungere un sistema supportato qui abiliterà queste funzionalità.',
        'theme'                             => 'Forza il tema della campagna, sovrascrivendo le preferenze delle utenze.',
        'view_public'                       => 'Per visualizzare la tua campagna come farebbe uno spettatore pubblico, apri :link in una finestra di navigazione in incognito.',
        'visibility'                        => 'Rendere pubblica una campagna significa che chiunque abbia il link può vederla.',
    ],
    'index'                             => [
        'actions'   => [
            'new'   => [
                'title' => 'Nuova Campagna',
            ],
        ],
    ],
    'invites'                           => [
        'actions'               => [
            'copy'  => 'Copia il collegamento nei tuoi appunti',
        ],
        'create'                => [
            'success_link'  => 'Link creato: :link',
            'title'         => 'Invita qualcuno nella tua campagna',
        ],
        'destroy'               => [
            'success'   => 'Invito rimosso.',
        ],
        'error'                 => [
            'already_member'    => 'Sei già un membro di questa campagna.',
            'inactive_token'    => 'Questo token è già stato utilizzato o la campagna non esiste più.',
            'invalid_token'     => 'Questo token non è più valido.',
            'login'             => 'Per favore accedi o registrati per unirti alla campagna.',
        ],
        'fields'                => [
            'created'   => 'Inviato',
            'role'      => 'Ruolo',
            'type'      => 'Tipo',
        ],
        'unlimited_validity'    => 'Nessun Limite',
        'usages'                => [
            'no_limit'  => 'Nessun limite',
        ],
    ],
    'leave'                             => [
        'confirm'   => 'Sei sicuro di voler abbandonare la campagna :name? Non potrai più accedere, a meno che un proprietario della campagna non ti inviti nuovamente.',
        'error'     => 'Non puoi abbandonare la campagna.',
        'success'   => 'Hai abbandonato la campagna.',
    ],
    'members'                           => [
        'actions'               => [
            'help'          => 'Aiuto',
            'remove'        => 'Rimuovi dalla campagna',
            'switch'        => 'Passa a',
            'switch-back'   => 'Torna al mio utente',
        ],
        'create'                => [
            'title' => 'Aggiungi un membro alla tua campagna',
        ],
        'edit'                  => [
            'title' => 'Modifica il membro :name',
        ],
        'fields'                => [
            'joined'        => 'Unito',
            'last_login'    => 'Ultimo Login',
            'name'          => 'Utente',
            'role'          => 'Ruolo',
            'roles'         => 'Ruoli',
        ],
        'help'                  => 'Le campagne possono avere una quantità illimitata di membri.',
        'helpers'               => [
            'admin' => 'Come membro del ruolo di amministratore della campagna, puoi invitare nuovi utenti, rimuovere quelli inattivi e cambiare i loro permessi. Per provare i permessi di un membro, utilizza il pulsante "Passa a". Puoi leggere di più su questa funzionalità qui :link.',
            'switch'=> 'Passa a questo utente',
        ],
        'impersonating'         => [
            'message'   => 'Stai visualizzando la campagna come un altro utente. Alcune caratteristiche sono state disabilitate, ma il resto viene mostrato esattamente come lo vedrebbe quell\'utente. Per tornare al tuo utente usa il bottone "Torna al mio utente", posizionato dove normalmente si trova il bottone di Logout.',
            'title'     => 'Stai impersonando :name',
        ],
        'invite'                => [
            'description'   => 'Puoi invitare i tuoi amici nella tua campagna indicandoci i loro indirizzi e-mail. Una volta che avranno accettato il loro invito verranno aggiunti come membri nel ruolo indicato. Gli inviti inviati potranno essere cancellati in qualsiasi momento.',
            'more'          => 'Puoi aggiungere ulteriori ruoli su :link.',
            'roles_page'    => 'Pagina dei ruoli',
            'title'         => 'Invita',
        ],
        'manage_roles'          => 'Gestisci i ruoli degli utenti',
        'roles'                 => [
            'member'    => 'Membro',
            'owner'     => 'Proprietario',
            'player'    => 'Giocatore',
            'public'    => 'Pubblico',
            'viewer'    => 'Spettatore',
        ],
        'switch_back_success'   => 'Ora sei tornato al tuo utente originale.',
        'title'                 => 'Membri della Campagna :name',
        'updates'               => [
            'added'     => 'Ruolo :role aggiunto a :user.',
            'removed'   => 'Ruolo :role rimosso da :user',
        ],
        'your_role'             => 'Il tuo ruolo: <i>:role</i>',
    ],
    'panels'                            => [
        'boosted'   => 'Potenziata',
        'dashboard' => 'Dashboard',
        'permission'=> 'Permessi',
        'sharing'   => 'Condivisione',
        'systems'   => 'Sistema',
        'ui'        => 'Interfaccia',
    ],
    'placeholders'                      => [
        'description'   => 'Un piccolo riassunto della tua campagna',
        'locale'        => 'Codice di lingua',
        'name'          => 'Il nome della tua campagna',
        'system'        => 'D&D 5e, 3.5, Pathfinder, Gurps, DSA',
    ],
    'roles'                             => [
        'actions'       => [
            'add'   => 'Aggiungi un ruolo',
        ],
        'create'        => [
            'success'   => 'Ruolo creato.',
            'title'     => 'Crea un nuovo ruolo per :name',
        ],
        'destroy'       => [
            'success'   => 'Ruolo rimosso.',
        ],
        'edit'          => [
            'success'   => 'Ruolo aggiornato.',
            'title'     => 'Modifica il ruolo :name',
        ],
        'fields'        => [
            'name'          => 'Nome',
            'permissions'   => 'Permessi',
            'type'          => 'Tipo',
            'users'         => 'Utenti',
        ],
        'helper'        => [
            '1' => 'Una campagna può avere tanti ruoli quanti ne desideri. Il ruolo "Proprietario" ti dà automaticamente accesso a tutto nella campagna, ma ogni altro ruolo può avere permessi specifici su diversi tipi di entità (personaggio, luogo, ecc).',
            '2' => 'I permessi delle entità possono essere perfezionati utilizzando la tabella "Permessi" di unl\'entità. Questa tabella appare quando la tua campagna ha più ruoli o membri.',
            '3' => 'Puoi usare un sistema "opt-out", dove ai ruoli è dato il permesso di vedere tutte le entità, e usare la spunta "Privato" sull\'entità per nasconderla. Oppure puoi dare ai ruoli pochi permessi, ma impostare ogni entità come visibile.',
        ],
        'hints'         => [
            'campaign_not_public'   => 'Il ruolo pubblico ha dei permessi, ma la campagna è privata. Puoi cambiare questa impostazione sulla tabella Condivisione mentre modifichi la campagna.',
            'role_permissions'      => 'Abilita il ruolo \':name\' per le seguenti funzioni su tutte le entità.',
        ],
        'members'       => 'Membri',
        'permissions'   => [
            'actions'   => [
                'add'           => 'Crea',
                'dashboard'     => 'Dashboard',
                'delete'        => 'Elimina',
                'edit'          => 'Modifica',
                'entity-note'   => 'Note dell\'Entità',
                'gallery'       => 'Galleria',
                'members'       => 'Membri',
                'permission'    => 'Gestisci Permessi',
                'read'          => 'Visualizza',
                'toggle'        => 'Cambia per tutte',
            ],
            'helpers'   => [
                'entity_note'   => 'Questo permette ad utenti che non hanno il permesso di modificare un\'entità di aggiungere note ad essa.',
            ],
        ],
        'placeholders'  => [
            'name'  => 'Nome del ruolo',
        ],
        'show'          => [
            'title' => 'Ruolo nella campagna \':role\'',
        ],
        'title'         => 'Ruoli della campagna :name',
        'types'         => [
            'owner'     => 'Proprietario',
            'public'    => 'Pubblico',
            'standard'  => 'Predefinito',
        ],
        'users'         => [
            'actions'   => [
                'add'       => 'Aggiungi membro',
                'remove'    => ':user dal ruolo :role',
            ],
            'create'    => [
                'success'   => 'Utente aggiunto al ruolo.',
                'title'     => 'Aggiungi un membro al ruolo :name',
            ],
            'destroy'   => [
                'success'   => 'Utente rimosso da ruolo.',
            ],
            'fields'    => [
                'name'  => 'Nome',
            ],
        ],
    ],
    'settings'                          => [
        'actions'   => [
            'enable'    => 'Abilita',
        ],
        'boosted'   => 'Questa funzionalità è in beta e al momento è disponibile solo per :boosted.',
        'helpers'   => [
            'abilities'     => 'Crea abilità, siano esse talenti, incantesimi o poteri che possono essere assegnati alle entità.',
            'calendars'     => 'Un\'area dove definire i calendari del tuo mondo.',
            'characters'    => 'Le persone che abitano il tuo mondo.',
            'conversations' => 'Conversazioni fittizie tra i personaggi o gli utenti della campagna.',
            'dice_rolls'    => 'Per quelli che utilizzano Kanka per una campagna RPG, un modo per gestire i tiri di dado.',
            'events'        => 'Vacanze, festival, disastri, compleanni, guerre.',
            'families'      => 'Clan o famiglie, le loro relazioni e i loro membri.',
            'items'         => 'Armi, veicoli, reliquie, pozioni.',
            'journals'      => 'Osservazioni scritte dai personaggi, o preparazione per le sessioni del dungeon master.',
            'locations'     => 'Pianeti, piani, continenti, fiumi, stati, insediamenti, templi, taverne.',
            'maps'          => 'Carica mappe con livelli e marcatori che puntano ad altre entità nella campagna.',
            'menu_links'    => 'Collegamenti personalizzati nel menu laterale.',
            'notes'         => 'Tradizioni, religioni, storia, magia, razze.',
            'organisations' => 'Culti, unità militari, fazioni, gilde.',
            'quests'        => 'Per tener traccia di varie missioni con personaggi e luoghi.',
            'races'         => 'Se la tua campagna ha più di una razza, questo ti aiuterà a tenerne traccia facilmente.',
            'tags'          => 'Ogni entità può avere diversi tag. I tag possono appartenere ad altri tag e le entità possono essere filtrate per tag.',
        ],
    ],
    'show'                              => [
        'actions'   => [
            'boost' => 'Potenzia campagna',
            'leave' => 'Abbandona campagna',
        ],
        'menus'     => [
            'configuration'     => 'Configurazione',
            'user_management'   => 'Gestione utente',
        ],
        'tabs'      => [
            'default-images'    => 'Immagini predefinite',
            'export'            => 'Esporta',
            'information'       => 'Informazioni',
            'members'           => 'Membri',
            'plugins'           => 'Plugin',
            'recovery'          => 'Recupero',
            'roles'             => 'Ruoli',
            'settings'          => 'Moduli',
        ],
        'title'     => 'Campagna :name',
    ],
    'ui'                                => [
        'fields'    => [
            'entity_image'  => 'Immagine dell\'entità',
            'family_toolip' => 'Famiglia del personaggio',
        ],
        'members'   => [
            'hidden'    => 'Visibile solo agli amministratori della campagna',
            'visible'   => 'Visibile ai membri',
        ],
        'nested'    => [
            'default'   => 'Predefinito',
        ],
        'other'     => 'Altro',
    ],
    'visibilities'                      => [
        'private'   => 'Privata',
        'public'    => 'Pubblica',
        'review'    => 'In attesa di revisione',
    ],
];

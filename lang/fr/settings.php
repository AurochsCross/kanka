<?php

return [
    'account'       => [
        '2fa'               => [
            'actions'               => [
                'disable'   => 'Désactiver l\'authentification à deux facteurs',
                'finish'    => 'Termine la configuration et connecte-toi',
            ],
            'activation_helper'     => 'Pour terminer la configuration de l\'authentification à deux facteurs de ton compte, suis ces instructions.',
            'disable'               => [
                'helper'    => 'S tu souhaites désactiver l\'authentification à deux facteurs, clique sur le bouton ci-dessous. Garde à l\'esprit que cela rendra ton compte vulnérable à toute personne connaissant tes informations de connexion.',
                'title'     => 'Désactiver l\'authentification à deux facteurs',
            ],
            'enable_instructions'   => 'Pour démarrer le processus d\'activation, génère un code QR d\'authentification, puis scanne-le dans l\'application Google Authenticator (:ios, :android) ou une autre application d\'authentification similaire.',
            'enabled'               => 'L\'authentification à deux facteurs est actuellement activée sur ton compte.',
            'error_enable'          => 'Code invalide, ressaye',
            'fields'                => [
                'otp'       => 'Saisi le mot de passe à usage unique fourni par l\'application d\'authentification',
                'qrcode'    => 'Scanne le code QR suivant avec ton application d\'authentification pour générer un mot de passe à usage unique',
            ],
            'generate_qr'           => 'Générer un code QR',
            'helper'                => 'L\'authentification à deux facteurs renforce la sécurité d\'accès en exigeant deux méthodes (également appelées facteurs) pour vérifier ton identité à chaque connexion.',
            'learn_more'            => 'En savoir plus sur l\'authentification à deux facteurs.',
            'social'                => 'L\'authentification à deux facteurs Kanka n\'est activée que pour les utilisateurs qui se connectent à l\'aide de leur adresse e-mail et de leur mot de passe. Modifie ta méthode de connexion dans les paramètres de ton compte avant de pouvoir activer cette option.',
            'success_disable'       => 'L\'authentification à deux facteurs est désactivée.',
            'success_enable'        => 'L\'authentification à deux facteurs est maintenant activée. Reconnecte-toi pour terminer le processus.',
            'success_key'           => 'Ton code QR a été généré. Pour terminer la configuration, suis les étapes suivantes.',
            'title'                 => 'Authentification à deux facteurs',
        ],
        'actions'           => [
            'social'            => 'Changer au login Kanka',
            'update_email'      => 'Modifier l\'email',
            'update_password'   => 'Modifier le mot de passe',
        ],
        'email'             => 'Modification de l\'email',
        'email_success'     => 'Email modifié.',
        'password'          => 'Modification du mot de passe',
        'password_success'  => 'Mot de passe modifié.',
        'social'            => [
            'error'     => 'Tu utilises déjà le login Kanka pour ce compte.',
            'helper'    => 'Ton compte est géré par :provider. Tu peux changer au login Kanka en fournissant un login et un mot de passe.',
            'success'   => 'Ton compte utilise dorénavant le login Kanka.',
            'title'     => 'Social à Kanka',
        ],
        'title'             => 'Compte',
    ],
    'api'           => [
        'helper'    => 'Bienvenue à l\'API de Kanka. Les personal access token permettent d\'accéder aux données d\'un utilisateur lors des requêtes à l\'API.',
        'link'      => 'Lire la documentation',
        'title'     => 'API',
    ],
    'apps'          => [
        'actions'   => [
            'connect'   => 'Lier',
            'remove'    => 'Retirer',
        ],
        'benefits'  => 'Kanka supporte quelques intégrations avec d\'autres services. D\'autres services seront ajoutés dans le futur.',
        'discord'   => [
            'errors'    => [
                'add'   => 'Une erreur est survenue lors du liage de Discord avec le compte Kanka.',
            ],
            'success'   => [
                'add'       => 'Compte Discord lié.',
                'remove'    => 'Compte Discord délié.',
            ],
            'text'      => 'Accès aux rôles automatique.',
            'unlock'    => 'Accès aux rôles Discord',
        ],
        'title'     => 'Intégration d\'app',
    ],
    'boost'         => [
        'exceptions'    => [
            'already_boosted'       => 'La campagne :name est déjà boostée.',
            'exhausted_boosts'      => 'Tu n\'as plus de boost disponible. Retire un boost d\'une campagne avant de pouvoir l\'attribuer à une autre.',
            'exhausted_superboosts' => 'Tu n\'as plus de boosts. Tu as besoin de 3 boosts pour superbooster une campagne.',
        ],
    ],
    'countries'     => [
        'austria'       => 'Autriche',
        'belgium'       => 'Belgique',
        'france'        => 'France',
        'germany'       => 'Allemagne',
        'italy'         => 'Italie',
        'netherlands'   => 'Pays-Bas',
        'spain'         => 'Espagne',
    ],
    'invoices'      => [
        'actions'   => [
            'download'  => 'Télécharger PDF',
            'view_all'  => 'Tout voir',
        ],
        'empty'     => 'Aucune facture',
        'fields'    => [
            'amount'    => 'Montant',
            'date'      => 'Date',
            'invoice'   => 'Facture',
            'status'    => 'Status',
        ],
        'header'    => 'Liste des 24 dernières factures qui peuvent être téléchargées.',
        'status'    => [
            'paid'      => 'Payé',
            'pending'   => 'En attente',
        ],
        'title'     => 'Factures',
    ],
    'layout'        => [
        'success'   => 'Options de mise en page modifiées.',
        'title'     => 'Mise en page',
    ],
    'marketplace'   => [],
    'menu'          => [
        'account'               => 'Compte',
        'api'                   => 'API',
        'appearance'            => 'Apparence',
        'apps'                  => 'Apps',
        'billing'               => 'Méthode de paiement',
        'boosters'              => 'Boosters',
        'invoices'              => 'Factures',
        'notifications'         => 'Notifications',
        'other'                 => 'Autre',
        'patreon'               => 'Patreon',
        'payment_options'       => 'Options de paiement',
        'personal_settings'     => 'Paramètres Personnels',
        'profile'               => 'Profil',
        'settings'              => 'Paramètres',
        'subscription'          => 'Abonnement',
        'subscription_status'   => 'Status d\'abonnement',
    ],
    'patreon'       => [
        'deprecated'    => 'Fonction obsolète - si tu souhaites supporter Kanka, fais-le avec un abonnement. La liaison Patreon est toujours active pour nos Patrons qui ont lié leur compte avant le changement d\'abonnement.',
        'pledge'        => 'Pledge: :name',
        'remove'        => [
            'button'    => 'Délier le compte Patreon',
            'success'   => 'Ton compte Patreon a été délié.',
            'text'      => 'Délier le compte Patreon de Kanka supprime les bonus, le nom du Hall of Fame, les boosters de campagne et d\'autres fonctionnalités liées au supporter de Kanka. Aucun contenu boosté ne sera perdu (par exemple les en-têtes d\'entité). Lors du réabonnement, toutes les données seront à nouveau visibles, y compris la possibilité de booster des campagnes précédemment boostées.',
            'title'     => 'Délier le compte Patreon de Kanka',
        ],
        'title'         => 'Patreon',
    ],
    'profile'       => [
        'actions'   => [
            'update_profile'    => 'Mettre à jour le profil',
        ],
        'avatar'    => 'Image de profil',
        'success'   => 'Mise à jour effectuée.',
        'title'     => 'Profil personnel',
    ],
    'subscription'  => [
        'actions'               => [
            'cancel_sub'        => 'Annuler l\'abonnement',
            'subscribe'         => 'Abonner',
            'update_currency'   => 'Changer la devise',
        ],
        'billing'               => [
            'helper'    => 'Les informations de paiement sont gérées et sauvegardées de manière sécurisée à travers :stripe. Cette méthode de paiement sera utilisée pour tous les abonnements.',
            'saved'     => 'Méthode de paiement',
            'title'     => 'Modifier la méthode de paiement',
        ],
        'cancel'                => [
            'options'   => [
                'competitor'        => 'Passer à un concurrent',
                'financial'         => 'L\'abonnement est trop cher',
                'missing_features'  => 'Fonctionnalités manquantes',
                'not_for'           => 'L\'abonnement n\'est pas pour moi',
                'not_using'         => 'Je n\'utilise pas Kanka actuellement',
                'other'             => 'Autre',
            ],
            'text'      => 'Désolé de te voir partir! L\'annulation de ton abonnement le gardera actif jusqu\'au la fin du mois payé, après quoi tu perdras les bonus de ta campagne et les autres avantages liés au soutien de Kanka. N\'hésite pas à remplir le formulaire suivant pour nous informer de ce que nous pouvons améliorer, ou ce qui a conduit à ta décision.',
        ],
        'cancelled'             => 'L\'abonnement a été annulé. Un nouvel abonnement peut être fait dès que celui-ci arrive à terme le :date.',
        'change'                => [
            'text'  => [
                'monthly'   => 'Abonnement au niveau :tier, facturé mensuellement pour :amount.',
                'yearly'    => 'Abonnement au niveau :tier, facturé annuellement pour :amount.',
            ],
            'title' => 'Changement d\'abonnement',
        ],
        'coupon'                => [
            'check'         => 'Vérifier',
            'invalid'       => 'Code promotionnel invalide.',
            'label'         => 'Code promotionnel',
            'percent_off'   => 'Nous appliquerons un rabais de :percent% sur la première année de l\'abonnement!',
        ],
        'currencies'            => [
            'eur'   => 'EUR',
            'usd'   => 'USD',
        ],
        'currency'              => [
            'title' => 'Changer la devise de facturation',
        ],
        'errors'                => [
            'callback'      => 'Notre gestionnaire de paiement nous a remonté une erreur. Prière de réessayer et nous contacter si le problème persiste.',
            'subscribed'    => 'Erreur lors de la gestion de l\'abonnement. Stripe nous a fourni l\'erreur suivante.',
        ],
        'fields'                => [
            'active_since'      => 'Actif depuis',
            'active_until'      => 'Active jusqu\'à',
            'billing'           => 'Facturation',
            'currency'          => 'Devise',
            'payment_method'    => 'Méthode de paiement',
            'plan'              => 'Abonnement actuel',
            'reason'            => 'Raison',
        ],
        'helpers'               => [
            'alternatives'          => 'Payez votre abonnement en utilisant :method. Ce mode de paiement ne sera pas renouvelé automatiquement à la fin de votre abonnement. :method n\'est disponible qu\'en Euros.',
            'alternatives_warning'  => 'La mise à niveau de l\'abonnement lors de l\'utilisation de cette méthode n\'est pas possible. Veuillez créer un nouvel abonnement à la fin de votre abonnement actuel.',
            'alternatives_yearly'   => 'En raison des restrictions entourant les paiements récurrents, :method n\'est disponible que pour les abonnements annuels',
            'paypal'                => 'Tu préfères utiliser Paypal? Contactes nous à :email si tu souhaites souscrire à un abonnement annuel en utilisant Paypal.',
            'stripe'                => 'La facturation est traité en toute securité par :stripe.',
        ],
        'manage_subscription'   => 'Gérer l\'abonnement',
        'payment_method'        => [
            'actions'       => [
                'add_new'           => 'Ajouter une méthode de paiement',
                'change'            => 'Modifier la méthode de paiement',
                'save'              => 'Enregister la méthode de paiement',
                'show_alternatives' => 'Autres méthodes de paiement',
            ],
            'add_one'       => 'Aucune méthode de paiement actuellement saisie.',
            'alternatives'  => 'Un abonnement peut être souscrit avec ces méthodes de paiement. Cette action ne générera qu\'une seule facture et ne renouvellera pas automatiquement l\'abonnement chaque mois.',
            'card'          => 'Carte',
            'card_name'     => 'Nom sur la carte',
            'country'       => 'Pays de résidence',
            'ending'        => 'Se terminant par',
            'helper'        => 'Cette carte sera utilisée pour les abonnements.',
            'new_card'      => 'Ajouter une méthode de paiement',
            'saved'         => ':brand se terminant par :last4',
        ],
        'periods'               => [
            'monthly'   => 'Menuel',
            'yearly'    => 'Annuel',
        ],
        'placeholders'          => [
            'downgrade_reason'  => '(facultatif) dis-nous pourquoi tu downgrade ton abonnement.',
            'reason'            => '(facultatif) dis-nous pourquoi tu ne souhaites plus être abonné à Kanka. Manquait-il une fonctionnalité? Ta situation financière a-t-elle changé?',
        ],
        'plans'                 => [
            'cost_monthly'  => ':currency :amount facturé mensuellement',
            'cost_yearly'   => ':currency :amount facturé annuellement',
        ],
        'sub_status'            => 'Information d\'abonnement',
        'subscription'          => [
            'actions'   => [
                'cancel'            => 'Annuler l\'abonnement',
                'downgrading'       => 'Prière de nous contacter pour un déclassement',
                'rollback'          => 'Changer à Kobold',
                'subscribe'         => 'Changer à :tier mensuel',
                'subscribe_annual'  => 'Changer à :tier annuel',
            ],
        ],
        'success'               => [
            'alternative'   => 'Le paiement a été enregistré. Une notification sera générée dès le paiement traité et l\'abonnement activé.',
            'callback'      => 'Ton abonnement est réussi! Ton compte sera mis à jour dès que notre gestionnaire de paiement nous informera des changements (cela peut prendre quelques minutes).',
            'cancel'        => 'Ton abonnement est annulé. Il sera toujours actif jusqu\'à la fin de la période actuelle.',
            'currency'      => 'Devise préférée sauvegardée.',
            'subscribed'    => 'Ton abonnement est réussi! N\'oublie pas de t\'abonner à la newsletter Community Vote pour être averti lorsqu\'un vote sera ouvert. Tu peux modifier tes paramètres de newsletter sur ta page de profil.',
        ],
        'tiers'                 => 'Niveaux d\'abonnements',
        'trial_period'          => 'Les abonnements annuels ont une période d\'annulation de 14 jours. Nous contacter à :email pour annuler un abonnement et recevoir un remboursement.',
        'upgrade_downgrade'     => [
            'button'    => 'Information sur l\'upgrade/downgrade',
            'cancel'    => [
                'bullets'   => [
                    'bonuses'   => 'Tes bonus restent activés jusqu\'à la fin de la période de paiement.',
                    'boosts'    => 'La même chose se passe pour les campagnes boostées. Les fonctionnalités boostées deviennent invisibles mais les données ne sont pas supprimé lorsqu\'une campagne n\'est plus boostée.',
                    'kobold'    => 'Pour annuler ton abonnement, change au tier Kobold.',
                ],
                'title'     => 'Lors de l\'annulation d\'un abonnement',
            ],
            'downgrade' => [
                'bullets'           => [
                    'end'   => 'L\'abonnement actuel reste actif jusqu\'à la fin du cycle de paiement, après quoi le nouvel abonnement sera mis en place.',
                ],
                'provide_reason'    => 'Si tu peux, partages avec nous pourquoi tu downgrades ton abonnement.',
                'title'             => 'Lors du passage à un niveau inférieur',
            ],
            'upgrade'   => [
                'bullets'   => [
                    'immediate' => 'La méthode de paiement sera facturée immédiatement et les nouvelles fonctionnalités seront accessibles.',
                    'prorate'   => 'Lors du changement de Owlbear à Elemental, seulement la différence sera facturée.',
                ],
                'title'     => 'Lors du passage à un niveau supérieur',
            ],
        ],
        'warnings'              => [
            'incomplete'    => 'Nous n\'avons pas pu débiter la carte de crédit. Vérifier les informations de la carte et mettre à jour si nécessaire. Nous essayerons à nouveau durant les prochains jours. Si ça échoue de nouveau, l\'abonnement sera annulé.',
            'patreon'       => 'Ce compte est actuellement lié à Patreon. Prière de délier le compte dans les paramètres :patreon avant de pouvoir s\'abonner à Kanka.',
        ],
    ],
];

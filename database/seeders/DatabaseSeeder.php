<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Project;
use App\Models\QuoteRequest;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@tamayaz-ci.com'],
            [
                'name' => 'Direction TAMAYAZ',
                'password' => Hash::make('Tamayaz2026!'),
                'email_verified_at' => now(),
            ]
        );

        $categoriesData = [
            // Pôle 1 : Équipements & Consommables Médicaux
            [
                'name' => 'Diagnostic & Monitoring Médical',
                'slug' => 'diagnostic-monitoring-medical',
                'sector' => 'medical',
                'description' => 'Appareils de diagnostic de précision pour pharmacies, infirmeries, cliniques et cabinets médicaux.',
                'icon' => 'activity',
                'sort_order' => 1,
                'products' => [
                    [
                        'name' => 'Moniteur Multiparamétrique Patient Pro-12"',
                        'slug' => 'moniteur-multiparametrique-patient-pro-12',
                        'reference' => 'TMZ-MED-101',
                        'image_url' => 'images/products/moniteur-patient.jpg',
                        'short_description' => 'Moniteur haute résolution 12 pouces (ECG, SpO2, PNI, Température, Respiration) pour salles d\'observation et cliniques.',
                        'description' => 'Conçu pour la surveillance continue des patients en clinique, hôpital ou infirmerie médicale majeure. Écran couleur LED 12,1 pouces haute visibilité, alarmes sonores et visuelles paramétrables, batterie lithium longue durée intégrée pour le transport intra-hospitalier.',
                        'specifications' => [
                            'Paramètres' => 'ECG 5 brins, SpO2, PNI, Respiration, 2 Températures',
                            'Écran' => '12.1" TFT LCD Couleur HD',
                            'Autonomie batterie' => '4 heures en fonctionnement continu',
                            'Certification' => 'CE Médical / ISO 13485',
                        ],
                        'badge' => 'Produit Phare',
                        'in_stock' => true,
                        'is_featured' => true,
                    ],
                    [
                        'name' => 'Tensiomètre Électronique Professionnel sur Pied & Brassard',
                        'slug' => 'tensiometre-electronique-professionnel-pharmacie',
                        'reference' => 'TMZ-MED-102',
                        'image_url' => 'images/products/tensiometre-pro.jpg',
                        'short_description' => 'Tensiomètre numérique de haute précision spécialement adapté aux officines de pharmacie et salles de consultation.',
                        'description' => 'Appareil de mesure oscillométrique rapide et fiable, idéal pour l\'espace conseil des pharmacies et les infirmeries d\'entreprise. Doté d\'un indicateur d\'arythmie cardiaque, d\'un grand écran rétroéclairé et livré avec brassards adulte et large.',
                        'specifications' => [
                            'Méthode de mesure' => 'Oscillométrique automatique haute précision',
                            'Plage de mesure' => 'SYS 60-260 mmHg / DIA 40-200 mmHg',
                            'Mémoire' => '2 x 120 mesures horodatées',
                            'Usage recommandé' => 'Pharmacies, Infirmeries, Cabinets médicaux',
                        ],
                        'badge' => 'Spécial Pharmacie',
                        'in_stock' => true,
                        'is_featured' => true,
                    ],
                    [
                        'name' => 'Électrocardiographe Numérique 12 Pistes avec Interprétation',
                        'slug' => 'electrocardiographe-numerique-12-pistes',
                        'reference' => 'TMZ-MED-103',
                        'image_url' => 'images/products/ecg-12-pistes.jpg',
                        'short_description' => 'ECG 12 pistes compact à écran tactile avec imprimante thermique haute définition et analyse automatique.',
                        'description' => 'Électrocardiographe numérique de dernière génération offrant une acquisition simultanée sur 12 dérivations, des filtres numériques anti-artéfacts performants et une impression claire sur papier thermique 210 mm.',
                        'specifications' => [
                            'Dérivations' => '12 dérivations simultanées',
                            'Imprimante' => 'Thermique intégrée 210 mm',
                            'Connectivité' => 'USB, LAN, Export PDF',
                            'Garantie' => '2 ans avec support technique Abidjan',
                        ],
                        'badge' => 'Haute Précision',
                        'in_stock' => true,
                        'is_featured' => false,
                    ],
                ],
            ],
            [
                'name' => 'Consommables Médicaux & Officine',
                'slug' => 'consommables-medicaux-officine',
                'sector' => 'medical',
                'description' => 'Consommables stériles, kits de soins, pansements, gants d\'examen et dispositifs médicaux à usage unique.',
                'icon' => 'shield-plus',
                'sort_order' => 2,
                'products' => [
                    [
                        'name' => 'Pack Complet Consommables d\'Infirmerie & Premiers Secours',
                        'slug' => 'pack-complet-consommables-infirmerie-premiers-secours',
                        'reference' => 'TMZ-CON-201',
                        'image_url' => 'images/products/pack-consommables.jpg',
                        'short_description' => 'Dotation complète en consommables stériles pour équiper ou réapprovisionner les infirmeries scolaires, industrielles et pharmacies.',
                        'description' => 'Ensemble complet comprenant des compresses stériles, bandes extensibles, sparadraps hypoallergéniques, gants d\'examen nitrile non poudrés, seringues stériles à usage unique, solutions antiseptiques, masques chirurgicaux 3 plis et collecteurs d\'aiguilles DASRI.',
                        'specifications' => [
                            'Conditionnement' => 'Carton de dotation standard ou sur-mesure',
                            'Stérilisation' => 'Oxyde d\'éthylène / Rayons Gamma',
                            'Conformité' => 'Normes Européennes CE & exigences AIRP Côte d\'Ivoire',
                            'Disponibilité' => 'Livraison express Abidjan & intérieur du pays',
                        ],
                        'badge' => 'Best-Seller',
                        'in_stock' => true,
                        'is_featured' => true,
                    ],
                    [
                        'name' => 'Gants d\'Examen Nitrile Non Poudrés (Lot Professionnel)',
                        'slug' => 'gants-examen-nitrile-non-poudres-lot-pro',
                        'reference' => 'TMZ-CON-202',
                        'image_url' => 'images/products/gants-nitrile.jpg',
                        'short_description' => 'Boîtes de 100 gants en nitrile bleu haute résistance, sans latex, texturés aux doigts pour une préhension optimale.',
                        'description' => 'Protection barrière supérieure contre les agents biologiques et chimiques. Idéal pour la dispensation en pharmacie, les soins infirmiers et les analyses en laboratoire.',
                        'specifications' => [
                            'Matière' => '100% Nitrile synthétique (sans latex, sans poudre)',
                            'Tailles disponibles' => 'S, M, L, XL',
                            'Conditionnement' => 'Carton de 10 boîtes de 100 gants',
                            'Norme' => 'EN 455 / EN 374',
                        ],
                        'badge' => 'En Stock Permanent',
                        'in_stock' => true,
                        'is_featured' => false,
                    ],
                ],
            ],
            [
                'name' => 'Stérilisation, Urgence & Réanimation',
                'slug' => 'sterilisation-urgence-reanimation',
                'sector' => 'medical',
                'description' => 'Autoclaves de classe B, défibrillateurs, aspirateurs chirurgicaux et équipements d\'urgence.',
                'icon' => 'heart-pulse',
                'sort_order' => 3,
                'products' => [
                    [
                        'name' => 'Autoclave de Stérilisation Médicale Classe B - 23 Litres',
                        'slug' => 'autoclave-sterilisation-medicale-classe-b-23l',
                        'reference' => 'TMZ-STE-301',
                        'image_url' => 'images/products/autoclave-classe-b.jpg',
                        'short_description' => 'Stérilisateur à vapeur d\'eau Classe B avec pompe à vide fractionné, écran LCD et imprimante de traçabilité.',
                        'description' => 'Garantit une stérilisation irréprochable des instruments chirurgicaux, dentaires et médicaux (emballés ou non, corps creux et poreux). Cuve en acier inoxydable médical avec cycles automatiques rapides et test Bowie & Dick intégré.',
                        'specifications' => [
                            'Capacité de cuve' => '23 Litres (3 plateaux inox)',
                            'Classe' => 'Classe B (Norme EN 13060)',
                            'Traçabilité' => 'Imprimante thermique intégrée + port USB',
                            'Sécurité' => 'Double verrouillage électromécanique de porte',
                        ],
                        'badge' => 'Certifié Classe B',
                        'in_stock' => true,
                        'is_featured' => true,
                    ],
                ],
            ],

            // Pôle 2 : Mobilier Médical & Professionnel
            [
                'name' => 'Mobilier Hospitalier & d\'Infirmerie',
                'slug' => 'mobilier-hospitalier-infirmerie',
                'sector' => 'mobilier',
                'description' => 'Lits médicalisés, tables d\'examen, chariots d\'urgence et armoires médicales pour infirmeries et cliniques.',
                'icon' => 'bed',
                'sort_order' => 4,
                'products' => [
                    [
                        'name' => 'Lit Médicalisé Électrique 3 Fonctions avec Barrières ABS',
                        'slug' => 'lit-medicalise-electrique-3-fonctions-abs',
                        'reference' => 'TMZ-MOB-401',
                        'image_url' => 'images/products/lit-medicalise.jpg',
                        'short_description' => 'Lit d\'hospitalisation électrique (relève-buste, relève-jambes, hauteur variable) avec télécommande, têtes ABS et roues à frein centralisé.',
                        'description' => 'Conçu pour le confort optimal du patient et l\'ergonomie du personnel soignant. Structure robuste en acier traité époxy antibactérien, 4 barrières latérales rabattables en ABS, potence à sérum incluse et matelas médical imperméable.',
                        'specifications' => [
                            'Dimensions' => '2150 x 1050 x 460-750 mm',
                            'Motorisation' => '3 moteurs médicaux silencieux avec batterie de secours',
                            'Charge maximale' => '250 kg en sécurité',
                            'Accessoires inclus' => 'Matelas clinique, tige porte-sérum, barrières ABS',
                        ],
                        'badge' => 'Mobilier Médical',
                        'in_stock' => true,
                        'is_featured' => true,
                    ],
                    [
                        'name' => 'Divan d\'Examen Médical & Infirmerie avec Porte-Rouleau',
                        'slug' => 'divan-examen-medical-infirmerie',
                        'reference' => 'TMZ-MOB-402',
                        'image_url' => 'images/products/divan-examen.jpg',
                        'short_description' => 'Table d\'examen à têtière réglable par crémaillère, sellerie simili-cuir ignifugé lavable et structure acier inoxydable/époxy.',
                        'description' => 'Indispensable pour toute infirmerie d\'entreprise, établissement scolaire, cabinet médical ou salle de soins en pharmacie. Sellerie haute densité grand confort facile à désinfecter.',
                        'specifications' => [
                            'Structure' => 'Acier tubulaire haute résistance ou Inox 304',
                            'Revêtement' => 'Simili-cuir médical antibactérien et imperméable',
                            'Têtière' => 'Inclinable multi-positions jusqu\'à +65°',
                            'Charge supportée' => '180 kg',
                        ],
                        'badge' => 'Indispensable Infirmerie',
                        'in_stock' => true,
                        'is_featured' => false,
                    ],
                ],
            ],
            [
                'name' => 'Agencement & Mobilier de Pharmacie',
                'slug' => 'agencement-mobilier-pharmacie',
                'sector' => 'mobilier',
                'description' => 'Comptoirs d\'officine, gondoles centrales, rayonnages muraux, colonnes à tiroirs et mobilier de back-office pharmaceutique.',
                'icon' => 'layout-grid',
                'sort_order' => 5,
                'products' => [
                    [
                        'name' => 'Ligne Complète d\'Agencement Officine & Comptoirs de Pharmacie',
                        'slug' => 'ligne-complete-agencement-officine-comptoirs-pharmacie',
                        'reference' => 'TMZ-MOB-501',
                        'image_url' => 'images/products/agencement-pharmacie.jpg',
                        'short_description' => 'Mobilier sur-mesure pour pharmacies : comptoirs de délivrance ergonomiques, gondoles rétroéclairées LED et colonnes de rangement.',
                        'description' => 'TAMAYAZ conçoit, fournit et installe l\'ensemble du mobilier de votre pharmacie en Côte d\'Ivoire. Nos solutions optimisent le parcours patient, valorisent l\'espace parapharmacie et facilitent le travail quotidien des pharmaciens et auxiliaires.',
                        'specifications' => [
                            'Matériaux' => 'Mélaminé haute densité hydrofuge, acier thermolaqué et verre trempé',
                            'Éclairage' => 'Bandeaux LED intégrés sous tablettes',
                            'Personnalisation' => 'Charte couleur et dimensions 100% sur-mesure',
                            'Prestation' => 'Étude 3D, fabrication, livraison et pose à Abidjan & intérieur',
                        ],
                        'badge' => 'Clé en Main',
                        'in_stock' => true,
                        'is_featured' => true,
                    ],
                ],
            ],

            // Pôle 3 : Génie Civil & Aménagement
            [
                'name' => 'Génie Civil, BTP & Aménagement Sanitaire',
                'slug' => 'genie-civil-btp-amenagement-sanitaire',
                'sector' => 'genie_civil',
                'description' => 'Études techniques, construction, réhabilitation et aménagement de pharmacies, cliniques, infirmeries et bâtiments professionnels.',
                'icon' => 'building-2',
                'sort_order' => 6,
                'products' => [
                    [
                        'name' => 'Construction & Réhabilitation Clé en Main de Pharmacies et Cliniques',
                        'slug' => 'construction-rehabilitation-cle-en-main-pharmacies-cliniques',
                        'reference' => 'TMZ-BTP-601',
                        'image_url' => 'images/products/chantier-clinique-pharmacie.jpg',
                        'short_description' => 'Maîtrise d\'œuvre complète : gros œuvre, second œuvre, façades vitrées, faux-plafonds, sols techniques hospitaliers et électricité.',
                        'description' => 'Le pôle Génie Civil de TAMAYAZ accompagne les pharmaciens, médecins et promoteurs immobiliers dans la construction neuve, l\'extension ou la rénovation complète de leurs locaux. De l\'étude architecturale à la remise des clés, nous respectons les normes d\'hygiène, d\'accessibilité et de sécurité en vigueur en Côte d\'Ivoire.',
                        'specifications' => [
                            'Domaines d\'intervention' => 'Gros œuvre, maçonnerie, charpente, étanchéité, VRD',
                            'Second œuvre médical' => 'Sols souples antibactériens, cloisons étanches, menuiserie alu',
                            'Lots techniques' => 'Climatisation médicale, plomberie sanitaire, groupe électrogène',
                            'Zone d\'intervention' => 'Grand Abidjan et toute la Côte d\'Ivoire',
                        ],
                        'badge' => 'Pôle Génie Civil',
                        'in_stock' => true,
                        'is_featured' => true,
                    ],
                    [
                        'name' => 'Aménagement d\'Infirmeries d\'Entreprise & Laboratoires Médicaux',
                        'slug' => 'amenagement-infirmeries-entreprise-laboratoires-medicaux',
                        'reference' => 'TMZ-BTP-602',
                        'image_url' => 'images/products/amenagement-infirmerie-labo.jpg',
                        'short_description' => 'Création et mise aux normes d\'espaces médicaux en entreprise, écoles, usines et centres de diagnostic.',
                        'description' => 'Transformation et aménagement d\'espaces dédiés à la santé au travail ou aux analyses médicales : cloisonnement acoustique, paillasses de laboratoire, points d\'eau à commande non manuelle, éclairage normé et livraison avec équipement médical complet.',
                        'specifications' => [
                            'Prestation combinée' => 'Travaux de génie civil + Mobilier + Équipement médical',
                            'Délai moyen' => 'Planning contractuel garanti avec suivi de chantier',
                            'Conformité' => 'Normes hygiène, sécurité et médecine du travail',
                            'Devis' => 'Visite technique sur site gratuite à Abidjan',
                        ],
                        'badge' => 'Offre Intégrée 3-en-1',
                        'in_stock' => true,
                        'is_featured' => false,
                    ],
                ],
            ],
        ];

        foreach ($categoriesData as $catData) {
            $products = $catData['products'];
            unset($catData['products']);

            $category = Category::query()->updateOrCreate(
                ['slug' => $catData['slug']],
                array_merge($catData, ['is_active' => true])
            );

            foreach ($products as $prodData) {
                Product::query()->updateOrCreate(
                    ['slug' => $prodData['slug']],
                    array_merge($prodData, [
                        'category_id' => $category->id,
                        'is_active' => true,
                    ])
                );
            }
        }

        $projectsData = [
            [
                'title' => 'Équipement Complet & Agencement d\'une Pharmacie Moderne à Cocody',
                'slug' => 'equipement-agencement-pharmacie-moderne-cocody',
                'sector' => 'mobilier',
                'client_type' => 'Officine de Pharmacie',
                'location' => 'Riviera Palmeraie, Cocody - Abidjan',
                'image_url' => 'images/projects/projet-pharmacie-cocody.jpg',
                'summary' => 'Rénovation intérieure, pose du mobilier d\'officine rétroéclairé et fourniture des équipements de diagnostic pour l\'espace conseil patient.',
                'description' => 'Intervention globale des équipes TAMAYAZ comprenant les travaux de second œuvre, la fabrication et l\'installation des comptoirs de délivrance, des gondoles parapharmacie, des colonnes de rangement arrière-officine ainsi que la dotation en tensiomètres professionnels et matériel d\'orthopédie.',
                'completed_at' => '2026-06-15',
                'is_featured' => true,
            ],
            [
                'title' => 'Dotation Médicale & Mobilier pour une Infirmerie Scolaire et Universitaire',
                'slug' => 'dotation-medicale-mobilier-infirmerie-scolaire',
                'sector' => 'medical',
                'client_type' => 'Établissement d\'Enseignement Supérieur',
                'location' => 'Cocody Deux-Plateaux, Abidjan',
                'image_url' => 'images/projects/projet-infirmerie-scolaire.jpg',
                'summary' => 'Fourniture de lits d\'observation, divans d\'examen, chariots de soins, stérilisateur et consommables médicaux de premiers secours.',
                'description' => 'Mise en place complète d\'une infirmerie moderne prête à accueillir les étudiants et le personnel : installation de 4 lits médicalisés, armoires à pharmacie sécurisées, défibrillateur, autoclave de stérilisations et lot annuel de consommables médicaux certifiés.',
                'completed_at' => '2026-08-20',
                'is_featured' => true,
            ],
            [
                'title' => 'Travaux de Génie Civil & Réhabilitation d\'un Centre Médical Polyvalent',
                'slug' => 'travaux-genie-civil-rehabilitation-centre-medical',
                'sector' => 'genie_civil',
                'client_type' => 'Clinique & Centre de Santé',
                'location' => 'Marcory / Bingerville, Abidjan',
                'image_url' => 'images/projects/projet-centre-medical.jpg',
                'summary' => 'Extension du bâtiment, mise aux normes des salles de soins, revêtements antibactériens, réseau électrique sécurisé et aménagement des salles d\'hospitalisation.',
                'description' => 'Réalisation par le pôle Génie Civil de TAMAYAZ des travaux de gros œuvre et second œuvre technique : création de nouvelles salles de consultation, pose de revêtements de sol hospitaliers homogènes, réfection complète de la plomberie sanitaire et de la climatisation, suivie de l\'installation des équipements biomédicaux.',
                'completed_at' => '2026-09-10',
                'is_featured' => true,
            ],
        ];

        foreach ($projectsData as $projectData) {
            Project::query()->updateOrCreate(
                ['slug' => $projectData['slug']],
                $projectData
            );
        }

        if (QuoteRequest::query()->count() === 0) {
            $firstProduct = Product::query()->first();

            QuoteRequest::query()->create([
                'product_id' => $firstProduct?->id,
                'sector' => 'medical',
                'request_type' => 'devis',
                'full_name' => 'Dr. Kouassi Konan',
                'company_name' => 'Pharmacie Sainte-Grâce Riviera',
                'email' => 'contact@pharmacie-saintegrace.ci',
                'phone' => '+225 07 08 11 22 33',
                'subject' => 'Devis équipement salle de conseil et tensiomètres',
                'message' => 'Bonjour TAMAYAZ, nous souhaitons recevoir une cotation pour l\'équipement de notre espace conseil patient ainsi qu\'un lot de consommables médicaux.',
                'quantity' => 5,
                'status' => 'nouveau',
            ]);

            QuoteRequest::query()->create([
                'product_id' => null,
                'sector' => 'genie_civil',
                'request_type' => 'devis',
                'full_name' => 'M. Ibrahim Touré',
                'company_name' => 'Groupe Scolaire Excellence',
                'email' => 'direction@gs-excellence.ci',
                'phone' => '+225 05 04 55 66 77',
                'subject' => 'Aménagement et équipement complet d\'une infirmerie scolaire',
                'message' => 'Nous construisons un nouveau bâtiment et souhaitons confier à TAMAYAZ l\'aménagement de l\'infirmerie (travaux + mobilier + matériel médical).',
                'quantity' => 1,
                'status' => 'en_cours',
            ]);
        }
    }
}

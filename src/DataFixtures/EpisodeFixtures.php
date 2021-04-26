<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Episode;
use App\Service\Slugify;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    const EPISODES = [
        'Passé décomposé' => [
            'number' => 1,
            'synopsis' => "Rick Grimes, shérif, est blessé à la suite d'une course-poursuite. Il se retrouve dans le coma. Cependant, lorsqu'il se réveille dans l'hôpital, il ne découvre que désolation et cadavres. Se rendant vite compte qu'il est seul, il décide d'essayer de retrouver sa femme Lori et son fils Carl. Lorsqu'il arrive chez lui, il s'aperçoit que sa maison est vide et que sa famille a disparu. Puis en ressortant de chez lui, il reçoit un coup sur la tête et tombe inconscient. Rick a en fait été assommé par Duane, le fils de Morgan, un médecin qui l'avait pris pour un zombie . Rick est désorienté lorsque Morgan lui apprend que l'humanité a été décimée par un phénomène étrange qui transforme les humains en errants. Il apprend comment le père et son fils font pour survivre (éviter la lumière et le bruit qui attirent les zombies). Le lendemain, Rick accompagne Morgan et Duane au commissariat pour leur donner des armes afin de se défendre, en prendre pour lui, et les munir, lui et Morgan, de talkie-walkie dans le but de rester en contact. Rick décide de partir pour Atlanta où il est persuadé que son fils et sa femme sont, car Morgan a entendu une rumeur selon laquelle il y aurait un camp de réfugiés. Les trois survivants promettent de se retrouver plus tard. Lorsque Rick se dirige vers la ville, il découvre que les rues sont jonchées de cadavres, mais aussi remplies de rôdeurs. Rick est dépassé, il laisse tomber son sac d'armes au milieu de la rue, et se réfugie dans un tank. C'est alors qu'une voix retentit dans la radio du char.",
            'season' => "season_1",
        ],
        'Tripes' => [
            'number' => 2,
            'synopsis' => "Rick parvient à s'échapper du tank grâce à l'aide de Glenn, dont il avait entendu la voix à la radio. Rick et Glenn se réunissent avec les compagnons de Glenn, un autre groupe de survivants dont Andrea, T-dog, Merle, Morales, Jacqui, venus pour se ravitailler au supermarché. Cependant, l'arrivée mouvementée de Rick les met tous en péril, l'attention des zombies ayant été attirée sur leur cachette. Assiégé par les zombies, le groupe parvient brièvement à communiquer par radio avec le groupe de Shane et Lori, mais ceux-ci décident qu'ils ne peuvent les aider, la présence de Rick ne leur ayant pas encore été communiquée. Dans le petit groupe cloîtré à l'intérieur du supermarché, les tensions s'exacerbent, particulièrement entre T-Dog, un noir et Merle Dixon, un blanc raciste, ce qui conduit Rick à intervenir en menottant Merle à un tuyau sur le toit du magasin. Rick, Andréa et Glenn planifient leur évasion du magasin toujours assiégé, l'idée est de se couvrir des lambeaux de chair et des boyaux des cadavres pour masquer leur odeur trop reconnaissable afin de pouvoir circuler parmi les zombies et atteindre des camions. Malgré la pluie qui a failli contrarier ce plan, le groupe parvient à s'échapper, dans un fourgon Dodge pour Andrea, Jacquie, T-Dog, Morales et Rick et une voiture pour Glenn. Seul Merle manque à l'appel après que T-Dog a accidentellement perdu la clé dans une canalisation, laissant Merle attaché au tuyau. Seule précaution : la porte d'accès au toit a été cadenassée pour préserver autant que possible Merle des rôdeurs…",
            'season' => "season_1",
        ],
        'T’as qu’à discuter avec les grenouilles' => [
            'number' => 3,
            'synopsis' => "T’as qu’à discuter avec les grenouilles", 3, "De retour au camp avec le groupe de survivants du supermarché, Rick retrouve enfin et avec beaucoup d'émotion sa femme Lori et son fils Carl. Andrea quant à elle, rejoint sa jeune sœur Amy. Mais très vite, malgré l'intrusion d'un zombie près du camp, Rick décide, contre l'avis de Shane, de retourner à Atlanta chercher Merle Dixon ainsi que son sac d'armes abandonné en route et récupérer au passage le talkie-walkie laissé dans le sac et ainsi prévenir Morgan de ne pas se rendre dans le piège d'Atlanta. Il est accompagné de Daryl Dixon, le frère de Merle, plus jeune mais tout aussi violent, ainsi que Glenn qui connaît bien les lieux et T-Dog qui se sent redevable et Andrea. Lori prévient Shane de rester à distance de sa famille maintenant que Rick est de retour, car Shane lui avait dit que Rick était mort à l'hôpital. Les tensions s'exacerbent au camp entre une femme, Carole et son mari violent, Ed. Amy intervient pour prendre la défense de Carole avant qu'une bagarre éclate, au cours de laquelle Shane donne libre cours à sa colère. Il frappe Ed jusqu'à presque le tuer, ce qui effraie plusieurs témoins de la scène. L'équipe de rescousse parvient à Atlanta mais une fois arrivée sur le toit, elle découvre que Merle a utilisé une scie pour se couper la main et se libérer des menottes. Il a visiblement perdu beaucoup de sang mais reste introuvable…",
            'season' => "season_1",
        ],
        'Le Gang' => [
            'number' => 4,
            'synopsis' => "En cherchant Merle, le groupe essaie aussi, par la même occasion, de retrouver le sac d'armes mais un autre groupe de survivants, également en quête des armes, les attaque. Le groupe parvient à capturer un attaquant blessé, Miguelito, mais les autres assaillants s'enfuient en voiture en emmenant Glenn comme otage. Après l'interrogatoire de leur otage, Rick et ses camarades apprennent le lieu de la cachette de leurs opposants et espèrent procéder à un échange de prisonniers. Le deuxième groupe dirigé par leur chef Guillermo, alias « G », refuse, exigeant le sac d'armes en plus du prisonnier. Le bain de sang est évité grâce à l'arrivée d'une personne âgée (la grand-mère d'un des hispaniques) qui met fin à la confrontation. Rick Grimes et ses compagnons se rendent compte que l'image belliqueuse que leurs hôtes se donnent n'est qu'une façade : ce « gang » est en fait constitué d'anciens employés d'un pensionnat reculé de personnes âgées encore occupé par les pensionnaires, ainsi que de membres de leurs familles, qui se cachent et tentent de se protéger des attaques de rôdeurs. Rick leur laisse quelques armes pour leur défense et chaque groupe repart de son côté, au complet. Au moment de reprendre le fourgon, ils découvrent que Merle l'a volé et a ramené une dizaines de rodeur au camps. Plusieurs membres sont tués, dont Amy, la jeune sœur d'Andrea et Ed, le mari de Carole. Le groupe de Rick arrive au camp juste à temps pour éliminer les derniers rôdeurs et sauver le reste du groupe. Avant ça, un des membres du groupe, Jim, avait fait un rêve où il creusait des trous dans la terre mais à son réveil il ne se souvient plus pourquoi il creusait. Au moment de l'attaque, il s'en est souvenu : c'était pour enterrer les morts du groupe.",
            'season' => "season_1",
        ],
        'Feux de forêt' => [
            'number' => 5,
            'synopsis' => "Les cadavres sont enterrés, ceux des rôdeurs brûlés, mais Andrea protège le corps d'Amy jusqu'à son réveil en rôdeur , pour finir par l'achever. Dale, la voyant totalement bouleversée, tente en vain de la réconforter. Jim, un des survivants, révèle qu'il a été mordu par un rôdeur durant l'attaque et les membres du groupe décident de l'amener au Centre pour le contrôle et la prévention des maladies, dans l'espoir d'y trouver un vaccin. Mais ce projet est une source de conflit entre Shane et Rick, Shane étant persuadé que le CDC sera une impasse. Une seule famille, les Morales, se sépare du groupe, décidant de retourner dans leur famille à Birmingham, Alabama et les membres restants partent pour le CDC. Mais durant le trajet, l'état de Jim empire et celui-ci demande aux autres de le laisser mourir seul dans la forêt. Le groupe arrive ensuite à l'immeuble du CDC, dans lequel un scientifique, Edwin Jenner, s'est enfermé pour poursuivre des tests sur le virus des zombies. Il vient juste de perdre son seul échantillon de test du virus et annonce à la caméra qui le surveille (mais y a-t-il encore quelqu'un de l'autre côté ?) qu'il envisage de se suicider. Au moment où le groupe se prépare à partir, croyant l'immeuble vide, Rick remarque qu'une caméra bouge et il supplie qu'on le laisse entrer avec son groupe. Les portes s'ouvrent alors à la stupéfaction du groupe de survivants.",
            'season' => "season_1",
        ],
        'Sujet-test 19' => [
            'number' => 6,
            'synopsis' => "Edwin Jenner accueille les survivants au CDC. Le petit groupe profite d'un repos provisoire. Andrea reste dans un état dépressif et Dale tente vainement de la réconforter. Après un repas et une nuit de repos, Jenner leur explique ce qu'il sait de la situation en leur montrant la vidéo de l'évolution du Sujet-Test 19. À la fin de la video, les survivants remarquent un compte à rebours, Jenner leur explique que c'est le temps restant avant l'extinction du groupe électrogène. Les survivants apprennent qu'à la fin de ce délai, tout le CDC sera détruit. La tension monte alors entre ceux qui veulent rester pour mourir et ceux qui veulent tenter leur chance dans le monde extérieur, infesté de morts-vivants. Finalement Jacquie reste avec Jenner, le reste du groupe parvenant, de justesse, à sortir du bâtiment, afin de se mettre en route vers une destination inconnue.",
            'season' => "season_1",
        ],
        'Ce qui nous attend' => [
            'number' => 1,
            'synopsis' => "Après l'explosion du CDC, les survivants reprennent la route et se dirigent vers Fort Benning. Après un arrêt inopiné au milieu de l'autoroute dû à un carambolage de véhicules abandonnés, le groupe se fait attaquer par une horde de rôdeurs. Poursuivie par deux rôdeurs, Sophia s'enfuit alors dans les bois et malgré l'intervention de Rick, elle finit par se perdre. Le groupe part à sa recherche.",
            'season' => "season_2",
        ],
        'Saignée' => [
            'number' => 2,
            'synopsis' => "Après que Carl s'est fait tirer dessus par un chasseur, Rick trouve de l'aide chez Hershel Greene, un vétérinaire vivant dans une ferme non loin de l'autoroute. Il découvre alors que le chasseur est Otis, un membre de la famille de Hershel. Pendant ce temps, les autres cherchent Sophia dans les bois tandis que Dale et T-Dog restent au camping-car. Plus tard, Lori rejoint Rick à la ferme de Hershel, ce dernier leur annonce que Carl a besoin d'être opéré mais qu'il a besoin de matériel. Shane et Otis se dévouent pour aller en ville. Là-bas, ils se font attaquer par une horde de rôdeurs.",
            'season' => "season_2",
        ],
        'Le Tout pour le tout' => [
            'number' => 3,
            'synopsis' => "À court de munitions, Shane décide de tirer sur Otis pour faire diversion et lui permettre de s'enfuir avec le matériel. De retour à la ferme, il raconte qu'Otis s'est sacrifié pour que Carl puisse être soigné. Sophia, quant à elle, reste introuvable et les recherches se poursuivent.",
            'season' => "season_2",
        ],
    ];

    protected $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager)
    {
        $i = 1;
        foreach (self::EPISODES as $title => $data) {
            $episode = new Episode();
            $episode->setTitle($title);
            $episode->setNumber($data['number']);
            $episode->setSynopsis($data['synopsis']);
            $episode->setSeason($this->getReference($data['season']));
            $slug = $this->slugify->generate($title);
            $episode->setSlug($slug);
            $manager->persist($episode);
            $this->addReference('episode_' . $i, $episode);
            $i++;
        }
        $faker = Faker\Factory::create('fr_FR');
        $nbSaison = 7;
        $nbEpisode = 10;
        for ($i=1; $i < 48; $i++) {
            for ($j=1; $j <= 12; $j++) {
                $episode = new Episode();
                $episode->setTitle($faker->sentence(2));
                $episode->setNumber($j);
                $episode->setSynopsis($faker->text(200));
                $episode->setSeason($this->getReference('season_' . $nbSaison));
                $slug = $this->slugify->generate($episode->getTitle());
                $episode->setSlug($slug);
                $manager->persist($episode);
                $this->addReference('episode_' . $nbEpisode, $episode);
                $nbEpisode++;
            }
            $nbSaison++;
        };
        $manager->flush();
    }

    public function getDependencies()
    {
        return [SeasonFixtures::class];
    }
}

<?php
namespace Ulysse\Business\ConfigurationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ulysse\Business\ConfigurationBundle\Entity\Configuration;

class LoadConfigurationData  extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $mentionlegal = '<p style="text-align: justify">
	<strong><font size="4">1. Présentation du site :</font><br />
	 </strong><br />
	Conformément aux dispositions des articles 6-III et 19 de la Loi n° 2004-575 du 21 juin 2004 pour la Confiance dans l\'économie numérique, dite L.C.E.N., nous portons à la connaissance des utilisateurs et visiteurs du site : <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> les informations suivantes :</p>
<p style="text-align: justify">
	<b>Informations légales : </b></p>
<p style="text-align: justify">
        Statut du propriétaire : <strong>societe</strong><br />
	Préfixe : <strong>SARL</strong><br />
	Nom de la Société :<strong> Ulysse</strong><br />
	Adresse : <strong>20 rue claude Tillier 75013 Paris</strong><br />
	Tél  : <strong>0175236589</strong><br />
	Au Capital de :<strong> 250000 €</strong><br />
	SIRET :  <strong>418974849922   </strong>R.C.S. :<strong> 85489448941</strong><br />
	Numéro TVA intracommunautaire : <strong>2564849841</strong><br />
	Adresse de courrier électronique : <strong>contact@ulysse.com</strong> <br />
	 <br />
	Le Créateur du site est : <strong>Ulysse</strong><br />
	Le Responsable de la  publication est : <strong>John Ulysse</strong><br />
	Contactez le responsable de la publication : <strong>admin@ulysse.com</strong><br />
	Le responsable de la publication est une <strong>personne physique</strong><br />
	<br />
	Le Webmaster est  : <strong>Le Webmaster</strong><br />
	Contactez le Webmaster : <strong><a href="mailto:Webmaster@ulysse.com?subject=Contact à partir des mentions légales via le site Ulysse.com">Webmaster@ulysse.com</a></strong><br />
	L’hebergeur du site est : <strong>OVH 12 rue de madrid 75012 paris</strong><br />
	<u><strong>CREDITS :</strong></u> les mentions légales ont étés générées par <strong><a href="http://www.generer-mentions-legales.com">http://www.generer-mentions-legales.com</a></strong><br />
	<br />
	<br />
	<strong><font size="4">2. Conditions générales d’utilisation du site et des services proposés :</font></strong><br />
	<br />
	L’utilisation du site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> implique l’acceptation pleine et entière des conditions générales d’utilisation  décrites ci-aprés. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, sans préavis, aussi les utilisateurs du site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> sont  invités à les consulter de manière régulière.<br />
	<a href="http://Ulysse.com" target="_blank">Ulysse.com</a> est par principe accessible aux utilisateurs 24/24h, 7/7j, sauf interruption, programmée ou non, pour les besoins de sa maintenance ou cas de force majeure. En cas d’impossibilité d’accès au service, <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> s’engage à faire son maximum afin de rétablir l’accès au service et s’efforcera alors de communiquer préalablement aux utilisateurs les dates et heures de l’intervention.  N’étant soumis qu’à une obligation de moyen, <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> ne saurait être tenu pour responsable de tout dommage, quelle qu’en soit la nature, résultant d’une indisponibilité du service.</p>
<p style="text-align: justify">
        Le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> est mis à jour régulièrement par le proprietaire du site. De la même façon, les mentions légales peuvent être modifiées à tout moment, sans préavis et  s’imposent à l\
        \’utilisateur sans réserve. L\’utilisateur est réputé les accepter sans réserve et s’y référer régulièrement pour prendre connaissance des modifications.<br />
	Le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> se réserve aussi le droit de céder, transférer, ce sans préavis les droits et/ou obligations des présentes CGU et mentions légales. En continuant à utiliser les Services du site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> , l\’utilisateur reconnaît accepter les modifications des conditions générales qui seraient intervenues.<br />
	 </p>
<p style="text-align: justify">
	<strong><font size="4">3. Description des services fournis :</font></strong><br />
	<br />
	Le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> a pour objet de fournir une information concernant l’ensemble des activités de la société.<br />
	Le proprietaire du site s’efforce de fournir sur le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> des informations aussi précises que possible. Toutefois, il ne pourra être tenue responsable des omissions, des inexactitudes et des carences dans la mise à jour, qu’elles soient de son fait ou du fait des tiers partenaires qui lui fournissent ces informations.<br />
	Tous les informations proposées sur le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> sont données à titre indicatif, sont non exhaustives, et sont susceptibles d’évoluer. Elles sont données sous réserve de modifications ayant été apportées depuis leur mise en ligne.<br />
	 </p>
<p style="text-align: justify">
	<strong><font size="4">4. Limites de responsabilité :</font></strong><br />
	<br />
	Le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> utilise la technologie java script.<br />
	Le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> ne saurait être tenu responsable des erreurs typographiques ou inexactitudes apparaissant sur le service, ou de quelque dommage subi résultant de son utilisation. L’utilisateur reste responsable de son équipement et de son utilisation, de même il supporte seul les coûts directs ou indirects suite à sa connexion à Internet.<br />
	<br />
	L\’utilisateur du site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> s’engage à accéder à celui-ci en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mise à jour.<br />
	<br />
	L\’utilisateur dégage la responsabilité de <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> pour tout préjudice qu\’il pourrait subir ou faire subir, directement ou indirectement, du fait des services proposés. Seule la responsabilité de l’utilisateur est engagée par l’utilisation du service proposé et celui-ci dégage expressément le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> de toute responsabilité vis à vis de tiers.<br />
	Des espaces interactifs (possibilité de poser des questions dans l’espace contact) sont à la disposition des utilisateurs. Le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> se réserve le droit de supprimer, sans mise en demeure préalable, tout contenu déposé dans cet espace qui contreviendrait à la législation applicable en France, en particulier aux dispositions relatives à la protection des données. Le cas échéant, le proprietaire du site se réserve également la possibilité de mettre en cause la responsabilité civile et/ou pénale de l’utilisateur, notamment en cas de message à caractère raciste, injurieux, diffamant, ou pornographique, quel que soit le support utilisé (texte, photographie…).<br />
	Il est ici rappelé que les développeurs du site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> gardent trace de l\'adresse mail, et de l\'adresse IP de l\'utilisateur. En conséquence, il doit être conscient qu\'en cas d\'injonction de l’autorité judiciaire il peut être retrouvé et poursuivi.<br />
	 </p>
<p style="text-align: justify">
	<strong><font size="4">5. Propriété intellectuelle et contrefaçons :</font></strong><br />
	<br />
	Le proprietaire du site est propriétaire des droits de propriété intellectuelle ou détient les droits d’usage sur tous les éléments accessibles sur le site, notamment les textes, images, graphismes, logo, icônes, sons, logiciels…<br />
	Toute reproduction, représentation, modification, publication, adaptation totale ou partielle des éléments du site, quel que soit le moyen ou le procédé utilisé, est interdite, sauf autorisation écrite préalable à l\'email : <a href="mailto:Webmaster@ulysse.com?subject=Contact à partir des mentions légales via le site Ulysse.com"><strong>Webmaster@ulysse.com</strong></a> .<br />
	Toute exploitation non autorisée du site ou de l’un quelconque de ces éléments qu’il contient sera considérée comme constitutive d’une contrefaçon et poursuivie conformément aux dispositions des articles L.335-2 et suivants du Code de Propriété Intellectuelle.<br />
	 </p>
<p style="text-align: justify">
	<strong><font size="4">6. Liens hypertextes et cookies :</font></strong><br />
	<br />
	Le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> contient un certain nombre de liens hypertextes vers d’autres sites (partenaires, informations …) mis en place avec l’autorisation de le proprietaire du site . Cependant, le proprietaire du site n’a pas la possibilité de vérifier le contenu des sites ainsi visités  et décline donc toute responsabilité de ce fait quand aux risques éventuels de contenus illicites.<br />
	<br />
	L\’utilisateur est informé que lors de ses visites sur le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a>, un ou des cookies sont susceptible de s’installer automatiquement sur son ordinateur. Un cookie est un fichier de petite taille, qui ne permet pas l’identification de l’utilisateur, mais qui enregistre des informations relatives à la navigation d’un ordinateur sur un site. Les données ainsi obtenues visent à faciliter la navigation ultérieure sur le site, et ont également vocation à permettre diverses mesures de fréquentation.<br />
	<br />
	Le paramétrage du logiciel de navigation permet d’informer de la présence de cookie et éventuellement, de refuser de la manière décrite à l’adresse suivante : www.cnil.fr<br />
	Le refus d’installation d’un cookie peut entraîner l’impossibilité d’accéder à certains services. L’utilisateur peut toutefois configurer son ordinateur de la manière suivante, pour refuser l’installation des cookies :<br />
	Sous Internet Explorer : onglet outil / options internet. Cliquez sur Confidentialité et choisissez Bloquer tous les cookies. Validez sur Ok.<br />
	Sous Netscape : onglet édition / préférences. Cliquez sur Avancées et choisissez Désactiver les cookies. Validez sur Ok.<br />
	 </p>
<p style="text-align: justify">
	<strong><font size="4">7. Droit applicable et attribution de juridiction :</font></strong><br />
	<br />
	Tout litige en relation avec l’utilisation du site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> est soumis au droit français. L\’utilisateur ainsi que <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> acceptent de se soumettre à la compétence exclusive des tribunaux Français en cas de litige.<br />
	 </p>
<p style="text-align: justify">
	<strong><font size="4">8. Protection des biens et des personnes - gestion des données personnelles :</font></strong><br />
	<br />
	Utilisateur : Internaute se connectant, utilisant le site susnommé : <a href="http://Ulysse.com" target="_blank">Ulysse.com</a><br />
	En France, les données personnelles sont notamment protégées par la loi n° 78-87 du 6 janvier 1978, la loi n° 2004-801 du 6 août 2004, l\'article L. 226-13 du Code pénal et la Directive Européenne du 24 octobre 1995.</p>
<p style="text-align: justify">
	Sur le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a>, le proprietaire du site ne collecte des informations personnelles relatives à l\'utilisateur que pour le besoin de certains services proposés par le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a>. L\'utilisateur fournit ces informations en toute connaissance de cause, notamment lorsqu\'il procède par lui-même à leur saisie. Il est alors précisé à l\'utilisateur du site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> l’obligation ou non de fournir ces informations.<br />
	Conformément aux dispositions des articles 38 et suivants de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, tout utilisateur dispose d’un droit d’accès, de rectification, de suppression et d’opposition aux données personnelles le concernant. Pour l’exercer, adressez votre demande à <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> par email : email du webmaster ou  en effectuant sa demande écrite et signée, accompagnée d’une copie du titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée.</p>
<p style="text-align: justify">
	Aucune information personnelle de l\'utilisateur du site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> n\'est publiée à l\'insu de l\'utilisateur, échangée, transférée, cédée ou vendue sur un support quelconque à des tiers. Seule l\'hypothèse du rachat du site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> à le proprietaire du site et de ses droits permettrait la transmission des dites informations à l\'éventuel acquéreur qui serait à son tour tenu de la même obligation de conservation et de modification des données vis à vis de l\'utilisateur du site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a>.<br />
	Le site <a href="http://Ulysse.com" target="_blank">Ulysse.com</a> est déclaré à la CNIL sous le numéro Le site n\'est pas déclaré à la CNIL car il ne recueille pas de données personnelles.</p>
<p style="text-align: justify">
	Les bases de données sont protégées par les dispositions de la loi du 1er juillet 1998 transposant la directive 96/9 du 11 mars 1996 relative à la protection juridique des bases de données.</p>
';
        // Liste des choses à ajouter
        $tab = array(
            array(
                'shopName' => 'Ulysse',
                'deployed' => 1,
                'legalnotice' => $mentionlegal
            ),
        );

        foreach ($tab as $row)
        {
            $configuration = new Configuration();
            $configuration->setShopname($row['shopName']);
            $configuration->setDeployed($row['deployed']);
            $configuration->setLegalNotice($row['legalnotice']);

            // On déclenche l'enregistrement
            $manager->persist($configuration);

        }
        // On la persiste
        $manager->flush();

    }

    public function getOrder()
    {
        return 15;
    }
}
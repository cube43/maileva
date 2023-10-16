<?php
/**
 * ResourceType
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Cube43\Component\MailEva\NotificationsWebhooks
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Maileva / notifications (webhook)
 *
 * Cette API permet de  : - Gérer vos abonnements à des notifications - consulter les notifications - relancer des notifiations  ### Principes Généraux  Il est possible d'etre notifié lorsque une ressource change d'état (par exemple un envoi courrier ou un envoi de lettre recommandée),  via un appel vers un webhook sur votre système.  Pour cela, il faut au préalable vous abonner à un type d'évènement  pour un type de ressource et indiquer l'URL à notifier.  Vous pourrez aussi voir les notifications qui vous ont été envoyées  au cours des 30 derniers jours et en consulter le détail. Il est aussi possible de demander à rejouer des notifications.  ### Mise en oeuvre  Pour recevoir des notifications, vous devez mettre en place une URL de callback. Vous devez ensuite vous abonner à un évenement en précisant cette URL. Lorque l'évènement surviendra, Maileva fera un POST sur l'URL en passant les paramétres ci-dessous.      {       \"source\": \"api.maileva.com\",       \"user_id\": \"12345678-c014-4923-9bb9-497addd5e901\",       \"client_id\": \"f5e22e36-c014-4923-9bb9-497addd5e901\",       \"event_type\": \"ON_STATUS_ACCEPTED\",       \"resource_type\": \"mail/v2/sendings\",       \"event_date\": \"2017-10-02T10:23:31.137Z\",       \"event_location\": \"FR\",       \"resource_id\": \"e6118f29-89c3-41e5-82e8-00cb0b7b1b0c\",       \"resource_location\": \"https://api.maileva.com/mail/v2/sendings/e6118f29-89c3-41e5-82e8-00cb0b7b1b0c\",       \"resource_custom_id\": \"order1234\",       \"resource_custom_data\": \"my_data\"     }  Important : votre URL de callback devra retourner une erreur 201,  sinon la notification sera considérée comme échouée et Maileva tentera d'autres appels ultérieurement.  Les spécifications de l'appel vers votre URL de callback est décrit dans l'onglet \"Callbacks\" du endpoint POST /subscriptions.   Astuce : pour simuler un webhook, vous pouvez utiliser le site <a href=\"https://webhook.site\">https://webhook.site</a>  ### En cas de problème  En cas d'échec lors de la première tentative de notification,  Maileva fera jusqu'à 10 autres tentatives :   - 2ème tentative : 10 min après la 1ère tentative   - 3ème tentative : 10 min après la 2ème tentative   - 4ème tentative : 20 min après la 3ème tentative   - 5ème tentative : 30 min après la 4ème tentative   - 6ème tentative : 50 min après la 5ème tentative   - 7ème tentative : 80 min après la 6ème tentative   - 8ème tentative : 130 min après la 7ème tentative   - 9ème tentative : 210 min après la 8ème tentative   - 10ème tentative : 340 min après la 9ème tentative  ### Les évènements disponibles sont :  Pour le Courrier Simple (mail/v2) :     <table border=\"1\">     <tr bgcolor=\"lightgrey\">       <th>Type de ressource (`resource_type`)</th>       <th>Type d'évènement (`event_type`)</th>       <th>Description</th>     </tr>     <tr>       <td>         mail/v2/sendings       </td>       <td>ON_STATUS_ACCEPTED</td>       <td>L'envoi est passé au statut *ACCEPTED*</td>     </tr>     <tr>       <td>         mail/v2/sendings       </td>       <td>ON_STATUS_REJECTED</td>       <td>L'envoi est passé au statut *REJECTED*</td>     </tr>     <tr>       <td>         mail/v2/sendings       </td>       <td>ON_STATUS_PROCESSED</td>       <td>L'envoi est passé au statut *PROCESSED*</td>     </tr>     <tr>       <td>         mail/v2/sendings       </td>       <td>ON_STATUS_ARCHIVED</td>       <td>Tous les documents correspondants aux destinataires valides ont été archivés</td>     </tr>   </table>  Pour la LREL (registered_mail/v2) :     <table border=\"1\">     <tr bgcolor=\"lightgrey\">       <th>Type de ressource (`resource_type`)</th>       <th>Type d'évènement (`event_type`)</th>       <th>Description</th>     </tr>     <tr>       <td>registered_mail/v2/sendings       </td>       <td>ON_STATUS_ACCEPTED</td>       <td>L'envoi est passé au statut *ACCEPTED*</td>     </tr>     <tr>       <td>registered_mail/v2/sendings</td>       <td>ON_STATUS_REJECTED</td>       <td>L'envoi est passé au statut *REJECTED*</td>     </tr>     <tr>       <td>registered_mail/v2/sendings</td>       <td>ON_STATUS_PROCESSED</td>       <td>L'envoi est passé au statut *PROCESSED*</td>     </tr>     <tr>       <td>registered_mail/v2/sendings</td>       <td>ON_DEPOSIT_PROOF_RECEIVED</td>       <td>L'envoi a obtenu sa preuve de dépôt</td>     </tr>     <tr>       <td>registered_mail/v2/recipients</td>       <td>ON_ACKNOWLEDGEMENT_OF_RECEIPT_RECEIVED</td>       <td>Le destinataire de l'envoi a obtenu son avis de réception</td>     </tr>     <tr>       <td>registered_mail/v2/sendings</td>       <td>ON_STATUS_ARCHIVED</td>       <td>Tous les documents correspondants aux destinataires valides ont été archivés</td>     </tr>   </table>
 *
 * The version of the OpenAPI document: 2.6
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.0.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Cube43\Component\MailEva\NotificationsWebhooks\Model;
use \Cube43\Component\MailEva\NotificationsWebhooks\ObjectSerializer;

/**
 * ResourceType Class Doc Comment
 *
 * @category Class
 * @description Type de ressource
 * @package  Cube43\Component\MailEva\NotificationsWebhooks
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ResourceType
{
    /**
     * Possible values of this enum
     */
    public const MAIL_V2_SENDINGS = 'mail/v2/sendings';

    public const MAIL_V2_RECIPIENTS = 'mail/v2/recipients';

    public const LEL_V2_SENDINGS = 'lel/v2/sendings';

    public const LEL_V2_RECIPIENTS = 'lel/v2/recipients';

    public const LRC_V1_SENDINGS = 'lrc/v1/sendings';

    public const LRC_V1_RECIPIENTS = 'lrc/v1/recipients';

    public const REGISTERED_MAIL_V2_SENDINGS = 'registered_mail/v2/sendings';

    public const REGISTERED_MAIL_V2_RECIPIENTS = 'registered_mail/v2/recipients';

    public const SIMPLE_REGISTERED_MAIL_V1_SENDINGS = 'simple_registered_mail/v1/sendings';

    public const SIMPLE_REGISTERED_MAIL_V1_RECIPIENTS = 'simple_registered_mail/v1/recipients';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::MAIL_V2_SENDINGS,
            self::MAIL_V2_RECIPIENTS,
            self::LEL_V2_SENDINGS,
            self::LEL_V2_RECIPIENTS,
            self::LRC_V1_SENDINGS,
            self::LRC_V1_RECIPIENTS,
            self::REGISTERED_MAIL_V2_SENDINGS,
            self::REGISTERED_MAIL_V2_RECIPIENTS,
            self::SIMPLE_REGISTERED_MAIL_V1_SENDINGS,
            self::SIMPLE_REGISTERED_MAIL_V1_RECIPIENTS
        ];
    }
}



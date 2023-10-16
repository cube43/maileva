<?php
/**
 * NotificationContentCreation
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

use \ArrayAccess;
use \Cube43\Component\MailEva\NotificationsWebhooks\ObjectSerializer;

/**
 * NotificationContentCreation Class Doc Comment
 *
 * @category Class
 * @description notification
 * @package  Cube43\Component\MailEva\NotificationsWebhooks
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class NotificationContentCreation implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'notification_content_creation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'source' => 'string',
        'user_id' => 'string',
        'client_id' => 'string',
        'event_type' => '\Cube43\Component\MailEva\NotificationsWebhooks\Model\EventType',
        'resource_type' => 'string',
        'event_date' => '\DateTime',
        'event_location' => 'string',
        'resource_id' => 'string',
        'resource_location' => 'string',
        'resource_custom_id' => 'string',
        'resource_custom_data' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'source' => null,
        'user_id' => null,
        'client_id' => null,
        'event_type' => null,
        'resource_type' => null,
        'event_date' => 'date-time',
        'event_location' => null,
        'resource_id' => null,
        'resource_location' => null,
        'resource_custom_id' => null,
        'resource_custom_data' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'source' => false,
		'user_id' => false,
		'client_id' => false,
		'event_type' => false,
		'resource_type' => false,
		'event_date' => false,
		'event_location' => false,
		'resource_id' => false,
		'resource_location' => false,
		'resource_custom_id' => false,
		'resource_custom_data' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'source' => 'source',
        'user_id' => 'user_id',
        'client_id' => 'client_id',
        'event_type' => 'event_type',
        'resource_type' => 'resource_type',
        'event_date' => 'event_date',
        'event_location' => 'event_location',
        'resource_id' => 'resource_id',
        'resource_location' => 'resource_location',
        'resource_custom_id' => 'resource_custom_id',
        'resource_custom_data' => 'resource_custom_data'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'source' => 'setSource',
        'user_id' => 'setUserId',
        'client_id' => 'setClientId',
        'event_type' => 'setEventType',
        'resource_type' => 'setResourceType',
        'event_date' => 'setEventDate',
        'event_location' => 'setEventLocation',
        'resource_id' => 'setResourceId',
        'resource_location' => 'setResourceLocation',
        'resource_custom_id' => 'setResourceCustomId',
        'resource_custom_data' => 'setResourceCustomData'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'source' => 'getSource',
        'user_id' => 'getUserId',
        'client_id' => 'getClientId',
        'event_type' => 'getEventType',
        'resource_type' => 'getResourceType',
        'event_date' => 'getEventDate',
        'event_location' => 'getEventLocation',
        'resource_id' => 'getResourceId',
        'resource_location' => 'getResourceLocation',
        'resource_custom_id' => 'getResourceCustomId',
        'resource_custom_data' => 'getResourceCustomData'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('source', $data ?? [], null);
        $this->setIfExists('user_id', $data ?? [], null);
        $this->setIfExists('client_id', $data ?? [], null);
        $this->setIfExists('event_type', $data ?? [], null);
        $this->setIfExists('resource_type', $data ?? [], null);
        $this->setIfExists('event_date', $data ?? [], null);
        $this->setIfExists('event_location', $data ?? [], null);
        $this->setIfExists('resource_id', $data ?? [], null);
        $this->setIfExists('resource_location', $data ?? [], null);
        $this->setIfExists('resource_custom_id', $data ?? [], null);
        $this->setIfExists('resource_custom_data', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets source
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string|null $source Source de la notification
     *
     * @return self
     */
    public function setSource($source)
    {
        if (is_null($source)) {
            throw new \InvalidArgumentException('non-nullable source cannot be null');
        }
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets user_id
     *
     * @return string|null
     */
    public function getUserId()
    {
        return $this->container['user_id'];
    }

    /**
     * Sets user_id
     *
     * @param string|null $user_id Identifiant de l'utilisateur à qui appartient la ressource
     *
     * @return self
     */
    public function setUserId($user_id)
    {
        if (is_null($user_id)) {
            throw new \InvalidArgumentException('non-nullable user_id cannot be null');
        }
        $this->container['user_id'] = $user_id;

        return $this;
    }

    /**
     * Gets client_id
     *
     * @return string|null
     */
    public function getClientId()
    {
        return $this->container['client_id'];
    }

    /**
     * Sets client_id
     *
     * @param string|null $client_id Identifiant de l'application qui a permis de créer la ressource
     *
     * @return self
     */
    public function setClientId($client_id)
    {
        if (is_null($client_id)) {
            throw new \InvalidArgumentException('non-nullable client_id cannot be null');
        }
        $this->container['client_id'] = $client_id;

        return $this;
    }

    /**
     * Gets event_type
     *
     * @return \Cube43\Component\MailEva\NotificationsWebhooks\Model\EventType|null
     */
    public function getEventType()
    {
        return $this->container['event_type'];
    }

    /**
     * Sets event_type
     *
     * @param \Cube43\Component\MailEva\NotificationsWebhooks\Model\EventType|null $event_type event_type
     *
     * @return self
     */
    public function setEventType($event_type)
    {
        if (is_null($event_type)) {
            throw new \InvalidArgumentException('non-nullable event_type cannot be null');
        }
        $this->container['event_type'] = $event_type;

        return $this;
    }

    /**
     * Gets resource_type
     *
     * @return string|null
     */
    public function getResourceType()
    {
        return $this->container['resource_type'];
    }

    /**
     * Sets resource_type
     *
     * @param string|null $resource_type Type de ressource
     *
     * @return self
     */
    public function setResourceType($resource_type)
    {
        if (is_null($resource_type)) {
            throw new \InvalidArgumentException('non-nullable resource_type cannot be null');
        }
        $this->container['resource_type'] = $resource_type;

        return $this;
    }

    /**
     * Gets event_date
     *
     * @return \DateTime|null
     */
    public function getEventDate()
    {
        return $this->container['event_date'];
    }

    /**
     * Sets event_date
     *
     * @param \DateTime|null $event_date Date de l'événement
     *
     * @return self
     */
    public function setEventDate($event_date)
    {
        if (is_null($event_date)) {
            throw new \InvalidArgumentException('non-nullable event_date cannot be null');
        }
        $this->container['event_date'] = $event_date;

        return $this;
    }

    /**
     * Gets event_location
     *
     * @return string|null
     */
    public function getEventLocation()
    {
        return $this->container['event_location'];
    }

    /**
     * Sets event_location
     *
     * @param string|null $event_location Lieu de l'événement
     *
     * @return self
     */
    public function setEventLocation($event_location)
    {
        if (is_null($event_location)) {
            throw new \InvalidArgumentException('non-nullable event_location cannot be null');
        }
        $this->container['event_location'] = $event_location;

        return $this;
    }

    /**
     * Gets resource_id
     *
     * @return string|null
     */
    public function getResourceId()
    {
        return $this->container['resource_id'];
    }

    /**
     * Sets resource_id
     *
     * @param string|null $resource_id Identifiant de la ressource
     *
     * @return self
     */
    public function setResourceId($resource_id)
    {
        if (is_null($resource_id)) {
            throw new \InvalidArgumentException('non-nullable resource_id cannot be null');
        }
        $this->container['resource_id'] = $resource_id;

        return $this;
    }

    /**
     * Gets resource_location
     *
     * @return string|null
     */
    public function getResourceLocation()
    {
        return $this->container['resource_location'];
    }

    /**
     * Sets resource_location
     *
     * @param string|null $resource_location URL vers la ressource
     *
     * @return self
     */
    public function setResourceLocation($resource_location)
    {
        if (is_null($resource_location)) {
            throw new \InvalidArgumentException('non-nullable resource_location cannot be null');
        }
        $this->container['resource_location'] = $resource_location;

        return $this;
    }

    /**
     * Gets resource_custom_id
     *
     * @return string|null
     */
    public function getResourceCustomId()
    {
        return $this->container['resource_custom_id'];
    }

    /**
     * Sets resource_custom_id
     *
     * @param string|null $resource_custom_id Identifiant de la ressource défini par le client
     *
     * @return self
     */
    public function setResourceCustomId($resource_custom_id)
    {
        if (is_null($resource_custom_id)) {
            throw new \InvalidArgumentException('non-nullable resource_custom_id cannot be null');
        }
        $this->container['resource_custom_id'] = $resource_custom_id;

        return $this;
    }

    /**
     * Gets resource_custom_data
     *
     * @return string|null
     */
    public function getResourceCustomData()
    {
        return $this->container['resource_custom_data'];
    }

    /**
     * Sets resource_custom_data
     *
     * @param string|null $resource_custom_data Information spécifique définie avec le client
     *
     * @return self
     */
    public function setResourceCustomData($resource_custom_data)
    {
        if (is_null($resource_custom_data)) {
            throw new \InvalidArgumentException('non-nullable resource_custom_data cannot be null');
        }
        $this->container['resource_custom_data'] = $resource_custom_data;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}



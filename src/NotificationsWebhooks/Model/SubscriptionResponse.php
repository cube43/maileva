<?php
/**
 * SubscriptionResponse
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
 * SubscriptionResponse Class Doc Comment
 *
 * @category Class
 * @package  Cube43\Component\MailEva\NotificationsWebhooks
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SubscriptionResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'subscription_response';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'event_type' => 'string',
        'resource_type' => 'string',
        'callback_url' => 'string',
        'authenfication' => '\Cube43\Component\MailEva\NotificationsWebhooks\Model\Authentication'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'id' => null,
        'event_type' => null,
        'resource_type' => null,
        'callback_url' => null,
        'authenfication' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'event_type' => false,
		'resource_type' => false,
		'callback_url' => false,
		'authenfication' => false
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
        'id' => 'id',
        'event_type' => 'event_type',
        'resource_type' => 'resource_type',
        'callback_url' => 'callback_url',
        'authenfication' => 'authenfication'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'event_type' => 'setEventType',
        'resource_type' => 'setResourceType',
        'callback_url' => 'setCallbackUrl',
        'authenfication' => 'setAuthenfication'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'event_type' => 'getEventType',
        'resource_type' => 'getResourceType',
        'callback_url' => 'getCallbackUrl',
        'authenfication' => 'getAuthenfication'
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
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('event_type', $data ?? [], null);
        $this->setIfExists('resource_type', $data ?? [], null);
        $this->setIfExists('callback_url', $data ?? [], null);
        $this->setIfExists('authenfication', $data ?? [], null);
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
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id ID de l'abonnement
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets event_type
     *
     * @return string|null
     */
    public function getEventType()
    {
        return $this->container['event_type'];
    }

    /**
     * Sets event_type
     *
     * @param string|null $event_type Type d'événement sur la ressource
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
     * Gets callback_url
     *
     * @return string|null
     */
    public function getCallbackUrl()
    {
        return $this->container['callback_url'];
    }

    /**
     * Sets callback_url
     *
     * @param string|null $callback_url URL du client pour le callback
     *
     * @return self
     */
    public function setCallbackUrl($callback_url)
    {
        if (is_null($callback_url)) {
            throw new \InvalidArgumentException('non-nullable callback_url cannot be null');
        }
        $this->container['callback_url'] = $callback_url;

        return $this;
    }

    /**
     * Gets authenfication
     *
     * @return \Cube43\Component\MailEva\NotificationsWebhooks\Model\Authentication|null
     */
    public function getAuthenfication()
    {
        return $this->container['authenfication'];
    }

    /**
     * Sets authenfication
     *
     * @param \Cube43\Component\MailEva\NotificationsWebhooks\Model\Authentication|null $authenfication authenfication
     *
     * @return self
     */
    public function setAuthenfication($authenfication)
    {
        if (is_null($authenfication)) {
            throw new \InvalidArgumentException('non-nullable authenfication cannot be null');
        }
        $this->container['authenfication'] = $authenfication;

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



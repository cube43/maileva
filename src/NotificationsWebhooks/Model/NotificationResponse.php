<?php
/**
 * NotificationResponse
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
 * NotificationResponse Class Doc Comment
 *
 * @category Class
 * @package  Cube43\Component\MailEva\NotificationsWebhooks
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class NotificationResponse implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'notification_response';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'id' => 'string',
        'subscription_id' => 'string',
        'status' => 'string',
        'attempt_count' => 'float',
        'first_attempt_date' => '\DateTime',
        'last_attempt_date' => '\DateTime',
        'last_response_code' => 'float',
        'resource_type' => 'string',
        'resource_id' => 'string',
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
        'id' => null,
        'subscription_id' => null,
        'status' => null,
        'attempt_count' => null,
        'first_attempt_date' => 'date-time',
        'last_attempt_date' => 'date-time',
        'last_response_code' => null,
        'resource_type' => null,
        'resource_id' => null,
        'resource_custom_id' => null,
        'resource_custom_data' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'id' => false,
		'subscription_id' => false,
		'status' => false,
		'attempt_count' => false,
		'first_attempt_date' => false,
		'last_attempt_date' => false,
		'last_response_code' => false,
		'resource_type' => false,
		'resource_id' => false,
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
        'id' => 'id',
        'subscription_id' => 'subscription_id',
        'status' => 'status',
        'attempt_count' => 'attempt_count',
        'first_attempt_date' => 'first_attempt_date',
        'last_attempt_date' => 'last_attempt_date',
        'last_response_code' => 'last_response_code',
        'resource_type' => 'resource_type',
        'resource_id' => 'resource_id',
        'resource_custom_id' => 'resource_custom_id',
        'resource_custom_data' => 'resource_custom_data'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'id' => 'setId',
        'subscription_id' => 'setSubscriptionId',
        'status' => 'setStatus',
        'attempt_count' => 'setAttemptCount',
        'first_attempt_date' => 'setFirstAttemptDate',
        'last_attempt_date' => 'setLastAttemptDate',
        'last_response_code' => 'setLastResponseCode',
        'resource_type' => 'setResourceType',
        'resource_id' => 'setResourceId',
        'resource_custom_id' => 'setResourceCustomId',
        'resource_custom_data' => 'setResourceCustomData'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'id' => 'getId',
        'subscription_id' => 'getSubscriptionId',
        'status' => 'getStatus',
        'attempt_count' => 'getAttemptCount',
        'first_attempt_date' => 'getFirstAttemptDate',
        'last_attempt_date' => 'getLastAttemptDate',
        'last_response_code' => 'getLastResponseCode',
        'resource_type' => 'getResourceType',
        'resource_id' => 'getResourceId',
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

    public const STATUS_PENDING = 'PENDING';
    public const STATUS_SENT = 'SENT';
    public const STATUS_MAX_RETRY = 'MAX_RETRY';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_PENDING,
            self::STATUS_SENT,
            self::STATUS_MAX_RETRY,
        ];
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
        $this->setIfExists('subscription_id', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('attempt_count', $data ?? [], null);
        $this->setIfExists('first_attempt_date', $data ?? [], null);
        $this->setIfExists('last_attempt_date', $data ?? [], null);
        $this->setIfExists('last_response_code', $data ?? [], null);
        $this->setIfExists('resource_type', $data ?? [], null);
        $this->setIfExists('resource_id', $data ?? [], null);
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

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
        }

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
     * @param string|null $id Identifiant de la notification
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
     * Gets subscription_id
     *
     * @return string|null
     */
    public function getSubscriptionId()
    {
        return $this->container['subscription_id'];
    }

    /**
     * Sets subscription_id
     *
     * @param string|null $subscription_id Identifiant de l'abonnement
     *
     * @return self
     */
    public function setSubscriptionId($subscription_id)
    {
        if (is_null($subscription_id)) {
            throw new \InvalidArgumentException('non-nullable subscription_id cannot be null');
        }
        $this->container['subscription_id'] = $subscription_id;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status Statut de la notification   <table border=\"1\">     <tr bgcolor=\"lightgrey\">       <th>&nbsp; <strong>Valeurs</strong></th>       <th>&nbsp; <strong>Détails</strong></th>     </tr>     <tr>       <td>\"PENDING\"</td>       <td>Tentatives d'envoi en cours</td>     </tr>     <tr>       <td>\"SENT\"</td>       <td>Notification envoyée</td>     </tr>     <tr>       <td>\"MAX_RETRY\"</td>       <td>Notification échouée. Le nombre maximum de tentatives a été atteint.</td>     </tr>   </table>
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $allowedValues = $this->getStatusAllowableValues();
        if (!in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets attempt_count
     *
     * @return float|null
     */
    public function getAttemptCount()
    {
        return $this->container['attempt_count'];
    }

    /**
     * Sets attempt_count
     *
     * @param float|null $attempt_count Nombre de tentatives
     *
     * @return self
     */
    public function setAttemptCount($attempt_count)
    {
        if (is_null($attempt_count)) {
            throw new \InvalidArgumentException('non-nullable attempt_count cannot be null');
        }
        $this->container['attempt_count'] = $attempt_count;

        return $this;
    }

    /**
     * Gets first_attempt_date
     *
     * @return \DateTime|null
     */
    public function getFirstAttemptDate()
    {
        return $this->container['first_attempt_date'];
    }

    /**
     * Sets first_attempt_date
     *
     * @param \DateTime|null $first_attempt_date Date de la première tentative
     *
     * @return self
     */
    public function setFirstAttemptDate($first_attempt_date)
    {
        if (is_null($first_attempt_date)) {
            throw new \InvalidArgumentException('non-nullable first_attempt_date cannot be null');
        }
        $this->container['first_attempt_date'] = $first_attempt_date;

        return $this;
    }

    /**
     * Gets last_attempt_date
     *
     * @return \DateTime|null
     */
    public function getLastAttemptDate()
    {
        return $this->container['last_attempt_date'];
    }

    /**
     * Sets last_attempt_date
     *
     * @param \DateTime|null $last_attempt_date Date de la dernière tentative
     *
     * @return self
     */
    public function setLastAttemptDate($last_attempt_date)
    {
        if (is_null($last_attempt_date)) {
            throw new \InvalidArgumentException('non-nullable last_attempt_date cannot be null');
        }
        $this->container['last_attempt_date'] = $last_attempt_date;

        return $this;
    }

    /**
     * Gets last_response_code
     *
     * @return float|null
     */
    public function getLastResponseCode()
    {
        return $this->container['last_response_code'];
    }

    /**
     * Sets last_response_code
     *
     * @param float|null $last_response_code Code HTTP retourné par le callback
     *
     * @return self
     */
    public function setLastResponseCode($last_response_code)
    {
        if (is_null($last_response_code)) {
            throw new \InvalidArgumentException('non-nullable last_response_code cannot be null');
        }
        $this->container['last_response_code'] = $last_response_code;

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



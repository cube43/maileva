<?php
/**
 * SendingCreation
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Cube43\Component\MailEva
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Maileva / Création et envoi de Lettres Recommandées Electroniques qualifiées
 *
 * API pour créer et envoyer des Lettres Recommandées Electroniques qualifiée  Elles comprennent les fonctions clés pour :   - créer un envoi,  - ajouter des documents et des destinataires,  - choisir ses options (Nom, Champ libre, référence dossier, référence client)  - envoyer ses lettres recommandées électroniques qualifiées.    **Paramétrage de compte expéditeur :**     Chaque expéditeur d'une Lettre Recommandée Electronique qualifiée doit posséder un compte expéditeur. Il est donc nécessaire de paramétrer son compte expéditeur en passant par l'API <a href=\"/developpeur/electronic_mail_emitter\"> electronic_mail_emitter</a> ou en se connectant à son espace client www.maileva.com et en suivant les étapes de paramétrage de compte sur le produit Lettre Recommandée Electronique qualifiée.     Une fois le paramétrage du compte finalisé, vous recevrez sous 72h, un recommandé papier à l'adresse postale de l'expéditeur. Il contient un QR Code, la clé OTP et les explications nécessaires pour l'utiliser et générer ses codes à usage unique. Ces informations sont personnelles et confidentielles.    **Authentification OTP :**    L'authentification OTP est obligatoire pour effectuer des envois de Lettres Recommandées Electroniques qualifiées. La clé OTP doit être demandée à l'expéditeur à chaque envoi. Elle permet de générer un code à usage unique permettant une authentification à un niveau renforcé. Cette clé OTP ne doit pas être stockée dans votre application.     Pour générer un code à usage unique vous pouvez :     - Demander à l'expéditeur de télécharger une application mobile telle Google Authenticator ou Free OTP puis de scanner le QR Code sur son smartphone.     - Demander à l'expéditeur d'utiliser un générateur de codes à usage unique depuis son navigateur (par exemple : https://otp-client.ar24.fr/) et de recopier sa clé OTP de 32 caractères présente sur les identifiants papiers obtenus.
 *
 * The version of the OpenAPI document: 1.3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.0.0-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Cube43\Component\MailEva\Model;

use \ArrayAccess;
use \Cube43\Component\MailEva\ObjectSerializer;

/**
 * SendingCreation Class Doc Comment
 *
 * @category Class
 * @package  Cube43\Component\MailEva
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SendingCreation implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SendingCreation';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'sender_id' => 'string',
        'name' => 'string',
        'custom_id' => 'string',
        'custom_data' => 'string',
        'additional_sender_name' => 'string',
        'message' => 'string',
        'pre_notification' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'sender_id' => null,
        'name' => null,
        'custom_id' => null,
        'custom_data' => null,
        'additional_sender_name' => null,
        'message' => null,
        'pre_notification' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'sender_id' => false,
		'name' => false,
		'custom_id' => false,
		'custom_data' => false,
		'additional_sender_name' => false,
		'message' => false,
		'pre_notification' => false
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
        'sender_id' => 'sender_id',
        'name' => 'name',
        'custom_id' => 'custom_id',
        'custom_data' => 'custom_data',
        'additional_sender_name' => 'additional_sender_name',
        'message' => 'message',
        'pre_notification' => 'pre_notification'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'sender_id' => 'setSenderId',
        'name' => 'setName',
        'custom_id' => 'setCustomId',
        'custom_data' => 'setCustomData',
        'additional_sender_name' => 'setAdditionalSenderName',
        'message' => 'setMessage',
        'pre_notification' => 'setPreNotification'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'sender_id' => 'getSenderId',
        'name' => 'getName',
        'custom_id' => 'getCustomId',
        'custom_data' => 'getCustomData',
        'additional_sender_name' => 'getAdditionalSenderName',
        'message' => 'getMessage',
        'pre_notification' => 'getPreNotification'
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
        $this->setIfExists('sender_id', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('custom_id', $data ?? [], null);
        $this->setIfExists('custom_data', $data ?? [], null);
        $this->setIfExists('additional_sender_name', $data ?? [], null);
        $this->setIfExists('message', $data ?? [], null);
        $this->setIfExists('pre_notification', $data ?? [], null);
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

        if ($this->container['sender_id'] === null) {
            $invalidProperties[] = "'sender_id' can't be null";
        }
        if (!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $this->container['sender_id'])) {
            $invalidProperties[] = "invalid value for 'sender_id', must be conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.";
        }

        if ($this->container['name'] === null) {
            $invalidProperties[] = "'name' can't be null";
        }
        if ((mb_strlen($this->container['name']) > 256)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be smaller than or equal to 256.";
        }

        if ((mb_strlen($this->container['name']) < 1)) {
            $invalidProperties[] = "invalid value for 'name', the character length must be bigger than or equal to 1.";
        }

        if (!is_null($this->container['custom_id']) && (mb_strlen($this->container['custom_id']) > 38)) {
            $invalidProperties[] = "invalid value for 'custom_id', the character length must be smaller than or equal to 38.";
        }

        if (!is_null($this->container['custom_id']) && (mb_strlen($this->container['custom_id']) < 0)) {
            $invalidProperties[] = "invalid value for 'custom_id', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['custom_data']) && (mb_strlen($this->container['custom_data']) > 255)) {
            $invalidProperties[] = "invalid value for 'custom_data', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['custom_data']) && (mb_strlen($this->container['custom_data']) < 0)) {
            $invalidProperties[] = "invalid value for 'custom_data', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['additional_sender_name']) && (mb_strlen($this->container['additional_sender_name']) > 255)) {
            $invalidProperties[] = "invalid value for 'additional_sender_name', the character length must be smaller than or equal to 255.";
        }

        if (!is_null($this->container['additional_sender_name']) && (mb_strlen($this->container['additional_sender_name']) < 0)) {
            $invalidProperties[] = "invalid value for 'additional_sender_name', the character length must be bigger than or equal to 0.";
        }

        if (!is_null($this->container['message']) && (mb_strlen($this->container['message']) > 450)) {
            $invalidProperties[] = "invalid value for 'message', the character length must be smaller than or equal to 450.";
        }

        if (!is_null($this->container['message']) && (mb_strlen($this->container['message']) < 0)) {
            $invalidProperties[] = "invalid value for 'message', the character length must be bigger than or equal to 0.";
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
     * Gets sender_id
     *
     * @return string
     */
    public function getSenderId()
    {
        return $this->container['sender_id'];
    }

    /**
     * Sets sender_id
     *
     * @param string $sender_id Id de l'expéditeur
     *
     * @return self
     */
    public function setSenderId($sender_id)
    {
        if (is_null($sender_id)) {
            throw new \InvalidArgumentException('non-nullable sender_id cannot be null');
        }

        if ((!preg_match("/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/", $sender_id))) {
            throw new \InvalidArgumentException("invalid value for \$sender_id when calling SendingCreation., must conform to the pattern /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/.");
        }

        $this->container['sender_id'] = $sender_id;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string $name Nom de l'envoi
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        if ((mb_strlen($name) > 256)) {
            throw new \InvalidArgumentException('invalid length for $name when calling SendingCreation., must be smaller than or equal to 256.');
        }
        if ((mb_strlen($name) < 1)) {
            throw new \InvalidArgumentException('invalid length for $name when calling SendingCreation., must be bigger than or equal to 1.');
        }

        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets custom_id
     *
     * @return string|null
     */
    public function getCustomId()
    {
        return $this->container['custom_id'];
    }

    /**
     * Sets custom_id
     *
     * @param string|null $custom_id Identifiant de l'envoi défini par le client
     *
     * @return self
     */
    public function setCustomId($custom_id)
    {
        if (is_null($custom_id)) {
            throw new \InvalidArgumentException('non-nullable custom_id cannot be null');
        }
        if ((mb_strlen($custom_id) > 38)) {
            throw new \InvalidArgumentException('invalid length for $custom_id when calling SendingCreation., must be smaller than or equal to 38.');
        }
        if ((mb_strlen($custom_id) < 0)) {
            throw new \InvalidArgumentException('invalid length for $custom_id when calling SendingCreation., must be bigger than or equal to 0.');
        }

        $this->container['custom_id'] = $custom_id;

        return $this;
    }

    /**
     * Gets custom_data
     *
     * @return string|null
     */
    public function getCustomData()
    {
        return $this->container['custom_data'];
    }

    /**
     * Sets custom_data
     *
     * @param string|null $custom_data nformation libre fournie par le client
     *
     * @return self
     */
    public function setCustomData($custom_data)
    {
        if (is_null($custom_data)) {
            throw new \InvalidArgumentException('non-nullable custom_data cannot be null');
        }
        if ((mb_strlen($custom_data) > 255)) {
            throw new \InvalidArgumentException('invalid length for $custom_data when calling SendingCreation., must be smaller than or equal to 255.');
        }
        if ((mb_strlen($custom_data) < 0)) {
            throw new \InvalidArgumentException('invalid length for $custom_data when calling SendingCreation., must be bigger than or equal to 0.');
        }

        $this->container['custom_data'] = $custom_data;

        return $this;
    }

    /**
     * Gets additional_sender_name
     *
     * @return string|null
     */
    public function getAdditionalSenderName()
    {
        return $this->container['additional_sender_name'];
    }

    /**
     * Sets additional_sender_name
     *
     * @param string|null $additional_sender_name Nom de l'expediteur défini par le client ajouté après le nom de l'expediteur
     *
     * @return self
     */
    public function setAdditionalSenderName($additional_sender_name)
    {
        if (is_null($additional_sender_name)) {
            throw new \InvalidArgumentException('non-nullable additional_sender_name cannot be null');
        }
        if ((mb_strlen($additional_sender_name) > 255)) {
            throw new \InvalidArgumentException('invalid length for $additional_sender_name when calling SendingCreation., must be smaller than or equal to 255.');
        }
        if ((mb_strlen($additional_sender_name) < 0)) {
            throw new \InvalidArgumentException('invalid length for $additional_sender_name when calling SendingCreation., must be bigger than or equal to 0.');
        }

        $this->container['additional_sender_name'] = $additional_sender_name;

        return $this;
    }

    /**
     * Gets message
     *
     * @return string|null
     */
    public function getMessage()
    {
        return $this->container['message'];
    }

    /**
     * Sets message
     *
     * @param string|null $message Message libre défini par le client transmis aux destinataires lors de l'ouverture de son courrier
     *
     * @return self
     */
    public function setMessage($message)
    {
        if (is_null($message)) {
            throw new \InvalidArgumentException('non-nullable message cannot be null');
        }
        if ((mb_strlen($message) > 450)) {
            throw new \InvalidArgumentException('invalid length for $message when calling SendingCreation., must be smaller than or equal to 450.');
        }
        if ((mb_strlen($message) < 0)) {
            throw new \InvalidArgumentException('invalid length for $message when calling SendingCreation., must be bigger than or equal to 0.');
        }

        $this->container['message'] = $message;

        return $this;
    }

    /**
     * Gets pre_notification
     *
     * @return bool|null
     */
    public function getPreNotification()
    {
        return $this->container['pre_notification'];
    }

    /**
     * Sets pre_notification
     *
     * @param bool|null $pre_notification prénotification au destinataire de l'envoi d'une LREQ
     *
     * @return self
     */
    public function setPreNotification($pre_notification)
    {
        if (is_null($pre_notification)) {
            throw new \InvalidArgumentException('non-nullable pre_notification cannot be null');
        }
        $this->container['pre_notification'] = $pre_notification;

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



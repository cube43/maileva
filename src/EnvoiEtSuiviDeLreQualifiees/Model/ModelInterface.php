<?php
/**
 * ModelInterface
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Cube43\Component\MailEva\EnvoiEtSuiviDeLreQualifiees\Model
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

namespace Cube43\Component\MailEva\EnvoiEtSuiviDeLreQualifiees\Model;

/**
 * Interface abstracting model access.
 *
 * @package Cube43\Component\MailEva\EnvoiEtSuiviDeLreQualifiees\Model
 * @author  OpenAPI Generator team
 */
interface ModelInterface
{
    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName();

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes();

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats();

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     *
     * @return array
     */
    public static function attributeMap();

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters();

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters();

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array
     */
    public function listInvalidProperties();

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool
     */
    public function valid();

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool;

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool;
}

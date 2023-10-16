<?php
/**
 * NotificationsApi
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

namespace Cube43\Component\MailEva\NotificationsWebhooks\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Cube43\Component\MailEva\NotificationsWebhooks\ApiException;
use Cube43\Component\MailEva\NotificationsWebhooks\Configuration;
use Cube43\Component\MailEva\NotificationsWebhooks\HeaderSelector;
use Cube43\Component\MailEva\NotificationsWebhooks\ObjectSerializer;

/**
 * NotificationsApi Class Doc Comment
 *
 * @category Class
 * @package  Cube43\Component\MailEva\NotificationsWebhooks
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class NotificationsApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] $contentTypes **/
    public const contentTypes = [
        'notificationsGet' => [
            'application/json',
        ],
        'notificationsNotificationIdContentGet' => [
            'application/json',
        ],
        'notificationsNotificationIdGet' => [
            'application/json',
        ],
        'notificationsNotificationIdRetryPost' => [
            'application/json',
        ],
    ];

/**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $hostIndex = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $hostIndex;
    }

    /**
     * Set the host index
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation notificationsGet
     *
     * Liste des notifications
     *
     * @param  float $start_index Le premier élément à retourner (optional, default to 1)
     * @param  float $count Le nombre d&#39;élément à retourner (optional, default to 50)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsGet'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse
     */
    public function notificationsGet($start_index = 1, $count = 50, string $contentType = self::contentTypes['notificationsGet'][0])
    {
        list($response) = $this->notificationsGetWithHttpInfo($start_index, $count, $contentType);
        return $response;
    }

    /**
     * Operation notificationsGetWithHttpInfo
     *
     * Liste des notifications
     *
     * @param  float $start_index Le premier élément à retourner (optional, default to 1)
     * @param  float $count Le nombre d&#39;élément à retourner (optional, default to 50)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsGet'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function notificationsGetWithHttpInfo($start_index = 1, $count = 50, string $contentType = self::contentTypes['notificationsGet'][0])
    {
        $request = $this->notificationsGetRequest($start_index, $count, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationsResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation notificationsGetAsync
     *
     * Liste des notifications
     *
     * @param  float $start_index Le premier élément à retourner (optional, default to 1)
     * @param  float $count Le nombre d&#39;élément à retourner (optional, default to 50)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notificationsGetAsync($start_index = 1, $count = 50, string $contentType = self::contentTypes['notificationsGet'][0])
    {
        return $this->notificationsGetAsyncWithHttpInfo($start_index, $count, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation notificationsGetAsyncWithHttpInfo
     *
     * Liste des notifications
     *
     * @param  float $start_index Le premier élément à retourner (optional, default to 1)
     * @param  float $count Le nombre d&#39;élément à retourner (optional, default to 50)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notificationsGetAsyncWithHttpInfo($start_index = 1, $count = 50, string $contentType = self::contentTypes['notificationsGet'][0])
    {
        $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationsResponse';
        $request = $this->notificationsGetRequest($start_index, $count, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'notificationsGet'
     *
     * @param  float $start_index Le premier élément à retourner (optional, default to 1)
     * @param  float $count Le nombre d&#39;élément à retourner (optional, default to 50)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function notificationsGetRequest($start_index = 1, $count = 50, string $contentType = self::contentTypes['notificationsGet'][0])
    {

        
        

        $resourcePath = '/notifications';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $start_index,
            'start_index', // param base name
            'number', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $count,
            'count', // param base name
            'number', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);




        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation notificationsNotificationIdContentGet
     *
     * Contenu d&#39;une notification
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdContentGet'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationContentCreation|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse
     */
    public function notificationsNotificationIdContentGet($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdContentGet'][0])
    {
        list($response) = $this->notificationsNotificationIdContentGetWithHttpInfo($notification_id, $contentType);
        return $response;
    }

    /**
     * Operation notificationsNotificationIdContentGetWithHttpInfo
     *
     * Contenu d&#39;une notification
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdContentGet'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationContentCreation|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function notificationsNotificationIdContentGetWithHttpInfo($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdContentGet'][0])
    {
        $request = $this->notificationsNotificationIdContentGetRequest($notification_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationContentCreation' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationContentCreation' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationContentCreation', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationContentCreation';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationContentCreation',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation notificationsNotificationIdContentGetAsync
     *
     * Contenu d&#39;une notification
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdContentGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notificationsNotificationIdContentGetAsync($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdContentGet'][0])
    {
        return $this->notificationsNotificationIdContentGetAsyncWithHttpInfo($notification_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation notificationsNotificationIdContentGetAsyncWithHttpInfo
     *
     * Contenu d&#39;une notification
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdContentGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notificationsNotificationIdContentGetAsyncWithHttpInfo($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdContentGet'][0])
    {
        $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationContentCreation';
        $request = $this->notificationsNotificationIdContentGetRequest($notification_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'notificationsNotificationIdContentGet'
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdContentGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function notificationsNotificationIdContentGetRequest($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdContentGet'][0])
    {

        // verify the required parameter 'notification_id' is set
        if ($notification_id === null || (is_array($notification_id) && count($notification_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $notification_id when calling notificationsNotificationIdContentGet'
            );
        }
        if (strlen($notification_id) > 40) {
            throw new \InvalidArgumentException('invalid length for "$notification_id" when calling NotificationsApi.notificationsNotificationIdContentGet, must be smaller than or equal to 40.');
        }
        

        $resourcePath = '/notifications/{notification_id}/content';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($notification_id !== null) {
            $resourcePath = str_replace(
                '{' . 'notification_id' . '}',
                ObjectSerializer::toPathValue($notification_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation notificationsNotificationIdGet
     *
     * Détail d&#39;une notification
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdGet'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse
     */
    public function notificationsNotificationIdGet($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdGet'][0])
    {
        list($response) = $this->notificationsNotificationIdGetWithHttpInfo($notification_id, $contentType);
        return $response;
    }

    /**
     * Operation notificationsNotificationIdGetWithHttpInfo
     *
     * Détail d&#39;une notification
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdGet'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function notificationsNotificationIdGetWithHttpInfo($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdGet'][0])
    {
        $request = $this->notificationsNotificationIdGetRequest($notification_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 404:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation notificationsNotificationIdGetAsync
     *
     * Détail d&#39;une notification
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notificationsNotificationIdGetAsync($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdGet'][0])
    {
        return $this->notificationsNotificationIdGetAsyncWithHttpInfo($notification_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation notificationsNotificationIdGetAsyncWithHttpInfo
     *
     * Détail d&#39;une notification
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notificationsNotificationIdGetAsyncWithHttpInfo($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdGet'][0])
    {
        $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse';
        $request = $this->notificationsNotificationIdGetRequest($notification_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'notificationsNotificationIdGet'
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function notificationsNotificationIdGetRequest($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdGet'][0])
    {

        // verify the required parameter 'notification_id' is set
        if ($notification_id === null || (is_array($notification_id) && count($notification_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $notification_id when calling notificationsNotificationIdGet'
            );
        }
        if (strlen($notification_id) > 40) {
            throw new \InvalidArgumentException('invalid length for "$notification_id" when calling NotificationsApi.notificationsNotificationIdGet, must be smaller than or equal to 40.');
        }
        

        $resourcePath = '/notifications/{notification_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($notification_id !== null) {
            $resourcePath = str_replace(
                '{' . 'notification_id' . '}',
                ObjectSerializer::toPathValue($notification_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'GET',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation notificationsNotificationIdRetryPost
     *
     * Rejoue des notifications
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdRetryPost'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse
     */
    public function notificationsNotificationIdRetryPost($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdRetryPost'][0])
    {
        list($response) = $this->notificationsNotificationIdRetryPostWithHttpInfo($notification_id, $contentType);
        return $response;
    }

    /**
     * Operation notificationsNotificationIdRetryPostWithHttpInfo
     *
     * Rejoue des notifications
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdRetryPost'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function notificationsNotificationIdRetryPostWithHttpInfo($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdRetryPost'][0])
    {
        $request = $this->notificationsNotificationIdRetryPostRequest($notification_id, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? (string) $e->getResponse()->getBody() : null
                );
            } catch (ConnectException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    (int) $e->getCode(),
                    null,
                    null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        (string) $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    (string) $response->getBody()
                );
            }

            switch($statusCode) {
                case 200:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 400:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                case 401:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse';
            if ($returnType === '\SplFileObject') {
                $content = $response->getBody(); //stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ($returnType !== 'string') {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation notificationsNotificationIdRetryPostAsync
     *
     * Rejoue des notifications
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdRetryPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notificationsNotificationIdRetryPostAsync($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdRetryPost'][0])
    {
        return $this->notificationsNotificationIdRetryPostAsyncWithHttpInfo($notification_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation notificationsNotificationIdRetryPostAsyncWithHttpInfo
     *
     * Rejoue des notifications
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdRetryPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function notificationsNotificationIdRetryPostAsyncWithHttpInfo($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdRetryPost'][0])
    {
        $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\NotificationResponse';
        $request = $this->notificationsNotificationIdRetryPostRequest($notification_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ($returnType === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        (string) $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'notificationsNotificationIdRetryPost'
     *
     * @param  string $notification_id Identifiant de la notification (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['notificationsNotificationIdRetryPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function notificationsNotificationIdRetryPostRequest($notification_id, string $contentType = self::contentTypes['notificationsNotificationIdRetryPost'][0])
    {

        // verify the required parameter 'notification_id' is set
        if ($notification_id === null || (is_array($notification_id) && count($notification_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $notification_id when calling notificationsNotificationIdRetryPost'
            );
        }
        if (strlen($notification_id) > 40) {
            throw new \InvalidArgumentException('invalid length for "$notification_id" when calling NotificationsApi.notificationsNotificationIdRetryPost, must be smaller than or equal to 40.');
        }
        

        $resourcePath = '/notifications/{notification_id}/retry';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($notification_id !== null) {
            $resourcePath = str_replace(
                '{' . 'notification_id' . '}',
                ObjectSerializer::toPathValue($notification_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name' => $formParamName,
                            'contents' => $formParamValueItem
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires OAuth (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }
        // this endpoint requires Bearer (JWT) authentication (access token)
        if (!empty($this->config->getAccessToken())) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query = ObjectSerializer::buildQuery($queryParams);
        return new Request(
            'POST',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}

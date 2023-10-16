<?php
/**
 * AbonnementsApi
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
 * AbonnementsApi Class Doc Comment
 *
 * @category Class
 * @package  Cube43\Component\MailEva\NotificationsWebhooks
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class AbonnementsApi
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
        'subscriptionsGet' => [
            'application/json',
        ],
        'subscriptionsPost' => [
            'application/json',
        ],
        'subscriptionsSubscriptionIdDelete' => [
            'application/json',
        ],
        'subscriptionsSubscriptionIdGet' => [
            'application/json',
        ],
        'subscriptionsSubscriptionIdPatch' => [
            'application/merge-patch+json',
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
     * Operation subscriptionsGet
     *
     * Liste des abonnements
     *
     * @param  float $start_index Le premier élément à retourner (optional, default to 1)
     * @param  float $count Le nombre d&#39;élément à retourner (optional, default to 50)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsGet'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse
     */
    public function subscriptionsGet($start_index = 1, $count = 50, string $contentType = self::contentTypes['subscriptionsGet'][0])
    {
        list($response) = $this->subscriptionsGetWithHttpInfo($start_index, $count, $contentType);
        return $response;
    }

    /**
     * Operation subscriptionsGetWithHttpInfo
     *
     * Liste des abonnements
     *
     * @param  float $start_index Le premier élément à retourner (optional, default to 1)
     * @param  float $count Le nombre d&#39;élément à retourner (optional, default to 50)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsGet'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function subscriptionsGetWithHttpInfo($start_index = 1, $count = 50, string $contentType = self::contentTypes['subscriptionsGet'][0])
    {
        $request = $this->subscriptionsGetRequest($start_index, $count, $contentType);

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
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionsResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionsResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionsResponse', []),
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

            $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionsResponse';
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
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionsResponse',
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
     * Operation subscriptionsGetAsync
     *
     * Liste des abonnements
     *
     * @param  float $start_index Le premier élément à retourner (optional, default to 1)
     * @param  float $count Le nombre d&#39;élément à retourner (optional, default to 50)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionsGetAsync($start_index = 1, $count = 50, string $contentType = self::contentTypes['subscriptionsGet'][0])
    {
        return $this->subscriptionsGetAsyncWithHttpInfo($start_index, $count, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation subscriptionsGetAsyncWithHttpInfo
     *
     * Liste des abonnements
     *
     * @param  float $start_index Le premier élément à retourner (optional, default to 1)
     * @param  float $count Le nombre d&#39;élément à retourner (optional, default to 50)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionsGetAsyncWithHttpInfo($start_index = 1, $count = 50, string $contentType = self::contentTypes['subscriptionsGet'][0])
    {
        $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionsResponse';
        $request = $this->subscriptionsGetRequest($start_index, $count, $contentType);

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
     * Create request for operation 'subscriptionsGet'
     *
     * @param  float $start_index Le premier élément à retourner (optional, default to 1)
     * @param  float $count Le nombre d&#39;élément à retourner (optional, default to 50)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function subscriptionsGetRequest($start_index = 1, $count = 50, string $contentType = self::contentTypes['subscriptionsGet'][0])
    {

        
        

        $resourcePath = '/subscriptions';
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
     * Operation subscriptionsPost
     *
     * Création d&#39;un abonnement
     *
     * @param  \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionCreation $subscription_creation subscription_creation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsPost'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse
     */
    public function subscriptionsPost($subscription_creation = null, string $contentType = self::contentTypes['subscriptionsPost'][0])
    {
        list($response) = $this->subscriptionsPostWithHttpInfo($subscription_creation, $contentType);
        return $response;
    }

    /**
     * Operation subscriptionsPostWithHttpInfo
     *
     * Création d&#39;un abonnement
     *
     * @param  \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionCreation $subscription_creation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsPost'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function subscriptionsPostWithHttpInfo($subscription_creation = null, string $contentType = self::contentTypes['subscriptionsPost'][0])
    {
        $request = $this->subscriptionsPostRequest($subscription_creation, $contentType);

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
                case 201:
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse', []),
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

            $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse';
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
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse',
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
     * Operation subscriptionsPostAsync
     *
     * Création d&#39;un abonnement
     *
     * @param  \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionCreation $subscription_creation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionsPostAsync($subscription_creation = null, string $contentType = self::contentTypes['subscriptionsPost'][0])
    {
        return $this->subscriptionsPostAsyncWithHttpInfo($subscription_creation, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation subscriptionsPostAsyncWithHttpInfo
     *
     * Création d&#39;un abonnement
     *
     * @param  \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionCreation $subscription_creation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionsPostAsyncWithHttpInfo($subscription_creation = null, string $contentType = self::contentTypes['subscriptionsPost'][0])
    {
        $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse';
        $request = $this->subscriptionsPostRequest($subscription_creation, $contentType);

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
     * Create request for operation 'subscriptionsPost'
     *
     * @param  \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionCreation $subscription_creation (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsPost'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function subscriptionsPostRequest($subscription_creation = null, string $contentType = self::contentTypes['subscriptionsPost'][0])
    {



        $resourcePath = '/subscriptions';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;





        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($subscription_creation)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($subscription_creation));
            } else {
                $httpBody = $subscription_creation;
            }
        } elseif (count($formParams) > 0) {
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
     * Operation subscriptionsSubscriptionIdDelete
     *
     * Suppression d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdDelete'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function subscriptionsSubscriptionIdDelete($subscription_id, string $contentType = self::contentTypes['subscriptionsSubscriptionIdDelete'][0])
    {
        $this->subscriptionsSubscriptionIdDeleteWithHttpInfo($subscription_id, $contentType);
    }

    /**
     * Operation subscriptionsSubscriptionIdDeleteWithHttpInfo
     *
     * Suppression d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdDelete'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function subscriptionsSubscriptionIdDeleteWithHttpInfo($subscription_id, string $contentType = self::contentTypes['subscriptionsSubscriptionIdDelete'][0])
    {
        $request = $this->subscriptionsSubscriptionIdDeleteRequest($subscription_id, $contentType);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
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
     * Operation subscriptionsSubscriptionIdDeleteAsync
     *
     * Suppression d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionsSubscriptionIdDeleteAsync($subscription_id, string $contentType = self::contentTypes['subscriptionsSubscriptionIdDelete'][0])
    {
        return $this->subscriptionsSubscriptionIdDeleteAsyncWithHttpInfo($subscription_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation subscriptionsSubscriptionIdDeleteAsyncWithHttpInfo
     *
     * Suppression d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionsSubscriptionIdDeleteAsyncWithHttpInfo($subscription_id, string $contentType = self::contentTypes['subscriptionsSubscriptionIdDelete'][0])
    {
        $returnType = '';
        $request = $this->subscriptionsSubscriptionIdDeleteRequest($subscription_id, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'subscriptionsSubscriptionIdDelete'
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdDelete'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function subscriptionsSubscriptionIdDeleteRequest($subscription_id, string $contentType = self::contentTypes['subscriptionsSubscriptionIdDelete'][0])
    {

        // verify the required parameter 'subscription_id' is set
        if ($subscription_id === null || (is_array($subscription_id) && count($subscription_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription_id when calling subscriptionsSubscriptionIdDelete'
            );
        }
        if (strlen($subscription_id) > 40) {
            throw new \InvalidArgumentException('invalid length for "$subscription_id" when calling AbonnementsApi.subscriptionsSubscriptionIdDelete, must be smaller than or equal to 40.');
        }
        

        $resourcePath = '/subscriptions/{subscription_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($subscription_id !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription_id' . '}',
                ObjectSerializer::toPathValue($subscription_id),
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
            'DELETE',
            $operationHost . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation subscriptionsSubscriptionIdGet
     *
     * Détail d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdGet'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse
     */
    public function subscriptionsSubscriptionIdGet($subscription_id, string $contentType = self::contentTypes['subscriptionsSubscriptionIdGet'][0])
    {
        list($response) = $this->subscriptionsSubscriptionIdGetWithHttpInfo($subscription_id, $contentType);
        return $response;
    }

    /**
     * Operation subscriptionsSubscriptionIdGetWithHttpInfo
     *
     * Détail d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdGet'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function subscriptionsSubscriptionIdGetWithHttpInfo($subscription_id, string $contentType = self::contentTypes['subscriptionsSubscriptionIdGet'][0])
    {
        $request = $this->subscriptionsSubscriptionIdGetRequest($subscription_id, $contentType);

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
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse', []),
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

            $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse';
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
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse',
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
     * Operation subscriptionsSubscriptionIdGetAsync
     *
     * Détail d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionsSubscriptionIdGetAsync($subscription_id, string $contentType = self::contentTypes['subscriptionsSubscriptionIdGet'][0])
    {
        return $this->subscriptionsSubscriptionIdGetAsyncWithHttpInfo($subscription_id, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation subscriptionsSubscriptionIdGetAsyncWithHttpInfo
     *
     * Détail d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionsSubscriptionIdGetAsyncWithHttpInfo($subscription_id, string $contentType = self::contentTypes['subscriptionsSubscriptionIdGet'][0])
    {
        $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse';
        $request = $this->subscriptionsSubscriptionIdGetRequest($subscription_id, $contentType);

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
     * Create request for operation 'subscriptionsSubscriptionIdGet'
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdGet'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function subscriptionsSubscriptionIdGetRequest($subscription_id, string $contentType = self::contentTypes['subscriptionsSubscriptionIdGet'][0])
    {

        // verify the required parameter 'subscription_id' is set
        if ($subscription_id === null || (is_array($subscription_id) && count($subscription_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription_id when calling subscriptionsSubscriptionIdGet'
            );
        }
        if (strlen($subscription_id) > 40) {
            throw new \InvalidArgumentException('invalid length for "$subscription_id" when calling AbonnementsApi.subscriptionsSubscriptionIdGet, must be smaller than or equal to 40.');
        }
        

        $resourcePath = '/subscriptions/{subscription_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($subscription_id !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription_id' . '}',
                ObjectSerializer::toPathValue($subscription_id),
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
     * Operation subscriptionsSubscriptionIdPatch
     *
     * Modification d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionModification $subscription_modification subscription_modification (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdPatch'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse
     */
    public function subscriptionsSubscriptionIdPatch($subscription_id, $subscription_modification = null, string $contentType = self::contentTypes['subscriptionsSubscriptionIdPatch'][0])
    {
        list($response) = $this->subscriptionsSubscriptionIdPatchWithHttpInfo($subscription_id, $subscription_modification, $contentType);
        return $response;
    }

    /**
     * Operation subscriptionsSubscriptionIdPatchWithHttpInfo
     *
     * Modification d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionModification $subscription_modification (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdPatch'] to see the possible values for this operation
     *
     * @throws \Cube43\Component\MailEva\NotificationsWebhooks\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorsResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse|\Cube43\Component\MailEva\NotificationsWebhooks\Model\ErrorResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function subscriptionsSubscriptionIdPatchWithHttpInfo($subscription_id, $subscription_modification = null, string $contentType = self::contentTypes['subscriptionsSubscriptionIdPatch'][0])
    {
        $request = $this->subscriptionsSubscriptionIdPatchRequest($subscription_id, $subscription_modification, $contentType);

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
                    if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse' === '\SplFileObject') {
                        $content = $response->getBody(); //stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse', []),
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

            $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse';
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
                        '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse',
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
     * Operation subscriptionsSubscriptionIdPatchAsync
     *
     * Modification d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionModification $subscription_modification (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdPatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionsSubscriptionIdPatchAsync($subscription_id, $subscription_modification = null, string $contentType = self::contentTypes['subscriptionsSubscriptionIdPatch'][0])
    {
        return $this->subscriptionsSubscriptionIdPatchAsyncWithHttpInfo($subscription_id, $subscription_modification, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation subscriptionsSubscriptionIdPatchAsyncWithHttpInfo
     *
     * Modification d&#39;un abonnement
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionModification $subscription_modification (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdPatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function subscriptionsSubscriptionIdPatchAsyncWithHttpInfo($subscription_id, $subscription_modification = null, string $contentType = self::contentTypes['subscriptionsSubscriptionIdPatch'][0])
    {
        $returnType = '\Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionResponse';
        $request = $this->subscriptionsSubscriptionIdPatchRequest($subscription_id, $subscription_modification, $contentType);

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
     * Create request for operation 'subscriptionsSubscriptionIdPatch'
     *
     * @param  string $subscription_id Identifiant de l&#39;abonnement (required)
     * @param  \Cube43\Component\MailEva\NotificationsWebhooks\Model\SubscriptionModification $subscription_modification (optional)
     * @param  string $contentType The value for the Content-Type header. Check self::contentTypes['subscriptionsSubscriptionIdPatch'] to see the possible values for this operation
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    public function subscriptionsSubscriptionIdPatchRequest($subscription_id, $subscription_modification = null, string $contentType = self::contentTypes['subscriptionsSubscriptionIdPatch'][0])
    {

        // verify the required parameter 'subscription_id' is set
        if ($subscription_id === null || (is_array($subscription_id) && count($subscription_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription_id when calling subscriptionsSubscriptionIdPatch'
            );
        }
        if (strlen($subscription_id) > 40) {
            throw new \InvalidArgumentException('invalid length for "$subscription_id" when calling AbonnementsApi.subscriptionsSubscriptionIdPatch, must be smaller than or equal to 40.');
        }
        


        $resourcePath = '/subscriptions/{subscription_id}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;



        // path params
        if ($subscription_id !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription_id' . '}',
                ObjectSerializer::toPathValue($subscription_id),
                $resourcePath
            );
        }


        $headers = $this->headerSelector->selectHeaders(
            ['application/json', ],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($subscription_modification)) {
            if (stripos($headers['Content-Type'], 'application/json') !== false) {
                # if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($subscription_modification));
            } else {
                $httpBody = $subscription_modification;
            }
        } elseif (count($formParams) > 0) {
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
            'PATCH',
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

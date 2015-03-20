<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class GoogleAnalytics {

    var $ga_api_applicationName;
    var $ga_api_clientId;
    var $ga_api_clientSecret;
    var $ga_api_redirectUri;
    var $ga_api_developerKey;
    var $client;

    public function __construct($params) {
        require_once 'google-api-php-client/src/Google_Client.php';
        require_once 'google-api-php-client/src/contrib/Google_AnalyticsService.php';
        
        $this->ga_api_applicationName = $params['applicationName'];
        $this->ga_api_clientId = $params['clientID'];
        $this->ga_api_clientSecret = $params['clientSecret'];
        $this->ga_api_redirectUri = $params['redirectUri'];
        $this->ga_api_developerKey = $params['developerKey'];
        
        session_start();

        $this->client = new Google_Client();

        $this->client->setApplicationName($this->ga_api_applicationName);
        $this->client->setClientId($this->ga_api_clientId);
        $this->client->setClientSecret($this->ga_api_clientSecret);
        $this->client->setRedirectUri($this->ga_api_redirectUri);
        $this->client->setDeveloperKey($this->ga_api_developerKey);
        $this->client->setScopes(array('https://www.googleapis.com/auth/analytics.readonly'));
        
         if (isset($_SESSION['token'])) {
            $this->client->setAccessToken($_SESSION['token']);
        }
    }
    
    
    public function logout(){
         unset($_SESSION['token']);
         die('Logged Out'
                 . '<br>'
                 . '<a href="http://localhost/sayuri-info-admin/index.php/welcome/googleAnalytics">Back</a>');
    }
    

    public function some_function() {
        $this->client->setUseObjects(true);
        
        if (isset($_GET['code'])) {
            $this->client->authenticate();
            $_SESSION['token'] = $this->client->getAccessToken();
            $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
        }

        
        if (!$this->client->getAccessToken()) {
            $authUrl = $this->client->createAuthUrl();
            print "<a class='login' href='$authUrl'>Connect Me!</a>";
        } else {
            // Create analytics service object. See next step below.
            $analytics = new Google_AnalyticsService($this->client);
            try {

//                $results = queryCoreReportingApi($analytics);
                // Success. Do something cool!

                $optParams = array(
                    'dimensions' => 'ga:browser',
                    'max-results' => '100');
                $results = $analytics->data_ga->get(
                        'ga:99650545', '2015-02-18', '2016-01-15', 'ga:sessions,ga:bounces,ga:users', $optParams);
                echo 'Start<br>';


                $this->printColumnHeaders($results);
                $this->printDataTable($results);
                echo '<br>';
                $this->printProfileInformation($results);
                echo '<br>';
                $this->printTotalsForAllResults($results);
            } catch (apiServiceException $e) {
                // Handle API service exceptions.
                $error = $e->getMessage();
            }
        }
        return "GA";
    }

    function printColumnHeaders($results) {
        $html = '';
        $headers = $results->getColumnHeaders();

        foreach ($headers as $header) {
            $html .= <<<HTML
Column Name = {$header->getName()}
Column Type = {$header->getColumnType()}
Column Data Type = {$header->getDataType()}
<br>
HTML;

            print $html;
        }
    }

    function printDataTable($results) {
        $table = '';
        if (count($results->getRows()) > 0) {
            $table .= '<table>';

            // Print headers.
            $table .= '<tr>';

            foreach ($results->getColumnHeaders() as $header) {
                $table .= '<th>' . $header->name . '</th>';
            }
            $table .= '</tr>';

            // Print table rows.
            foreach ($results->getRows() as $row) {
                $table .= '<tr>';
                foreach ($row as $cell) {
                    $table .= '<td>'
                            . htmlspecialchars($cell, ENT_NOQUOTES)
                            . '</td>';
                }
                $table .= '</tr>';
            }
            $table .= '</table>';
        } else {
            $table .= '<p>No Results Found.</p>';
        }
        print $table;
    }

    function printProfileInformation($results) {
        $profileInfo = $results->getProfileInfo();

        $html = <<<HTML
<pre>
Account ID               = {$profileInfo->getAccountId()}
Web Property ID          = {$profileInfo->getWebPropertyId()}
Internal Web Property ID = {$profileInfo->getInternalWebPropertyId()}
Profile ID               = {$profileInfo->getProfileId()}
Table ID                 = {$profileInfo->getTableId()}
Profile Name             = {$profileInfo->getProfileName()}
</pre>
HTML;

        print $html;
    }

    function printTotalsForAllResults($results) {
        $html = '';
        $totals = $results->getTotalsForAllResults();

        foreach ($totals as $metricName => $metricTotal) {
            $html .= "Metric Name  = $metricName ";
            $html .= "Metric Total = $metricTotal <br>";
        }

        print $html;
    }

}

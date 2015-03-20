<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class GoogleAnalytics {

    public function some_function() {
        require_once 'google-api-php-client/src/Google_Client.php';
        require_once 'google-api-php-client/src/contrib/Google_AnalyticsService.php';
        session_start();

        $client = new Google_Client();
        $client->setApplicationName('test-Analytics');

// Visit https://console.developers.google.com/ to generate your
// client id, client secret, and to register your redirect uri.
        $client->setClientId('666657146859-mlofb35d8n25gso9srnps3dosrdg1ad9.apps.googleusercontent.com');
        $client->setClientSecret('ilUyJccyZqSU0ZHJla3uw3Rf');
        $client->setRedirectUri('http://localhost/sayuri-info-admin/index.php');
        $client->setDeveloperKey('AIzaSyB1qZ_BTiS8MiE2OwKZWi-XbN3eoDo9RZI');
        $client->setScopes(array('https://www.googleapis.com/auth/analytics.readonly'));

        $client->setUseObjects(true);
        if (isset($_GET['logout'])) { // logout: destroy token
            unset($_SESSION['token']);
            die('Logged out.');
        }

        if (isset($_GET['code'])) {
            $client->authenticate();
            $_SESSION['token'] = $client->getAccessToken();
            $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
        }

        if (isset($_SESSION['token'])) {
            $client->setAccessToken($_SESSION['token']);
        }

        if (!$client->getAccessToken()) {
            $authUrl = $client->createAuthUrl();
            print "<a class='login' href='$authUrl'>Connect Me!</a>";
        } else {
            // Create analytics service object. See next step below.
            $analytics = new Google_AnalyticsService($client);
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

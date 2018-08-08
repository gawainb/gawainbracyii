<?php

class jasper_server_client {
    private $url;
    private $username;
    private $password;

    public function __construct($url, $username, $password) {
        $this->url = $url;
        $this->username = $username;
        $this->password = $password;
    }

    public function requestReport($report, $format, $params) {
        $params_xml = "";
        if(!empty($params))
        {
            foreach ($params as $name => $value) {
            $params_xml .= "<parameter name=\"$name\"><![CDATA[$value]]></parameter>\n";
            }
        }
        $request = "
      <request operationName=\"runReport\" locale=\"en\">
        <argument name=\"RUN_OUTPUT_FORMAT\">$format</argument>
        <resourceDescriptor name=\"\" wsType=\"\"
        uriString=\"$report\"
        isNew=\"false\">
        <label>null</label>
        $params_xml
        </resourceDescriptor>
      </request>
    ";

        $client = new SoapClient(null, array(
            'location'  => $this->url,
            'uri'       => 'urn:',
            'login'     => $this->username,
            'password'  => $this->password,
            'trace'    => 1,
            'exception'=> 1,
            'soap_version'  => SOAP_1_1,
            'style'    => SOAP_RPC,
            'use'      => SOAP_LITERAL

        ));

        $html = null;
        $pdf = null;
        if($report_format = 'HTML'){
            try {
                $result = $client->__soapCall('runReport', array(
                    new SoapParam($request,"requestXmlString")
                ));

                $html = $this->parseReponseWithReportData(
                    $client->__getLastResponseHeaders(),
                    $client->__getLastResponse());
            } catch(SoapFault $exception) {
                $responseHeaders = $client->__getLastResponseHeaders();
                if ($exception->faultstring == "looks like we got no XML document" &&
                    strpos($responseHeaders, "Content-Type: multipart/related;") !== false) {
                    $html = $this->parseReponseWithReportData($responseHeaders, $client->__getLastResponse());
                } else {
                    throw $exception;
                }
            }

            if ($html)
                return $html;
            else
                throw new Exception("Jasper did not return HTML data. Instead got: \n$html");
        }
    }

    protected function parseReponseWithReportData($responseHeaders, $responseBody) {
        preg_match('/boundary="(.*?)"/', $responseHeaders, $matches);
        $boundary = $matches[1];
        $parts = explode($boundary, $responseBody);

        $html = null;
        foreach($parts as $part) {
            if (strpos($part, "Content-Type: text/html") !== false) {
                $html = substr($part, strpos($part, '%HTML-'));
                break;
            }
        }

        return $html;
    }

}
?>
<?php

namespace Website;

class GitHubData
{
    const API_BASE_URL = "https://api.github.com/users/Cverine/repos";
    const SELECTED_PROJECTS = [
        'ALNJ',
        'FlyAround',
        'Wiki-des-Maires',
        'Maths-calculator',
        'Portfolio',
        'WildCircus'
    ];

    private $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';

    public function getGitHubData($apiKey)
    {
        $projects = $this->apiConnect(self::API_BASE_URL, $apiKey);
        $repositories = $this->getSelectedProjects($projects);

        return $repositories;
    }

    public function apiConnect($url, $apiKey)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_USERAGENT, $this->agent);
        $headers = [];
        $headers[] = 'Authorization:' . $apiKey;
        $headers[] = 'Accept: application/vnd.github.mercy-preview+json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        if(curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close ($ch);

        $json = json_decode($result, true);
        return $json;
    }

    private function getSelectedProjects($json)
    {
        $selectedProjects = [];
        foreach ($json as $project) {
            if (in_array($project['name'], self::SELECTED_PROJECTS)) {
                $date = date_create($project['pushed_at']);
                $pushed = $date->format('F Y');
                $selectedProjects[] = [
                    "name" => $project['name'],
                    "description" => $project['description'],
                    "pushed_at" => $pushed,
                    "html_url" => $project['html_url'],
                    "topics" => $project['topics'],
                    "website" => $project['homepage']
                ];
            }
        }
        return $selectedProjects;
    }
}

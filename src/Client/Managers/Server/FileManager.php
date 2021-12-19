<?php

/**
 * Created with love by: PatryQHyper.pl
 * Date: 19.12.2021 01:12
 * Using: PhpStorm
 */

namespace PatryQHyper\Pterodactyl\Client\Managers\Server;

use PatryQHyper\Pterodactyl\BaseManager;

class FileManager extends BaseManager
{
    public function files(string $serverIdentifier, string $directory = '/')
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/files/list', compact('directory'));
    }

    public function contents(string $serverIdentifier, string $file)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/files/contents', compact('file'));
    }

    public function download(string $serverIdentifier, string $file)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/files/download', compact('file'));
    }

    public function rename(string $serverIdentifier, array $data)
    {
        return $this->httpClient->put('servers/' . $serverIdentifier . '/files/rename', $data);
    }

    public function copy(string $serverIdentifier, string $location)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/files/copy', [], compact('location'));
    }

    public function write(string $serverIdentifier, string $file, $content)
    {
        return $this->httpClient->request('servers/' . $serverIdentifier . '/files/write', 'POST', ['plain' => $content], compact('file'), true);
    }

    public function compress(string $serverIdentifier, array $data)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/files/compress', $data);
    }

    public function decompress(string $serverIdentifier, array $data)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/files/decompress', $data);
    }

    public function createFolder(string $serverIdentifier, array $data)
    {
        return $this->httpClient->post('servers/' . $serverIdentifier . '/files/create-folder', $data);
    }

    public function getUploadUrl(string $serverIdentifier)
    {
        return $this->httpClient->get('servers/' . $serverIdentifier . '/files/upload');
    }
}
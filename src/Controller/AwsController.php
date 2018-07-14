<?php

namespace App\Controller;

use Cake\Routing\Router;
use Cake\ORM\Table;
use Cake\Controller\Controller;
use Aws\S3\S3Client;
use Aws\Iam\IamClient;
use Aws\Exception\AwsException;
use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use Aws\CognitoIdentity\CognitoIdentityClient;
use Aws\CognitoIdentityProvider\Exception;
use  Aws\AwsClientTrait;
use  Aws\AwsClientInterface;

class AwsController extends Controller {

    public function index() {
      $client = CognitoIdentityProviderClient::factory(array(
    'profile' => 'default',
    'region'  => 'us-east-2',
    'version'     => 'latest',
	));
      $result = $client->adminGetUser([
    'UserPoolId' => 'us-east-2_4bvR0oGQq', // REQUIRED
    'Username' => 'dathanh', // REQUIRED
]);
       $result = $client->getUser([
    'AccessToken' => 'eyJraWQiOiIySWU1N1dZalVWejcrUlwvODg4S0dSbjd6Y3FhZGFnYW5pWVwvVndxK1Vzd1k9IiwiYWxnIjoiUlMyNTYifQ.eyJzdWIiOiI2NDc4MDZlNS0yNTg0LTQ0NWMtYmViNi01MzQ4MjVlYmE0MjAiLCJldmVudF9pZCI6ImUxZDZiMjA1LTg3MmEtMTFlOC1hNTI4LTg1NTM0NWM2NjExYyIsInRva2VuX3VzZSI6ImFjY2VzcyIsInNjb3BlIjoiYXdzLmNvZ25pdG8uc2lnbmluLnVzZXIuYWRtaW4iLCJhdXRoX3RpbWUiOjE1MzE1NDc4ODgsImlzcyI6Imh0dHBzOlwvXC9jb2duaXRvLWlkcC51cy1lYXN0LTIuYW1hem9uYXdzLmNvbVwvdXMtZWFzdC0yXzRidlIwb0dRcSIsImV4cCI6MTUzMTU1MTQ4OCwiaWF0IjoxNTMxNTQ3ODg4LCJqdGkiOiJlNDU0OGEwNS0wMzY4LTRjYTktOGNmZC01ODg2NmUxNWU3MmEiLCJjbGllbnRfaWQiOiI3dHBqb2x2MDNtN281YnVhbjhxMWQ5ZzZyYSIsInVzZXJuYW1lIjoiZGF0aGFuaCJ9.OrtO6XQZB1MtYlhADQ5ricVsd-4bgc0l3bENBamkp9ifnpybJKq8rWV_xGXujTUyWHhWKtKHCaxPNgpz0RBgsZIyuDm9F2zoAXLHG6T_Ka3157vZIhhs_QAGHDbZ9rRNUMrsxid-zTpmzMeOM1v5bGeRR8UEfIjZ3zEc5b-NZyzcYmrMoVoAfOBCa1bAKFo0d91rHMHQTarIsLaLixOYWM9YknNBtTQm5oZ3WlCCeZtWR3eJmERbRjw9fngmo_t-59RRR-3A3NqITKVb-ATqgmNigiGqvoOsoGEM3hZ8y2TzpdYtajWK9eAwd3LytuVTZvPq_rqfNQhh4Pd10MLqjA', // REQUIRED
	]);
       debug($result);die;
    }

}

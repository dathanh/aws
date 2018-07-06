<?php

namespace App\Controller;

use Cake\Routing\Router;
use Cake\ORM\Table;
use Cake\Controller\Controller;
use Aws\S3\S3Client;
use Aws\Iam\IamClient;
use Aws\Exception\AwsException;
use Aws\CognitoIdentity\CognitoIdentityClient;

class AwsController extends Controller {

    public function index() {
        $s3 = new Aws\S3\S3Client([
            'profile' => 'default',
            'version' => 'latest',
            'region' => 'us-east-1'
        ]);
    }

}

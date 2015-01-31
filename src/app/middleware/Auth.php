<?php

use QueryAuth\Credentials\Credentials;
use QueryAuth\Factory;
use QueryAuth\Request\Adapter\Incoming\SlimRequestAdapter;

class AuthMiddleware extends \Slim\Middleware {

	public function call() {

		$app = $this->app;

		$factory = new Factory();
		$requestValidator = $factory->newRequestValidator();
		$credentials = new Credentials('hAlAhUIPDtYIx4MgFcEijGQsukPGydAka3d6jTQ1', 'o9NIFMSbIIp9qMgGMcQOIRHnqYyUgIcKx0gpBTqisG8Ll67n4hTyRDd/Nvk2');
		$request = $app->request;

		# Catch issues in validation. Ignore them, else the app will die, this isn't done yet.
		try {
			global $utils;
			$check = $requestValidator->isValid(new SlimRequestAdapter($request), $credentials);
			if (!$check) {
				http_response_code(401);
				die($utils::api_msg('API key/secret/signature combo is incorrect. Unable to authenticate.'));
			}
		} catch (Exception $e) {
			die($utils::api_msg($e->getMessage()));
		}

		$this->next->call();
	}

}
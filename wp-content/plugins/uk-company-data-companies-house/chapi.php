<?php
final class companiesHouseApi {
	const API_ENDPOINT = 'https://api.companieshouse.gov.uk';
	private $api_key = null;

	public function __construct($api_key) {
		if (!empty($api_key)) {
			$this->api_key = $api_key;
		} else {
			throw new InvalidArgumentException('Please supply a valid API key');
		}
	}

	public function send($endpoint, array $payload = []) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->getRequestUrl($endpoint, $payload));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_USERPWD, $this->api_key . ':');
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		$result = curl_exec($ch);
		curl_close($ch);
		if ($json = json_decode($result, true)) {
			$result = $json;
		}
		return $result;
	}

	private function getRequestUrl($endpoint, array $payload) {
		$payload = array_merge($payload, ['ts' => time()]);
		$qs = '?' . http_build_query($payload);
		return self::API_ENDPOINT . $endpoint . $qs;
	}

}
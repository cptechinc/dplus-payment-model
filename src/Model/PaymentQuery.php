<?php

use Base\PaymentQuery as BasePaymentQuery;

use Dplus\Payments\Model\QueryTraits;

/**
 * Skeleton subclass for performing query and update operations on the 'Payment' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class PaymentQuery extends BasePaymentQuery {
	use QueryTraits;

	/**
	 * Selects Decrypted Card Number
	 *
	 * @param string $salt Value to Decrypt with
	 * @return void
	 */
	public function select_decrypted_cardnumber($salt) {
		$this->withColumn("cast(aes_decrypt(cardnbr, hex($salt)) as char charset utf8", 'cardnumber');
		$this->select('cardnumber');
	}

	/**
	 * Encrypts Card Number in the Database
	 *
	 * @param string $salt Value to Encrypt with
	 * @param string $ordn Sales Order number
	 * @return void
	 */
	public function encrypt_request_cardnumber($salt, $ordn) {
		$sql = "UPDATE authnet SET cardnbr = AES_ENCRYPT(cardnbr, HEX('$salt') WHERE ordernbr = :ordn AND rectype = 'REQ'";
		$params = array(':ordn' => $ordn);
		$this->execute_query($sql, $params);
	}

	/**
	 * Selects Decrypted Card Expiration Date
	 *
	 * @param string $salt Value to Decrypt with
	 * @return void
	 */
	public function select_decrypted_expiredate($salt) {
		$this->withColumn("cast(aes_decrypt(expdate, hex($salt)) as char charset utf8", 'expiredate');
		$this->select('expiredate');
	}

	/**
	 * Encrypts Expiration Date in the Database
	 *
	 * @param string $salt Value to Encrypt with
	 * @param string $ordn Sales Order number
	 * @return void
	 */
	public function encrypt_request_expiredate($salt, $ordn) {
		$sql = "UPDATE authnet SET expdate = AES_ENCRYPT(expdate, HEX('$salt') WHERE ordernbr = :ordn AND rectype = 'REQ'";
		$params = array(':ordn' => $ordn);
		$this->execute_query($sql, $params);
	}

	/**
	 * Selects Decrypted Card CVV
	 *
	 * @param string $salt Value to Decrypt with
	 * @return void
	 */
	public function select_decrypted_cvv($salt) {
		$this->withColumn("cast(aes_decrypt(cvv, hex($salt)) as char charset utf8", 'cvv');
		$this->select('cvv');
	}

	/**
	 * Encrypts CVV in the Database
	 *
	 * @param string $salt Value to Encrypt with
	 * @param string $ordn Sales Order number
	 * @return void
	 */
	public function encrypt_request_cvv($salt, $ordn) {
		$sql = "UPDATE authnet SET cvv = AES_ENCRYPT(cvv, HEX('$salt') WHERE ordernbr = :ordn AND rectype = 'REQ'";
		$params = array(':ordn' => $ordn);
		$this->execute_query($sql, $params);
	}

	/**
	 * Selects Decrypted Card Track1 Data
	 *
	 * @param string $salt Value to Decrypt with
	 * @return void
	 */
	public function select_decrypted_track1($salt) {
		$this->withColumn("cast(aes_decrypt(track_i, hex($salt)) as char charset utf8", 'track1');
		$this->select('track1');
	}

	/**
	 * Encrypts Track1 data in the Database
	 *
	 * @param string $salt Value to Encrypt with
	 * @param string $ordn Sales Order number
	 * @return void
	 */
	public function encrypt_request_track1($salt, $ordn) {
		$sql = "UPDATE authnet SET track_i = AES_ENCRYPT(track_i, HEX('$salt') WHERE ordernbr = :ordn AND rectype = 'REQ'";
		$params = array(':ordn' => $ordn);
		$this->execute_query($sql, $params);
	}

	/**
	 * Selects Decrypted Card Track2 Data
	 *
	 * @param string $salt Value to Decrypt with
	 * @return void
	 */
	public function select_decrypted_track2($salt) {
		$this->withColumn("cast(aes_decrypt(track_ii, hex($salt)) as char charset utf8", 'track2');
		$this->select('track2');
	}

	/**
	 * Encrypts Track2 data in the Database
	 *
	 * @param string $salt Value to Encrypt with
	 * @param string $ordn Sales Order number
	 * @return void
	 */
	public function encrypt_request_track2($salt, $ordn) {
		$sql = "UPDATE authnet SET track_ii = AES_ENCRYPT(track_ii, HEX('$salt') WHERE ordernbr = :ordn AND rectype = 'REQ'";
		$params = array(':ordn' => $ordn);
		$this->execute_query($sql, $params);
	}
}

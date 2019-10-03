<?php

use Base\PaymentQuery as BasePaymentQuery;

use Dplus\Payment\Model\QueryTraits;

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
	 * Selects Decrypted Card Track2 Data
	 *
	 * @param string $salt Value to Decrypt with
	 * @return void
	 */
	public function select_decrypted_track2($salt) {
		$this->withColumn("cast(aes_decrypt(track_ii, hex($salt)) as char charset utf8", 'track2');
		$this->select('track2');
	}
}

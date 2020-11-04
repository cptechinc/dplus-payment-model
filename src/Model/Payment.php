<?php

use Base\Payment as BasePayment;

use Dplus\Payments\Model\ThrowErrorTrait;
use Dplus\Payments\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'Payment' table.
 * @property string $type Transaction Type
 *                                          CREDIT   = CAPTURE | AUTHORIZE & CAPTURE
 *                                          DEBIT    = RETURN
 *                                          VOID     = CANCEL TRRANSACTION
 *                                          PREAUTH  = PREAUTHORIZE FOR AMOUNT
 *                                          CPREAUTH = CAPTURE PREAUTHORIZED 
 */
class Payment extends BasePayment {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	const RECORDTYPE_RESPONSE = 'RES';
	const RECORDTYPE_REQUEST  = 'REQ';

	const RESULT_DECLINED = 'DECLINED';
	const RESULT_APPROVED = 'APPROVED';

	private $salt;

	/**
	 * Column Aliases to lookup / get properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'ordn'              => 'ordernbr',
		'recordtype'        => 'rectype',
		'cardnumber'        => 'cardnbr',
		'track1'            => 'tracki',
		'track2'            => 'trackii',
		'expiredate'        => 'expdate',
		'transaction_type'  => 'rectype',
		'transaction_id'    => 'transid',
		'transactionid'     => 'transid',
		'authorizationcode' => 'authcode',
		'avs'               => 'avsmsg'
	);

	/**
	 * Set Salt Value for Encryption
	 * @param   string $salt
	 * @return void
	 */
	public function set_salt($salt) {
		$this->salt = $salt;
	}

	/**
	 * Set Salt Value for Encryption
	 * @param   string $salt
	 * @return void
	 */
	public function get_salt() {
		return $this->salt;
	}

	/**
	 * Return if Payment Record is a Request
	 * @return bool
	 */
	public function is_request() {
		return $this->rectype == self::RECORDTYPE_REQUEST;
	}

	/**
	 * Return if Payment Record is a Response
	 * @return bool
	 */
	public function is_response() {
		return $this->rectype == self::RECORDTYPE_RESPONSE;
	}

	/**
	 * Return if Card Track Data is present
	 * @return bool
	 */
	public function is_card_present() {
		return strlen($this->track2()) || strlen($this->trackii);
	}

	/**
	 * Return if Card Track Data is NOT present
	 * @return bool
	 */
	public function is_cnp() {
		return (strlen($this->track2()) || strlen($this->trackii)) === false;
	}

	/**
	 * Update Date / Time
	 * @return void
	 */
	public function set_datetime() {
		$this->setDate(date('Ymd'));
		$this->setTime(date('His'));
	}

	/**
	 * Sets Result property to Approved
	 * @return void
	 */
	public function approve() {
		$this->result = self::RESULT_APPROVED;
	}

	/**
	 * Sets Result property to Declined
	 * @return void
	 */
	public function decline() {
		$this->result = self::RESULT_DECLINED;
	}

/* =============================================================
	Decrypt Column Functions
============================================================= */
	/**
	 * Return Decrypted Column Value
	 * @param  string $col  Database Column
	 * @return mixed        Value
	 */
	public function decrypt($col) {
		$q = PaymentQuery::create();
		$q->select_decrypted_column($col, $this->salt);
		$q->filterByOrdn($this->ordn);
		$q->filterByRecordtype($this->recordtype);
		return $q->findOne();
	}

	/**
	 * Returns Decrypted Card Number
	 * @return string 
	 */
	public function cardnumber() {
		return $this->decrypt('cardnbr');
	}

	/**
	 * Returns Decrypted Card Expiration Date
	 * @return string 
	 */
	public function expiredate() {
		return $this->decrypt('expdate');
	}

	/**
	 * Returns Decrypted Card CVV
	 * @return string 
	 */
	public function cvv() {
		return $this->decrypt('cvv');
	}

	/**
	 * Returns Decrypted Card Track1 Data
	 * @return string 
	 */
	public function track1() {
		return $this->decrypt('track_i');
	}

	/**
	 * Returns Decrypted Card Track2 Data
	 * @return string 
	 */
	public function track2() {
		return $this->decrypt('track_ii');
	}
	
/* =============================================================
	Encrypt Functions
============================================================= */
	/**
	 * Encrypts Card Number in the Database
	 *  @return void
	 */
	public function encrypt_cardnumber() {
		PaymentQuery::create()->encrypt_column('cardnbr', $this->salt, $this->ordn);
	}

	/**
	 * Encrypts Expiration Date in the Database
	 * @return void
	 */
	public function encrypt_expiredate() {
		PaymentQuery::create()->encrypt_column('expdate', $this->salt, $this->ordn);
	}

	/**
	 * Encrypts CVV in the Database
	 * @return void
	 */
	public function encrypt_cvv() {
		PaymentQuery::create()->encrypt_column('cvv', $this->salt, $this->ordn);
	}

	/** 
	 * Encrypts Track1 data in the Database
	 * @return void
	 */
	public function encrypt_track1() {
		PaymentQuery::create()->encrypt_column('track_i', $this->salt, $this->ordn);
	}

	/**
	 * Encrypts Track2 data in the Database
	 * @return void
	 */
	public function encrypt_track2() {
		PaymentQuery::create()->encrypt_column('track_ii', $this->salt, $this->ordn);
	}

/* =============================================================
	Instance Functions
============================================================= */
	/**
	 * Creates a Payment object with the Rectype of Response
	 * @return Payment
	 */
	public static function create_response() {
		$response = new self();
		$response->setRectype(self::RECORDTYPE_RESPONSE);
		return $response;
	}

	/**
	 * Creates a Payment object with the Rectype of Request
	 *
	 * @return Payment
	 */
	public static function create_request() {
		$request = new self();
		$request->setRectype(self::RECORDTYPE_REQUEST);
		return $request;
	}
}

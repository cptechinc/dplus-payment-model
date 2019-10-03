<?php

use Base\Payment as BasePayment;

use Dplus\Payments\Model\ThrowErrorTrait;
use Dplus\Payments\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'Payment' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
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
	 * Transaction Type
	 * CREDIT   = CAPTURE | AUTHORIZE & CAPTURE
	 * DEBIT    = RETURN
	 * VOID     = CANCEL TRRANSACTION
	 * PREAUTH  = PREAUTHORIZE FOR AMOUNT
	 * CPREAUTH = CAPTURE PREAUTHORIZED 
	 * @var string
	 */
	protected $type;

	/**
	 * Column Aliases to lookup / get properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'ordn'              => 'ordernbr',
		'recordtype'        => 'rectype',
		'cardnumber'        => 'cardnbr',
		'track1'            => 'track_i',
		'track2'            => 'track_ii',
		'expiredate'        => 'expdate',
		'transaction_type'  => 'type',
		'transaction_id'    => 'trans_id',
		'authorizationcode' => 'authcode'
	);

	public function set_salt($salt) {
		$this->salt = $salt;
	}

	/**
	 * Returns if Payment Record is a Request
	 *
	 * @return boolean
	 */
	public function is_request() {
		return $this->rectype == self::RECORDTYPE_REQUEST;
	}

	/**
	 * Returns if Payment Record is a Response
	 *
	 * @return boolean
	 */
	public function is_response() {
		return $this->rectype == self::RECORDTYPE_RESPONSE;
	}

	/**
	 * Returns Decrypted Card Number
	 * 
	 * @return string 
	 */
	public function cardnumber() {
		$q = PaymentQuery::create();
		$q->select_decrypted_cardnumber($this->salt);
		$q->filterByOrdn($this->ordn);
		$q->filterByRecordtype($this->recordtype);
		$q->findOne();
	}

	/**
	 * Returns Decrypted Card Expiration Date
	 * 
	 * @return string 
	 */
	public function expiredate() {
		$q = PaymentQuery::create();
		$q->select_decrypted_expiredate($this->salt);
		$q->filterByOrdn($this->ordn);
		$q->filterByRecordtype($this->recordtype);
		$q->findOne();
	}

	/**
	 * Returns Decrypted Card CVV
	 * 
	 * @return string 
	 */
	public function cvv() {
		$q = PaymentQuery::create();
		$q->select_decrypted_cvv($this->salt);
		$q->filterByOrdn($this->ordn);
		$q->filterByRecordtype($this->recordtype);
		$q->findOne();
	}

	/**
	 * Returns Decrypted Card Track1 Data
	 * 
	 * @return string 
	 */
	public function track1() {
		$q = PaymentQuery::create();
		$q->select_decrypted_track1($this->salt);
		$q->filterByOrdn($this->ordn);
		$q->filterByRecordtype($this->recordtype);
		$q->findOne();
	}

	/**
	 * Returns Decrypted Card Track2 Data
	 * 
	 * @return string 
	 */
	public function track2() {
		$q = PaymentQuery::create();
		$q->select_decrypted_track2($this->salt);
		$q->filterByOrdn($this->ordn);
		$q->filterByRecordtype($this->recordtype);
		$q->findOne();
	}

	/**
	 * Sets Result property to Approved
	 *
	 * @return void
	 */
	public function set_result_approved() {
		$this->result = self::RESULT_APPROVED;
	}

	/**
	 * Sets Result property to Declined
	 *
	 * @return void
	 */
	public function set_result_declined() {
		$this->result = self::RESULT_DECLINED;
	}

	/**
	 * Creates a Payment object with the Rectype of Response
	 *
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

	/**
	 * Encrypts Card Number in the Database
	 *  @return void
	 */
	public function encrypt_cardnumber() {
		PaymentQuery::create()->encrypt_request_expiredate($this->salt, $this->ordn);
	}

	/**
	 * Encrypts Expiration Date in the Database
	 * @return void
	 */
	public function encrypt_expiredate($salt, $ordn) {
		PaymentQuery::create()->encrypt_request_expiredate($this->salt, $this->ordn);
	}



	/**
	 * Encrypts CVV in the Database
	 * @return void
	 */
	public function encrypt_cvv() {
		PaymentQuery::create()->encrypt_request_cvv($this->salt, $this->ordn);
	}

	/** 
	 * Encrypts Track1 data in the Database
	 * @return void
	 */
	public function encrypt_track1() {
		PaymentQuery::create()->encrypt_request_track1($this->salt, $this->ordn);
	}


	/**
	 * Encrypts Track2 data in the Database
	 * @return void
	 */
	public function encrypt_track2() {
		PaymentQuery::create()->encrypt_request_track2($this->salt, $this->ordn);
	}
}

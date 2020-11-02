<?php

use Base\PaymentQuery as BasePaymentQuery;

use Dplus\Payments\Model\QueryTraits;

/**
 * Class for performing query and update operations on the 'Payment' table.
 */
class PaymentQuery extends BasePaymentQuery {
	use QueryTraits;

	/**
	 * Add Decrypted Column to Query
	 *
	 * @param string $col   Column
	 * @param string $salt  Salt Value
	 * @return PaymentQuery 
	 */
	public function select_decrypted_column($col, $salt) {
		$this->withColumn("cast(aes_decrypt($col, hex('$salt')) as char charset utf8)", 'decrypt');
		$this->select('decrypt');
		return $this;
	}

	/**
	 * Executes Query to Encrypt Column
	 * @param  string $col   Column
	 * @param  string $salt  Salt Value
	 * @param  string $ordn  Order Number
	 * @return void
	 */
	public function encrypt_column($col, $salt, $ordn) {
		$sql = "UPDATE authnet SET cardnbr = AES_ENCRYPT($col, HEX('$salt')) WHERE ordernbr = :ordn AND rectype = 'REQ'";
		echo $sql;
		$params = array(':ordn' => $ordn);
		$this->execute_query($sql, $params);
	}
}

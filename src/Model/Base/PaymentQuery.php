<?php

namespace Base;

use \Payment as ChildPayment;
use \PaymentQuery as ChildPaymentQuery;
use \Exception;
use \PDO;
use Map\PaymentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'authnet' table.
 *
 *
 *
 * @method     ChildPaymentQuery orderByOrdernbr($order = Criteria::ASC) Order by the ordernbr column
 * @method     ChildPaymentQuery orderByRectype($order = Criteria::ASC) Order by the rectype column
 * @method     ChildPaymentQuery orderByDate($order = Criteria::ASC) Order by the date column
 * @method     ChildPaymentQuery orderByTime($order = Criteria::ASC) Order by the time column
 * @method     ChildPaymentQuery orderByCardnbr($order = Criteria::ASC) Order by the cardnbr column
 * @method     ChildPaymentQuery orderByTrackIi($order = Criteria::ASC) Order by the track_ii column
 * @method     ChildPaymentQuery orderByExpdate($order = Criteria::ASC) Order by the expdate column
 * @method     ChildPaymentQuery orderByCvv($order = Criteria::ASC) Order by the cvv column
 * @method     ChildPaymentQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildPaymentQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildPaymentQuery orderByCardName($order = Criteria::ASC) Order by the card_name column
 * @method     ChildPaymentQuery orderByStreet($order = Criteria::ASC) Order by the street column
 * @method     ChildPaymentQuery orderByZipcode($order = Criteria::ASC) Order by the zipcode column
 * @method     ChildPaymentQuery orderByCustid($order = Criteria::ASC) Order by the custid column
 * @method     ChildPaymentQuery orderByCustpo($order = Criteria::ASC) Order by the custpo column
 * @method     ChildPaymentQuery orderByTransId($order = Criteria::ASC) Order by the trans_id column
 * @method     ChildPaymentQuery orderByAuthcode($order = Criteria::ASC) Order by the authcode column
 * @method     ChildPaymentQuery orderByAvsMsg($order = Criteria::ASC) Order by the avs_msg column
 * @method     ChildPaymentQuery orderByErrorCode($order = Criteria::ASC) Order by the error_code column
 * @method     ChildPaymentQuery orderByErrorMsg($order = Criteria::ASC) Order by the error_msg column
 * @method     ChildPaymentQuery orderByResult($order = Criteria::ASC) Order by the result column
 * @method     ChildPaymentQuery orderByTrackI($order = Criteria::ASC) Order by the track_i column
 * @method     ChildPaymentQuery orderByDummy($order = Criteria::ASC) Order by the dummy column
 *
 * @method     ChildPaymentQuery groupByOrdernbr() Group by the ordernbr column
 * @method     ChildPaymentQuery groupByRectype() Group by the rectype column
 * @method     ChildPaymentQuery groupByDate() Group by the date column
 * @method     ChildPaymentQuery groupByTime() Group by the time column
 * @method     ChildPaymentQuery groupByCardnbr() Group by the cardnbr column
 * @method     ChildPaymentQuery groupByTrackIi() Group by the track_ii column
 * @method     ChildPaymentQuery groupByExpdate() Group by the expdate column
 * @method     ChildPaymentQuery groupByCvv() Group by the cvv column
 * @method     ChildPaymentQuery groupByType() Group by the type column
 * @method     ChildPaymentQuery groupByAmount() Group by the amount column
 * @method     ChildPaymentQuery groupByCardName() Group by the card_name column
 * @method     ChildPaymentQuery groupByStreet() Group by the street column
 * @method     ChildPaymentQuery groupByZipcode() Group by the zipcode column
 * @method     ChildPaymentQuery groupByCustid() Group by the custid column
 * @method     ChildPaymentQuery groupByCustpo() Group by the custpo column
 * @method     ChildPaymentQuery groupByTransId() Group by the trans_id column
 * @method     ChildPaymentQuery groupByAuthcode() Group by the authcode column
 * @method     ChildPaymentQuery groupByAvsMsg() Group by the avs_msg column
 * @method     ChildPaymentQuery groupByErrorCode() Group by the error_code column
 * @method     ChildPaymentQuery groupByErrorMsg() Group by the error_msg column
 * @method     ChildPaymentQuery groupByResult() Group by the result column
 * @method     ChildPaymentQuery groupByTrackI() Group by the track_i column
 * @method     ChildPaymentQuery groupByDummy() Group by the dummy column
 *
 * @method     ChildPaymentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPaymentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPaymentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPaymentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPaymentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPaymentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPayment findOne(ConnectionInterface $con = null) Return the first ChildPayment matching the query
 * @method     ChildPayment findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPayment matching the query, or a new ChildPayment object populated from the query conditions when no match is found
 *
 * @method     ChildPayment findOneByOrdernbr(string $ordernbr) Return the first ChildPayment filtered by the ordernbr column
 * @method     ChildPayment findOneByRectype(string $rectype) Return the first ChildPayment filtered by the rectype column
 * @method     ChildPayment findOneByDate(int $date) Return the first ChildPayment filtered by the date column
 * @method     ChildPayment findOneByTime(int $time) Return the first ChildPayment filtered by the time column
 * @method     ChildPayment findOneByCardnbr(string $cardnbr) Return the first ChildPayment filtered by the cardnbr column
 * @method     ChildPayment findOneByTrackIi(string $track_ii) Return the first ChildPayment filtered by the track_ii column
 * @method     ChildPayment findOneByExpdate(string $expdate) Return the first ChildPayment filtered by the expdate column
 * @method     ChildPayment findOneByCvv(string $cvv) Return the first ChildPayment filtered by the cvv column
 * @method     ChildPayment findOneByType(string $type) Return the first ChildPayment filtered by the type column
 * @method     ChildPayment findOneByAmount(string $amount) Return the first ChildPayment filtered by the amount column
 * @method     ChildPayment findOneByCardName(string $card_name) Return the first ChildPayment filtered by the card_name column
 * @method     ChildPayment findOneByStreet(string $street) Return the first ChildPayment filtered by the street column
 * @method     ChildPayment findOneByZipcode(string $zipcode) Return the first ChildPayment filtered by the zipcode column
 * @method     ChildPayment findOneByCustid(string $custid) Return the first ChildPayment filtered by the custid column
 * @method     ChildPayment findOneByCustpo(string $custpo) Return the first ChildPayment filtered by the custpo column
 * @method     ChildPayment findOneByTransId(string $trans_id) Return the first ChildPayment filtered by the trans_id column
 * @method     ChildPayment findOneByAuthcode(string $authcode) Return the first ChildPayment filtered by the authcode column
 * @method     ChildPayment findOneByAvsMsg(string $avs_msg) Return the first ChildPayment filtered by the avs_msg column
 * @method     ChildPayment findOneByErrorCode(string $error_code) Return the first ChildPayment filtered by the error_code column
 * @method     ChildPayment findOneByErrorMsg(string $error_msg) Return the first ChildPayment filtered by the error_msg column
 * @method     ChildPayment findOneByResult(string $result) Return the first ChildPayment filtered by the result column
 * @method     ChildPayment findOneByTrackI(string $track_i) Return the first ChildPayment filtered by the track_i column
 * @method     ChildPayment findOneByDummy(string $dummy) Return the first ChildPayment filtered by the dummy column *

 * @method     ChildPayment requirePk($key, ConnectionInterface $con = null) Return the ChildPayment by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOne(ConnectionInterface $con = null) Return the first ChildPayment matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPayment requireOneByOrdernbr(string $ordernbr) Return the first ChildPayment filtered by the ordernbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByRectype(string $rectype) Return the first ChildPayment filtered by the rectype column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByDate(int $date) Return the first ChildPayment filtered by the date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByTime(int $time) Return the first ChildPayment filtered by the time column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByCardnbr(string $cardnbr) Return the first ChildPayment filtered by the cardnbr column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByTrackIi(string $track_ii) Return the first ChildPayment filtered by the track_ii column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByExpdate(string $expdate) Return the first ChildPayment filtered by the expdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByCvv(string $cvv) Return the first ChildPayment filtered by the cvv column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByType(string $type) Return the first ChildPayment filtered by the type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByAmount(string $amount) Return the first ChildPayment filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByCardName(string $card_name) Return the first ChildPayment filtered by the card_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByStreet(string $street) Return the first ChildPayment filtered by the street column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByZipcode(string $zipcode) Return the first ChildPayment filtered by the zipcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByCustid(string $custid) Return the first ChildPayment filtered by the custid column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByCustpo(string $custpo) Return the first ChildPayment filtered by the custpo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByTransId(string $trans_id) Return the first ChildPayment filtered by the trans_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByAuthcode(string $authcode) Return the first ChildPayment filtered by the authcode column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByAvsMsg(string $avs_msg) Return the first ChildPayment filtered by the avs_msg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByErrorCode(string $error_code) Return the first ChildPayment filtered by the error_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByErrorMsg(string $error_msg) Return the first ChildPayment filtered by the error_msg column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByResult(string $result) Return the first ChildPayment filtered by the result column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByTrackI(string $track_i) Return the first ChildPayment filtered by the track_i column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPayment requireOneByDummy(string $dummy) Return the first ChildPayment filtered by the dummy column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPayment[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPayment objects based on current ModelCriteria
 * @method     ChildPayment[]|ObjectCollection findByOrdernbr(string $ordernbr) Return ChildPayment objects filtered by the ordernbr column
 * @method     ChildPayment[]|ObjectCollection findByRectype(string $rectype) Return ChildPayment objects filtered by the rectype column
 * @method     ChildPayment[]|ObjectCollection findByDate(int $date) Return ChildPayment objects filtered by the date column
 * @method     ChildPayment[]|ObjectCollection findByTime(int $time) Return ChildPayment objects filtered by the time column
 * @method     ChildPayment[]|ObjectCollection findByCardnbr(string $cardnbr) Return ChildPayment objects filtered by the cardnbr column
 * @method     ChildPayment[]|ObjectCollection findByTrackIi(string $track_ii) Return ChildPayment objects filtered by the track_ii column
 * @method     ChildPayment[]|ObjectCollection findByExpdate(string $expdate) Return ChildPayment objects filtered by the expdate column
 * @method     ChildPayment[]|ObjectCollection findByCvv(string $cvv) Return ChildPayment objects filtered by the cvv column
 * @method     ChildPayment[]|ObjectCollection findByType(string $type) Return ChildPayment objects filtered by the type column
 * @method     ChildPayment[]|ObjectCollection findByAmount(string $amount) Return ChildPayment objects filtered by the amount column
 * @method     ChildPayment[]|ObjectCollection findByCardName(string $card_name) Return ChildPayment objects filtered by the card_name column
 * @method     ChildPayment[]|ObjectCollection findByStreet(string $street) Return ChildPayment objects filtered by the street column
 * @method     ChildPayment[]|ObjectCollection findByZipcode(string $zipcode) Return ChildPayment objects filtered by the zipcode column
 * @method     ChildPayment[]|ObjectCollection findByCustid(string $custid) Return ChildPayment objects filtered by the custid column
 * @method     ChildPayment[]|ObjectCollection findByCustpo(string $custpo) Return ChildPayment objects filtered by the custpo column
 * @method     ChildPayment[]|ObjectCollection findByTransId(string $trans_id) Return ChildPayment objects filtered by the trans_id column
 * @method     ChildPayment[]|ObjectCollection findByAuthcode(string $authcode) Return ChildPayment objects filtered by the authcode column
 * @method     ChildPayment[]|ObjectCollection findByAvsMsg(string $avs_msg) Return ChildPayment objects filtered by the avs_msg column
 * @method     ChildPayment[]|ObjectCollection findByErrorCode(string $error_code) Return ChildPayment objects filtered by the error_code column
 * @method     ChildPayment[]|ObjectCollection findByErrorMsg(string $error_msg) Return ChildPayment objects filtered by the error_msg column
 * @method     ChildPayment[]|ObjectCollection findByResult(string $result) Return ChildPayment objects filtered by the result column
 * @method     ChildPayment[]|ObjectCollection findByTrackI(string $track_i) Return ChildPayment objects filtered by the track_i column
 * @method     ChildPayment[]|ObjectCollection findByDummy(string $dummy) Return ChildPayment objects filtered by the dummy column
 * @method     ChildPayment[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PaymentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\PaymentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'paymentsdb', $modelName = '\\Payment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPaymentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPaymentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPaymentQuery) {
            return $criteria;
        }
        $query = new ChildPaymentQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$ordernbr, $rectype] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPayment|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PaymentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PaymentTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPayment A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT ordernbr, rectype, date, time, cardnbr, track_ii, expdate, cvv, type, amount, card_name, street, zipcode, custid, custpo, trans_id, authcode, avs_msg, error_code, error_msg, result, track_i, dummy FROM authnet WHERE ordernbr = :p0 AND rectype = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPayment $obj */
            $obj = new ChildPayment();
            $obj->hydrate($row);
            PaymentTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPayment|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PaymentTableMap::COL_ORDERNBR, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PaymentTableMap::COL_RECTYPE, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PaymentTableMap::COL_ORDERNBR, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PaymentTableMap::COL_RECTYPE, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the ordernbr column
     *
     * Example usage:
     * <code>
     * $query->filterByOrdernbr('fooValue');   // WHERE ordernbr = 'fooValue'
     * $query->filterByOrdernbr('%fooValue%', Criteria::LIKE); // WHERE ordernbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ordernbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByOrdernbr($ordernbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ordernbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_ORDERNBR, $ordernbr, $comparison);
    }

    /**
     * Filter the query on the rectype column
     *
     * Example usage:
     * <code>
     * $query->filterByRectype('fooValue');   // WHERE rectype = 'fooValue'
     * $query->filterByRectype('%fooValue%', Criteria::LIKE); // WHERE rectype LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rectype The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByRectype($rectype = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rectype)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_RECTYPE, $rectype, $comparison);
    }

    /**
     * Filter the query on the date column
     *
     * Example usage:
     * <code>
     * $query->filterByDate(1234); // WHERE date = 1234
     * $query->filterByDate(array(12, 34)); // WHERE date IN (12, 34)
     * $query->filterByDate(array('min' => 12)); // WHERE date > 12
     * </code>
     *
     * @param     mixed $date The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByDate($date = null, $comparison = null)
    {
        if (is_array($date)) {
            $useMinMax = false;
            if (isset($date['min'])) {
                $this->addUsingAlias(PaymentTableMap::COL_DATE, $date['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($date['max'])) {
                $this->addUsingAlias(PaymentTableMap::COL_DATE, $date['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_DATE, $date, $comparison);
    }

    /**
     * Filter the query on the time column
     *
     * Example usage:
     * <code>
     * $query->filterByTime(1234); // WHERE time = 1234
     * $query->filterByTime(array(12, 34)); // WHERE time IN (12, 34)
     * $query->filterByTime(array('min' => 12)); // WHERE time > 12
     * </code>
     *
     * @param     mixed $time The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByTime($time = null, $comparison = null)
    {
        if (is_array($time)) {
            $useMinMax = false;
            if (isset($time['min'])) {
                $this->addUsingAlias(PaymentTableMap::COL_TIME, $time['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($time['max'])) {
                $this->addUsingAlias(PaymentTableMap::COL_TIME, $time['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_TIME, $time, $comparison);
    }

    /**
     * Filter the query on the cardnbr column
     *
     * Example usage:
     * <code>
     * $query->filterByCardnbr('fooValue');   // WHERE cardnbr = 'fooValue'
     * $query->filterByCardnbr('%fooValue%', Criteria::LIKE); // WHERE cardnbr LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cardnbr The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByCardnbr($cardnbr = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardnbr)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_CARDNBR, $cardnbr, $comparison);
    }

    /**
     * Filter the query on the track_ii column
     *
     * Example usage:
     * <code>
     * $query->filterByTrackIi('fooValue');   // WHERE track_ii = 'fooValue'
     * $query->filterByTrackIi('%fooValue%', Criteria::LIKE); // WHERE track_ii LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trackIi The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByTrackIi($trackIi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trackIi)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_TRACK_II, $trackIi, $comparison);
    }

    /**
     * Filter the query on the expdate column
     *
     * Example usage:
     * <code>
     * $query->filterByExpdate('fooValue');   // WHERE expdate = 'fooValue'
     * $query->filterByExpdate('%fooValue%', Criteria::LIKE); // WHERE expdate LIKE '%fooValue%'
     * </code>
     *
     * @param     string $expdate The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByExpdate($expdate = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($expdate)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_EXPDATE, $expdate, $comparison);
    }

    /**
     * Filter the query on the cvv column
     *
     * Example usage:
     * <code>
     * $query->filterByCvv('fooValue');   // WHERE cvv = 'fooValue'
     * $query->filterByCvv('%fooValue%', Criteria::LIKE); // WHERE cvv LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cvv The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByCvv($cvv = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cvv)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_CVV, $cvv, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%', Criteria::LIKE); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount('fooValue');   // WHERE amount = 'fooValue'
     * $query->filterByAmount('%fooValue%', Criteria::LIKE); // WHERE amount LIKE '%fooValue%'
     * </code>
     *
     * @param     string $amount The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByAmount($amount = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($amount)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_AMOUNT, $amount, $comparison);
    }

    /**
     * Filter the query on the card_name column
     *
     * Example usage:
     * <code>
     * $query->filterByCardName('fooValue');   // WHERE card_name = 'fooValue'
     * $query->filterByCardName('%fooValue%', Criteria::LIKE); // WHERE card_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cardName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByCardName($cardName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cardName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_CARD_NAME, $cardName, $comparison);
    }

    /**
     * Filter the query on the street column
     *
     * Example usage:
     * <code>
     * $query->filterByStreet('fooValue');   // WHERE street = 'fooValue'
     * $query->filterByStreet('%fooValue%', Criteria::LIKE); // WHERE street LIKE '%fooValue%'
     * </code>
     *
     * @param     string $street The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByStreet($street = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($street)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_STREET, $street, $comparison);
    }

    /**
     * Filter the query on the zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByZipcode('fooValue');   // WHERE zipcode = 'fooValue'
     * $query->filterByZipcode('%fooValue%', Criteria::LIKE); // WHERE zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByZipcode($zipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_ZIPCODE, $zipcode, $comparison);
    }

    /**
     * Filter the query on the custid column
     *
     * Example usage:
     * <code>
     * $query->filterByCustid('fooValue');   // WHERE custid = 'fooValue'
     * $query->filterByCustid('%fooValue%', Criteria::LIKE); // WHERE custid LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custid The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByCustid($custid = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custid)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_CUSTID, $custid, $comparison);
    }

    /**
     * Filter the query on the custpo column
     *
     * Example usage:
     * <code>
     * $query->filterByCustpo('fooValue');   // WHERE custpo = 'fooValue'
     * $query->filterByCustpo('%fooValue%', Criteria::LIKE); // WHERE custpo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $custpo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByCustpo($custpo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($custpo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_CUSTPO, $custpo, $comparison);
    }

    /**
     * Filter the query on the trans_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTransId('fooValue');   // WHERE trans_id = 'fooValue'
     * $query->filterByTransId('%fooValue%', Criteria::LIKE); // WHERE trans_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $transId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByTransId($transId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($transId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_TRANS_ID, $transId, $comparison);
    }

    /**
     * Filter the query on the authcode column
     *
     * Example usage:
     * <code>
     * $query->filterByAuthcode('fooValue');   // WHERE authcode = 'fooValue'
     * $query->filterByAuthcode('%fooValue%', Criteria::LIKE); // WHERE authcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $authcode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByAuthcode($authcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($authcode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_AUTHCODE, $authcode, $comparison);
    }

    /**
     * Filter the query on the avs_msg column
     *
     * Example usage:
     * <code>
     * $query->filterByAvsMsg('fooValue');   // WHERE avs_msg = 'fooValue'
     * $query->filterByAvsMsg('%fooValue%', Criteria::LIKE); // WHERE avs_msg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $avsMsg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByAvsMsg($avsMsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($avsMsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_AVS_MSG, $avsMsg, $comparison);
    }

    /**
     * Filter the query on the error_code column
     *
     * Example usage:
     * <code>
     * $query->filterByErrorCode('fooValue');   // WHERE error_code = 'fooValue'
     * $query->filterByErrorCode('%fooValue%', Criteria::LIKE); // WHERE error_code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errorCode The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByErrorCode($errorCode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errorCode)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_ERROR_CODE, $errorCode, $comparison);
    }

    /**
     * Filter the query on the error_msg column
     *
     * Example usage:
     * <code>
     * $query->filterByErrorMsg('fooValue');   // WHERE error_msg = 'fooValue'
     * $query->filterByErrorMsg('%fooValue%', Criteria::LIKE); // WHERE error_msg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $errorMsg The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByErrorMsg($errorMsg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($errorMsg)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_ERROR_MSG, $errorMsg, $comparison);
    }

    /**
     * Filter the query on the result column
     *
     * Example usage:
     * <code>
     * $query->filterByResult('fooValue');   // WHERE result = 'fooValue'
     * $query->filterByResult('%fooValue%', Criteria::LIKE); // WHERE result LIKE '%fooValue%'
     * </code>
     *
     * @param     string $result The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByResult($result = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($result)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_RESULT, $result, $comparison);
    }

    /**
     * Filter the query on the track_i column
     *
     * Example usage:
     * <code>
     * $query->filterByTrackI('fooValue');   // WHERE track_i = 'fooValue'
     * $query->filterByTrackI('%fooValue%', Criteria::LIKE); // WHERE track_i LIKE '%fooValue%'
     * </code>
     *
     * @param     string $trackI The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByTrackI($trackI = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($trackI)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_TRACK_I, $trackI, $comparison);
    }

    /**
     * Filter the query on the dummy column
     *
     * Example usage:
     * <code>
     * $query->filterByDummy('fooValue');   // WHERE dummy = 'fooValue'
     * $query->filterByDummy('%fooValue%', Criteria::LIKE); // WHERE dummy LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dummy The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function filterByDummy($dummy = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dummy)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PaymentTableMap::COL_DUMMY, $dummy, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPayment $payment Object to remove from the list of results
     *
     * @return $this|ChildPaymentQuery The current query, for fluid interface
     */
    public function prune($payment = null)
    {
        if ($payment) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PaymentTableMap::COL_ORDERNBR), $payment->getOrdernbr(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PaymentTableMap::COL_RECTYPE), $payment->getRectype(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the authnet table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PaymentTableMap::clearInstancePool();
            PaymentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PaymentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PaymentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            PaymentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            PaymentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PaymentQuery

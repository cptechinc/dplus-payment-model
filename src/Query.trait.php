<?php
	namespace Dplus\Payments\Model;

	use Propel\Runtime\Propel;
	use Propel\Runtime\ActiveQuery\Criteria;

	/**
	 * Functions that Query Databases
	 */
	trait QueryTraits {
		/**
		 * Executes Query for Query Class
		 * @uses  self::$dbName
		 *
		 * @param  string      $sql    SQL to Execute, parameterized if need be
		 * @param  array       $params Parameters and their values
		 * @return PDOStatement        PDO Statement to get results
		 */
		public function execute_query($sql, $params) {
			$database = $this->dbName;
			$con = Propel::getWriteConnection($database);
			$stmt = $con->prepare($sql);

			if (empty($params)){
				$stmt->execute();
			} else {
				$stmt->execute($params);
			}
			return $stmt;
		}

		/**
		 * Adds a LIKE Filter for each column
		 * @param  array         $columns        Array of Table Column Names
		 * @param  string        $q              Search Query to Match
		 * @return ModelCriteria          $this
		 */
		public function search_filter(array $columns, $q) {
			foreach ($columns as $column) {
				$tablecolumn = $this->get_tablecolumn($column);
				$this->condition($column, "$tablecolumn LIKE ?", "%$q%");
			}
			$this->where($columns, Criteria::LOGICAL_OR);
			return $this;
		}

		/**
		 * Returns Table Map Column
		 *
		 * @param  string $prop  Property to lookup column
		 * @return string        column
		 */
		public function get_tablecolumn($prop) {
			$tablemap_column = "COL_".strtoupper($prop);
			$mapclass = get_class($this->tableMap);
			return constant("$mapclass::$tablemap_column");
		}

		/**
		 * Handle Magic Filtering Methods
		 * Supports findByXXX(), findOneByXXX(), requireOneByXXX(), filterByXXX(), orderByXXX(), and groupByXXX() methods,
		 * where XXX is a column phpName or an alias
		 * @param  string $name      Method Name ex. findByOrdernumber
		 * @param  string $arguments array of method arguments
		 * @return mixed
		 */
		public function __call($name, $arguments) {
			// Maybe it's a magic call to one of the methods supporting it, e.g. 'findByTitle'
			static $methods = ['findBy', 'findOneBy', 'requireOneBy', 'filterBy', 'orderBy', 'groupBy'];

			foreach ($methods as $method) {
				if (0 === strpos($name, $method)) {
					$property = strtolower(str_replace($method, '', $name));
					$class_name = $this->getModelName();
					$class_model = new $class_name();

					if (!property_exists($class_model, $property)) {
						$class_column = $class_model::get_aliasproperty($property);
						$name = str_replace(ucfirst($property), ucfirst($class_column), $name);
					}
					break;
				}
			}
			return parent::__call($name, $arguments);
		}
	}

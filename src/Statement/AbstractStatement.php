<?php

namespace kevinoo\QueryParser\Statement;

use Exception;


/**
 *
*/
abstract class AbstractStatement {

    protected string $query;
    protected string $table_name;
    protected array $columns = [];
    protected array $values = [];
    protected array $where_conditions = [];

    /**
     * @throws Exception
     */
    abstract public function parseQuery();


    ///////////////////////////////////////
    // Utils

    public function isSelectQuery(): bool {
        return false;
    }
    public function isInsertQuery(): bool {
        return false;
    }
    public function isUpdateQuery(): bool {
        return false;
    }
    public function isDeleteQuery(): bool {
        return false;
    }

    /**
     *
     * @param $columns_string
     * @return array
     */
    protected function normalizeColumnsString( $columns_string ): array {
        return [];
    }

    /**
     *
     * @param $values_string
     * @return array
     */
    protected function normalizeValuesString( $values_string ): array {
        return [];
    }

    ///////////////////////////////////////
    // Getters and setters

    /**
     * @return string
     */
    public function getTableName(): string {
        return $this->table_name;
    }
    /**
     * @param string $table_name
     * @return self
     */
    public function setTableName( string $table_name ): self {
        $this->table_name = $table_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuery(): string {
        return $this->query;
    }
    /**
     * @param string $query
     * @return self
     */
    public function setQuery( string $query ): self {
        $this->query = $query;
        return $this;
    }

    /**
     * @return array
     */
    public function getColumns(): array {
        return $this->columns;
    }

    /**
     * @param array $columns
     * @return self
     */
    public function setColumns( array $columns ): self {
        $this->columns = $columns;
        return $this;
    }

    /**
     * @return array
     */
    public function getValues(): array {
        return $this->values;
    }
    /**
     * @param array $values
     * @return self
     */
    public function setValues( array $values ): self {
        $this->values = $values;
        return $this;
    }

    /**
     * @return array
     */
    public function getWhereConditions(): array {
        return $this->where_conditions;
    }
    /**
     * @param array $where_conditions
     * @return self
     */
    public function setWhereConditions( array $where_conditions ): self {
        $this->where_conditions = $where_conditions;
        return $this;
    }

}

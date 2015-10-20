<?php

namespace TickTackToe;

class Board
{
    private $fields = [0, 0, 0, 0, 0, 0, 0, 0, 0];

    /**
     * @param null $fields
     */
    public function __construct($fields = null)
    {
        if ( ! is_null($fields)) {

            $this->fields = $fields;
        }
    }

    /**
     * @return array
     */
    public function getFields()
    {
      return $this->fields;
    }

    /**
     * @return array
     */
    public function findUnusedFields()
    {
        $unusedFields = [];

        foreach ($this->getFields() as $index => $field) {

            if ($field === 0) {

                $unusedFields[] = $index;
            }
        }

        return $unusedFields;
    }

    /**
     * @return bool
     */
    public function hasMovesLeft()
    {
        return (count($this->findUnusedFields()) !== 0);
    }

    /**
     * @param int $field
     * @param string $who
     */
    public function makeMove($field, $who)
    {
        $this->fields[$field] = $who;
    }
}
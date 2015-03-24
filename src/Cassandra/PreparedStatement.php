<?php

namespace Cassandra;

final class PreparedStatement implements Statement
{
    private $resource;

    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function resource(array $arguments = null)
    {
        $resource = cassandra_prepared_bind($this->resource);

        if ((isset($arguments))) {
            foreach ($arguments as $name => $argument) {
                cassandra_statement_bind($resource, $name, $argument);
            }
        }

        return $resource;
    }
}

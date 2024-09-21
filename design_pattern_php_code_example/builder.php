<?php

interface Database_Connection_Builder
{
    public function servername(string $server_name): MySQL_Database_Connection_Builder;

    public function username(string $username): MySQL_Database_Connection_Builder;

    public function password(string $password): MySQL_Database_Connection_Builder;

    public function database_name(string $database_name): MySQL_Database_Connection_Builder;

    public function port(string $port): MySQL_Database_Connection_Builder;

    public function socket(string $socket): MySQL_Database_Connection_Builder;
}

class MySQL_MySQLi_Object_Oriented_Builder implements Database_Connection_Builder
{
    protected $connection;

    protected function reset(): void
    {
        $this->connection = new \stdClass();
    }

    public function servername(string $servername): MySQL_Database_Connection_Builder
    {
        $this->reset();

        $this->connection->servername = $servername;   
    }

    public function username(string $username): MySQL_Database_Connection_Builder
    {
        $this->connection->username = $username;
    }

    public function password(string $password): MySQL_Database_Connection_Builder
    {
        $this->connection->password = $password;
    }

    public function connect() {
        $this->connection->connect = new mysqli($this->connection->servername, $this->connection->username, $this->connection->password);

        if ($this->connection->connect->connect_error) {
            die("Falha ao se conectar: " . $this->connection->connect->connect_error);
        }

        return $this->connection->connect;
    }
}

//TODO FAZER MYSQLI PROCEDURAL

class MySQL_MySQLi_Procedural implements Database_Connection_Builder
{
    protected $connection;
}

//TODO: FAZER MYSQLI PDO
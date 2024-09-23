<?php

/**
 * A interface Database_Connection_Builder define os métodos obrigatórios para construir a conexão com o banco
 * de dados.
 */
interface Database_Connection_Builder
{
    public function servername(string $servername): Database_Connection_Builder;

    public function username(string $username): Database_Connection_Builder;

    public function password(string $password): Database_Connection_Builder;

    public function database(string $database): Database_Connection_Builder;

    public function port(string $port): Database_Connection_Builder;

    public function connect();
}

/**
 * As classes MySQL_MySQLI_OOP, MySQL_MySQLI_Procedural e MySQL_PDO irão seguir a interface e providenciar
 * o código necessário para construir a conexão com o banco de dados.
 */
class MySQL_MySQLI_OOP implements Database_Connection_Builder
{
    protected $connection;

    protected function reset(): void
    {
        $this->connection = new \stdClass();
    }

    public function servername(string $servername): Database_Connection_Builder
    {
        $this->reset();

        $this->connection->servername = $servername;

        return $this;
    }

    public function username(string $username): Database_Connection_Builder
    {
        $this->connection->username = $username;

        return $this;
    }

    public function password(string $password): Database_Connection_Builder
    {
        $this->connection->password = $password;

        return $this;
    }

    public function database(string $database): Database_Connection_Builder
    {
        $this->connection->database = $database;

        return $this;
    }

    public function port(string $port): Database_Connection_Builder
    {
        $this->connection->port = $port;

        return $this;
    }

    public function socket(string $socket): Database_Connection_Builder
    {
        $this->connection->socket = $socket;

        return $this;
    }

    public function connect()
    {
        try {
            $this->connection->connect = new mysqli(
                $this->connection->servername ?? null,
                $this->connection->username ?? null,
                $this->connection->password ?? null,
                $this->connection->database ?? null,
                $this->connection->port ?? null,
                $this->connection->socket ?? null
            );

            if ($this->connection->connect->connect_error) {
                die("Falha ao se conectar: " . $this->connection->connect->connect_error . '<br><br>');
            }

            echo "Conectado com sucesso via MySQL orientado a objetos!<br><br>";

            return $this->connection->connect;
        } catch (Exception $e) {
            echo "Erro ao se conectar: " . $e->getMessage() . '<br><br>';
        }
    }
}

class MySQL_MySQLI_Procedural implements Database_Connection_Builder
{
    protected $connection;

    protected function reset(): void
    {
        $this->connection = new \stdClass();
    }

    public function servername(string $servername): Database_Connection_Builder
    {
        $this->reset();

        $this->connection->servername = $servername;

        return $this;
    }

    public function username(string $username): Database_Connection_Builder
    {
        $this->connection->username = $username;

        return $this;
    }

    public function password(string $password): Database_Connection_Builder
    {
        $this->connection->password = $password;

        return $this;
    }

    public function database(string $database): Database_Connection_Builder
    {
        $this->connection->database = $database;

        return $this;
    }

    public function port(string $port): Database_Connection_Builder
    {
        $this->connection->port = $port;

        return $this;
    }

    public function socket(string $socket): Database_Connection_Builder
    {
        $this->connection->socket = $socket;

        return $this;
    }

    public function connect()
    {
        try {
            $this->connection->connect = mysqli_connect(
                $this->connection->servername ?? null,
                $this->connection->username ?? null,
                $this->connection->password ?? null,
                $this->connection->database ?? null,
                $this->connection->port ?? null,
                $this->connection->socket ?? null
            );

            if (!$this->connection->connect) {
                die("Falha ao se conectar: " . $this->connection->connect->connect_error . '<br><br>');
            }

            echo "Conectado com sucesso via MySQL procedural!<br><br>";

            return $this->connection->connect;
        } catch (Exception $e) {
            echo "Falha ao se conectar: " . $e->getMessage() . '<br><br>';
        }
    }
}

/**
 * Uma classe construtora pode ter métodos de construção adicionais além dos especificados pela interface. Nessa
 * conexão, iremos adicionar mais um método para construir um options para a conexão com o PDO do MySQL.
 */
class MySQL_PDO implements Database_Connection_Builder
{
    protected $connection;

    protected function reset(): void
    {
        $this->connection = new \stdClass();

        $this->connection->base = "mysql:";
    }

    public function servername(string $servername): Database_Connection_Builder
    {
        $this->reset();

        $this->connection->base .= "host={$servername};";

        return $this;
    }

    public function username(string $username): Database_Connection_Builder
    {
        $this->connection->username = $username;

        return $this;
    }

    public function password(string $password): Database_Connection_Builder
    {
        $this->connection->password = $password;

        return $this;
    }

    public function database(string $database): Database_Connection_Builder
    {
        $this->connection->base .= "dbname={$database};";

        return $this;
    }

    public function port(string $port): Database_Connection_Builder
    {
        $this->connection->base .= "port={$port};";

        return $this;
    }

    public function options(array $options)
    {
        $this->connection->options =  $options;

        return $this;
    }

    public function connect()
    {
        try {
            $this->connection->connect = new PDO($this->connection->base, $this->connection->username, $this->connection->password, $this->connection->options ?? []);

            if (!$this->connection->connect) {
                die("Falha ao se conectar: " . $this->connection->connect->connect_error . '<br><br>');
            }

            echo "Conectado com sucesso via MySQL PDO!<br><br>";

            return $this->connection->connect;
        } catch (Exception $e) {
            echo "Falha ao se conectar: " . $e->getMessage() . '<br><br>';
        }
    }
}

/**
 * Um diretor é responsável por definir as etapas e ordem necessária para construir um objeto. Neste caso, iremos
 * criar um diretor para definir a ordem de construção de uma conexão com o banco de dados utilizando porta e socket 
 * como parâmetros adicionais. Um Diretor é opcional, pois as etapas podem ser definidas dentro do código do cliente.
 */
class MySQL_Database_Connector_Director
{
    private $connection;

    public function set_connection(Database_Connection_Builder $connection): void
    {
        $this->connection = $connection;
    }

    public function build_complete_connection($servername, $username, $password, $database, $port, $options)
    {
        $this->connection
            ->servername($servername)
            ->username($username)
            ->password($password)
            ->database($database)
            ->port($port)
            ->options($options);

        return $this->connection->connect();
    }
}

$MySQL_MySQLI_OOP = new MySQL_MySQLI_OOP();
$connection1 = $MySQL_MySQLI_OOP
    ->servername('localhost')
    ->port(10150)
    ->database('local')
    ->username('root')
    ->password('root')
    ->connect();

$MySQL_MySQLI_Procedural = new MySQL_MySQLI_Procedural();
$connection2 = $MySQL_MySQLI_Procedural
    ->servername('localhost')
    ->database('local')
    ->password('root')
    ->username('root')
    ->connect();

$MySQL_Database_Connector_Director = new MySQL_Database_Connector_Director();
$MySQL_PDO = new MySQL_PDO();
$MySQL_Database_Connector_Director->set_connection($MySQL_PDO);
$connection3 = $MySQL_Database_Connector_Director->build_complete_connection(
    'localhost',
    'root',
    'root',
    'local',
    10150,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);

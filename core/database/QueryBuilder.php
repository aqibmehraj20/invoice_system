<?php



class QueryBuilder

{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS);
    }



    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            die('Whoops, Something went wrong.');
        }
    }

    public function selectid($id, $table)
    {
        $selectquery = $this->pdo->prepare("select * from {$table} where id=$id");
        $selectquery->execute();
        return $selectquery->fetchAll(PDO::FETCH_CLASS);
    }

    public function update($table, $parameters, $id)
    {
        $string  = "UPDATE " . $table . "  SET  ";
        $cunt = count($parameters);
        $i = 1;
        foreach ($parameters as $del => $vel) {
            $string .= "" . $del . "='" . $vel . "'";
            if ($i < $cunt) {
                $string .= ", ";
            }

            $i++;
        }
        $string .= " WHERE id=$id" ;

        try {
            $statement = $this->pdo->prepare($string);

            $statement->execute($parameters);
        } catch (Exception $e) {
        }
    }

    public function delete($table, $id){
        $delete = "DELETE FROM `$table` WHERE id=$id";
    
        try {
            $statement = $this->pdo->prepare($delete);

            $statement->execute();
        } catch (Exception $e) {
        }

    }
}

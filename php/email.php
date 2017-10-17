<?php
class Table {
    /**
     * Gets column definition.
     *
     * @param string $table table name
     * @param string $column column name
     * @return null|string the column definition
     * @throws Exception in case when table does not contain column
     */
    public function getColumnDefinition($table, $column)
    {
        $quotedTable = $table;

        $row = $this->db->createCommand('SHOW CREATE TABLE ' . $quotedTable)->queryOne();
        if ($row === false) {
            throw new Exception("Unable to find column '$column' in table '$table'.");
        }
        if (isset($row['Create Table'])) {
            $sql = $row['Create Table'];
        } else {
            $row = array_values($row);
            $sql = $row[1];
        }
        //从show create table 中的第二条语句匹配列名称和列定义
        if (preg_match_all('/^\s*`(.*?)`\s+(.*?),?$/m', $sql, $matches)) {
            foreach ($matches[1] as $i => $c) {
                if ($c === $column) {
                    return $matches[2][$i];
                }
            }
        }
        return null;
    }
}









private function getColumnDefinition($table, $column)
{
    $quotedTable = $this->db->quoteTableName($table);
    $row = $this->db->createCommand('SHOW CREATE TABLE ' . $quotedTable)->queryOne();
    if ($row === false) {
        throw new Exception("Unable to find column '$column' in table '$table'.");
    }
    if (isset($row['Create Table'])) {
        $sql = $row['Create Table'];
    } else {
        $row = array_values($row);
        $sql = $row[1];
    }
    if (preg_match_all('/^\s*`(.*?)`\s+(.*?),?$/m', $sql, $matches)) {
        foreach ($matches[1] as $i => $c) {
            if ($c === $column) {
                return $matches[2][$i];
            }
        }
    }
    return null;
}


?>

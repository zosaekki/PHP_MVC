<?php
    namespace application\models;
    use PDO;

    class BoardModel extends Model {
        public function selBoardList() {
            $sql = "SELECT i_board, title, created_at
                      FROM t_board
                    ORDER BY i_board DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
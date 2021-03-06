<?php
    namespace application\models;
    use PDO;

    class BoardModel extends Model {
        public function insBoard(&$param) {
            $sql = "INSERT INTO t_board
                    (title, ctnt, i_user)
                    VALUES
                    (:title, :ctnt, :i_user)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':title', $param["title"]);
            $stmt->bindValue(':ctnt', $param["ctnt"]);
            $stmt->bindValue(':i_user', $param["i_user"]);
            $stmt->execute();
        }
        
        public function selBoardList() {
            $sql = "SELECT A.i_board, A.title, A.created_at, B.nm
                    FROM t_board A
                    INNER JOIN t_user B
                    ON A.i_user = B.i_user
                    ORDER BY i_board DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function selBoard(&$param) {
            $sql = "SELECT A.i_user, A.i_board, A.title, A.ctnt, A.created_at, A.updated_at, B.nm
                    FROM t_board A
                    INNER JOIN t_user B
                    ON A.i_user = B.i_user
                    WHERE A.i_board = :i_board";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':i_board', $param["i_board"]);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        public function updBoard(&$param) {
            $sql = "UPDATE t_board
                    SET title = :title,
                        ctnt = :ctnt,
                        updated_at = now()
                    WHERE i_board = :i_board
                    AND i_user = :i_user";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':i_user', $param["i_user"]);
            $stmt->bindValue(':i_board', $param["i_board"]);
            $stmt->bindValue(':title', $param["title"]);
            $stmt->bindValue(':ctnt', $param["ctnt"]);
            $stmt->execute();
        }

        public function delBoard(&$param) {
            $sql = "DELETE FROM t_board 
                    WHERE i_board = :i_board
                    AND i_user = :i_user";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':i_board', $param["i_board"]);
            $stmt->bindValue(':i_user', $param["i_user"]);
            $stmt->execute();
        }

        public function selReply(&$param) {
            $sql = "SELECT * 
                    FROM reply
                    WHERE i_board = :i_board";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':i_board', $param["i_board"]);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function insReply(&$param) {
            $sql = "INSERT INTO reply
                    (i_board, nm, content)
                    VALUES
                    (:i_board, :nm, :content)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':i_board', $param["i_board"]);
            $stmt->bindValue(':nm', $param["nm"]);
            $stmt->bindValue(':content', $param["content"]);
            $stmt->execute();
        }

        public function delReply(&$param) {
            $sql = "DELETE FROM reply
                    WHERE i_board = :i_board
                    AND reply_num = :reply_num";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':i_board', $param["i_board"]);
            $stmt->bindValue(':reply_num', $param["reply_num"]);
            $stmt->execute();
        }
    }
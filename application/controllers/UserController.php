<?php
    namespace application\controllers;
    use application\models\UserModel;

    class UserController extends Controller {
        public function join() {
            $this->addAttribute(_TITLE, "회원가입");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("user/join.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            return "template/t1.php";
        }

        public function joinProc() {
            $param = [
                "uid" => $_POST["uid"],
                "upw" => $_POST["upw"],
                "nm" => $_POST["nm"],
                "gender" => $_POST["gender"]
            ];

            // pw 암호화
            $param["upw"] = password_hash($param["upw"], PASSWORD_BCRYPT);
            $model = new UserModel();
            $model->insUser($param);
            return "redirect:join";
        }

        public function login() {
            $this->addAttribute(_TITLE, "로그인");
            $this->addAttribute(_HEADER, $this->getView("template/header.php"));
            $this->addAttribute(_MAIN, $this->getView("user/login.php"));
            $this->addAttribute(_FOOTER, $this->getView("template/footer.php"));
            return "template/t1.php";
        }

        public function loginProc() {
            $param = [
                "uid" => $_POST["uid"],
                "upw" => $_POST["upw"],
            ];
            $model = new UserModel();
            $dbUser = $model->selUser($param);

            // print_r($dbUser) . "<br>";

            if($dbUser === false) { // 아이디 없음
                print "<script>alert('아이디 없음')</script>";
                return $this->login();
            } else if(!password_verify($param["upw"], $dbUser->upw)) { // 비밀번호 다름
                print "<script>alert('비밀번호 다름')</script>";
                return $this->login();
            }
            flash(_LOGINUSER, $dbUser);

            return "redirect:/board/list";
        }

        public function logout() {
            flash(_LOGINUSER);
            return "redirect:/board/list";

        }
    }
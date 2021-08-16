<?php

    class techworld{

        private $conn;
        public function __construct(){       
            #database host, database user, database pass, database name
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'techworld';

            $this->conn= mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

            if (!$this->conn){
                die("Database Connection Error!!");
            }
        }


        public function add_information($data){
            $std_name = $data['std_name'];
            $std_roll = $data['std_roll'];
            $std_img = $_FILES['std_img']['name'];
            $tmp_name = $_FILES['std_img']['tmp_name'];

            $query = "INSERT INTO students(std_name,std_roll,std_img) VALUE ('$std_name', $std_roll, '$std_img')";

            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($tmp_name, 'upload/'.$std_img);
                return "Information Added successfully";
            }
        }


        public function display_data(){
            $query = "SELECT * FROM students";
            if(mysqli_query($this->conn, $query)){
                $returndata = mysqli_query($this->conn, $query);
                return $returndata;
            }
        }


        public function display_data_by_id($id){
            $query = "SELECT * FROM students WHERE id=$id";
            if(mysqli_query($this->conn, $query)){
                $returndata = mysqli_query($this->conn, $query);
                $studentdata = mysqli_fetch_assoc($returndata);
                return $studentdata;
            }
        }


        public function update_information($data){
            $std_name= $data['u_std_name'];
            $std_roll= $data['u_std_roll'];
            $std_id= $data['std_id'];
            $std_img= $_FILES['u_std_img']['name'];
            $tmp_name= $_FILES['u_std_img']['tmp_name'];

            $query ="UPDATE students SET std_name='$std_name', std_roll=$std_roll,std_img='$std_img' WHERE id=$std_id";
            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($tmp_name, 'upload/'.$std_img);
                return "Information Updated Successfully";
            }
        }


        public function delete_data_by_id($id){
            $catch_img = "SELECT * FROM students WHERE id = $id";
            $delete_std_info = mysqli_query($this->conn, $catch_img);
            $std_infoDle = mysqli_fetch_assoc($delete_std_info);
            $delete_img = $std_infoDle['std_img']; 
            $query = "DELETE FROM students WHERE id=$id";
            if(mysqli_query($this->conn, $query)){
                return "Deleted Successfully";
                unlink('upload/'.$delete_img);

                
            }
        }




    }

    $obj = new techworld();

    


?>
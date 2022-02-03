<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function getUser(string $email) : ?User {
        $stmt = $this->database->connect()->prepare('
            SELECT  * FROM public.users JOIN users_details ud ON ud.id = users.id_users_details WHERE email = :email
        ');
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user === false){
            return null;
        }
        return new User(
            $user["email"],
            $user["password"],
            $user["name"],
            $user["surname"],
            $user["nickname"],
            $user["birthday"],
            $user["id"],
        );
    }
    public function getAllEmails(){
        $stmt = $this->database->connect()->prepare('
            SELECT email FROM public.users
        ');
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user === false){
            return null;
        }
        return $user;
    }
    public function register(User $user){

        $statement = $this->database->connect()->prepare('
            INSERT INTO public.users join users_details ud on ud.id = users.id_users_details 
            VALUES (email,password,name,surname,nickname,birthday)
        ');
        $statement->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getName(),
            $user->getSurname(),
            $user->getNickname(),
            $user->getBirthday(),
        ]);
    }

}
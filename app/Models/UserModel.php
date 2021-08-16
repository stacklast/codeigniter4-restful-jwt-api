<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "user";
    
    protected $allowedFields = [
        'name', 'email', 'password'
    ];

    protected $updatedField = 'updated_at';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        return $this->getUpdatedDataWithHashedPasword($data);
    }

    protected function beforeUpdate(array $data)
    {
        return $this->getUpdatedDataWithHashedPasword($data);
    }

    private function getUpdatedDataWithHashedPasword(array $data): array
    {
        if ( isset($data['data']['password']) )
        {
            $plainTextPassword = $data['data']['password'];
            $data['data']['password'] = password_hash( $plainTextPassword, PASSWORD_BCRYPT );
        }

        return $data;
    }

    public function findUserByEmailAddress(string $emailAddress)
    {
        $user = $this->asArray()->where(['email'=>$emailAddress])->first();

        if (!$user)
        {
            throw new \Exception('User does not exist for expecified email address');
        }

        return $user;
    }

}


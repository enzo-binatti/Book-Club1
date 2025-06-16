<?php
class User extends BaseModel {
    public function register($data) {
        $requiredFields = ['nome', 'email', 'senha'];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                throw new Exception("Campo obrigatório não encontrado: $field");
            }
        }
        
        // Verifica se o email já existe
        $stmt = $this->query("SELECT id FROM users WHERE email = ?", [$data['email']]);
        if ($stmt->fetch()) {
            throw new Exception("Este email já está cadastrado");
        }
        
        // Hash da senha
        $data['senha'] = password_hash($data['senha'], PASSWORD_DEFAULT);
        
        return $this->insert('users', $data);
    }
    
    public function login($email, $password) {
        $stmt = $this->query("SELECT * FROM users WHERE email = ?", [$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['senha'])) {
            return $user;
        }
        
        return false;
    }
    
    public function getUserById($id) {
        $stmt = $this->query("SELECT * FROM users WHERE id = ?", [$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function updateUser($id, $data) {
        $this->update('users', $data, "id = ?", [$id]);
    }
    
    public function resetPassword($email, $newPassword) {
        $stmt = $this->query("SELECT id FROM users WHERE email = ?", [$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            throw new Exception("Usuário não encontrado");
        }
        
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $this->update('users', ['senha' => $hashedPassword], "id = ?", [$user['id']]);
    }
    
    public function verifyEmail($email) {
        $stmt = $this->query("SELECT id FROM users WHERE email = ?", [$email]);
        return $stmt->fetch() !== false;
    }
}

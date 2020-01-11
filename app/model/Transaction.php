<?php


class Transaction
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addTransaction($data)
    {
        // Prepare Query
        $this->db->query('INSERT INTO transactions (id, user_id, user_name, user_lastname, product, amount, currency,status) VALUES(:id, :user_id, :user_name,:user_lastname, :product, :amount, :currency, :status )');
        // Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':user_name', $data['user_name']);
        $this->db->bind(':user_lastname', $data['user_lastname']);
        $this->db->bind(':product', $data['product']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':currency', $data['currency']);
        $this->db->bind(':status', $data['status']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getTransactions() {
        $this->db->query('SELECT * FROM transactions ORDER BY created_at DESC');
        $results = $this->db->resultset();
        return $results;
      }

      public function getTransactionById($id){

        $this->db->query("SELECT * FROM transactions WHERE user_id =:user_id");
        $this->db->bind(':user_id', $id);
        
        $results = $this->db->resultset();
        return $results;
    }
}
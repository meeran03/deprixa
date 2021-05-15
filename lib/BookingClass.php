<?php

include 'Dbpayment.php';

class BookingClass {

    private $db;

    public function __construct() {
        $conn = new Db();
        $this->db = $conn->db();
    }

    public function get_listsms() {
        $query = $this->db->query("SELECT * FROM sms_templates WHERE id= 16");
        return $query;
    }

    public function pay($item_id, $tid, $amount, $state, $track) {
        $date = new DateTime();
        if ($this->check_txt_id($tid) == 0) {
            $tdate = $this->member_since = $date->format('Y/m/d H:i:s');
            $this->db->query("INSERT INTO `transactions`(`transaction_id`, `transaction_amount`, `transaction_state`, `transaction_track`, `transaction_date`,`item_id`) VALUES ('$tid','$amount','$state','$track','$tdate','$item_id')");
            return TRUE;
        } else {
            //payment already done ,if payment has been deducted you will get refund 
        }
    }

    public function check_txt_id($tid) {
        $query = $this->db->query("SELECT COUNT(id) as total FROM transactions WHERE transaction_id = '$tid'");

        if ($query->num_rows === 1) {
            while ($total = $query->fetch_assoc()) {
                return $total['total'];
            }
        }
    }

    public function update_item($item_id) {
        $this->db->query("UPDATE add_courier SET payment_status = '1' WHERE id = '$item_id'");
    }

}

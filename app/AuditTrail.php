<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    protected $fillables = [ 'user_id', 'detail', 'subscriber_id'];
    public $timestamps = false;

    protected $detail = [];
    
    public function user() {
        return $this->belongsTo('App\Models\SubscriberUser', 'user_id');
    }

    /**
     * Create detail text detail for Audit Trails
     *
     * @param string $type rate|user|permission|balance|setting
     * @param string $action create|modify|delete
     * @param string $field column effected or preposition
     * @param mix $value value of the field
     * @return string
     */
    public function setDetail($type, $action, $value1, $field = null, $value2 = null) {
        $detail = '';
        if($action == 'create') {
            $action = 'Create';
            if($type == 'permission') {
                $detail = 'Assign <b>' .  strtoupper($type) . ' </b>: '. $field . ' ' . $value1 . '. ';
            } else {
                $detail = 'Create <b>' . strtoupper($type) . ' </b>: ' . $value1 . '. '; 
            }
        } elseif($action == 'modify') {
            $detail = 'Modify <b>' . strtoupper($type) . '</b>: ' . $field .' from <b>' . $value1 . '</b> to <b>' . $value2 . '</b>. '; 
        } elseif($action == 'destroy') {
            $detail = 'Delete <b>' . strtoupper($type) . ' </b> : ' . $value1 . '. ';
        }

        $this->detail[] = $detail;
    }

    public function getDetail() {
        return join('<br>', $this->detail);
    }

}

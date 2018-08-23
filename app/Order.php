<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    protected $fillable = [
    	'code', 'full_name', 'address', 'city_id', 'province_id', 'postal_code',
    	'phone', 'delivery_service', 'shipping_cost', 'subtotal', 'user_id', 'order_status_id'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'code';
    }

    public function getCode()
    {
        return '# ' . strtoupper($this->code);
    }

    public function tanggalWaktu()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y H:i');
    }

    public function subtotalStringFormatted()
    {
        return 'Rp '.number_format($this->subtotal, 0, '', '.');
    }

    public function shippingCostStringFormatted()
    {
        return 'Rp '.number_format($this->shipping_cost, 0, '', '.');
    }

    public function total()
    {
        return $this->subtotal + $this->shipping_cost;
    }

    public function totalStringFormatted()
    {
        return 'Rp '.number_format($this->total(), 0, '', '.');
    }

    public function getBadge()
    {
        if ($this->order_status_id == 1) {
            return 'badge badge-light';
        } elseif ($this->order_status_id == 2) {
            return 'badge badge-dark';
        } elseif ($this->order_status_id == 3) {
            return 'badge badge-info';
        } elseif ($this->order_status_id == 4) {
            return 'badge badge-danger';
        } elseif ($this->order_status_id == 5) {
            return 'badge badge-primary';
        } elseif ($this->order_status_id == 6) {
            return 'badge badge-success';
        }
    }

    public function hasPaymentConfirmation()
    {
        return $this->payment_confirmation()->count() > 0;
    }

    //relation
    public function city()
    {
    	return $this->belongsTo('App\City');
    }

    public function province()
    {
    	return $this->belongsTo('App\Province');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function order_status()
    {
    	return $this->belongsTo('App\OrderStatus');
    }

    public function details()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function payment_confirmation()
    {
        return $this->hasOne('App\PaymentConfirmation');
    }
}

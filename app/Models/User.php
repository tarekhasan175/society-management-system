<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Module\Garments\Models\Merchandising\SampleDispatch\SampleDispatch;
use Illuminate\Notifications\Notifiable;
use Module\Nagarik\Models\NagorikUseDetails;
use Module\Nagarik\Models\NagorikUserInstantAddressDetails;
use Module\Nagarik\Models\NagorikUserPermanentAddressDetails;
use Module\Permission\Models\PermissionUser;
use App\Models\Designation;
use Module\Garments\Models\Merchandising\Setup\Buyer;
use App\Models\Department;
use Module\Permission\Models\Permission;
use Module\HRM\Models\Employee\Employee;
use Module\Garments\Models\Inventory\ArpGoodReceive;
use Module\Garments\Models\Merchandising\Order\OrderType;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id', 'name', 'email', 'phone', 'password', 'employee_id', 'phone_otp', 'status', 'employee_full_id', 'device_token', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1)->where('id', '>', 1);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // akash methods for companies permission
    public function companies()
    {
        // return $this->hasMany(Company::class, 'id', 'company_id');
        return $this->belongsToMany(Company::class);
    }

    // akash methods for order type permission
    public function order_types()
    {
        return $this->belongsToMany(OrderType::class)->orderBy('name');
    }

    // akash methods for buyers permission
    public function buyers()
    {
        return $this->belongsToMany(Buyer::class);
    }

    // akash methods for departments permission
    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    // akash methods for designations permission
    public function designations()
    {
        return $this->belongsToMany(Designation::class);
    }

    // akash methods for permission
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->where('status', 1);
    }

    // end permission methods

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


    public function sample_dispatches()
    {
        return $this->hasMany(SampleDispatch::class, 'created_by');
    }

    public function arp_good_receives()
    {
        return $this->hasMany(ArpGoodReceive::class, 'create_by');
    }

    public static function hasAccess($slug)
    {
        $user_id = auth()->id();
        if ($user_id != 1) {
            $permission = Permission::where('slug', $slug)->first();
            if ($permission) {
                $permission_user = PermissionUser::where('permission_id', $permission->id)->where('user_id', $user_id)->first();
                if (!$permission_user) {
                    return false;
                }
                return true;
            } else {
                return false;
            }
        }
        return true;
    }


    public function isLoggedIn()
    {
        return Cache::has('logged-in-users-' . $this->id) ? '<span><i class="fa fa-circle green"></i></span>' : '';
    }

//    nagaroik
    public function details()
    {
        return $this->belongsTo(NagorikUseDetails::class , 'id' , 'user_id');
    }
    public function instant()
    {
        return $this->belongsTo(NagorikUserInstantAddressDetails::class , 'id' , 'user_id');
    }
    public function permanent()
    {
        return $this->belongsTo(NagorikUserPermanentAddressDetails::class , 'id' , 'user_id');
    }
}

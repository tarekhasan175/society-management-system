<?php

namespace Module\Nagarik\Models;

use App\Models\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OldTradeLicenseModel extends \App\Model
{
    use HasFactory;
    protected $table = "nagorik_trade_license_applications";

    protected $with = ['financialYear', 'businessCategory', 'region', 'ward', 'sector', 'block', 'road', 'atactmentName', 'user', 'payment'];

    public function financialYear()
    {
        return $this->belongsTo(FinancialYear::class, 'financial_year_id');
    }

    public function businessCategory()
    {
        return $this->belongsTo(NagorikBusinessType::class, 'business_category_id');
    }

    public function region()
    {
        return $this->belongsTo(CityAreaAdd::class, 'region_id');
    }

    public function ward()
    {
        return $this->belongsTo(NagorikWordAdd::class, 'ward_id');
    }

    public function sector()
    {
        return $this->belongsTo(NagorikSector::class, 'sector_id');
    }

    public function block()
    {
        return $this->belongsTo(NagorikBlock::class, 'block_id');
    }

    public function road()
    {
        return $this->belongsTo(NagorikRoadAdd::class, 'road_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function atactmentName()
    {
        return $this->belongsTo(NagorikAdditionalDescript::class, 'attachment_name');
    }

    public function payment()
    {
        return $this->morphMany(PaymentModel::class, 'source', 'source_type', 'source_id');
    }
}

<?php

namespace Module\Chamber\Models;

use App\Models\Model;
use Module\Chamber\Models\MemberCategory;

class Membership extends \App\Model
{
    protected $fillable = [
        'memberID',
        'formNo',
        'approvalDate',
        'memberCategoryID',
        'districtID',
        'upazillaID',
        'companyName',
        'cellNo',
        'telephoneNo',
        'email',
        'webSite',
        'natureofBusinessID',
        'itemOrProduct',
        'tradeLicenseNo',
        'tradeLicenseImage',
        'tinCertificateNo',
        'tinCertificateImage',
        'locationOfBusiness',
        'headOffice',
        'salesOffice',
        'dateofEstablishment',
        'firmStatus',
        'isOwnMember',
        'ownerName',
        'ownerDesignation',
        'ownerNationalIDNo',
        'ownerNationalIDImage',
        'ownerContactNo',
        'ownerImage',
        'isRepMember',
        'representativeName',
        'representativeDesignation',
        'representativeNationalIDNo',
        'representativeNationalIDImage',
        'representativeContactNo',
        'representativeImage',
        'proposedMemberName1',
        'proposedCompanyName1',
        'proposedAddress1',
        'proposedMembershipNo1',
        'proposedMemberName2',
        'proposedCompanyName2',
        'proposedAddress2',
        'proposedMembershipNo2',
        'addedBy',
        'addedDate',
        'lastEntryBy',
        'lastEntryDate',
        'ownerFatherName',
        'representativeFatherName',
        'session',
    ];


    public function memberCategory()
    {
        return $this->belongsTo(MemberCategory::class, 'memberCategoryID');
    }


    public function district()
    {
        return $this->belongsTo(District::class,'districtID');
    }

    public function upazilla()
    {
        return $this->belongsTo(Upazilla::class,'upazillaID');
    }

    public function firmStatus()
    {
        return $this->belongsTo(FirmStatus::class,'firmStatus');
    }
    

    public function businessNature()
    {
        return $this->belongsTo(BusinessNature::class,'natureofBusinessID');
    }

    public function session()
    {
        return $this->belongsTo(AccountYear::class,'sessionName');
    }
    

}
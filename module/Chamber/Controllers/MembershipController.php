<?php

namespace Module\Chamber\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Module\Chamber\Models\AccountYear;
use Module\Chamber\Models\BusinessNature;
use Module\Chamber\Models\District;
use Module\Chamber\Models\FirmStatus;
use Module\Chamber\Models\MemberCategory;
use Module\Chamber\Models\Membership;
use Module\Chamber\Models\Upazilla;

class MembershipController extends Controller
{
    private $service;
    /*
     |--------------------------------------------------------------------------
     | CONSTRUCTOR
     |--------------------------------------------------------------------------
    */
    public function __construct()
    {

    }

    public function memberlist()
    {
        $members = Membership::with('memberCategory')->latest()->get();
        return view('membership.memberlist', compact('members'));
    }

    //  create start ===========================================================================
    public function member_create_1()
    {
        $memberCategories = MemberCategory::all();
        $districts = District::all();
        $upazillas = Upazilla::all();
        $firmStatus = FirmStatus::all();
        $businessNature = BusinessNature::all();
        return view('membership.member_create_1', compact('memberCategories', 'districts', 'upazillas', 'firmStatus', 'businessNature'));
    }
    public function member_create_2($id)
    {
        $memberCategories = MemberCategory::all();
        $latestMember = Membership::orderBy('id', 'desc')->first();
        $latestMemberId = $latestMember ? $latestMember->id : null;

        return view('membership.member_create_2', compact('memberCategories', 'latestMemberId'));
    }



    public function member_create_3($id)
    {
        $latestMember = Membership::orderBy('id', 'desc')->first();
        $latestMemberId = $latestMember ? $latestMember->id : null;
        $sessionName = AccountYear::all();

        return view('membership.member_create_3', compact('latestMemberId','sessionName'));
    }

    public function member_create_4($id)
    {
        $latestMember = Membership::orderBy('id', 'desc')->first();
        $latestMemberId = $latestMember ? $latestMember->id : null;

        return view('membership.member_create_4', compact('latestMemberId'));
    }

    public function member_store_1(Request $request)
    {
        // Validate the incoming request data
        $request->validate([

            // business info 
            'memberID' => 'nullable|string',
            'formNo' => 'nullable|string',
            'approvalDate' => 'nullable',
            'memberCategoryID' => 'nullable',
            'companyName' => 'nullable|string',
            'firmStatus' => 'nullable|integer',
            'locationOfBusiness' => 'nullable|string',
            'headOffice' => 'nullable|string',
            'salesOffice' => 'nullable|string',
            'natureofBusinessID' => 'nullable|integer',
            'itemOrProduct' => 'nullable|string',
            'cellNo' => 'nullable|string',
            'telephoneNo' => 'nullable|string',
            'email' => 'nullable|string|email',
            'webSite' => 'nullable|string',
            'dateofEstablishment' => 'nullable|date',
            'districtID' => 'nullable|integer',
            'upazillaID' => 'nullable|integer',
            'tradeLicenseNo' => 'nullable|string',
            'tinCertificateNo' => 'nullable|string',


            // representatiove information 
            'isOwnMember' => 'nullable|boolean',
            'ownerName' => 'nullable|string',
            'ownerDesignation' => 'nullable|string',
            'ownerNationalIDNo' => 'nullable|string',
            'ownerContactNo' => 'nullable|string',
            'ownerFatherName' => 'nullable|string',

            'isRepMember' => 'nullable|boolean',
            'representativeName' => 'nullable|string',
            'representativeDesignation' => 'nullable|string',
            'representativeNationalIDNo' => 'nullable|string',
            'representativeContactNo' => 'nullable|string',
            'representativeFatherName' => 'nullable|string',



            'proposedMemberName1' => 'nullable|string',
            'proposedCompanyName1' => 'nullable|string',
            'proposedAddress1' => 'nullable|string',
            'proposedMembershipNo1' => 'nullable|string',
            'proposedMemberName2' => 'nullable|string',
            'proposedCompanyName2' => 'nullable|string',
            'proposedAddress2' => 'nullable|string',
            'proposedMembershipNo2' => 'nullable|string',
            'addedBy' => 'nullable|integer',
            'addedDate' => 'nullable|date',
            'lastEntryBy' => 'nullable|integer',
            'lastEntryDate' => 'nullable|date',
            'session' => 'nullable|string',

        ]);

        Membership::create([

            // business information 
            'memberID' => $request->input('memberID'),
            'formNo' => $request->input('formNo'),
            'approvalDate' => $request->input('approvalDate'),
            'memberCategoryID' => $request->input('memberCategoryID'),
            'companyName' => $request->input('companyName'),
            'firmStatus' => $request->input('firmStatus'),
            'locationOfBusiness' => $request->input('locationOfBusiness'),
            'headOffice' => $request->input('headOffice'),
            'salesOffice' => $request->input('salesOffice'),
            'natureofBusinessID' => $request->input('natureofBusinessID'),
            'itemOrProduct' => $request->input('itemOrProduct'),
            'cellNo' => $request->input('cellNo'),
            'telephoneNo' => $request->input('telephoneNo'),
            'email' => $request->input('email'),
            'webSite' => $request->input('webSite'),
            'dateofEstablishment' => $request->input('dateofEstablishment'),
            'districtID' => $request->input('districtID'),
            'upazillaID' => $request->input('upazillaID'),
            'tradeLicenseNo' => $request->input('tradeLicenseNo'),
            'tinCertificateNo' => $request->input('tinCertificateNo'),





            // representative information 
            'isOwnMember' =>$request->has('isOwnMember') ? 1 : 0,
            'ownerName' => $request->input('ownerName'),
            'ownerDesignation' => $request->input('ownerDesignation'),
            'ownerNationalIDNo' => $request->input('ownerNationalIDNo'),
            'ownerContactNo' => $request->input('ownerContactNo'),
            'ownerFatherName' => $request->input('ownerFatherName'),

            'isRepMember' => $request->has('isRepMember') ? 1 : 0,
            'representativeName' => $request->input('representativeName'),
            'representativeDesignation' => $request->input('representativeDesignation'),
            'representativeNationalIDNo' => $request->input('representativeNationalIDNo'),
            'representativeContactNo' => $request->input('representativeContactNo'),
            'representativeFatherName' => $request->input('representativeFatherName'),





            // Proposed By 
            'proposedMemberName1' => $request->input('proposedMemberName1'),
            'proposedCompanyName1' => $request->input('proposedCompanyName1'),
            'proposedAddress1' => $request->input('proposedAddress1'),
            'proposedMembershipNo1' => $request->input('proposedMembershipNo1'),
            'proposedMemberName2' => $request->input('proposedMemberName2'),
            'proposedCompanyName2' => $request->input('proposedCompanyName2'),
            'proposedAddress2' => $request->input('proposedAddress2'),
            'proposedMembershipNo2' => $request->input('proposedMembershipNo2'),
            'addedBy' => $request->input('addedBy'),
            'addedDate' => $request->input('addedDate'),
            'lastEntryBy' => $request->input('lastEntryBy'),
            'lastEntryDate' => $request->input('lastEntryDate'),
            'session' => $request->input('session'),


        ]);

        $latestMember = Membership::orderBy('id', 'desc')->first();
        $latestMemberId = $latestMember ? $latestMember->id : null;

        return redirect()->route('membership.member_create_2', ['id' => $latestMemberId])
            ->with('success', 'Membership added successfully');
    }
    public function member_store_2(Request $request, $id)
    {

        $record = Membership::findOrFail($id);
        // Validate the incoming request data
        $request->validate([

            // representatiove information 
            'isOwnMember' => 'nullable|boolean',
            'ownerName' => 'nullable|string',
            'ownerDesignation' => 'nullable|string',
            'ownerNationalIDNo' => 'nullable|string',
            'ownerContactNo' => 'nullable|string',
            'ownerFatherName' => 'nullable|string',

            'isRepMember' => 'nullable|boolean',
            'representativeName' => 'nullable|string',
            'representativeDesignation' => 'nullable|string',
            'representativeNationalIDNo' => 'nullable|string',
            'representativeContactNo' => 'nullable|string',
            'representativeFatherName' => 'nullable|string',


            'proposedMemberName1' => 'nullable|string',
            'proposedCompanyName1' => 'nullable|string',
            'proposedAddress1' => 'nullable|string',
            'proposedMembershipNo1' => 'nullable|string',
            'proposedMemberName2' => 'nullable|string',
            'proposedCompanyName2' => 'nullable|string',
            'proposedAddress2' => 'nullable|string',
            'proposedMembershipNo2' => 'nullable|string',
            'addedBy' => 'nullable|integer',
            'addedDate' => 'nullable|date',
            'lastEntryBy' => 'nullable|integer',
            'lastEntryDate' => 'nullable|date',
            'session' => 'nullable|string',

        ]);



        $record->update([
            // representative information 
            'isOwnMember' =>$request->has('isOwnMember') ? 1 : 0,
            'ownerName' => $request->input('ownerName'),
            'ownerDesignation' => $request->input('ownerDesignation'),
            'ownerNationalIDNo' => $request->input('ownerNationalIDNo'),
            'ownerContactNo' => $request->input('ownerContactNo'),
            'ownerFatherName' => $request->input('ownerFatherName'),

            'isRepMember' => $request->has('isRepMember') ? 1 : 0,
            'representativeName' => $request->input('representativeName'),
            'representativeDesignation' => $request->input('representativeDesignation'),
            'representativeNationalIDNo' => $request->input('representativeNationalIDNo'),
            'representativeContactNo' => $request->input('representativeContactNo'),
            'representativeFatherName' => $request->input('representativeFatherName'),



            // Proposed By 
            'proposedMemberName1' => $request->input('proposedMemberName1'),
            'proposedCompanyName1' => $request->input('proposedCompanyName1'),
            'proposedAddress1' => $request->input('proposedAddress1'),
            'proposedMembershipNo1' => $request->input('proposedMembershipNo1'),
            'proposedMemberName2' => $request->input('proposedMemberName2'),
            'proposedCompanyName2' => $request->input('proposedCompanyName2'),
            'proposedAddress2' => $request->input('proposedAddress2'),
            'proposedMembershipNo2' => $request->input('proposedMembershipNo2'),
            'addedBy' => $request->input('addedBy'),
            'addedDate' => $request->input('addedDate'),
            'lastEntryBy' => $request->input('lastEntryBy'),
            'lastEntryDate' => $request->input('lastEntryDate'),
            'session' => $request->input('session'),


        ]);

        $latestMember = Membership::orderBy('id', 'desc')->first();
        $latestMemberId = $latestMember ? $latestMember->id : null;

        return redirect()->route('membership.member_create_3', ['id' => $latestMemberId])
            ->with('success', 'Membership added successfully');
    }

    public function member_store_3(Request $request, $id)
    {
        $record = Membership::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'proposedMemberName1' => 'nullable|string',
            'proposedCompanyName1' => 'nullable|string',
            'proposedAddress1' => 'nullable|string',
            'proposedMembershipNo1' => 'nullable|string',
            'proposedMemberName2' => 'nullable|string',
            'proposedCompanyName2' => 'nullable|string',
            'proposedAddress2' => 'nullable|string',
            'proposedMembershipNo2' => 'nullable|string',
            'addedBy' => 'nullable|integer',
            'addedDate' => 'nullable|date',
            'lastEntryBy' => 'nullable|integer',
            'lastEntryDate' => 'nullable|date',
            'session' => 'nullable|string',

        ]);



        $record->update([
            // Proposed By 
            'proposedMemberName1' => $request->input('proposedMemberName1'),
            'proposedCompanyName1' => $request->input('proposedCompanyName1'),
            'proposedAddress1' => $request->input('proposedAddress1'),
            'proposedMembershipNo1' => $request->input('proposedMembershipNo1'),
            'proposedMemberName2' => $request->input('proposedMemberName2'),
            'proposedCompanyName2' => $request->input('proposedCompanyName2'),
            'proposedAddress2' => $request->input('proposedAddress2'),
            'proposedMembershipNo2' => $request->input('proposedMembershipNo2'),
            'addedBy' => $request->input('addedBy'),
            'addedDate' => $request->input('addedDate'),
            'lastEntryBy' => $request->input('lastEntryBy'),
            'lastEntryDate' => $request->input('lastEntryDate'),
            'session' => $request->input('session'),


        ]);


        $latestMember = Membership::orderBy('id', 'desc')->first();
        $latestMemberId = $latestMember ? $latestMember->id : null;

        return redirect()->route('membership.member_create_4', ['id' => $latestMemberId])
            ->with('success', 'Membership added successfully');
    }


    public function member_store_4(Request $request, $id)
    {
        $record = Membership::findOrFail($id);

        // Validate the incoming request data
        $request->validate([

            // images 
            'ownerNationalIDImage' => 'nullable|image',
            'ownerImage' => 'nullable|image',
            'representativeNationalIDImage' => 'nullable|image',
            'representativeImage' => 'nullable|image',
            'tradeLicenseImage' => 'nullable|image',
            'tinCertificateImage' => 'nullable|image',
        ]);

        $imageName = null;
        if ($request->hasFile('ownerNationalIDImage')) {
            $ownerNationalIDImage = $request->file('ownerNationalIDImage');
            $imageName = rand() . '.' . $ownerNationalIDImage->getClientOriginalExtension();
            $ownerNationalIDImage->move(public_path('chamber/member/NID'), $imageName);
        }

        $imageName1 = null;
        if ($request->hasFile('ownerImage')) {
            $ownerImage = $request->file('ownerImage');
            $imageName1 = rand() . '.' . $ownerImage->getClientOriginalExtension();
            $ownerImage->move(public_path('chamber/member/Profile_Pic'), $imageName1);
        }
        $imageName2 = null;
        if ($request->hasFile('representativeNationalIDImage')) {
            $representativeNationalIDImage = $request->file('representativeNationalIDImage');
            $imageName2 = rand() . '.' . $representativeNationalIDImage->getClientOriginalExtension();
            $representativeNationalIDImage->move(public_path('chamber/member/Rep_NID'), $imageName2);
        }

        $imageName3 = null;
        if ($request->hasFile('representativeImage')) {
            $representativeImage = $request->file('representativeImage');
            $imageName3 = rand() . '.' . $representativeImage->getClientOriginalExtension();
            $representativeImage->move(public_path('chamber/member/Rep_Profile_Pic'), $imageName3);
        }

        $imageName4 = null;
        if ($request->hasFile('tradeLicenseImage')) {
            $tradeLicenseImage = $request->file('tradeLicenseImage');
            $imageName4 = rand() . '.' . $tradeLicenseImage->getClientOriginalExtension();
            $tradeLicenseImage->move(public_path('chamber/member/Trade_License'), $imageName4);
        }


        $imageName5 = null;
        if ($request->hasFile('tinCertificateImage')) {
            $tinCertificateImage = $request->file('tinCertificateImage');
            $imageName5 = rand() . '.' . $tinCertificateImage->getClientOriginalExtension();
            $tinCertificateImage->move(public_path('chamber/member/Tin_Certificate'), $imageName5);
        }



        $record->update([

            // images 
            'ownerNationalIDImage' => $imageName,
            'ownerImage' => $imageName1,
            'representativeNationalIDImage' => $imageName2,
            'representativeImage' => $imageName3,
            'tradeLicenseImage' => $imageName4,
            'tinCertificateImage' => $imageName5,

        ]);

        return redirect()->route('membership.memberlist')->with('success', 'Membership added successfully');
    }


    // create end ========================================================================

    // update start *********************************************************************
    public function member_edit_1($id)
    {
        $memberShip = Membership::findOrFail($id);

        $memberCategories = MemberCategory::all();
        $districts = District::all();
        $upazillas = Upazilla::all();
        $firmStatus = FirmStatus::all();
        $businessNature = BusinessNature::all();
        return view('membership.member_edit_1', compact('memberShip', 'memberCategories', 'districts', 'upazillas', 'firmStatus', 'businessNature'));
    }

    public function member_edit_2($id)
    {
        $memberShip = Membership::findOrFail($id);
        $memberCategories = MemberCategory::all();
        return view('membership.member_edit_2', compact('memberCategories', 'memberShip'));
    }



    public function member_edit_3($id)
    {
        $memberShip = Membership::findOrFail($id);
        $sessionName = AccountYear::all();
        return view('membership.member_edit_3', compact('memberShip','sessionName'));
    }

    public function member_edit_4($id)
    {
        $memberShip = Membership::findOrFail($id);
        return view('membership.member_edit_4', compact('memberShip'));
    }


    public function member_update_1(Request $request, $id)
    {

        $record = Membership::findOrFail($id);

        $request->validate([

            // business info 
            'memberID' => 'nullable|string',
            'formNo' => 'nullable|string',
            'approvalDate' => 'nullable',
            'memberCategoryID' => 'nullable',
            'companyName' => 'nullable|string',
            'firmStatus' => 'nullable|integer',
            'locationOfBusiness' => 'nullable|string',
            'headOffice' => 'nullable|string',
            'salesOffice' => 'nullable|string',
            'natureofBusinessID' => 'nullable|integer',
            'itemOrProduct' => 'nullable|string',
            'cellNo' => 'nullable|string',
            'telephoneNo' => 'nullable|string',
            'email' => 'nullable|string|email',
            'webSite' => 'nullable|string',
            'dateofEstablishment' => 'nullable|date',
            'districtID' => 'nullable|integer',
            'upazillaID' => 'nullable|integer',
            'tradeLicenseNo' => 'nullable|string',
            'tinCertificateNo' => 'nullable|string',
        ]);

        $record->update([

            // business information 
            'memberID' => $request->input('memberID'),
            'formNo' => $request->input('formNo'),
            'approvalDate' => $request->input('approvalDate'),
            'memberCategoryID' => $request->input('memberCategoryID'),
            'companyName' => $request->input('companyName'),
            'firmStatus' => $request->input('firmStatus'),
            'locationOfBusiness' => $request->input('locationOfBusiness'),
            'headOffice' => $request->input('headOffice'),
            'salesOffice' => $request->input('salesOffice'),
            'natureofBusinessID' => $request->input('natureofBusinessID'),
            'itemOrProduct' => $request->input('itemOrProduct'),
            'cellNo' => $request->input('cellNo'),
            'telephoneNo' => $request->input('telephoneNo'),
            'email' => $request->input('email'),
            'webSite' => $request->input('webSite'),
            'dateofEstablishment' => $request->input('dateofEstablishment'),
            'districtID' => $request->input('districtID'),
            'upazillaID' => $request->input('upazillaID'),
            'tradeLicenseNo' => $request->input('tradeLicenseNo'),
            'tinCertificateNo' => $request->input('tinCertificateNo'),

        ]);


        return redirect()->route('membership.member_edit_2', ['id' => $record])
            ->with('success', 'Membership added successfully');
    }

    public function member_update_2(Request $request, $id)
    {

        $record = Membership::findOrFail($id);
        // Validate the incoming request data
        $request->validate([

            // representatiove information 
            'isOwnMember' => 'nullable|boolean',
            'ownerName' => 'nullable|string',
            'ownerDesignation' => 'nullable|string',
            'ownerNationalIDNo' => 'nullable|string',
            'ownerContactNo' => 'nullable|string',
            'ownerFatherName' => 'nullable|string',

            'isRepMember' => 'nullable|boolean',
            'representativeName' => 'nullable|string',
            'representativeDesignation' => 'nullable|string',
            'representativeNationalIDNo' => 'nullable|string',
            'representativeContactNo' => 'nullable|string',
            'representativeFatherName' => 'nullable|string',
        ]);



        $record->update([
            // representative information 
            'isOwnMember' => $request->has('isOwnMember') ? 1 : 0,
            'ownerName' => $request->input('ownerName'),
            'ownerDesignation' => $request->input('ownerDesignation'),
            'ownerNationalIDNo' => $request->input('ownerNationalIDNo'),
            'ownerContactNo' => $request->input('ownerContactNo'),
            'ownerFatherName' => $request->input('ownerFatherName'),

            'isRepMember' => $request->has('isRepMember') ? 1 : 0,
            'representativeName' => $request->input('representativeName'),
            'representativeDesignation' => $request->input('representativeDesignation'),
            'representativeNationalIDNo' => $request->input('representativeNationalIDNo'),
            'representativeContactNo' => $request->input('representativeContactNo'),
            'representativeFatherName' => $request->input('representativeFatherName'),

        ]);
        return redirect()->route('membership.member_edit_3', ['id' => $record])
            ->with('success', 'Membership added successfully');
    }

    public function member_update_3(Request $request, $id)
    {
        $record = Membership::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'proposedMemberName1' => 'nullable|string',
            'proposedCompanyName1' => 'nullable|string',
            'proposedAddress1' => 'nullable|string',
            'proposedMembershipNo1' => 'nullable|string',
            'proposedMemberName2' => 'nullable|string',
            'proposedCompanyName2' => 'nullable|string',
            'proposedAddress2' => 'nullable|string',
            'proposedMembershipNo2' => 'nullable|string',
            'addedBy' => 'nullable|integer',
            'addedDate' => 'nullable|date',
            'lastEntryBy' => 'nullable|integer',
            'lastEntryDate' => 'nullable|date',
            'session' => 'nullable|string',

        ]);



        $record->update([
            // Proposed By 
            'proposedMemberName1' => $request->input('proposedMemberName1'),
            'proposedCompanyName1' => $request->input('proposedCompanyName1'),
            'proposedAddress1' => $request->input('proposedAddress1'),
            'proposedMembershipNo1' => $request->input('proposedMembershipNo1'),
            'proposedMemberName2' => $request->input('proposedMemberName2'),
            'proposedCompanyName2' => $request->input('proposedCompanyName2'),
            'proposedAddress2' => $request->input('proposedAddress2'),
            'proposedMembershipNo2' => $request->input('proposedMembershipNo2'),
            'addedBy' => $request->input('addedBy'),
            'addedDate' => $request->input('addedDate'),
            'lastEntryBy' => $request->input('lastEntryBy'),
            'lastEntryDate' => $request->input('lastEntryDate'),
            'session' => $request->input('session'),

        ]);

        return redirect()->route('membership.member_edit_4', ['id' => $record])
            ->with('success', 'Membership added successfully');
    }


    public function member_update_4(Request $request, $id)
    {
        $record = Membership::findOrFail($id);

        // Validate the incoming request data
        $request->validate([

            // images 
            'ownerNationalIDImage' => 'nullable|image',
            'ownerImage' => 'nullable|image',
            'representativeNationalIDImage' => 'nullable|image',
            'representativeImage' => 'nullable|image',
            'tradeLicenseImage' => 'nullable|image',
            'tinCertificateImage' => 'nullable|image',
        ]);
        $imageName = null;
        if ($request->hasFile('ownerNationalIDImage')) {
            $ownerNationalIDImage = $request->file('ownerNationalIDImage');
            $imageName = rand() . '.' . $ownerNationalIDImage->getClientOriginalExtension();
            $ownerNationalIDImage->move(public_path('chamber/member/NID'), $imageName);
        }

        $imageName1 = null;
        if ($request->hasFile('ownerImage')) {
            $ownerImage = $request->file('ownerImage');
            $imageName1 = rand() . '.' . $ownerImage->getClientOriginalExtension();
            $ownerImage->move(public_path('chamber/member/Profile_Pic'), $imageName1);
        }
        $imageName2 = null;
        if ($request->hasFile('representativeNationalIDImage')) {
            $representativeNationalIDImage = $request->file('representativeNationalIDImage');
            $imageName2 = rand() . '.' . $representativeNationalIDImage->getClientOriginalExtension();
            $representativeNationalIDImage->move(public_path('chamber/member/Rep_NID'), $imageName2);
        }

        $imageName3 = null;
        if ($request->hasFile('representativeImage')) {
            $representativeImage = $request->file('representativeImage');
            $imageName3 = rand() . '.' . $representativeImage->getClientOriginalExtension();
            $representativeImage->move(public_path('chamber/member/Rep_Profile_Pic'), $imageName3);
        }

        $imageName4 = null;
        if ($request->hasFile('tradeLicenseImage')) {
            $tradeLicenseImage = $request->file('tradeLicenseImage');
            $imageName4 = rand() . '.' . $tradeLicenseImage->getClientOriginalExtension();
            $tradeLicenseImage->move(public_path('chamber/member/Trade_License'), $imageName4);
        }


        $imageName5 = null;
        if ($request->hasFile('tinCertificateImage')) {
            $tinCertificateImage = $request->file('tinCertificateImage');
            $imageName5 = rand() . '.' . $tinCertificateImage->getClientOriginalExtension();
            $tinCertificateImage->move(public_path('chamber/member/Tin_Certificate'), $imageName5);
        }

        $updateData = [];

        if ($imageName) {
            $updateData['ownerNationalIDImage'] = $imageName;
        }

        if ($imageName1) {
            $updateData['ownerImage'] = $imageName1;
        }

        if ($imageName2) {
            $updateData['representativeNationalIDImage'] = $imageName2;
        }
        if ($imageName3) {
            $updateData['representativeImage'] = $imageName3;
        }
        if ($imageName4) {
            $updateData['tradeLicenseImage'] = $imageName4;
        }
        if ($imageName5) {
            $updateData['tinCertificateImage'] = $imageName5;
        }

        if (!empty($updateData)) {
            $record->update($updateData);
        }


        return redirect()->route('membership.memberlist')->with('success', 'Membership added successfully');
    }



    public function delete($id)
    {
        $memberShip = Membership::findOrFail($id);
        @unlink('chamber/member/NID/'.$memberShip->ownerNationalIDImage);
        @unlink('chamber/member/Profile_Pic/'.$memberShip->ownerImage);
        @unlink('chamber/member/Rep_NID/'.$memberShip->representativeNationalIDImage);
        @unlink('chamber/member/Rep_Profile_Pic/'.$memberShip->representativeImage);
        @unlink('chamber/member/Trade_License/'.$memberShip->tradeLicenseImage);
        @unlink('chamber/member/Tin_Certificate/'.$memberShip->tinCertificateImage);
        $memberShip->delete();

        return redirect()->route('membership.memberlist');
    }





    public function member_report()
    {
        return view('membership.member_report');
    }





}
